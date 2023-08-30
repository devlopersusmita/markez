@if(!empty($termsandconditions))
@include('frontend.notification')



<div class="card">


    @foreach($termsandconditions as $termsandcondition)
    <div class="form-group m-3" >
    <div class="row">

    <div class="col-md-12">
            <label>Terms and Condition</label>
            <p> {!!$termsandcondition['terms_contents']!!}</p>
        </div>



        <div class="col-md-12 mt-3 text-right"  >
        <span class="btn btn-warning edit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $termsandcondition['id']?>" >Update</span>
        </div>
    </div>
    </div>
    @endforeach
<div id="pagination">
    {{ $termsandconditions->links() }}
  </div>




</div>
    @endif



