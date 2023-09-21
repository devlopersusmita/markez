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
        <?php if(@$privacypolicy->id) { ?>
        <span class="btn btn-warning privacypolicyedit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo @$privacypolicy->id?>" >Update</span>
        <?php  } else { ?>
            <span class="btn btn-warning privacypolicyedit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="0" >Add (<?php echo @$privacypolicy->id?>)</span>
            <?php } ?>
              </div>
    </div>
    </div>

<div id="pagination">
    {{ $privacypolicys->links() }}
  </div>




</div>
    @endif



