<?php

use Illuminate\Database\Seeder;

class FriendsListTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('friends_list')->delete();
        
        \DB::table('friends_list')->insert(array (
            0 => 
            array (
                'id' => 11,
                'user_id' => 3,
                'user2_id' => 1,
                'status' => 'send',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 12,
                'user_id' => 1,
                'user2_id' => 3,
                'status' => 'request',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 13,
                'user_id' => 3,
                'user2_id' => 6,
                'status' => 'friend',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 14,
                'user_id' => 6,
                'user2_id' => 3,
                'status' => 'friend',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}