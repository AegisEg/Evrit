@extends('layouts.page_with_menu')

@section('content')
<div class="container my-auto ">
    <form method="POST" action="{{ route('password.update') }}" class="py-3 text-right">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <h2 class="modal-title" id="exampleModalCenterTitle">
            התחברות</h2>
        <div class="row d-block">
            <div class="col-12 col-md-4 mx-auto">
                <h5 class="py-3">Введите email адресс</h5>
                <input id="email" type="email" class="form-control my-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="password" type="password" class="form-control my-3 @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="password-confirm" type="password" class="form-control my-3" name="password_confirmation" placeholder="password confirmation" required autocomplete="new-password">
                <button type="submit" class="btn btn-primary my-3 avtor_subm">כניסה</button>
            </div>
        </div>
    </form>
</div>
@endsection