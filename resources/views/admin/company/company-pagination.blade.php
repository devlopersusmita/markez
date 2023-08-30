@if(!empty($companys))
@include('frontend.notification')



<div class="card">
{{-- <div class="card-body table-responsive"> --}}

    @foreach($companys as $company)
    <div class="form-group m-3" >
    <div class="row">
        <div class="col-md-6">
            <label>Name</label>
            <p id="show_name"> {{$company['name']}}</p>
        </div>
        <div class="col-md-6">
            <label>Address</label>
            <p id="show_address">{{$company['address']}}</p>
        </div>

         <div class="col-md-4">
            <label>Logo</label>
            <p id="show_logo"><?php echo $company['logo']!=''?'<img src="'.$company['logo'].'" width="100" />':''?></p>
        </div>
         <div class="col-md-4">
            <label>Fav Icon</label>
          
             <p id="show_fav_icon"><?php echo $company['fav_icon']!=''?'<img src="'.$company['fav_icon'].'" width="100" />':''?></p>
        </div>

          <div class="col-md-4">
            <label>Director signature</label>
          
             <p id="show_director_signature"><?php echo $company['director_signature']!=''?'<img src="'.$company['director_signature'].'" width="100" />':''?></p>
        </div>

        

        <div class="col-md-12">
            <label>Home Page Short Description</label>
            <p id="show_home_page_short_description"> {!!$company['home_page_short_description']!!}</p>
        </div>
        <div class="col-md-12">
            <label>Footer Text</label>
            <p id="show_footer_text"> {!!$company['footer_text']!!}</p>
        </div>
        <div class="col-md-12">
            <label>Header Text</label>
            <p id="show_footer_text"> {!!$company['header_text']!!}</p>
        </div>
        <div class="col-md-6">
            <label>Copyright Text</label>
            <p id="show_name"> {{$company['copyright_text']}}</p>
        </div>

         <div class="col-md-6">
            <label>Facebook Link</label>
            <p id="show_facebook_link">{{$company['facebook_link']}}</p>
        </div>
         <div class="col-md-6">
            <label>Instagram Link</label>
            <p id="show_instagram_link">{{$company['instagram_link']}}</p>
        </div>
         <div class="col-md-6">
            <label>Twiter Link</label>
            <p id="show_twiter_link">{{$company['twiter_link']}}</p>
        </div>
         <div class="col-md-6">
            <label>Linkedin Link</label>
            <p id="show_linkedin_link">{{$company['linkedin_link']}}</p>
        </div>
         <div class="col-md-6">
            <label>Youtube Link</label>
            <p id="show_youtube_link">{{$company['youtube_link']}}</p>
        </div>


        <div class="col-md-6">
            <label>Phone</label>
            <p id="show_phone">{{$company['phone']}}</p>
        </div>
        <div class="col-md-6">
            <label>Fax</label>
            <p id="show_fax"> {{$company['fax']}}</p>
        </div>
        <div class="col-md-6">
            <label>Website</label>
            <p id="show_website"> {{$company['website']}}</p>
        </div>
        <div class="col-md-6">
            <label>Country</label>
            <p id="show_country">{{$company['country']}}</p>
        </div>
        <div class="col-md-12 mt-3 text-right"  >
        <span class="btn btn-warning edit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $company['id']?>" >Edit</span>
        </div>
    </div>
    </div>
    @endforeach
<div id="pagination">
    {{ $companys->links() }}
  </div>


{{-- </div> --}}

</div>
    @endif



