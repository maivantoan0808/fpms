@extends('auth.layouts.app')

@section('content')
<div class="m-login__signin">
    <div class="m-login__head">
        <h3 class="m-login__title">
            {{ __('Reset Password') }}
        </h3>
    </div>
    <form class="m-login__form m-form" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group m-form__group">
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} m-input" placeholder="Email" name="email" autocomplete="off" id="email" type="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group m-form__group">
            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} m-input" type="password" placeholder="Password" name="password" id="password" required>
        </div>
        <div class="form-group m-form__group">
            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" id="password-confirm" name="password_confirmation" required>
        </div>
        <div class="m-login__form-action">
            <button type="submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</div>
@endsection
