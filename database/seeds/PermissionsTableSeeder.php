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
                'name' => 'user_view',
                'label' => 'View Users',
            ],
            [
                'name' => 'user_edit',
                'label' => 'Edit Users',
            ],
            [
                'name' => 'user_create',
                'label' => 'Create Users',
            ],
            [
                'name' => 'user_delete',
                'label' => 'Delete Users',
            ],
            [
                'name' => 'role_view',
                'label' => 'View Roles',
            ],
            [
                'name' => 'role_edit',
                'label' => 'Edit Roles',
            ],
            [
                'name' => 'role_create',
                'label' => 'Create Roles',
            ],
            [
                'name' => 'role_delete',
                'label' => 'Delete Roles',
            ],
            [
                'name' => 'permission_view',
                'label' => 'View Permissions',
            ],
            [
                'name' => 'permission_edit',
                'label' => 'Edit Permissions',
            ],
            [
                'name' => 'permission_create',
                'label' => 'Create Permissions',
            ],
            [
                'name' => 'permission_delete',
                'label' => 'Delete Permissions',
            ]
        );
        DB::table('permissions')->insert($permissionSeeds);
    }
}
