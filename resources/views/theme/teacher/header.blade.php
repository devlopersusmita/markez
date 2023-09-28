<?php
$institution_company_settings = \App\Models\InstitutionCompanySetting::first();


?>
<div class="navbar navbar-v1 is-inline-flex is-transparent no-shadow no-background is-landing is-hidden-mobile">
        <div class="container is-desktop">
            <div class="navbar-brand">
            <a href="#" class="navbar-item">
                    <img class="logo" src="{{@$institution_company_settings->logo!= ''?asset(@$institution_company_settings->logo):asset('assets/img/logo/friendkit-bold.svg')}}" alt="">
                </a>


            </div>
            <div class="navbar-menu">
                <div class="navbar-start">
                    <div class="navbar-item">
                        <a href="#buy">Buy</a>
                    </div>
                    <div class="navbar-item">
                        <a href="#demos-section">Demos</a>
                    </div>
                    <div class="navbar-item">
                        <a href="#" >Docs</a>
                    </div>
                </div>

                <div class="navbar-end">





                  <div class="navbar-item">
                                <a href="#" >
                            {{ Session::get('teacher_name'); }}
                                </a>
                  </div>








                    <a class="button is-cta is-solid primary-button raised" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

</div>

              </div>
</div>

</div>
</div>
</div>
<nav class="navbar mobile-navbar is-landing is-hidden-desktop" aria-label="main navigation">
<!-- Brand -->
<div class="navbar-brand">
<a class="navbar-item" href="/">
<img class="dark-mobile-logo" src="{{asset('assets/img/logo/friendkit.svg')}}" alt="">
<img class="light-mobile-logo" src="{{asset('assets/img/logo/friendkit-white.svg')}}" alt="">
</a>

<!-- Mobile menu toggler icon -->
<div class="navbar-burger">
<span></span>
<span></span>
<span></span>
</div>
</div>
<!-- Navbar mobile menu -->
<div class="navbar-menu">
<!-- Account -->
<div class="navbar-item has-dropdown">
<div class="navbar-link">
<img src="https://via.placeholder.com/150x150" data-demo-src="{{asset('assets/img/avatars/avatar-w.png')}}" alt="">
<span class="is-heading">Guest</span>
</div>

<!-- Mobile Dropdown -->
<div class="navbar-dropdown">
<a href="#" class="navbar-item">Buy</a>
<a href="#demos-section" class="navbar-item">Demos</a>
<a href="https://docs.friendkit.cssninja.io" class="navbar-item">Docs</a>
<a href="login.html" class="navbar-item">Login</a>
<a href="signup.html" class="button is-fullwidth is-solid accent-button">Sign Up</a>
</div>
</div>
</div>
</nav>

