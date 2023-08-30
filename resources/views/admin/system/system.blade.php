@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">

            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">System Settings</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">System Settings</li>

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
                  {{-- <div class="card-body"> --}}

             {{-- <div class="row"> --}}
                {{-- <div class="col-md-6"><h6>Search By</h6></div> --}}



                {{-- <div class="col-md-12"> --}}

              
            {{-- </div> --}}
            {{-- // </div> --}}
         {{-- </div> --}}
        </div>
          <div id="pagination_data">
            @include("admin.system.system-pagination",['systems'=>$systems])
          </div>


    </div>


      </section>

    </div>

@endsection





 <!-- Modal to edit new system starts-->
    <div class="modal fade" id="modals-edit" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >Edit System Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            <form class="edit-new-system"   enctype="multipart/form-data" >
             <div class="row">
                <div class="col-md-6">
                    <label>Student Default Subscription Day</label>
                    <input type="number" class="form-control" name="student_default_subscription_day" id="student_default_subscription_day_edit" placeholder="Student default subscription day" maxlength="250" required/>
                </div>
                <div class="col-md-6">
                    <label>Teacher Default Subscription Day</label>
                    <input type="number" class="form-control" name="teacher_default_subscription_day" id="teacher_default_subscription_day_edit" placeholder="Teacher default subscription day" maxlength="250" required />
                </div>
                <div class="col-md-6">
                    <label>Institution Default Subscription Day</label>
                    <input type="number" class="form-control" name="institution_default_subscription_day" id="institution_default_subscription_day_edit" placeholder="Institution default subscriptionday" maxlength="250" required />
                </div>
                <div class="col-md-6">
                    <label>Country Name</label>
                    <select class="form-control" name="default_country_id" id="default_country_id_edit"  placeholder="Country Name" maxlength="250" required>
                        <option value="">Select a country</option>
                        @foreach($countries as $country)

                        <option value="{{ $country->id }}">{{ $country->c_name }}</option>

                        @endforeach
                    </select>

                </div>
                 <div class="col-md-6">
                    <label>City Name</label>
                    <select class="form-control" name="default_city_id" id="default_city_id_edit"  placeholder="City Name" maxlength="250" required>
                        <option value="">Select a city</option>
                        @foreach($cities as $city)

                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>

                        @endforeach
                    </select>

                </div>

                <div class="col-md-6">
                    <label>Teacher Online Class Before Minute</label>
                    <input type="number" class="form-control" name="teacher_online_class_before_minute" id="teacher_online_class_before_minute_edit" placeholder="Teacher online class before minute" maxlength="250"  required/>
                </div>
                <div class="col-md-6">
                    <label>Student Online Class Before Minute</label>
                    <input type="number" class="form-control" name="student_online_class_before_minute" id="student_online_class_before_minute_edit" placeholder="Student online class before minute" maxlength="250" required />
                </div>
            </div>
            <div class="mb-2"></div>
            <input type="hidden" id="edit_id" value="" />

           <button type="submit" id="system_edit" class="btn btn-success data-edit">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </form>

              </div>
          </div>



      </div>
    </div>
    <!-- Modal to edit new system Ends-->








