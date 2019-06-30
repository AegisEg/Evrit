<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;

class User extends Authenticatable
{
  use Notifiable;
  public static $gender = array(0 => 'Мужчина', 1 => 'Женщина');
  static $orientation = [0 => 'Все', 2 => 'Женщина', 1 => 'Мужчина'];
  public static $soc_status = [0 => [0 => 'Sugar duddy', 1 => 'Suggar babe'], 1 => [0 => 'Suggar mama', 1 => 'Suggar baby']];
  static $target = [0 => 'Sugar duddy', 1 => 'Suggar babe', 2 => 'Suggar mama', 3 => 'Suggar baby']; // кого ищет пользователь
  static $availability = [0 => 'Всегда', 1 => 'Иногда', 2 => 'Ночью']; // поправить
  static $body_type = [0 => 'Атлетическое', 1 => 'Средний', 2 => 'Полный', 3 => 'Приятная полнота', 4 => 'Стройный']; // поправить
  static $education = [0 => 'Средняя школа', 1 => 'Колледж', 2 => 'Студент', 3 => 'Первая степень', 4 => 'Высшее образование', 5 => 'Вторая степень', 6 => 'Третья степень', 7 => 'Школа жизни'];
  static $color_hair = [0 => 'Черный', 1 => 'Коричневый', 2 => 'Светло-коричневый', 3 => 'Белый', 4 => 'Рыжий', 5 => 'Серый', 6 => 'Плешивый', 7 => 'Другое'];
  static $color_eye = [0 => 'Черный', 1 => 'Синий', 2 => 'Коричневый', 3 => 'Зеленый', 4 => 'Серый'];
  static $marital_status = [0 => 'Свободен', 1 => 'Разведен', 2 => 'Супруг / Супруга', 3 => 'Женат, но ищу острых ощущений', 4 => 'Свободные отношения', 7 => 'Другое'];
  static $drink = [0 => 'Никогда', 1 => 'В компании', 2 => 'Редко', 3 => 'Часто', 4 => 'Пытаюсь бросить', 5 => 'Бросил'];
  static $smoking = [0 => 'Никогда', 1 => 'Курильщик', 2 => 'В компании', 3 => 'Здесь и там', 4 => 'Пытаюсь бросить', 5 => 'Бросил'];
  static $children = [0 => 'No', 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => 'Более 5'];
  static $income_level = [0 => 'Менее $10,000', 1 => '$10,000 - $15,000', 2 => '$15,000 - $30,000', 3 => 'Более $30,000', 4 => 'Я очень богат'];
  static $i_sponsor = [0 => 'Основные потребности', 1 => 'Основные потребности + подарки', 2 => 'Мой благодетель', 3 => 'Дорогой образ жизни'];
  static $you_sponsor = [0 => 'Основные потребности', 1 => 'Основные потребности + подарки', 2 => 'Мой благодетель', 3 => 'Дорогой образ жизни'];
  static $relationship_goal = [0 => 'Куда бы вы не приехали, мы приедем', 1 => 'Компании, подарки и развлечения', 2 => 'Только для переписки', 3 => 'Контакт для брака'];
  // static $you_drink = [0=>'Никогда', 1 =>'В компании', 2=>'Редко', 3 =>'Часто', 4=>'Пытаюсь бросить', 5 =>'Бросил'];
  // static $you_smoking = [0=>'Никогда', 1 =>'Курильщик', 2=>'В компании', 3 =>'Здесь и там', 4=>'Пытаюсь бросить', 5 =>'Бросил'];
  // Не нужны, в ниж жи такие же значения как и в drink,smoking
  protected $guarded = [];
  public function isAdmin()
  {
    return $this->is_admin;
  }
  public function city()
  {
    return $this->belongsTo('App\Model\City', 'city_id', 'id');
    //Это я поправил, чтобы работал профиль. Это обратное отношение
  }
  public function gallery()
  {
    return $this->hasMany('App\Model\UserImage', 'user_id', 'id')->with('comments');
  }
  public function messages($channel)
  {
    return $this->hasMany('App\Model\Message', 'user_id', 'id')->where('parent_id', $channel);
  }
  public function likes_image()
  {
    return $this->belongsToMany('App\Model\UserImage', 'user_to_like', 'user_id', 'image_id');
  }
  public function professionRel()
  {
    return $this->belongsTo('App\Model\Profession', 'profession', 'id');
  }
  public function comments()
  {
    return $this->hasMany('App\Model\ImageComment', 'user_id', 'id');
  }
  public function religionRel()
  {
    return $this->belongsTo('App\Model\Religion', 'religion', 'id');
  }

