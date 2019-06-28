<div class="widget_avatar_users text-right">
                <div class="row mx-0 p-3 text-right">
                    <h5 class="col-12">
                        Наши пользователи 
                    </h5>
                    @foreach ($last_users as $user)
                    <div class="col-3">
                        <a href="{{route('profile.show',['id'=>$user->id])}}" class="stretched-link"></a>
                        <img src="{{$user->avatar}}" class="w-100" alt="">
                    </div>
                    @endforeach

                </div>
            </div>