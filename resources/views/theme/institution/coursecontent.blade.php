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
                                        <h2>Course Contents</h2>
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
                                            <input type="text" name="title" class="input" placeholder="Title" />
                                        </div>
                                        <div class="control" >
                                            <a class="button is-solid primary-button raised"  href='{{Route("institutioncoursecontent",["id"=>$course_id])}}' id='search_btn'>Search</a>
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

                                                </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                             <div id="overview-content" class="content-section is-active">

                                <div id="pagination_data">
                                    @include("theme.institution.coursecontent-pagination",['coursecontents'=>$coursecontents,'course_id'=>$course_id,'type'=>$type,'course_details'=>$course_details])
                                </div>
                            </div>





                         </div>

                     </div>
                 </div>
             </div>

            </div>
                 </div>








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




    </div>


@endsection
