@if(!empty($courses))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Complete</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($courses as $course)
            <tr>
                  <td>{{$course['title']}}  </td>
                   <td>{{$course['category_name']}} </td>
                   <td>{{$course['type']}} </td>
                    <td>{{$course['start_date']}} </td>
                     <td>{{$course['end_date']}} </td>


                     <td>
                        <table ><tr><td>
                        <?php if($course['is_fully_complete']==1){?>
                            <span class="button is-solid green-button raised" >Yes</span>
                        <?php } ?>


                        <?php if($course['is_fully_complete']==0){?>
                            <span class="button is-solid red-button raised">No</span>
                        <?php } ?>
                    </td></tr></table>
                    </td>




                <td>
                    <table ><tr><td>
                    <?php if($course['status']=='active'){?>
                        <span class="button is-solid green-button raised statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $course['id']?>" >Active</span>
                    <?php } ?>
                    <?php if($course['status']=='inactive'){?>
                        <span class="button is-solid red-button raised statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='active' data-id="<?php echo $course['id']?>" >Inactive</span>
                    <?php } ?>
                     </td></tr></table>
                </td>



                <td><?php $course_id = $course["id"];
                ?>
                <table ><tr><td>
                <input type="hidden" value="{{$user_id}}" name="user_id">
                                                    <input type="hidden" value="{{$institution_id}}" name="institution_id">
                    <a href='{{Route("teachercoursecontent",["id"=>$course_id,"user_id"=>$user_id,"institution_id"=>$institution_id])}}'  class="button is-solid blue-button raised"   style="cursor: pointer;"  >Contents</a>
                </td>
                {{-- @if($course['type']=='zoom')
                <td>
                     <a href='{{Route("online_classes")}}'  class="button is-solid green-button raised"   style="cursor: pointer;"  >Online Class</a>
                 </td>
                 @endif --}}
             </tr></table>


                </td>




            </tr>

              <!-- Modal to status change Course starts-->

  <div  id="modals-statuschange" class="modal share-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
       <div class="modal-content">

           <div class="card">
               <div class="card-heading">
                   <div class="dropdown is-primary share-dropdown">
                       <div style="text-align: center;">

                              <h3>Course Status Change</h3>

                       </div>

                   </div>

                   <!-- Close X button -->
                   <div class="close-wrap">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
  </div>
               </div>

               <div class="card-body">

                   <div class="shared-publication">
                       <div class="featured-image">
                         <div class="alert" role="alert">
                                <p style="text-align:center;">Are you sure?</p>
                                 <h6  style="text-align:center;" class="alert-heading">Warning!</h6>
                               <div class="alert-body">
                                   Do you really want to change this status as <span class="alert " id="course_status_span"> </span>
                               </div>
                          </div>

                       </div>


                   </div>
               </div>
               <div class="card-footer">


                   <div class="button-wrap">
                       <input type="hidden" id="statuschange_id" value="" />
                       <input type="hidden" id="statuschange_status" value="" />
                       <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                       <button type="submit" id="course_statuschange" class="button is-solid primary-button data-delete">Save</button>

                   </div>
               </div>
           </div>

       </div>
</div>

           @endforeach
        </tbody>
    </table>

<div id="pagination">
    {{ $courses->links() }}
  </div>


</div>

</div>
    @endif



