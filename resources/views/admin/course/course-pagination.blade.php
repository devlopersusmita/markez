
      <div class="review_filter">
        <h3>No Data Found</h3>
      </div>
    @endif
@if(!empty($courses))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Title</th>
                <th>Institution</th>
                <th>Category</th>
                <th>Status</th>
                 <th>Type</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>

            @foreach($courses as $course)
            <tr >
                  <td>{{$course['title']}}  </td>
                  <td>{{$course['institution_name']}} </td>

                  <td>{{$course['category_name']}} </td>
                  <td>
                    <table><tr><td>
                    <?php if($course['status']=='active'){?>
                        <span    class="btn btn-success statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $course['id']?>" >Active</span>
                    <?php } ?>
                    <?php if($course['status']=='inactive'){?>
                        <span    class="btn btn-danger statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='active' data-id="<?php echo $course['id']?>" >Inactive</span>
                    <?php } ?>
                    </td></tr></table>
                </td>
                <td>{{$course['type']}} </td>
               <td> <span   class="btn btn-info view_modalsubcription"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $course['id']?>" >Subcription</span>
                <span   class="btn btn-warning edit_modalcourse" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $course['id']?>" >Edit</span>
            </td>





            </tr>

           @endforeach
           @if ($courses->count() == 0)

<tr>
<td colspan="6">
    No Record Found!!
</td>
</tr>

@endif
        </tbody>
    </table>


<div id="pagination">
    {{ $courses->links() }}
  </div>


</div>

</div>




