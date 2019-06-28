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
                'key' => 'testchanel',
                'created_at' => '2019-06-06 22:10:12',
                'updated_at' => '2019-06-05 22:10:14',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'testchanel2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}