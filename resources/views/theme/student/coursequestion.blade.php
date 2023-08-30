@extends('theme.student.default')

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
                         @include('theme.student.sidebar')
                         <div class="right-content">
                            <div class="groups-grid padding_0">

                                <div class="grid-header">
                                    <div class="header-inner">
                                        <h2>Quiz Player</h2>
                                        
                                    </div>

                                    <div class="header-inner padding_top_10">


                                        <div class="header-actions">


                                    <div class="field is-grouped">
                                        <div class="control" >
                                            <a href="{{route('studentcourse')}}"><h1>{{$course_details->title}}</h1></a>
                                        </div>
                                        <div class="control" >
                                            <a href='{{Route("studentcoursecontent",["id"=>$course_id])}}'><h1>>> {{$course_content_details->title}}</h1></a>
                                        </div>
                                        <div class="control" >
                                            <a href= '{{Route('studentcoursecontentquize',["id"=>$course_id,"content_id"=>$course_content_details->id])}}'><h1>>> {{$course_content_quiz_details->title}}</h1></a>
                                        </div>
                                    </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                            
                            @include('frontend.notification')
                             
                             <?php 
                             //echo "<pre>";
                             //print_r($questions);
                             //echo "</pre>";

                             //echo count($questions);

                             if(null!==$questions)
                             {
                                ?>

                                <div class="quiz_outer_div">
                                <?php 
                                $qno = 0;
                                foreach($questions as $key=>$question)
                                {
                                    $qno++;
                                  
                                   // echo $question['question_text'];
                                    ?>
                                    <form name="save_quiz_response" id="save_quiz_response" method="post" action="{{url('save_quiz_response')}}">
                                        <input type="hidden" name="course_content_quiz_id" value="{{$course_content_quiz_id}}" />

                                         <input type="hidden" name="course_id" value="{{$course_id}}" />
                                         <input type="hidden" name="course_content_id" value="{{$course_content_id}}" />
                                        
                                    @csrf
                                    <div class="quiz_question_inner_div">

                                        
                                        <div class="quiz_question_question_text">

                                          <label for=""><?php echo '<strong>'.$qno.'.</strong> '.strip_tags($question['question_text']);?> (Marks <?php echo $question['marks'];?>)</label>

                                        </div>
                                         <div class="quiz_question_option">

                                         <strong>A </strong><input type="radio" name="option_<?php echo $question['id'];?>" id="a_<?php echo $question['id'];?>" value="a"> <label for="a_<?php echo $question['id'];?>"><?php echo strip_tags($question['option_a']);?></label>

                                        </div>
                                        <div class="quiz_question_option">

                                            <strong>B </strong><input type="radio" name="option_<?php echo $question['id'];?>" id="b_<?php echo $question['id'];?>" value="b"> <label for="b_<?php echo $question['id'];?>"><?php echo strip_tags($question['option_b']);?></label>

                                        </div>
                                        <div class="quiz_question_option">

                                           <strong>C </strong><input type="radio" name="option_<?php echo $question['id'];?>" id="c_<?php echo $question['id'];?>" value="c"> <label for="c_<?php echo $question['id'];?>"><?php echo strip_tags($question['option_c']);?></label>

                                        </div>
                                        <div class="quiz_question_option">

                                           <strong>D </strong><input type="radio" name="option_<?php echo $question['id'];?>" id="d_<?php echo $question['id'];?>" value="d"> <label for="d_<?php echo $question['id'];?>"><?php echo strip_tags($question['option_d']);?></label>

                                        </div>

                                        
                                         <div class="quiz_question_bottom_part">

                                          <div class="button is-solid red-button " onClick="nottoanswer(<?php echo $question['id'];?>);">Not to answer</div>

                                          <?php if(count($questions)==$qno)
                                          {
                                            ?>
                                            <button type="submit" class="button is-solid green-button " >Submit</button>
                                            <?php 
                                          }
                                          ?>
                                          



                                        </div>

                                    </div>

                                    <?php 
                                }
                                ?>
                                 </div>
                             </form>
                                 <?php 
                             }

                             ?>





                         </div>

                     </div>
                 </div>
             </div>

            </div>
                 </div>








  <!-- Modal to view  Quiz starts-->
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
     <!-- Modal to view  Quiz Ends-->







    </div>

<script type="text/javascript">
    function nottoanswer(id)
    {
       
        if(document.getElementById('a_'+id).checked)
        {
            document.getElementById('a_'+id).checked = false;
        }
        else  if(document.getElementById('b_'+id).checked)
        {
            document.getElementById('b_'+id).checked = false;
        }
        else  if(document.getElementById('c_'+id).checked)
        {
            document.getElementById('c_'+id).checked = false;
        }
        else  if(document.getElementById('d_'+id).checked)
        {
            document.getElementById('d_'+id).checked = false;
        }
    }
    function save_quiz_response()
    {
        alert('start');
        document.getElementById('save_quiz_response').submit();
        alert('finish');
    }
</script>
@endsection
