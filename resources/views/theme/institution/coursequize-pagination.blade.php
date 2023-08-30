@if(!empty($quizes))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>

                <th>Start Date</th>
                <th>End Date</th>


                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($quizes as $quize)


            <tr>
                <td>{{$quize['title']}}  </td>
                <td>{{$quize['slug']}}  </td>

                <td>{{$quize['start_date']}}  </td>
                <td>{{$quize['end_date']}}  </td>


                <td>
                    <div class="ui-elements">
                       <div class="buttons">
                    <table>
                             <tr>

                                <td style="padding: 0px 5px;">

                                 <a href="{{Route('institutioncoursecontentquizequestion',['id'=>$quize['course_id'],'content_id'=>$quize['course_content_id'],'quiz_id'=>$quize['id']])}}" class="button is-solid blue-button raised"   style="cursor: pointer;" >Question</a>
                                </td>

                                    <td style="padding: 0px 5px;">
                                        <span   class="button is-solid blue-button raised view_modal_quize"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $quize['id']?>" >View</span>
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



