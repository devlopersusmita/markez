@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Page</h2>
      <a href="javascript:void(0)"  class="button is-solid accent-button raised modal-trigger" id="add-new-page-link" data-modal="pagemodals-add">Add Page</a>
    </div>
    @include('frontend.notification')
    <div class="table-responsive category-table">
      <table class="table">
        <thead>
               <th>Title</th>
                <th>Slug</th>
                <th class="pagecrud_table_content">Content</th>
                <th>Action</th>

        </thead>
        <tbody>

          @if(!empty($pages))

          @foreach($pages as $page)
          <tr>

          <td>{{$page['title']}}  </td>
          <td>{{$page['slug']}}  </td>
          <td><?php $content=$page['content']; $content=strip_tags($content); $out = strlen($content) > 100 ? substr($content,0,100)."..." : $content; ?> {!! $out !!} </td>

            <td>
            <span class="pageview-modals"  data-toggle="modal" data-target="#pagemodals-view" style="cursor: pointer;" data-id="<?php echo $page['id']?>" ><i class="fa fa-eye" style="font-size:18px"></i></span>
            <span class="pageedit_modal" data-toggle="modal" data-target="#pagemodals-edit" style="cursor: pointer;" data-id="<?php echo $page['id']?>" ><i class="fa fa-pencil" style="font-size:18px"></i></span>
            <span class="delete_modal" data-toggle="modal" data-target="#pagemodals-delete" style="cursor: pointer;" data-id="<?php echo $page['id']?>" ><i class="fa fa-trash-o" style="font-size:18px"></i></span>
            </td>
          </tr>
          @endforeach

          @endif
        </tbody>
      </table>
    </div>

    @endsection

 <!-- Modal to add new Page starts-->
 <div id="pagemodals-add" class="modal change-cover-modal common-modal is-medium has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="card">
                    <div class="card-heading">
                        <h5 class="modal-title">New Page</h5>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                <!-- <i data-feather="x"></i> -->
                                <img src="images/icon-modal-close.svg" alt="">
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="add-new-page"   enctype="multipart/form-data" >
                        <input type="hidden" value="{{$user_id}}" name="user_id">
                            <div class="login-form">
                                <div class="field">
                                    <label class="required">Title</label>
                                    <style>
                                        .required:after {
                                          content:" *";
                                          color: red;
                                        }
                                      </style>
                                    <div class="control">
                                        <input class="input title-input" type="text" name="title" id="title"  placeholder="Title" required>

                                    </div>
                                </div>
                                <div class="field">
                                    <label>Content</label>
                                    <div class="control">

                                        <input type="text" class="input title-input" id="content" placeholder="Enter the Description" name="content">
                                    </div>
                                </div>







                                <div class="field">
                                    <span class="text-danger" id="form-input-error"></span>
                                    <span class="text-success" id="form-input-success"></span>
                                    </div>
                                <button type="submit" id="page_add" class="button is-solid primary-button data-add">Save</button>



                                <button data-dismiss="modal" aria-label="Close" class="button is-solid data-cancel close-modal">Cancel</button>
                            </div>
                          </form>
                    </div>
                </div>





        </div>
 </div>
<!-- Modal to add new page Ends-->



      <!-- Modal to edit page starts-->
      <div id="pagemodals-edit" class="modal change-cover-modal common-modal is-medium has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="card">
                    <div class="card-heading">
                        <h5 class="modal-title">Edit Page</h5>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                <!-- <i data-feather="x"></i> -->
                                <img src="images/icon-modal-close.svg" alt="">
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                    <form class="edit-new-page"   enctype="multipart/form-data" >
                    <input type="hidden" value="{{$user_id}}" name="user_id">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" id="title_edit" placeholder="Title" maxlength="250" />
                        </div>

                        <div class="col-md-12">
                            <label>Content</label>
                        <input type="text" class="form-control" id="content_edit" placeholder="Enter the content" name="content">
                        </div>

                    </div>
                    <div class="mb-2"></div>
                    <div class="col-md-12">
                        <span class="text-danger" id="form-input-error"></span>
                        <span class="text-success" id="form-input-success"></span>
                        </div>
                    <input type="hidden" id="pageedit_id" value="" />

                    <button type="submit" id="page_edit" class="btn btn-success data-edit data-add">Save</button>
                    <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary data-cancel" >Cancel</button>
                    </form>

                    </div>
            </div>



        </div>
      </div>
      <!-- Modal to edit page Ends-->

 <!-- Modal to view page starts-->
 <div id="pagemodals-view" class="modal change-cover-modal is-medium has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="card">
                    <div class="card-heading">
                        <h5 class="modal-title">Page Details</h5>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                <!-- <i data-feather="x"></i> -->
                                <img src="images/icon-modal-close.svg" alt="">
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <form class="add-new-match modal-content pt-0"   enctype="multipart/form-data" >

                              <div class="modal-body" >
                                <div class="mb-1" id="details_modal_body_content">

                                </div>


                                <button data-dismiss="modal" aria-label="Close" class="button is-solid data-cancel close-modal" >Cancel</button>
                              </div>
                            </form>

                    </div>
            </div>



        </div>
      </div>
  <!-- Modal to view page Ends-->

     <!-- Modal to delete page start-->
     <div  id="pagemodals-delete"  class="modal change-cover-modal is-medium has-light-bg">
                <div class="modal-background"></div>
                <div class="modal-content">


                    <div class="card">
                    <div class="card-heading">
                                <h3>Delete Page</h3>
                                <!-- Close X button -->
                                <div class="close-wrap">
                                    <span class="close-modal" data-dismiss="modal">
                                            <i data-feather="x"></i>
                                        </span>
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="alert alert-warning" role="alert">
                                    <p>Are you sure?</p>
                                <h6 class="alert-heading">Warning!</h6>
                                <div class="alert-body">
                                Do you really want to delete this record? This process cannot be undone.
                                </div>
                            </div>



                                <div class="col-sm-12 ps-sm-0">
                                <input type="hidden" id="delete_id" value="" />
                                <button type="submit" id="page_delete" class="btn btn-danger data-delete">Delete</button>
                                    <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
                                </div>

                            </div>
                    </div>



                </div>
            </div>
  </div>
      <!-- Modal to delete page Ends-->




