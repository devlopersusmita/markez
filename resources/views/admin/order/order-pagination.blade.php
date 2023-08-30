@if(!empty($orders))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Student Name</th>
                <th>Course Name</th>
                <th>Order Status</th>
                 <th>Order Date</th>
                <th>Payment</th>

            </tr>
        </thead>
        <tbody>

            @foreach($orders as $order)
            <tr >
                  <td>{{$order['user_name']}}  </td>
                  <td>{{$order['course_name']}} </td>


                <td>
                    <table><tr><td>
                    <?php if($order['status']=='Paid'){?>
                        <span    class="btn btn-success statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" >Paid</span>
                    <?php } ?>
                    <?php if($order['status']=='Pending'){?>
                        <span    class="btn btn-danger statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;"  >Pending</span>
                    <?php } ?>
                    </td></tr></table>
                </td>
                <td>{{$order['created_at']}} </td>
               <td> <span   class="btn btn-info view_modall"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $order['id']?>" >Payment</span></td>




            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
    {{ $orders->links() }}
  </div>


</div>

</div>
    @endif



