<?php

use Illuminate\Database\Seeder;

class HobbyUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hobby_user')->delete();
        
        \DB::table('hobby_user')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'hobby_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'hobby_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 7,
                'hobby_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}