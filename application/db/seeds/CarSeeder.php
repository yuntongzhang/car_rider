<?php


use Phinx\Seed\AbstractSeed;

class CarSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'UserSeeder'
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
        $faker = (new \Faker\Factory())::create();
                  $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        // follow the foreign key constraints
        $email_rows = $this->fetchAll('SELECT email FROM users');
        $user_emails = array_column($email_rows, 'email');

        $lengthUpperValidator = function($str) {
            return strlen($str) <= 16;
        };

        $data = [];
        for ($i = 0; $i < 200; $i++) {
            $data[] = [
                'plate_number'  => $faker->unique()->vehicleRegistration('[A-Z]{2}[0-9]{5}[A-Z]{1}'),
                'driver_email'  => $faker->randomElement($user_emails),
                'car_type'      => $faker->valid($lengthUpperValidator)->vehicleType,
                'size'          => $faker->numberBetween($min = 1, $max = 30),
            ];
        }

        $this->table('cars')->insert($data)->save();
    }
}
