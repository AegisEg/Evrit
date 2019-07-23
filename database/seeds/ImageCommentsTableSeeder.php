<?php

use Illuminate\Database\Seeder;

class ImageCommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('image_comments')->delete();
        
        \DB::table('image_comments')->insert(array (
            0 => 
            array (
                'id' => 2,
                'img_id' => 4,
                'user_id' => '1',
                'likes' => 0,
                'text' => 'fghbfg',
                'created_at' => '2019-07-04 13:34:57',
                'updated_at' => '2019-07-04 13:34:57',
            ),
            1 => 
            array (
                'id' => 3,
                'img_id' => 2,
                'user_id' => '1',
                'likes' => 0,
                'text' => 'fghdfghdgdfgdfgdfgf',
                'created_at' => '2019-07-04 13:54:34',
                'updated_at' => '2019-07-04 13:54:34',
            ),
            2 => 
            array (
                'id' => 4,
                'img_id' => 2,
                'user_id' => '1',
                'likes' => 0,
                'text' => 'dfgdfgdfgdfgd',
                'created_at' => '2019-07-04 13:54:36',
                'updated_at' => '2019-07-04 13:54:36',
            ),
            3 => 
            array (
                'id' => 13,
                'img_id' => 5,
                'user_id' => '2',
                'likes' => 0,
                'text' => 'Aega',
                'created_at' => '2019-07-06 08:00:00',
                'updated_at' => '2019-07-06 08:00:00',
            ),
            4 => 
            array (
                'id' => 14,
                'img_id' => 9,
                'user_id' => '1',
                'likes' => 0,
                'text' => 'Хорошее фото!',
                'created_at' => '2019-07-06 09:22:36',
                'updated_at' => '2019-07-06 09:22:36',
            ),
        ));
        
        
    }
}