@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Faq</h2>
      <a  class="btn btn-primary float-right add_modal" data-toggle="modal" data-target="#modals-add" style="cursor: pointer;"><i class="fa fa-plus"></i> New Faq</a>
    </div>
    @include('frontend.notification')
    <div class="table-responsive category-table">
      <table class="table">
        <thead>
          <th>Title</th>
          <th class="faq_content">Content</th>
          <th>Order Number</th>
          <th>Status</th>
          <th>Action</th>
        </thead>
        <tbody>
                    
          @if(!empty($faqs))
          @foreach($faqs as $faq)
          <tr>

            <td>{{$faq['title']}} </td>
            <td>{!!$faq['contents']!!}</td>
            <td class="order-no">{{$faq['order_no']}}</td>
            <td>

            <?php if($faq['status']=='active'){?>
                        <span class="btn btn-success statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $faq['id']?>" >Active</span>
                    <?php } ?>
                    <?php if($faq['status']=='inactive'){?>
                        <span class="btn btn-danger statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='active' data-id="<?php echo $faq['id']?>" >Inactive</span>
                    <?php } ?>
             
            </td>
            <td>
            <span   class="faqview_modals"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $faq['id']?>"><i class="fa fa-eye" style="font-size:18px"></i></span>
            <span   class="faqedit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $faq['id']?>"><i class="fa fa-pencil" style="font-size:18px"></i></span>
            <span    class="delete_modal" data-toggle="modal" data-target="#modals-delete" style="cursor: pointer;" data-id="<?php echo $faq['id']?>"><i class="fa fa-trash-o" style="font-size:18px"></i></span>
            </td>
          </tr>
          @endforeach

          @endif
        </tbody>
      </table>
    </div>
 
    @endsection

<!--  -->

<!-- Modal to statuschange Faq start-->
<div class="modal fade" id="modals-statuschange" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
          <h5 class="modal-title" >Faq Status Change</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body p-3 pt-0">

          <div class="alert" role="alert">
               <p>Are you sure?</p>
            <h6 class="alert-heading">Warning!</h6>
            <div class="alert-body">
              Do you really want to change this status as <span class="alert " id="faq_status_span"> </span>
            </div>
          </div>



            <div class="col-sm-12 ps-sm-0">
              <input type="hidden" id="statuschange_id" value="" />
              <input type="hidden" id="statuschange_status" value="" />
              <button type="submit" id="faq_statuschange" class="btn btn-danger data-delete">Save</button>
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </div>


        </div>
      </div>
    </div>
  </div>
  <!-- Modal to statuschange Faq Ends-->


 <!-- Modal to view Faq starts-->
 <div class="modal fade" id="modals-view" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form class="add-new-match modal-content pt-0"   enctype="multipart/form-data" >
      <div class="modal-header">
          <h5 class="modal-title" >Faq Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <!-- <span aria-hidden="true">&times;</span> -->
            <img src="images/icon-modal-close.svg" alt="">
          </button>
        </div>
        <div class="modal-body" >
          <div class="mb-1" id="details_modal_body_content">

          </div>


          <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary data-cancel" >Cancel</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Modal to view Faq Ends-->

     <!-- Modal to delete faq start-->
     <div class="modal fade" id="modals-delete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" >Delete Faq</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body p-3 pt-0">

              <div class="alert alert-warning" role="alert">
                   <p>Are you sure?</p>
                <h6 class="alert-heading">Warning!</h6>
                <div class="alert-body">
                  Do you really want to delete this record? This process cannot be undone.
                </div>
              </div>



                <div class="col-sm-12 ps-sm-0">
                  <input type="hidden" id="delete_id" value="" />
                  <button type="submit" id="faq_delete" class="btn btn-danger data-delete">Delete</button>
                   <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
                </div>


            </div>
          </div>
        </div>
      </div>
      <!-- Modal to delete faq Ends-->

       <!-- Modal to add faq starts-->
    <div class="modal fade" id="modals-add" tabindex="1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" >New Faq </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <!-- <span aria-hidden="true">&times;</span> -->
                <img src="images/icon-modal-close.svg" alt="">
              </button>
            </div>

            <div class="modal-body p-3">
              <form class="add-new-faq"   enctype="multipart/form-data" >
              <input type="hidden" value="{{$user_id}}" name="user_id">
               <div class="row">
                  <div class="col-md-12 modal-bottom-gap">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="Title" maxlength="250" />
                  </div>
                  <div class="col-md-12 modal-bottom-gap">
                  </div>
                  <div class="col-md-12 modal-bottom-gap">
                      <label>Content</label>
                  <input type="text" class="form-control" id="contents" placeholder="Enter the Contents" name="contents" maxlength="250">
              </div>
              <div class="col-md-12 modal-bottom-gap">
                <label> Order Number</label>
            <input type="number" class="form-control" id="order_no" placeholder="Enter the Order number" name="order_no" maxlength="250">
        </div>
              </div>

              <div class="mb-2"></div>

              <div class="col-md-12">
                  <span class="text-danger" id="form-input-error"></span>
                  <span class="text-success" id="form-input-success"></span>
                  </div>
             <button type="submit" id="faq_add" class="btn btn-success data-add">Save</button>
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary data-cancel" >Cancel</button>
              </form>

                </div>
            </div>



        </div>
      </div>
      <!-- Modal to add  faq Ends-->


       <!-- Modal to edit Faq starts-->
    <div class="modal fade" id="modals-edit" tabindex="1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" >Edit Faq </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <!-- <span aria-hidden="true">&times;</span> -->
                <img src="images/icon-modal-close.svg" alt="">
              </button>
            </div>

            <div class="modal-body p-3">
              <form class="edit-new-faq"   enctype="multipart/form-data" >
              <input type="hidden" value="{{$user_id}}" name="user_id">
               <div class="row">
                  <div class="col-md-12 modal-bottom-gap">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title" id="title_edit" placeholder="Title" maxlength="250" />
                  </div>
                   <div class="col-md-12 modal-bottom-gap">
                      <label>Status</label>
                      <select class="form-control select2" name="status" id="status_edit" >
                          <option value="active">Active</option>
                           <option value="inactive">Inactive</option>
                      </select>
                  </div>
                  <div class="col-md-12 modal-bottom-gap">
                      <label>Content</label>
                  <input type="text" class="form-control" id="contents_edit" placeholder="Enter the contents" name="contents">
                  </div>
                  <div class="col-md-12 modal-bottom-gap">
                    <label>Order Number</label>
                <input type="text" class="form-control" id="order_no_edit" placeholder="Enter the Order Number" name="order_no">
                </div>
              </div>
              <div class="col-md-12 modal-bottom-gap">
                  <span class="text-danger" id="form-input-error"></span>
                  <span class="text-success" id="form-input-success"></span>
                  </div>
              <input type="hidden" id="edit_id" value="" />

             <button type="submit" id="faq_edit" class="btn btn-success data-edit data-add">Save</button>
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary data-cancel" >Cancel</button>
              </form>

                </div>
            </div>



        </div>
      </div>
      <!-- Modal to edit faq Ends-->

<!--  -->




