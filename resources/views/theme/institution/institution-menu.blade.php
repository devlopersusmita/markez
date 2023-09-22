@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')
<div class="app-main__outer">
<div class="app-main__inner">
<div class="category-top-row">
   <h2>Menu</h2>
   <a href="javascript:void(0)"  class="button is-solid accent-button raised modal-trigger" id="add-new-menu-link" data-modal="menumodals-add">Add Menu</a>

</div>
@include('frontend.notification')
<div class="table-responsive category-table">
   <table class="table">
      <thead>
         <th>Menu Name</th>
         <th>Sub-menu</th>
         <th>Slug</th>
         <th>Page Name</th>
         <th>Link</th>
         <th>Location</th>
         <th>Action</th>
      </thead>
      <tbody>
         @foreach($menus as $menu)
         <tr>
            <td>{{$menu['menu_name']}}  </td>
            <td>{{$menu['menu_parent_id']}}  </td>
            <td>{{$menu['slug']}}  </td>
            <td>{{$menu['page_name']}}  </td>
            <td>{{$menu['link']}}  </td>
            <td>{{$menu['location']}}  </td>
            <td>
               <span  class="menuview-modals"  data-toggle="modal" data-target="#menumodals-view" style="cursor: pointer;" data-id="<?php echo $menu['id']?>" ><i class="fa fa-eye" style="font-size:18px"></i></span>
               <span   class=" menuedit_modal" data-toggle="modal" data-target="#menumodals-edit" style="cursor: pointer;" data-id="<?php echo $menu['id']?>"><i class="fa fa-pencil" style="font-size:18px"></i></span>
               <span    class="delete_modal" data-toggle="modal" data-target="#menumodals-delete" style="cursor: pointer;" data-id="<?php echo $menu['id']?>" ><i class="fa fa-trash-o" style="font-size:18px"></i></span>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
