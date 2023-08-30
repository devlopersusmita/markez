@extends('theme.institution.default')


@section('content')


 <div class="view-wrapper">

       <!-- Container -->
<div class="container is-custom">

    <!-- Profile page main wrapper -->
    <div id="profile-about" class="view-wrap is-headless">
        <div class="columns is-multiline no-margin">
            <!-- Left side column -->
            <div class="column is-paddingless">
                <!-- Timeline Header -->

            </div>

        </div>

        <div class="column">

            <!-- About sections -->
            <div class="profile-about side-menu">
                @include('theme.institution.sidebar')

                <div class="right-content">
                   


                    <div id="overview-content" class="content-section is-active">

                    <div class="modal-content">
                <div class="card">
                    <div class="card-heading">
                        <h3>New Page</h3>
                        
                    </div>
                    <div class="card-body">
                        <form class="add-new-page"   enctype="multipart/form-data" >
                            <div class="login-form">
                                <div class="field">
                                    <label class="required">Name</label>
                                    <style>
                                        .required:after {
                                          content:" *";
                                          color: red;
                                        }
                                      </style>
                                    <div class="control">
                                        <input class="input title-input" type="text" name="form_name" id="form_name"  placeholder="Form name" required>

                                    </div>
                                </div>
                                <div class="field">
                                    <label class="required">Page Name</label>
                                    <div class="control">
                                    <select class="input title-input" name="page_id" id="page_id" maxlength="250" required>
                                        <option value="">Select a Page</option>
                                        @foreach($pages as $page)

                                        <option value="{{ $page->id }}">{{ $page->title }}</option>

                                        @endforeach
                                    </select>


                                    </div>
                                </div>







                                <div class="field">
                                    <span class="text-danger" id="form-input-error"></span>
                                    <span class="text-success" id="form-input-success"></span>
                                    </div>
                                <button type="submit" id="page_add" class="button is-solid primary-button data-add">Save</button>



                                <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                            </div>
                          </form>
                    </div>
                </div>





        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

   </div>
        </div>


    





















    </div>


@endsection



