@extends('layouts.apploginregistration')

@section('content')
<div class="container">
            <!--Container-->
            <div class="login-container is-centered">
                <div class="columns is-vcentered">
                    <div class="column">

                        <h2 class="form-title has-text-centered">Hey there!</h2>
                        <h3 class="form-subtitle has-text-centered">Lets create your account.</h3>

                        <!--Form-->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="login-form">
                                <div class="form-panel">
                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Name</label>
                                                <div class="control">
                                                     <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-12">
                                            <div class="field">
                                                <label>User Name</label>
                                                <div class="control">
                                                     <input id="username" type="text" class="input @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Enter your username">

                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Phone</label>
                                                <div class="control">
                                                    <input id="phone" type="number" class="input @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" placeholder="Enter your phone number">
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                      </div>



                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Email</label>
                                                <div class="control">
                                                     <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email address">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Password</label>
                                                <div class="control">
                                                    <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>

                                         <div class="column is-12">
                                            <div class="field">
                                                <label>Confirm Password</label>
                                                <div class="control">
                                                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password" placeholder="Enter your confirm password">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="column is-12">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" value="1" name ="check_tutar" id="check_tutar"> If he wants to be a tutor in the platform
                                        </label>
                                        </div>

                                         <div class="column is-12">
                                            <div class="field">
                                               <button type="submit" class="button is-solid primary-button is-fullwidth raised">
                                                    Create Account
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="buttons mt-2">

                                </div>

                                <div class="account-link has-text-centered">
                                     <a  href="{{ route('login') }}">Have an account? Sign In</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
