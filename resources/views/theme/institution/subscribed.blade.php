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
                                        <h2>Subscribed


                                        </h2>
                                        <div class="header-actions">

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-body  table-responsive">

                            <table  width="100%" class="table table-border table-striped">

                                <thead>
                                    <tr>
                                        <th>Days</th>
                                        <th>Month</th>
                                        <th>Extended Date</th>
                                        <th>Price</th>
                                        <th>Created Date</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($institutionsubscription_details as $institutionsubscription_detail)
                                    <tr>
                                        <td>{{$institutionsubscription_detail->days}}</td>
                                        <td>{{$institutionsubscription_detail->title}}</td>
                                        <td>{{date('d-m-Y',strtotime($institutionsubscription_detail->end_date))}}</td>
                                        <td>{{$institutionsubscription_detail->price}} {{env('CURRENCY')}}</td>
                                        <td>{{date('d-m-Y',strtotime($institutionsubscription_detail->created_at))}}</td>


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

      <!-- Modal to delete Course start-->

      <div  id="modals-delete" class="modal share-modal is-xsmall has-light-bg">
        <div class="modal-background"></div>
              <div class="modal-content">

                  <div class="card">
                      <div class="card-heading">
                          <div class="dropdown is-primary share-dropdown">
                              <div>

                              <h3 style="text-align:center;">Delete Subscription</h3>

                              </div>

                          </div>

                          <!-- Close X button -->
                          <div class="close-wrap">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                  </button>
              </div>
                      </div>

                      <div class="card-body">

                          <div class="shared-publication">
                              <div class="featured-image">
                                <div class="alert" role="alert">
                                       <p style="text-align:center;">Are you sure?</p>
                                        <h6  style="text-align:center;" class="alert-heading">Warning!</h6>
                                      <div class="alert-body">
                                      Do you really want to delete this record? This process cannot be undone
                                      </div>
                                 </div>

                              </div>


                          </div>
                      </div>
                      <div class="card-footer">


                          <div class="button-wrap">

                              <input type="hidden" id="delete_id" value="" />
                              <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                              <button  type="submit" id="order_delete" class="button is-solid primary-button data-delete">Delete</button>

                          </div>
                      </div>
                  </div>

              </div>
       </div>

          <!-- Modal to delete Course Ends-->
