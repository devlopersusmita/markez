@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row assign_course_top_row">
      <h2>Assign Course Request</h2>

      <a href="javascript:void(0)" class="button is-solid accent-button raised modal-trigger" id="add-assign-course-link" data-modal="assigncourse-add">Assign Course to Teacher</a>
    </div>

    <div class="table-responsive category-table">
      <table class="table">
        <thead>
        <th>Course Name</th>
                <th>Teacher Name</th>
                <th>Status</th>

        </thead>
        <tbody>


          @foreach($courses as $course)
          <tr>

                    <td>{{$course['title']}}  </td>
                            <td>{{$course['name']}} </td>

                        <td class="starus-row">
                        <?php if($course['status']=='pending'){?>
                            <span class="pending">Pending</span>
                    <?php } ?>
                    <?php if($course['status']=='approve'){?>
                        <span class="active">Approve</span>
                    <?php } ?>
                    <?php if($course['status']=='reject'){?>
                        <span class="reject">Reject</span>
                    <?php } ?>

                        </td>




          </tr>
          @endforeach


        </tbody>
      </table>


      </div>
 </div>



    </div>

    @endsection



 <!-- Modal to add new Course starts-->
 <div id="assigncourse-add" class="modal common-modal change-cover-modal is-medium has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="card">
                    <div class="card-heading">
                        <h5 class="modal-title">Assign Course</h5>
                        <!-- Close X button -->

                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                <!-- <i data-feather="x"></i> -->
                                <img src="images/icon-modal-close.svg" alt="">
                            </span>
                        </div>

                    </div>
                    <div class="card-body">
                        <form class="assign-course-to-teacher"   enctype="multipart/form-data" >
                        <input type="hidden" value="{{$user_id}}" name="user_id">
                        <input type="hidden" value="{{$user_ids}}" name="user_ids">
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



                                <button data-dismiss="modal" aria-label="Close" class="button is-solid data-cancel close-modal">Cancel</button>
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
                     <input type="hidden" value="{{$user_id}}" name="user_id">
                     <input type="hidden" value="{{$user_ids}}" name="user_ids">
                        <div class="login-form">

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

