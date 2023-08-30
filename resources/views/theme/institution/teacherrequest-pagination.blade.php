@if(!empty($teacherrequests))
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

            </tr>
        </thead>
        <tbody>

            @foreach($teacherrequests as $teacherrequest)
            <tr >
                  <td>
                  <?php
                  if($teacherrequest['sender_type']=='Institution')
                  {
                    echo $teacherrequest['sender_name'];
                  }
                  else  if($teacherrequest['receiver_type']=='Institution')
                  {
                    echo $teacherrequest['receiver_name'];
                  }
                  ?>
                    </td>
                  <td>
                  <?php
                  if($teacherrequests['sender_type']=='Teacher')
                  {
                    echo $teacherrequest['sender_name'];
                  }
                  else  if($teacherrequest['receiver_type']=='Teacher')
                  {
                    echo $teacherrequest['receiver_name'];
                  }
                  ?></td>


               <td> <?php echo $teacherrequest['sender_type'];?></td>
               <td> <?php echo $teacherrequest['created_at'];?></td>
               <td> <?php echo $teacherrequest['status'];?></td>




            </tr>

           @endforeach
        </tbody>
    </table>



<div id="pagination">
    {{ $teacherrequests->links() }}
  </div>


</div>

</div>

    @endif



