@if(!empty($aboutuss))
@include('frontend.notification')



<div class="card">



    <div class="form-group m-3" >
    <div class="row">

    <div class="col-md-12">
            <label>Aboutus Content</label>
            <p> {!!@$aboutuss[0]->aboutus_content!!}</p>
        </div>
        <div class="col-md-4">
            <label>Aboutus Banner</label>
            <p id="show_logo" class="about_img"><img src="{{asset(@$aboutuss[0]->aboutus_banner)}}" alt="" width="100%"></p>

        </div>
        <div class="col-md-4">
            <label>Aboutus SiteImage</label>
            <p id="show_logo" class="about_img"><img src="{{asset(@$aboutuss[0]->aboutus_siteimage)}}" alt="" width="100%"></p>
        </div>


        <div class="col-md-12 mt-3 text-right"  >
        <?php if(@$aboutuss[0]->id) { ?>
        <span class="btn btn-warning edit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo @$aboutuss[0]->id?>" >Update</span>
        <?php  } else { ?>
            <span class="btn btn-primary edit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="0" >Add</span>
            <?php } ?>
        </div>
    </div>
    </div>

<div id="pagination">
    {{ $aboutuss->links() }}
  </div>




</div>
    @endif



