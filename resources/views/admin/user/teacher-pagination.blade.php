@if(!empty($teachers))
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

            @foreach($teachers as $teacher)
            <tr >
                  <td>{{$teacher['name']}}  </td>
                   <td>{{$teacher['email']}} </td>
                   <td>
                    <?php 
                    if($teacher['avatar']!=''){
                        echo '<img src="'.asset($teacher['avatar']).'" width="80" />';
                        } ?>
                     </td>


                <td>
                    <table><tr><td>
                    <?php if($teacher['status']=='active'){?>
                        <span class="btn btn-success teacher-statuschange_modal" data-toggle="modal" data-target="#teacher-modals-statuschange" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $teacher['id']?>" >Approved</span>
                    <?php } ?>
                    <?php if($teacher['status']=='inactive'){?>
                        <span class="btn btn-danger teacher-statuschange_modal" data-toggle="modal" data-target="#teacher-modals-statuschange" style="cursor: pointer;" data-status='active' data-id="<?php echo $teacher['id']?>" >Approve It</span>
                    <?php } ?>
                    </td></tr></table>
                </td>

                
                 <td>
                    <table><tr><td> <span   class="btn btn-info teacher_view_modals"  data-toggle="modal" data-target="#teacher-modals-view" style="cursor: pointer;" data-id="<?php echo $teacher['id']?>" >View</span></td><td> <span   class="btn btn-warning teacher_password_modal" data-toggle="modal" data-target="#modals-password-teacher" style="cursor: pointer;" data-id="<?php echo $teacher['id']?>" >Password Change</span></td></tr></table>



                </td>
              



            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
    {{ $teachers->links() }}
  </div>


</div>

</div>
    @endif



