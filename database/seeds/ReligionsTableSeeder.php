<?php

use Illuminate\Database\Seeder;

class ReligionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('religions')->delete();
        
        \DB::table('religions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Христианин',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Мусульманин',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Буддисты',
                'created_at' => '2019-07-04 16:50:58',
                'updated_at' => '2019-07-04 16:51:31',
            ),
        ));
        
        
    }
}