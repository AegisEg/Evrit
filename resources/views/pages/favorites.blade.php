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
                    <span class="nav-link active" id="blacklist-tab" data-toggle="tab" href="#blacklist" role="tab" aria-controls="home" aria-selected="true">
                        Избранное
                    </span>
                </li>
            </ul>
            <div class="page_list_tab tab-content p-3" id="myTabContent">
                <div class="tab-pane fade row show active" id="blacklist" role="tabpanel" aria-labelledby="blacklist-tab">
                    
                    @forelse ($users as $user)
                    <div class="col-md-3 cart col-sm-4 col-6">
                        @include('profile.parts.preview_profile')
                    </div>
                    @empty
                    <h3 class="mx-auto">Cписок избранного пуст</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection