<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addFriend($id)
    {
        if ($id != Auth::id()) {
            $user = User::find(Auth::id());
            $user_partner = User::where('id', $id)->first();
            $fStatus = $user->friendStatus($id)->first();
            if ($fStatus != null && $fStatus->pivot->status == "request") {
                $user->userFriend(null)->updateExistingPivot($id, ['status' => 'friend']);
                $user->friendUser()->updateExistingPivot($id, ['status' => 'friend']);
            } else
    		if ($fStatus == null) {
                $user->userFriend($id)->attach($id, ['status' => 'send']);
                $user->friendUser($id)->attach($id, ['status' => 'request']);
                if ($user_partner->new_friend_send)
                    \App\Jobs\SendMail::dispatch("emails.friend_add", $user_partner->email, $user_partner->name, $user, '', "Новый запрос в друзья на сайте Saggar")->onQueue('default');
            }
        }
        return redirect()->route('profile.show', [$id]);
    }
    public function toogle_favorite(Request $request)
    {
        $user = Auth::user();
        $id = $request->id;
        $user->favoritesuser()->toggle($id);
        return redirect()->route('profile.show', [$id]);
    }
    public function delFriend($id)
    {
        if ($id != Auth::id()) {
            $user = User::find(Auth::id());
            $fStatus = $user->friendStatus($id)->first();
            if ($fStatus != null && $fStatus->pivot->status == "friend") {
                $user->userFriend(null)->updateExistingPivot($id, ['status' => 'request']);
                $user->friendUser()->updateExistingPivot($id, ['status' => 'send']);
            }
        }
        return redirect()->route('profile.show', [$id]);
    }

    public function ToBlacklist(Request $request)
    {
        $id = $request->user_id;
        $user = User::find(Auth::id());
        $user->blacklistUser()->toggle($id);
        if ($user->is_ignore($id))
            return "В черном списке";
        else
            return "Разблокирован";
    }
}
