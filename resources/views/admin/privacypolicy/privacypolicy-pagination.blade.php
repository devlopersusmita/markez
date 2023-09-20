@if(!empty($privacypolicys))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Privacy Policy</th>



            </tr>
        </thead>
        <tbody>

        @foreach($privacypolicys as $privacypolicy)
            <tr >
                  <td> {!!$privacypolicy['privacy_policy']!!}</td>



                  <span class="btn btn-warning edit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $privacypolicy['id']?>" >Update</span>









            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
{{ $privacypolicys->links() }}
  </div>


</div>

</div>
    @endif



