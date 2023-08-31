@extends('theme.teacher.default')

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
                         @include('theme.teacher.sidebar')
                         <div class="right-content">
                            <div class="groups-grid padding_0">

                                <div class="grid-header">
                                    <div class="header-inner">
                                        <h2>Course</h2>
                                        <div class="header-actions">

                                        </div>
                                    </div>
                                     <div class="header-inner padding_top_10">
                                        <h2>&nbsp;</h2>

                                        <div class="header-actions">

                                        <form id="searchform" name="searchform" >
                                    <div class="field is-grouped">
                                        <div class="control" >
                                            <input type="text" name="title" class="input" placeholder="Title" />
                                        </div>
                                        <div class="control" >
                                            <a class="button is-solid primary-button raised"  href='{{Route("teachercourse")}}' id='search_btn'>Search</a>
                                        </div>
                                    </div>
                                   </form>

                                        </div>

                                    </div>

                                </div>
                            </div>
                             <div id="overview-content" class="content-section is-active">

                                <div id="pagination_data">
                                    @include("theme.teacher.course-pagination",['courses'=>$courses])
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
