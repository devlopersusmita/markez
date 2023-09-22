@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Category</h2>
      <a  class="btn btn-primary add_modal" data-toggle="modal" data-target="#modals-add" style="cursor: pointer;"><i class="fa fa-plus"></i> New Category</a>
    </div>
    @include('frontend.notification')
    <div class="table-responsive category-table">
      <table class="table">

        <thead>
          <th>Category Name</th>
          <th>Slug</th>
          <th>Status</th>
          <th>Action</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
          <tr>
            <td>{{$category['name']}}</td>
            <td>{{$category['slug']}}</td>
            <td>
             <?php if($category['status']=='active'){?>
                    <span class="btn btn-success statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $category['id']?>" >Active</span>
                      <?php } ?>
                      <?php if($category['status']=='inactive'){?>
                          <span    class="btn btn-danger statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='active' data-id="<?php echo $category['id']?>" >Inactive</span>
                      <?php } ?>            </td>
            <td>
             <span class="categoryview_modal" data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $category['id']?>" ><i class="fa fa-eye" style="font-size:18px"></i></span>

             <span   class="categoryedit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $category['id']?>" ><i class="fa fa-pencil" style="font-size:18px"></i></span>
              <span class="delete_modal" data-toggle="modal" data-target="#modals-delete" style="cursor: pointer;" data-id="<?php echo $category['id']?>" ><i class="fa fa-trash-o" style="font-size:18px"></i></span>
            </td>
          </tr>
        @endforeach
        </tbody>

      </table>
    </div>
       @endsection



 <!-- Modal to add new Category starts-->
 <div class="modal fade" id="modals-add" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >New Category </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <!-- <span aria-hidden="true">&times;</span> -->
              <img src="images/icon-modal-close.svg" alt="">
            </button>
          </div>

          <div class="modal-body p-3">
            <form class="add-new-category"   enctype="multipart/form-data" >
            <input type="hidden" value="{{$user_id}}" name="user_id">
            <input type="text" value="{{$user_ids}}" name="user_ids">
             <div class="row">
                <div class="col-md-6 modal-bottom-gap">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" maxlength="250" />
                </div>
                <div class="col-md-6 modal-bottom-gap">
                </div>
            </div>
            <div class="mb-2"></div>


           <button type="submit" id="category_add" class="btn btn-success data-add">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary data-cancel" >Cancel</button>
            </form>

              </div>
          </div>



      </div>
    </div>
    <!-- Modal to add new Category Ends-->


 <!-- Modal to edit  Category starts-->
    <div class="modal fade" id="modals-edit" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >Edit Category </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <!-- <span aria-hidden="true">&times;</span> -->
              <img src="images/icon-modal-close.svg" alt="">
            </button>
          </div>

          <div class="modal-body p-3">
            <form class="edit-new-category"   enctype="multipart/form-data" >
            <input type="hidden" value="{{$user_id}}" name="user_id">
            <input type="hidden" value="{{$user_ids}}" name="user_ids">
             <div class="row">
                <div class="col-md-6 modal-bottom-gap">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="name_edit" placeholder="Name" maxlength="250" />
                </div>
                 <div class="col-md-6 modal-bottom-gap">
                    <label>Status</label>
                    <select class="form-control select2" name="status" id="status_edit" >
                        <option value="active">Active</option>
                         <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <input type="hidden" id="edit_id" value="" />

           <button type="submit" id="category_edit" class="btn btn-success data-edit data-add">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary data-cancel" >Cancel</button>
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

<!--  -->



