@extends('auth.layouts.app')
@section('content')
<div class="m-login__signin">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Forgotten Password ?
        </h3>
        <div class="m-login__desc">
            Enter your email to reset your password:
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form class="m-login__form m-form" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group m-form__group">
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} m-input" placeholder="Email" name="email" id="m_email" autocomplete="off" id="email" type="email" value="{{ old('email') }}" required>
        </div>
        <div class="m-login__form-action">
            <button type="submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                {{ __('Send Password Reset Link') }}
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
