@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">

            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">Company Settings</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Company Settings</li>

                    </ol>

                </div><!-- /.col -->

            </div><!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            
         <div id="pagination_data">
            @include("admin.company.company-pagination",['companys'=>$companys])
          </div>


    </div>


      </section>

    </div>

@endsection





 <!-- Modal to edit new Company starts-->
    <div class="modal fade" id="modals-edit" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >Edit Company Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            <form class="edit-new-company"   enctype="multipart/form-data" >
             <div class="row">
                <div class="col-md-6">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="name_edit" placeholder="Name" maxlength="250" required/>
                </div>
                <div class="col-md-6">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="address_edit" placeholder="Address" maxlength="250" required />
                </div>
                 <div class="col-md-4">
                    <label>Logo</label>
                    <input type="file"  name="logo" />
                    <input type="hidden" name="old_logo" id="old_logo" value="" />
                    <div id="logo_edit_div"></div>
                </div>
                 <div class="col-md-4">
                    <label>Fav Icon</label>
                    <input type="file"  name="fav_icon" />
                    <input type="hidden" name="old_fav_icon" id="old_fav_icon" value="" />
                    <div id="fav_icon_edit_div"></div>
                </div>

                 <div class="col-md-4">
                    <label>Director signature</label>
                    <input type="file"  name="director_signature" />
                    <input type="hidden" name="old_director_signature" id="old_director_signature" value="" />
                    <div id="director_signature_edit_div"></div>
                </div>

                

                 <div class="col-md-12">
                    <label>Home Page Short Description</label>
                    <br>
                     <input type="text" class="input title-input" id="home_page_short_description_edit" placeholder="Enter the Home Page Short Description" name="home_page_short_description">
                   
                </div>
                 <div class="col-md-12">
                    <label>Footer Text</label>
                    <br>
                     <input type="text" class="input title-input" id="footer_text_edit" placeholder="Enter the Footer Text" name="footer_text">
                   
                </div>
                <div class="col-md-12">
                    <label>Header Text</label>
                    <br>
                     <input type="text" class="input title-input" id="header_text_edit" placeholder="Enter the Header Text" name="header_text"  >

                </div>
                <div class="col-md-6">
                    <label>Copyright Text</label>
                    <input type="text" class="form-control" name="copyright_text" id="copyright_text_edit" placeholder="Copyright Text" maxlength="250" required/>
                </div>

                <div class="col-md-6">
                    <label>Facebook Link</label>
                    <input type="text" class="form-control" name="facebook_link" id="facebook_link_edit" placeholder="Facebook Link" maxlength="250" />
                </div>
                <div class="col-md-6">
                    <label>Instagram Link</label>
                    <input type="text" class="form-control" name="instagram_link" id="instagram_link_edit" placeholder="Instagram Link" maxlength="250" />
                </div>
                <div class="col-md-6">
                    <label>Twiter Link</label>
                    <input type="text" class="form-control" name="twiter_link" id="twiter_link_edit" placeholder="Twiter Link" maxlength="250" />
                </div>
                <div class="col-md-6">
                    <label>Linkedin Link</label>
                    <input type="text" class="form-control" name="linkedin_link" id="linkedin_link_edit" placeholder="Linkedin Link" maxlength="250" />
                </div>
                <div class="col-md-6">
                    <label>Youtube Link</label>
                    <input type="text" class="form-control" name="youtube_link" id="youtube_link_edit" placeholder="Youtube Link" maxlength="250" />
                </div>

                <div class="col-md-6">
                    <label>Phone</label>
                    <input type="number" class="form-control" name="phone" id="phone_edit" placeholder="Phone" maxlength="250" required/>
                </div>
                <div class="col-md-6">
                    <label>Fax</label>
                    <input type="text" class="form-control" name="fax" id="fax_edit" placeholder="Fax" maxlength="250" required/>
                </div>
                <div class="col-md-6">
                    <label>Website</label>
                    <input type="text" class="form-control" name="website" id="website_edit" placeholder="Website" maxlength="250" required />
                </div>
                <div class="col-md-6">
                    <label>Country</label>
                    <input type="text" class="form-control" name="country" id="country_edit" placeholder="Country" maxlength="250" required />
                </div>
            </div>
            <div class="mb-2"></div>
            <input type="hidden" id="edit_id" value="" />

           <button type="submit" id="company_edit" class="btn btn-success data-edit">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </form>

              </div>
          </div>



      </div>
    </div>
    <!-- Modal to add new Company Ends-->








