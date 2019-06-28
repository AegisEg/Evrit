<div class="card @if($loop->index==0) show active @endif" id="chat-{{$channel->id}}">
    <div class="card-header msg_head">
        <div class="d-flex bd-highlight">
            <div class="img_cont">
                <img src="{{$channel->interlocutor->avatar}}" class="rounded-circle user_img">
                @if($channel->interlocutor->isOnline())<span class="online_icon"></span>@endif
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
            <textarea name="text" class="form-control type_msg" placeholder="Сообщение"></textarea>
            <button class="input-group-append">
                <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
            </button>
        </form>
    </div>
</div>