@if(!empty($data))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Institution</th>
                <th>Teacher</th>
                <th>Request By</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($data as $result)
            <tr >
                  <td>
                  <?php 
                  if($result['sender_type']=='Institution')
                  {
                    echo $result['sender_name'];
                  }
                  else  if($result['receiver_type']=='Institution')
                  {
                    echo $result['receiver_name'];
                  }
                  ?>
                    </td>
                  <td> 
                  <?php 
                  if($result['sender_type']=='Teacher')
                  {
                    echo $result['sender_name'];
                  }
                  else  if($result['receiver_type']=='Teacher')
                  {
                    echo $result['receiver_name'];
                  }
                  ?></td>


               <td> <?php echo $result['sender_type'];?></td>
               <td> <?php echo $result['created_at'];?></td>
               <td> <?php echo $result['status'];?></td>
               <td> 
                <span    class="btn btn-success approve_modal" data-toggle="modal" data-target="#modals-approve" style="cursor: pointer;"  data-id="<?php echo $result['id']?>" >Approve</span>
                <span    class="btn btn-danger reject_modal" data-toggle="modal" data-target="#modals-reject" style="cursor: pointer;"  data-id="<?php echo $result['id']?>" >Reject</span>

               </td>

                   

            </tr>

           @endforeach
        </tbody>
    </table>
    

<div id="pagination">
    {{ $data->links() }}
  </div>


</div>

</div>
    @endif


    
