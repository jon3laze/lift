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
        DB::table('permissions')->insert(array(
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
            ]
        ));
    }
}
