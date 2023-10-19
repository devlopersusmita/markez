@extends('theme.institution.default')
@section('content')
<div class="app-main">
<?php
 if($order_details->status !='Paid')
 {
    ?>
<link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.7.3/moyasar.css">

    <!-- Moyasar Scripts -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
    <script src="https://cdn.moyasar.com/mpf/1.7.3/moyasar.js"></script>
     <?php

     }
     ?>
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Institution Subscription</h2>

    </div>

    <div class="table-responsive category-table">
     <!-- tab start --->
     <div id="shop-page" class="shop-wrapper">

@if(session()->has('message'))
    <div class="box-heading margin_top_10 margin_bottom_10">
        <h4>{{ session()->get('message') }}</h4>

    </div>
@endif
@if(session()->has('success'))
    <div class="box-heading margin_top_10 margin_bottom_10">
        <h4>{{ session()->get('success') }}</h4>

    </div>
@endif
@if(session()->has('error'))
    <div class="box-heading margin_top_10 margin_bottom_10">
        <h4>{{ session()->get('error') }}</h4>

    </div>
@endif



<div class="store-sections">
    <div class="container">

   <!-- {{$order_details}}
    {{$institution_subscription_package}}  -->

        <p>{{$institution_subscription_package->title}}</p>

        <p>Days : {{$institution_subscription_package->days}}</p>
        <p>Price : {{$institution_subscription_package->price}}SAR</p>
        <?php /* ?>
         <form action="{{Route('coursesubscriptionpay')}}" method="POST"   enctype="multipart/form-data" >
           <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="id" value="{{$id}}" />


             <?php
             if($data_exist >0)
             {
                ?>
                 <div class="button is-solid green-button"  >
                    Subscribed
                </div>
                <?php

             }
             else
             {
                ?>
                <button type="submit" class="button is-solid accent-button" name="Pay Confirm" >Pay Confirm</button>
                <?php
             }
             ?>

         </form>
         <?php */ ?>

         <?php
         if($order_details->status !='Paid')
         {
            ?>

    <input type="hidden" value="{{$user_id}}" name="institution_id">
    <input type="hidden" value="{{$user_ids}}" name="user_id">
            <div class="mysr-form"></div>
            <?php

         }
         ?>


    </div>
</div>
</div>

<!--tab end --->
    </div>
    <?php
 if($order_details->status !='Paid')
 {

    ?>
 <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
    <script src="https://cdn.moyasar.com/mpf/1.7.3/moyasar.js"></script>
<script>

    var baseurl ="{{url('/')}}";

    var total = "{{$order_details->total}}";

    var title = "{{$institution_subscription_package->title}}";

    var institution_subscription_package_id = "{{$institution_subscription_package->id}}";

    total = parseFloat(total);

    total = total * 100 ;


    Moyasar.init({
        // Required
        // Specify where to render the form
        // Can be a valid CSS selector and a reference to a DOM element
        element: '.mysr-form',

        // Required
        // Amount in the smallest currency unit
        // For example:
        // 10 SAR = 10 * 100 Halalas
        // 10 KWD = 10 * 1000 Fils
        // 10 JPY = 10 JPY (Japanese Yen does not have fractions)
        amount: total,

        // Required
        // Currency of the payment transation
        currency: 'SAR',

        // Required
        // A small description of the current payment process
        description: title+' #Institution subscription package ID : '+institution_subscription_package_id,

        // Required
        //publishable_api_key: 'pk_test_jW7KSk9zJtgn4Nu7TuQHjn4tCX9riNhRw85KWNfP',
        publishable_api_key: 'pk_test_jW7KSk9zJtgn4Nu7TuQHjn4tCX9riNhRw85KWNfP',



        // Required
        // This URL is used to redirect the user when payment process has completed
        // Payment can be either a success or a failure, which you need to verify on you system (We will show this in a couple of lines)
        //callback_url: baseurl+'/orders',
        callback_url: "{{route('payment.callback',['order'=>$order_details->id,'institution_id' => $_GET['institution_id'],'user_id'=>$_GET['user_id']])}}",



        // Optional
        // Required payments methods
        // Default: ['creditcard', 'applepay', 'stcpay']
        methods: [
            'creditcard',
        ],
    });
</script>
 <?php

 }
 ?>
    @endsection






