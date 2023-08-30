@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Teachers Page</h2>
    </div>

    <div class="teacher-grid">
        <div class="row">
            @if(!empty($private_sending))
           @foreach($private_sending as $teacher)
            <div class="col-lg-3 col-md-6">
                <div class="teacher-profile text-center">
                    <img src="images/profile-edit-bg.png" alt="" class="teacher-profile-img">
                    <h4>{{$teacher['name']}}</h4>
                    <div class="three-dots">
                        <img src="images/ellipsis.png" alt="">
                        <div class="hover-box">
                            <span  class="raised view_modal_it"  data-toggle="modal" data-target="#modals-view_it" style="cursor: pointer;" data-id="<?php echo $teacher['id']?>" data-type="private_sending" >View Profile</span>
                            <span class="raised send_modal_it" data-toggle="modal" data-target="#modals-send_it" style="cursor: pointer;" data-id="<?php echo $teacher['id']?>" data-type="private_sending">Send Request</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

          @endif
        </div>
    </div>

    @endsection

<!-- Modal to view new  starts-->
<div id="modals-view_it"  class="modal view-details-popup change-cover-modal is-medium has-light-bg">
    <div class="modal-background" ></div>
    <div class="modal-content margin_top_10">
        <div class="card">
            <div class="card-heading">
                <h5 class="modal-title">Teacher Details</h5>
                <!-- Close X button -->
                <div class="close-wrap">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="images/icon-modal-close.svg" alt="">
                        </button>
            </div>

            </div>
            <div class="card-body">
                <form class="add-new-match modal-content  pt-0"   enctype="multipart/form-data" >
                    <div class="login-form">
                        <div class="modal-body" >
                          <div class="mb-1" id="details_modal_body_content_it">
                          </div>

                          <button data-dismiss="modal" aria-label="Close" class="close-modal btn btn-outline-secondary data-cancel">Cancel</button>
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
                        <input type="hidden" value="{{$user_id}}" name="user_id">
                        <h5 class="modal-title" style="text-align:center;">Send Request </h5>

                        </div>

                    </div>

                    <!-- Close X button -->
                    <div class="close-wrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="images/icon-modal-close.svg" alt="">
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
                        <button data-dismiss="modal" aria-label="Close" class="close-modal btn btn-outline-secondary data-cancel">Cancel</button>
                        <button  type="submit"  class="button is-solid primary-button data-delete teacher_send_it data-add">Confirm Send</button>
                        <div style="float:right;display:none;" id="loading_teacher_send_it"><img src="{{asset('frontend/images/loadingpleasewait.gif')}}" width="40" /></div>

                    </div>
                </div>
            </div>

        </div>
 </div>

    <!-- Modal to send  Ends-->


