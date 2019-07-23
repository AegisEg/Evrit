<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settingsuser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->boolean('new_friend_send')->nullable()->default(null);
        $table->boolean('look_me_send')->nullable()->default(null);
        $table->boolean('like_me_send')->nullable()->default(null);
        $table->boolean('new_comment_send')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
