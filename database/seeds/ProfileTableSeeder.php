<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('profile')->delete();
        
        
        
    }
}