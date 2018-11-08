<?php


use Phinx\Migration\AbstractMigration;

class CreateBidsTrigger extends AbstractMigration
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
        $this->execute(
            "CREATE FUNCTION accept_bid()
            RETURNS TRIGGER AS $$
            DECLARE time INTERVAL;
            BEGIN
            time = '1 hour';
            IF ((NEW.start_time - OLD.start_time) <= time) OR ((OLD.start_time - NEW.start_time) <= time)
            AND NEW.passenger_email = OLD.passenger_email
            AND OLD.accepted = TRUE
            AND NEW.plate_number != OLD.plate_number
            THEN RAISE NOTICE 'You cannot assign two car rides with the same starting time to a passenger.';
            RETURN NULL;
            ELSE
            RETURN NEW;
            END IF;
            END; $$ LANGUAGE PLPGSQL;

            CREATE TRIGGER accept_bid
            BEFORE UPDATE
            ON bids
            FOR EACH ROW
            EXECUTE PROCEDURE accept_bid();
            "
        );
    }
}
