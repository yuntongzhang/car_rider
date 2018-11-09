<?php


use Phinx\Seed\AbstractSeed;

class BidSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'UserSeeder',
            'CarSeeder',
            'CarRideSeeder'
        ];
    }
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        // follow the foreign key constraints
        $email_rows = $this->fetchAll('SELECT email FROM users');
        $car_rides_rows = $this->fetchAll('SELECT plate_number, start_time FROM car_rides');

        // cross product the emails and car_rides
        // a person currently can book his own proposed rides
        $arr = array();
        foreach($email_rows as $email) {
            foreach($car_rides_rows as $ride) {
                $row = array($email['email'], $ride['plate_number'], $ride['start_time']);
                array_push($arr, $row);
            }
        }

        $data = [];
        for ($i = 0; $i < 300; $i++) {
            $to_insert = $faker->unique()->randomElement($arr);

            $data[] = [
                'passenger_email'  => $to_insert[0],
                'plate_number'     => $to_insert[1],
                'start_time'       => $to_insert[2],
                'price'            => $faker->randomFloat($nbMaxDecimals = 2, $min = 5, $max = 10),
                'accepted'         => $faker->boolean($chanceOfGettingTrue = 50)
            ];
        }

        $this->table('bids')->insert($data)->save();
    }
}
