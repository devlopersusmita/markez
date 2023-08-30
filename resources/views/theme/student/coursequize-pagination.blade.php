@if(!empty($quizes))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Title</th>
                <th>Best Score</th>
                <th>Completed</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($quizes as $quize)


            <tr>
                <td>{{$quize['title']}}  </td>
                
                <td>{{$quize['score_percentage']}} %  </td>
                <td><?php 

                if($quize['score_percentage'] >= env('QUIZ_PERCENTAGE_MIN_REQ'))
                {
                ?>
                
                 <div class="badge" style="color: #1ce589;" >
                    <i data-feather="check"></i>                              
                  
                </div>
                 <?php 
                }
                ?>
                    
                </td>
                <td>
                    <div class="ui-elements">
                       <div class="buttons">
                    <table>
                             <tr>
                                   <td style="padding: 0px 5px;">
                                        <span   class="button is-solid blue-button raised view_modal_quize"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $quize['id']?>" >Details</span>
                                    </td>

                                <td style="padding: 0px 5px;">
                                     
                                <?php 

                                if($quize['score_percentage'] < env('QUIZ_PERCENTAGE_MIN_REQ'))
                                {
                                ?>
                                 <a href="{{Route('studentcoursecontentquizequestion',['id'=>$quize['course_id'],'content_id'=>$quize['course_content_id'],'quiz_id'=>$quize['id']])}}" class="button is-solid blue-button raised"   style="cursor: pointer;" >Start Quiz</a>
                                 <?php 
                                }
                                 if($quize['score_percentage'] >= env('QUIZ_PERCENTAGE_MIN_REQ'))
                                {
                                   
                                ?>
                                 <a href="{{Route('studentcoursecontentquizeresult',['id'=>$quize['course_id'],'content_id'=>$quize['course_content_id'],'quiz_id'=>$quize['id']])}}" class="button is-solid blue-button raised"   style="cursor: pointer;" >Results</a>
                                 <?php 
                                }
                                ?>
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



