@extends('theme.student.default')

@section('content')

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
                         @include('theme.student.sidebar')
                         <div class="right-content">
                            <div class="groups-grid padding_0">

                                <div class="grid-header">
                                    <div class="header-inner">
                                        <h2>Course Subscription</h2>
                                        <div class="header-actions">

                                        </div>
                                    </div>
                                </div>
                            </div>


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
                                    {{$course}}  -->                                
                                       
                                        <p>{{$course->title}}</p>
                                        <p>{{$category_name}}</p>
                                        <p>{!!$course->description!!}</p>
                                        <p>Price : {{$course->price}}{{env('CURRENCY')}}</p>
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
                                            <div class="mysr-form"></div>
                                            <?php 

                                         }
                                         ?>

                                         
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

    var title = "{{$course->title}}";

    var course_id = "{{$course->id}}";

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
        description: title+' #Course ID : '+course_id,

        // Required
        //publishable_api_key: 'pk_test_jW7KSk9zJtgn4Nu7TuQHjn4tCX9riNhRw85KWNfP',
        publishable_api_key: "{{ env('MOYASAR_PUBLISHABLE_KEY') }}",

        

        // Required
        // This URL is used to redirect the user when payment process has completed
        // Payment can be either a success or a failure, which you need to verify on you system (We will show this in a couple of lines)
        //callback_url: baseurl+'/orders',
        callback_url: "{{route('payment.callback',['order'=>$order_details->id])}}",

       

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
