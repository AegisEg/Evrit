<?php

use Illuminate\Database\Seeder;

class ReviewListTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('review_list')->delete();
        
        \DB::table('review_list')->insert(array (
            0 => 
            array (
                'id' => 15,
                'user_id' => 2,
                'user2_id' => 1,
                'chek' => 1,
                'created_at' => '2019-07-05 11:24:19',
                'updated_at' => '2019-07-05 11:24:19',
            ),
        ));
        
        
    }
}