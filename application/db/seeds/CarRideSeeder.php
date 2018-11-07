<?php


use Phinx\Seed\AbstractSeed;

class CarRideSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'UserSeeder',
            'CarSeeder'
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

        $plate_number_rows = $this->fetchAll('SELECT plate_number FROM cars');
        $plate_numbers = array_column($plate_number_rows, 'plate_number');

        $lengthUpperValidator = function($str) {
            return strlen($str) <= 32;
        };

        $data = [];
        for ($i = 0; $i < 100; $i++) {
            // make sure origin and destination are different
            $origin = $faker->valid($lengthUpperValidator)->streetAddress;
            $destination = $faker->valid($lengthUpperValidator)->streetAddress;
            while ($destination == $origin) {
                $destination = $faker->valid($lengthUpperValidator)->streetAddress;
            }

            // make sure vacancy is not greater than the size of the car
            $plate_number = $faker->randomElement($plate_numbers);
            $car_size_arr = $this->fetchAll("SELECT size FROM cars WHERE plate_number = '$plate_number'");
            $vacancy = $faker->numberBetween($min = 0, $max = $car_size_arr[0]['size']);

            // pre-generate timestamp
            $timestamp = $faker
                         ->unique()
                         ->dateTimeInInterval($startDate = 'now', $interval = '+ 30 days', $timezone = 'Singapore')
                         ->format('Y-m-d H:i:s');

            $data[] = [
                'plate_number'  => $plate_number,
                'start_time'    => $timestamp,
                'origin'        => $origin,
                'destination'   => $destination,
                'price'         => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5),
                'vacancy'       => $vacancy,
            ];
        }

        $this->table('car_rides')->insert($data)->save();
    }
}
