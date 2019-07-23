<header>
    <div class="container mr-0">
        <div class="row mx-0">
            <div class="col-12 @if(!Auth::check()) col-md-5 @else col-md-9 pb-5 @endif  pb-md-0 row mx-0 align-items-center text-center text-md-right px-0 order-2 order-md-0">
                @if(!Auth::check())
                <div class="col-6">
                    <a href="{{route('register')}}" class="stretched-link py-2 free_reg">
                        Регистрация
                    </a>
                </div>
                <div class="col-6">
                    <a href="{{route('login')}}" class="stretched-link py-2">
                        Вход
                    </a>
                </div>
                @else
                <div class="col-12 order-1 order-md-0 col-md-6 col-lg-4 row mx-0 user_menu align-items-center py-3">
                    <div class="col-4 menu_open_div text-center " id="sidebarCollapse">
                        <img class="menu_open mx-auto" src="/images/burger.png" alt="">
                    </div>
                    <div class="col-8 px-1">
                        <span class="mr-2">{{Auth::user()->name}}</span>
                    </div>
                    <nav id="sidebar" class="text-right">
                        <ul class="list-unstyled components">
                            <li><a href="{{route('profile.search')}}"><i class="fa fa-search"></i> Поиск</a></li>
                            <li><a href="{{route('profile.myprofile')}}"><i class="fa fa-id-card pl-2"></i> Мой профиль</a></li>
                            <li><a href="/profile?gallery=true"><i class="fa fa-image"></i> Моя галлерея</a></li>      
                            <li><a href="{{route('profile.friend')}}?friend_list"><i class="fa fa-handshake"></i> Мои друзья</a></li>  
                            <li><a href="{{route('profile.friend')}}?friend_requests"><i class="fa fa-question"></i> Заявки в друзья</a></li>                     
                            <li><a href="{{route('messages.index')}}"><i class="fa fa-envelope"></i> Сообщения</a></li>
                            <li><a href="{{route('profile.favorites')}}"><i class="fa fa-heart pl-2"></i> Мой избранные</a></li>
                            <li><a href="{{route('blacklistpage')}}"><i class="fa fa-times-circle pl-2"></i> Черный список</a></li>
                            <li><a href="{{route('profile.settings')}}"><i class="fa fa-cogs"></i> Настройки</a></li>
                            <li><a href="{{route('logout')}}">Выйти <i class="fas fa-sign-out-alt"></i></a></li>                            
                        </ul>
                    </nav>
                </div>
                <div class="col-12 order-0 order-md-1 d-md-flex col-md-4 col-lg-6 row mx-0 icon_menu text-center align-items-center">
                    <div class="col-4 py-3"><a href="{{route('profile.search')}}"><i class="fa fa-search"></i></a></div>
                    <div class="col-4 py-3"><a href="{{route('messages.index')}}"><i class="fa fa-envelope position-relative"><span id="count_message" class="@if($count_unreadble_message==0) invise @endif">{{$count_unreadble_message}}</span></i></a></div>
                    <div class="col-4 py-3">
                        <i class="fa fa-users"></i>
                        <ul class="list-group sub_menu">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{route('profile.friend')}}?friend_requests">
                                    Заявки в друзья
                                    <span class="badge badge-primary badge-pill">{{$count_friend_request}}</span>
                                </a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{route('profile.guest')}}">
                                    Кто меня смотрел
                                    <span class="badge badge-primary badge-pill">{{$count_guest}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>
            @if(!Auth::check())
            <nav class="col-12 col-md-4 row mx-0 my-4 my-md-0 text-center text-md-right menu align-items-center order-1 order-md-1">
                <div class="position-relative mx-auto mx-md-3">
                    <a href="{{route('rule')}}" class="stretched-link py-2">
                        Правила сайта
                    </a>
                </div>
                <div class="position-relative mx-auto mx-md-3">
                    <a href="{{route('about_us')}}" class="stretched-link py-2">
                        Как это работает?
                    </a>
                </div>
            </nav>
            @endif
            <div class="col-12 col-md-3 order-0 order-md-2">
                <img src="/images/google.png" class="logo" alt="">
                <a href="{{route('home')}}" class="stretched-link py-2">
                </a>
            </div>
        </div>
    </div>
</header>