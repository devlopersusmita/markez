@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Course</h2>
      <a href="javascript:void(0)"  class="button is-solid accent-button raised modal-trigger" data-toggle="modal" data-target="#modals-add" id="add-new-course-link">Add New Course</a>
    </div>

    <div class="table-responsive category-table">
      <table class="table course-table">
        <thead>
            <th>Title</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Student Limit</th>
            <th>Visibility</th>
            <th>Complete</th>
            <th>Type</th>
            <th>Start Date</th>
            <th>Expired</th>
            <th>End Date</th>
            <th>Status</th>
            <th class="teacher-comision">Teacher Commission</th>
            <th>Action</th>
        </thead>
        <tbody>

        @if(!empty($courses))
        @foreach($courses as $course)
          <tr>

          <tr>
                  <td>{{$course['title']}}  </td>
                  <td>{{$course['slug']}} </td>

                  <td>{{$course['category_name']}} </td>
                  <td>{{$course['students_limit']}} </td>
                  <td>
                    <?php if($course['visibility']=='1'){?>
                        <span class="button is-solid green-button raised"  style="cursor: pointer;">Yes</span>
                    <?php } ?>
                    <?php if($course['visibility']=='0'){?>
                        <span class="button is-solid red-button raised" style="cursor: pointer;">No</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if($course['is_fully_complete']==1){?>
                        <span class="button is-solid green-button raised" >Yes</span>
                    <?php } ?>
                    <?php if($course['is_fully_complete']==0){?>
                        <span class="button is-solid red-button raised">No</span>
                    <?php } ?>
                </td>

                  <td>{{$course['type']}} </td>
                  <td>{{$course['start_date']}} </td>
                  <td>



                  <?php
                    $current_date_time = Carbon\Carbon::now();
                    $current_date_time->toDateString();

                    if($current_date_time > $course['end_date'] ){?>
                        <span class="button is-solid red-button raised"  style="cursor: pointer;">Yes</span>
                    <?php } ?>

                  </td>

                  <td>{{$course['end_date']}} </td>

                <td>
                    <?php if($course['status']=='active'){?>
                        <span class="button is-solid green-button raised statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $course['id']?>" >Active</span>
                    <?php } ?>
                    <?php if($course['status']=='inactive'){?>
                        <span class="button is-solid red-button raised statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='active' data-id="<?php echo $course['id']?>" >Inactive</span>
                    <?php } ?>
                </td>

                <td>

                        <span class="button is-solid primary-button raised setup_modal" data-toggle="modal" data-target="#modals-setup" style="cursor: pointer;"  data-id="<?php echo $course['id']?>" >Setup</span>

                </td>


                <td class="course-action">

                <input type="hidden" value="{{$user_id}}" name="user_id">
                                <?php $course_id = $course["id"]; ?>
                                <a href='{{Route("institutioncoursecontent",["id"=>$course_id,"user_id"=>$user_id])}}'  class="button is-solid blue-button raised"   style="cursor: pointer;"  >Contents</a>

                                <span   class="view_modal_course"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $course['id']?>" ><i class="fa fa-eye" style="font-size:18px"></i></span>
                                <span   class="edit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $course['id']?>" ><i class="fa fa-pencil" style="font-size:18px"></i></span>

                                <?php  if($current_date_time < $course['start_date']){?>
                                <span   class="delete_modal" data-toggle="modal" data-target="#modals-delete" style="cursor: pointer;"data-id="<?php echo $course['id']?>"><i class="fa fa-trash-o" style="font-size:18px"></i></span>

                                    <?php } ?>
                </td>

          </tr>
          @endforeach

          @endif
        </tbody>
      </table>
    </div>

    @endsection

 <!-- Modal to add new Course starts-->
 <div id="modals-add" class="modal common-modal change-cover-modal is-medium has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">New Course</h5>
            <!-- Close X button -->
            <div class="close-wrap">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                    <img src="images/icon-modal-close.svg" alt="">
                </button>
            </div>
        </div>

        <div class="modal-body p-3">
                            <form class="add-new-course" enctype="multipart/form-data" >
                                <input type="hidden" value="{{$user_id}}" name="user_id">
                                <div class="login-form">
                                    <div class="field">
                                        <label class="required">Title</label>
                                        <style>
                                            .required:after {
                                              content:" *";
                                              color: red;
                                          }
                                      </style>
                                      <div class="control">
                                        <input class="input title-input" type="text" name="title" id="title"  placeholder="Title" required>

                                    </div>
                                </div>
                                <div class="field">
                                    <label>Description</label>
                                    <div class="control">

                                        <input type="text" class="input title-input" id="description" placeholder="Enter the Description" name="description">
                                    </div>
                                </div>


                                <div class="field">
                                   <div class="control">
                                   </div>
                               </div>
                               <div class="field">
                                <label class="required">Category</label>
                                <div class="control">
                                    <select class="input title-input" name="category_id" id="category_id" maxlength="250" required>
                                        <option value="">Select a category</option>
                                        @foreach($categories as $category)
                                        @if($category->status=='active')
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>


                                </div>
                            </div>


                            <div class="field">
                                <label class="required">Status</label>
                                <div class="control">
                                    <select name="status" class="input title-input select_2" id="status" required>
                                        <option value="" >Select Type</option>
                                        <option  value="active" >Active</option>
                                        <option value="inactive">Inactive</option>

                                    </select>
                                </div>
                            </div>

                            <div class="field">
                                <label class="required">Students Limit</label>
                                <div class="control">
                                    <input class="input title-input" type="number" name="students_limit" id="students_limit"  placeholder="Enter Students Limit" required>

                                </div>
                            </div>

                            <div class="field">
                                <label class="required">Price</label>
                                <div class="control">
                                    <input class="input title-input" type="number" name="price" id="price"  placeholder="Enter Price" required>

                                </div>
                            </div>

                            <div class="field">
                                <label class="required">Type</label>
                                <div class="control">
                                    <select name="type" class="input title-input select_2" id="type" required>
                                        <option value="" >Select Type</option>
                                        <option  value="zoom" >Zoom</option>
                                        <option value="video">Video</option>
                                        <option value="text">Text</option>

                                    </select>
                                </div>
                            </div>

                            <div class="field">
                                <label>Preview Image</label>
                                <div class="control">
                                    <input name="preview_image" id="preview_image" type="file" class="input title-input" accept=".jpg,.png,.jpeg">
                                    <span class="lbl_hints"></span>
                                </div>
                            </div>

                            <div class="field">
                                <label>Preview Video</label>
                                <div class="control">
                                    <input name="preview_video" id="preview_video" type="text" class="input title-input" >

                                </div>
                            </div>
                            <div class="field">
                                <label class="required">Start Date</label>
                                <div class="control">
                                    <input name="start_date" id="start_date" type="date" class="input title-input" required >

                                </div>
                            </div>
                            <div class="field">
                                <label class="required">End Date</label>
                                <div class="control">
                                    <input name="end_date" id="end_date" type="date" class="input title-input" required >

                                </div>
                            </div>

                            <div class="field">
                                <label class="required">Visibility</label>
                                <div class="control">
                                    <select name="visibility" class="input title-input select_2" id="visibility" required>
                                        <option value="" >Select Type</option>
                                        <option value="1" >Yes</option>
                                        <option value="0" >No</option>

                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label>Tags</label>
                                <div class="control">
                                    <input name="tags" id="tags" type="text" class="input title-input" >

                                </div>
                            </div>
                            <div class="field">
                                <span class="text-danger" id="form-input-error"></span>
                                <span class="text-success" id="form-input-success"></span>
                            </div>
                            <button type="submit" id="course_add" class="button is-solid primary-button data-add">Save</button>

                            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary data-cancel close-modal">Cancel</button>

                        </div>
                    </form>
        </div>

    </div>
 </div>
<!-- Modal to add new Course Ends-->


   <!-- Modal to Edit  Course starts-->
 <div id="modals-edit" class="modal common-modal change-cover-modal is-medium has-light-bg">
        <div class="modal-background"></div>
         <div class="modal-content">
                <div class="card">
                    <div class="card-heading">
                        <h5 class="modal-title">Edit Course</h5>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <!-- <span aria-hidden="true">&times;</span> -->
                                <img src="images/icon-modal-close.svg" alt="">
                            </button>
                        </div>
            </div>
            <div class="card-body">
                <form class="edit-new-course"   enctype="multipart/form-data" >
                    <input type="hidden" name="old_preview_image" id="old_preview_image" value="">
                    <input type="hidden" value="{{$user_id}}" name="user_id">
                    <div class="login-form">
                        <div class="field">
                            <style>
                                .required:after {
                                  content:" *";
                                  color: red;
                                }
                              </style>
                            <label class="required">Title</label>
                            <div class="control">
                                <input class="input title-input" type="text" name="title"  id="title_edit"  placeholder="Title" required>

                            </div>
                        </div>
                        <div class="field">
                            <label>Description</label>
                            <div class="control">

                                <input type="text" class="input title-input" id="description_edit" placeholder="Enter the Description" name="description">



                            </div>
                        </div>


                        <div class="field">
                            <label class="required">Status</label>
                                <div class="control">
                                <select name="status" class="input title-input select_2" id="status_edit" required>
                                    <option value="" >Select Type</option>
                                    <option  value="active" >Active</option>
                                     <option value="inactive">Inactive</option>

                                 </select>
                                </div>
                        </div>

                        <div class="field">
                            <label class="required">Category</label>
                            <div class="control">
                            <select class="input title-input" name="category_id" id="category_id_edit" required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                @if($category->status=='active')

                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                                @endif
                                @endforeach
                            </select>


                            </div>
                        </div>


                        <div class="field">
                            <label class="required">Students Limit</label>
                            <div class="control">
                                <input class="input title-input" type="number" name="students_limit" id="students_limit_edit"  placeholder="Enter Students Limit" required>

                            </div>
                        </div>

                        <div class="field">
                            <label  class="required">Price</label>
                            <div class="control">
                                <input class="input title-input" type="number" name="price" id="price_edit"  placeholder="Enter Price" required>

                            </div>
                        </div>

                        <div class="field">
                            <label class="required">Type</label>
                                <div class="control">
                                <select name="type" class="input title-input select_2" id="type_edit" required>
                                    <option value="" >Select Type</option>
                                    <option  value="zoom" >Zoom</option>
                                     <option value="video">Video</option>
                                     <option value="text">Text</option>

                                 </select>
                                </div>
                        </div>



                        <div class="field">
                            <label>Preview Image</label>
                            <div class="control">
                            <input name="preview_image"  type="file" class="input title-input" accept=".jpg,.png,.jpeg" >

                             <div id="preview_image_edit_div" ></div>






                            <span class="lbl_hints"></span>
                            </div>
                        </div>
                        <div class="field">
                            <label>Preview Video</label>
                            <div class="control">
                            <input name="preview_video" id="preview_video_edit" type="text" class="input title-input" >

                            </div>
                        </div>
                        <div class="field">
                            <label class="required">Start Date</label>
                            <div class="control">
                            <input name="start_date" id="start_date_edit" type="date" class="input title-input" required>

                            </div>
                        </div>
                        <div class="field">
                            <label class="required">End Date</label>
                            <div class="control">
                            <input name="end_date" id="end_date_edit" type="date" class="input title-input" required>

                            </div>
                        </div>
                        <div class="field">
                            <label class="required">Visibility</label>
                                <div class="control">
                                <select name="visibility" class="input title-input select_2" id="visibility_edit" required>
                                    <option value="" >Select Type</option>
                                    <option value="1" >Yes</option>
                                    <option value="0" >No</option>

                                 </select>
                                </div>
                            </div>
                            <div class="field">
                                <label>Fully Complete</label>
                                    <div class="control">
                                    <select name="is_fully_complete" class="input title-input select_2" id="is_fully_complete_edit">
                                        <option value="" >Select Type</option>
                                        <option value="1" >Yes</option>
                                         <option value="0" >No</option>

                                     </select>
                                    </div>
                                </div>
                            <div class="field">
                                <label>Tags</label>
                                <div class="control">
                                <input name="tags" id="tags_edit" type="text" class="input title-input" >

                                </div>
                            </div>

                        <input type="hidden" id="edit_id" value="" />
                        <button type="submit" id="course_edit" class="button is-solid primary-button data-edit data-add">Save</button>

                        <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary data-cancel">Cancel</button>


                    </div>
                </form>
            </div>
        </div>





      </div>
 </div>



<!-- Modal to edit  Course Ends-->


  <!-- Modal to status change Course starts-->

  <div  id="modals-statuschange" class="modal share-modal is-xsmall has-light-bg">
     <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <div class="dropdown is-primary share-dropdown">
                        <div style="text-align: center;">

                               <h3>Course Status Change</h3>

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
                                    Do you really want to change this status as <span class="alert " id="course_status_span"> </span>
                                </div>
                           </div>

                        </div>


                    </div>
                </div>
                <div class="card-footer">


                    <div class="button-wrap">
                        <input type="hidden" id="statuschange_id" value="" />
                        <input type="hidden" id="statuschange_status" value="" />
                        <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                        <button type="submit" id="course_statuschange" class="button is-solid primary-button data-delete">Save</button>

                    </div>
                </div>
            </div>

        </div>
 </div>

 <!-- Modal to setup percentage Course starts-->

  <div  id="modals-setup" class="modal share-modal is-xsmall has-light-bg">
     <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <div class="dropdown is-primary share-dropdown">
                        <div style="text-align: center;">

                               <h3>Course Commission Percentage to Teachers</h3>

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
                    <div id="commission_percentage_message_div"></div>
                    <div class="shared-publication" id="commission_percentage_div">


                    </div>
                </div>
                <div class="card-footer">


                    <div class="button-wrap">
                        <input type="hidden" id="course_setup_course_id" value="" />
                        <input type="hidden" id="course_setup_teacher_ids" value="" />

                        <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                        <button type="submit" id="course_setup" class="button is-solid primary-button data-delete">Save</button>

                    </div>
                </div>
            </div>

        </div>
 </div>

      <!-- Modal to delete Course start-->

 <div  id="modals-delete" class="modal share-modal is-xsmall has-light-bg">
  <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <div class="dropdown is-primary share-dropdown">
                        <div>

                        <h3 style="text-align:center;">Delete Course</h3>

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


                    <div class="button-wrap">

                        <input type="hidden" id="delete_id" value="" />
                        <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                        <button  type="submit" id="course_delete" class="button is-solid primary-button data-delete">Delete</button>

                    </div>
                </div>
            </div>

        </div>
 </div>

    <!-- Modal to delete Course Ends-->


   <!-- Change cover image modal -->


 <!-- Modal to view  Course starts-->
 <div id="modals-view"  class="modal change-cover-modal is-medium has-light-bg">
   <div class="modal-background" ></div>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Course Details</h5>
            <!-- Close X button -->
            <div class="close-wrap">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                    <img src="images/icon-modal-close.svg" alt="">
                </button>
            </div>
        </div>
        <div class="card-body">
            <form class="add-new-match modal-content  pt-0" enctype="multipart/form-data" >
                <div class="login-form">
                    <div class="modal-body" >
                      <div class="mb-1" id="details_modal_body_content">
                      </div>
                      <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary data-cancel">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
   </div>
</div>
    <!-- Modal to view new Course Ends-->




