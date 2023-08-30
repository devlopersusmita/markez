@if(!empty($private_receiving))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Time</th>
                <th>Details</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($private_receiving as $teacher)
            <tr >
                <td>{{$teacher['name']}}  </td>
                <td>{{$teacher['email']}} </td>
                <td>{{$teacher['crtime']}}</td>
                <td>
                 <span   class="button is-solid blue-button raised view_modal_it"  data-toggle="modal" data-target="#modals-view_it" style="cursor: pointer;" data-id="<?php echo $teacher['id']?>" data-type="private_receiving" >Details</span>
                </td>
                <td>

                     <span   class="button is-solid green-button raised approve_modal_it" data-toggle="modal" data-target="#modals-approve_it" style="cursor: pointer;"data-id="<?php echo $teacher['id']?>" data-type="private_receiving" >Approve</span>

                    <span   class="button is-solid red-button raised delete_modal_it" data-toggle="modal" data-target="#modals-delete_it" style="cursor: pointer;"data-id="<?php echo $teacher['id']?>" data-type="private_receiving" >Reject</span>
                </td>
            </tr>

           @endforeach
        </tbody>
    </table>

<div id="pagination_private_receiving">
    {{ $private_receiving->links() }}
  </div>


</div>

</div>
    @endif



