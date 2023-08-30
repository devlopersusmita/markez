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
                                <h2>Form List</h2>

                                <div class="header-actions">

                                    <div class="buttons">
                                    <a href="javascript:void(0)"  class="button is-solid accent-button raised modal-trigger" id="add-new-page-link" data-modal="pagemodals-add">Add Form</a>
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
                            @include("theme.institution.institution-form-pagination",['formdata'=>$formdata])
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

   </div>
        </div>

 <!-- Modal to add new Page starts-->
 <div id="pagemodals-add" class="modal change-cover-modal is-medium has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="card">
                    <div class="card-heading">
                        <h3>New Page</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="add-new-page"   enctype="multipart/form-data" >
                            <div class="login-form">
                                <div class="field">
                                    <label class="required">Form Name</label>
                                    <style>
                                        .required:after {
                                            content:" *";
                                            color: red;
                                        }
                                        </style>
                                    <div class="control">
                                        <input class="input title-input" type="text" name="form_name" id="form_name"  placeholder="Form name" required>

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
                                    <span class="text-danger" id="form-input-error"></span>
                                    <span class="text-success" id="form-input-success"></span>
                                    </div>
                                <button type="submit" id="page_add" class="button is-solid primary-button data-add">Save</button>



                                <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                            </div>
                          </form>
                    </div>
                </div>





        </div>
 </div>
<!-- Modal to add new page Ends-->



      <!-- Modal to edit page starts-->
      <div id="pagemodals-edit" class="modal change-cover-modal is-medium has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="card">
                    <div class="card-heading">
                        <h3>Edit Page</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>

                    <div class="card-body">
                    <form class="edit-new-page"   enctype="multipart/form-data" >
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

                    <button type="submit" id="page_edit" class="btn btn-success data-edit">Save</button>
                    <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
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
                        <h3>Page Details</h3>
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
      <!-- Modal to delete page Ends-->

