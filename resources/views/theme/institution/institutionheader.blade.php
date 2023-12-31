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

				<div class="header-search-box">
					<input type="text" placeholder="Search now" class="form-control">
				</div>
                @if(empty(Session::get('user_role')))
    <div class="header-btn">
        <input type="hidden" value="{{$id}}" name="id">
        <a href="{{url('teacherstudentlogin/'.$id)}}" class="login-btn">Login</a>
        <a href="{{url('teacherstudentregister/'.$id)}}" class="signup-btn">Sign Up</a>
    </div>
@else
    @if(Session::get('user_role') == '3')
        <div class="header-btn">
            <a href="{{ Route('institutionprofile',['institution_id'=> Session::get('institution_id'),'user_id'=> Session::get('user_id')]) }}" class="login-btn">Back To Dashboard</a>
            <input type="hidden" value="{{$id}}" name="id">
            <a href="{{url('teacherstudentlogin/'.$id)}}" class="login-btn">Login</a>
            <a href="{{url('teacherstudentregister/'.$id)}}" class="signup-btn">Sign Up</a>
        </div>
    @elseif(Session::get('user_role') == '1')
        <div class="header-btn">
            <a href="{{ Route('profile',['institution_id'=> Session::get('institution_id'),'user_id'=> Session::get('user_id')]) }}" class="login-btn"> {{ Session::get('student_name') }}</a>
            <input type="hidden" value="{{$id}}" name="id">
            <a class="button is-cta is-solid primary-button raised" href="{{ route('custom.logout') }}" onclick="event.preventDefault(); document.getElementById('custom-logout-form').submit();">
    Logout
</a>

<form id="custom-logout-form" action="{{ route('custom.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

        </div>
    @elseif(Session::get('user_role') == '2')
        <div class="header-btn">
            <a href="{{ Route('teacherprofile',['institution_id'=> Session::get('institution_id'),'user_id'=> Session::get('user_id')]) }}" class="login-btn"> {{ Session::get('teacher_name') }}</a>
            <input type="hidden" value="{{$id}}" name="id">
            <a  class="button is-cta is-solid primary-button raised" href="{{ route('custom.logout') }}" onclick="event.preventDefault(); document.getElementById('custom-logout-form').submit();">
    Logout
</a>

<form id="custom-logout-form" action="{{ route('custom.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

        </div>
    @endif
@endif







			</div>
		</div>
	</div>
</header>
<!-- Header End -->
