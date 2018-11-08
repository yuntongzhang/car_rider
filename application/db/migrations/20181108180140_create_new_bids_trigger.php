<?php


use Phinx\Migration\AbstractMigration;

class CreateNewBidsTrigger extends AbstractMigration
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
            "CREATE FUNCTION accept_bids()
            RETURNS TRIGGER AS $$
            DECLARE time INTERVAL;
            BEGIN
            time = '1 hour';
            IF ((NEW.start_time - OLD.start_time) > time) OR ((OLD.start_time - NEW.start_time) > time)
            AND OLD.accepted = false
            THEN RAISE NOTICE 'You cannot assign two car rides with the same starting time to a passenger.';
            ELSE
            RAISE NOTICE 'fuck';
            RETURN NULL;
            END IF;

            END; $$ LANGUAGE PLPGSQL;

            CREATE TRIGGER accept_bids
            BEFORE UPDATE
            ON bids
            FOR EACH ROW
            WHEN (NEW.plate_number <> OLD.plate_number OR NEW.start_time <> OLD.start_time OR NEW.passenger_email <> OLD.passenger_email)
            EXECUTE PROCEDURE accept_bids();
            "
        );
    }
}
