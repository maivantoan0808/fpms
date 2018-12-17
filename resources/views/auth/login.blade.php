@extends('auth.layouts.app')
@section('content')
<div class="m-login__signin">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Welcome to FProject
        </h3>
    </div>
    <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group m-form__group">
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} m-input" type="email" placeholder="Email" name="email" autocomplete="off" id="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="form-group m-form__group">
            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} m-input m-login__form-input--last" type="password" placeholder="Password" name="password" id="password" required>
        </div>
        <div class="row m-login__form-sub">
            <div class="col m--align-left m-login__form-left">
                <label class="m-checkbox  m-checkbox--light">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    Remember me
                    <span></span>
                </label>
            </div>
            <div class="col m--align-right m-login__form-right">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="m-link">
                        Forget Password ?
                    </a>
                @endif
            </div>
        </div>
        <div class="m-login__form-action">
            <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                Sign In
            </button>
        </div>
    </form>
</div>
<div class="m-login__account">
    <span class="m-login__account-msg">
        Don't have an account yet ?
    </span>
    &nbsp;&nbsp;
    <a href="{{ route('register') }}" class="m-link m-link--light m-login__account-link">
        Sign Up
    </a>
</div>
@endsection
