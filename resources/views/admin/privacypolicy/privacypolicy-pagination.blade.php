@if(!empty($privacypolicys))
@include('frontend.notification')



<div class="card">



    <div class="form-group m-3" >
    <div class="row">
        <div class="col-md-6">
            <label>Privacy Policy</label>
            <p id="show_name">{!!@$privacypolicy->privacy_policy!!}</p>
        </div>

        <div class="col-md-12 mt-3 text-right"  >
        <span class="btn btn-warning edit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo @$privacypolicy->id?>" >Update</span>        </div>
    </div>
    </div>

<div id="pagination">
    {{ $privacypolicys->links() }}
  </div>




</div>
    @endif



