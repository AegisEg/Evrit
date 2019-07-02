<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('areas')->delete();
        
        \DB::table('areas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'main_section1',
                'name' => 'Main Section',
                'text' => '<div class="col-12 col-md-6 home_videos">
<h2>מסיבת שוגר דדי 2016<span>1:10</span></h2>
<a class="popup-youtube" href="https://www.youtube.com/watch?v=e-kju5gI8dw"><img alt="" class="w-100" src="images/home_video_party.png" /> </a></div>

<div class="col-12 col-md-6 home_videos">
<h2>מסיבת שוגר דדי 2016<span>1:10</span></h2>
<a class="popup-youtube" href="https://www.youtube.com/watch?v=e-kju5gI8dw"><img alt="" class="w-100" src="images/home_video_party.png" /> </a></div>',
                'active' => 1,
                'created_at' => '2019-07-02 11:44:29',
                'updated_at' => '2019-07-02 11:45:05',
            ),
        ));
        
        
    }
}