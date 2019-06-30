<?php

use Illuminate\Database\Seeder;

class ProfessionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('professions')->delete();
        
        \DB::table('professions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Программист',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Дизайнер',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}