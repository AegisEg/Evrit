<?php

use Illuminate\Database\Seeder;

class UserToLikeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_to_like')->delete();
        
        \DB::table('user_to_like')->insert(array (
            0 => 
            array (
                'id' => 5,
                'user_id' => 2,
                'image_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 6,
                'user_id' => 1,
                'image_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 7,
                'user_id' => 1,
                'image_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}