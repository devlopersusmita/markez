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
                                       <h2>Course Contents</h2>
                                       <div class="header-actions">
                                            <div class="buttons">
                                               <a href="javascript:void(0)"  class="button is-solid accent-button raised modal-trigger" id="add-new-coursecontent-link"  data-modal="modals-add">Add New Content</a>
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
                                           <a class="button is-solid primary-button raised"  href='{{Route("teachercoursecontent",["id"=>$course_id,"user_id"=>$user_id,"institution_id"=>$institution_id])}}' id='search_btn'>Search</a>
                                       </div>
                                   </div>
                                  </form>

                                       </div>

                                   </div>
                                   <div class="header-inner padding_top_10">


                                       <div class="header-actions">


                                               <div class="field is-grouped">
                                                   <div class="control" >
                                                       <a href="{{route('teachercourse',['user_id'=>$user_id,'institution_id'=>$institution_id])}}"><h1>{{$course_details->title}}</h1></a>
                                                   </div>

                                               </div>


                                       </div>

                                   </div>

                               </div>
                           </div>
                            <div id="overview-content" class="content-section is-active">

                               <div id="pagination_data">
                                   @include("theme.teacher.coursecontent-pagination",['coursecontents'=>$coursecontents,'course_id'=>$course_id,'course_details'=>$course_details])
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
                <h3>New Course Content</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                    <span class="close-modal" data-dismiss="modal">
                            <i data-feather="x"></i>
                        </span>
                </div>
            </div>
            <div class="card-body">
                <form class="add-new-course"   enctype="multipart/form-data" >
                    <input type="hidden" name="course_id" value="{{$course_id}}" />
                    <input type="hidden" value="{{$user_id}}" name="user_id">
            <input type="hidden" value="{{$institution_id}}" name="institution_id">



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
                        <label class="required">Status</label>
                            <div class="control">
                            <select name="status" class="input title-input select_2" id="status" required>
                                <option value="" >Select Status</option>
                                <option  value="active" >Active</option>
                                 <option value="inactive">Inactive</option>

                             </select>
                            </div>
                        </div>






                        <div class="field">
                            <label class="required">Type</label>
                                <div class="control">
                                <select name="type" class="input title-input select_2" id="type" required>
                                    <option value="" >Select Type</option>
                                    <option  value="zoom" >Zoom</option>
                                     <option value="quiz">Quiz</option>

                                 </select>
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
                                    <option value="" >Select Visibility</option>
                                    <option value="1" >Yes</option>
                                     <option value="0" >No</option>

                                 </select>
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
                    <h3>Edit Course Content</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
        </div>
        <div class="card-body">
            <form class="edit-new-course"   enctype="multipart/form-data" >
                <input type="hidden" name="course_id" value="{{$course_id}}" />
                <input type="hidden" value="{{$user_id}}" name="user_id">
            <input type="hidden" value="{{$institution_id}}" name="institution_id">

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
                                <option value="" >Select Status</option>
                                <option  value="active" >Active</option>
                                 <option value="inactive">Inactive</option>

                             </select>
                            </div>
                    </div>
                    <div class="field">
                        <label class="required">Type</label>
                            <div class="control">
                             <input type="text" class="input title-input" id="type_edit"  readonly name="type">
                            </div>
                        </div>


                                    {{-- <div class="field">
                                        <label >Content</label>
                                        <div class="control">

                                            <input type="text" class="input title-input" id="content_edit" placeholder="Enter the Content" name="content">
                                        </div>
                                    </div> --}}
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
 <!-- Modal to view  Course starts-->
 <div id="modals-view"  class="modal change-cover-modal is-medium has-light-bg">
    <div class="modal-background" ></div>
     <div class="modal-content">
     <div class="card">
         <div class="card-heading">
             <h3>Course Content  Details</h3>
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

       <!-- Modal to status change Course starts-->

  <div  id="modals-statuschangecoursecontent" class="modal share-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
       <div class="modal-content">

           <div class="card">
               <div class="card-heading">
                   <div class="dropdown is-primary share-dropdown">
                       <div style="text-align: center;">

                              <h3>Course Content Status Change</h3>

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
                                   Do you really want to change this status as <span class="alert " id="coursecontent_status_span"> </span>
                               </div>
                          </div>

                       </div>


                   </div>
               </div>
               <div class="card-footer">


                   <div class="button-wrap">
                       <input type="hidden" id="coursecontentstatuschange_id" value="" />
                       <input type="hidden" id="coursecontentstatuschange_status" value="" />
                       <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                       <button type="submit" id="coursecontent_statuschange" class="button is-solid primary-button data-delete">Save</button>

                   </div>
               </div>
           </div>

       </div>
</div>

  <!-- Modal to status change Course Ends-->

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


    </div>


@endsection
