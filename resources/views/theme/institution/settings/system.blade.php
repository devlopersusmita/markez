
@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

   <h2>System setting</h2>
    <div class="form-group m-3" >
    <div class="row">
        <div class="col-md-6">
            <label>Student Default Subscription Day</label>
            <p id="show_student_default_subscription_day"> {{@$systems->student_default_subscription_day}}</p>
        </div>
        <div class="col-md-6">
            <label>Teacher Default Subscription Day</label>
            <p id="show_teacher_default_subscription_day">{{@$systems->teacher_default_subscription_day}} </p>
        </div>
        <div class="col-md-6">
            <label>Institution Default Subscription Day</label>
            <p id="show_institution_default_subscription_day">{{@$systems->institution_default_subscription_day}} </p>
        </div>
        <div class="col-md-6">
            <label>Country Name</label>
            <p id="show_country_name"> {{@$systems->c_name}}</p>
        </div>
        <div class="col-md-6">
            <label>City Name</label>
            <p id="show_city_name">{{@$systems->city_name}}</p>
        </div>
        <div class="col-md-6">
            <label>Teacher Online Class Before Minute</label>
            <p id="show_teacher_online_class_before_minute">{{@$systems->teacher_online_class_before_minute}}</p>
        </div>
        <div class="col-md-6">
            <label>Student Online Class Before Minute</label>
            <p id="show_student_online_class_before_minute">{{@$systems->student_online_class_before_minute}}</p>
        </div>
        <div class="col-md-12 mt-3 text-right"  >
        <input type="hidden" value="{{$user_id}}" name="user_id">
        <?php if(@$systems->id) { ?>
            <span   class="btn btn-warning systemedit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo @$systems->id; ?>" >Update</span>
            <?php  } else { ?>
                <span   class="btn btn-warning systemedit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="0" >Update</span>
                <?php } ?>
        </div>
    </div>
    </div>



      </div>
      <div class="app-wrapper-footer">
         <div class="app-footer">
            <div class="app-footer__inner">
               <div class="app-footer-left">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>




<!--  -->


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
            <input type="hidden" value="{{$user_id}}" name="user_id">
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

<!--  -->
@endsection



