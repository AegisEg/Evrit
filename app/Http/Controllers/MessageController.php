<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Message;
use App\Model\Channel;
use App\Model\Feedback;
use App\Classes\Socket\Pusher;
use Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $current_user = Auth::user();
		$info['title'] = "Диалоги";
        $info['current_user'] = $current_user;
        $info['channels'] = $info['current_user']->channels;
        if (!$info['channels']->isEmpty()) {
            if (!$request->shell)
                return redirect()->route('messages.index', ['shell' => 'chat-' . $info['channels'][0]->id]);
            foreach ($info['channels'] as $channel) {
                $channel['interlocutor'] = $channel->users->where('id', '!=', $current_user->id)->first();
                $channel['is_you_ignore'] = $current_user->is_you_ignore($channel['interlocutor']->id);
                $channel['is_ignore'] = $current_user->is_ignore($channel['interlocutor']->id);
            }
            return view('chat.chat-page', $info);
        } else
            return view('chat.empty_message', $info);
    }
    public function send_message(Request $request)
    {
        $channel = Channel::where('key', $request->key)->first();
        if ($channel) {
            self::socketMessage($channel, $request);
        } else {
            $from_user = Auth::id();
            $channel = Channel::IsChanelOpen($from_user, $request->to_user);
            if (!$channel) {
                $channel = new Channel;
                $channel->key = bcrypt((string) $from_user . "to" . $request->to_user);
                $channel->save();
                $channel->users()->attach([$from_user, $request->to_user]);
            }
            self::socketMessage($channel, $request);
        }
        if (!$request->ajax)
            return redirect()->route("messages.index", ['shell' => 'chat-' . $channel->id]);
    }
    public static function socketMessage($channel, Request $request)
    {
        $user_auth = Auth::user();
        $interlocutor = $channel->users->where('id', '!=', $user_auth->id)->first();
        if (!$user_auth->is_you_ignore($interlocutor->id) && !$user_auth->is_ignore($interlocutor->id)) {
            $message = new Message;
            $message->parent_id = $channel->id;
            $message->user_id = $user_auth->id;
            $message->text = $request->text;
            $message->save();
            $data = [
                'topic_id' => $channel->key,
                'data' => [
                    'text' => view('chat.parts.message', ['message' => $message])->render(),
                    'id' => $channel->id
                ]
            ];
            Pusher::sentDataToServer($data);
        }
    }
    public static function unreadble_message()
    {
        $user = Auth::user();
        $channels = $user->channels;
        $count = 0;
        foreach ($channels as $channel) {
            $count += $channel->messages->where('user_id', '!=', $user->id)->where('is_read', null)->count();
        }
        return $count;
    }
    public  function read_message(Request $request)
    {
        $user = Auth::user();
        $id = str_replace('chat-', '', $request->id);
        $channel = $user->channels->where('id', $id)->first();
        if ($channel) {
            $count = 0;
            $messages = $channel->messages->where('user_id', '!=', $user->id)->where('is_read', null);
            foreach ($messages as $message) {
                $message->is_read = true;
                $message->save();
            }
        }
        return self::unreadble_message();
    }
    public  function send_feedback(Request $request)
    {
        if ($request->text) {
            $feedback = new Feedback;
            $feedback->user_id = Auth::id();
            $feedback->url=url()->previous();
            $feedback->text = $request->text;
            $feedback->save();
            return redirect()->back()->withInput(array('success_trouble_success' => true));
        }
        else {
            return redirect()->back()->withErrors(['all'=>'Не заполнено поле']);
        }
    }
}
