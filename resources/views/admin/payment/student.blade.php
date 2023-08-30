@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">

            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">Students</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Students</li>

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

                <div class="col-md-12">

                    <form id="searchform" name="searchform" >
                        <div class="row mt-4">

                            <div class="col-md-3">
                                <select class="form-control select_2" name="course_id" id="course_id"
                    >
                                <option value="">Select Course</option>
                                @if ($courses)
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                @endif
                            </select>

                            </div>
                            <div class="col-md-3">

                                <input type="text" name="name" value="" class="form-control " placeholder="Name" aria-label="Name" aria-describedby="basic-addon2">

                            </div>
                            <div class="col-md-3">

                                <input type="text" name="email" value="" class="form-control " placeholder="Email" aria-label="Email" aria-describedby="basic-addon2">

                            </div>
                            <div class="col-md-3">


                                <div class="input-group mb-3">









                                    <div class="input-group-append">
                                        <a class='btn btn-info' href='{{ Route('studentpayment') }}'
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
            @include("admin.payment.student-pagination",['students'=>$students])
          </div>


    </div>


      </section>

    </div>

@endsection



     {{-- <!-- Modal to edit Student starts-->
    <div class="modal fade" id="modals-payment-student" tabindex="1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" >Note</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body p-3 pt-0">
              <form class="edit-new-note"   enctype="multipart/form-data" >
               <div class="row">
                  <div class="col-md-12">
                      <label>Add Note</label>
                      <input type="text" class="form-control" name="payment_note" id="payment_note" placeholder="Note" maxlength="250" />
                  </div>



              </div>
              <div class="mb-2"></div>
              <div class="col-md-12">
                  <span class="text-danger" id="student-form-input-error"></span>
                  <span class="text-success" id="student-form-input-success"></span>
                  </div>
              <input type="hidden" id="payment_note_id" value="" />

             <button type="button" id="note_save" class="btn btn-success data-edit">Save</button>
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
              </form>

                </div>
            </div>



        </div>
      </div>
      <!-- Modal to edit faq Ends--> --}}


 <!-- Modal to edit new Cms starts-->
    <div class="modal fade" id="modals-payment-student" tabindex="1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" >Note </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body p-3 pt-0">
              <form class="edit-new-note"   enctype="multipart/form-data" >
               <div class="row">
                  <div class="col-md-12">
                      <label>Note</label>
                      <textarea type="text" class="form-control" name="payment_note" id="payment_note_edit" placeholder="Note" maxlength="250" requied></textarea>
                  </div>


              </div>
              <div class="mb-2"></div>
              <div class="col-md-12">
                  <span class="text-danger" id="form-input-error"></span>
                  <span class="text-success" id="form-input-success"></span>
                  </div>
              <input type="hidden" id="note_id" value="" />

             <button type="submit" id="note_edit" class="btn btn-success data-edit">Save</button>
              <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
              </form>

                </div>
            </div>



        </div>
      </div>
      <!-- Modal to add  Cms Ends-->
