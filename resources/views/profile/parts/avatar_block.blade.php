<img src="{{$data->avatar}}" id="avatar_profile" class="w-100" alt="">
@if($owner)
<form id="edit_avatar_form">
    <input type="file" id="edit_avatar" name="avatar_image" accept="image/x-png,image/gif,image/jpeg" hidden>
</form>
@endif
@if($data->name)<h2 class="py-1 my-0">{{$data->name}}</h2>@endif
@if($data->isOnline())<p class="py-1 my-0"><i class="online fa fa-circle pl-2"></i> В сети </p>@endif
@if($data->birthday)<p class="py-1 my-0">Возрст: <?php echo date('Y', (time() - strtotime($data->birthday))) - 1970 ?></p>@endif
@if($data->city->name)<p class="py-1 my-0"><i class="location_ico pl-1 fa fa-street-view"></i>{{$data->city->name}}</p>@endif
@if(!$owner)
	@if(!$is_you_ignore&&!$is_ignore)
		<form action="{{ route('profile.edit') }}" class="row mx-0" method="post">
			@if($fStatus == "request") Этот пользователь хочет стать вашим другом @endif
			@if($fStatus == null || $fStatus == "request") <p class="py-1 my-0" id="add_to_friend"><a href="{{ route('profile.add_friend',[$data->id]) }}"><i class="fa fa-plus pl-2"></i>Добавить в друзья</a></p> @endif
			@if($fStatus == "send") Запрос на дружбу отправлен @endif
			@if($fStatus == "friend") Пользователь - ваш друг 
			<p class="py-1 my-0" id="del_friend"><a href="{{ route('profile.del_friend',[$data->id]) }}"><i class="fa fa-plus pl-2"></i>Удалить из друзей</a></p> @endif
		</form>
	@endif
	@if(!$is_ignore)
		<p class="py-1 my-0" id="to_blacklist" data-user="{{$data->id}}"><i class="fa fa-spinner loading_ico pl-2"></i><i class="fa fa-times-circle pl-2"></i>В черный список</p>
	@else
	<p class="py-1 my-0" id="to_blacklist" data-user="{{$data->id}}"><i class="fa fa-spinner loading_ico pl-2"></i><i class="fa fa-times-circle pl-2"></i>Убрать из черного списка</p>
	@endif
@endif