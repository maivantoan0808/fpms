@extends('auth.layouts.app')

@section('content')
<div class="m-login__signin">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Sign Up
        </h3>
        <div class="m-login__desc">
            Enter your details to create your account:
        </div>
    </div>
    <form class="m-login__form m-form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group m-form__group">
            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} m-input" type="text" placeholder="Fullname" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="form-group m-form__group">
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} m-input" placeholder="Email" name="email" autocomplete="off" id="email" type="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group m-form__group">
            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} m-input" type="password" placeholder="Password" name="password" id="password" required>
        </div>
        <div class="form-group m-form__group">
            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" id="password-confirm" name="password_confirmation" required>
        </div>
        <div class="row form-group m-form__group m-login__form-sub">
            <div class="col m--align-left">
                <label class="m-checkbox m-checkbox--light">
                    <input type="checkbox" name="agree">
                    I Agree the
                    <a href="javascript:void(0)" class="m-link m-link--focus">
                        terms and conditions
                    </a>
                    .
                    <span></span>
                </label>
                <span class="m-form__help"></span>
            </div>
        </div>
        <div class="m-login__form-action">
            <button type="submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                Sign Up
            </button>
        </div>
    </form>
</div>

<div class="m-login__account">
    <span class="m-login__account-msg">
        You already have a account ?
    </span>
    &nbsp;&nbsp;
    <a href="{{ route('login') }}" class="m-link m-link--light m-login__account-link">
        Sign In
    </a>
</div>
@endsection
