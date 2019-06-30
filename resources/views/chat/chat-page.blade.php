@extends('layouts.page_with_menu')
@section('content')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link href="{{ asset('css/chat.css')}}" rel="stylesheet">
<script src="{{ asset('js/autobahn.min.js')}}"></script>
<div class="container-fluid h-100 my-4">
	<div class="row justify-content-center h-100">
		<div class="col-md-4 col-xl-3 chat">
			@include('chat.userlist-chat')
		</div>
		<div class="col-md-8 col-xl-6 chat_panel">
			<style>
				.message-single {
					justify-content: flex-end;
				}
				.user_{{$current_user->id}}
				{
					justify-content: flex-start !important;
				}
			</style>
			@foreach($channels as $channel)
			@include('chat.chat')
			@endforeach
		</div>
	</div>
</div>
<script>
    var conn = new ab.connect(
        'ws://127.0.0.0:8080',
        function(session) {
            @foreach ($channels as $channel)
            session.subscribe('{{$channel->key}}', function(topic, data) {
                console.log("New data:topic_id: " + topic);
               $('#chat-'+data.data.id+'>.msg_card_body').append(data.data.text);
            });
            @endforeach
        },
        function(code, reason, detail) {
            console.warn('WebSocket connection closed: code=' + code + '; reason=' + reason + '; detail=' + detail);
        }, {
            'maxRetries': 60,
            'retryDelay': 400,
            'skipSubprotocolCheck': true
        }
    );
</script>
@endsection