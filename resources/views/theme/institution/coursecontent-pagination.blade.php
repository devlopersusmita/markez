@if(!empty($coursecontents))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>End Date</th>


                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($coursecontents as $course)
            <tr >
                <td>{{$course['title']}}  </td>
                <td>{{$course['slug']}}  </td>
                <td>{{$course['type']}}  </td>
                <td>{{$course['start_date']}}  </td>
                <td>{{$course['end_date']}}  </td>


                <td>
                    <div class="ui-elements">
                       <div class="buttons">
                    <table>
                             <tr>
                                @if($course['type']=='zoom')
                                <td style="padding: 0px 5px;">
                                     <a href="{{Route('institutioncourseonline_classes',['id'=>$course['course_id'],'content_id'=>$course['id']])}}"  class="button is-solid green-button raised"   style="cursor: pointer;"  >Online Class</a>
                                 </td>
                                 @endif
                                 @if($course['type']=='quiz')

                                <td style="padding: 0px 5px;">


                                    <a href="{{Route('institutioncoursecontentquize',['id'=>$course['course_id'],'content_id'=>$course['id']])}}" class="button is-solid blue-button raised"   style="cursor: pointer;" >Quiz</a>



                                </td>

@endif
                                    <td style="padding: 0px 5px;">
                                        <span   class="button is-solid blue-button raised coursecontentview_modal"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $course['id']?>" >View</span>
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



