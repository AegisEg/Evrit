<div class="card @if($_GET['shell']=='chat-'.$channel->id) show active @endif" id="chat-{{$channel->id}}">
    <div class="card-header msg_head">
        <div class="d-flex bd-highlight">
            <div class="img_cont position-relative" style="background-image:url('/{{$channel->interlocutor->avatar}}')">
                @if($channel->interlocutor->isOnline())<span class="online_icon"></span>@endif
                <a href="{{route('profile.show',['id'=>$channel->interlocutor->id])}}" class="stretched-link"></a>
            </div>
            <div class="user_info m-3">
                <span>{{$channel->interlocutor->name}}</span>
                <p>@if($channel->message){{count($channel->message)}} Messages @endif</p>
            </div>
        </div>
    </div>
    <div class="card-body msg_card_body">
        @foreach ($channel->messages as $message)
        @include('chat.parts.message')
        @endforeach
    </div>
    <div class="card-footer">
        <form class="input-group chat_form" data-key="{{$channel->key}}">
            <input name="text" class="form-control type_msg" placeholder="Сообщение">
            <button type="submit" class="input-group-append">
                <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
            </button>
        </form>
    </div>
    @if($channel->is_ignore||$channel->is_you_ignore)
    <div class="lock_channel text-center">
       <h2 class="my-auto">Пользователь заблокирован для диалога</h2>
    </div>
    @endif
</div>