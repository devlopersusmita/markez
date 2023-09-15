@extends('layouts.apploginregistration')

@section('content')
<div class="container">
            <!--Container-->
            <div class="login-container is-centered">
                <div class="columns is-vcentered">
                    <div class="column">

                        <!-- <h2 class="form-title has-text-centered">Institution Register</h2>
                        <h3 class="form-subtitle has-text-centered">Lets create your account.</h3> -->

                        <div class="inner">
                            <div class="sign-up-img">
                                <img src="{{asset('images/sign-up-banner.png')}}" alt="">
                            </div>
                            <div class="login-form signup-form">
                                    <div class="d-flex align-items-center sign-up-title">
                                        <div class="sign-up-title-left">
                                            <img src="{{asset('images/sign-up-logo.png')}}" class="d-block">
                                            <h2>Institution Sign Up</h2>
                                        </div>
                                    </div>
                                    <h5>Welcome to</h5>
                                    <p>Lorem ipsum dolor sit amet, consetetu</p>

                                    <!--Form-->

                                    <form  id="step1myForm" method="POST" class="msform" action="{{ route('Step1submit') }}">
                                        @csrf

                                        @include('frontend.notification')
                                        <div class="form-group">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"   required autocomplete="name" autofocus placeholder="Institution Name">

                                            <h5 id="usercheck"
                        style="color: red;">**Username is missing

                    </h5>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                        </div>
                                        <div class="form-group">
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" placeholder="Phone Number" minlength="10" maxlength="10">
                                                @error('phone')

                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">

                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                            <small id="emailvalid"
                                                class="form-text text-muted invalid-feedback">
                                                Your email must be a valid email
                                            </small>
                                             @error('email')
                                             <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                                            <h5 id="passcheck"
                                        style="color: red;">
                                        **Please Fill the password
                                    </h5>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                        </div>
                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                            <h5 id="conpasscheck"
                        style="color: red;">
                        **Password didn't match
                    </h5>
                                        </div>
                                        <button class="btn-banner next step-link" id="submitbtn" type="submit">Next</button>
                                    </form>
                                        <p class="bottom-text"> Already Have An Account <a href="{{ Route('instlogin') }}">Sign In</a></p>

                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
@endsection
