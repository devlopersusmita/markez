@extends('theme.default')

@section('content')
<!-- Banner Start -->
<section class="banner-section">
	<div class="owl-carousel owl-theme hero-slider">
	@if(!empty($sliders))
                        @foreach($sliders as $slider)
						<div class="slide slide1"  style="background-image:url({{asset($slider->slider)}});">
			<div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-9">
                        <h1>{{$slider->slider_header}}</h1>
                        <h4>{{$slider->slider_text}}</h4>
                        <p>{{$slider->description}}</p>
                        <a href="{{$slider->link}}" class="btn-banner">REGISTER WITH US</a>
                    </div>
                </div>
            </div>
		</div>
		@endforeach
    @endif
	</div>
</section>
<!-- Banner End -->

<!-- Our Service Start -->
<section class="our-service">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="our-service-image">
					<img src="images/service.png" alt="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="service-content">
					<h3>Our Services</h3>
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy</p>
					<ul>
						<li>
							<h5>Lorem ipsum dolor amet, consetetur elitr,</h5>
							<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</p>
						</li>
						<li>
							<h5>Lorem ipsum dolor amet, consetetur elitr,</h5>
							<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</p>
						</li>
						<li>
							<h5>Lorem ipsum dolor amet, consetetur elitr,</h5>
							<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</p>
						</li>
					</ul>
					<a href="{{ Route('register.step1') }}" class="btn-banner">REGISTER WITH US</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Our Service End -->

<!-- Institution Start -->
<section class="institution">
	<div class="container">
		<div class="institution-top-row">
			<div class="row align-items-center">
				<div class="col-md-9">
					<h3>Institutions</h3>
					<p>Choose from over 210,000 online video courses with new additions published every month</p>
				</div>
				<div class="col-md-3 text-md-end">
					<a href="{{ route('allinstitutions') }}" class="btn-banner">VIEW ALL</a>
				</div>
			</div>
		</div>
		<div class="institution-col">
			<d iv class="row">
                    @if(!empty($institution_lists))
                        @foreach($institution_lists as $institution_list)
                                <div class="col-lg-3 col-md-6">

                                    <div class="institution-gird text-center">



                                @if(($institution_list->logo) && (file_exists($institution_list->logo)))
                                <img src="{{asset($institution_list->logo)}}" alt="">
                                                            @else
                                                            <img src="{{asset('/images/institution1.png')}}" alt="">
                                                            @endif
                                        <h4>{{$institution_list->name}}</h4>
                                        <p>                                         <h4>{!!$institution_list->description!!}</h4>
                                        </p>
                                    </div>
                                </div>
                         @endforeach
                    @endif
			</div>
		</div>
	</div>
</section>
<!-- Institution End -->

<!-- Subscription Start -->

<section class="subscription" id="subscribe">
	<div class="container">
		<h3 class="text-center">Subscription</h3>
		<p class="text-center">Choose from over 210,000 online video courses with new additions published every month</p>
		<div class="subscription-package">
			<div class="row">
            @if(!empty($subcription_package_lists))
                        @foreach($subcription_package_lists as $subcription_package_list)
                            <div class="col-md-4">
                                <div class="package-box">
                                    <div class="package-title">
                                        <h3>{{$subcription_package_list->title}}</h3>
                                    </div>
                                    <div class="package-details">
                                    	<div class="package-info">
                                    		<h2>${{$subcription_package_list->price}}<span></span>
                                    			<span>{{$subcription_package_list->days}}/Days</span></h2>
                                    			<p>
                                    				{!!$subcription_package_list->descriptions!!}</p>
                                    			</div>
                                    			<div class="package-btn">
                                    				<a href="#" class="subscription-btn">Choose Plan</a>
                                    			</div>

                                    </div>

                                </div>
                            </div>

                @endforeach
                    @endif


			</div>
		</div>
	</div>
</section>

<!-- Subscription End -->

<!-- Contact Start -->

<section class="contact" id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h2>Contact Us</h2>
                <form method="POST" action="{{ route('contactusstore') }}">
                            @csrf
					<div class="row g-3">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" name ="firstname" id="firstname" placeholder="First Name" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number" required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea class="form-control" placeholder="How can we help you?" name="helpyou" id="helpyou" required></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<input type="submit" name="submit" value="SUBMIT REQUEST" class="btn-banner">
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<!--  Contact End -->


@endsection
