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
                'user_id' => 3,
                'text' => 'Привет',
                'created_at' => '2019-06-28 23:32:55',
                'updated_at' => '2019-06-28 23:33:00',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 1,
                'user_id' => 6,
                'text' => 'Ну привит',
                'created_at' => '2019-06-28 23:33:19',
                'updated_at' => '2019-06-28 23:33:22',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 1,
                'user_id' => 3,
                'text' => 'asdasdasd',
                'created_at' => '2019-06-28 19:34:25',
                'updated_at' => '2019-06-28 19:34:25',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 1,
                'user_id' => 3,
                'text' => 'asdasdasdasd',
                'created_at' => '2019-06-28 19:36:14',
                'updated_at' => '2019-06-28 19:36:14',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 1,
                'user_id' => 3,
                'text' => 'asdasd',
                'created_at' => '2019-06-28 19:38:00',
                'updated_at' => '2019-06-28 19:38:00',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 1,
                'user_id' => 3,
                'text' => 'Куку',
                'created_at' => '2019-06-28 19:44:45',
                'updated_at' => '2019-06-28 19:44:45',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 1,
                'user_id' => 6,
                'text' => 'Все ок',
                'created_at' => '2019-06-28 19:45:58',
                'updated_at' => '2019-06-28 19:45:58',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 1,
                'user_id' => 3,
                'text' => 'Я нормас',
                'created_at' => '2019-06-28 19:46:50',
                'updated_at' => '2019-06-28 19:46:50',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 2,
                'user_id' => 3,
                'text' => 'Привет',
                'created_at' => '2019-06-28 20:01:10',
                'updated_at' => '2019-06-28 20:01:10',
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => 1,
                'user_id' => 6,
                'text' => 'asdasd',
                'created_at' => '2019-06-28 20:05:08',
                'updated_at' => '2019-06-28 20:05:08',
            ),
        ));
        
        
    }
}