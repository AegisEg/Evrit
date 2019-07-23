<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('channels')->delete();
        
        \DB::table('channels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => '$2y$10$AeCoPOrpB2zXKmVTrEGQP.Fe11IFmOpKHSUfvqkMX4DJmKjA1HeyK',
                'created_at' => '2019-07-06 09:31:05',
                'updated_at' => '2019-07-06 09:31:05',
            ),
        ));
        
        
    }
}