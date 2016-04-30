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
        DB::table('modules')->insert(
        	[
        		'name' => 'insol',
            	'label' => 'Inventory Solution',
            	'icon' => 'fa-database',
            ],
            [
            	'name' => 'paysol',
            	'label' => 'Payment Solution',
            	'icon' => 'fa-credit-card',
            ]
        );
    }
}
