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
                'hobby_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}