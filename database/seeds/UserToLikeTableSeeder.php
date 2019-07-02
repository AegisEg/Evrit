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
        
        
        
    }
}