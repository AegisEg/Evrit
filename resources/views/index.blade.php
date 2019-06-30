@extends('layouts.page_with_menu')
@section("content")
<section class="block_one text-center" style="background-image: url(images/header.jpg)">
    <div class="conteiner py-5">
        <h4>
            Самый большой и самый успешный сайт в Израиле
        </h4>
        <h1>Встречаются состоятельные мужчины и привлекательные женщины</h1>
        <div class="ac_big">68,816</div>
        <p>активных посетителей</p>
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
        <h2>Мы уверены, что вы найдете идеальное расположение для вас
        </h2>
        <span>
            И готовы совершить первую встречу! Среди тысяч участников сайта SUGAR DADDY вы можете встретить красивых и особых друзей, которые ищут "отношения в ваших условиях"
        </span>
        <div class="row image_list py-4">
        @for ($i = 0; $i < 8; $i++)  
            <div class="col-12 col-sm-6 col-md-3 item my-1">
                <a href="images/small_image.png" class="popup-image stretched-link">
                    <img src="images/small_image.png" class="w-100" alt="">
                </a>
            </div>
            @endfor
        </div>
    </div>
    </div>
</section>
<section class="block_four text-center">
    <div class="container py-4">
        <div class="row mx-auto">
            <div class="col-12 col-sm-6 col-md-4 item">
                <img src="images/promise-results@3x.svg" alt="">
                <h3 class="plus_title">
                    Встретиться безопасно
                </h3>
                <p class="plus_text">
                    Познакомьтесь с эксклюзивным механизмом, разработанным для SUGAR DADDY, для проверки фона, чтобы предотвратить фишинг и мошенничество, благодаря которым тысячи пользователей сайта могут без опасений встречаться
                </p>
            </div>
            <div class="col-12 col-sm-6 col-md-4 item">
                <img src="images/secure@3x.svg" alt="">
                <h3 class="plus_title">
                    Встретиться безопасно
                </h3>
                <p class="plus_text">
                    Познакомьтесь с эксклюзивным механизмом, разработанным для SUGAR DADDY, для проверки фона, чтобы предотвратить фишинг и мошенничество, благодаря которым тысячи пользователей сайта могут без опасений встречаться
                </p>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mx-auto item">
                <img src="images/safe@3x.svg" alt="">
                <h3 class="plus_title">
                    Встретиться безопасно
                </h3>
                <p class="plus_text">
                    Познакомьтесь с эксклюзивным механизмом, разработанным для SUGAR DADDY, для проверки фона, чтобы предотвратить фишинг и мошенничество, благодаря которым тысячи пользователей сайта могут без опасений встречаться
                </p>
            </div>
        </div>
        <a data-brackets-id="153" href="" class="py-2 px-5 free_reg">
            Регистрация
        </a>
    </div>
</section>
<section class="block_five text-center" style=" background-image:url(images/testimonials.jpg);">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 my-4 item mx-auto">
                <img src="images/testi_2.jpg" alt="">
                <p>
                    «Мой друг рассказал мне о сайте, и я сразу же получил много запросов от особенно молодых людей и множество предложений угощений, развлечений, подарков и т. Д. Все они казались мне такими щедрыми и щедрыми.
                    Вскоре я встретил Асси, очаровательного парня (и богатого), и сразу же мы создали щелчок "
                </p>
                <b>
                    Датский, студент, Тель-Авив
                </b>
            </div>
            <div class="col-12 col-sm-6 col-md-4 my-4 item mx-auto">
                <img src="images/testi_2.jpg" alt="">
                <p>
                    «Мой друг рассказал мне о сайте, и я сразу же получил много запросов от особенно молодых людей и множество предложений угощений, развлечений, подарков и т. Д. Все они казались мне такими щедрыми и щедрыми.
                    Вскоре я встретил Асси, очаровательного парня (и богатого), и сразу же мы создали щелчок "
                </p>
                <b>
                    Датский, студент, Тель-Авив
                </b>
            </div>

        </div>
    </div>
</section>
<section class="block_six py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="content_block col-12 col-md-5 order-1 order-sm-0 text-right order-12">
                <h3 class="om_title">
                    SugarDaddy также на мобильном телефоне.
                </h3>
                <p>
                    Всегда оставайтесь на связи с Sugar Daddy, даже на мобильном телефоне, заходите на сайт с любого мобильного устройства
                </p>
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
                <h3>Мы заботимся!</h3>
                <p><b>SugarDaddy.com - это сайт знакомств,</b> созданный для отношений, основанных на общих интересах, в поддержку постоянных и настоящих отношений, а не случайных встреч (случайных знакомств), которые немедленно будут злоупотреблять нашей платформой.</p>
                <p><b>Сайт предназначен для пользователей старше 18 лет! </b>Если вы столкнулись с каким-либо пользователем или пользователем младше этого возраста, пожалуйста, немедленно сообщите нам. Мы видим в серьезности подписчиков в возрасте до 18 лет, и если существующие удалили их с сайта без возможности вернуться снова.</p>
                <p>
                    <b>Мы в Сахарном Деми против проституции. </b>В любой форме и без исключения. <br>
                    Мы работаем всеми имеющимися в нашем распоряжении средствами - людскими и технологическими - чтобы отслеживать любую деятельность, связанную с проституцией, сообщать о ней и сотрудничать с властями. <br>
                    Помогите нам стать лучшей компанией и осудите любого, кто пытается злоупотребить нашей платформой, и сообщайте нам, когда вы считаете, что другая сторона ведет себя плохо. Сообщайте нам о любых подозрительных действиях, связанных с проституцией.
                </p>
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