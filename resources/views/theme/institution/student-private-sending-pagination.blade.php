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

            @foreach($private_sending as $student)
            <tr >
                <td>{{$student['name']}}  </td>
                <td>{{$student['email']}} </td>

                <td>
                  <span   class="button is-solid blue-button raised view_modal"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $student['id']?>" data-type="private_sending" >Details</span>
                </td>
                <td>
                    <span   class="button is-solid green-button raised send_modal" data-toggle="modal" data-target="#modals-send" style="cursor: pointer;"data-id="<?php echo $student['id']?>" data-type="private_sending" >Send Request</span>
                    
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



