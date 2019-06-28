<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Message;
use App\Model\Channel;
use App\Classes\Socket\Pusher;
use Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $current_user = Auth::user();
        $info['current_user'] = $current_user;
        $info['channels'] = $info['current_user']->channels;
        foreach ($info['channels'] as $channel) {
            $channel['interlocutor'] = $channel->users->where('id', '!=', $current_user->id)->first();
        }
        return view('chat.chat-page', $info);
    }
    public function send_message(Request $request)
    {
        $channel = Channel::where('key', $request->key)->first();        
        if ($channel) {
            self::socketMessage($channel, $request);
        }
        else {
            $channel=new Channel;
            $channel->key=bcrypt((string)$request->from_user."to".$request->to_user);
            $channel->save();
            $channel->users()->attach([$request->from_user,$request->to_user]);            
            self::socketMessage($channel, $request);           
        }
    }
    public static function socketMessage($channel,Request $request)
    {
        $message=new Message;
        $message->parent_id=$channel->id;
        $message->user_id=Auth::id();
        $message->text=$request->text;
        $message->save();
        $data = [
            'topic_id' => $channel->key,
            'data' => [
                'text' => view('chat.parts.message',['message'=>$message])->render(),
                'id'=>$channel->id
            ]
        ];
        Pusher::sentDataToServer($data);
    }
}
