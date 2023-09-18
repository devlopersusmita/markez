@if(!empty($courses))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Category</th>
                <th>Student Limit</th>
                <th>Visibility</th>
                <th>Complete</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>Expired</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Teacher Commission</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                  <td>{{$course['title']}}  </td>
                  <td>{{$course['slug']}} </td>

                  <td>{{$course['category_name']}} </td>
                  <td>{{$course['students_limit']}} </td>
                  <td>
                    <?php if($course['visibility']=='1'){?>
                        <span class="button is-solid green-button raised"  style="cursor: pointer;">Yes</span>
                    <?php } ?>
                    <?php if($course['visibility']=='0'){?>
                        <span class="button is-solid red-button raised" style="cursor: pointer;">No</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if($course['is_fully_complete']==1){?>
                        <span class="button is-solid green-button raised" >Yes</span>
                    <?php } ?>
                    <?php if($course['is_fully_complete']==0){?>
                        <span class="button is-solid red-button raised">No</span>
                    <?php } ?>
                </td>

                  <td>{{$course['type']}} </td>
                  <td>{{$course['start_date']}} </td>
                  <td>



                  <?php
                    $current_date_time = Carbon\Carbon::now();
                    $current_date_time->toDateString();

                    if($current_date_time > $course['end_date'] ){?>
                        <span class="button is-solid red-button raised"  style="cursor: pointer;">Yes</span>
                    <?php } ?>

                  </td>

                  <td>{{$course['end_date']}} </td>




                <td>
                    <?php if($course['status']=='active'){?>
                        <span class="button is-solid green-button raised statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $course['id']?>" >Active</span>
                    <?php } ?>
                    <?php if($course['status']=='inactive'){?>
                        <span class="button is-solid red-button raised statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='active' data-id="<?php echo $course['id']?>" >Inactive</span>
                    <?php } ?>
                </td>

                <td>

                        <span class="button is-solid primary-button raised setup_modal" data-toggle="modal" data-target="#modals-setup" style="cursor: pointer;"  data-id="<?php echo $course['id']?>" >Setup</span>

                </td>



                <td>
                     <div class="ui-elements">
                        <div class="buttons">
                            <table><tr>
                            <input type="text" value="{{$user_id}}" name="user_id">
                            <td style="padding: 0px 5px;">
                                <?php $course_id = $course["id"]; ?>
                                <a href='{{Route("institutioncoursecontent",["id"=>$course_id])}}'  class="button is-solid blue-button raised"   style="cursor: pointer;"  >Contents</a>
                            </td>
                            {{-- @if($course['type']=='zoom')
                            <td style="padding: 0px 5px;">
                                 <a href='{{Route("institutioncourseonline_classes")}}'  class="button is-solid green-button raised"   style="cursor: pointer;"  >Online Class</a>
                             </td>
                             @endif --}}
                             <td style="padding: 0px 5px;">
                                <span   class="button is-solid blue-button raised view_modal_course"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $course['id']?>" >View</span>
                            </td>
                            <td style="padding: 0px 5px;">

                                <span   class="button is-solid primary-button raised edit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $course['id']?>" >Edit</span>
                                </td>
                                <?php  if($current_date_time < $course['start_date']){?>     <td style="padding: 0px 5px;">

                                    <span   class="button is-solid red-button raised delete_modal" data-toggle="modal" data-target="#modals-delete" style="cursor: pointer;"data-id="<?php echo $course['id']?>" >Delete</span>
                                    </td>
                                    <?php } ?>
                        </tr>
                        </table>
                        </div>
                    </div>


                </td>




            </tr>

           @endforeach
        </tbody>
    </table>

<div id="pagination">
    {{ $courses->links() }}
  </div>


</div>

</div>
    @endif



