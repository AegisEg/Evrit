<footer class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-12 text-center text-md-right">
                <h3 class="title">Быстрые ссылки</h3>
                <ul class="row w-50 mx-auto mr-md-0 footer_menu">
                    <li class="col-6"><a href="https://sugardaddy.co.il/content/view/about" data-pjax="0">אודות שוגר דדי</a></li>
                    <li class="col-6"><a href="https://sugardaddy.co.il/content/view/how_it_works" data-pjax="0">איך זה עובד?</a></li>
                    <li class="col-6"><a href="https://sugardaddy.co.il/users/registration">הרשמה חינם</a></li>
                    <li class="col-6"><a href="https://sugardaddy.co.il/content/view/terms">תקנון</a></li>
                    <li class="col-6"><a href="https://sugardaddy.co.il/tickets/index">ביטול מנוי</a></li>
                    <li class="col-6"><a href="https://sugardaddy.co.il/tickets/index">צור קשר</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-12 text-center">
                <img src="/images/google.png" class="logo w-100" alt="">
                <p class="pre_href mb-0">
                    Все права защищены Shogar Dedi.
                    Мы не несем ответственности за содержание.
                </p>
                <a href="">Условия использования</a>
            </div>
        </div>
    </div>
</footer>
@if(isset($_GET['post_register']))
    @include('layouts.modal.register_post')
@endif
@if(isset($_GET['reset_emails']))
    @include('layouts.modal.reset_emails')
@endif
@if(isset($_GET['reset_sucsess']))
    @include('layouts.modal.reset_sucsess')
@endif
@if(isset($_GET['verifi_sucsess']))
    @include('layouts.modal.verifi_sucsess')
@endif
@if(isset($_GET['verifi_error']))
    @include('layouts.modal.verifi_error')
@endif
@if(Auth::check())
    @if(Auth::user()->isAdmin())
    <div id="edit_mode">
    <img  src="/images/edit_mode.png" alt="">
    <a href="?edit_mode=1" class="stretched-link"></a>
    </div>
    @endif
@endif
<?php
// $tables = DB::select('SHOW TABLES');
// foreach($tables as $table)
// {
//      echo ",".$table->Tables_in_saggar;
// }
?>