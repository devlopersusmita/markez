@if(!empty($courses))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Completed</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                  <td>{{$course['title']}}  </td>
                  <td>{{$course['category_name']}} </td>
                  <td><?php if($course['completed']==1){?> <div class="badge" style="color: #1ce589;" >
                    <i data-feather="check"></i>
                    <a class="button is-solid blue-button raised" href="{{route('studentcoursecertificate',['id'=>$course['id'],'download'=>'pdf','user_id'=>$user_id,'institution_id'=>$institution_id])}}" target="_blank">Download Certificate</a>

                </div><?php } ?> </td>
                  <td>{{$course['type']}} </td>
                  <td>
                     <div class="ui-elements">
                        <div class="buttons">
                            <table><tr>
                            <td style="padding: 0px 5px;">
                                @if($course['is_complete']== '1')
                                <?php $course_id = $course["id"]; ?>


                                 @endif
                                 <input type="hidden" value="{{$user_id}}" name="user_id">
                                                    <input type="hidden" value="{{$institution_id}}" name="institution_id">
                                <?php $course_id = $course["id"]; ?>
                                <a href='{{Route("studentcoursecontent",["id"=>$course_id,"user_id"=>$user_id,"institution_id"=>$institution_id])}}'  class="button is-solid blue-button raised"   style="cursor: pointer;"  >Contents</a>
                            </td>
                            {{-- @if($course['type']=='zoom')
                            <td style="padding: 0px 5px;">
                                 <a href='{{Route("studentcourseonline_classes")}}'  class="button is-solid green-button raised"   style="cursor: pointer;"  >Online Class</a>
                             </td>
                             @endif --}}
                             <td style="padding: 0px 5px;">
                                <span   class="button is-solid blue-button raised view_modal_course"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $course['id']?>" >Details</span>
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
    {{ $courses->links() }}
  </div>


</div>

</div>
    @endif



