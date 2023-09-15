@extends('layouts.apploginregistration')

@section('content')


<div class="container">
            <!--Container-->
            <div class="login-container is-centered">
                <div class="columns is-vcentered">
                    <div class="column">
                        <!-- <h2 class="form-title has-text-centered">Institution Register</h2>
                        <h3 class="form-subtitle has-text-centered">Lets create your account.</h3> -->
                        <div class="inner">
                            <div class="sign-up-img">
                                <img src="{{asset('images/sign-up-banner.png')}}" alt="">
                            </div>
                            <div class="login-form signup-form">
                                <div class="d-flex align-items-center sign-up-title">
                                    <div class="sign-up-title-left">
                                        <img src="{{asset('images/sign-up-logo.png')}}" class="d-block">
                                        <h2>Institution Sign Up</h2>
                                    </div>
                                    <div class="sign-up-title-right">
                                        <h5>Step-2</h5>
                                    </div>
                                </div>
                                <!--Form-->
                                <form id="myForm" class="multistep_form" method="POST" action="{{ route('Step2submit') }}" enctype="multipart/form-data">
                                    @csrf
                                    <!-- START -->
                                    <input type="hidden" value="{{$institution_id}}" name="institution_id">
                                    <h4>Choose a Logo</h4>
                                    <div id="wrapper" class="form-group file_upload">


                                    <input  name="logo" id="logo"  type="file" accept=".jpg,.png,.jpeg"  required><br />
                                    <div id="image-holder"> </div>
                                    </div>
                                    <div class="form-group">
                                        <input id="domain_subdomain" type="text" class="form-control" name="domain_subdomain"  placeholder="Domain/Subdomain Name" required>
                                    </div>
                                                                  <h4> Choose a Gov_Registration_Doc</h4>

                                    <div id="wrapper" class="form-group file_upload">

                                        <input id="gov_registration_doc" type="file" name="gov_registration_doc" value=""  autocomplete="gov_registration_doc" required accept=".pdf,.doc"><br />

                                        @error('gov_registration_doc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="select-subscription" >
                                        <h4>Select Subscription</h4>
                                        <div class="subscription-container" >
                                        <?php  $count=1;?>
                                        @foreach($subscriptions as $subscription)
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

                                                }
                                                else if($count==5){
                                                    $cls_name="card_five";

                                                    }
                                                    else if($count==6){
                                                        $cls_name="card_six";

                                                        }
                                                        else if($count==7){
                                                            $cls_name="card_seven";

                                                            }?>


                                            <input type="radio" name="subscription"  id="<?php echo $cls_name?>" value="{{($subscription->id )}}"  />

                                            <!-- they should all have the same name attr but different ids -->
                                            <label for="<?php echo $cls_name?>" class="<?php echo $cls_name?>">
                                                <div class="card">
                                                    <span class="check_btn"></span>

                                                    <div class="package-box">
                                                        <div class="package-title">
                                                            <h3>{{$subscription->title }}</h3>
                                                        </div>
                                                        <div class="package-details">
                                                            <div class="package-info">
                                                                <h2>{{$subscription->price}}/Price</h2>
                                                                <span>{{$subscription->days}}/Days</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>

                                            <?php $count=$count + 1;?>
                                          @endforeach
                                        </div>
                                    </div>

                                    <div class="step-btn-sec">
                                        <button class="btn-banner next step-link" onclick="subscriptionChecked()" type="button">Next <img src="{{asset('images/next.png')}}"></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
