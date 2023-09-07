@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')
<div class="app-main__outer">
<div class="app-main__inner">
<div class="category-top-row">
   <h2>From</h2>
   <a href="javascript:void(0)"  class="button is-solid accent-button raised modal-trigger" data-modal="formmodals-add">Add Form</a>

</div>
@include('frontend.notification')
<div class="table-responsive category-table">
   <table class="table">
      <thead>
                <th>Name</th>
                <th>Page</th>
                <th>No of field</th>
                <th>Status</th>
                <th>Action</th>
      </thead>
      <tbody>
      @foreach($formdata as $form)
            <tr >
                  <td>{{$form['form_name']}}  </td>
                  <td>{{$form['page_name']}}  </td>
                  <td> {{$form['total_field']}}  </td>
                  <td>{{$form['form_status']}}  </td>


                <td>
                    <table><tr>
                    <td> <span  class="button is-success accent-button raised modal-trigger pageaddfield-modals"  data-toggle="modal" data-target="#pagemodals-add-field" style="cursor: pointer;" data-id="<?php echo $form['id']?>" >Add Field</span></td>
                    <td> <span  class="button is-success accent-button raised modal-trigger formview-modals"  data-toggle="modal" data-target="#formmmodals-view" style="cursor: pointer;" data-id="<?php echo $form['id']?>" onclick="valuePass(<?php echo $form['id']; ?>)" >View</span></td>
                    <td> <span   class="button is-warning accent-button raised modal-trigger formedit_modal" data-toggle="modal" data-target="#formmodals-edit" style="cursor: pointer;" data-id="<?php echo $form['id']?>" >Edit</span></td>
                    <td><span    class="button is-danger accent-button raised modal-trigger delete_modal" data-toggle="modal" data-target="#formmodals-delete" style="cursor: pointer;" data-id="<?php echo $form['id']?>" >Delete</span></td>
                </tr></table>



                </td>




            </tr>

           @endforeach
      </tbody>
   </table>
</div>
@endsection
<!--  -->
<!-- Modal to add new form starts-->
<div id="formmodals-add" class="modal change-cover-modal is-medium has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="card">
                    <div class="card-heading">
                        <h3>New From</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="add-new-form"   enctype="multipart/form-data" >
                        <input type="hidden" value="{{$user_id}}" name="user_id">
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
                                <button type="submit" id="formselect_add" class="button is-solid primary-button data-add">Save</button>



                                <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                            </div>
                          </form>
                    </div>
                </div>





        </div>
 </div>
<!-- Modal to add new form Ends-->



      <!-- Modal to edit form starts-->
      <div id="formmodals-edit" class="modal change-cover-modal is-medium has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="card">
                    <div class="card-heading">
                        <h3>Edit Form</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal" data-dismiss="modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>

                    <div class="card-body">
                    <form class="edit-new-form"   enctype="multipart/form-data" >
                    <input type="hidden" value="{{$user_id}}" name="user_id">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Form Name</label>
                            <input type="text" class="form-control" name="form_name" id="form_name_edit" placeholder="Form Name" maxlength="250" />
                        </div>

                        <div class="col-md-12">

                        <label class="required">Page Name</label>
                        <select class="input title-input" name="page_id" id="page_id_edit" required>
                           <option value="">Select a Page</option>
                           @foreach($pages as $page)
                           <option value="{{ $page->id }}">{{ $page->title }}</option>
                           @endforeach
                        </select>
                        </div>

                    </div>
                    <div class="mb-2"></div>
                    <div class="col-md-12">
                        <span class="text-danger" id="form-input-error"></span>
                        <span class="text-success" id="form-input-success"></span>
                        </div>
                    <input type="hidden" id="formedit_id" value="" />

                    <button type="submit" id="form_edit" class="btn btn-success data-edit">Save</button>
                    <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
                    </form>

                    </div>
            </div>



        </div>
      </div>
      <!-- Modal to edit form Ends-->

 <!-- Modal to view form starts-->
 <div id="formmmodals-view" class="modal change-cover-modal is-medium has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="card">
                    <div class="card-heading">
                        <h3>Form Details</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">

                            <span class="close-modal" data-dismiss="modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <form class="add-new-match modal-content pt-0"   enctype="multipart/form-data" >
                        <input type="hidden" name="form_ids" id="form_ids" value="" />

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
  <!-- Modal to view form Ends-->

     <!-- Modal to delete form start-->
     <div  id="formmodals-delete"  class="modal change-cover-modal is-medium has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">


            <div class="card">
            <div class="card-heading">
                        <h3>Delete Form</h3>
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
                           <button type="submit" id="form_delete" class="btn btn-danger data-delete">Delete</button>
                            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
                         </div>

                    </div>
            </div>



        </div>
      </div>
      <!-- Modal to delete form Ends-->

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
                            <input type="hidden" value="{{$user_id}}" name="user_id">
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

<!--  -->


<!--  -->
