@extends('theme.teacher.default')

@section('content')


 <div class="view-wrapper">

        <!-- Container -->
        <div class="container is-custom">

            <!- <div class="view-wrapper">

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
                        @include('theme.teacher.sidebar')

                        <div class="right-content">
                           <div class="groups-grid padding_0">

                               <div class="grid-header">
                                   <div class="header-inner">
                                       <h2>Attendance</h2>

                                   </div>
                                   <div class="header-inner padding_top_10">


                                    <div class="header-actions">


                                <div class="field is-grouped">
                                    <div class="control" >
                                        <a href="{{route('teachercourse')}}"><h1>{{$course_details->title}}</h1></a>
                                    </div>
                                    <div class="control" >
                                        <a href='{{Route("teachercoursecontent",["id"=>$course_id])}}'><h1>>> {{$course_content_details->title}}</h1></a>
                                    </div>

                                    <div class="control" >
                                        <a href='{{Route("online_classes",["id"=>$course_id,'content_id'=>$course_content_id])}}'><h1>>> {{$online_class_details->topic}}</h1></a>
                                    </div>

                                </div>


                                    </div>

                                </div>






<div id="message_id"></div>

     <div class="store-sections">
       <div class="columns is-multiline">

           @if(!empty($user_deatils))
               @foreach($user_deatils as $user_deatil)
                   <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-desktop is-one-third-tablet is-half-mobile">
                       <div class="product-card" >

                        <div class="product-info">
                            <h3>{{$user_deatil->name}}</h3>

                            <p><strong>{{$user_deatil->category_name}}</strong></p>

                        </div>


                        <div class="product-image">
                               @if($user_deatil->avatar)
                               <img src="{{asset($user_deatil->avatar)}}" alt="">
                               @else
                               <img src="{{asset('frontend/course/defaultcourse.jpg')}}" alt="">
                               @endif
                           </div>


                           <div class="product-actions">
                               <div class="left">


                               </div>
                               <div class="right">
                                <input type="hidden" id="user_id" value="{{$user_deatil->id}}"/>
                                <input type="hidden" id="oline_id" value="{{$online_class_id}}" />
                                <label class="f-switch is-primary ">
                                    <input type="checkbox" class="is-switch attendance_check_box"  data-onlineid="{{$online_class_id}}" <?php if(in_array($user_deatil->id,$all_attendance_user)){echo "checked";} ?>  data-id="{{$user_deatil->id}}" >
                                    <i></i>
                                </label>

                               </div>
                           </div>
                       </div>
                   </div>
               @endforeach
           @endif




       </div>
     </div>

                               </div>


                           </div>
                            <div id="overview-content" class="content-section is-active">

                               {{-- <div id="pagination_data">
                                   @include("theme.teacher.attendance-pagination",['coursecontents'=>$coursecontents,'course_id'=>$course_id,'course_details'=>$course_details,'online_class_id'=>$online_class_id])
                               </div> --}}


                           </div>





                        </div>

                    </div>
                </div>
            </div>

           </div>
                </div>



    </div>


@endsection
