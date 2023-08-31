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
                   <div class="buttons">

                            <form method="POST" action="{{ route('submitrequest') }}">
                            @csrf
                            @include('frontend.notification')
                            <input type="hidden" value="{{$user_id}}" name="user_id">
                                                    <input type="hidden" value="{{$institution_id}}" name="institution_id">

                                    <button type="submit" class="button is-solid primary-button raised">Submit a Request</button>

                            </form>
                   </div>

                </div>
            </div>
        </div>

   </div>
        </div>























    </div>


@endsection



