<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\ImageComment;
use App\Model\UserImage;
use Illuminate\Http\Request;
use Auth;
use DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function guestPage()
    {
        $info['data'] = User::with('city')->find(Auth::id());
        $info['owner'] = 1;
        $info['guest_list'] = User::find(Auth::id())->userReview()->get()->reverse();
        $info['myreview_list'] = User::find(Auth::id())->reviewUser()->get()->reverse();
        DB::update('update review_list set chek = true where user2_id = ?', [Auth::id()]);
        return view('pages.guest_page', $info);
    }

    public function friendPage()
    {
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
        return view('pages.blacklist_page', $info);
    }
    public function show($id)
    {
        $auth_user = User::find(Auth::id());
        $info['last_users'] = User::orderBy('id', 'desc')->take(12)->get();
        $info['data'] = User::with('religionRel', 'professionRel', 'city', 'hobbyRel', 'gallery')->find($id);
        if ($info['data']) {
            if ($info['data']->id != Auth::id()) {
                $info['is_you_ignore'] = $auth_user->is_you_ignore($id);
                $fStatus = $auth_user->friendStatus($id)->first();
                if ($fStatus) {
                    $info['fStatus'] = $fStatus->pivot->status;
                } else {
                    $info['fStatus'] = null;
                }
                if ($info['fStatus']!="friend") {
                    $info['data']->gallery = $info['data']->gallery->reject(function ($value, $key) {
                        return $value->confidentiality == 1;
                    });
                }
                $info['is_ignore'] = $auth_user->is_ignore($id);
                $info['owner'] = 0;
                $auth_user->reviewUser()->detach($id);
                $auth_user->reviewUser()->attach($id);
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

    public function myprofile()
    {
        $info['last_users'] = User::orderBy('id', 'desc')->take(12)->get();
        $info['data'] = User::with('religionRel', 'professionRel', 'city', 'hobbyRel', 'gallery')->find(Auth::id());
        $info['owner'] = Auth::id() == $info['data']->id;
        $info['is_you_ignore'] = 0;
        $info['is_ignore'] = 0;
        return view('profile.index', $info);
    }
}
