<!-- Header Start -->
<header class="header-section">
	<div class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span>Lorem ipsum dolor amet, consetetur elitr <strong>2 days Left!</strong></span>
				</div>
			</div>
		</div>
	</div>
	<div class="main-header">
		<div class="container">
			<div class="main-header-row">
				<div class="logo">
					<a href="#" class="navbar-brand">
						<img src="images/logo.png" alt="">
					</a>
				</div>
                {{ Session::get('user_role'); }}
				<div class="header-search-box">
					<input type="text" placeholder="Search now" class="form-control">
				</div>
                @if(Session::has('user_role') == 3)
				<div class="header-btn">

                <a href="#"class="login-btn">Back To Dashboard</a>
                     <input type="hidden" value="{{$id}}" name="id">




                                 <a href="{{url('teacherstudentlogin/'.$id)}}"class="login-btn">Login</a>


					        <a href="{{url('teacherstudentregister/'.$id)}}" class="signup-btn">Sign Up</a>




				</div>
                @else

                <div class="header-btn">


                        <input type="hidden" value="{{$id}}" name="id">




                                    <a href="{{url('teacherstudentlogin/'.$id)}}"class="login-btn">Login</a>


                                <a href="{{url('teacherstudentregister/'.$id)}}" class="signup-btn">Sign Up</a>




				</div>
                @endif
			</div>
		</div>
	</div>
</header>
<!-- Header End -->
