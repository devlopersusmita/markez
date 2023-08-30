@extends('theme.teacher.default')


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
                @include('theme.teacher.sidebar')

                <div class="right-content">
                    <div class="groups-grid padding_0">

                        <div class="grid-header">
                            <div class="header-inner">
                                <h2>Institutions Invitation </h2>

                                <div class="header-actions">



                                </div>

                            </div>



                        </div>
                    </div>


                    <div id="overview-content" class="content-section is-active">

                            <div id="pagination_data">
                            @include("theme.teacher.institution-invitation-pagination",['private_receiving'=>$private_receiving])
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

   </div>
        </div>




















 <!-- Modal to view new  starts-->
 <div id="modals-view_it"  class="modal change-cover-modal is-medium has-light-bg">
 <div class="modal-background" ></div>
 <div class="modal-content margin_top_10">
    <div class="card">
        <div class="card-heading">
            <h3>Institution Details</h3>
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
                      <div class="mb-1" id="details_modal_body_content_it">

                      </div>


                      <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





</div>
</div>
    <!-- Modal to view new  Ends-->


 <!-- Modal to approve  start-->

 <div  id="modals-approve_it" class="modal share-modal is-xsmall has-light-bg">
  <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <div class="dropdown is-primary share-dropdown">
                        <div>

                        <h3 style="text-align:center;">Approve </h3>

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
                                Do you really want to approve this request?  </div>
                           </div>

                        </div>


                    </div>
                </div>
                <div class="card-footer">


                     <div class="button-wrap" style="width: 100%;">

                        <input type="hidden" id="approve_id_it" value="" />
                        <input type="hidden" id="approve_type_it" value="" />
                        <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                        <button  type="submit"  class="button is-solid primary-button data-approve institution_approve_it">Approve</button>
                         <div style="float:right;display:none;" id="loading_institution_approve_it"><img src="{{asset('frontend/images/loadingpleasewait.gif')}}" width="40" /></div>

                    </div>
                </div>
            </div>

        </div>
 </div>

    <!-- Modal to approve  Ends-->
    <!-- Modal to delete  start-->

            <div  id="modals-delete_it" class="modal share-modal is-xsmall has-light-bg">
            <div class="modal-background"></div>
                <div class="modal-content">

                    <div class="card">
                        <div class="card-heading">
                            <div class="dropdown is-primary share-dropdown">
                                <div>

                                <h3 style="text-align:center;">Delete </h3>

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

                                <input type="hidden" id="delete_id_it" value="" />
                                <input type="hidden" id="delete_type_it" value="" />
                                <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                                <button  type="submit"  class="button is-solid primary-button data-delete institution_delete_it">Remove</button>
                                <div style="float:right;display:none;" id="loading_institution_delete_it"><img src="{{asset('frontend/images/loadingpleasewait.gif')}}" width="40" /></div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

    <!-- Modal to delete  Ends-->




    </div>


@endsection



