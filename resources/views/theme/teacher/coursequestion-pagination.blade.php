@if(!empty($questions))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Question Text</th>
                <th>Answer</th>
                <th>Marks</th>

                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($questions as $question)
            <tr>
                <td>{!!$question['question_text']!!} </td>
                <td>{{$question['answer']}}  </td>
                <td>{{$question['marks']}}  </td>


                <td>
                    <?php if($question['status']=='active'){?>
                        <span class="button is-solid green-button raised questionstatuschange_modal" data-toggle="modal" data-target="#modals-statuschangequestion" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $question['id']?>" >Active</span>
                    <?php } ?>
                    <?php if($question['status']=='inactive'){?>
                        <span class="button is-solid red-button raised questionstatuschange_modal" data-toggle="modal" data-target="#modals-statuschangequestion" style="cursor: pointer;" data-status='active' data-id="<?php echo $question['id']?>" >Inactive</span>
                    <?php } ?>
                </td>
                <td>
                    <div class="ui-elements">
                       <div class="buttons">
                    <table>
                             <tr>


                                    <td style="padding: 0px 5px;">
                                        <span   class="button is-solid blue-button raised view_modal_question"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $question['id']?>" >View</span>
                                    </td>
                                    <td style="padding: 0px 5px;">

                                    <span   class="button is-solid primary-button raised edit_modal_course_question" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $question['id']?>" >Edit</span>
                                </td>
                                <td style="padding: 0px 5px;">

                                    <span   class="button is-solid red-button raised questiondelete_modal" data-toggle="modal" data-target="#modals-delete" style="cursor: pointer;"data-id="<?php echo $question['id']?>" >Delete</span>
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
    {{ $questions->links() }}
  </div>


</div>

</div>
    @endif



