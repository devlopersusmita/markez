
@extends('theme.institution.default')

@section('content')

		<div class="app-main">
        @include('theme.institution.sidebar')
			<div class="app-main__outer">
				<div class="app-main__inner">
					<div class="profile-btn right-btn">
						<a href="{{url('institutionwebsite/'.$user_id)}}">View My website <img src="images/next-icon.png" alt="next"></a>
					</div>
					<form method="POST" action="{{ route('institutioninstitutionupdate') }}" enctype="multipart/form-data">
         @csrf
		 @include('frontend.notification')
         <input type="hidden" value="{{$user_id}}" name="user_id">
						<div class="profile-edit-wrap">
							<div class="profile-edit">
								<div class="avatar-upload">
									<div class="avatar-edit">
									<input type="hidden" name="old_logo" value="{{$institution_details->logo}}" />
										<input type='file'  name="logo"  accept=".png, .jpg, .jpeg" />
										<label for="imageUpload"></label>
									</div>
									<div class="avatar-preview">
									@if($institution_details->logo ==''||!file_exists($institution_details->logo))
										<div style="background-image: url('images/profile-edit-bg.png');">
										</div>
										@else
										<div style="background-image: url({{asset($institution_details->logo)}});">

                                       </div>  
									   @endif
									</div>
								</div>
							</div>
							<div class="profile-title">
								<label>Institution Name</label>
								<input type="text" class="form-control"  name="name" placeholder="Enter Institution Name" value="{{$institution_details->name}}" required>
								@error('name')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
							</div>
						</div>

						<div class="select-theme">
							<h3>Choose Theme</h3>
							<div class="subscription-container select-theme-wrap">
												<?php  $count=1;?>
									@foreach($themes as $theme)
									<?php if($count == 1){
										$cls_name="card_one";
										//echo $cls_name;
										}else if($count==2){
										$cls_name="card_two";

										}
										else if($count==3){
										$cls_name="card_three";

										}
										else if($count==4){
										$cls_name="card_four";

										}?>
												<input type="radio" name="theme_id"  id="<?php echo $cls_name?>" value="{{($theme->id)}}"
										<?php if($theme->id==$institution_theme_details->theme_id){ echo "checked";}?>
										/>
										
													<label for="<?php echo $cls_name?>" class="<?php echo $cls_name?>">
							<label>{{$theme->theme_name}}</label>
							<div class="card">
								<span class="check_btn"></span>
								<img src="{{asset($theme->theme_image)}}" alt="">
							</div>
							</label>
							<?php $count=$count + 1;?>
							@endforeach
								
							</div>
						</div>

						<div class="save-btn">
                        	<button type="submit">Save</button>
                    	</div>

					</form>
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
	</div>
        @endsection
