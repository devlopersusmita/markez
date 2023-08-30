@extends('theme.institution.default')

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
                         @include('theme.institution.sidebar')
                         <div class="right-content">
                            <div class="groups-grid padding_0">

                                <div class="grid-header">
                                    <div class="header-inner">
                                        <h2>Subscription


                                        </h2>
                                        <div class="header-actions">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Subscription End Date : {{$end_date}}</p>
                            <div class="text-center"><p>Extend Subscription Upto : </p></div>
                            <div class="card">
                                <div class="card-body  table-responsive">

                            <table  width="100%" class="table table-border table-striped">

                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Day</th>
                                        <th>Price</th>

                                       <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($institutionsubscriptionpackages as $institutionsubscriptionpackage)
                                    <tr>
                                        <td>{{$institutionsubscriptionpackage->title}}</td>
                                        <td>{{$institutionsubscriptionpackage->days}}</td>
                                        <td>{{$institutionsubscriptionpackage->price}} {{env('CURRENCY')}}</td>
                                        <td><a href='{{Route("institutionsubscription",["id"=>$institutionsubscriptionpackage['id']])}}' class="button is-solid green-button raised" data-toggle="modal"   style="cursor: pointer;">Pay</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
