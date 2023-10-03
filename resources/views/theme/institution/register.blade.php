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
                        <form method="POST" class="teacher_student_register" action="{{ route('registerstore') }}">
                            @csrf
                            <input type="hidden" value="{{$institution_id}}" name="institution_id">
                            <div class="login-form">
                                <div class="form-panel">
                                    <div class="columns is-multiline">
                                        <div class="column is-12">
                                            <div class="field">
                                            @include('frontend.notification')
                                                <label>Name</label>
                                                <div class="control">
                                                     <input id="name" type="text" class="input" name="name" value="" required placeholder="Enter your name">


                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-12">
                                            <div class="field">
                                                <label>User Name</label>
                                                <div class="control">
                                                     <input id="username" type="text" class="input" name="username" value="" required placeholder="Enter your username">


                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Phone</label>
                                                <div class="control">
                                                    <input id="phone" type="number" class="input" name="phone" required autocomplete="phone" placeholder="Enter your phone number">

                                                </div>
                                            </div>
                                      </div>



                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Email</label>
                                                <div class="control">
                                                     <input id="email" type="email" class="input" name="email" value="" required autocomplete="email" placeholder="Enter your email address">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Password</label>
                                                <div class="control">
                                                    <input id="password" type="password" class="input " name="password" required placeholder="Enter your password">


                                                </div>
                                            </div>
                                        </div>

                                         <div class="column is-12">
                                            <div class="field">
                                                <label>Confirm Password</label>
                                                <div class="control">
                                                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required placeholder="Enter your confirm password">
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
                                     <a  href="{{url('teacherstudentlogin/'.$institution_id)}}">Have an account? Sign In</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
