@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">

            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">Faq</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Faq</li>

                    </ol>

                </div><!-- /.col -->

            </div><!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                 <div class="card-body">

             <div class="row">
                <div class="col-md-6"><h6>Search By</h6></div>
                <div class="col-md-6 "><a  class="btn btn-primary float-right add_modal" data-toggle="modal" data-target="#modals-add" style="cursor: pointer;"><i class="fa fa-plus"></i> New Faq</a></div>


                <div class="col-md-12">

               <form id="searchform" name="searchform">
                   <div class="row mt-4">

                        <div class="col-md-8"></div>
                        <div class="col-md-4" style="float: right;">


                               <div class="input-group mb-3">
                                      <input type="text" name="title" value="" class="form-control " placeholder="Title" aria-label="Title" aria-describedby="basic-addon2">
                                      <div class="input-group-append">

                                        <a class='btn btn-info' href='{{Route("faq")}}' id='search_btn'>Search</a>
                                      </div>
                                    </div>


                         </div>





                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
         <div id="pagination_data">
            @include("admin.faq.faq-pagination",['faqs'=>$faqs])
          </div>


    </div>


      </section>

    </div>

@endsection

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
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
          <div class="mb-1" id="details_modal_body_content">

          </div>


          <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
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
    <div class="modal fade" id="modals-add" tabindex="1"      aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" >New Faq </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body p-3 pt-0">
              <form class="add-new-faq"   enctype="multipart/form-data" >
               <div class="row">
                  <div class="col-md-12">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="Title" maxlength="250" />
                  </div>
                  <div class="col-md-12">
                  </div>
                  <div class="col-md-12">
                      <label>Content</label>
                  <input type="text" class="form-control" id="contents" placeholder="Enter the Contents" name="contents" maxlength="250">
              </div>
              <div class="col-md-12">
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
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
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
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body p-3 pt-0">
              <form class="edit-new-faq"   enctype="multipart/form-data" >
               <div class="row">
                  <div class="col-md-12">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title" id="title_edit" placeholder="Title" maxlength="250" />
                  </div>
                   <div class="col-md-12">
                      <label>Status</label>
                      <select class="form-control select2" name="status" id="status_edit" >
                          <option value="active">Active</option>
                           <option value="inactive">Inactive</option>
                      </select>
                  </div>
                  <div class="col-md-12">
                      <label>Content</label>
                  <input type="text" class="form-control" id="contents_edit" placeholder="Enter the contents" name="contents">
                  </div>
                  <div class="col-md-12">
                    <label>Order Number</label>
                <input type="text" class="form-control" id="order_no_edit" placeholder="Enter the Order Number" name="order_no">
                </div>
              </div>
              <div class="mb-2"></div>
              <div class="col-md-12">
                  <span class="text-danger" id="form-input-error"></span>
                  <span class="text-success" id="form-input-success"></span>
                  </div>
              <input type="hidden" id="edit_id" value="" />

             <button type="submit" id="faq_edit" class="btn btn-success data-edit">Save</button>
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
              </form>

                </div>
            </div>



        </div>
      </div>
      <!-- Modal to edit faq Ends-->
