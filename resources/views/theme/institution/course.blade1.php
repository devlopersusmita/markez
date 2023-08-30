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
                                <h2>Course</h2>

                                <div class="header-actions">

                                    <div class="buttons">
                                        <a href="javascript:void(0)"  class="button is-solid accent-button raised modal-trigger" id="add-new-course-link" data-modal="modals-add">Add New Course</a>
                                    </div>

                                </div>

                            </div>
                            <div class="header-inner padding_top_10">
                                <h2>&nbsp;</h2>

                                <div class="header-actions">

                                <form id="searchform" name="searchform" >
                            <div class="field is-grouped">
                                <div class="control" >
                                    <input type="text" name="title" class="input" placeholder="Title" />
                                </div>
                                <div class="control" >
                                    <a class="button is-solid primary-button raised"  href='{{Route("institutioncourse")}}' id='search_btn'>Search</a>
                                </div>
                            </div>
                           </form>

                                </div>

                            </div>



                        </div>
                    </div>


                    <div id="overview-content" class="content-section is-active">

                            <div id="pagination_data">
                                @include("theme.institution.course-pagination",['courses'=>$courses])
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

   </div>
        </div>

 <!-- Modal to add new Course starts-->
 <div id="modals-add" class="modal change-cover-modal is-medium has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="card">
                    <div class="card-heading">
                        <h3>New Course</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="add-new-course"   enctype="multipart/form-data" >
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

                                <!-- <div class="field">
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
                                </div> -->

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



                                <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                            </div>
                          </form>
                    </div>
                </div>





        </div>
 </div>
<!-- Modal to add new Course Ends-->


   <!-- Modal to Edit  Course starts-->
 <div id="modals-edit" class="modal change-cover-modal is-medium has-light-bg">
        <div class="modal-background"></div>
         <div class="modal-content">
                <div class="card">
                    <div class="card-heading">
                        <h3>Edit Course</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            </div>
            <div class="card-body">
                <form class="edit-new-course"   enctype="multipart/form-data" >
                    <input type="hidden" name="old_preview_image" id="old_preview_image" value="">
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
                        <!-- <div class="field">
                            <label class="required">Teacher</label>
                            <div class="control">
                            <select class="input title-input" name="teacher_id[]" id="teacher_id_edit" multiple style="height:90px;" required>

                                @if(!empty($data_teacher))
                                    @foreach($data_teacher as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                @endif


                            </select>


                            </div>
                        </div> -->

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
                        <button type="submit" id="course_edit" class="button is-solid primary-button data-edit">Save</button>

                        <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>


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
    <div class="card">
        <div class="card-heading">
            <h3>Course Details</h3>
            <!-- Close X button -->
            <div class="close-wrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
            </button>
        </div>

        </div>
        <div class="card-body">
            <form class="add-new-match modal-content  pt-0"   enctype="multipart/form-data" >
                <div class="login-form">
                <div class="modal-header">


    </div>
    <div class="modal-body" >
      <div class="mb-1" id="details_modal_body_content">

      </div>


      <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
    </div>















                </div>
            </form>
        </div>
    </div>





   </div>
</div>
    <!-- Modal to view new Course Ends-->

        <!--html/partials/pages/profile/timeline/modals/change-cover-modal.html-->
        <div id="change-cover-modal" class="modal change-cover-modal is-medium has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">

                <div class="card">
                    <div class="card-heading">
                        <h3>Update Cover</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Placeholder -->
                        <div class="selection-placeholder">
                            <div class="columns">
                                <div class="column is-6">
                                    <!-- Selection box -->
                                    <div class="selection-box modal-trigger" data-modal="upload-crop-cover-modal">
                                        <div class="box-content">
                                            <img src="assets/img/illustrations/profile/upload-cover.svg" alt="">
                                            <div class="box-text">
                                                <span>Upload</span>
                                                <span>From your computer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <!-- Selection box -->
                                    <div class="selection-box modal-trigger" data-modal="user-photos-modal">
                                        <div class="box-content">
                                            <img src="assets/img/illustrations/profile/change-cover.svg" alt="">
                                            <div class="box-text">
                                                <span>Choose</span>
                                                <span>From your photos</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Change profile pic modal -->
        <!--html/partials/pages/profile/timeline/modals/change-profile-pic-modal.html-->
        <div id="change-profile-pic-modal" class="modal change-profile-pic-modal is-medium has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">

                <div class="card">
                    <div class="card-heading">
                        <h3>Update Profile Picture</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Placeholder -->
                        <div class="selection-placeholder">
                            <div class="columns">
                                <div class="column is-6">
                                    <!-- Selection box -->
                                    <div class="selection-box modal-trigger" data-modal="upload-crop-profile-modal">
                                        <div class="box-content">
                                            <img src="assets/img/illustrations/profile/change-profile.svg" alt="">
                                            <div class="box-text">
                                                <span>Upload</span>
                                                <span>From your computer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <!-- Selection box -->
                                    <div class="selection-box modal-trigger" data-modal="user-photos-modal">
                                        <div class="box-content">
                                            <img src="assets/img/illustrations/profile/upload-profile.svg" alt="">
                                            <div class="box-text">
                                                <span>Choose</span>
                                                <span>From your photos</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- User photos and albums -->
        <!--html/partials/pages/profile/timeline/modals/user-photos-modal.html-->

        <!-- Profile picture crop modal -->
        <!--html/partials/pages/profile/timeline/modals/upload-crop-profile-modal.html-->
        <div id="upload-crop-profile-modal" class="modal upload-crop-profile-modal is-xsmall has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">

                <div class="card">
                    <div class="card-heading">
                        <h3>Upload Picture</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <label class="profile-uploader-box" for="upload-profile-picture">
                            <span class="inner-content">
                                    <img src="assets/img/illustrations/profile/add-profile.svg" alt="">
                                    <span>Click here to <br>upload a profile picture</span>
                            </span>
                            <input type="file" id="upload-profile-picture" accept="image/*">
                        </label>
                        <div class="upload-demo-wrap is-hidden">
                            <div id="upload-profile"></div>
                            <div class="upload-help">
                                <a id="profile-upload-reset" class="profile-reset is-hidden">Reset Picture</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="submit-profile-picture" class="button is-solid accent-button is-fullwidth raised is-disabled">Use Picture</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Cover image crop modal -->
        <!--html/partials/pages/profile/timeline/modals/upload-crop-cover-modal.html-->
        <div id="upload-crop-cover-modal" class="modal upload-crop-cover-modal is-large has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">

                <div class="card">
                    <div class="card-heading">
                        <h3>Upload Cover</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <label class="cover-uploader-box" for="upload-cover-picture">
                            <span class="inner-content">
                                    <img src="assets/img/illustrations/profile/add-cover.svg" alt="">
                                    <span>Click here to <br>upload a cover image</span>
                            </span>
                            <input type="file" id="upload-cover-picture" accept="image/*">
                        </label>
                        <div class="upload-demo-wrap is-hidden">
                            <div id="upload-cover"></div>
                            <div class="upload-help">
                                <a id="cover-upload-reset" class="cover-reset is-hidden">Reset Picture</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="submit-cover-picture" class="button is-solid accent-button is-fullwidth raised is-disabled">Use
                            Picture</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection



