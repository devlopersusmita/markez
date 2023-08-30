@if(!empty($systems))
@include('frontend.notification')



<div class="card">
{{-- <div class="card-body table-responsive"> --}}

    @foreach($systems as $system)
    <div class="form-group m-3" >
    <div class="row">
        <div class="col-md-6">
            <label>Student Default Subscription Day</label>
            <p id="show_student_default_subscription_day"> {{$system['student_default_subscription_day']}}</p>
        </div>
        <div class="col-md-6">
            <label>Teacher Default Subscription Day</label>
            <p id="show_teacher_default_subscription_day">{{$system['teacher_default_subscription_day']}} </p>
        </div>
        <div class="col-md-6">
            <label>Institution Default Subscription Day</label>
            <p id="show_institution_default_subscription_day">{{$system['institution_default_subscription_day']}} </p>
        </div>
        <div class="col-md-6">
            <label>Country Name</label>
            <p id="show_country_name"> {{$system['country_name']}}</p>
        </div>
        <div class="col-md-6">
            <label>City Name</label>
            <p id="show_city_name">{{$system['city_name']}}</p>
        </div>
        <div class="col-md-6">
            <label>Teacher Online Class Before Minute</label>
            <p id="show_teacher_online_class_before_minute">{{$system['teacher_online_class_before_minute']}}</p>
        </div>
        <div class="col-md-6">
            <label>Student Online Class Before Minute</label>
            <p id="show_student_online_class_before_minute">{{$system['student_online_class_before_minute']}}</p>
        </div>
        <div class="col-md-12 mt-3 text-right"  >
            <span   class="btn btn-warning edit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $system['id']?>" >Edit</span>
        </div>
    </div>
    </div>
    @endforeach

<div id="pagination">
    {{ $systems->links() }}
  </div>


{{-- </div> --}}

</div>
    @endif



