@extends('layouts.page_with_menu')
@section('content')
<div class="container py-3 text-right">
    <h3>Настройки</h3>
    <div class="row  py-3 settings_block">
        <h5 class='col-12'>Настройка оповещений</h5>
        <p class='col-12'>Вы можете настроить получение уведомлений на электронную почту.</p>
        <p class='col-12'>Получаеть уведомления:</p>
        <form class="col-md-6 col-12" method="POST">            
            <div class="custom-control custom-checkbox py-2">
                <input type="checkbox" class="custom-control-input" id="new_friend_send" name="new_friend_send" @if($data->new_friend_send) checked @endif>
                <label class="custom-control-label" for="new_friend_send">При новом запросе в друзья</label>
            </div>
            <div class="custom-control custom-checkbox py-2">
                <input type="checkbox" class="custom-control-input" id="look_me_send" name="look_me_send" @if($data->look_me_send) checked @endif>
                <label class="custom-control-label" for="look_me_send">При просмотре вашего профиля</label>
            </div>
            <div class="custom-control custom-checkbox py-2">
                <input type="checkbox" class="custom-control-input" id="like_me_send" name="like_me_send" @if($data->like_me_send) checked @endif>
                <label class="custom-control-label" for="like_me_send">При оценке вашей фотографии</label>
            </div>
            <div class="custom-control custom-checkbox py-2">
                <input type="checkbox" class="custom-control-input" id="new_comment_send" name="new_comment_send" @if($data->new_comment_send) checked @endif>
                <label class="custom-control-label" for="new_comment_send">При создании нового коментарии под вашим фото</label>
            </div>
            @csrf
            <button type="submit" class="free_reg">Сохранить</button>
        </form>
        <hr>
        <h5 class='col-12 my-4'>Навсегда удалить профиль</h5>
        <p class='col-12'>Вы можете удалить профиль навсегда. Вся информация будет удалена и не можэет быть восстановлена.</p>
        <form class="col-md-6 col-12" action="{{route('profile.del_profile')}}" method="POST">
        @csrf
            <button type="submit" class="free_reg">Удалить</button>
        </form>
    </div>
</div>
@endsection