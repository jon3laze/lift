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
        $roleSeeds = array(
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
        );
        DB::table('roles')->truncate();
        DB::table('roles')->insert($roleSeeds);
    }
}
