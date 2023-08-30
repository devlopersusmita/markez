@extends('admin.master')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container">
            
            <div class="row mt-4">

                <div class="col-md-6">

                    <h3 class="">Institution Teacher</h3>

                </div><!-- /.col -->

                <div class="col-md-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Need Approval</li>

                    </ol>

                </div><!-- /.col -->

            </div><!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                 <div class="card-body">

             <div class="row">
                <div class="col-md-6"><h6>Search By</h6></div>
               


                <div class="col-md-12">
                
               <form id="searchform" name="searchform">
                   <div class="row mt-4">
                  
                        <div class="col-md-8"></div>
                        <div class="col-md-4" style="float: right;">
                            
                                             
                               <div class="input-group mb-3">
                                      <select name="institution_id"  class="form-control select2" >
                                         <option value="">Select Institution</option>
                                        @if(!empty($data))
                                         @foreach($institution_details as $institution)
                                         <option value="{{$institution->id}}">{{$institution->name}}</option>
                                         @endforeach
                                         @endif
                                      
                                      </select>
                                      <div class="input-group-append">
                                      
                                        <a class='btn btn-info' href='{{Route("institution_teacher_need_approval")}}' id='search_btn'>Search</a>
                                      </div>
                                    </div>


                         </div>
                      

               


                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
         <div id="pagination_data">
            @include("admin.institution_teacher.need_approval-pagination",['data'=>$data,'institution_details'=>$institution_details])
          </div>


    </div>


      </section>
     
    </div>

@endsection


<!-- Modal to approve request start-->
    <div class="modal fade" id="modals-approve" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header">
            <h5 class="modal-title" >Approval of Institution Teacher Request</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            
            <div class="alert" role="alert">
                 <p>Are you sure?</p>
              <h6 class="alert-heading">Warning!</h6>
              <div class="alert-body">
                Do you really want to change this request to Approved  </span>
              </div>
            </div>

         
            
              <div class="col-sm-12 ps-sm-0">
                <input type="hidden" id="approve_request_details_id" value="" />
                
                <button type="submit" id="request_approve" class="btn btn-success data-delete">Confirm</button>
                <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
                 <div style="float:right;display:none;" id="approve_loading_approval"><img src="{{asset('frontend/images/loadingpleasewait.gif')}}" width="40" /></div>
              </div>
             
           
          </div>
        </div>
      </div>
    </div>
    <!--Modal to approve requestEnds-->


<!-- Modal to reject request start-->
    <div class="modal fade" id="modals-reject" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header">
            <h5 class="modal-title" >Approval of Institution Teacher Request</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">
            
            <div class="alert" role="alert">
                 <p>Are you sure?</p>
              <h6 class="alert-heading">Warning!</h6>
              <div class="alert-body">
                Do you really want to change this request to Reject  </span>
              </div>
            </div>

         
            
              <div class="col-sm-12 ps-sm-0">
                <input type="hidden" id="reject_request_details_id" value="" />
                
                <button type="submit" id="request_reject" class="btn btn-danger data-delete">Confirm</button>
                <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
                 <div style="float:right;display:none;" id="reject_loading_approval"><img src="{{asset('frontend/images/loadingpleasewait.gif')}}" width="40" /></div>
              </div>
             
           
          </div>
        </div>
      </div>
    </div>
    <!--Modal to approve requestEnds-->