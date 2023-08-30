@if(!empty($courses))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Course Name</th>
                <th>Teacher Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                  <td>{{$course['title']}}  </td>
                  <td>{{$course['name']}} </td>
                   <td>
                     <div class="ui-elements">
                        <div class="buttons">
                            <table><tr>
                               <td style="padding: 0px 5px;">

                                <span   class="button is-solid primary-button raised assignedit_modal" data-toggle="modal" data-target="#courseassign-edit" style="cursor: pointer;" data-id="<?php echo $course['id']?>" >Edit</span>
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



