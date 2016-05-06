<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
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
    }
}
