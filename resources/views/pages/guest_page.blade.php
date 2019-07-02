@extends('layouts.page_with_menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-4 col-md-3 text-right py-3">
            @include('profile.parts.avatar_block')
        </div>
        <div class="col-md-9 py-3">
            <ul class="nav nav-tabs row px-0 text-center">
                <li class="nav-item col-md-4 col-12">
                    <span class="nav-link active" id="guest-tab" data-toggle="tab" href="#guest" role="tab" aria-controls="home" aria-selected="true">
                        Гости
                    </span>
                </li>
                <li class="nav-item col-md-4 col-12">
                    <span class="nav-link" id="my_review-tab" data-toggle="tab" href="#my_review" role="tab" aria-controls="home">
                        Мои просмотры
                    </span>
                </li>
            </ul>
            <div class="page_list_tab tab-content p-3" id="myTabContent">
                <div class="tab-pane fade row show active" id="guest" role="tabpanel" aria-labelledby="guest-tab">
                    @foreach($guest_list as $user)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 cart">
                        @include('profile.parts.preview_profile')
                    </div>
                    @endforeach
                </div>
                <div class="tab-pane fade row" id="my_review" role="tabpanel" aria-labelledby="my_review-tab">
                    @foreach($myreview_list as $user)
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