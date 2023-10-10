@if(!empty($online_classes))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped tableid1">
                                        <thead>
                                        <tr class="alert-success">

                                           <th>Topic</th>
                                           <th>Start At</th>
                                           <th>Duration (Minutes)</th>
                                           <th>Attendance</th>
                                           <th>Start</th>
                                           <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_classes as $online_classe)
                                            <tr>



                                                <td>
                                                <?php
                                                  $current_date_time = date('Y-m-d H:i:s');
                                                   $A = strtotime($current_date_time);
                                                    $B = strtotime($online_classe['start_at']);
                                                ?>
                                            {{$online_classe['topic']}}</td>
                                                <td>{{$online_classe['start_at']}}</td>
                                                <td>{{$online_classe['duration']}}</td>
                                                <td>{{$online_classe['total_attendance']}} / {{$total_subscription}}

                                                    <?php
                                                    if($A >= $B)
                                                    {
                                                        ?>

                                                         <a  class="button is-solid primary-button raised"  href='{{Route("teacheronlineattendance",["id"=>$course_id,"content_id"=>$course_content_id,"online_class_id"=>$online_classe["id"]])}}' >Go</a>
                                                        <?php

                                                    }
                                                    ?>

                                                </td>
                                                <td class="text-danger">
                                                <?php

                                                    $P = 60*$teacher_online_class_before_minute;
                                                    dd($P);
                                                    $X = 60*$online_classe['duration'];
                                                    //dd($X);

                                                 if((($B-$P) < $A) && ($A < ($B+$X))){
                                                     ?>
                                                    <a  class="button is-solid blue-button raised" href="{{$online_classe['start_url']}}" target="_blank">Start</a>
                                                    <?php
                                                }
                                                 ?>
                                                 </td>
                                                <td>


                                                     <span   class="button is-solid red-button raised zoom_meeting_delete" data-toggle="modal" data-target="#modals-meeting-delete" style="cursor: pointer;"data-id="{{$online_classe['meeting_id']}}" >Delete</span>

                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                    </table>
                       </div>
                   </div>




<div id="pagination">

    {{ $online_classes->links() }}
  </div>


</div>

</div>
    @endif



