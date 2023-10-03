@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Question</h2>

    </div>

    <div class="table-responsive category-table">
      <table class="table course-table">
        <thead>
        <th>Question Text</th>
                <th>Answer</th>
                <th>Marks</th>

                <th>Actions</th>
        </thead>
        <tbody>

        @foreach($questions as $question)



          <tr>
          <td>{!!$question['question_text']!!} </td>
                <td>{{$question['answer']}}  </td>
                <td>{{$question['marks']}}  </td>



                <td>
                    <div class="ui-elements">
                       <div class="buttons">
                    <table>
                             <tr>


                                    <td style="padding: 0px 5px;">
                                        <span   class="view_modal_question"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $question['id']?>" ><i class="fa fa-eye" style="font-size:18px"></i></span>
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


  <!-- Modal to view  Question starts-->
  <div id="modals-view"  class="modal change-cover-modal is-medium has-light-bg">
    <div class="modal-background" ></div>
     <div class="modal-content">
     <div class="card">
         <div class="card-heading">
             <h3>Question Details</h3>
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
     <!-- Modal to view  Question Ends-->



