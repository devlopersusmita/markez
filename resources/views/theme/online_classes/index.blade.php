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
                                        <h2>Online Class</h2>
                                        <div class="header-actions">
                                             <div class="buttons">
                                                <a href="javascript:void(0)"  class="button is-solid accent-button raised modal-trigger"  id="add-new-meeting-link" data-modal="modals-add-meeting" >Add New Meeting</a>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="header-inner padding_top_10" >
                                        <h2>&nbsp;</h2>

                                        <div class="header-actions">
                                            <a class=""  href="{{Route('online_classes',['id'=>$course_id,'content_id'=>$course_content_details->id,'user_id'=>$user_id,'institution_id'=>$institution_id])}}"  id='search_btn'></a>

                                        </div>

                                    </div>
                                    <div class="header-inner padding_top_10">


                                        <div class="header-actions">

                                        <input type="hidden" value="{{$user_id}}" name="user_id">
            <input type="hidden" value="{{$institution_id}}">
                                    <div class="field is-grouped">
                                        <div class="control" >
                                            <a href="{{route('teachercourse',['user_id'=>$user_id,'institution_id'=>$institution_id])}}"><h1>{{$course_details->title}}</h1></a>


                                        </div>
                                        <div class="control" >
                                            <a href='{{Route("teachercoursecontent",["id"=>$course_id,"user_id"=>$user_id,"institution_id"=>$institution_id])}}'><h1>>> {{$course_content_details->title}}</h1></a>
                                        </div>
                                    </div>


                                        </div>

                                    </div>


                                </div>
                            </div>
                             <div id="overview-content" class="content-section is-active">

                                <div id="pagination_data">
                                    @include("theme.online_classes.index-pagination",['online_classes'=>$online_classes,'courses'=>$courses,'coursecontents'=>$coursecontents,'total_subscription'=>$total_subscription])
                                </div>
                            </div>





                         </div>

                     </div>
                 </div>
             </div>

            </div>
                 </div>










    </div>


<!-- Modal to add new Course starts-->
 <div id="modals-add-meeting" class="modal change-cover-modal is-medium has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="card">
            <div class="card-heading">
                <h3>New Meeting</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                    <span class="close-modal" data-dismiss="modal">
                            <i data-feather="x"></i>
                        </span>
                </div>
            </div>
            <div class="card-body">

                <form class="add-new-meeting" action="{{ route('online_classes.store') }}"  enctype="multipart/form-data" >
                    <input type="hidden" name="course_id" value="{{$coursecontents[0]->course_id}}"/>

                    <input type="hidden" name="course_content_id" value="{{$course_content_details->id}}"/>

                    <input type="hidden" value="{{$user_id}}" name="user_id">
            <input type="hidden" value="{{$institution_id}}" name="institution_id">


                    <div class="login-form">


                         <div class="field">
                            <label class="required">Course</label>
                            <style>
                                .required:after {
                                  content:" *";
                                  color: red;
                                }
                              </style>
                            <div class="control">


                                <input class="input title-input" readonly type="text" name="course_name" value="{{$coursecontents[0]->course_title}}"/>


                            </div>
                        </div>
                        <div class="field">
                            <label class="required">Course Content</label>
                            <style>
                                .required:after {
                                  content:" *";
                                  color: red;
                                }
                              </style>
                            <div class="control">


                                <input class="input title-input" readonly type="text" name="course_content_name" value="{{$course_content_details->title}}"/>


                            </div>
                        </div>
                        <div class="field">
                            <label class="required">Topic</label>
                            <style>
                                .required:after {
                                  content:" *";
                                  color: red;
                                }
                              </style>
                            <div class="control">
                                <input class="input title-input" type="text" name="topic" id="topic"  placeholder="Topic" required>

                            </div>
                        </div>
                          <div class="field">
                            <label class="required">Start Time</label>
                            <style>
                                .required:after {
                                  content:" *";
                                  color: red;
                                }
                              </style>
                            <div class="control">
                                <input class="input title-input" type="datetime-local" id="start_time" name="start_time"  placeholder="Start Time" required>

                            </div>
                        </div>

                         <div class="field">
                            <label class="required">Duration (Minutes)</label>
                            <style>
                                .required:after {
                                  content:" *";
                                  color: red;
                                }
                              </style>
                            <div class="control">
                                <input class="input title-input" type="number" name="duration" id="duration"  placeholder="Duration" required>

                            </div>
                        </div>

                         <div class="field">
                            <label class="required">Password</label>
                            <style>
                                .required:after {
                                  content:" *";
                                  color: red;
                                }
                              </style>
                            <div class="control">
                                <input class="input title-input" type="password" name="password" id="password"  placeholder="Password" value="12345678" required>

                            </div>
                        </div>


                         <div class="card-footer">
                        <div class="button-wrap" style="width: 100%;">
                        <button type="submit" id="course_meeting_add" class="button is-solid primary-button data-add">Save</button>



                        <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                        <div style="float:right;display:none;" id="loading_course_meeting_add"><img src="{{asset('frontend/images/loadingpleasewait.gif')}}" width="40" /></div>
                        </div>

                      </div>

                    </div>
                  </form>
            </div>
        </div>





</div>
</div>
<!-- Modal to add new Course Ends-->
 <!-- Modal to delete Course start-->

  <div  id="modals-meeting-delete" class="modal share-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
          <div class="modal-content">

              <div class="card">
                  <div class="card-heading">
                      <div class="dropdown is-primary share-dropdown">
                          <div>

                          <h3 style="text-align:center;">Delete Meeting</h3>

                          </div>

                      </div>

                      <!-- Close X button -->
                      <div class="close-wrap">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
              </button>
          </div>
                  </div>

                  <div class="card-body">

                      <div class="shared-publication">
                          <div class="featured-image">
                            <div class="alert" role="alert">
                                   <p style="text-align:center;">Are you sure?</p>
                                    <h6  style="text-align:center;" class="alert-heading">Warning!</h6>
                                  <div class="alert-body">
                                  Do you really want to delete this record? This process cannot be undone
                                  </div>
                             </div>

                          </div>


                      </div>
                  </div>
                  <div class="card-footer">


                      <div class="button-wrap" style="width: 100%;">

                          <input type="hidden" id="meeting_id" value="" />
                          <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                          <button  type="submit" id="meeting_delete" class="button is-solid primary-button data-delete">Delete</button>
                          <div style="float:right;display:none;" id="loading_meeting_delete"><img src="{{asset('frontend/images/loadingpleasewait.gif')}}" width="40" /></div>

                      </div>
                  </div>
              </div>

          </div>
   </div>

      <!-- Modal to delete Course Ends-->

@endsection
