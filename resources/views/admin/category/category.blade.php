@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">
            
            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">Category</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Category</li>

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
                <div class="col-md-6 "><a  class="btn btn-primary float-right add_modal" data-toggle="modal" data-target="#modals-add" style="cursor: pointer;"><i class="fa fa-plus"></i> New Category</a></div>


                <div class="col-md-12">
                
               <form id="searchform" name="searchform">
                   <div class="row mt-4">
                  
                        <div class="col-md-8"></div>
                        <div class="col-md-4" style="float: right;">
                            
                                             
                               <div class="input-group mb-3">
                                      <input type="text" name="name" value="" class="form-control " placeholder="Name" aria-label="Name" aria-describedby="basic-addon2">
                                      <div class="input-group-append">
                                      
                                        <a class='btn btn-info' href='{{Route("category")}}' id='search_btn'>Search</a>
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
            @include("admin.category.category-pagination",['categories'=>$categories])
          </div>


    </div>


      </section>
     
    </div>

@endsection


 <!-- Modal to add new Category starts-->
    <div class="modal fade" id="modals-add" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >New Category </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            <form class="add-new-category"   enctype="multipart/form-data" >
             <div class="row">
                <div class="col-md-6">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" maxlength="250" />
                </div>
                <div class="col-md-6">
                </div>
            </div>
            <div class="mb-2"></div>
            
           
           <button type="submit" id="category_add" class="btn btn-success data-add">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </form>

              </div>
          </div>
      
        
     
      </div>
    </div>
    <!-- Modal to add new Category Ends-->


 <!-- Modal to edit new Category starts-->
    <div class="modal fade" id="modals-edit" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >Edit Category </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            <form class="edit-new-category"   enctype="multipart/form-data" >
             <div class="row">
                <div class="col-md-6">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="name_edit" placeholder="Name" maxlength="250" />
                </div>
                 <div class="col-md-6">
                    <label>Status</label>
                    <select class="form-control select2" name="status" id="status_edit" >
                        <option value="active">Active</option>
                         <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="mb-2"></div>
            <input type="hidden" id="edit_id" value="" />
           
           <button type="submit" id="category_edit" class="btn btn-success data-edit">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </form>

              </div>
          </div>
      
        
     
      </div>
    </div>
    <!-- Modal to add new Category Ends-->


 <!-- Modal to view new Category starts-->
    <div class="modal fade" id="modals-view" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form class="add-new-match modal-content pt-0"   enctype="multipart/form-data" >
        <div class="modal-header">
            <h5 class="modal-title" >Category Details</h5>
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
    <!-- Modal to view new Category Ends-->

      <!-- Modal to delete Category start-->
    <div class="modal fade" id="modals-delete" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header">
            <h5 class="modal-title" >Delete Category</h5>
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
                <button type="submit" id="category_delete" class="btn btn-danger data-delete">Delete</button>
                 <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
              </div>
             
           
          </div>
        </div>
      </div>
    </div>
    <!-- Modal to delete Category Ends-->


 <!-- Modal to statuschange Category start-->
    <div class="modal fade" id="modals-statuschange" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header">
            <h5 class="modal-title" >Category Status Change</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            
            <div class="alert" role="alert">
                 <p>Are you sure?</p>
              <h6 class="alert-heading">Warning!</h6>
              <div class="alert-body">
                Do you really want to change this status as <span class="alert " id="category_status_span"> </span>
              </div>
            </div>

         
            
              <div class="col-sm-12 ps-sm-0">
                <input type="hidden" id="statuschange_id" value="" />
                <input type="hidden" id="statuschange_status" value="" />
                <button type="submit" id="category_statuschange" class="btn btn-danger data-delete">Save</button>
                <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
              </div>
             
           
          </div>
        </div>
      </div>
    </div>
    <!-- Modal to statuschange Category Ends-->

