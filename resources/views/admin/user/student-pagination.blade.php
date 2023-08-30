@if(!empty($students))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($students as $student)
            <tr >
                  <td>{{$student['name']}}  </td>
                   <td>{{$student['email']}} </td>
                   <td>
                    <?php 
                    if($student['avatar']!=''){
                        echo '<img src="'.asset($student['avatar']).'" width="80" />';
                        } ?>
                     </td>


                <td>
                    <table><tr><td>
                    <?php if($student['status']=='active'){?>
                        <span class="btn btn-success student-statuschange_modal" data-toggle="modal" data-target="#student-modals-statuschange" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $student['id']?>" >Approved</span>
                    <?php } ?>
                    <?php if($student['status']=='inactive'){?>
                        <span class="btn btn-danger student-statuschange_modal" data-toggle="modal" data-target="#student-modals-statuschange" style="cursor: pointer;" data-status='active' data-id="<?php echo $student['id']?>" >Approve It</span>
                    <?php } ?>
                    </td></tr></table>
                </td>

                
                 <td>
                    <table><tr><td> <span   class="btn btn-info student_view_modals"  data-toggle="modal" data-target="#student-modals-view" style="cursor: pointer;" data-id="<?php echo $student['id']?>" >View</span></td><td> <span   class="btn btn-warning student_password_modal" data-toggle="modal" data-target="#modals-password-student" style="cursor: pointer;" data-id="<?php echo $student['id']?>" >Password Change</span></td></tr></table>



                </td>
              



            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
    {{ $students->links() }}
  </div>


</div>

</div>
    @endif



