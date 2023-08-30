@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')
<div class="app-main__outer">
   <div class="app-main__inner">
    <div class="company_inner">
        <h3>System Settings</h3>
        @foreach($systems as $system)
            <form method="post" action="">
                <div class="form-group m-3" >
                    <div class="row settings-form-row">
                        <div class="col-md-6">
                            <div class="form-bottom-gap">
                                <label>Student Default Subscription Day</label>
                                <p id="show_student_default_subscription_day" class="custom-border"> 
                                    {{$system['student_default_subscription_day']}}
                                </p>
                            </div> 
                        </div>

                        <div class="col-md-6">
                          <div class="form-bottom-gap">
                                <label>Teacher Default Subscription Day</label>
                                <p id="show_teacher_default_subscription_day" class="custom-border">
                                    {{$system['teacher_default_subscription_day']}}
                                </p>
                            </div>  
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-bottom-gap">
                                <label>Institution Default Subscription Day</label>
                                <p id="show_institution_default_subscription_day" class="custom-border">
                                    {{$system['institution_default_subscription_day']}}
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-bottom-gap">
                                <label>Country Name</label>
                                <p id="show_country_name" class="custom-border"> 
                                    {{$system['country_name']}}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-bottom-gap">
                                <label>City Name</label>
                                <p id="show_city_name" class="custom-border">
                                    {{$system['city_name']}}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-bottom-gap">
                                <label>Teacher Online Class Before Minute</label>
                                <p id="show_teacher_online_class_before_minute" class="custom-border">
                                    {{$system['teacher_online_class_before_minute']}}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-bottom-gap">
                                <label>Student Online Class Before Minute</label>
                                <p id="show_student_online_class_before_minute" class="custom-border">
                                    {{$system['student_online_class_before_minute']}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 text-right"  >
                            <span   class="btn btn-warning systemedit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $system['id']?>" >Edit</span>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
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
 <!-- Modal to edit new Company starts-->

 <!-- Modal to edit new system starts-->
 <div class="modal common-modal fade" id="modals-edit" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >Edit System Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <!-- <span aria-hidden="true">&times;</span> -->
              <img src="images/icon-modal-close.svg" alt="">
            </button>
          </div>

          <div class="modal-body p-3">
            <form class="edit-new-system"   enctype="multipart/form-data" >
             <div class="row">
                <div class="col-md-6 modal-bottom-gap">
                    <label>Student Default Subscription Day</label>
                    <input type="number" class="form-control" name="student_default_subscription_day" id="student_default_subscription_day_edit" placeholder="Student default subscription day" maxlength="250" required/>
                </div>
                <div class="col-md-6 modal-bottom-gap">
                    <label>Teacher Default Subscription Day</label>
                    <input type="number" class="form-control" name="teacher_default_subscription_day" id="teacher_default_subscription_day_edit" placeholder="Teacher default subscription day" maxlength="250" required />
                </div>
                <div class="col-md-6 modal-bottom-gap">
                    <label>Institution Default Subscription Day</label>
                    <input type="number" class="form-control" name="institution_default_subscription_day" id="institution_default_subscription_day_edit" placeholder="Institution default subscriptionday" maxlength="250" required />
                </div>
                <div class="col-md-6 modal-bottom-gap">
                    <label>Country Name</label>
                    <select class="form-control" name="default_country_id" id="default_country_id_edit"  placeholder="Country Name" maxlength="250" required>
                        <option value="">Select a country</option>
                        @foreach($countries as $country)

                        <option value="{{ $country->id }}">{{ $country->c_name }}</option>

                        @endforeach
                    </select>

                </div>
                 <div class="col-md-6 modal-bottom-gap">
                    <label>City Name</label>
                    <select class="form-control" name="default_city_id" id="default_city_id_edit"  placeholder="City Name" maxlength="250" required>
                        <option value="">Select a city</option>
                        @foreach($cities as $city)

                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>

                        @endforeach
                    </select>

                </div>

                <div class="col-md-6 modal-bottom-gap">
                    <label>Teacher Online Class Before Minute</label>
                    <input type="number" class="form-control" name="teacher_online_class_before_minute" id="teacher_online_class_before_minute_edit" placeholder="Teacher online class before minute" maxlength="250"  required/>
                </div>
                <div class="col-md-6 modal-bottom-gap">
                    <label>Student Online Class Before Minute</label>
                    <input type="number" class="form-control" name="student_online_class_before_minute" id="student_online_class_before_minute_edit" placeholder="Student online class before minute" maxlength="250" required />
                </div>
            </div>
            <div class="mb-2"></div>
            <input type="hidden" id="edit_id" value="" />

            <button type="submit" id="system_edit" class="btn btn-success data-edit data-add">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary data-cancel" >Cancel</button>
            </form>

              </div>
          </div>



      </div>
    </div>
    <!-- Modal to edit new system Ends-->

<!--  -->
@endsection



