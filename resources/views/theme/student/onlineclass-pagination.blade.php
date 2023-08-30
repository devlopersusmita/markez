@if(!empty($online_classes))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">
                                        <thead>
                                        <tr class="alert-success">

                                            {{-- <th>Course</th>
                                            <th>Teacher</th> --}}
                                           <th>Topic</th>
                                           <th>Start At</th>
                                           <th>Duration (Minutes)</th>
                                           <th>Join</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_classes as $online_classe)
                                            <tr>

                                            {{-- <td>{{$online_classe['course_name']}}</td>
                                            <td>{{$online_classe['teacher_name']}}</td> --}}

                                                <td>{{$online_classe['topic']}}</td>
                                                <td>{{$online_classe['start_at']}}</td>
                                                <td>{{$online_classe['duration']}}</td>

                                               <td>
                                                <?php
                                                $current_date_time = date('Y-m-d H:i:s');                                                
                                                $A = strtotime($current_date_time);
                                                $B = strtotime($online_classe['start_at']);
                                                $P = 60*$student_online_class_before_minute;
                                                $X = 60*$online_classe['duration'];

                                                    if((($B-$P) < $A) && ($A < ($B+$X))){
                                                        ?>
                                                        <a  class="button is-solid blue-button raised" href="{{$online_classe['join_url']}}" target="_blank">Join</a>
                                                        <?php
                                                    }
                                                    ?>
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



