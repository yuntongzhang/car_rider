<?php


use Phinx\Migration\AbstractMigration;

class CreateTables extends AbstractMigration
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
        $this->execute("CREATE TABLE users (
            email VARCHAR(32) PRIMARY KEY CHECK (email LIKE '%_@__%.__%'),
            passwd VARCHAR(32) NOT NULL CHECK (LENGTH(passwd) >= 6),
            first_name VARCHAR(32) NOT NULL,
            last_name VARCHAR(32) NOT NULL,
            gender CHAR(1) NOT NULL CHECK (gender IN ('M', 'F')),
            age INTEGER NOT NULL CHECK (age > 0),
            occupation VARCHAR(32) NOT NULL
        )");

        $this->execute('CREATE TABLE cars (
            plate_number VARCHAR(8) PRIMARY KEY,
            driver_email VARCHAR(32) REFERENCES users(email),
            car_type VARCHAR(16) NOT NULL,
            size INTEGER NOT NULL CHECK (size > 0)
        )');

        $this->execute("CREATE TABLE administrators (
            email VARCHAR(32) PRIMARY KEY CHECK (email LIKE '%_@__%.__%'),
            passwd VARCHAR(32) NOT NULL CHECK (LENGTH(passwd) >= 6)
        )");

        $this->execute('CREATE TABLE car_rides (
            plate_number VARCHAR(8) REFERENCES cars(plate_number),
            start_time TIMESTAMP NOT NULL CHECK (start_time >= NOW()::timestamp),
            origin VARCHAR(32) NOT NULL,
            destination VARCHAR(32) NOT NULL,
            price NUMERIC(15,2) NOT NULL,
            vacancy INTEGER NOT NULL CHECK (vacancy >= 0),
            PRIMARY KEY (plate_number, start_time)
        )');

        $this->execute('CREATE TABLE bids (
            passenger_email VARCHAR(32) REFERENCES users(email),
            plate_number VARCHAR(8),
            start_time TIMESTAMP,
            price NUMERIC(15,2) NOT NULL,
            accepted BOOLEAN NOT NULL,
            FOREIGN KEY (plate_number, start_time) REFERENCES car_rides(plate_number, start_time),
            PRIMARY KEY (passenger_email, plate_number, start_time)
        )');
    }
}
