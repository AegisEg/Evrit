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
                'user_id' => 3,
                'created_at' => '2019-06-13 22:13:10',
                'updated_at' => '2019-06-11 22:13:13',
            ),
            1 => 
            array (
                'id' => 2,
                'channel_id' => 1,
                'user_id' => 6,
                'created_at' => '2019-06-07 22:13:22',
                'updated_at' => '2019-06-29 22:13:25',
            ),
            2 => 
            array (
                'id' => 3,
                'channel_id' => 2,
                'user_id' => 3,
                'created_at' => '2019-06-05 23:05:49',
                'updated_at' => '2019-06-18 23:05:51',
            ),
            3 => 
            array (
                'id' => 4,
                'channel_id' => 2,
                'user_id' => 1,
                'created_at' => '2019-06-12 23:05:58',
                'updated_at' => '2019-06-15 23:06:00',
            ),
        ));
        
        
    }
}