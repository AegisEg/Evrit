<?php

use Illuminate\Database\Seeder;

class LanguageUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('language_user')->delete();
        
        \DB::table('language_user')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'language_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'language_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}