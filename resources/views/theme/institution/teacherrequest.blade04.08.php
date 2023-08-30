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
                                <h2>Teachers Request</h2>

                                <div class="header-actions">



                                </div>

                            </div>




                        </div>
                    </div>
                    @if(session()->has('message'))
                                    <div class="box-heading margin_top_10 margin_bottom_10">
                                        <h4>{{ session()->get('message') }}</h4>

                                    </div>
                                @endif

                    <div id="overview-content" class="content-section is-active">

                            <div id="pagination_data">
                                @include("theme.institution.teacherrequest-pagination",['teacherrequests'=>$teacherrequests])
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

   </div>
        </div>


<!--  -->

<!-- Modal to view new  starts-->
<div id="modals-view_it"  class="modal view-details-popup change-cover-modal is-medium has-light-bg">
 <div class="modal-background" ></div>
 <div class="modal-content margin_top_10">
    <div class="card">
        <div class="card-heading">
            <h3>Teacher Details</h3>
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


    <!-- Modal to send  start-->

 <div  id="modals-send_it" class="modal share-modal is-xsmall has-light-bg">
  <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <div class="dropdown is-primary share-dropdown">
                        <div>

                        <h3 style="text-align:center;">Send Request </h3>

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
                                Do you really want to send request to Teacher
                                </div>
                           </div>

                        </div>


                    </div>
                </div>
                <div class="card-footer">


                    <div class="button-wrap" style="width: 100%;">

                        <input type="hidden" id="send_id_it" value="" />
                        <input type="hidden" id="send_type_it" value="" />
                        <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                        <button  type="submit"  class="button is-solid primary-button data-delete teacher_send_it">Confirm Send</button>
                        <div style="float:right;display:none;" id="loading_teacher_send_it"><img src="{{asset('frontend/images/loadingpleasewait.gif')}}" width="40" /></div>

                    </div>
                </div>
            </div>

        </div>
 </div>

    <!-- Modal to send  Ends-->


<!--  -->
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



