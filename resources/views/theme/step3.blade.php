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
                                        <h5>Step-3</h5>
                                    </div>
                                </div>

                                <!-- Moyasar Styles -->
                                <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.7.3/moyasar.css" />

                                <!-- Moyasar Scripts -->
                                <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
                                <script src="https://cdn.moyasar.com/mpf/1.7.3/moyasar.js"></script>

                                                      <!--Form-->
                        <form method="POST" action="{{ route('register.submit') }}">
    @csrf
    <!-- start -->


    <input type="hidden" value="{{$institution_id}}" name="institution_id">
    <div class="mysr-form"></div>
        <script>

        var total = "{{$order_details->total}}";



        total = parseFloat(total);

        total = total * 100 ;
                Moyasar.init({
                    element: '.mysr-form',
                    // Amount in the smallest currency unit.
                    // For example:
                    // 10 SAR = 10 * 100 Halalas

                    // 10 KWD = 10 * 1000 Fils
                    // 10 JPY = 10 JPY (Japanese Yen does not have fractions)
                    amount: total,
                    currency: 'SAR',
                    description: 'registration subcription  #1',
                    publishable_api_key: 'pk_test_jW7KSk9zJtgn4Nu7TuQHjn4tCX9riNhRw85KWNfP',
                    //publishable_api_key: "{{ env('MOYASAR_PUBLISHABLE_KEY') }}",
                    callback_url: "{{route('payment.callback',['order'=>$order_details->id,'institution_id'=>$institution_id])}}",
                    methods: ['creditcard'],
                })
        </script>

</form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
