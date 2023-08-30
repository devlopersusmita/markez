@if(!empty($students))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Course Name</th>
                <th>Student Name</th>
                <th>Email</th>
                <th>Course Amount</th>
                <th>Total Amount</th>
                <th>Payment Date</th>
                 <th>Status</th>

            </tr>
        </thead>
        <tbody>

            @foreach($students as $student)
            <tr >
                  <td>{{$student['title']}} </td>
                   <td>{{$student['user_name']}} </td>
                   <td>{{$student['email']}} </td>
                   <td>{{$student['price']}}</td>
                   <td>{{$student['amount_format']}}
                    <span   class="btn btn-warning student_payment_modal" data-toggle="modal" data-target="#modals-payment-student" style="cursor: pointer;" data-id="<?php echo $student['course_subscriptions_id']?>" > Note</span>
                </td>
                   <td>   {{date('Y-m-d ',strtotime($student['payment_created_at']))}}

                   </td>


                <td>
                    <table><tr><td>
                    <?php if($student['payment_status']=='paid'){?>
                        <span class="btn btn-success" data-toggle="modal"  style="cursor: pointer;" data-status='paid'>Paid</span>
                    <?php } ?>
                    <?php if($student['payment_status']=='failed'){?>
                        <span class="btn btn-danger" data-toggle="modal"  style="cursor: pointer;" data-status='failed'>Failed</span>
                    <?php } ?>
                    </td></tr></table>
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



