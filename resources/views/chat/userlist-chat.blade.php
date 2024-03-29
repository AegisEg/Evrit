<div class="card mb-sm-3 mb-md-0 contacts_card">
	<div class="card-header">
		<div class="input-group">
			<input type="text" placeholder="Search..." name="" class="form-control search">
			<div class="input-group-prepend">
				<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
			</div>
		</div>
	</div>
	<div class="card-body contacts_body">
		<ui class="contacts">
			@foreach($channels as $channel)
			<li class="@if($loop->index==0) active @endif tabs_chat" data-id="chat-{{$channel->id}}">
				<div class="d-flex bd-highlight">
					<div class="img_cont">
						<img src="{{$channel->interlocutor->avatar}}" class="rounded-circle user_img">
						@if($channel->interlocutor->isOnline())<span class="online_icon"></span>@endif
					</div>
					<div class="user_info mx-2">
						<span>{{$channel->interlocutor->name}}</span>
						@if($channel->interlocutor->isOnline())<p>{{$channel->interlocutor->name}} is online</p>@endif
					</div>
				</div>
			</li>
			@endforeach
		</ui>
	</div>
	<div class="card-footer"></div>
</div>