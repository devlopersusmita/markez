@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>My Teachers</h2>

    </div>

    <div class="table-responsive category-table">
      <table class="table">
        <thead>
                <th>Name</th>
                <th>Email</th>
                <th></th>
        </thead>
        <tbody>

          @if(!empty($my_teachers))
          @foreach($my_teachers as $my_teacher)
          <tr>
                <td>{{$my_teacher['name']}}  </td>
                  <td>{{$my_teacher['email']}}  </td>

                 <td>
                     <span class="button is-solid green-button raised modal-trigger" id="add-assign-course-link" data-modal="teacher-send-add" data-id="<?php echo $my_teacher['id']?>" onclick="valuePass(<?php echo $my_teacher['id']; ?>)" >Send Request</a>
                </td>

          </tr>
          @endforeach

          @endif
        </tbody>
      </table>
    </div>

    @endsection



 <!-- Modal to add new Course starts-->
 <div id="teacher-send-add" class="modal common-modal change-cover-modal is-medium has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="card">
                    <div class="card-heading">
                        <h5 class="modal-title">Assign Course</h5>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                <img src="images/icon-modal-close.svg" alt="">
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="assign-teacher-send"   enctype="multipart/form-data" >
                        <input type="hidden" value="{{$user_id}}" name="user_id">
                        <input type="hidden" name="teacher_id" id="teacher_id">
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
                                    <span class="text-danger" id="form-input-error"></span>
                                    <span class="text-success" id="form-input-success"></span>
                                </div>
                                <button type="submit" id="institution_teacher_send" class="button is-solid primary-button data-add">Save</button>



                                <button data-dismiss="modal" aria-label="Close" class="button is-solid data-cancel close-modall">Cancel</button>
                            </div>
                          </form>
                    </div>
                </div>
        </div>
 </div>
<!-- Modal to add new Course Ends-->


