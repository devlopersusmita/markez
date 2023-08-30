@extends('admin.master')

@section('contents')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="content-header">

            <div class="container">

                <div class="row mt-4">

                    <div class="col-md-6">

                        <h3 class="">Order</h3>

                    </div><!-- /.col -->

                    <div class="col-md-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                            <li class="breadcrumb-item active">Order</li>

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
                            <div class="col-md-6">
                                <h6>Search By</h6>
                            </div>
                            {{-- <div class="col-md-6 "><a  class="btn btn-primary float-right add_modal" data-toggle="modal" data-target="#modals-add" style="cursor: pointer;"><i class="fa fa-plus"></i> New Category</a></div> --}}


                            <div class="col-md-12">

                                <form id="searchform" name="searchform" >
                                    <div class="row mt-4">

                                        <div class="col-md-4"></div>
                                        <div class="col-md-8" style="float: right;">


                                            <div class="input-group mb-3">



                                                <select class="form-control select_2 mr-3" name="course_id" id="course_id"
                                                    style="width:10rem;">
                                                    <option value="">Select Course</option>
                                                    @if ($courses)
                                                        @foreach ($courses as $course)
                                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                <select class="form-control select_2 mr-3" name="status"
                                                    style="width:10rem;">

                                                    <option value="">Order Status</option>
                                                    <option value="Paid">Paid</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Processing">Processing</option>
                                                    <option value="Shipped">Shipped</option>
                                                    <option value="Completed"> Completed</option>

                                                </select>

                                                <div class="input-group-append">
                                                    <a class='btn btn-info' href='{{ Route('order') }}'
                                                        id='search_btn'>Search</a>
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
                    @include('admin.order.order-pagination', ['orders' => $orders, 'courses' => $courses])
                </div>


            </div>


        </section>

    </div>

@endsection



<!-- Modal to view  payment starts-->
<div class="modal fade" id="modals-view" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="add-new-match modal-content pt-0" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title">Payment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-1" id="details_modal_body_content">

                </div>


                <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>
<!-- Modal to view  Payment Ends-->
