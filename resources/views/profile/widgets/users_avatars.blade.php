<div class="widget_avatar_users text-right">
    <div class="row mx-0 p-3 text-right">
        <h5 class="col-12">
            Наши пользователи
        </h5>
        @foreach ($last_users as $user)
        <div class="col-3 img_avatar" style="background-image:url('/{{$user->avatar}}')">
            <a href="{{route('profile.show',['id'=>$user->id])}}" class="stretched-link"></a>            
        </div>
        @endforeach

    </div>
</div>