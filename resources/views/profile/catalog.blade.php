@extends('layouts.page_with_menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-10 col-12 px-0 mt-4 mx-auto">
            <div class="row mx-0">
                <div class="col-6 text-right">
                    <h4>Найти людей</h4>
                </div>
                <div class="col-6 text-left">Найдено
                    <span class="count_search">
                        {{$count}}
                    </span>
                </div>
            </div>
        </div>
        <form class="col-lg-9 col-12 mx-auto  search_settings text-right">
            <div class=" row mx-0 p-3">
                <div class="col-md-4 col-12 my-3">
                    <select class="selectpicker" name="soc_status">
                        <option value="" checked>Не важно</option>
                        <option value="0" checked>В поисках Sugar Duddy</option>
                        <option value="1">В поисках Sugar Baby</option>
                    </select>
                </div>
                <div class="col-md-4 col-12 my-3">
                    <label for="amount">Возраст супруги:</label>
                    <span id="amount" style="border:0; color:#f6931f; font-weight:bold;">80-18</span>
                    <input type="text" name="start_age" value="18" hidden>
                    <input type="text" name="last_age" value="80" hidden>
                    <div id="slider-range"></div>
                    <script>
                        $(function() {
                            $("#slider-range").slider({
                                range: true,
                                min: 18,
                                max: 80,
                                values: [18, 80],
                                slide: function(event, ui) {
                                    $("#amount").text(ui.values[1] + "-" + ui.values[0]);
                                    $("input[name=start_age]").val(ui.values[0]);
                                    $("input[name=last_age]").val(ui.values[1]);
                                }
                            });
                        });
                    </script>
                </div>
                <div class="col-md-4 col-12 my-3">
                    <select class="selectpicker" data-live-search="true" name="city_id" title="Выберете город..">
                        @foreach($list_cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mx-0 p-3">
                <div class="col-md-4 col-12 my-3 text-right custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="online" name="online">
                    <label class="custom-control-label" for="online">Online</label>
                </div>
                <div class="col-md-4 col-12 my-3 text-right custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="no_ava" name="no_ava">
                    <label class="custom-control-label" for="no_ava">С аватаром</label>
                </div>
                <div class="col-md-4 col-12 my-3 text-right custom-control custom-checkbox">
                    <button class="free_reg w-100">Найти</button>
                </div>
            </div>
        </form>
        <div class="col-md-8 col-sm-10 col-12 px-0 mt-4 mx-auto">
            <div class="catalog_head text-right px-3">
                <span class="sort_by" id="fresh">Новые</span> | <span class="sort_by active" id="all">Все</span> | <span class="sort_by" id="popular">Популярные</span>
            </div>
            <div class="catalog_content mx-0 row mb-4">
                @foreach($users as $user)
                <div class="col-md-3 cart col-sm-4 col-6">
                    @include('profile.parts.preview_profile')
                </div>
                @endforeach
            </div>
            <div class="preload">
                <img src="/images/preload.gif" class="preload_img" alt="">
            </div>
        </div>
    </div>
</div>
@endsection