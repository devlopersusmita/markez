@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">

            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">Institution Subscription Package</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Institution Subscription Package</li>

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
                <div class="col-md-6 "><a  class="btn btn-primary float-right add_modal" data-toggle="modal" data-target="#modals-add" style="cursor: pointer;"><i class="fa fa-plus"></i> New Institution Subcription Package</a></div>


                <div class="col-md-12">

               <form id="searchform" name="searchform">
                   <div class="row mt-4">

                        <div class="col-md-8"></div>
                        <div class="col-md-4" style="float: right;">


                               <div class="input-group mb-3">
                                      <input type="text" name="title" value="" class="form-control " placeholder="Title" aria-label="Title" aria-describedby="basic-addon2">
                                      <div class="input-group-append">

                                        <a class='btn btn-info' href='{{Route("institutionsubcriptionpackage")}}' id='search_btn'>Search</a>
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
            @include("admin.institution_subcription_package.package-pagination",['institutionsubcriptionpackages'=>$institutionsubcriptionpackages])
          </div>


    </div>


      </section>

    </div>

@endsection


 <!-- Modal to add new pacakge starts-->
    <div class="modal fade" id="modals-add" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >New Institution Subscription Package </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            <form class="add-new-package"   enctype="multipart/form-data" >
             <div class="row">
                <div class="col-md-12">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" maxlength="250" required />
                </div>
                <div class="col-md-12">
                    <label>Order Number</label>
                    <input type="number" class="form-control" name="order_no" id="order_no" placeholder="Order Number" maxlength="250" required />
                </div>
                <div class="col-md-12">
                    <label>Price</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Price" maxlength="250" required />
                </div>
                <div class="col-md-12">
                    <label>Day</label>
                    <input type="text" class="form-control" name="days" id="days" placeholder="Day" maxlength="250"  required/>
                </div>
                <div class="col-md-12">
                    <label>Description</label>
                <input type="text" class="form-control" id="descriptions" placeholder="Enter the Descriptions" name="descriptions" maxlength="250" required>
            </div>
                <div class="col-md-6">
                </div>
            </div>
            <div class="mb-2"></div>


           <button type="submit" id="pacakge_add" class="btn btn-success data-add">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </form>

              </div>
          </div>



      </div>
    </div>
    <!-- Modal to add new package Ends-->


 <!-- Modal to edit  package starts-->
    <div class="modal fade" id="modals-edit" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >Edit Institution Subscription Package </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            <form class="edit-new-package"   enctype="multipart/form-data" >
             <div class="row">
                <div class="col-md-6">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" id="title_edit" placeholder="Title" maxlength="250" />
                </div>
                <div class="col-md-6">
                    <label>Order Number</label>
                    <input type="number" class="form-control" name="order_no" id="order_no_edit" placeholder="Order Number" maxlength="250" />
                </div>
                <div class="col-md-6">
                    <label>Price</label>
                    <input type="number" class="form-control" name="price" id="price_edit" placeholder="Price" maxlength="250" />
                </div>
                <div class="col-md-6">
                    <label>Day</label>
                    <input type="text" class="form-control" name="days" id="days_edit" placeholder="Day" maxlength="250" />
                </div>
                <div class="col-md-12">
                    <label>Description</label>
                <input type="text" class="form-control" id="descriptions_edit" placeholder="Enter the Descriptions" name="descriptions">
                </div>
                 <div class="col-md-6">

                </div>
            </div>
            <div class="mb-2"></div>
            <input type="hidden" id="edit_id" value="" />

           <button type="submit" id="package_edit" class="btn btn-success data-edit">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </form>

              </div>
          </div>



      </div>
    </div>
    <!-- Modal to add  package Ends-->


 <!-- Modal to view package starts-->
    <div class="modal fade" id="modals-viewpackage" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form class="add-new-match modal-content pt-0"   enctype="multipart/form-data" >
        <div class="modal-header">
            <h5 class="modal-title" >Institution Subscription Package Details</h5>
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
    <!-- Modal to view  package Ends-->






