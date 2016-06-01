<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userSeeds = array(
            [
                'name' => 'Adam Savage',
                'email' => 'admin@test.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Ted Savage',
                'email' => 'tech@test.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Indiana Savage',
                'email' => 'installer@test.com',
                'password' => bcrypt('password'),
            ]
        );

        $faker = Faker::create();
        for($i=4; $i<52; $i++) {
            if($i%2) {
                array_push($userSeeds, ['name' => $faker->name('female'), 'email' => $faker->email, 'password' => bcrypt($faker->password)]);
            } else {
                array_push($userSeeds, ['name' => $faker->name('male'), 'email' => $faker->email, 'password' => bcrypt($faker->password)]);
            }
        }
        DB::table('users')->truncate();
        DB::table('users')->insert($userSeeds);
    }
}
