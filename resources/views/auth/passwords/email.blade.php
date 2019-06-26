@extends('layouts.page_with_menu')

@section('content')
<div class="container my-auto ">
    <form method="POST" action="{{ route('password.email') }}" class="py-3 text-right">
        @csrf
        <h2 class="modal-title" id="exampleModalCenterTitle">
            התחברות</h2>
        <div class="row d-block">
            <div class="col-12 col-md-4 mx-auto">
                <h5 class="py-3">Введите email адресс</h5>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <button type="submit" class="btn btn-primary my-3 avtor_subm">כניסה</button>
            </div>
        </div>
    </form>
</div>
@endsection