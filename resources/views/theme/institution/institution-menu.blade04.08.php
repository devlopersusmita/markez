@extends('theme.institution.default')


@section('content')


 <div class="view-wrapper">

       <!-- Container -->
<div class="container is-custom">

    <!-- Profile page main wrapper -->
    <div id="profile-about" class="view-wrap is-headless">
        <div class="columns is-multiline no-margin">
            <!-- Left side column -->
            <div class="column is-paddingless">
                <!-- Timeline Header -->

            </div>

        </div>

        <div class="column">

            <!-- About sections -->
            <div class="profile-about side-menu">
                @include('theme.institution.sidebar')

                <div class="right-content">
                    <div class="groups-grid padding_0">

                        <div class="grid-header">
                            <div class="header-inner">
                                <h2>Menu List</h2>

                                <div class="header-actions">

                                    <div class="buttons">
                                        <a href="javascript:void(0)"  class="button is-solid accent-button raised modal-trigger" id="add-new-menu-link" data-modal="menumodals-add">Add Menu</a>
                                    </div>

                                </div>

                            </div>
                            <div class="header-inner padding_top_10">
                                <h2>&nbsp;</h2>



                            </div>



                        </div>
                    </div>


                    <div id="overview-content" class="content-section is-active">

                            <div id="pagination_data">
                            @include("theme.institution.institution-menu-pagination",['menus'=>$menus])
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

   </div>
        </div>




 <!-- Modal to add new menu starts-->
 <div id="menumodals-add" class="modal change-cover-modal is-medium has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="card">
                    <div class="card-heading">
                        <h3>New Menu</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="add-new-menu"   enctype="multipart/form-data" >
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
                                        <option value="header" >Header</option>
                                        <option value ="footer">Footer</option>
                                    </select>


                                    </div>
                                </div>

                                <div class="field">
                                    <label>Link</label>
                                    <div class="control">

                                        <input type="text" class="input title-input" id="link" placeholder="Enter the Link" name="link" required>
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



                                <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                            </div>
                          </form>
                    </div>
                </div>





        </div>
 </div>
<!-- Modal to add new menu Ends-->



      <!-- Modal to edit page starts-->
      <div id="menumodals-edit" class="modal change-cover-modal is-medium has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="card">
                    <div class="card-heading">
                        <h3>Edit Menu</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>

                    <div class="card-body">
                    <form class="edit-new-menu"   enctype="multipart/form-data" >
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
                                        <option value="header" >Header</option>
                                        <option value ="footer">Footer</option>
                                    </select>


                                    </div>
                                </div>

                        <div class="field">
                                    <label>Link</label>
                                    <div class="control">

                                        <input type="text" class="input title-input" id="link_edit" placeholder="Enter the Link" name="link" required>
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

                    <button type="submit" id="menu_edit" class="btn btn-success data-edit">Save</button>
                    <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
                    </form>

                    </div>
            </div>



        </div>
      </div>
      <!-- Modal to edit page Ends-->


 <!-- Modal to view menu starts-->
 <div id="menumodals-view" class="modal change-cover-modal is-medium has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="card">
                    <div class="card-heading">
                        <h3>Menu Details</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <form class="add-new-match modal-content pt-0"   enctype="multipart/form-data" >

                              <div class="modal-body" >
                                <div class="mb-1" id="details_modal_body_content">

                                </div>


                                <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
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



@endsection



