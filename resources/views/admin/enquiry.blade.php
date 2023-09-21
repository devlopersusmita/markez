@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">

            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">Enquiry</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Enquiry</li>

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

        </div>
          <div id="pagination_data">
            @include("admin.enquiry-pagination",['enquirys'=>$enquirys])
          </div>


    </div>


      </section>

    </div>

@endsection

  <!-- Modal to delete enquiry start-->
  <div class="modal fade" id="enquirymodals-delete" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header">
            <h5 class="modal-title" >Delete Enqiury</h5>
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
                <button type="submit" id="enquiry_delete" class="btn btn-danger data-delete">Delete</button>
                 <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
              </div>


          </div>
        </div>
      </div>
    </div>
    <!-- Modal to delete enquiry Ends-->













