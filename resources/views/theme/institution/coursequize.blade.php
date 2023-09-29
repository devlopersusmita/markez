@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Quiz</h2>

    </div>

    <div class="table-responsive category-table">
      <table class="table course-table">
        <thead>
        <th>Title</th>
                <th>Slug</th>

                <th>Start Date</th>
                <th>End Date</th>


                <th>Actions</th>
        </thead>
        <tbody>

        @foreach($quizes as $quize)



          <tr>
            <td style="padding: 0px 5px;">

            <input type="hidden" value="{{$user_id}}" name="user_id">
                <input type="hidden" value="{{$user_ids}}" name="user_ids">
                    <a href="{{Route('institutioncoursecontentquizequestion',['id'=>$quize['course_id'],'content_id'=>$quize['course_content_id'],'quiz_id'=>$quize['id'],'institution_id'=>$user_id,'user_id'=>$user_ids])}}" class="button is-solid blue-button raised"   style="cursor: pointer;" >Question</a>
                    </td>

                    <td style="padding: 0px 5px;">
                        <span   class="view_modal_quize"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $quize['id']?>" ><i class="fa fa-eye" style="font-size:18px"></span>
                    </td>



          </tr>
          @endforeach


        </tbody>
      </table>
    </div>

    @endsection


 <!-- Modal to view  Quiz starts-->
 <div id="modals-view"  class="modal change-cover-modal is-medium has-light-bg">
    <div class="modal-background" ></div>
     <div class="modal-content">
     <div class="card">
         <div class="card-heading">
             <h3>Quiz Details</h3>
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
     <!-- Modal to view  Quiz Ends-->



