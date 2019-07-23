<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserImage;
use App\Model\ImageComment;
use App\User;
use Auth;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function toggle_like(Request $request)
    {
        $image = UserImage::where('id', $request->image_id)->first();
        if (!$image->user_likes->contains(Auth::id()) && Auth::id() != $image->user->id && $image->user->like_me_send)
            \App\Jobs\SendMail::dispatch("emails.like_me", $image->user->email, $image->user->name, Auth::user(), '', "Вашу фотографию оценили на сайте Saggar")->onQueue('default');
        if ($image) {
            $image->user_likes()->toggle(Auth::id());
            return  json_encode(['result' => $image->user_likes()->get()->contains(Auth::id()), 'count' => $image->user_likes()->get()->count()]);
        }
    }
    public function add_comment(Request $request)
    {
        if ($request->image_id && $request->text) {
            $comment = new ImageComment;
            $comment->img_id = $request->image_id;
            $comment->user_id = Auth::id();
            $comment->text = $request->text;
            $comment->save();
            $comment = ImageComment::with('user', 'img')->find($comment->id);
            if ($comment->img->user->new_comment_send && $comment->user->id != $comment->img->user->id)
                \App\Jobs\SendMail::dispatch("emails.new_comment", $comment->img->user->email, $comment->img->user->name, $comment->user, '', "Новый коментарий под вашим фото на сайте Saggar")->onQueue('default');
            return view('profile.parts.comment', ['comment' => $comment]);
        }
    }
    public function del_image(Request $request)
    {
        if ($request->image_id) {
            $image = UserImage::find($request->image_id);
            if ($image)
                if ($image->user->id == Auth::id()) {
                    $image->delete();
                    return "true";
                }
        }
    }
    public function add_image(Request $request)
    {
        if ($request->file('src')) {
            $extension = $request->file('src')->getClientOriginalExtension();
            $dir = 'storage/uploads/' . Auth::user()->email;
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $request->file('src')->move($dir, $filename);
            $image = new UserImage;
            $image->user_id = Auth::id();
            $image->src = $dir . '/' . $filename;
            $image->confidentiality = $request->confidentiality;
            $image->description = $request->discription;
            $image->save();
        }
        return redirect()->back();
    }
    public function del_comment(Request $request)
    {
        if ($request->comment_id) {
            $comment = ImageComment::find($request->comment_id);
            if ($comment)
                if ($comment->user->id == Auth::id()) {
                    $comment->delete();
                    return "true";
                }
        }
    }
    //СОхранение авы
    public function avatar_save(Request $request)
    {
        $extension = $request->file('0')->getClientOriginalExtension();
        $dir = 'storage/uploads/' . Auth::user()->email;
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $request->file('0')->move($dir, $filename);
        if (Auth::user()->avatar != "/images/no_avatar.png")
            unlink(Auth::user()->avatar);
        Auth::user()->avatar = $dir . "/" . $filename;
        Auth::user()->save();
        return "/" . Auth::user()->avatar;
    }
}
