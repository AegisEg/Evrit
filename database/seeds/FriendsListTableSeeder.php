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
                'id' => 5,
                'user_id' => 2,
                'user2_id' => 1,
                'status' => 'request',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 6,
                'user_id' => 1,
                'user2_id' => 2,
                'status' => 'send',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}