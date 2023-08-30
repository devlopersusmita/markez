@extends('layouts.apploginregistration')

@section('content')


		<div class="container">
			<div class="inner">
				<div class="sign-up-img">
					<img src="images/sign-up-banner.png" alt="">
				</div>
				<div class="login-form signup">
					<img src="images/sign-up-logo.png" class="d-block mx-auto">
					<h2>Institution Login</h2>
					<h5>Welcome to</h5>
					<p>Lorem ipsum dolor sit amet, consetetu</p>

					<form method="POST" action="{{ route('postinstlogin') }}">
                        @csrf
						@include('frontend.notification')
						<div class="form-group">
						<input id="email" type="email" placeholder="Enter your Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						@error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="form-group">
													<input id="password" type="password" placeholder="Enter your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group">
							<p class="text-end"><a href="#">Forgot Password?</a></p>
						</div>
						<button type="submit" class="btn-banner">Login</button>
					</form>
					<p class="bottom-text">Don't Have An Account <a href="{{ Route('register.step1') }}">Sign Up Now</a></p>
				</div>
			</div>
		</div>





@endsection
