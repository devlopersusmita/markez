@extends('theme.teacher.default')

@section('content')


 <div class="view-wrapper">

        <!-- Container -->
        <div class="container is-custom">

            <!- <div class="view-wrapper">

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
                         @include('theme.teacher.sidebar')
                         <div class="right-content">
                            <div class="groups-grid padding_0">

                                <div class="grid-header">
                                    <div class="header-inner">
                                        <h2>Profile</h2>
                                        <div class="header-actions">

                                        </div>
                                    </div>
                                </div>
                            </div>
                         <div class="cover-bg">
                            @if($user->background_image ==''||!file_exists($user->background_image))
                            <img id="background_image_id" class="cover-image" src="{{asset('assets/img/1600x460.png')}}" data-demo-src="assets/img/demo/bg/4.png" alt="">
                            @else
                            <img id="background_image_id" class="cover-image" src="{{asset($user->background_image)}}"  alt="">
                            @endif
                            <div class="avatar">

                                 @if($user->avatar ==''||!file_exists($user->avatar))
                               <img id="avatar_image_id" class="avatar-image" src="{{asset('assets/img/icons/activities/drinking.svg')}}"  alt="">
                                @else
                                <img id="avatar_image_id" class="cover-image" src="{{asset($user->avatar)}}"  alt="">
                                @endif

                                <div class="avatar-button modal-trigger" data-modal="change-profile-modal">
                                    <i data-feather="plus" ></i>
                                </div>
                            </div>
                            <div class="cover-overlay"></div>
                            <div class="cover-edit modal-trigger" data-modal="change-cover-modal">
                                <i class="mdi mdi-camera"></i>
                                <span>Edit cover image</span>
                            </div>

                        </div>


                         <!-- tab start --->
                            <div id="shop-page" class="shop-wrapper padding_top_100">

                                @if(session()->has('message'))
                                    <div class="box-heading margin_top_10 margin_bottom_10">
                                        <h4>{{ session()->get('message') }}</h4>

                                    </div>
                                @endif

                                <div class="shop-header">
                                    <div class="container">
                                        <div class="store-tabs">
                                            <a data-tab="Personal-tab" class="tab-control is-active">Personal</a>
                                            <a data-tab="Settings-tab" class="tab-control">Settings</a>
                                            <div class="store-naver"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="store-sections">
                                    <div class="container">

                                        <!--Personal-->
                                        <div id="Personal-tab" class="store-tab-pane is-active">
                                            <div class="product-card">

                                                 <form method="POST" action="{{ route('teacherprofileupdate') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{$user_id}}" name="user_id">
                                                    <input type="hidden" value="{{$institution_id}}" name="institution_id">
                                                     <div class="columns">
                <div class="column is-6">
                        <div class="field">
                        <label>Name</label>
                        <div class="control has-icon">
                            <input type="text" class="input" name="name" value="{{$user->name}}" placeholder="Enter Name" required>
                            <div class="form-icon">
                                <i data-feather="user"></i>
                            </div>
                        </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
                                                        <div class="column is-6">
                                                            <div class="field">
                                                                <label>Email</label>
                                                                <div class="control has-icon">
                                                                    <input type="email" class="input" disabled value="{{$user->email}}">
                                                                    <div class="form-icon">
                                                                        <i data-feather="user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="columns">
                                                        <div class="column is-6">
                                                             <div class="field">
                                                                <label>Subscription start date</label>
                                                                <div class="control has-icon">
                                                                    <input type="text" class="input" disabled value="{{$user_details->subscription_start_date}}">
                                                                    <div class="form-icon">
                                                                        <i data-feather="calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column is-6">
                                                             <div class="field">
                                                                <label>Subscription end date</label>
                                                                <div class="control has-icon">
                                                                    <input type="text" class="input" disabled value="{{$user_details->subscription_end_date}}">
                                                                    <div class="form-icon">
                                                                        <i data-feather="calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="columns">
                                                        <div class="column is-6">
                                                             <div class="field">
                                                                <label>Country</label>
                                                                <div class="control has-icon">
                                                                    <select class="input select2 getcity" data-nextid="city_id" name="country_id" id="country_id" required>
                                                                        <option value="">Select country</option>
                                                                        @if(!empty($countries))
                                                                            @foreach($countries as $country)
                                                                                <option value="{{$country->id}}" <?php if($user_details->country_id==$country->id){echo "selected='selected'";} ?> >{{$country->c_name}}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                    <div class="form-icon">
                                                                        <i data-feather="map"></i>
                                                                    </div>
                                                                </div>
                                                                @error('country_id')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="column is-6">
                                                             <div class="field">
                                                                <label>City</label>
                                                                <div class="control has-icon">
                                                                    <select class="input select2" name="city_id" id="city_id" required>
                                                                        <option value="">Select city</option>
                                                                        @if(!empty($cities))
                                                                            @foreach($cities as $city)
                                                                                <option value="{{$city->id}}" <?php if($user_details->city_id==$city->id){echo "selected='selected'";} ?> >{{$city->city_name}}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                    <div class="form-icon">
                                                                        <i data-feather="map"></i>
                                                                    </div>
                                                                </div>
                                                                @error('city_id')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="columns">
                                                         <div class="column is-6">
                                                             <div class="field">
                                                                <label>Phone</label>
                                                                <div class="control has-icon">
                                                                    <input type="text" class="input" name="phone" value="{{$user->phone}}" placeholder="Enter Phone" required>
                                                                    <div class="form-icon">
                                                                        <i data-feather="phone"></i>
                                                                    </div>
                                                                </div>
                                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="column is-6">

                                                        </div>
                                                    </div>
                                                    <div class="columns">
                                                        <div class="column is-12">
                                                             <div class="field">
                                                                <label>Address</label>
                                                                <div class="control has-icon">
                                                                    <textarea class="input height" name="address" >{{$user_details->address}}</textarea>
                                                                    <div class="form-icon">
                                                                        <i data-feather="home"></i>
                                                                    </div>
                                                                </div>
                                                                @error('address')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="columns">
                                                        <div class="column is-12">
                                                             <div class="field">
                                                                <label>Description</label>
                                                                <div class="control has-icon">
                                                                    <textarea class="form-control" id="description" placeholder="Enter the Description" name="description" rows="10" cols="50" value="">{{$user_details->description}}</textarea>

                                                                </div>
                                                                @error('description')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
        <label for="skills">Skills:</label>
        <input type="text" class="form-control" id="skills" name="skills">
    </div>
                                                    <div class="columns">
                                                        <div class="column is-6">
                                                             <div class="buttons">
                                                                 <button type="submit" class="button is-solid primary-button raised">Save</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!--Settings-->
                                        <div id="Settings-tab" class="store-tab-pane">
                                            <div class="product-card">
                                                Settings contents here ...
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <!--tab end --->

                         </div>


                     </div>

                 </div>

             </div>


            </div>


      </div>



        <div id="change-cover-modal" class="modal change-cover-modal is-medium has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">

                <div class="card">
                    <div class="card-heading">

                        <h3>Update Cover Picture</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Placeholder -->
                        <div class="selection-placeholder">
                            <div class="columns">
                                <div class="column is-12">
                                    <!-- Selection box -->
                                    <form action="{{ route('teacherajaxImageUpload') }}" class="upload-image-form" enctype="multipart/form-data" method="POST">
                                    <input type="hidden" value="{{$user_id}}" name="user_id">
                                                    <input type="hidden" value="{{$institution_id}}" name="institution_id">

                                        <input type="hidden" name="user_type" value="teacher">
                                        <input type="hidden" name="picture_type" value="background_photo">


                                     <div class="card">

                                        <div class="card-body">
                                            <label class="profile-uploader-box" for="upload-profile-picture">
                                                <span class="inner-content" >
                                                        <img src="{{asset('assets/img/illustrations/profile/add-profile.svg')}}" id="output_1_img_id"  style="height: 120px;" alt="">

                                                </span>
                                                <input type="file" name="image" id="upload-profile-picture" accept="image/*" onchange="loadFile(event,'output_1_img_id')">
                                            </label>
                                            <div class="upload-demo-wrap is-hidden">
                                                <div id="upload-profile"></div>
                                                <div class="upload-help">
                                                    <a id="profile-upload-reset" class="profile-reset is-hidden">Reset Picture</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button id="submit-profile-picture" class="button is-solid accent-button is-fullwidth raised upload-image" type="submit">Use Picture</button>
                                        </div>
                                    </div>
                                    </form>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

         <div id="change-profile-modal" class="modal change-cover-modal is-medium has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">

                <div class="card">
                    <div class="card-heading">
                        <h3>Update Profile Picture</h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Placeholder -->
                        <div class="selection-placeholder">
                            <div class="columns">
                                <div class="column is-12">
                                    <!-- Selection box -->
                                    <form action="{{ route('teacherajaxImageUpload') }}" class="upload-image-form" enctype="multipart/form-data" method="POST">
                                    <input type="hidden" value="{{$user_id}}" name="user_id">
                                                    <input type="hidden" value="{{$institution_id}}" name="institution_id">

                                        <input type="hidden" name="user_type" value="teacher">
                                        <input type="hidden" name="picture_type" value="avatar">
                                     <div class="card">

                                        <div class="card-body">
                                            <label class="profile-uploader-box" for="upload-profile-picture">
                                                <span class="inner-content" >
                                                        <img src="{{asset('assets/img/illustrations/profile/add-profile.svg')}}" id="output_2_img_id" style="height: 120px;" alt="">

                                                </span>
                                                <input type="file" name="image"  id="upload-profile-picture" accept="image/*" onchange="loadFile(event,'output_2_img_id')">
                                            </label>
                                            <div class="upload-demo-wrap is-hidden">
                                                <div id="upload-profile"></div>
                                                <div class="upload-help">
                                                    <a id="profile-upload-reset" class="profile-reset is-hidden">Reset Picture</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button id="submit-profile-picture" class="button is-solid accent-button is-fullwidth raised " type="submit">Use Picture</button>
                                        </div>
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


@endsection
