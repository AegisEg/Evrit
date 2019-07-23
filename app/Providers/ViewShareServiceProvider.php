<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Cookie;
use App\User;
use App\Model\City;
use App\Model\Hobby;
use App\Model\Language;
use App\Model\Religion;
use App\Model\Profession;
use App\Http\Controllers\MessageController;
use Auth;

class ViewShareServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    try {

      View::share('list_gender', User::$gender);
      View::share('list_orientation', User::$orientation);
      View::share('list_soc_status', User::$soc_status);
      View::share('list_cities', City::all());
      View::share('list_i_sponsor', User::$i_sponsor);
      View::share('list_target', User::$target);
      View::share('list_availability', User::$availability);
      View::share('list_body_type', User::$body_type);
      View::share('list_education', User::$education);
      View::share('list_color_hair', User::$color_hair);
      View::share('list_color_eye', User::$color_eye);
      View::share('list_marital_status', User::$marital_status);
      View::share('list_drink', User::$drink);
      View::share('list_smoking', User::$smoking);
      View::share('list_children', User::$children);
      View::share('list_income_level', User::$income_level);
      View::share('list_you_sponsor', User::$you_sponsor);
      View::share('list_relationship_goal', User::$relationship_goal);
      View::share('list_hobby', Hobby::all());
      View::share('list_language', Language::all());
      View::share('list_religion', Religion::all());
      View::share('list_profession', Profession::all());

      view()->composer('*', function ($view) {
        if (Auth::check()) {
          $view->with('channels_list', Auth::user()->channels);
          $view->with('count_unreadble_message', MessageController::unreadble_message());
          $view->with('count_friend_request', User::find(Auth::id())->friendListToStatus("request")->count());
        }
      });
      view()->composer('*', function ($view) {
        if (Auth::check())
          $view->with('count_guest', User::find(Auth::id())->reviewList(false)->count());
      });
    } catch (\Exception $e) {
      return $e->getMessage();
    }
    \App\User::observe(\App\Observers\User::class);
    \App\Model\UserImage::observe(\App\Observers\ImageUser::class);
  }
}