  public function hobbyRel()
  {
    return $this->belongsToMany('App\Model\Hobby', 'hobby_user', 'user_id', 'hobby_id');
  }

  public function languageRel()
  {
    return $this->belongsToMany('App\Model\Language', 'language_user', 'user_id', 'language_id');
  }

  public function userFriend($value) // связь между юзером один и юзером 2
  {
    return $this->belongsToMany('App\User', 'friends_list', 'user_id', 'user2_id');
  }

  public function friendUser()
  {
    return $this->belongsToMany('App\User', 'friends_list', 'user2_id', 'user_id');
  }

  public function friendListToStatus($value) // возвращает список юзеров в зависимости от статуса
  {
    return $this->belongsToMany('App\User', 'friends_list', 'user_id', 'user2_id')->wherePivot('status', $value);
  }

  public function friendStatus($value) // определяет статус "дружбы" между двумя юзерами
  {
    return $this->belongsToMany('App\User', 'friends_list', 'user_id', 'user2_id')->withPivot('status')->wherePivot('user2_id', $value);
  }

  public function reviewUser() // связь между юзером один и юзером 2
  {
    return $this->belongsToMany('App\User', 'review_list', 'user_id', 'user2_id');
  }

  public function userReview()
  {
    return $this->belongsToMany('App\User', 'review_list', 'user2_id', 'user_id');
  }

  public function reviewList($value) // возвращает список новых гостей
  {
    return $this->belongsToMany('App\User', 'review_list', 'user2_id', 'user_id')->wherePivot('chek', $value);
  }


  public function blacklistUser()
  {
    return $this->belongsToMany('App\User', 'blacklist', 'user2_id', 'user_id');
  }
  //Есть ли в товоем ЧС
  public function is_ignore($id)
  {
    return $this->blacklistUser->contains($id);
  }
  //Есть ли ты в его ЧС
  public function is_you_ignore($id)
  {
    $user = User::with('blacklistUser')->find($id);
    return $user->blacklistUser->contains($this->id);
  }
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function isOnline()
  {
    return Cache::has('user-is-online-' . $this->id);
  }

  public function sendPasswordResetNotification($token)
  {
    //$this->notify(new ResetPasswordNotification($token));
    \App\Jobs\SendMail::dispatch("emails.reset-pass", $this->email, $this->name, $token, "", "Сброс пароля")->onQueue('default');
  }
  public function getGenderIdAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$gender[$value]];
    else return $value;
  }
  public function getSocStatusIdAttribute($value)
  {
    if ($value !== null)
      return self::$soc_status[0][$value];
    else return $value;
  }

  public function getOrientationIdAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$orientation[$value]];
    else return $value;
  }
  public function orentation_name($value)
  { }
  public function getTargetIdAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$target[$value]];
    else return $value;
  }

  public function getAvailabilityAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$availability[$value]];
    else return $value;
  }

  public function getBodyTypeAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$body_type[$value]];
    else return $value;
  }
  public function channels()
  {
    return $this->belongsToMany('App\Model\Channel', 'user_to_channel', 'user_id', 'channel_id')->with('users','messages');
  }
  public function getEducationAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$education[$value]];
    else return $value;
  }

  public function getColorHairAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$color_hair[$value]];
    else return $value;
  }

  public function getColorEyeAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$color_eye[$value]];
    else return $value;
  }

  public function getMaritalStatusAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$marital_status[$value]];
    else return $value;
  }

  public function getDrinkAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$drink[$value]];
    else return $value;
  }

  public function getSmokingAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$smoking[$value]];
    else return $value;
  }

  public function getChildrenAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$children[$value]];
    else return $value;
  }

  public function getIncomeLevelAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$income_level[$value]];
    else return $value;
  }

  public function getISponsorAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$i_sponsor[$value]];
    else return $value;
  }

  public function getYouSponsorAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$you_sponsor[$value]];
    else return $value;
  }

  public function getRelationshipGoalAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$relationship_goal[$value]];
    else return $value;
  }

  public function getYouDrinkAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$drink[$value]];
    else return $value;
  }

  public function getYouSmokingAttribute($value)
  {
    if ($value !== null)
      return ['key' => $value, 'value' => self::$smoking[$value]];
    else return $value;
  }
}
