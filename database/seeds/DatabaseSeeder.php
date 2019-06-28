<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ProfessionsTableSeeder::class);
        $this->call(ReligionsTableSeeder::class);
        $this->call(HobbiesTableSeeder::class);
        $this->call(HobbyUserTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(LanguageUserTableSeeder::class);
        $this->call(BlacklistTableSeeder::class);
        $this->call(CacheTableSeeder::class);
        $this->call(FriendsListTableSeeder::class);
        $this->call(ImageCommentsTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(OriginTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(ReviewListTableSeeder::class);
        $this->call(SocStatusTableSeeder::class);
        $this->call(TargetTableSeeder::class);
        $this->call(UserImagesTableSeeder::class);
        $this->call(UserToLikeTableSeeder::class);
        $this->call(ChannelsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(UserToChannelTableSeeder::class);
    }
}
