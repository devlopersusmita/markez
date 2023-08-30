@if(!empty($institutions))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($institutions as $institution)
            <tr >
                  <td>{{$institution['name']}}  </td>
                   <td>{{$institution['email']}} </td>
                   <td>
                    <?php 
                    if($institution['avatar']!=''){
                        echo '<img src="'.asset($institution['avatar']).'" width="80" />';
                        } ?>
                     </td>


                <td>
                    <table><tr><td>
                    <?php if($institution['status']=='active'){?>
                        <span class="btn btn-success institution-statuschange_modal" data-toggle="modal" data-target="#institution-modals-statuschange" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $institution['id']?>" >Approved</span>
                    <?php } ?>
                    <?php if($institution['status']=='inactive'){?>
                        <span class="btn btn-danger institution-statuschange_modal" data-toggle="modal" data-target="#institution-modals-statuschange" style="cursor: pointer;" data-status='active' data-id="<?php echo $institution['id']?>" >Approve It</span>
                    <?php } ?>
                    </td></tr></table>
                </td>

                
                 <td>
                    <table><tr><td> <span   class="btn btn-info institution_view_modals"  data-toggle="modal" data-target="#institution-modals-view" style="cursor: pointer;" data-id="<?php echo $institution['id']?>" >View</span></td><td> <span   class="btn btn-warning institution_password_modal" data-toggle="modal" data-target="#modals-password-institution" style="cursor: pointer;" data-id="<?php echo $institution['id']?>" >Password Change</span></td></tr></table>



                </td>
              



            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
    {{ $institutions->links() }}
  </div>


</div>

</div>
    @endif



