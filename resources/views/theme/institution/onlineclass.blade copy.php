@extends('theme.institution.default')

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
                         @include('theme.institution.sidebar')
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

                                            {{-- <select class="input title-input" name="teacher_id_form"  >
                                                <option value="">Select one</option>
                                               @if(!empty($data_teachers) )
                                                    @foreach ($data_teachers as $teacher)
                                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select> --}}
                                        </div>

                                         <div class="control" >

                                            {{-- <select class="input title-input" name="course_id_form"  >
                                                <option value="">Select one</option>
                                               @if(!empty($courses) )
                                                    @foreach ($courses as $course)
                                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                                    @endforeach
                                                @endif
                                            </select> --}}
                                        </div>

                                        <div class="control" >
                                            {{-- <input type="text" name="topic" class="input" placeholder="Topic" /> --}}
                                        </div>
                                        <div class="control" >
                                            {{-- <a class="button is-solid primary-button raised"  href='{{Route("institutioncourseonline_classes")}}' id='search_btn'>Search</a> --}}

                                            <a class=""  href="{{Route('institutioncourseonline_classes',['id'=>$course_content_details['course_id'],'content_id'=>$course_content_details['id']])}}"id='search_btn'></a>
                                        </div>
                                    </div>
                                   </form>

                                        </div>

                                    </div>
                                    <div class="header-inner padding_top_10">


                                        <div class="header-actions">


                                    <div class="field is-grouped">
                                        <div class="control" >
                                            <a href="{{route('institutioncourse')}}"><h1>{{$course_details->title}}</h1></a>
                                        </div>
                                        <div class="control" >
                                            <a href='{{Route("institutioncoursecontent",["id"=>$course_id])}}'><h1>>> {{$course_content_details->title}}</h1></a>
                                        </div>
                                    </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                             <div id="overview-content" class="content-section is-active">

                                <div id="pagination_data">
                                    @include("theme.institution.onlineclass-pagination",['online_classes'=>$online_classes,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details])
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
