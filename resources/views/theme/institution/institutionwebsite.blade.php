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
<div class="store-sections">
    <div class="container">
         <h2>Our Courses</h2>
		<span class="course-desc">Choose from over 210,000 online video courses with new additions published every month</span>
            <div class="container is-desktop">
                @if(session()->has('message'))
                <div class="box-heading margin_top_10 margin_bottom_10">
                    <h4>{{ session()->get('message') }}</h4>
                </div>
                @endif
                <div class="columns is-multiline">
                    @if(!empty($courses))
                    @foreach($courses as $course)
                    <!-- {{($course->content_course_type)}} -->
                    @if($course->content_course_type == 1)
                    <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile courser_grid">
                        <div class="product-card" >
                        @if(!empty($course_subscriptions))
                        @foreach($course_subscriptions as $course_subscription)
                        @if((Session::has('user_id') > 0) && ($course_subscription->user_id==Session::has('user_id')) && ($course_subscription->course_id==$course->id))
                        <!-- <a href="{{Route('studentcoursecontent',['id'=>$course->id])}}" class="button is-solid accent-button raised" >Details</a>-->
                        <a href="{{Route('studentcoursecontent',['id'=>$course->id,'institution_id'=>Session::get('institution_id'),'user_id'=>Session::get('user_id')])}}" class="quickview-trigger button is-solid green-button"  style="width: 100px;right:10px;" >
                        Details
                        </a>
                        @endif
                        @endforeach
                        @endif
                        <div class="product-image">
                            @if(($course->preview_image) && (file_exists($course->preview_image)))
                            <img src="{{asset($course->preview_image)}}" alt="">
                            @else
                            <img src="{{asset('frontend/course/defaultcourse.jpg')}}" alt="">
                            @endif
                        </div>
                        <div class="product-info">
                            <h3>{{$course->title}}</h3>
                            <p>
                            <div class="course_description_min_height "><?php echo substr(strip_tags($course->description),0,100); ?></div>
                            </p>
                            <p class="course_cat"><strong>{{$course->category_name}}</strong></p>
                        </div>
                        <div class="product-actions">
                            <div class="left">
                                <i data-feather="heart"></i>
                                <span>{{$course->total_subscription}}</span>
                                <?php
                                    $current_datetime = date('Y-m-d H:i:s');

                                    $show_currentdatetime =strtotime($current_datetime);

                                    $zoomclass_enddatetime =$course->zoom_endtime;



                                    $show_zoomclassdatetime =strtotime($zoomclass_enddatetime);

                                    ?>
                            </div>
                            <div class="right">
                                @if($course->zoom_endtime == 0)
                                <?php
                                    if($course->totalcoursecontent > 0)
                                    {
                                        ?>
                                <?php
                                    if($course->price > 0)
                                    {
                                    ?>
                                <a class="button is-solid accent-button view_modal_course_details raised modal-trigger"  data-modal="course-details-help-modal" id="view_modal_course_details_{{$course->id}}" data-id="{{$course->id}}"
                                data-user_id="{{Session::get('user_id')}}" data-institution_id="{{Session::get('institution_id')}}">
                                <i data-feather="shopping-cart"></i>
                                <span>{{$course->price}}SAR</span>
                                </a>
                                <?php
                                    }
                                    else
                                    {
                                        ?>
                                <a class="button is-solid green-button view_modal_course_details raised modal-trigger"  data-modal="course-details-help-modal" id="view_modal_course_details_{{$course->id}}"  data-id="{{$course->id}}" data-user_id="{{Session::get('user_id')}}" data-institution_id="{{Session::get('institution_id')}}">
                                <span>Free</span>
                                </a>
                                <?php
                                    }
                                    ?>
                                <?php
                                    }
                                    ?>
                                @endif
                                <!-- zoom start end if -->
                            </div>
                        </div>
                        </div>
                    </div>
                    @endif
                    <!-- content type endif -->
                    @endforeach
                    @endif
                </div>
            </div>
    </div>
</div>
</section>
<!-- Course Start -->
<!--  Popular Course Start -->

<section class="course">
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
						<p class="course-price"><strong>{{$popular_course->price}}SAR</strong><span>3,399SAR</span></p>
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
			<div class="col-lg-3 col-md-6 course-grid-row">
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
						<p class="course-price"><strong>{{$popular_course->price}}SAR</strong><span>3,399SAR</span></p>
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

<!-- Course Deatils start  -->
<div id="course-details-help-modal" class="modal course-details-help-modal is-large has-light-bg">
   <div class="modal-background"></div>
   <div class="modal-content">
      <div class="card">
         <div class="card-heading">
            <h3>Course Details</h3>
            <!-- Close X button -->
            <div class="close-wrap">
               <span class="close-modal">
               <i data-feather="x"></i>
               </span>
            </div>
         </div>
         <div class="card-body">
            <div  id="details_modal_body_content">
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Course Deatils End -->

<form id="coursesubscriptionpay-form" action="{{Route('coursesubscriptionpay')}}" method="POST"   enctype="multipart/form-data" class="d-none">
   <input type="hidden" name="_token" value="{{ csrf_token() }}" />
   <input type="hidden" id="coursesubscriptionpay_id" name="id" value="" />
</form>
<?php
   $user_type_student = 'No';
   if(Session::get('user_role'))
   {
      if(Session::get('user_role') == '1')
      {
          $user_type_student = 'Yes';
      }
   }
   ?>
<input type="hidden" id="user_type_student" name="user_type_student" value="<?php echo $user_type_student;?>" />
@endsection
