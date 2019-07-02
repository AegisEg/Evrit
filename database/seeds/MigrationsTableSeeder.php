<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2019_06_06_095927_create_profile_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2019_06_06_101857_create_soc_status_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2019_06_06_102011_create_target_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'migration' => '2019_06_06_102040_create_origin_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'migration' => '2019_06_07_145723_create_jobs_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'migration' => '2019_06_08_103838_create_cities_table',
                'batch' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'migration' => '2019_06_08_202904_areas',
                'batch' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'migration' => '2019_06_09_144535_create_professions_table',
                'batch' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'migration' => '2019_06_09_185509_create_religions_table',
                'batch' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'migration' => '2019_06_13_130209_create_hobbies_table',
                'batch' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'migration' => '2019_06_13_130450_create_hobby_user_table',
                'batch' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'migration' => '2019_06_13_174841_create_languages_table',
                'batch' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'migration' => '2019_06_13_174956_create_language_user_table',
                'batch' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'migration' => '2019_06_14_103831_create_cache_table',
                'batch' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'migration' => '2019_06_14_133940_create_friends_list_table',
                'batch' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'migration' => '2019_06_17_083105_backlist_users',
                'batch' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'migration' => '2019_06_17_164326_create_user_images_table',
                'batch' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'migration' => '2019_06_17_164347_create_image_comments_table',
                'batch' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'migration' => '2019_06_19_123456_create_review_list_table',
                'batch' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'migration' => '2019_06_24_111954_user_to_like',
                'batch' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'migration' => '2019_06_28_170012_create_channels_table',
                'batch' => 2,
            ),
            23 => 
            array (
                'id' => 24,
                'migration' => '2019_06_28_170035_create_messages_table',
                'batch' => 2,
            ),
            24 => 
            array (
                'id' => 25,
                'migration' => '2019_06_28_170802_user_to_channel',
                'batch' => 3,
            ),
        ));
        
        
    }
}