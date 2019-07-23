<?php

use Illuminate\Database\Seeder;

class UserToChannelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_to_channel')->delete();
        
        \DB::table('user_to_channel')->insert(array (
            0 => 
            array (
                'id' => 1,
                'channel_id' => 1,
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'channel_id' => 1,
                'user_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}