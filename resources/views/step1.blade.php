@extends('layouts.apploginregistration')

@section('content')
<div class="container">
            <!--Container-->
            <div class="login-container is-centered">
                <div class="columns is-vcentered">
                    <div class="column">

                        <h2 class="form-title has-text-centered">Institution Register</h2>
                        <h3 class="form-subtitle has-text-centered">Lets create your account.</h3>

                        <!--Form-->
                        <form method="POST" action="{{ route('register.step2') }}">
    @csrf



    <div class="login-form">
                                <div class="form-panel">
                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Institution Name</label>
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
                                                <label>Phone Number </label>
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
                                            <div class="field">

                                            <button type="submit">Next</button>

                                            </div>
                                        </div>

                                    </div>
                                </div>




                            </div>

</form>
                    </div>
                </div>
            </div>
        </div>
@endsection
