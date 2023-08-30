@extends('layouts.apploginregistration')

@section('content')
<div class="container">
            <!--Container-->
            <div class="login-container is-centered">
                <div class="columns is-vcentered">
                    <div class="column">

                        <h2 class="form-title has-text-centered">Hey there!</h2>
                        <h3 class="form-subtitle has-text-centered">Reset Password</h3>

                         @if (session('status'))
                            <div class="alert alert-success has-text-centered" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <!--Form-->
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="login-form">
                                <div class="form-panel">
                                    <div class="columns is-multiline">
                                       
                                       
                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Email</label>
                                                <div class="control">
                                                     <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                               <button type="submit" class="button is-solid primary-button is-fullwidth raised">
                                                    Send Password Reset Link
                                                </button>
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
