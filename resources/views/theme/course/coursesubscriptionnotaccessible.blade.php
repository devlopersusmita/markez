@extends('theme.student.default')

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

                              

                                <div class="store-sections">
                                    <div class="container">

                                        

                                      <h3>Course Subscription Not Accessible for You ! Please contact with the Adminstrator</h3>


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


@endsection
