<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('confirmation_link')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('name')->nullable();// имя пользователя (ник)
            $table->string('avatar')->default("images/no_avatar.png"); // ссылка на картинку
            $table->mediumText('description')->nullable(); // описание
            $table->date('birthday')->nullable(); // др
            $table->integer('city_id')->nullable(); // айди города
            $table->tinyInteger('gender_id')->nullable(); // пол . муж. жен.
            $table->tinyInteger('orientation_id')->nullable(); // кого ищет юзер муж. жен. оба
            $table->tinyInteger('soc_status_id')->nullable(); // отдельная таблица, кто юзер, сахарный папа, мама и тд
            $table->tinyInteger('profession')->nullable(); // отдельная таблица
            $table->tinyInteger('target_id')->nullable(); // отдельная таблица, кого ищешь - сахарный папа или мама или бейби 
            $table->tinyInteger('availability')->nullable(); // статический массив. доступность, в какое время
            $table->tinyInteger('body_type')->nullable(); // статический массив. тип телосложения
            $table->tinyInteger('education')->nullable(); // статический массив. образование
            $table->tinyInteger('color_hair')->nullable(); // статический массив. цвет волос
            $table->smallInteger('height')->nullable(); // статический массив. рост
            $table->tinyInteger('color_eye')->nullable(); // статический массив. цвет глаза
            $table->tinyInteger('marital_status')->nullable(); // статический массив. семейное положение
            $table->tinyInteger('religion')->nullable(); // отдельная таблица
            $table->tinyInteger('drink')->nullable(); // статический массив
            $table->tinyInteger('smoking')->nullable(); // статический массив
            $table->tinyInteger('children')->nullable(); // статический массив
            $table->smallInteger('start_age')->default(0)->nullable(); // просто поле - начало диапазона возраста для поиска парнетра
            $table->smallInteger('last_age')->default(0)->nullable(); // просто поле - конец диапазона возраста для поиска парнетра

            $table->tinyInteger('income_level')->nullable(); // статический массив

            $table->tinyInteger('i_sponsor')->nullable(); // статический массив

            $table->tinyInteger('you_sponsor')->nullable(); // статический массив

            $table->tinyInteger('relationship_goal')->nullable(); // статический массив

            $table->tinyInteger('you_drink')->nullable(); // статический массив

            $table->tinyInteger('you_smoking')->nullable(); // статический массив

            $table->boolean('is_admin')->default(false);
			$table->boolean('is_verification')->default(false);
			$table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
