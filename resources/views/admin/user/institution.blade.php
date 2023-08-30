@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">

            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">Institutions</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Institutions</li>

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
                


                <div class="col-md-12">

               <form id="searchform" name="searchform">
                   <div class="row mt-4">

                        <div class="col-md-8"></div>
                        <div class="col-md-4" style="float: right;">


                               <div class="input-group mb-3">
                                      <input type="text" name="name" value="" class="form-control " placeholder="Name" aria-label="Name" aria-describedby="basic-addon2">
                                      <div class="input-group-append">

                                        <a class='btn btn-info' href='{{Route("institution")}}' id='search_btn'>Search</a>
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
            @include("admin.user.institution-pagination",['institutions'=>$institutions])
          </div>


    </div>


      </section>

    </div>

@endsection


<!-- Modal to statuschange institution start-->
<div class="modal fade" id="institution-modals-statuschange" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
          <h5 class="modal-title" >Institution Status Change</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body p-3 pt-0">

          <div class="alert" role="alert">
               <p>Are you sure?</p>
            <h6 class="alert-heading">Warning!</h6>
            <div class="alert-body">
              Do you really want to change this status as <span class="alert " id="institution_status_span"> </span>
            </div>
          </div>



            <div class="col-sm-12 ps-sm-0">
              <input type="hidden" id="institution_statuschange_id" value="" />
              <input type="hidden" id="institution_statuschange_status" value="" />
              <button type="submit" id="institution_statuschange" class="btn btn-danger data-delete">Save</button>
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </div>


        </div>
      </div>
    </div>
  </div>
  <!-- Modal to statuschange institution Ends-->

  <!-- Modal to view institution starts-->
 <div class="modal fade" id="institution-modals-view" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form class="add-new-match modal-content pt-0"   enctype="multipart/form-data" >
      <div class="modal-header">
          <h5 class="modal-title" >Institution Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
          <div class="mb-1" id="institution_details_modal_body_content">

          </div>


          <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Modal to view institution Ends-->

     <!-- Modal to edit institution starts-->
    <div class="modal fade" id="modals-password-institution" tabindex="1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" >Institution Password Change</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body p-3 pt-0">
              <form class="edit-new-faq"   enctype="multipart/form-data" >
               <div class="row">
                  <div class="col-md-12">
                      <label>New Password</label>
                      <input type="password" class="form-control" name="institution_password" id="institution_password" placeholder="Password" maxlength="250" />
                  </div>
                  
               
              
              </div>
              <div class="mb-2"></div>
              <div class="col-md-12">
                  <span class="text-danger" id="institution-form-input-error"></span>
                  <span class="text-success" id="institution-form-input-success"></span>
                  </div>
              <input type="hidden" id="institution_password_id" value="" />

             <button type="button" id="institution_password_change" class="btn btn-success data-edit">Change</button>
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
              </form>

                </div>
            </div>



        </div>
      </div>
      <!-- Modal to edit faq Ends-->