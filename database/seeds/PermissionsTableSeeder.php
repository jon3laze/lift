<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionSeeds = array(
            [
                'name' => 'view',
                'module_id' => '1',
                'label' => 'View Users',
                'icon' => 'fa-eye',
            ],
            [
                'name' => 'edit',
                'module_id' => '1',
                'label' => 'Edit Users',
                'icon' => 'fa-pencil',
            ],
            [
                'name' => 'create',
                'module_id' => '1',
                'label' => 'Create Users',
                'icon' => 'fa-plus'
            ],
            [
                'name' => 'delete',
                'module_id' => '1',
                'label' => 'Delete Users',
                'icon' => 'fa-minus',
            ],
            [
                'name' => 'view',
                'module_id' => '2',
                'label' => 'View Roles',
                'icon' => 'fa-eye',
            ],
            [
                'name' => 'edit',
                'module_id' => '2',
                'label' => 'Edit Roles',
                'icon' => 'fa-pencil',
            ],
            [
                'name' => 'create',
                'module_id' => '2',
                'label' => 'Create Roles',
                'icon' => 'fa-plus'
            ],
            [
                'name' => 'delete',
                'module_id' => '2',
                'label' => 'Delete Roles',
                'icon' => 'fa-minus',
            ],
            [
                'name' => 'view',
                'module_id' => '3',
                'label' => 'View Permissions',
                'icon' => 'fa-eye',
            ],
            [
                'name' => 'edit',
                'module_id' => '3',
                'label' => 'Edit Permissions',
                'icon' => 'fa-pencil',
            ],
            [
                'name' => 'create',
                'module_id' => '3',
                'label' => 'Create Permissions',
                'icon' => 'fa-plus'
            ],
            [
                'name' => 'delete',
                'module_id' => '3',
                'label' => 'Delete Permissions',
                'icon' => 'fa-minus',
            ]
        );
        DB::table('permissions')->truncate();
        DB::table('permissions')->insert($permissionSeeds);
    }
}
