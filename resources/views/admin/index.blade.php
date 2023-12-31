@extends('admin.master')



@section('contents')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 class="m-0">Dashboard</h1>

                </div><!-- /.col -->

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Dashboard v1</li>

                    </ol>

                </div><!-- /.col -->

            </div><!-- /.row -->

        </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->



    <!-- Main content -->

    <section class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 col-12">
                     @include('frontend.notification')
                 </div>
             </div>

            <!-- Small boxes (Stat box) -->
<!--total student  -->
            <div class="row">

                <div class="col-lg-3 col-6">

                    <!-- small box -->

                    <div class="small-box bg-info">

                        <div class="inner">

                            <h3>{{\App\Models\User::where('role',1)->count()}}</h3>

                            <p>Students</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-bag"></i>

                        </div>

                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>


                    </div>

                </div>

                <!-- tatal teacher -->

                <div class="col-lg-3 col-6">

                    <!-- small box -->

                    <div class="small-box bg-info">

                        <div class="inner">

                            <h3>{{\App\Models\User::where('role',2)->count()}}</h3>

                            <p>Teachers</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-bag"></i>

                        </div>

                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>


                    </div>








                </div>
                <!-- end student -->


                  <!--total institution -->

                <div class="col-lg-3 col-6">

                    <!-- small box -->

                    <div class="small-box bg-info">

                        <div class="inner">

                            <h3>{{\App\Models\User::where('role',3)->count()}}</h3>

                            <p>Institutions</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-bag"></i>

                        </div>

                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>


                    </div>

                </div>

            <!-- end institution -->

             <!--total payment -->

            <div class="col-lg-3 col-6">

                <!-- small box -->

                <div class="small-box bg-info">

                    <div class="inner">

                        <h3>{{\App\Models\Payment::orderBy('id','asc')->get()->sum('amount')}}</h3>

                        <p>Payments</p>

                    </div>

                    <div class="icon">

                        <i class="ion ion-bag"></i>

                    </div>

                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>


                </div>

            </div>

            <!-- end payment -->

            <!-- total visitors -->

                <div class="col-lg-3 col-6">

                    <!-- small box -->

                    <div class="small-box bg-info">

                        <div class="inner">

                            <h3>{{\App\Models\UserVisitor::get()->count()}}</h3>

                            <p>Visitors</p>

                        </div>

                        <div class="icon">

                            <i class="ion ion-bag"></i>

                        </div>

                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>


                    </div>

                </div>

            <!-- end visitors -->

            </div>

            <!-- end student -->

            <!-- /.row -->

        </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

</div>



@endsection
