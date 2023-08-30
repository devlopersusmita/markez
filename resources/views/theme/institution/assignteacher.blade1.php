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
                                <h2>Assign Course</h2>

                                <div class="header-actions">

                                    <div class="buttons">
                                        <a href="javascript:void(0)"  class="button is-solid accent-button raised modal-trigger" id="add-assign-course-link" data-modal="assigncourse-add">Assign Course to Teacher</a>
                                    </div>

                                </div>

                            </div>
                            <div class="header-inner padding_top_10">
                                <h2>&nbsp;</h2>

                                <div class="header-actions">



                                </div>

                            </div>



                        </div>
                    </div>


                    <div id="overview-content" class="content-section is-active">

                            <div id="pagination_data">
                                @include("theme.institution.assignteacher-pagination",['courses'=>$courses,'course_lists'=>$course_lists,'data_teacher'=>$data_teacher])
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

   </div>
        </div>

 <!-- Modal to add new Course starts-->
 <div id="assigncourse-add" class="modal change-cover-modal is-medium has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="card">
                    <div class="card-heading">
                        <h3>Assign Course</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="assign-course-to-teacher"   enctype="multipart/form-data" >
                            <div class="login-form">

                            <div class="field">
                                    <label class="required">Course</label>
                                    <div class="control">
                                            <select class="input title-input" name="course_id" id="course_id" maxlength="250" required>
                                                <option value="">Select a course</option>
                                                @if(!empty($course_lists))
                                                    @foreach($course_lists as $course_list)
                                                        <option value="{{$course_list->id}}">{{$course_list->title}}</option>
                                                    @endforeach
                                                @endif


                                            </select>


                                    </div>
                                </div>

                                <div class="field">
                                    <label class="required">Teacher</label>
                                    <div class="control">
                                            <select class="input title-input" name="teacher_id" id="teacher_id" maxlength="250" required>
                                                <option value="">Select a teacher</option>
                                                @if(!empty($data_teacher))
                                                    @foreach($data_teacher as $teacher)
                                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                    @endforeach
                                                @endif


                                            </select>


                                    </div>
                                </div>






                                <div class="field">
                                    <span class="text-danger" id="form-input-error"></span>
                                    <span class="text-success" id="form-input-success"></span>
                                    </div>
                                <button type="submit" id="assign_course_to_teacher_add" class="button is-solid primary-button data-add">Save</button>



                                <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                            </div>
                          </form>
                    </div>
                </div>





        </div>
 </div>
<!-- Modal to add new Course Ends-->


   <!-- Modal to Edit  Course starts-->
 <div id="courseassign-edit" class="modal change-cover-modal is-medium has-light-bg">
        <div class="modal-background"></div>
         <div class="modal-content">
                <div class="card">
                    <div class="card-heading">
                        <h3>Edit Assign Teacher</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            </div>
            <div class="card-body">
                <form class="edit-assign-course-to-teacher"   enctype="multipart/form-data" >

                    <div class="login-form">
                        <div class="field">
                        <div class="field">
                            <label class="required">Course</label>
                            <div class="control">
                            <select class="input title-input" name="course_id" id="course_id_edit" maxlength="250" required>
                                                <option value="">Select a Course</option>
                                                @if(!empty($course_lists))
                                                    @foreach($course_lists as $course_list)
                                                        <option value="{{$course_list->id}}">{{$course_list->title}}</option>
                                                    @endforeach
                                                @endif


                                            </select>


                            </div>
                        </div>
                        <div class="field">
                            <label class="required">Teacher</label>
                            <div class="control">
                            <select class="input title-input" name="teacher_id" id="teacher_id_edit" required>
                            <option value="">Select a Teacher</option>
                                @if(!empty($data_teacher))
                                    @foreach($data_teacher as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                @endif


                            </select>


                            </div>
                        </div>

                        <input type="hidden" id="assignedit_id" value="" />
                        <button type="submit" id="assign_edit" class="button is-solid primary-button data-edit">Save</button>

                        <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>


                    </div>
                  </form>
            </div>
        </div>





      </div>
 </div>



<!-- Modal to edit  Course Ends-->







    </div>


@endsection



