@if(!empty($privacypolicys))
@include('frontend.notification')



<div class="card">



    <div class="form-group m-3" >
    <div class="row">
        <div class="col-md-6">
            <label>Privacy Policy</label>
            <p id="show_name">{!!@$privacypolicys->privacy_policy!!}</p>
        </div>

        <div class="col-md-12 mt-3 text-right"  >

        <?php if(@$privacypolicys[0]->id) { ?>
        <span class="btn btn-warning privacypolicyedit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo @$privacypolicys[0]->id?>" >Update</span>
        <?php  } else { ?>
            <span class="btn btn-warning privacypolicyedit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="0" >Add</span>
            <?php } ?>
              </div>
    </div>
    </div>

<div id="pagination">
    {{ $privacypolicys->links() }}
  </div>




</div>
    @endif



