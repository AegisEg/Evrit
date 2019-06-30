@extends('layouts.page_with_menu')

@section('content')
<div class="container my-auto">
    <form method="POST" action="{{route('login')}}" class="py-3 text-right">
        @csrf
        <h2 class="modal-title" id="exampleModalCenterTitle">
            התחברות</h2>
        <div class="row d-block">
            <div class="col-12 col-md-4 mx-auto">
                <span>
                    משתמש רשום?
                </span>
                <div class="notreg_s_title">
                    התחברות (לקוח קיים)
                </div>
                <span>
                    יש לכם מנוי? הסתדרתם!
                    הכניסו את הפרטים
                </span>
                <input class="form-control my-3 @error('email') is-invalid @enderror" type="text" name='email'>
                <input class="form-control my-3 @error('password') is-invalid @enderror" type="password" name='password'>
                <a href="{{route('password.update')}}" class="notreg_forgot_password">שכחתי סיסמא</a>
                <p>
                    אל דאגה, לעולם לא נעשה שימוש בפרטי חשבונך!
                </p>
                <button type="submit" class="btn btn-primary avtor_subm">כניסה</button>
            </div>
        </div>
    </form>
</div>
@endsection