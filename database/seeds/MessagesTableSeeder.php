<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('messages')->delete();
        
        \DB::table('messages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 1,
                'user_id' => 1,
                'is_read' => 1,
                'text' => 'Привет',
                'created_at' => '2019-07-06 09:31:05',
                'updated_at' => '2019-07-06 09:31:22',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 1,
                'user_id' => 2,
                'is_read' => 1,
                'text' => 'Привет',
                'created_at' => '2019-07-06 09:31:25',
                'updated_at' => '2019-07-06 09:31:25',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 1,
                'user_id' => 2,
                'is_read' => 1,
                'text' => 'Как дела?',
                'created_at' => '2019-07-06 09:31:37',
                'updated_at' => '2019-07-06 09:31:44',
            ),
        ));
        
        
    }
}