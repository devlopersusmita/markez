@if(!empty($orders))
@include('frontend.notification')




<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Course</th>

                <th>Status</th>
                <th>Link</th>
                <th>Payment</th>
                <th>Total</th>

            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                  <td>{{$order['course_name']}}</td>

                  <td>
                    <table ><tr><td>
                    <?php if($order['status']=='Paid'){?>
                        <span class="button is-solid green-button raised" data-toggle="modal">Paid</span>
                    <?php } ?>
                    <?php if($order['status']=='Pending'){?>
                        <span class="button is-solid primary-button raised" data-toggle="modal" >Pending</span>
                    <?php } ?>
                     </td></tr></table>
                </td>
                <td>
                    <table ><tr><td>
                    <?php if($order['status']=='Paid'){?>
                         <a href= '{{Route("studentcoursecontent",["id"=>$order['course_id']])}}' class="button is-solid blue-button raised"   style="cursor: pointer;">Proceed</a>




                    <?php } ?>




                    <?php if($order['status']=='Pending'){?>
                       <a href='{{Route("coursesubscription",["id"=>$order['course_id']])}}' class="button is-solid green-button raised" data-toggle="modal"   style="cursor: pointer;">Pay</a>



                    <?php } ?>
                     </td></tr></table>
                </td>
                {{-- <td style="padding: 0px 5px;">
                    <button type="button"  class="button is-solid primary-button raised "  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $order['course_id']?>" >Payment</button>{{$order['course_id']}}
                </td> --}}

                <td>
                    <div class="ui-elements">
                       <div class="buttons">
                    <table>
                             <tr>




                                    <td style="padding: 0px 5px;">
                                        <span   class="button is-solid blue-button raised view_modal_payment"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $order['id']?>" >Payment</span>
                                    </td>
                             </tr>
                     </table>
                       </div>
                   </div>


               </td>



                  <td>{{$order['total']}}{{env('CURRENCY')}}

                </td>



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



