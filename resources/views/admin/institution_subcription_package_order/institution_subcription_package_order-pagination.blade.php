
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Institution Name</th>
                <th>Package Name</th>
                <th>Price</th>
                <th>Days</th>
                <th>Order Status</th>
                 <th>Order Date</th>
                <th>Payment</th>

            </tr>
        </thead>
        <tbody>

            @foreach($orders as $order)
            <tr >
                  <td>{{$order['user_name']}}  </td>
                  <td>{{$order['package_name']}} </td>
                  <td>{{$order['total']}} {{env('CURRENCY')}}</td>
                  <td>{{$order['days']}} </td>
                <td>
                    <table><tr><td>
                    <?php if($order['status']=='Paid'){?>
                        <span    class="btn btn-success statuschange_modal_institution_subcription" data-toggle="modal" data-target="#modals-statuschange_institution_subcription" style="cursor: pointer;" >Paid</span>
                    <?php } ?>
                    <?php if($order['status']=='Pending'){?>
                        <span    class="btn btn-danger statuschange_modal_institution_subcription" data-toggle="modal" data-target="#modals-statuschange_institution_subcription" style="cursor: pointer;"  >Pending</span>
                    <?php } ?>
                    </td></tr></table>
                </td>
                <td>{{$order['created_at']}} </td>
               <td> <span   class="btn btn-info view_modall_institution_subcription"  data-toggle="modal" data-target="#modals-view_institution_subcription" style="cursor: pointer;" data-id="<?php echo $order['id']?>" >Payment</span></td>




            </tr>

           @endforeach

           @if ($orders->count() == 0)

<tr>
<td colspan="6">
    No Record Found!!
</td>
</tr>

@endif
        </tbody>
    </table>


<div id="pagination">
    {{ $orders->links() }}
  </div>


</div>

</div>




