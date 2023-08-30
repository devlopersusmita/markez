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
                                        <h2>Teacher</h2>
                                        <div class="header-actions">

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- tab start --->
                            <div id="shop-page" class="shop-wrapper">

                                @if(session()->has('message'))
                                    <div class="box-heading margin_top_10 margin_bottom_10">
                                        <h4>{{ session()->get('message') }}</h4>
                                        
                                    </div>
                                @endif

                                <div class="shop-header">
                                    <div class="container">                      
                                        <div class="store-tabs max_width_80_percent">
                                            <a data-tab="public-tab" class="tab-control is-active">Public (Our Teachers)</a>
                                            <a data-tab="private_pending-tab" class="tab-control">Private (Pending Requests) </a>
                                           
                                                                                  
                                            <div class="store-naver"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="store-sections">
                                    <div class="container">

                                        <!--public-->
                                        <div id="public-tab" class="store-tab-pane is-active">
                                            <div class="product-card">
                                               
                                                <div class="groups-grid padding_0">

                                                <div class="grid-header">
                                                    
                                                     <div class="header-inner padding_top_10">
                                                        <h2>Public</h2>
                                                        
                                                        <div class="header-actions">
                                                            
                                                        <form id="searchform_public_it" name="searchform_public_it" >
                                                    <div class="field is-grouped">
                                                        <div class="control" >
                                                            <input type="text" name="name" class="input" placeholder="name" />
                                                        </div>
                                                        <div class="control" >
                                                            <a class="button is-solid primary-button raised"  href='{{Route("institutionteacher")}}' id='search_btn_public_it'>Search</a>
                                                        </div>
                                                    </div>
                                                   </form>
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                             <div id="overview-content" class="content-section is-active">

                                                <div id="pagination_data_public_it">
                                                    @include("theme.institution.teacher-public-pagination",['public'=>$public])
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        <!--private_pending-->
                                        <div id="private_pending-tab" class="store-tab-pane">
                                            <div class="product-card">
                                                <div class="groups-grid padding_0">

                                                <div class="grid-header">
                                                    
                                                     <div class="header-inner padding_top_10">
                                                        <h2>Private (Pending Requests)</h2>
                                                        
                                                        <div class="header-actions">
                                                            
                                                        <form id="searchform_private_pending_it" name="searchform_private_pending_it" >
                                                    <div class="field is-grouped">
                                                        <div class="control" >
                                                            <input type="text" name="name" class="input" placeholder="name" />
                                                        </div>
                                                        <div class="control" >
                                                            <a class="button is-solid primary-button raised"  href='{{Route("institutionteacher")}}' id='search_btn_private_pending_it'>Search</a>
                                                        </div>
                                                    </div>
                                                   </form>
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                             <div id="overview-content" class="content-section is-active">

                                                <div id="pagination_data_private_pending_it">
                                                    @include("theme.institution.teacher-private-pending-pagination",['private_pending'=>$private_pending])
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="groups-grid padding_0">

                                                <div class="grid-header">
                                                    
                                                     <div class="header-inner padding_top_10">
                                                        <h2>Private (Sending Requests)</h2>
                                                        
                                                        <div class="header-actions">
                                                            
                                                        <form id="searchform_private_sending_it" name="searchform_private_sending_it" >
                                                    <div class="field is-grouped">
                                                        <div class="control" >
                                                            <input type="text" name="name" class="input" placeholder="name" />
                                                        </div>
                                                        <div class="control" >
                                                            <a class="button is-solid primary-button raised"  href='{{Route("institutionteacher")}}' id='search_btn_private_sending_it'>Search</a>
                                                        </div>
                                                    </div>
                                                   </form>
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                             <div id="overview-content" class="content-section is-active">

                                                <div id="pagination_data_private_sending_it">
                                                    @include("theme.institution.teacher-private-sending-pagination",['private_sending'=>$private_sending])
                                                </div>
                                            </div>




                                            </div>
                                        </div>

                                       

                                     
                                    </div>
                                </div>
                            </div>

                            <!--tab end --->

                         

                       

                      
                         </div>

                     </div>
                 </div>
             </div>

            </div>
                 </div>

      
     
     
      
     
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
                        <button  type="submit"  class="button is-solid primary-button data-delete teacher_delete_it">Remove</button>
                        <div style="float:right;display:none;" id="loading_teacher_delete_it"><img src="{{asset('frontend/images/loadingpleasewait.gif')}}" width="40" /></div>

                    </div>
                </div>
            </div>

        </div>
 </div>

    <!-- Modal to delete  Ends--> 
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
                        <button  type="submit"  class="button is-solid primary-button data-approve teacher_approve_it">Approve</button>
                        <div style="float:right;display:none;" id="loading_teacher_approve_it"><img src="{{asset('frontend/images/loadingpleasewait.gif')}}" width="40" /></div>

                    </div>
                </div>
            </div>

        </div>
 </div>

    <!-- Modal to delete  Ends--> 
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
      
    </div>


@endsection
