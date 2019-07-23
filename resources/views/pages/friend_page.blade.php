@extends('layouts.page_with_menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-4 col-md-3 text-right py-3">
            @include('profile.parts.avatar_block')
        </div>
        <div class="col-md-9 py-3">
            <ul id="frined_tabs" class="nav nav-tabs row px-0 text-center">
                <li class="nav-item col-md-4 col-12">
                    <span class="nav-link @if(isset($_GET['friend_list'])) active @endif" id="friend_list-tab" data-toggle="tab" href="#friend_list" role="tab" aria-controls="home" aria-selected="true">
                        Список друзей
                    </span>
                </li>
                <li class="nav-item col-md-4 col-12">
                    <span class="nav-link @if(isset($_GET['friend_requests'])) active @endif" id="friend_requests-tab" data-toggle="tab" href="#friend_requests" role="tab" aria-controls="home">
                        Предложения дружбы
                    </span>
                </li>
                <li class="nav-item col-md-4 col-12">
                    <span class="nav-link @if(isset($_GET['my_friend_requests'])) active @endif" id="my_friend_requests-tab" data-toggle="tab" href="#my_friend_requests" role="tab" aria-controls="home">
                        Мои заявки в дружбу
                    </span>
                </li>
            </ul>
            <div class="page_list_tab tab-content p-3" id="myTabContent">
                <div class="tab-pane fade row @if(isset($_GET['friend_list'])) show active @endif" id="friend_list" role="tabpanel" aria-labelledby="friend_list-tab">
                    @foreach($friends_list as $user)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 cart">
                        @include('profile.parts.preview_profile')
                    </div>
                    @endforeach
                </div>
                <div class="tab-pane fade row @if(isset($_GET['friend_requests'])) show active @endif" id="friend_requests" role="tabpanel" aria-labelledby="friend_requests-tab">
                    @foreach($friend_requests_list as $user)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 cart">
                        @include('profile.parts.preview_profile')
                    </div>
                    @endforeach
                </div>
                <div class="tab-pane fade row @if(isset($_GET['my_friend_requests'])) show active @endif" id="my_friend_requests" role="tabpanel" aria-labelledby="my_friend_requests-tab">
                    @foreach($my_friend_requests_list as $user)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 cart">
                        @include('profile.parts.preview_profile')
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection