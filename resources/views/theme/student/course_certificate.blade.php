@extends('theme.student.default')


@section('content')


 <div class="view-wrapper">

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
                                <h2>Certificate</h2>
                                <div class="header-actions">

                                </div>
                            </div>
                        </div>
                        @include("theme.student.course_certificate_pdf",['course_id'=>$course_id,'purpose'=>'view'])
                        <a href="{{ route('studentcoursecertificate',['id'=>$course_id,'download'=>'pdf']) }}">Download PDF</a>
                    </div>
            </div>


        </div>
    </div>

   </div>
        </div>























    </div>


@endsection



