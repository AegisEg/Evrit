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
                
        
    }
}