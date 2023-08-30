@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">

            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">Student Teacher Request</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Student Teacher Request</li>

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
            @include("admin.institution.institution-teacher-request-pagination",['institution_teacher_requests'=>$institution_teacher_requests])
          </div>


    </div>


      </section>

    </div>

@endsection


<!-- Modal to statuschange student teacher start-->
<div class="modal fade" id="requeststudent-modals-statuschange" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
          <h5 class="modal-title" >Student Teacher Request </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body p-3 pt-0">

          <div class="alert" role="alert">
               <p>Are you sure?</p>
            <h6 class="alert-heading">Warning!</h6>
            <div class="alert-body">
              Do you really want to change this status as <span class="alert " id="student_request_status_span"> </span>
            </div>
          </div>



            <div class="col-sm-12 ps-sm-0">
              <input type="hidden" id="student_request_statuschange_id" value="" />
              <input type="hidden" id="student_request_statuschange_status" value="" />
              <button type="submit" id="request_statuschange" class="btn btn-danger data-delete">Save</button>
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </div>


        </div>
      </div>
    </div>
  </div>
  <!-- Modal to statuschange student teacher Ends-->


