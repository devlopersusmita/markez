@if(!empty($coursecontents))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Title</th>

                <th>Type</th>
                <th>Start Date</th>
                <th>End Date</th>

                <th>Status</th>
                <th>Start</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($coursecontents as $course)
            <tr >
                <td>{{$course['title']}}  </td>

                <td>{{$course['type']}}  </td>
                <td>{{$course['start_date']}}  </td>
                <td>{{$course['end_date']}}  </td>


                <td>
                    <?php if($course['status']=='active'){?>
                        <span class="button is-solid green-button raised coursecontentstatuschange_modal" data-toggle="modal" data-target="#modals-statuschangecoursecontent" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $course['id']?>" >Active</span>
                    <?php } ?>
                    <?php if($course['status']=='inactive'){?>
                        <span class="button is-solid red-button raised coursecontentstatuschange_modal" data-toggle="modal" data-target="#modals-statuschangecoursecontent" style="cursor: pointer;" data-status='active' data-id="<?php echo $course['id']?>" >Inactive</span>
                    <?php } ?>
                </td>
                <td>

                        @if($course['type']=='zoom')

                        <a href="{{Route('online_classes',['id'=>$course['course_id'],'content_id'=>$course['id']])}}" class="button is-solid green-button raised"   style="cursor: pointer;"  >Online Class</a>
             
                    @endif

                @if($course['type']=='quiz')



                                <a href="{{Route('teachercoursecontentquize',['id'=>$course['course_id'],'content_id'=>$course['id']])}}" class="button is-solid blue-button raised"   style="cursor: pointer;" >Quiz</a>



                            @endif
                </td>
                <td>
                    <div class="ui-elements">
                       <div class="buttons">
                    <table>
                             <tr>

                                    <td style="padding: 0px 5px;">
                                        <span   class="button is-solid blue-button raised coursecontentview_modal"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $course['id']?>" >View</span>
                                    </td>
                                    <td style="padding: 0px 5px;">

                                    <span   class="button is-solid primary-button raised edit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $course['id']?>" >Edit</span>
                                </td>
                                <td style="padding: 0px 5px;">

                                    <span   class="button is-solid red-button raised coursecontentdelete_modal" data-toggle="modal" data-target="#modals-delete" style="cursor: pointer;"data-id="<?php echo $course['id']?>" >Delete</span>
                                </td>
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
    {{ $coursecontents->links() }}
  </div>


</div>

</div>
    @endif



