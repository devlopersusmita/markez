@extends('theme.default')

@section('content')

<?php
                    $aboutus = \App\Models\Aboutus::first();


                    ?>


<!-- Banner Start -->
<section class="about-banner" style="background-image:url({{asset($aboutus->aboutus_banner)}});">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="banner-text">
					<h1>About Us</h1>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner End -->

<!-- About Start -->

<section class="about">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="about-img">
					<img src="{{asset($aboutus->aboutus_siteimage)}}" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about-content">

					<p>
                    {!!$aboutus->aboutus_content!!}
					</p>


				</div>
			</div>
		</div>
	</div>
</section>

<!-- About End -->


@endsection
