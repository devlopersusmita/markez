@extends('theme.institution.institutiondefault')

@section('content')








<!-- Banner Start -->
<section class="banner-section">
	<div class="owl-carousel owl-theme hero-slider">
    @if(!$institution_sliders->isEmpty())
         @foreach($institution_sliders as $institution_slider)
            <div class="slide slide1" style="background-image:url({{asset($institution_slider->slider)}});">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-9">
                        <h1>{{@$institution_slider->slider_header}}</h1>
                            <h4>{{@$institution_slider->slider_text}}</h4>
                            <p>{{@$institution_slider->description}}</p>
                            <a href="{{$institution_slider->link}}" class="btn-banner">REGISTER WITH US</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
        <div class="slide slide1" style="background-image:url('../images/600x400.png');">
			<div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-9">
                        <h1>Dream Big</h1>
                        <h4>Lorem ipsum dolor sit amet, consetetur</h4>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        <a href="#" class="btn-banner">REGISTER WITH US</a>
                    </div>
                </div>
            </div>
		</div>

        <div class="slide slide2" style="background-image:url('../images/600x400.png');">
			<div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-9">
                        <h1>Dream Big</h1>
                        <h4>Lorem ipsum dolor sit amet, consetetur</h4>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        <a href="#" class="btn-banner">REGISTER WITH US</a>
                    </div>
                </div>
            </div>
		</div>
		<div class="slide slide3" style="background-image:url('../images/600x400.png');">
			<div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-9">
                        <h1>Dream Big</h1>
                        <h4>Lorem ipsum dolor sit amet, consetetur</h4>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        <a href="#" class="btn-banner">REGISTER WITH US</a>
                    </div>
                </div>
            </div>
		</div>
            @endif
	    </div>
</section>
<!-- Banner End -->

<!-- Course Start -->
<section class="course">
	<div class="container">
		<h2>Our Courses</h2>
		<span>Choose from over 210,000 online video courses with new additions published every month</span>
		<div class="tab-section">

			<!-- Nav tabs -->

			<ul class="nav nav-tabs">
            @foreach($output_array as $output_arrays)
                @if($loop->index==0)
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#menu{{ $output_arrays['id'] }}">{{ $output_arrays['name'] }} </a>
                    </li>
                @else
                <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu{{ $output_arrays['id'] }}">{{ $output_arrays['name'] }} </a>
                    </li>
                @endif
                @endforeach
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">

                @foreach($output_array as $output_arrays)
                    <div class="tab-pane container fade active {{ $loop->index==0?'show':'' }}" id="menu{{ $output_arrays['id'] }}">
                        <div class="row">

                            @foreach($output_arrays['course_data'] as $course_data)
                                <div class="col-lg-3 col-md-6">
                                    <div class="course-grid">
                                    @if(($course_data['preview_image']) && (file_exists($course_data['preview_image'])))
                                                            <img src="{{asset($course_data['preview_image'])}}" alt="">
                                                            @else
                                                            <img src="{{asset('frontend/course/defaultcourse.jpg')}}" alt="">
                                                            @endif

                                        <div class="couse-content">
                                            <h3>{{ $course_data['title'] }}</h3>
                                            <h3>{{ $course_data['type'] }}</h3>
                                            <p>
                        {!! Str::words($course_data['description'], 10, ' ...') !!}
                        </p>

                                            <div class="rating">
                                                <span>4.6</span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <small>(380,527)</small>
                                            </div>
                                            <p class="course-price"><strong>{{ $course_data['price'] }}</strong><span>$3,399</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach
			</div>

		</div>
	</div>
</section>
<!-- Course End -->

<!-- Popular Course Start -->

<section class="course popular-course">
	<div class="container">
		<h2>Popular Courses</h2>

		<div class="row">
        @foreach($popular_courses as $popular_course)
			<div class="col-lg-3 col-md-6">
				<div class="course-grid">
                @if(($popular_course->preview_image) && (file_exists($popular_course->preview_image)))
                                                            <img src="{{asset($popular_course->preview_image)}}" alt="">
                                                            @else
                                                            <img src="{{asset('frontend/course/defaultcourse.jpg')}}" alt="">
                                                            @endif
					<div class="couse-content">
						<h3>{{$popular_course->title}}</h3>
						<p>
                        {!! Str::words($popular_course->description, 10, ' ...') !!}
                        </p>
						<div class="rating">
							<span>4.6</span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<small>(380,527)</small>
						</div>
						<p class="course-price"><strong>${{$popular_course->price}}</strong><span>$3,399</span></p>
					</div>
				</div>
			</div>
            @endforeach
		</div>

	</div>
</section>

<!-- Popular Course End -->

<!-- Rating Course Start -->

<section class="course">
	<div class="container">
		<h2>Highest Ratings Courses</h2>
		<div class="row">
        @foreach($popular_courses as $popular_course)
			<div class="col-lg-3 col-md-6">
				<div class="course-grid">
                @if(($popular_course->preview_image) && (file_exists($popular_course->preview_image)))
                                                            <img src="{{asset($popular_course->preview_image)}}" alt="">
                                                            @else
                                                            <img src="{{asset('frontend/course/defaultcourse.jpg')}}" alt="">
                                                            @endif
					<div class="couse-content">
                    <h3>{{$popular_course->title}}</h3>
						<p>{!! Str::words($popular_course->description, 10, ' ...') !!}</p>
						<div class="rating">
							<span>4.6</span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<small>(380,527)</small>
						</div>
						<p class="course-price"><strong>${{$popular_course->price}}</strong><span>$3,399</span></p>
					</div>
				</div>
			</div>
            @endforeach

		</div>
	</div>
</section>

<!-- Rating Course End -->

<!-- Contact Start -->

<section class="contact" >
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h2>Contact Us</h2>
                <form method="POST" action="{{ route('institutioncontactusstore') }}">
                            @csrf
					<div class="row g-3">
						<div class="col-md-6">
							<div class="form-group">
                            <input type="hidden" value="{{$id}}" name="user_id">
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
