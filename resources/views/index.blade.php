@extends('layouts.page_with_menu')
@section("content")
<section class="block_one text-center" style="background-image: url(images/header.jpg)">
    <div class="conteiner py-5">
        {{get_area('main_block10')}}
        <a data-brackets-id="153" href="" class="py-2 px-5 free_reg">
            Регистрация
        </a>
    </div>
</section>
<section class="block_two text-center" style="background-image: url(images/diamonds_bg.jpg)">
    <div class="container py-5">
        <div class="row">
            {{get_area('main_section1')}}
        </div>
    </div>
</section>
<section class="block_three text-center py-5">
    <div class="container">
        {{get_area('main_block1')}}
        <div class="row image_list py-4">
            @foreach($users as $user)
            <div class="col-12 col-sm-6 col-md-3 item my-1">
                <a href="/{{$user->avatar}}" style="background-image:url('/{{$user->avatar}}')" class="popup-image stretched-link">
                </a>
            </div>
            @endforeach
        </div>
    </div>
    </div>
</section>
<section class="block_four text-center">
    <div class="container py-4">
        <div class="row mx-auto">
            <div class="col-12 col-sm-6 col-md-4 item">
                <img src="images/promise-results@3x.svg" alt="">
                {{get_area('main_block2')}}
            </div>
            <div class="col-12 col-sm-6 col-md-4 item">
                <img src="images/secure@3x.svg" alt="">
                {{get_area('main_block3')}}
            </div>
            <div class="col-12 col-sm-6 col-md-4 mx-auto item">
                <img src="images/safe@3x.svg" alt="">
                {{get_area('main_block4')}}
            </div>
        </div>
        <a data-brackets-id="153" href="{{route('register')}}" class="py-2 px-5 free_reg">
            Регистрация
        </a>
    </div>
</section>
<section class="block_five text-center" style=" background-image:url(images/testimonials.jpg);">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 my-4 item mx-auto">
                {{get_area('main_block5')}}
            </div>
            <div class="col-12 col-sm-6 col-md-4 my-4 item mx-auto">
                {{get_area('main_block5')}}
            </div>
        </div>
    </div>
</section>
<section class="block_six py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="content_block col-12 col-md-5 order-1 order-sm-0 text-right order-12">
                {{get_area('main_block7')}}
                <a href="" class="free_reg">Бесплатная регистрация</a>
            </div>
            <img src="images/mobile.png" class="col-12 order-1 order-sm-0 col-md-7" alt="">
        </div>
    </div>
</section>
<section class="block_seven text-right">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-10 col-12 post_step">
                {{get_area('main_block8')}}
            </div>
            <div class="col-md-2 col-12 text-center">
                <img src="images/ban_one.svg" class="d-md-block" alt="">
                <img src="images/ban_two.svg" class="d-md-block" alt="">
            </div>
        </div>
    </div>
</section>
<?php
// $tables = DB::select('SHOW TABLES');
// foreach($tables as $table)
// {
//      echo ",".$table->Tables_in_u4364_main;
// } 
?>
@endsection