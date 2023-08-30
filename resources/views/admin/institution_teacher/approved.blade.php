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

                        <li class="breadcrumb-item active">Approved</li>

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
                                      
                                        <a class='btn btn-info' href='{{Route("institution_teacher_approved")}}' id='search_btn'>Search</a>
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
            @include("admin.institution_teacher.approved-pagination",['data'=>$data,'institution_details'=>$institution_details])
          </div>


    </div>


      </section>
     
    </div>

@endsection

