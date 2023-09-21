@extends('layouts.apploginregistration')

@section('content')

<div class="container">
    <!--Container-->
    <div class="login-container admin_login">
        <div class="inner">
        <div class="columns is-vcentered">
                    <div class="column is-6 image-column">
                        <!--Illustration-->
                        <img class="light-image login-image" src="{{asset('assets/img/illustrations/login/login.svg')}}" alt="">
                        <img class="dark-image login-image" src="{{asset('assets/img/illustrations/login/login-dark.svg')}}" alt="">
                    </div>
                    <div class="column is-6 login_column">

                        <h2 class="form-title text-center">Welcome Back</h2>
                        <h3 class="form-subtitle text-center">Enter your credentials to sign in.</h3>


                        <!--Form-->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="login-form">
                                <div class="form-panel">
                                    <div class="field">
                                        @include('frontend.notification')
                                    </div>
                                    <div class="field">
                                        <label>Email</label>
                                        <div class="control">
                                             <input id="email" type="email" placeholder="Enter your email address" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Password</label>
                                        <div class="control">
                                            <input id="password" type="password" placeholder="Enter your password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- <div class="field is-flex">
                                        <div class="switch-block">
                                            <label class="f-switch">
                                                 <input class="is-switch" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a  href="{{ route('password.request') }}">Forgot Password?</a>
                                        @endif -->
                                    <!-- </div>  -->
                                </div>

                                <div class="buttons">
                                     <button type="submit" class="button is-solid primary-button is-fullwidth raised">Login</button>
                                </div>

                               <!--  <div class="account-link has-text-centered">
                                     @if (Route::has('register'))

                                            <a  href="{{ route('register') }}">Don't have an account? Sign Up</a>

                                    @endif
                                </div> -->
                            </div>
                        </form>
                    </div>
        </div>
        </div>
    </div>
</div>
@endsection
