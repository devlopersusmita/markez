@extends('admin.master')

@section('contents')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="content-header">

            <div class="container">

                <div class="row mt-4">

                    <div class="col-md-6">

                        <h3 class="">Course</h3>

                    </div><!-- /.col -->

                    <div class="col-md-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                            <li class="breadcrumb-item active">Course</li>

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
                            <div class="col-md-6">
                                <h6>Search By</h6>
                            </div>
                            {{-- <div class="col-md-6 "><a  class="btn btn-primary float-right add_modal" data-toggle="modal" data-target="#modals-add" style="cursor: pointer;"><i class="fa fa-plus"></i> New Category</a></div> --}}


                            <div class="col-md-12">

                                <form id="searchform" name="searchform" >
                                    <div class="row mt-4">

                                        {{-- <div class="col-md-4"></div> --}}
                                        <div class="col-md-12" >


                                            <div class="input-group mb-3">
                                                <input type="text" name="title" value="" class="form-control mr-2"     placeholder="Title" aria-label="Title" aria-describedby="basic-addon2">

<select class="form-control select_2 mr-2" name="category_id" id="category_id"
                                                    >
                                                    <option value="">Select Category</option>
                                                    @if ($categories)
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                <select class="form-control select_2 mr-2" name="institution_id" id="institution_id"
                                                    >
                                                    <option value="">Select Institution</option>
                                                    @if ($institutions)
                                                        @foreach ($institutions as $institution)
                                                            <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                <select class="form-control select_2 mr-2" name="type"
                                                   >

                                                    <option value="">Type</option>
                                                    <option value="zoom">Zoom</option>
                                                    <option value="video">Video</option>
                                                    <option value="text">Text</option>


                                                </select>

                                                <div class="input-group-append">
                                                    <a class='btn btn-info' href='{{ Route('course') }}'
                                                        id='search_btn'>Search</a>
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
                    @include('admin.course.course-pagination', ['courses' => $courses,'categories'=>$categories,'institutions'=>$institutions])
                </div>


            </div>


        </section>

    </div>

@endsection



<!-- Modal to view  Subcription starts-->
<div class="modal fade" id="modals-view" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="add-new-match modal-content pt-0" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title"> Subcription Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-1" id="details_modal_body_content">

                </div>


                <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>
<!-- Modal to view  Payment Ends-->

<!-- Modal to statuschange Course start-->
<div class="modal fade" id="modals-statuschange" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
          <h5 class="modal-title" >Course Status Change</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body p-3 pt-0">

          <div class="alert" role="alert">
               <p>Are you sure?</p>
            <h6 class="alert-heading">Warning!</h6>
            <div class="alert-body">
              Do you really want to change this status as <span class="alert " id="course_status_span"> </span>
            </div>
          </div>



            <div class="col-sm-12 ps-sm-0">
              <input type="hidden" id="statuschange_id" value="" />
              <input type="hidden" id="statuschange_status" value="" />
              <button type="submit" id="course_statuschange" class="btn btn-danger data-delete">Save</button>
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </div>


        </div>
      </div>
    </div>
  </div>
  <!-- Modal to statuschange Course Ends-->

  <!-- Modal to edit  Course starts-->
  <div class="modal fade" id="modals-edit" tabindex="1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" >Edit Course </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body p-3 pt-0">
          <form class="edit-new-course"   enctype="multipart/form-data" >
           <div class="row">
              <div class="col-md-6">
                <label>Start Date</label>

                <input name="start_date" id="start_date_edit" type="date" class="form-control">

              </div>
               <div class="col-md-6">

                  <label>End Date</label>

                  <input name="end_date" id="end_date_edit" type="date" class="form-control" >


              </div>
          </div>
          <div class="mb-2"></div>
          <input type="hidden" id="edit_id" value="" />

         <button type="submit" id="course_edit" class="btn btn-success data-edit">Save</button>
          <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
          </form>

            </div>
        </div>



    </div>
  </div>
  <!-- Modal to edit Course Ends-->
