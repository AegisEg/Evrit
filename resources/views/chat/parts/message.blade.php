<div class="d-flex message-single user_{{$message->user->id}} mb-4">
    <div class="img_cont_msg">
        <img src="{{$message->user->avatar}}" class="rounded-circle user_img_msg">
    </div>
    <div class="msg_cotainer @if($message->user->gender==1) pinky @endif">
        {{$message->text}}
        <span class="msg_time">{{$message->created_at}}</span>
    </div>
</div>