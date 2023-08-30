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
                                        <h2>Course Quiz</h2>
                                        <div class="header-actions">
                                             <div class="buttons">
                                                <a href="javascript:void(0)"  class="button is-solid accent-button raised modal-trigger" id="add-new-quize-link" data-modal="modals-add">Add New Quiz</a>
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
                                            <a class="button is-solid primary-button raised"  href='{{Route('teachercoursecontentquize',["id"=>$course_id,"content_id"=>$course_content_id])}}' id='search_btn'>Search</a>
                                        </div>
                                    </div>
                                   </form>

                                        </div>

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
                                    </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                             <div id="overview-content" class="content-section is-active">

                                <div id="pagination_data">
                                    @include("theme.teacher.coursequize-pagination",['quizes'=>$quizes,'course_content_id'=>$course_content_id,'course_id'=>$course_id,'course_details'=>$course_details])
                                </div>
                            </div>





                         </div>

                     </div>
                 </div>
             </div>

            </div>
                 </div>




 <!-- Modal to add new Quiz starts-->
  <div id="modals-add" class="modal change-cover-modal is-medium has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="card">
            <div class="card-heading">
                <h3>New Quiz</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                    <span class="close-modal" data-dismiss="modal">
                            <i data-feather="x"></i>
                        </span>
                </div>
            </div>
            <div class="card-body">
                <form class="add-new-quiz"   enctype="multipart/form-data" >
                    <input type="hidden" name="course_content_id" value="{{$course_content_id}}">



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
                            <span class="text-danger" id="form-input-error"></span>
                            <span class="text-success" id="form-input-success"></span>
                            </div>


                        <button type="submit" id="quiz_add" class="button is-solid primary-button data-add">Save</button>



                        <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                    </div>
                  </form>
            </div>
        </div>





</div>
</div>
<!-- Modal to add new Course Ends-->


 <!-- Modal to view  Quiz starts-->
 <div id="modals-view"  class="modal change-cover-modal is-medium has-light-bg">
    <div class="modal-background" ></div>
     <div class="modal-content">
     <div class="card">
         <div class="card-heading">
             <h3>Quiz Details</h3>
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
     <!-- Modal to view  Quiz Ends-->

        <!-- Modal to Edit  Quiz starts-->
   <div id="modals-edit" class="modal change-cover-modal is-medium has-light-bg">
    <div class="modal-background"></div>
     <div class="modal-content">
            <div class="card">
                <div class="card-heading">
                    <h3>Edit Quiz</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
        </div>
        <div class="card-body">
            <form class="edit-new-quiz"   enctype="multipart/form-data" >
                <input type="hidden" name="course_content_id" value="{{$course_content_id}}" />


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


                 <input type="hidden" id="quizedit_id" value="" />
                    <button type="submit" id="quiz_edit" class="button is-solid primary-button data-edit">Save</button>

                    <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>


                </div>
              </form>
        </div>
    </div>





  </div>
</div>
<!-- Modal to edit  Quiz Ends-->



 <!-- Modal to status change Quiz starts-->

    <div  id="modals-statuschangequiz" class="modal share-modal is-xsmall has-light-bg">
         <div class="modal-background"></div>
           <div class="modal-content">

               <div class="card">
                   <div class="card-heading">
                       <div class="dropdown is-primary share-dropdown">
                           <div style="text-align: center;">

                                  <h3>Quiz Status Change</h3>

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
                                       Do you really want to change this status as <span class="alert " id="quiz_status_span"> </span>
                                   </div>
                              </div>

                           </div>


                       </div>
                   </div>
                   <div class="card-footer">


                       <div class="button-wrap">
                           <input type="hidden" id="quizstatuschange_id" value="" />
                           <input type="hidden" id="quizstatuschange_status" value="" />
                           <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                           <button type="submit" id="quiz_statuschange" class="button is-solid primary-button data-delete">Save</button>

                       </div>
                   </div>
               </div>

           </div>
    </div>

      <!-- Modal to status change Quiz Ends-->


  <!-- Modal to delete Quiz start-->

   <div  id="modals-delete" class="modal share-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
          <div class="modal-content">

              <div class="card">
                  <div class="card-heading">
                      <div class="dropdown is-primary share-dropdown">
                          <div>

                          <h3 style="text-align:center;">Delete Quiz</h3>

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

                          <input type="hidden" id="delete_id" value="" />
                          <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                          <button  type="submit" id="quiz_delete" class="button is-solid primary-button data-delete quizs_delete">Delete</button>
                          <div style="float:right;display:none;" id="loading_quizs_delete"><img src="{{asset('frontend/images/loadingpleasewait.gif')}}" width="40" /></div>

                      </div>
                  </div>
              </div>

          </div>
   </div>

      <!-- Modal to delete Quiz Ends-->






    </div>


@endsection
