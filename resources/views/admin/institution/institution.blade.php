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
                

                <div class="col-md-12">

               <form id="searchform" name="searchform">
                   <div class="row mt-4">

                        <div class="col-md-8"></div>
                        <div class="col-md-4" style="float: right;">


                               <div class="input-group mb-3">

                                    </div>


                         </div>





                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
         <div id="pagination_data">
            @include("admin.institution.institution-pagination",['institutions'=>$institutions])
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


