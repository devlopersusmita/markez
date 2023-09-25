@extends('theme.institution.institutiondefault')

@section('content')


<?php echo($output_array[0]['course_data'][0]['title']); ?>




<!-- Banner Start -->
<section class="banner-section">
	<div class="owl-carousel owl-theme hero-slider">
		<div class="slide slide1">
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
		<div class="slide slide2">
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
		<div class="slide slide3">
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
				<li class="nav-item">
					<a class="nav-link active" data-bs-toggle="tab" href="#menu{{ $output_arrays['id'] }}">{{ $output_arrays['name'] }} {{ $loop->index }} </a>
				</li>
                @endforeach
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">

                <!-- @foreach($output_array as $output_arrays)
                    <div class="tab-pane container fade active show" id="menu{{ $output_arrays['id'] }}">
                        <div class="row">

                            @foreach($output_arrays['course_data'] as $course_data)
                                <div class="col-lg-3 col-md-6">
                                    <div class="course-grid">
                                        <img src="images/course1.png" alt="">
                                        <div class="couse-content">
                                            <h3>{{ $course_datas['title'] }}</h3>
                                            <p>Lorem ipsum dolor</p>
                                            <div class="rating">
                                                <span>4.6</span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <small>(380,527)</small>
                                            </div>
                                            <p class="course-price"><strong>$2,000</strong><span>$3,399</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach -->
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
			<div class="col-lg-3 col-md-6">
				<div class="course-grid">
					<img src="images/popular-course1.png" alt="">
					<div class="couse-content">
						<h3>Lorem ipsum dolor amet, <br> consetetur elitr,</h3>
						<p>Lorem ipsum dolor</p>
						<div class="rating">
							<span>4.6</span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<small>(380,527)</small>
						</div>
						<p class="course-price"><strong>$2,000</strong><span>$3,399</span></p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="course-grid">
					<img src="images/popular-course2.png" alt="">
					<div class="couse-content">
						<h3>Lorem ipsum dolor amet, <br> consetetur elitr,</h3>
						<p>Lorem ipsum dolor</p>
						<div class="rating">
							<span>4.6</span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<small>(380,527)</small>
						</div>
						<p class="course-price"><strong>$2,000</strong><span>$3,399</span></p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="course-grid">
					<img src="images/popular-course3.png" alt="">
					<div class="couse-content">
						<h3>Lorem ipsum dolor amet, <br> consetetur elitr,</h3>
						<p>Lorem ipsum dolor</p>
						<div class="rating">
							<span>4.6</span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<small>(380,527)</small>
						</div>
						<p class="course-price"><strong>$2,000</strong><span>$3,399</span></p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="course-grid">
					<img src="images/course4.png" alt="">
					<div class="couse-content">
						<h3>Lorem ipsum dolor amet, <br> consetetur elitr,</h3>
						<p>Lorem ipsum dolor</p>
						<div class="rating">
							<span>4.6</span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<small>(380,527)</small>
						</div>
						<p class="course-price"><strong>$2,000</strong><span>$3,399</span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Popular Course End -->

<!-- Rating Course Start -->

<section class="course">
	<div class="container">
		<h2>Highest Ratings Courses</h2>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="course-grid">
					<img src="images/course1.png" alt="">
					<div class="couse-content">
						<h3>Lorem ipsum dolor amet, <br> consetetur elitr,</h3>
						<p>Lorem ipsum dolor</p>
						<div class="rating">
							<span>4.6</span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<small>(380,527)</small>
						</div>
						<p class="course-price"><strong>$2,000</strong><span>$3,399</span></p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="course-grid">
					<img src="images/course2.png" alt="">
					<div class="couse-content">
						<h3>Lorem ipsum dolor amet, <br> consetetur elitr,</h3>
						<p>Lorem ipsum dolor</p>
						<div class="rating">
							<span>4.6</span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<small>(380,527)</small>
						</div>
						<p class="course-price"><strong>$2,000</strong><span>$3,399</span></p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="course-grid">
					<img src="images/course3.png" alt="">
					<div class="couse-content">
						<h3>Lorem ipsum dolor amet, <br> consetetur elitr,</h3>
						<p>Lorem ipsum dolor</p>
						<div class="rating">
							<span>4.6</span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<small>(380,527)</small>
						</div>
						<p class="course-price"><strong>$2,000</strong><span>$3,399</span></p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="course-grid">
					<img src="images/course4.png" alt="">
					<div class="couse-content">
						<h3>Lorem ipsum dolor amet, <br> consetetur elitr,</h3>
						<p>Lorem ipsum dolor</p>
						<div class="rating">
							<span>4.6</span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<small>(380,527)</small>
						</div>
						<p class="course-price"><strong>$2,000</strong><span>$3,399</span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Rating Course End -->

<!-- Contact Start -->

<section class="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h2>Contact Us</h2>
				<form>
					<div class="row g-3">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="First Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Last Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email Address">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="number" class="form-control" placeholder="Phone Number">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Address">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea class="form-control" placeholder="How can we help you?"></textarea>
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
