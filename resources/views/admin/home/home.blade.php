@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">

            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">Banner Settings</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Banner Settings</li>

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

                <div class="col-md-6 "><a  class="btn btn-primary float-right add_modal" data-toggle="modal" data-target="#homemodals-add" style="cursor: pointer;"><i class="fa fa-plus"></i> New Banner setting</a></div>



            </div>
        </div>
        </div>
         <div id="pagination_data">
            @include("admin.home.home-pagination",['homes'=>$homes])
          </div>


    </div>


      </section>

    </div>

@endsection


 <!-- Modal to view Home setting starts-->
 <div class="modal fade" id="modals-view" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form class="add-new-match modal-content pt-0"   enctype="multipart/form-data" >
      <div class="modal-header">
          <h5 class="modal-title" >Banner setting Details</h5>
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
  <!-- Modal to view Home setting Ends-->

     <!-- Modal to delete Home setting start-->
     <div class="modal fade" id="modals-delete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" >Delete Banner setting</h5>
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
                  <button type="submit" id="homesetting_delete" class="btn btn-danger data-delete">Delete</button>
                   <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
                </div>


            </div>
          </div>
        </div>
      </div>
      <!-- Modal to delete Home setting Ends-->

       <!-- Modal to add Home setting starts-->
    <div class="modal fade" id="homemodals-add" tabindex="1"      aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" >New Banner setting </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body p-3 pt-0">
              <form class="add-new-homestting"   enctype="multipart/form-data" >
               <div class="row">

                  <div class="col-md-12">
                      <label>Slider</label>
                      <input type="file" class="form-control" name="slider" id="slider"  required/>

                  </div>
                  <div class="col-md-12">
                      <label>Slider Header</label>
                      <input type="text" class="form-control" name="slider_header" id="slider_header" placeholder="Slider Header" maxlength="250" required/>
                  </div>
                  <div class="col-md-12">
                      <label>Slider Text</label>
                      <input type="text" class="form-control" name="slider_text" id="slider_text" placeholder="Slider Text" maxlength="250" required/>
                  </div>

                  <div class="col-md-12">
                      <label>Description</label>
                      <textarea type="text" class="form-control" name="description" id="description" placeholder="120 max characters" required maxlength="120"></textarea>
                      <span>[120 maximum characters]</span>
                  </div>
                  <div class="col-md-12">
                      <label>Link</label>
                      <input type="url" class="form-control" name="link" id="link" placeholder="link" required/>
                  </div>


              </div>

              <div class="mb-2"></div>

              <div class="col-md-12">
                  <span class="text-danger" id="form-input-error"></span>
                  <span class="text-success" id="form-input-success"></span>
                  </div>
             <button type="submit" id="homesetting_add" class="btn btn-success data-add">Save</button>
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
              </form>

                </div>
            </div>



        </div>
      </div>
      <!-- Modal to add  Home setting Ends-->


       <!-- Modal to edit Home setting starts-->
    <div class="modal fade" id="homemodals-edit" tabindex="1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" >Edit Banner setting </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body p-3 pt-0">
              <form class="edit-new-homestting"   enctype="multipart/form-data" >
               <div class="row">

                  <div class="col-md-12">
                      <label>Slider</label>

                     <img src="" id="old_slider"  name="old_slider" alt="" width="80%">
                     <br>


                      <input type="file"  name="slider"  />

                    <div id="slider_edit_div"></div>



                  </div>
                  <div class="col-md-12">
                      <label>Slider Header</label>
                      <input type="text" class="form-control" name="slider_header" id="slider_header_edit" placeholder="Slider Header" maxlength="250" />
                  </div>
                  <div class="col-md-12">
                      <label>Slider Text</label>
                      <input type="text" class="form-control" name="slider_text" id="slider_text_edit" placeholder="Slider Text" maxlength="250" />
                  </div>

                  <div class="col-md-12">
                      <label>Description</label>
                      <textarea type="text" class="form-control" name="description" id="description_edit" placeholder="Description"></textarea>
                  </div>
                  <div class="col-md-12">
                      <label>Link</label>
                      <input type="url" class="form-control" name="link" id="link_edit" placeholder="link" maxlength="250" />
                  </div>

              </div>
              <div class="mb-2"></div>
              <div class="col-md-12">
                  <span class="text-danger" id="form-input-error"></span>
                  <span class="text-success" id="form-input-success"></span>
                  </div>
              <input type="hidden" id="edit_id" value="" />

             <button type="submit" id="homesetting_edit" class="btn btn-success data-edit">Save</button>
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
              </form>

                </div>
            </div>



        </div>
      </div>
      <!-- Modal to edit Home setting Ends-->
