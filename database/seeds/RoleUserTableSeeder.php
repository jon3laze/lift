<?php

use Illuminate\Database\Seeder;
use App\User;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSeeds = array();
        $users = User::all();
        for($i=0; $i<$users->count(); $i++) {
            if($i <= 13)
            {
                array_push($roleSeeds, ['role_id' => 1, 'user_id' => $users[$i]->id]);
            } elseif($i <= 26)
            {
                array_push($roleSeeds, ['role_id' => 2, 'user_id' => $users[$i]->id]);
            } elseif($i <= 39) {
                array_push($roleSeeds, ['role_id' => 3, 'user_id' => $users[$i]->id]);
            } elseif($i >39)
            {
                array_push($roleSeeds, ['role_id' => 4, 'user_id' => $users[$i]->id]);
            }
        }
        DB::table('role_user')->insert($roleSeeds);
    }
}
