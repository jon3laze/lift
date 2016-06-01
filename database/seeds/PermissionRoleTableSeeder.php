<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        $permissionRoleSeeds = array();

        foreach($permissions as $permission) {
            array_push($permissionRoleSeeds, array('permission_id' => $permission->id, 'role_id' => '1'));
        }
        DB::table('permission_role')->insert($permissionRoleSeeds);
    }
}
