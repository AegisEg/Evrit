@extends('layouts.page_with_menu')
@section('content')

<div class="container py-3">
    <div class="row">
        <div class="col-12 col-sm-4 col-md-3  text-right">
            @include('profile.parts.avatar_block')
        </div>
        <div class="col-12 col-sm-8 col-md-9 col-lg-6">
            @if(!$is_you_ignore)
            <ul class="nav nav-tabs" id="profile_tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link @if(!isset($_GET['gallery'])) active @endif" id="information-tab" data-toggle="tab" href="#information" role="tab" aria-controls="home" aria-selected="true">Информация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(isset($_GET['gallery'])) active @endif" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false">Галлерея</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade @if(!isset($_GET['gallery'])) show active @endif" id="information" role="tabpanel" aria-labelledby="information-tab">
                    <div class="row mx-0 row_field">
                        <div class="col-8"><span class="pink">Личная информация</span></div>
                        <div class="col-4 text-left">
                            @if($owner)
                            <span class="pink edit" data-toggle="modal" data-target="#edit_person">
                                <i class="fa fa-edit pl-1 align-middle"></i>edit
                            </span>
                            @endif
                        </div>
                    </div>
                    @if($data->soc_status_id)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Статус:</div>
                        <div class="col-8">{!!$data->socstatus!!}</div>
                    </div>
                    @endif
                    
                    @if($data->orientation_id !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">В поисках:</div>
                        <div class="col-8">{{$data->orientation['value']}}@if($data->start_age), {{$data->start_age}}-{{$data->last_age}} лет @endif</div>
                    </div>
                    @endif
                    @if($data->city->name)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Ник:</div>
                        <div class="col-8">{{$data->name}}</div>
                    </div>
                    @endif
                    @if($data->birthday)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Дата рождения:</div>
                        <div class="col-8">{{$data->birthday}}</div>
                    </div>
                    @endif
                    @if($data->city->name)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Город:</div>
                        <div class="col-8">{{$data->city->name}}</div>
                    </div>
                    @endif
                    <div class="row mx-0 row_field">
                        <div class="col-8"><span class="pink">Данные об аккаунте</span></div>
                        <div class="col-4 text-left">
                            @if($owner)
                            <span class="pink edit" data-toggle="modal" data-target="#edit_account">
                                <i class="fa fa-edit pl-1 align-middle"></i>edit
                            </span>
                            @endif
                        </div>
                    </div>
                    @if($data->i_sponsor !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Что я могу предложить:</div>
                        <div class="col-8">{!!$data->i_sponsorslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->you_sponsor !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Чего я ожидаю:</div>
                        <div class="col-8">{!!$data->you_sponsorslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->relationship_goal !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Цель знакомства:</div>
                        <div class="col-8">{!!$data->relationship_goalslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->availability !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Доступен:</div>
                        <div class="col-8">{!!$data->availabilityslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->income_level !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Доход:</div>
                        <div class="col-8">{!!$data->income_levelslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->description)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Моя информация:</div>
                        <div class="col-8">{{$data->description}}</div>
                    </div>
                    @endif
                    @if(count($data->hobbyRel))
                    <div class="row mx-0 row_field">
                        <div class="col-4">Хобби:</div>
                        <div class="col-8">
                            @foreach ($data->hobbyRel as $hobby)
                            {{$hobby->name}}
                            @if($loop->index!=count($data->hobbyRel)-1)
                            ,
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if(count($data->languageRel))
                    <div class="row mx-0 row_field">
                        <div class="col-4">Языки:</div>
                        <div class="col-8">
                            @foreach ($data->languageRel as $language)
                            {{$language->name}}
                            @if($loop->index!=count($data->languageRel)-1)
                            ,
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <div class="row mx-0 row_field">
                        <div class="col-8"><span class="pink">О мне</span></div>
                        <div class="col-4 text-left">
                            @if($owner)
                            <span class="pink edit" data-toggle="modal" data-target="#edit_about">
                                <i class="fa fa-edit pl-1 align-middle"></i>edit
                            </span>
                            @endif
                        </div>
                    </div>
                    @if($data->professionRel)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Профессия:</div>
                        <div class="col-8">{{$data->professionRel->name}}</div>
                    </div>
                    @endif
                    @if($data->education !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Образование:</div>
                        <div class="col-8">{!!$data->educationslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->body_type !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Телосложение:</div>
                        <div class="col-8">{!!$data->body_typeslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->height)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Рост:</div>
                        <div class="col-8">{{$data->height}}</div>
                    </div>
                    @endif
                    @if($data->color_hair !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Цвет волос:</div>
                        <div class="col-8">{!!$data->color_hairslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->color_eye !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Цвет глаз:</div>
                        <div class="col-8">{!!$data->color_eyeslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->religionRel)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Религия:</div>
                        <div class="col-8">{{$data->religionRel->name}}</div>
                    </div>
                    @endif
                    @if($data->marital_status !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Семейное положение:</div>
                        <div class="col-8">{!!$data->marital_statusslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->smoking !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Курение:</div>
                        <div class="col-8">{!!$data->smokingslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->drink !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Алкоголь:</div>
                        <div class="col-8">{!!$data->drinkslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->children !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Дети:</div>
                        <div class="col-8">{!!$data->childrenslug['value']!!}</div>
                    </div>
                    @endif
                    <div class="row mx-0 row_field">
                        <div class="col-8"><span class="pink">Информация о паре</span></div>
                        <div class="col-4 text-left">
                            @if($owner)
                            <span class="pink edit" data-toggle="modal" data-target="#edit_partner">
                                <i class="fa fa-edit pl-1 align-middle"></i>edit
                            </span>
                            @endif
                        </div>
                    </div>
                    @if($data->you_smoking !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Курение:</div>
                        <div class="col-8">{!!$data->you_smokingslug['value']!!}</div>
                    </div>
                    @endif
                    @if($data->you_drink !== null)
                    <div class="row mx-0 row_field">
                        <div class="col-4">Алкоголь:</div>
                        <div class="col-8">{!!$data->you_drinkslug['value']!!}</div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade @if(isset($_GET['gallery'])) show active @endif" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                    @include('profile.parts.gallery')
                </div>
            </div>
            @else
                Вы в черном списке этого пользователя
            @endif
        </div>
        <div class="col-12 col-sm-8 mx-auto col-md-6 col-lg-3 my-4 my-lg-0  order-0 order-md-2">
            @include('profile.widgets.users_avatars')
        </div>
    </div>
</div>
@if($owner)
@include('profile.modal.edit_personal_filed')
@include('profile.modal.edit_account_filed')
@include('profile.modal.edit_about_filed')
@include('profile.modal.edit_partner_filed')
@endif
@endsection