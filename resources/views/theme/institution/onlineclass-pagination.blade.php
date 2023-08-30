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



