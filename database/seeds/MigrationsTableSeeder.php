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
                'id' => 3,
                'migration' => '2019_06_06_095927_create_profile_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 303,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 2,
            ),
            2 => 
            array (
                'id' => 304,
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 2,
            ),
            3 => 
            array (
                'id' => 305,
                'migration' => '2019_06_06_101857_create_soc_status_table',
                'batch' => 2,
            ),
            4 => 
            array (
                'id' => 306,
                'migration' => '2019_06_06_102011_create_target_table',
                'batch' => 2,
            ),
            5 => 
            array (
                'id' => 307,
                'migration' => '2019_06_06_102040_create_origin_table',
                'batch' => 2,
            ),
            6 => 
            array (
                'id' => 308,
                'migration' => '2019_06_07_145723_create_jobs_table',
                'batch' => 2,
            ),
            7 => 
            array (
                'id' => 309,
                'migration' => '2019_06_08_103838_create_cities_table',
                'batch' => 2,
            ),
            8 => 
            array (
                'id' => 310,
                'migration' => '2019_06_08_202904_areas',
                'batch' => 2,
            ),
            9 => 
            array (
                'id' => 311,
                'migration' => '2019_06_09_144535_create_professions_table',
                'batch' => 2,
            ),
            10 => 
            array (
                'id' => 312,
                'migration' => '2019_06_09_185509_create_religions_table',
                'batch' => 2,
            ),
            11 => 
            array (
                'id' => 313,
                'migration' => '2019_06_13_130209_create_hobbies_table',
                'batch' => 2,
            ),
            12 => 
            array (
                'id' => 314,
                'migration' => '2019_06_13_130450_create_hobby_user_table',
                'batch' => 2,
            ),
            13 => 
            array (
                'id' => 315,
                'migration' => '2019_06_13_174841_create_languages_table',
                'batch' => 2,
            ),
            14 => 
            array (
                'id' => 316,
                'migration' => '2019_06_13_174956_create_language_user_table',
                'batch' => 2,
            ),
            15 => 
            array (
                'id' => 317,
                'migration' => '2019_06_14_103831_create_cache_table',
                'batch' => 2,
            ),
            16 => 
            array (
                'id' => 318,
                'migration' => '2019_06_14_133940_create_friends_list_table',
                'batch' => 2,
            ),
            17 => 
            array (
                'id' => 319,
                'migration' => '2019_06_17_083105_backlist_users',
                'batch' => 2,
            ),
            18 => 
            array (
                'id' => 320,
                'migration' => '2019_06_17_164326_create_user_images_table',
                'batch' => 2,
            ),
            19 => 
            array (
                'id' => 321,
                'migration' => '2019_06_17_164347_create_image_comments_table',
                'batch' => 2,
            ),
            20 => 
            array (
                'id' => 322,
                'migration' => '2019_06_19_123456_create_review_list_table',
                'batch' => 2,
            ),
            21 => 
            array (
                'id' => 323,
                'migration' => '2019_06_24_111954_user_to_like',
                'batch' => 2,
            ),
            22 => 
            array (
                'id' => 324,
                'migration' => '2019_06_28_170012_create_channels_table',
                'batch' => 2,
            ),
            23 => 
            array (
                'id' => 325,
                'migration' => '2019_06_28_170035_create_messages_table',
                'batch' => 2,
            ),
            24 => 
            array (
                'id' => 326,
                'migration' => '2019_06_28_170802_user_to_channel',
                'batch' => 2,
            ),
            25 => 
            array (
                'id' => 327,
                'migration' => '2019_07_03_142238_create_feedback_table',
                'batch' => 2,
            ),
            26 => 
            array (
                'id' => 328,
                'migration' => '2019_07_04_084255_settingsuser',
                'batch' => 2,
            ),
            27 => 
            array (
                'id' => 329,
                'migration' => '2019_07_06_121103_favorite_to_user',
                'batch' => 2,
            ),
        ));
        
        
    }
}