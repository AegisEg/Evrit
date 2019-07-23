<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'neostar1996@mail.ru',
                'confirmation_link' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$0Qz7jO5TqFSWht7uXBjh.upf3d/ieguf9O.WhrpBH.8f6Kt3iFwee',
                'name' => 'Васильев Егор',
                'avatar' => 'storage/uploads/neostar1996@mail.ru/5d206649c8093_1562404425.png',
                'description' => 'выяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкпвыяаыкп выяаыкп выяаыкп выяаыкпмммм выяаыкп м ммвыяаыкп мвыяаыкп',
                'birthday' => '1970-01-01',
                'city_id' => 2,
                'gender_id' => 1,
                'orientation_id' => 2,
                'soc_status_id' => 1,
                'profession' => 3,
                'target_id' => NULL,
                'availability' => NULL,
                'body_type' => NULL,
                'education' => 5,
                'color_hair' => NULL,
                'height' => 176,
                'color_eye' => NULL,
                'marital_status' => NULL,
                'religion' => 1,
                'drink' => NULL,
                'smoking' => NULL,
                'children' => NULL,
                'start_age' => 18,
                'last_age' => 48,
                'income_level' => NULL,
                'i_sponsor' => NULL,
                'you_sponsor' => NULL,
                'relationship_goal' => 2,
                'you_drink' => NULL,
                'you_smoking' => 1,
                'is_admin' => 1,
                'is_verification' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-07-02 00:00:00',
                'updated_at' => '2019-07-06 09:13:45',
                'new_friend_send' => 0,
                'look_me_send' => 0,
                'like_me_send' => 1,
                'new_comment_send' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'email' => 'myjobgoole@gmail.com',
                'confirmation_link' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$jsjZUlm/qMb3RmTy388uv.QMF4f/75yNS46xk/vsVhD8z6hZ7zZxG',
                'name' => 'Васильев Егор',
                'avatar' => 'images/no_avatar.png',
                'description' => NULL,
                'birthday' => '2001-06-24',
                'city_id' => 2,
                'gender_id' => 1,
                'orientation_id' => 0,
                'soc_status_id' => 1,
                'profession' => NULL,
                'target_id' => NULL,
                'availability' => NULL,
                'body_type' => NULL,
                'education' => NULL,
                'color_hair' => NULL,
                'height' => NULL,
                'color_eye' => NULL,
                'marital_status' => NULL,
                'religion' => NULL,
                'drink' => NULL,
                'smoking' => NULL,
                'children' => NULL,
                'start_age' => 0,
                'last_age' => 0,
                'income_level' => NULL,
                'i_sponsor' => NULL,
                'you_sponsor' => NULL,
                'relationship_goal' => NULL,
                'you_drink' => NULL,
                'you_smoking' => NULL,
                'is_admin' => 0,
                'is_verification' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-07-05 10:54:01',
                'updated_at' => '2019-07-05 10:54:18',
                'new_friend_send' => NULL,
                'look_me_send' => NULL,
                'like_me_send' => NULL,
                'new_comment_send' => NULL,
            ),
        ));
        
        
    }
}