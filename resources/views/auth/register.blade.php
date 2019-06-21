@extends('layouts.layout')

@section('content')
    @section('title', 'Register');
    <!--register-starts-->
    <div class="register">
        <div class="container">

            <form method="POST" action="{{ route('register') }}">
                @csrf

            <div class="register-top heading">
                <h2>{{ __('Register') }}</h2>
            </div>
            <div class="register-main">
                <div class="col-md-6 account-left">
                    <input id="login" type="text" @error('login') is-invalid @enderror name="login" placeholder="{{ __('Login') }}" value="{{ old('login') }}" required autocomplete="login" autofocus>

                    @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input id="email" type="text" @error('email') is-invalid @enderror name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input id="password" type="password" @error('password') is-invalid @enderror name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input id="password-confirm" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">

                </div>

                <div class="clearfix"></div>

                <div class="address submit">
                    <!--<input type="submit" value="Submit">-->
                    <input type="submit" value="{{ __('Register') }}">
                </div>
            </div>

            </form>
        </div>
    </div>

    <!--register-end-->
@endsection
