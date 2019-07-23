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
  protected $guarded = [];

  public function isAdmin()
  {
    return $this->is_admin;
  }
  //Город
  public function city()
  {
    return $this->belongsTo('App\Model\City', 'city_id', 'id');
  }
  //Изображения
  public function gallery()
  {
    return $this->hasMany('App\Model\UserImage', 'user_id', 'id')->with('comments');
  }
  //Обратная связь
  public function feedbacks()
  {
    return $this->hasMany('App\Model\Feedback', 'user_id', 'id');
  }
  //Сообщения по каналу
  public function messages($channel)
  {
    return $this->hasMany('App\Model\Message', 'user_id', 'id')->where('parent_id', $channel);
  }
  //все сообщения
  public function messagesall()
  {
    return $this->hasMany('App\Model\Message', 'user_id', 'id');
  }
  //Каналы
  public function channels()
  {
    return $this->belongsToMany('App\Model\Channel', 'user_to_channel', 'user_id', 'channel_id')->with('users', 'messages');
  }
  //Лайки
  public function likes_image()
  {
    return $this->belongsToMany('App\Model\UserImage', 'user_to_like', 'user_id', 'image_id');
  }
  //Профессия
  public function professionRel()
  {
    return $this->belongsTo('App\Model\Profession', 'profession', 'id');
  }
  //Коментарии
  public function comments()
  {
    return $this->hasMany('App\Model\ImageComment', 'user_id', 'id');
  }
  //Религия
  public function religionRel()
  {
    return $this->belongsTo('App\Model\Religion', 'religion', 'id');
  }
  //Хобби
  public function hobbyRel()
  {
    return $this->belongsToMany('App\Model\Hobby', 'hobby_user', 'user_id', 'hobby_id');
  }
  //Языки
  public function languageRel()
  {
    return $this->belongsToMany('App\Model\Language', 'language_user', 'user_id', 'language_id');
  }
  //связь между юзером один и юзером 2. Друзья
  public function userFriend()
  {
    return $this->belongsToMany('App\User', 'friends_list', 'user_id', 'user2_id');
  }
  //связь между юзером один и юзером 2. Друзья обратное отношения
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
  // связь между юзером один и юзером 2. Просмотры
  public function reviewUser()
  {
    return $this->belongsToMany('App\User', 'review_list', 'user_id', 'user2_id')->withTimestamps()->withPivot('created_at');
  }
  // связь между юзером один и юзером 2. Просмотры. обратное отношение
  public function userReview()
  {
    return $this->belongsToMany('App\User', 'review_list', 'user2_id', 'user_id')->withTimestamps();
  }

  public function reviewList($value) // возвращает список новых гостей
  {
    return $this->belongsToMany('App\User', 'review_list', 'user2_id', 'user_id')->wherePivot('chek', $value);
  }
  // связь между юзером один и юзером 2. Избранное
  public function usersfavorite()
  {
    return $this->belongsToMany('App\User', 'favorite_to_user', 'user_id', 'user2_id')->withTimestamps();
  }
  // связь между юзером один и юзером 2. Избранное. обратное отношение
  public function favoritesuser()
  {
    return $this->belongsToMany('App\User', 'favorite_to_user', 'user2_id', 'user_id')->withTimestamps();
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
  public function getGenderAttribute()
  {
    $value = $this->gender_id;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$gender[$value]];
    else return $value;
  }
  public function getSocStatusAttribute()
  {
    $value = $this->soc_status_id;
    if ($value !== null)
      return self::$soc_status[0][$value];
    else return $value;
  }

  public function getOrientationAttribute()
  {
    $value = $this->orientation_id;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$orientation[$value]];
    else return $value;
  }
  public function orentation_name($value)
  { }
  public function getTargetAttribute($value)
  {
    $value = $this->target;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$target[$value]];
    else return $value;
  }

  public function getAvailabilitySlugAttribute()
  {
    $value = $this->availability;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$availability[$value]];
    else return $value;
  }

  public function getBodyTypeSlugAttribute()
  {
    $value = $this->body_type;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$body_type[$value]];
    else return $value;
  }
  public function getEducationSlugAttribute()
  {
    $value = $this->education;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$education[$value]];
    else return $value;
  }

  public function getColorHairSlugAttribute()
  {
    $value = $this->color_hair;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$color_hair[$value]];
    else return $value;
  }

  public function getColorEyeSlugAttribute()
  {
    $value = $this->color_eye;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$color_eye[$value]];
    else return $value;
  }

  public function getMaritalStatusSlugAttribute()
  {
    $value = $this->marital_status;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$marital_status[$value]];
    else return $value;
  }
  ////////////////
  public function getDrinkSlugAttribute()
  {
    $value = $this->drink;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$drink[$value]];
    else return $value;
  }

  public function getSmokingSlugAttribute()
  {
    $value = $this->smoking;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$smoking[$value]];
    else return $value;
  }

  public function getChildrenSlugAttribute()
  {
    $value = $this->children;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$children[$value]];
    else return $value;
  }

  public function getIncomeLevelSlugAttribute()
  {
    $value = $this->income_level;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$income_level[$value]];
    else return $value;
  }

  public function getISponsorSlugAttribute()
  {
    $value = $this->i_sponsor;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$i_sponsor[$value]];
    else return $value;
  }

  public function getYouSponsorSlugAttribute()
  {
    $value = $this->you_sponsor;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$you_sponsor[$value]];
    else return $value;
  }

  public function getRelationshipGoalSlugAttribute()
  {
    $value = $this->relationship_goal;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$relationship_goal[$value]];
    else return $value;
  }

  public function getYouDrinkSlugAttribute()
  {
    $value = $this->you_drink;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$drink[$value]];
    else return $value;
  }

  public function getYouSmokingSlugAttribute()
  {
    $value = $this->you_smoking;
    if ($value !== null)
      return ['key' => $value, 'value' => self::$smoking[$value]];
    else return $value;
  }
}
