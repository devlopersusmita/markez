
<!-- Footer Start -->
<?php
                    $company_settings = \App\Models\CompanySetting::first();


                    ?>
<footer class="footer-sec">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<img  src="{{$company_settings->logo!= ''?asset($company_settings->logo):asset('assets/img/logo/friendkit-bold.svg')}}" alt="">
					<p>{!!$company_settings->footer_text!!}</p>
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="{{ route('allinstitutions') }}">Institutions List</a></li>
						<li><a href="#subscribe">Pricing</a></li>
						<li><a href="{{route('directaboutus')}}">About Us</a></li>
						<li><a href="#contact">Contact Us</a></li>
						<li><a href="{{ route('directtermsandcondition') }}">Terms And Condition</a></li>
						<li><a href="{{ route('directprivacypolicy') }}">Privacy Policy</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<!-- <p>© Copyright 2023. All Right Reserved</p> -->
					<p>{{$company_settings->copyright_text}}</p>
				</div>
				<div class="col-md-6 text-md-end">
					<a href="{{ route('directtermsandcondition') }}">Terms And Condition</a>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- Footer End -->
