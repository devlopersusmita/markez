@if(!empty($quizes))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Title</th>


                <th>Start Date</th>
                <th>End Date</th>

                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($quizes as $quize)


            <tr>
                <td>{{$quize['title']}}  </td>


                <td>{{$quize['start_date']}}  </td>
                <td>{{$quize['end_date']}}  </td>

                <td>
                    <?php if($quize['status']=='active'){?>
                        <span class="button is-solid green-button raised quizestatuschange_modal" data-toggle="modal" data-target="#modals-statuschangequiz" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $quize['id']?>" >Active</span>
                    <?php } ?>
                    <?php if($quize['status']=='inactive'){?>
                        <span class="button is-solid red-button raised quizestatuschange_modal" data-toggle="modal" data-target="#modals-statuschangequiz" style="cursor: pointer;" data-status='active' data-id="<?php echo $quize['id']?>" >Inactive</span>
                    <?php } ?>
                </td>
                <td>
                    <div class="ui-elements">
                       <div class="buttons">
                    <table>
                             <tr>

                                <td style="padding: 0px 5px;">

                                 <a href="{{Route('teachercoursecontentquizequestion',['id'=>$quize['course_id'],'content_id'=>$quize['course_content_id'],'quiz_id'=>$quize['id'],'user_id'=>$user_id,'institution_id'=>$institution_id])}}" class="button is-solid blue-button raised"   style="cursor: pointer;" >Question</a>
                                </td>

                                    <td style="padding: 0px 5px;">
                                        <span   class="button is-solid blue-button raised view_modal_quize"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $quize['id']?>" >View</span>
                                    </td>
                                    <td style="padding: 0px 5px;">

                                    <span   class="button is-solid primary-button raised edit_modal_quize" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $quize['id']?>" >Edit</span>
                                </td>
                                <td style="padding: 0px 5px;">

                                    <span   class="button is-solid red-button raised quizdelete_modal" data-toggle="modal" data-target="#modals-delete" style="cursor: pointer;"data-id="<?php echo $quize['id']?>" >Delete</span>
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
    {{ $quizes->links() }}
  </div>


</div>

</div>
    @endif



