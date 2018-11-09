<?php


use Phinx\Migration\AbstractMigration;

class CreateTriggerRideAudit extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->execute("CREATE TABLE ride_audit(
            stamp		  timestamp NOT NULL,
            operation         char(1)   NOT NULL,
            start_time        timestamp without time zone NOT NULL,
            price	          numeric(15,2)      NOT NULL,
            vacancy 	  integer NOT NULL
        );
        --Triger function that does both assertion and audit
        CREATE OR REPLACE FUNCTION ride_check() RETURNS trigger AS $$
            BEGIN
            IF (TG_OP = 'DELETE') THEN
            --Check if the driver is cancelling rides in advance of 1 day
                IF  OLD.START_TIME-CURRENT_TIMESTAMP < INTERVAL '1 DAYS' THEN
                    RAISE NOTICE 'YOU CAN ONLY CANCEL YOUR RIDES AT LEAST A DAY BEFORE THE RIDE!';
                ELSE
                    INSERT INTO ride_audit SELECT now(), 'D', OLD.start_time, OLD.price, OLD.vacancy;
                    RETURN OLD;
                END IF;
            ELSIF (TG_OP = 'UPDATE') OR (TG_OP = 'INSERT') THEN
                -- Check for price and vacancy input
                IF NEW.price < 0 OR NEW.price > 100 OR NEW.price IS NULL THEN
                    RAISE NOTICE 'price cannot be less than zero or more than 100 or null';
                ELSE
                    IF NEW.vacancy <= 0 OR NEW.vacancy IS NULL THEN
                        RAISE NOTICE 'vacancy cannot be zero or less or null';
                    ELSE
                        INSERT INTO ride_audit SELECT now(), 'A', NEW.start_time, NEW.price, NEW.vacancy;
                    RETURN NEW;
                    END IF;
                END IF;
                END IF;
            RETURN NULL;
            END; $$ LANGUAGE plpgsql;

        CREATE TRIGGER ride_audit BEFORE INSERT OR UPDATE OR DELETE ON car_rides
            FOR EACH ROW EXECUTE PROCEDURE ride_check();");
    }
}
