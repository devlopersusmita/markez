@if(!empty($coursecontents))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Completed</th>
                <th>Start</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($coursecontents as $course)
            <tr >
                <td>{{$course['title']}}  
                    
                </td>
                <td>{{$course['type']}}  </td>
                <td><?php if($course['completed']==1){?> <div class="badge" style="color: #1ce589;" >
                    <i data-feather="check"></i>                              
                  
                </div><?php } ?> </td>
                <td>
                    @if($course['type']=='zoom')

                                     <a href="{{Route('studentcourseonline_classes',['id'=>$course['course_id'],'content_id'=>$course['id']])}}" class="button is-solid green-button raised"   style="cursor: pointer;"  >Online Class</a>
                              
                                 @endif
                                 @if($course['type']=='quiz')



                                    <a href="{{Route('studentcoursecontentquize',['id'=>$course['course_id'],'content_id'=>$course['id']])}}" class="button is-solid blue-button raised"   style="cursor: pointer;" >Quiz</a>




@endif
                </td>

                   <td>
                    <div class="ui-elements">
                       <div class="buttons">
                    <table>
                             <tr>




                                    <td style="padding: 0px 5px;">
                                        <span   class="button is-solid blue-button raised coursecontentview_modal"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $course['id']?>" >Details</span>
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



