@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Course Contents</h2>

    </div>

    <div class="table-responsive category-table">
      <table class="table course-table">
        <thead>
        <th>Title</th>
                <th>Slug</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>End Date</th>


                <th>Actions</th>
        </thead>
        <tbody>

        @foreach($coursecontents as $course)
            <tr >
                <td>{{$course['title']}}  </td>
                <td>{{$course['slug']}}  </td>
                <td>{{$course['type']}}  </td>
                <td>{{$course['start_date']}}  </td>
                <td>{{$course['end_date']}}  </td>


                <td>
                    <div class="ui-elements">
                       <div class="buttons">
                    <table>
                             <tr>
                                @if($course['type']=='zoom')
                                <td style="padding: 0px 5px;">
                                <input type="text" value="{{$user_id}}" name="institution_id">
                                     <a href="{{Route('institutioncourseonline_classes',['id'=>$course['course_id'],'content_id'=>$course['id'],'user_id'=>$user_id])}}"  class="button is-solid green-button raised"   style="cursor: pointer;"  >Online Class</a>
                                 </td>
                                 @endif
                                 @if($course['type']=='quiz')

                                <td style="padding: 0px 5px;">


                                    <a href="{{Route('institutioncoursecontentquize',['id'=>$course['course_id'],'content_id'=>$course['id'],'user_id'=>$user_id])}}" class="button is-solid blue-button raised"   style="cursor: pointer;" >Quiz</a>



                                </td>

@endif
                                    <td style="padding: 0px 5px;">
                                        <span   class="button is-solid blue-button raised coursecontentview_modal"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $course['id']?>" >View</span>
                                    </td>
                             </tr>
                     </table>
                       </div>
                   </div>


               </td>



            </tr>

           @endforeach
        </tbody>
      </table>
    </div>

    @endsection
 <!-- Modal to view  Course starts-->
 <div id="modals-view"  class="modal change-cover-modal is-medium has-light-bg">
    <div class="modal-background" ></div>
     <div class="modal-content">
     <div class="card">
         <div class="card-heading">
             <h3>Course Content  Details</h3>
             <!-- Close X button -->
             <div class="close-wrap">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
             </button>
         </div>

         </div>
         <div class="card-body">
             <form class="add-new-match modal-content  pt-0"   enctype="multipart/form-data" >
                 <div class="login-form">
                 <div class="modal-header">


     </div>
     <div class="modal-body" >
       <div class="mb-1" id="details_modal_body_content">

       </div>


       <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
     </div>















                 </div>
             </form>
         </div>
     </div>





    </div>
 </div>
     <!-- Modal to view new Course Ends-->

       <!-- Modal to status change Course starts-->

  <div  id="modals-statuschangecoursecontent" class="modal share-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
       <div class="modal-content">

           <div class="card">
               <div class="card-heading">
                   <div class="dropdown is-primary share-dropdown">
                       <div style="text-align: center;">

                              <h3>Course Content Status Change</h3>

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
                                   Do you really want to change this status as <span class="alert " id="coursecontent_status_span"> </span>
                               </div>
                          </div>

                       </div>


                   </div>
               </div>
               <div class="card-footer">


                   <div class="button-wrap">
                       <input type="hidden" id="coursecontentstatuschange_id" value="" />
                       <input type="hidden" id="coursecontentstatuschange_status" value="" />
                       <button data-dismiss="modal" aria-label="Close" class="button is-solid dark-grey-button close-modal">Cancel</button>
                       <button type="submit" id="coursecontent_statuschange" class="button is-solid primary-button data-delete">Save</button>

                   </div>
               </div>
           </div>

       </div>
</div>

  <!-- Modal to status change Course Ends-->




