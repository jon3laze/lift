<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(
        	[
        		'name' => 'root',
            	'label' => 'Super Admin',
            ],
            [
        		'name' => 'admin',
            	'label' => 'Administrator',
            ],
            [
        		'name' => 'manager',
            	'label' => 'Manager',
            ],
            [
        		'name' => 'user',
            	'label' => 'User',
            ]
        ));
    }
}
