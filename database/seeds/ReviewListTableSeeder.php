<?php

use Illuminate\Database\Seeder;

class ReviewListTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('review_list')->delete();
        
        \DB::table('review_list')->insert(array (
            0 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'user2_id' => 3,
                'chek' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'user2_id' => 6,
                'chek' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 7,
                'user_id' => 7,
                'user2_id' => 3,
                'chek' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 14,
                'user_id' => 1,
                'user2_id' => 7,
                'chek' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 17,
                'user_id' => 7,
                'user2_id' => 1,
                'chek' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 40,
                'user_id' => 3,
                'user2_id' => 6,
                'chek' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 42,
                'user_id' => 6,
                'user2_id' => 1,
                'chek' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 43,
                'user_id' => 6,
                'user2_id' => 3,
                'chek' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 44,
                'user_id' => 6,
                'user2_id' => 7,
                'chek' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 46,
                'user_id' => 3,
                'user2_id' => 8,
                'chek' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 49,
                'user_id' => 3,
                'user2_id' => 1,
                'chek' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 50,
                'user_id' => 3,
                'user2_id' => 12,
                'chek' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}