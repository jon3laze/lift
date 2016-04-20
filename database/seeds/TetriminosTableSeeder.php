<?php

use Illuminate\Database\Seeder;

class TetriminosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tetriminos')->insert(
        	[
        		'name' => 'settings',
            	'label' => 'Settings',
            	'icon' => 'fa-cog',
            ],
            [
            	'name' => 'profile',
            	'label' => 'Profile',
            	'icon' => 'fa-user',
            ]
        );
    }
}
