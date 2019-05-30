@extends('layouts.layout')

@section('content')
    @section('title', 'Login')
    <div class="register">
        <div class="container">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="register-top heading">
                    <h2>{{ __('Login') }}</h2>
                </div>
                <div class="register-main">
                    <div class="col-md-6 account-left">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input id="email" type="text" @error('email') is-invalid @enderror name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input id="password" type="password" @error('password') is-invalid @enderror name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">

                    </div>

                    <div class="clearfix"></div>

                    <div class="address submit">
                        <input type="submit" value="{{ __('Login') }}">
                    </div>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
