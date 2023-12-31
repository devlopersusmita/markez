<!-- Header Start -->
<?php
   $company_settings = \App\Models\CompanySetting::first();
   ?>
<header class="header-section">
   <div class="top-header">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <span>{!!@$company_settings->header_text!!} </span>
            </div>
         </div>
      </div>
   </div>
   <div class="main-header">
      <div class="container">
         <div class="main-header-row">
            <div class="logo">
               <a href="{{ Route('home') }}" class="navbar-brand">
               <img  src="{{@$company_settings->logo!= ''?asset(@$company_settings->logo):asset('assets/img/logo/friendkit-bold.svg')}}" alt="">
               </a>
            </div>
            <div class="header-btn">

            @if(Session::has('institute_name') != 1)
               <ul class="nav-div">
                  <li class="nav-item dropdown">
                     <a href="" class="dropdown-toggle login" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>  @if (Route::has('instlogin'))
                           <a class="nav-link dropdown-item" href="{{ Route('instlogin') }}">Institution</a>
                           @endif
                        </li>
                        <li> @if (Route::has('login'))
                           <a class="dropdown-item"  href="{{ Route('login') }}">Admin</a>
                           @endif
                        </li>
                     </ul>
                  </li>
                  @if (Route::has('register.step1'))
                  <li class="nav-item"><a class="nav-link" href="{{ Route('register.step1') }}">Sign Up</a></li>
                  @endif
               </ul>
@else

               <div class="navbar-item header-btn">

               <a href="{{ Route('institutionprofile',['institution_id'=> Session::get('institution_id'),'user_id'=> Session::get('user_id')]) }}" class="login-btn" >
                  {{ Session::get('institute_name'); }}

                  </a>



                  <a class="button is-cta is-solid primary-button raised" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form>

               </div>


@endif
            </div>
         </div>
      </div>
   </div>
</header>
<!-- Header End -->
