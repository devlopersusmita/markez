@if(!empty($private_sending))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Details</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($private_sending as $teacher)
            <tr >
                <td>{{$teacher['name']}}  </td>
                <td>{{$teacher['email']}} </td>

                <td>
                  <span   class="button is-solid blue-button raised view_modal_it"  data-toggle="modal" data-target="#modals-view_it" style="cursor: pointer;" data-id="<?php echo $teacher['id']?>" data-type="private_sending" >Details</span>
                </td>
                <td>
                    <span   class="button is-solid green-button raised send_modal_it" data-toggle="modal" data-target="#modals-send_it" style="cursor: pointer;"data-id="<?php echo $teacher['id']?>" data-type="private_sending" >Send Request</span>

                </td>
            </tr>

           @endforeach
        </tbody>
    </table>

<div id="pagination_private_sending">
    {{ $private_sending->links() }}
  </div>


</div>

</div>
    @endif



