@extends('theme.student.default')

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
                @include('theme.student.sidebar')

                <div class="right-content">
                    <div class="groups-grid padding_0">

                        <div class="grid-header">
                            <div class="header-inner">
                                <h2>Course</h2>

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
                                    <a class="button is-solid primary-button raised"  href='{{Route("studentcourse",["user_id"=>$user_id,"institution_id"=>$institution_id])}}' id='search_btn'>Search</a>
                                </div>
                            </div>
                           </form>

                                </div>

                            </div>



                        </div>
                    </div>


                    <div id="overview-content" class="content-section is-active">

                            <div id="pagination_data">
                                @include("theme.student.course-pagination",['courses'=>$courses])
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


    </div>


@endsection
