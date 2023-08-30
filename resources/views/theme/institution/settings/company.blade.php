@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')
<div class="app-main__outer">
   <div class="app-main__inner company-settings-inner">
        <div class="company_inner">
            <h3>Company Settings</h3>
            @foreach($companys as $company)
            <div class="form-group m-3" >
                <div class="row logo-row">
                    <div class="col-lg-3 col-md-6">
                        <div class="logo-box">
                            <p ><?php echo $company['logo']!=''?'<img src="'.$company['logo'].'" width="100" />':''?></p>
                        </div>
                        <label>Logo</label>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="logo-box fav-icon-box">
                            <p ><?php echo $company['fav_icon']!=''?'<img src="'.$company['fav_icon'].'" width="50" />':''?></p>
                        </div>
                        <label>Fav Icon</label> 
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="logo-box signature-box">
                            <p ><?php echo $company['director_signature']!=''?'<img src="'.$company['director_signature'].'" width="150" />':''?></p>
                        </div>
                        <label>Director signature</label>
                    </div>
                </div>
                <div class="row settings-form-row">
                    <div class="col-md-4">
                        <div class="form-bottom-gap">
                            <label>Name</label>
                            <p class="custom-border">{{$company['name']}}</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-bottom-gap">
                            <label>Address</label>
                            <p class="custom-border">
                                {{$company['address']}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-bottom-gap">
                            <label>Home Page Short Description</label>
                            <div class="custom-border">
                                {!!$company['home_page_short_description']!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-bottom-gap">
                            <label>Footer Text</label>
                            <div class="custom-border">
                                {!!$company['footer_text']!!}
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-bottom-gap">
                            <label>Header Text</label>
                            <div class="custom-border">
                                {!!$company['header_text']!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-bottom-gap">
                            <label>Copyright Text</label>
                            <p class="custom-border">{{$company['copyright_text']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-bottom-gap">
                            <label>Facebook Link</label>
                            <div id="show_facebook_link">
                                <p class="custom-border">{{$company['facebook_link']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-bottom-gap">
                            <label>Instagram Link</label>
                            <p class="custom-border">{{$company['instagram_link']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-bottom-gap">
                            <label>Twiter Link</label>
                            <p class="custom-border">{{$company['twiter_link']}}</p>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-bottom-gap">
                            <label>Linkedin Link</label>
                            <p class="custom-border">{{$company['linkedin_link']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-bottom-gap">
                            <label>Youtube Link</label>
                            <p class="custom-border">{{$company['youtube_link']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-bottom-gap">
                            <label>Phone</label>
                            <p class="custom-border">{{$company['phone']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-bottom-gap">
                            <label>Fax</label>
                            <p class="custom-border">{{$company['fax']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-bottom-gap">
                            <label>Website</label>
                            <p class="custom-border">{{$company['website']}}</p>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-bottom-gap">
                            <label>Country</label>
                            <p class="custom-border">{{$company['country']}}</p>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 text-right"  >
                        <span class="btn btn-warning companyedit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $company['id']?>" >Update</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
      <div class="app-wrapper-footer">
         <div class="app-footer">
            <div class="app-footer__inner">
               <div class="app-footer-left">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>




<!--  -->
 <!-- Modal to edit new Company starts-->
 <div class="modal common-modal fade" id="modals-edit" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >Edit Company Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <!-- <span aria-hidden="true">&times;</span> -->
              <img src="images/icon-modal-close.svg" alt="">
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            <form class="edit-new-company"   enctype="multipart/form-data" >
             <div class="row">
                <div class="col-lg-6 modal-bottom-gap">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="name_edit" placeholder="Name" maxlength="250" />
                </div>
                <div class="col-lg-6 modal-bottom-gap">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="address_edit" placeholder="Address" maxlength="250"  />
                </div>
                 <div class="col-lg-4 modal-bottom-gap">
                    <label>Logo</label>
                    <input type="file"  name="logo" />
                    <input type="hidden" name="old_logo" id="old_logo" value="" />
                    <div id="logo_edit_div"></div>
                </div>
                 <div class="col-lg-4 modal-bottom-gap">
                    <label>Fav Icon</label>
                    <input type="file"  name="fav_icon" />
                    <input type="hidden" name="old_fav_icon" id="old_fav_icon" value="" />
                    <div id="fav_icon_edit_div"></div>
                </div>

                 <div class="col-lg-4 modal-bottom-gap">
                    <label>Director signature</label>
                    <input type="file"  name="director_signature" />
                    <input type="hidden" name="old_director_signature" id="old_director_signature" value="" />
                    <div id="director_signature_edit_div"></div>
                </div>



                 <div class="col-md-12 modal-bottom-gap">
                    <label>Home Page Short Description</label>
                    <br>
                     <input type="text" class="input title-input" id="home_page_short_description_edit" placeholder="Enter the Home Page Short Description" name="home_page_short_description">

                </div>
                 <div class="col-md-12 modal-bottom-gap">
                    <label>Footer Text</label>
                    <br>
                     <input type="text" class="input title-input" id="footer_text_edit" placeholder="Enter the Footer Text" name="footer_text">

                </div>
                <div class="col-md-12 modal-bottom-gap">
                    <label>Header Text</label>
                    <br>
                     <input type="text" class="input title-input" id="header_text_edit" placeholder="Enter the Header Text" name="header_text"  >

                </div>
                <div class="col-md-6 modal-bottom-gap">
                    <label>Copyright Text</label>
                    <input type="text" class="form-control" name="copyright_text" id="copyright_text_edit" placeholder="Copyright Text" maxlength="250" />
                </div>

                <div class="col-md-6 modal-bottom-gap">
                    <label>Facebook Link</label>
                    <input type="text" class="form-control" name="facebook_link" id="facebook_link_edit" placeholder="Facebook Link" maxlength="250" />
                </div>
                <div class="col-md-6 modal-bottom-gap">
                    <label>Instagram Link</label>
                    <input type="text" class="form-control" name="instagram_link" id="instagram_link_edit" placeholder="Instagram Link" maxlength="250" />
                </div>
                <div class="col-md-6 modal-bottom-gap">
                    <label>Twiter Link</label>
                    <input type="text" class="form-control" name="twiter_link" id="twiter_link_edit" placeholder="Twiter Link" maxlength="250" />
                </div>
                <div class="col-md-6 modal-bottom-gap">
                    <label>Linkedin Link</label>
                    <input type="text" class="form-control" name="linkedin_link" id="linkedin_link_edit" placeholder="Linkedin Link" maxlength="250" />
                </div>
                <div class="col-md-6 modal-bottom-gap">
                    <label>Youtube Link</label>
                    <input type="text" class="form-control" name="youtube_link" id="youtube_link_edit" placeholder="Youtube Link" maxlength="250" />
                </div>

                <div class="col-md-6 modal-bottom-gap">
                    <label>Phone</label>
                    <input type="number" class="form-control" name="phone" id="phone_edit" placeholder="Phone" maxlength="250" />
                </div>
                <div class="col-md-6 modal-bottom-gap">
                    <label>Fax</label>
                    <input type="text" class="form-control" name="fax" id="fax_edit" placeholder="Fax" maxlength="250" />
                </div>
                <div class="col-md-6 modal-bottom-gap">
                    <label>Website</label>
                    <input type="text" class="form-control" name="website" id="website_edit" placeholder="Website" maxlength="250" />
                </div>
                <div class="col-md-6 modal-bottom-gap">
                    <label>Country</label>
                    <input type="text" class="form-control" name="country" id="country_edit" placeholder="Country" maxlength="250" />
                </div>
            </div>
            <input type="hidden" id="edit_id" value="" />

           <button type="submit" id="company_edit" class="btn btn-success data-edit data-add">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary data-cancel" >Cancel</button>
            </form>
            </div>
          </div>

      </div>
    </div>
    <!-- Modal to add new Company Ends-->
<!--  -->
@endsection



