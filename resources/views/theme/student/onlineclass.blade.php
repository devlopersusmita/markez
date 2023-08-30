@extends('theme.student.default')

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
                         @include('theme.student.sidebar')
                         <div class="right-content">
                            <div class="groups-grid padding_0">

                                <div class="grid-header">
                                    <div class="header-inner">
                                        <h2>Online Class</h2>
                                        <div class="header-actions">
                                             <div class="buttons">

                                            </div>
                                        </div>
                                    </div>
                                     <div class="header-inner padding_top_10">
                                        <h2>&nbsp;</h2>

                                        <div class="header-actions">

                                        <form id="searchform" name="searchform" >
                                    <div class="field is-grouped">




                                        <div class="control" >
                                            <input type="text" name="topic" class="input" placeholder="Topic" />
                                        </div>
                                        <div class="control" >
                                            <a class="button is-solid primary-button raised"  href="{{Route('studentcourseonline_classes',['id'=>$course_content_details['course_id'],'content_id'=>$course_content_details['id']])}}" id='search_btn'>Search</a>
                                        </div>
                                    </div>
                                   </form>

                                        </div>

                                    </div>
                                    <div class="header-inner padding_top_10">


                                        <div class="header-actions">


                                    <div class="field is-grouped">
                                        <div class="control" >
                                            <a href="{{route('studentcourse')}}"><h1>{{$course_details->title}}</h1></a>
                                        </div>
                                        <div class="control" >
                                            <a href='{{Route("studentcoursecontent",["id"=>$course_id])}}'><h1>>> {{$course_content_details->title}}</h1></a>
                                                   </div>
                                        {{-- <div class="control" >
                                        @foreach($online_classes as $online_classe)
                                        <td>({{$online_classe['teacher_name']}})</td>
                                        @endforeach
                                    </div> --}}

                                    <div class="control" >
                                       <td>{{$onlineclass_details[0]->name}}</td>
                                        {{-- <td>({{$online_classes['teacher_name']}})</td> --}}

                                    </div>

                                    </div>


                                        </div>

                                    </div>



                                </div>
                            </div>
                             <div id="overview-content" class="content-section is-active">

                                <div id="pagination_data">
                                    @include("theme.student.onlineclass-pagination",['online_classes'=>$online_classes,'course_subcription'=>$course_subcription,'student_online_class_before_minute'=>$student_online_class_before_minute])
                                </div>
                            </div>





                         </div>

                     </div>
                 </div>
             </div>

            </div>
                 </div>










    </div>





@endsection
