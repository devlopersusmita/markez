@if(!empty($public))
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

            @foreach($public as $institution)
            <tr >
                <td>{{$institution['name']}}  </td>
                <td>{{$institution['email']}} </td>

                <td>
                  <span   class="button is-solid blue-button raised view_modal_it"  data-toggle="modal" data-target="#modals-view_it" style="cursor: pointer;" data-id="<?php echo $institution['id']?>" data-type="public" >Details</span>
                </td>
                <td>
                    <span   class="button is-solid red-button raised delete_modal_it" data-toggle="modal" data-target="#modals-delete_it" style="cursor: pointer;"data-id="<?php echo $institution['id']?>" data-type="public" >Remove</span>
                </td>
            </tr>

           @endforeach
        </tbody>
    </table>

<div id="pagination_public_it">
    {{ $public->links() }}
  </div>


</div>

</div>
    @endif



