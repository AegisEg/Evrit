<footer class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-12 text-center text-md-right">
                <h3 class="title">Быстрые ссылки</h3>
                <ul class="row w-50 mx-auto mr-md-0 footer_menu">
                    <li class="col-6"><a href="{{route('about_us')}}" data-pjax="0">О нас</a></li>
                    <li class="col-6"><a href="{{route('rule')}}" data-pjax="0">Правила сайта</a></li>
                    <li class="col-6"><a href="{{route('register')}}">Регистрания</a></li>
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
@if(old('success_register_post'))
@include('layouts.modal.register_post')
@endif
@if(old('success_trouble_success'))
@include('layouts.modal.trouble_success')
@endif
@if(old('reset_emails'))
@include('layouts.modal.reset_emails')
@endif
@if(old('reset_sucsess'))
@include('layouts.modal.reset_sucsess')
@endif
@if(old('verifi_sucsess'))
@include('layouts.modal.verifi_sucsess')
@endif
@if(old('verifi_error'))
@include('layouts.modal.verifi_error')
@endif
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".pop_alert").hide('slow');
        }, 3000);
    });
</script>
@if(Auth::check())
@include('profile.widgets.form_trouble')
@if(Auth::user()->isAdmin())
<div id="edit_mode">
    <img src="/images/edit_mode.png" alt="">
    <a href="?edit_mode=1" class="stretched-link"></a>
</div>
@endif
<script>
    var conn = new ab.connect(
        'ws://134.0.113.156:8080',
        function(session) {
            @foreach($channels_list as $channel)
            session.subscribe('{{$channel->key}}', function(topic, data) {
                get_unreadble();
                $('#chat-' + data.data.id + '>.msg_card_body').append(data.data.text);
                if ($('#chat-' + data.data.id).hasClass('active') && $('#chat-' + data.data.id).hasClass('show')) {
                    read_message('chat-' + data.data.id);
                }
            });
            @endforeach
        },
        function(code, reason, detail) {
            console.warn('WebSocket connection closed: code=' + code + '; reason=' + reason + '; detail=' + detail);
        }, {
            'maxRetries': 60,
            'retryDelay': 400,
            'skipSubprotocolCheck': true
        }
    );
</script>
@endif
<?php
// $tables = DB::select('SHOW TABLES');
// foreach ($tables as $table) {
//     echo "," . $table->Tables_in_aega;
// }
?>