<!-- Modal to Add form field starts-->
<div id="pagemodals-add-field" class="modal change-cover-modal is-medium has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="card">
                    <div class="card-heading">
                        <h3>Add new Field</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>

                    <div class="card-body">
                    <form class="add-new-field"   enctype="multipart/form-data" >
                            <div class="login-form">
                            <div class="field">
                                    <label class="required">Field type </label>
                                    <div class="control">
                                        <select class="input title-input" name="field_type" id="field_type" onchange="getfieldtype(this.value)" maxlength="250" required>
                                            <option value="">Select field type</option>
                                            <option value="input">Input</option>
                                            <option value="dropdown">Dropdown</option>
                                            <option value="radio">Radio</option>
                                            <option value="checkbox">Checkbox</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="field">
                                    <label class="required">Sort Order </label>
                                    <div class="control">
                                        <input class="input title-input" type="text" name="field_order" id="field_order"  placeholder="Field Order" required>

                                    </div>
                                </div>
                                <div class="field">
                                    <label class="required">Name </label>
                                    <div class="control">
                                        <input class="input title-input" type="text" name="field_name" id="field_name"  placeholder="Field name" required>

                                    </div>
                                </div>
                                <div class="field">
                                    <label class="required">Placeholder </label>
                                    <div class="control">
                                        <input class="input title-input" type="text" name="field_placeholder_value" id="field_placeholder_value"  placeholder="Input Placeholder" required>

                                    </div>
                                </div>
                                <div class="field">
                                    <label class="required">Value/options </label>

                                    <div class="control fieldinput" style="display:none">
                                        <input class="input title-input" type="text" name="field_input_value" id="field_input_value"  placeholder="Input default Value" >

                                    </div>
                                    <div class="fieldselect" style="display:none">
                                        <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                            <div style="width:300px" >
                                            <label class="required">Option Value</label>
                                            <input class="input title-input" type="text" name="dropdown_value[]" class="dropdown_val"  placeholder="Option Value" >

                                            </div>
                                            <div style="width:300px;margin-left:10px;">
                                            <label class="required">Option Text</label>
                                            <input class="input title-input" type="text" name="dropdown_option[]" class="dropdown_opt"  placeholder="Option Text" >

                                            </div>
                                        </div>
                                        <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                            <div style="width:300px" >
                                            <label class="required">Option Value</label>
                                            <input class="input title-input" type="text" name="dropdown_value[]" class="dropdown_val"  placeholder="Option Value" >

                                            </div>
                                            <div style="width:300px;margin-left:10px;">
                                            <label class="required">Option Text</label>
                                            <input class="input title-input" type="text" name="dropdown_option[]" class="dropdown_opt"  placeholder="Option Text" >

                                            </div>
                                        </div>
                                        <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                            <div style="width:300px" >
                                            <label class="required">Option Value</label>
                                            <input class="input title-input" type="text" name="dropdown_value[]" class="dropdown_val"  placeholder="Option Value" >

                                            </div>
                                            <div style="width:300px;margin-left:10px;">
                                            <label class="required">Option Text</label>
                                            <input class="input title-input" type="text" name="dropdown_option[]" class="dropdown_opt"  placeholder="Option Text" >

                                            </div>
                                        </div>
                                        <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                            <div style="width:300px" >
                                            <label class="required">Option Value</label>
                                            <input class="input title-input" type="text" name="dropdown_value[]" class="dropdown_val"  placeholder="Option Value" >

                                            </div>
                                            <div style="width:300px;margin-left:10px;">
                                            <label class="required">Option Text</label>
                                            <input class="input title-input" type="text" name="dropdown_option[]" class="dropdown_opt"  placeholder="Option Text" >

                                            </div>
                                        </div>

                                    </div>
                                    <div class="fieldradio" style="display:none">
                                    <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                            <div style="width:300px" >
                                            <label class="required"> Value</label>
                                            <input class="input title-input" type="text" name="radio_value[]" class="radio_val"  placeholder=" Value" >

                                            </div>
                                            <div style="width:300px;margin-left:10px;">
                                            <label class="required"> Text</label>
                                            <input class="input title-input" type="text" name="radio_option[]" class="radio_opt"  placeholder=" Text" >

                                            </div>
                                        </div>
                                        <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                            <div style="width:300px" >
                                            <label class="required"> Value</label>
                                            <input class="input title-input" type="text" name="radio_value[]" class="radio_val"  placeholder=" Value" >

                                            </div>
                                            <div style="width:300px;margin-left:10px;">
                                            <label class="required"> Text</label>
                                            <input class="input title-input" type="text" name="radio_option[]" class="radio_opt"  placeholder=" Text" >

                                            </div>
                                        </div>


                                    </div>
                                    <div class="fieldcheckbox" style="display:none">
                                         <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                            <div style="width:300px" >
                                            <label class="required"> Value</label>
                                            <input class="input title-input" type="text" name="checkbox_value" class="checkbox_val"  placeholder=" Value" >

                                            </div>
                                            <div style="width:300px;margin-left:10px;">
                                            <label class="required"> Text</label>
                                            <input class="input title-input" type="text" name="checkbox_text" class="checkbox_opt"  placeholder=" Text" >

                                            </div>
                                        </div>

                                    </div>
                                    
                                </div>

                                <div class="field">
                                    <label class="required">Field ID </label>
                                    <div class="control">
                                        <input class="input title-input" type="text" name="field_id" id="field_id"  placeholder="Field id" required>

                                    </div>
                                </div>
                                <div class="field">
                                    <label class="required">Field Class </label>
                                    <div class="control">
                                        <input class="input title-input" type="text" name="field_class" id="field_class"  placeholder="Field Class" required>

                                    </div>
                                </div>
                                



                                <div class="field">
                                    <span class="text-danger" id="form-input-error"></span>
                                    <span class="text-success" id="form-input-success"></span>
                                    </div>
                                <button type="submit" id="field_add" class="button is-solid primary-button data-add">Save</button>


                                <input type="hidden" name="form_id" id="form_id" value="" />
                                <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                            </div>
                          </form>

                    </div>
            </div>



        </div>
      </div>
  <!-- Modal to Add form field Ends-->
  

















    </div>


@endsection



