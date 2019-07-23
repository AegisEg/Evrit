<?php

use Illuminate\Database\Seeder;

class UserImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_images')->delete();
        
        \DB::table('user_images')->insert(array (
            0 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'likes' => 0,
                'confidentiality' => 0,
                'src' => 'storage/uploads/neostar1996@mail.ru/5d1e21151a64e_1562255637.jpg',
                'description' => 'cv ghcfg',
                'created_at' => '2019-07-04 15:53:57',
                'updated_at' => '2019-07-04 15:54:23',
            ),
            1 => 
            array (
                'id' => 9,
                'user_id' => 1,
                'likes' => 0,
                'confidentiality' => 0,
                'src' => 'storage/uploads/neostar1996@mail.ru/5d2068380bf78_1562404920.png',
                'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печ',
                'created_at' => '2019-07-06 09:22:00',
                'updated_at' => '2019-07-06 09:22:00',
            ),
            2 => 
            array (
                'id' => 10,
                'user_id' => 2,
                'likes' => 0,
                'confidentiality' => 0,
                'src' => 'storage/uploads/myjobgoole@gmail.com/5d2068d6c4523_1562405078.png',
                'description' => 'asdasdasd',
                'created_at' => '2019-07-06 09:24:38',
                'updated_at' => '2019-07-06 09:24:38',
            ),
        ));
        
        
    }
}