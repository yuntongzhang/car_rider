<?php


use Phinx\Migration\AbstractMigration;

class CreateTriggerForBid extends AbstractMigration
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
        $this->execute("CREATE OR REPLACE FUNCTION bid_check() RETURNS trigger AS $$
        DECLARE NO_BIDS INTEGER;
        DECLARE NO_VACANCY INTEGER;
        BEGIN
        IF NEW.accepted = 't' THEN
            --FIND NO OF VACANCY
            SELECT C.VACANCY INTO NO_VACANCY FROM CAR_RIDES C
            WHERE C.PLATE_NUMBER = NEW.PLATE_NUMBER
            AND C.START_TIME = NEW.START_TIME;
            --FIND NO OF BIDS
            SELECT COUNT(*) INTO NO_BIDS FROM BIDS B
            WHERE  B.PLATE_NUMBER = NEW.PLATE_NUMBER
            AND B.START_TIME = NEW.START_TIME AND B.ACCEPTED = TRUE;
            IF NO_BIDS < NO_VACANCY THEN
                RETURN NEW;
            ELSE
                RAISE NOTICE 'No. of accepted bids cannot be more than no. of vacancy';
            END IF;
        ELSE
            RETURN NEW;
            END IF;
        RETURN NULL;
        END; $$ LANGUAGE plpgsql;

    CREATE TRIGGER bid_trigger BEFORE UPDATE ON bids
        FOR EACH ROW EXECUTE PROCEDURE bid_check();");
    }
}
