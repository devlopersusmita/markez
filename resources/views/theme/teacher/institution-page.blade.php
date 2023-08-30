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
                                <h2>Institutions Page </h2>

                                <div class="header-actions">



                                </div>

                            </div>



                        </div>
                    </div>


                    <div id="overview-content" class="content-section is-active">

                            <div id="pagination_data">
                            @include("theme.teacher.institution-page-pagination",['institutions'=>$institutions])
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








    </div>


@endsection



