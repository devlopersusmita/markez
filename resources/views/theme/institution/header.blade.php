<!-- start header text -->
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
	<div class="app-header header-shadow">
		<div class="app-header__logo">
			<div class="logo-src"><img src="/images/dashbord.svg" alt="dashbord"> DASHBOARD</div>
				<div class="header__pane ml-auto">
					<div>
						<button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
						data-class="closed-sidebar">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
						</button>
					</div>
				</div>
		</div>
		<div class="app-header__mobile-menu">
			<div>
				<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
		<div class="app-header__content">

			<div class="app-header-right">
				<div class="header-btn-lg">
					<a href="#"><img src="/images/logo.png" alt="logo">
                    @if(Session::has('institute_logo') != 1)

<img src="{{asset{{ Session::get('institute_logo'); }}}}" alt="">
@else
<img src="/images/logo.png" alt="logo">
@endif</a>
				</div>
				<div class="profile">
					<ul>
						<li class="profile-bg-dark"><a href="#">

                        <img src="/images/profile.png" alt="profile">

                    </a>
						</li>
						<li><span>{{ Session::get('institute_name'); }}</span></li>
					</ul>
				</div>
				<a class="button is-cta is-solid primary-button raised" href="{{ route('signout') }}">
                                    {{ __('Logout') }}
                                </a>

                                <form  action="{{ route('signout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
			</div>
		</div>
	</div>
<!-- end header text -->
