@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">

            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">Form</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Form</li>

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
                <div class="col-md-6"><h6></h6></div>
                <div class="col-md-6 "><a  class="btn btn-primary float-right add_modal" data-toggle="modal" data-target="#formmodals-add" style="cursor: pointer;"><i class="fa fa-plus"></i> New Form</a></div>


                <div class="col-md-12">


            </div>
            </div>
        </div>
        </div>
         <div id="pagination_data">
            @include("admin.form.form-pagination",['formdata'=>$formdata])
          </div>


    </div>


      </section>

    </div>

@endsection


 <!-- Modal to add new form starts-->
    <div class="modal fade" id="formmodals-add" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >New Form </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            <form class="add-new-form"   enctype="multipart/form-data" >
             <div class="row">
                <div class="col-md-6">
                    <label>Form Name</label>
                    <input  class="form-control" type="text" name="form_name" id="form_name"  placeholder="Form name" required>

                </div>
                <div class="col-md-6">
                </div>
            </div>
            <div class="mb-2"></div>


           <button type="submit" id="formselect_add" class="btn btn-success data-add">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </form>

              </div>
          </div>



      </div>
    </div>
    <!-- Modal to add new form Ends-->


 <!-- Modal to edit  form starts-->
    <div class="modal fade" id="formmodals-edit" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >Edit Form </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            <form class="edit-new-form"   enctype="multipart/form-data" >
             <div class="row">
                <div class="col-md-6">

                    <label>Form Name</label>
                            <input type="text" class="form-control" name="form_name" id="form_name_edit" placeholder="Form Name" maxlength="250" />
                </div>

            </div>
            <div class="mb-2"></div>
            <input type="hidden" id="formedit_id" value="" />

           <button type="submit" id="form_edit" class="btn btn-success data-edit">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </form>

              </div>
          </div>



      </div>
    </div>
    <!-- Modal to edit form Ends-->


 <!-- Modal to view new form starts-->
    <div class="modal fade" id="formmmodals-view" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form class="add-new-match modal-content pt-0"   enctype="multipart/form-data" >
        <input type="hidden" name="form_ids" id="form_ids" value="" />
        <div class="modal-header">
            <h5 class="modal-title" >Form Details</h5>
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
    <!-- Modal to view new form Ends-->

      <!-- Modal to delete form start-->
    <div class="modal fade" id="formmodals-delete" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header">
            <h5 class="modal-title" >Delete Form</h5>
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
                <button type="submit" id="form_delete" class="btn btn-danger data-delete">Delete</button>
                 <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
              </div>


          </div>
        </div>
      </div>
    </div>
    <!-- Modal to delete form Ends-->


 <!-- Modal to add new formfield starts-->
 <div class="modal fade common_modal" id="pagemodals-add-field" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >Add new Field </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
          <form class="add-new-field"   enctype="multipart/form-data" >
            <div class="row">
                <div class="col-md-6">
                    <label class="required">Field type </label>
                    <div class="control">
                    <select class="form-control" name="field_type" id="field_type" onchange="getfieldtype(this.value)" maxlength="250" required>
                    <option value="">Select field type</option>
                    <option value="input">Input</option>
                    <option value="dropdown">Dropdown</option>
                    <option value="radio">Radio</option>
                    <option value="checkbox">Checkbox</option>
                    </select>
                    </div>
                </div>

                <div class="col-md-6">
                        <div class="field">
                            <label class="required">Sort Order </label>
                            <div class="control">
                            <input class="form-control"  type="number" name="field_order" id="field_order" maxlenth="10" placeholder="Field Order" required>
                            </div>
                        </div>
                </div>

                <div class="col-md-6">
                    <div class="field">
                        <label class="required">Name </label>
                        <div class="control">
                        <input class="form-control" type="text" name="field_name" id="field_name"  placeholder="Field name" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="field">
                        <label class="required">Placeholder </label>
                        <div class="control">
                            <input class="form-control"  type="text" name="field_placeholder_value" id="field_placeholder_value"  placeholder="Input Placeholder" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="field">
                        <label class="required">Value/options </label>

                        <div class="control fieldinput" style="display:none">
                            <input class="form-control" type="text" name="field_input_value" id="field_input_value"  placeholder="Input default Value" >

                        </div>
                        <div class="fieldselect" style="display:none">
                            <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                <div style="width:300px" >
                                    <label class="required">Option Value</label>
                                    <input class="form-control"  type="text" name="dropdown_value[]" class="dropdown_val"  placeholder="Option Value" >

                                </div>
                                <div style="width:300px;margin-left:10px;">
                                    <label class="required">Option Text</label>
                                    <input class="form-control"  type="text" name="dropdown_option[]" class="dropdown_opt"  placeholder="Option Text" >

                                </div>
                            </div>
                            <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                <div style="width:300px" >
                                    <label class="required">Option Value</label>
                                    <input class="form-control"  type="text" name="dropdown_value[]" class="dropdown_val"  placeholder="Option Value" >

                                </div>
                                <div style="width:300px;margin-left:10px;">
                                    <label class="required">Option Text</label>
                                    <input class="form-control"  type="text" name="dropdown_option[]" class="dropdown_opt"  placeholder="Option Text" >

                                </div>
                            </div>
                            <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                <div style="width:300px" >
                                    <label class="required">Option Value</label>
                                    <input class="form-control"  type="text" name="dropdown_value[]" class="dropdown_val"  placeholder="Option Value" >

                                </div>
                                <div style="width:300px;margin-left:10px;">
                                    <label class="required">Option Text</label>
                                    <input class="form-control"  type="text" name="dropdown_option[]" class="dropdown_opt"  placeholder="Option Text" >

                                </div>
                            </div>
                            <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                <div style="width:300px" >
                                    <label class="required">Option Value</label>
                                    <input class="form-control" type="text" name="dropdown_value[]" class="dropdown_val"  placeholder="Option Value" >

                                </div>
                                <div style="width:300px;margin-left:10px;">
                                    <label class="required">Option Text</label>
                                    <input class="form-control"  type="text" name="dropdown_option[]" class="dropdown_opt"  placeholder="Option Text" >

                                </div>
                            </div>

                        </div>
                        <div class="fieldradio" style="display:none">
                            <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                <div style="width:300px" >
                                    <label class="required"> Value</label>
                                    <input class="form-control"  type="text" name="radio_value[]" class="radio_val"  placeholder=" Value" >

                                </div>
                                <div style="width:300px;margin-left:10px;">
                                    <label class="required"> Text</label>
                                    <input class="form-control"  type="text" name="radio_option[]" class="radio_opt"  placeholder=" Text" >

                                </div>
                            </div>
                            <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                <div style="width:300px" >
                                    <label class="required"> Value</label>
                                    <input class="form-control"  type="text" name="radio_value[]" class="radio_val"  placeholder=" Value" >

                                </div>
                                <div style="width:300px;margin-left:10px;">
                                    <label class="required"> Text</label>
                                    <input class="form-control"  type="text" name="radio_option[]" class="radio_opt"  placeholder=" Text" >

                                </div>
                            </div>


                        </div>
                        <div class="fieldcheckbox" style="display:none">
                            <div class="control " style="display: flex;flex-direction: row;margin-top:10px">
                                <div style="width:300px" >
                                    <label class="required"> Value</label>
                                    <input class="form-control"  type="text" name="checkbox_value" class="checkbox_val"  placeholder=" Value" >

                                </div>
                                <div style="width:300px;margin-left:10px;">
                                    <label class="required"> Text</label>
                                    <input class="form-control"  type="text" name="checkbox_text" class="checkbox_opt"  placeholder=" Text" >

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="field">
                        <label class="required">Field ID </label>
                        <div class="control">
                        <input class="form-control" type="text" name="field_id" id="field_id"  placeholder="Field id" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="field">
                        <label class="required">Field Class </label>
                        <div class="control">
                            <input class="form-control" type="text" name="field_class" id="field_class"  placeholder="Field Class" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6"></div>


                <div class="col-md-6 mt-2">
                    <button type="submit" id="field_add" class="btn btn-success data-add">Save</button>
                    <input type="hidden" name="form_id" id="form_id" value="" />
                    <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
                </div>

            </div>
          </form>

          </div>
          </div>



      </div>
    </div>
    <!-- Modal to add new formfield Ends-->

