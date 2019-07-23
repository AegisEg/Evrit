<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\ImageComment;
use App\Model\UserImage;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function favoritesPage()
    {
		$info['title'] = "Избранное";
        $info['data'] = User::with('city')->find(Auth::id());
        $info['owner'] = 1;
        $info['users']=Auth::user()->favoritesuser;
        return  view('pages.favorites', $info);
    }
    public function guestPage()
    {
		$info['title'] = "Гости";
        $info['data'] = User::with('city')->find(Auth::id());
        $info['owner'] = 1;
        $info['guest_list'] = User::find(Auth::id())->userReview()->get()->reverse();
        $info['myreview_list'] = User::find(Auth::id())->reviewUser()->get()->reverse();
        DB::update('update review_list set chek = true where user2_id = ?', [Auth::id()]);
        return view('pages.guest_page', $info);
    }

    public function friendPage()
    {
		$info['title'] = "Друзья";
        $info['data'] = User::with('city')->find(Auth::id());
        $info['owner'] = 1;
        $info['friends_list'] = User::find(Auth::id())->friendListToStatus("friend")->get();
        $info['friend_requests_list'] = User::find(Auth::id())->friendListToStatus("request")->get();
        $info['my_friend_requests_list'] = User::find(Auth::id())->friendListToStatus("send")->get();
		
        return view('pages.friend_page', $info);
    }
    public function blacklistpage(Request $request)
    {
        $info['data'] = User::with('religionRel', 'professionRel', 'city', 'hobbyRel', 'blacklistUser')->find(Auth::id());
        $info['owner'] = 1;
		$info['title'] = "Черный список";
        return view('pages.blacklist_page', $info);
    }
    public function show($id)
    {
        $auth_user = User::find(Auth::id());
        $info['last_users'] = User::orderBy('id', 'desc')->take(12)->get();
        $info['data'] = User::with('religionRel', 'professionRel', 'city', 'hobbyRel', 'gallery')->find($id);
		$info['title'] = $info['data']->name;
        if ($info['data']) {
            if ($info['data']->id != Auth::id()) {
                $info['is_you_ignore'] = $auth_user->is_you_ignore($id);
                $fStatus = $auth_user->friendStatus($id)->first();
                if ($fStatus) {
                    $info['fStatus'] = $fStatus->pivot->status;
                } else {
                    $info['fStatus'] = null;
                }
                if ($info['fStatus'] != "friend") {
                    $info['data']->gallery = $info['data']->gallery->reject(function ($value, $key) {
                        return $value->confidentiality == 1;
                    });
                }
                $info['is_ignore'] = $auth_user->is_ignore($id);
                $info['owner'] = 0;
                $user_look = $auth_user->reviewUser->where('id', $id)->first();
                if ($user_look) {
                    if ($user_look->pivot->created_at < Carbon::now()->subDay()) {
                        $auth_user->reviewUser()->detach($id);
                        $auth_user->reviewUser()->attach($id);
                        if ($user_look->look_me_send)
                            \App\Jobs\SendMail::dispatch("emails.look_profile", $user_look->email, $user_look->name, $auth_user, '', "Ваш профиль посетили на сайте Saggar")->onQueue('default');
                    }
                } else {
                    $auth_user->reviewUser()->detach($id);
                    $auth_user->reviewUser()->attach($id);
                    if ($info['data']->look_me_send)
                        \App\Jobs\SendMail::dispatch("emails.look_profile", $user_look->email, $user_look->name, $auth_user, '', "Ваш профиль посетили на сайте Saggar")->onQueue('default');
                }
                return view('profile.index', $info);
            } else
                return redirect()->route('profile.myprofile');
        } else
            abort(404);
    }

    //Редактирование профиля
    public function edit(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            foreach ($request->all() as $key => $field) {
                if ($key != "_token") {
                    if ($key == 'birthday')
                        $user->$key = date("Y-m-d", strtotime($field));
                    elseif ($key == "hobby") {
                        $user->hobbyRel()->sync(array_keys($field));
                    } elseif ($key == "language") {
                        $user->languageRel()->sync(array_keys($field));
                    } elseif ($field == "null") {
                        $user->$key = null;
                    } else
                        $user->$key = $field;
                }
            }
            $user->save();
            return redirect()->route('profile.myprofile');
        } else
            abort(404);
    }
    public function settings_save(Request $request)
    {
        $user = Auth::user();
        if ($request->new_friend_send)
            $user->new_friend_send = true;
        else
            $user->new_friend_send = false;
        if ($request->look_me_send)
            $user->look_me_send = true;
        else
            $user->look_me_send = false;
        if ($request->like_me_send)
            $user->like_me_send = true;
        else
            $user->like_me_send = false;
        if ($request->new_comment_send)
            $user->new_comment_send = true;
        else
            $user->new_comment_send = false;
        $user->save();
        return redirect()->back();
    }
    public function settings_page()
    {
		$data['title'] = "Настройки";
        $data['data'] = Auth::user();

        return view('profile.settings', $data);
    }
    public function del_profile()
    {
        Auth::user()->delete();
        return redirect()->route('home');
    }
    public function myprofile()
    {
		$info['title'] = "Мой профиль";
        $info['last_users'] = User::orderBy('id', 'desc')->take(12)->get();
        $info['data'] = User::with('religionRel', 'professionRel', 'city', 'hobbyRel', 'gallery')->find(Auth::id());
        $info['owner'] = Auth::id() == $info['data']->id;
        $info['is_you_ignore'] = 0;
        $info['is_ignore'] = 0;
        return view('profile.index', $info);
    }    
}
