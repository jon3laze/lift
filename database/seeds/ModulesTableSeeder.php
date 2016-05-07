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
        DB::table('modules')->insert($moduleSeeds);
    }
}
