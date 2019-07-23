<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $info['users'] = User::all();
        if ($info['users']->count() >= 8)
            $info['users'] = $info['users']->random(8);
        else
            $info['users']->random($info['users']->count());
        return view('index',$info);
    }
    public function about()
    {
        $info['title']="О нас";
        return view('pages.about',$info);
    }
    public function rule()
    {
        $info['title']="Правила сайта";
        return view('pages.rule',$info);
    }
    public function search(Request $request)
    {
        $city = $request->city_id;
        $start_age = $request->start_age;
        $last_age = $request->last_age;
        $soc_status = $request->soc_status;
        $no_ava = $request->no_ava;
        $online = $request->online;
        $sortby = $request->sortby;
        if (!$request->count)
            $page = 1;
        else
            $page = ceil($request->count / 12) + 1;
        $profiles = User::with('city')->get();
        if ($city !== null) {
            $profiles = $profiles->where('city_id', $city);
        }
        if ($soc_status !== null) {
            $profiles = $profiles->where('soc_status', (int)$soc_status);
        }
        if ($start_age && $last_age) {
            $profiles = $profiles->where('birthday', '>', Carbon::now()->subYears($last_age))->where('birthday', '<', Carbon::now()->subYears($start_age));
        }
        if ($no_ava) {
            $profiles = $profiles->where('avatar', '!=', 'images/no_avatar.png');
        }
        if ($online) {
            $profiles = $profiles->reject(function ($value, $key) {
                return !$value->isOnline();
            });
        }
        if ($sortby == 'fresh') {
            $profiles = $profiles->sortBy('created_at');
        } else
        if ($sortby == 'popular') {
            $profiles=$profiles->sortBy(function ($profile, $key) {
                $count_likes=0;
                foreach($profile->gallery as $image)
                    $count_likes+=$image->user_likes->count();                    
                return count($profile->friendListToStatus("friend")->get())+$count_likes;
              });
        }
        $count = $profiles->count();
        $profiles = $profiles->forPage($page, 12);
        $content = "";
        if (!$profiles->isEmpty())
            foreach ($profiles as $profile) {
                $content .= '<div class="col-md-3 cart col-sm-4 col-6">';
                $content .= view('profile.parts.preview_profile', ['user' => $profile]);
                $content .= '</div>';
            } else {
            $content .= '<div class="col-12 text-center">
                            <h3>
                            Ничего не найдено
                            </h3>
                        </div>';
        }
        return json_encode(['content' => $content, 'count' => $count]);
    }
    public function search_page()
    {
		$info['title'] = "Поиск";
        $info['users'] = User::where('is_verification', '1')->get();
        $info['count'] = $info['users']->count();
        $info['users'] = $info['users']->forPage(1, 12);
        return view('profile.catalog', $info);
    }
}
