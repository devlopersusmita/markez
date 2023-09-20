@if(!empty($aboutuss))
@include('frontend.notification')



<div class="card">


    @foreach($aboutuss as $aboutus)
    <div class="form-group m-3" >
    <div class="row">

    <div class="col-md-12">
            <label>Aboutus Content</label>
            <p> {!!$aboutus['aboutus_content']!!}</p>
        </div>
        <div class="col-md-4">
            <label>Aboutus Banner</label>
            <p id="show_logo"><img src="{{asset($aboutus['aboutus_banner'])}}" alt="" width="100%"></p>

        </div>
        <div class="col-md-4">
            <label>Aboutus SiteImage</label>
            <p id="show_logo"><img src="{{asset($aboutus['aboutus_siteimage'])}}" alt="" width="100%"></p>
        </div>


        <div class="col-md-12 mt-3 text-right"  >
        <span class="btn btn-warning edit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $aboutus['id']?>" >Update</span>
        </div>
    </div>
    </div>
    @endforeach
<div id="pagination">
    {{ $aboutuss->links() }}
  </div>




</div>
    @endif



