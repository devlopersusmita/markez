@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">

            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">About Us</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">About Us</li>

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
            @include("admin.aboutus.aboutus-pagination",['aboutuss'=>$aboutuss])
          </div>


    </div>


      </section>

    </div>

@endsection





 <!-- Modal to edit new  starts-->
    <div class="modal fade" id="modals-edit" tabindex="1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" >Update About Us</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            <form class="edit-new-aboutus"   enctype="multipart/form-data" >
             <div class="row">
             <div class="col-md-12">
                    <label>Aboutus Content</label>
                    <br>
                     <input type="text" class="input title-input" id="aboutus_content_edit" placeholder="Enter the Aboutus Content" name="aboutus_content">

                </div>
                <div class="col-md-4">
                    <label>Aboutus Banner</label>
                    <input type="file"  name="aboutus_banner" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="old_aboutus_banner" id="old_aboutus_banner" value="" />
                    <div id="aboutus_banner_edit_div"></div>
                </div>
                <div class="col-md-4">
                    <label>Aboutus SiteImage</label>
                    <input type="file"  name="aboutus_siteimage"  accept=".png, .jpg, .jpeg"/>
                    <input type="hidden" name="old_aboutus_siteimage" id="old_aboutus_siteimage" value="" />
                    <div id="aboutus_siteimage_edit_div"></div>
                </div>

            </div>
            <div class="mb-2"></div>
            <input type="hidden" id="edit_id" value="" />

           <button type="submit" id="aboutus_edit" class="btn btn-success data-edit">Save</button>
            <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
            </form>

              </div>
          </div>



      </div>
    </div>
    <!-- Modal to add new  Ends-->








