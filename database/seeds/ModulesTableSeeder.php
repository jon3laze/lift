<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleSeeds = array(
            [
                'name' => 'user',
                'label' => 'User Management',
                'icon' => 'fa-user',
                'default' => true,
            ],
            [
                'name' => 'role',
                'label' => 'Role Management',
                'icon' => 'fa-user-secret',
                'default' => true,
            ],
            [
                'name' => 'permission',
                'label' => 'Permission Management',
                'icon' => 'fa-lock',
                'default' => true,
            ],
            [
                'name' => 'insol',
                'label' => 'Inventory Solution',
                'icon' => 'fa-database',
                'default' => false,
            ],
            [
                'name' => 'paysol',
                'label' => 'Payment Solution',
                'icon' => 'fa-credit-card',
                'default' => false,
            ]
        );
        DB::table('modules')->insert($moduleSeeds);
    }
}
