@extends('layouts.page_with_menu')

@section('content')
<section class="register_section py-5" style="background-image: url(/images/register-bg.jpg)">
    <div class="container text-right">
        <form method="POST" action="{{route('register')}}" class="register_form form_validate row col-12 col-md-6" novalidate>
            <h3>Открыть счет</h3>
            <p>
                Присоединяйтесь БЕСПЛАТНО сейчас для Sugar Dadi и найдите идеальный Сидур!
            </p>
            <span class="col-md-6 col-12  my-3 ">
                Укажите свой пол
            </span>
            <label class="col-md-6 col-12  my-3 gender_check d-block d-sm-inline">
                <input type="checkbox" name="gender" id="gender" data-toggle="toggle" data-on="{{$gender[1]}}" data-off="{{$gender[0]}}">
            </label>
            <span class="col-md-6 col-12  my-3 ">
                Какова ваша роль?
            </span>
            <label class="col-md-6 col-12  my-3 status_check">
                <input type="checkbox" name="soc_status" id="soc_status" data-width="200" data-height="30" data-toggle="toggle" data-on="{{$soc_status[0][0]}}" data-off="{{$soc_status[0][1]}}" data0-on="{{$soc_status[0][0]}}" data0-off="{{$soc_status[0][1]}}" data1-on="{{$soc_status[1][0]}}" data1-off="{{$soc_status[1][1]}}">
                <i class="fa fa-question-circle mr-2 info_pop" data-toggle="popover" data-trigger="hover" title="Что это значит?" data-content="" data-content0="Sugar Baby - привлекательная девушка, ищущая отношения с щедрым мужчиной (Sugar Daddy) в обмен на поблажки и подарки.
Sugar Mama - щедрая девушка, которая оказывает поддержку и утешение девушке (Sugar Baby) в обмен на дружбу" data-content1="Sugar Babe - Описание.
Sugar duddy - Описание" aria-hidden="true"></i>
            </label>
            <span class="col-md-6 col-12  my-3 ">
                Кто вас интересует?
            </span>
            <label class="col-md-6 col-12  my-3 orentation_check">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                        <input type="radio" name="orientation" id="0" value="0" autocomplete="off" checked>{{$orientation[0]}}
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="orientation" id="1" value="2" autocomplete="off">{{$orientation[2]}}
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="orientation" id="2" value="1" autocomplete="off">{{$orientation[1]}}
                    </label>
                </div>
            </label>
            <span class="col-md-6 col-12  my-3 ">
                Дата рождения
            </span>
            <label class="col-md-6 col-12  my-3 datepicker_container">
                <input type="text" class="form-control datepicker text-right" placeholder="**/**/**" required name="birthday">
            </label>
            <span class="col-md-6 col-12  my-3 ">
                Ник
            </span>
            <label class="col-md-6 col-12  my-3">
                <input type="text" class="form-control" name="name" placeholder="Ник" required>
            </label>
            <span class="col-md-6 col-12  my-3 ">
                Email
            </span>
            <label class="col-md-6 col-12  my-3">
                <input type="text" class="form-control" name="email" placeholder="Email" required>
            </label>
            <span class="col-md-6 col-12  my-3 ">
                Пароль
            </span>
            <label class="col-md-6 col-12  my-3">
                <input type="password" class="form-control" name="password" placeholder="Пароль" required>
            </label>
            <span class="col-md-6 col-12  my-3 ">
                Подтверждение пароля
            </span>
            <label class="col-md-6 col-12  my-3">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Подтверждение пароля" required>
            </label>
            <span class="col-md-6 col-12  my-3 ">
                Город
            </span>
            <label class="col-md-6 col-12  my-3">
                <select class="selectpicker" data-live-search="true" name="city_id" title="Выберете город.." required>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </label>
            <label>
                Я подтверждаю, что прочитал и согласен с Условиями использования
                Я знаю, что запрещено рекламировать платные сексуальные услуги и что использование сайта осуществляется с 18 лет и старше.
                <div class="check_verifi">
                    <input type="checkbox" class="form-control" id="verifi" name="verifi" data-toggle="toggle" data-on="Да" data-off="Нет" required>
                </div>
            </label>
            @csrf
            <button type="submit" class="free_reg mt-3 d-block mx-auto w-50">Регистрация</button>
        </form>
    </div>
</section>
@endsection