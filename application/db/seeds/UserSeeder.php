<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
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

        $lengthBoundValidator = function($str) {
            return strlen($str) >= 6 && strlen($str) <= 32;
        };
        $lengthUpperValidator = function($str) {
            return strlen($str) <= 32;
        };

        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'email'         => $faker->unique()->email,
                'passwd'        => $faker->valid($lengthBoundValidator)->password,
                'first_name'    => $faker->valid($lengthUpperValidator)->firstName,
                'last_name'     => $faker->valid($lengthUpperValidator)->lastName,
                'gender'        => $faker->randomElement($array = array ('M', 'F')),
                'age'           => $faker->numberBetween($min = 1, $max = 100),
                'occupation'    => $faker->valid($lengthUpperValidator)->jobTitle,
            ];
        }

        $this->table('users')->insert($data)->save();
    }
}
