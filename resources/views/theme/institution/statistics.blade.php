@extends('theme.institution.default')


@section('content')


 <div class="view-wrapper">

       <!-- Container -->
<div class="container is-custom">

    <!-- Profile page main wrapper -->
    <div id="profile-about" class="view-wrap is-headless">
        <div class="columns is-multiline no-margin">
            <!-- Left side column -->
            <div class="column is-paddingless">
                <!-- Timeline Header -->

            </div>

        </div>

        <div class="column">

            <!-- About sections -->
            <div class="profile-about side-menu">
                @include('theme.institution.sidebar')

                <div class="right-content">
                    <div class="groups-grid padding_0">

                        <div class="grid-header">
                            <div class="header-inner">
                                <h2>Statistics</h2>


                            </div>




                        </div>
                    </div>


                    <div id="overview-content" class="content-section is-active">

<!-- START -->
<div class="episode">

<!--start course  -->
                     <div class="episode-thumb-wrap">
                            <div class="episode-thumbnail" >
                                        <div class="episode-overlay"></div>


                                        <div class="avatar">
                                            <img id="avatar_image_id" class="avatar-image" src="{{asset('assets/img/icons/activities/cources.png')}}"  alt=""  width="202" height="249">



                                        </div>

                            </div>
                            <div class="episode-meta">


                                <div class="info"></div>
                                <h4>{{$course_count}} Course</h4>
                            </div>
                     </div>
<!--end course  -->
<!-- start payment -->
                     <div class="episode-thumb-wrap">
                            <div class="episode-thumbnail" >
                                        <div class="episode-overlay"></div>


                                        <div class="avatar">
                                            <img id="avatar_image_id" class="avatar-image" src="{{asset('assets/img/icons/activities/payment.png')}}"  alt="" width="202" height="249">



                                        </div>

                            </div>
                            <div class="episode-meta">


                                <div class="info"></div>
                                <h4>{{$total_payment}} Payment</h4>
                            </div>
                     </div>


<!-- end payment -->
<!-- start students-->
                    <div class="episode-thumb-wrap">
                            <div class="episode-thumbnail" >
                                        <div class="episode-overlay"></div>


                                        <div class="avatar">
                                            <img id="avatar_image_id" class="avatar-image" src="{{asset('assets/img/icons/activities/students.png')}}"  alt="" width="202" height="249">



                                        </div>

                            </div>
                            <div class="episode-meta">


                                <div class="info"></div>
                                <h4>2 Student</h4>
                            </div>
                     </div>

<!-- end  students-->
<!-- start visitors -->
            <div class="episode-thumb-wrap">
                            <div class="episode-thumbnail" >
                                        <div class="episode-overlay"></div>


                                        <div class="avatar">
                                            <img id="avatar_image_id" class="avatar-image" src="{{asset('assets/img/icons/activities/visitor.png')}}"  alt="" width="202" height="249">



                                        </div>

                            </div>
                            <div class="episode-meta">


                                <div class="info"></div>
                                <h4>2 Visitors</h4>
                            </div>
            </div>

<!-- end visitors -->

</div>
<!-- END -->
                    </div>
                </div>

            </div>
        </div>
    </div>

   </div>
        </div>









    </div>


@endsection