@endsection
<!--  -->
<!-- Modal to add new menu starts-->
<div id="menumodals-add" class="modal change-cover-modal common-modal is-medium has-light-bg">
   <div class="modal-background"></div>
   <div class="modal-content">
      <div class="card">
         <div class="card-heading">
            <h5 class="modal-title">New Menu</h5>
            <!-- Close X button -->
            <div class="close-wrap">
               <span class="close-modal" data-dismiss="modal">
               <!-- <i data-feather="x"></i> -->
               <img src="images/icon-modal-close.svg" alt="">
               </span>
            </div>
         </div>
         <div class="card-body">
            <form class="add-new-menu" enctype="multipart/form-data" >
            <input type="hidden" value="{{$user_id}}" name="user_id">
            <input type="hidden" value="{{$user_ids}}" name="user_ids">
               <div class="login-form">
                  <div class="field">
                     <label class="required">Menu Name</label>
                     <style>
                        .required:after {
                        content:" *";
                        color: red;
                        }
                     </style>
                     <div class="control">
                        <input class="input title-input" type="text" name="menu_name" id="menu_name"  placeholder="Menu Name" required>
                     </div>
                  </div>
                  <div class="field">
                     <label class="required">Menu Type</label>
                     <div class="control">
                        <select class="input title-input" name="menu_type" id="menu_type" maxlength="250" required>
                           <option value="">Select a Type</option>
                           <option name="0" value="0">Menu</option>
                           <option  name="1" value ="1">Submenu</option>
                        </select>
                     </div>
                  </div>
                  <div class="field" id="sub-menu-type"  >
                     <label class="required">Sub-menu</label>
                     <div class="control">
                        <select class="input title-input" name="menu_parent_id" id="menu_parent_id" >
                           <option value="">Select a Sub-menu</option>
                           @foreach($menunames as $menuname)
                           <option value="{{ $menuname->id }}">{{ $menuname->menu_name }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="field">
                     <label class="required">Page Name</label>
                     <div class="control">
                        <select class="input title-input" name="page_id" id="page_id" maxlength="250" required>
                           <option value="">Select a Page</option>
                           @foreach($pages as $page)
                           <option value="{{ $page->id }}">{{ $page->title }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="field">
                     <label class="required">Location</label>
                     <div class="control">
                        <select class="input title-input" name="location" id="location" maxlength="250" required>
                           <option value="">Select a Location</option>
                           <option value="Header" >Header</option>
                           <option value ="Footer">Footer</option>
                        </select>
                     </div>
                  </div>
                  <div class="field">
                     <label>Link</label>
                     <div class="control">
                        <input type="url" class="input title-input" id="link" placeholder="Enter the Link" name="link" required>
                     </div>
                  </div>
                  <div class="field">
                     <label>Sort Order</label>
                     <div class="control">
                        <input type="number" class="input title-input" id="sort_order" placeholder="Enter the sort_order" name="sort_order" required>
                     </div>
                  </div>
                  <div class="field">
                     <span class="text-danger" id="form-input-error"></span>
                     <span class="text-success" id="form-input-success"></span>
                  </div>
                  <button type="submit" id="menu_add" class="button is-solid primary-button data-add">Save</button>
                  <button data-dismiss="modal" aria-label="Close" class="button is-solid data-cancel close-modal">Cancel</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Modal to add new menu Ends-->
<!-- Modal to edit page starts-->
<div id="menumodals-edit" class="modal change-cover-modal common-modal is-medium has-light-bg">
   <div class="modal-background"></div>
   <div class="modal-content">
      <div class="card">
         <div class="card-heading">
            <h5 class="modal-title">Edit Menu</h5>
            <!-- Close X button -->
            <div class="close-wrap">
               <span class="close-modal" data-dismiss="modal">
               <!-- <i data-feather="x"></i> -->
               <img src="images/icon-modal-close.svg" alt="">
               </span>
            </div>
         </div>
         <div class="card-body">
            <form class="edit-new-menu"   enctype="multipart/form-data" >
            <input type="hidden" value="{{$user_id}}" name="user_id">
            <input type="hidden" value="{{$user_ids}}" name="user_ids">
               <div class="row">
                  <div class="field">
                     <label>Menu Name</label>
                     <div class="control">
                        <input type="text" class="input title-input" name="menu_name" id="menu_name_edit" placeholder="menu name" maxlength="250" />
                     </div>
                  </div>
                  <div class="field">
                     <label class="required">Page Name</label>
                     <div class="control">
                        <select class="input title-input" name="page_id" id="page_id_edit" required>
                           <option value="">Select a Page</option>
                           @foreach($pages as $page)
                           <option value="{{ $page->id }}">{{ $page->title }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="field">
                     <label class="required">Location</label>
                     <div class="control">
                        <select class="input title-input" name="location" id="location_edit" maxlength="250" required>
                           <option value="">Select a Location</option>
                           <option value="Header" >Header</option>
                           <option value ="Footer">Footer</option>
                        </select>
                     </div>
                  </div>
                  <div class="field">
                     <label>Link</label>
                     <div class="control">
                        <input type="url" class="input title-input" id="link_edit" placeholder="Enter the Link" name="link" required>
                     </div>
                  </div>
                  <div class="field">
                     <label>Sort Order</label>
                     <div class="control">
                        <input type="number" class="input title-input" id="sort_order_edit" placeholder="Enter the sort order" name="sort_order" required>
                     </div>
                  </div>
               </div>
               <div class="mb-2"></div>
               <div class="col-md-12">
                  <span class="text-danger" id="form-input-error"></span>
                  <span class="text-success" id="form-input-success"></span>
               </div>
               <input type="hidden" id="menuedit_id" value="" />
               <button type="submit" id="menu_edit" class="button is-solid primary-button data-add">Save</button>
               <button data-dismiss="modal" aria-label="Close" class="button is-solid data-cancel close-modal" >Cancel</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Modal to edit page Ends-->
<!-- Modal to view menu starts-->
<div id="menumodals-view" class="modal change-cover-modal common-modal is-medium has-light-bg">
   <div class="modal-background"></div>
   <div class="modal-content">
      <div class="card">
         <div class="card-heading">
            <h5 class="modal-title">Menu Details</h5>
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
<!-- Modal to view menu Ends-->
<!-- Modal to delete menu start-->
<div  id="menumodals-delete"  class="modal change-cover-modal is-medium has-light-bg">
   <div class="modal-background"></div>
   <div class="modal-content">
      <div class="card">
         <div class="card-heading">
            <h3>Delete Menu</h3>
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
               <button type="submit" id="menu_delete" class="btn btn-danger data-delete">Delete</button>
               <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal to delete menu Ends-->
<!--  -->
