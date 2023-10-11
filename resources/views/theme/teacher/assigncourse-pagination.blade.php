@if(!empty($course_teachers))
@include('frontend.notification')



<div class="card">
<div class="card-body  table-responsive">


    <table  width="100%" class="table table-border table-striped">

        <thead>
            <tr>
            <th>Teacher Name</th>
                <th>Course Name</th>

                <th>Status</th>
            </tr>
        </thead>
        <tbody>

            @foreach($course_teachers as $course_teacher)


            <tr>
            <td>{{$course_teacher['name']}} </td>
            <td>{{$course_teacher['title']}}  </td>





                        <td> {{$course_teacher['status']}}


                        </td>
                        <td>
@if ($course_teacher['status'] === 'approve')
                                <button class="button is-solid green-button raised"  style="cursor: pointer;" disabled>Approved</button>

                        <form class="reject_form" action="{{route('courseassigndecline', $course_teacher['id'])}}" method="POST">
                                @csrf
                                <button class="button is-solid red-button raised" style="cursor: pointer;">Reject</button>
                        </form>
 @elseif ($course_teacher['status'] === 'reject')
                    <form action="{{route('courseassignapprove', $course_teacher['id'])}}" method="POST">
                                        @csrf
                            <!-- Form fields and submit button -->
                            <button class="button is-solid green-button raised"  style="cursor: pointer;" >Approve</button>
                </form>
                        <button class="button is-solid red-button raised" style="cursor: pointer;" disabled>Rejected</button>
@else
            <form action="{{route('courseassignapprove', $course_teacher['id'])}}" method="POST">
                                    @csrf
                        <!-- Form fields and submit button -->
                        <button class="button is-solid green-button raised"  style="cursor: pointer;">Approve</button>
            </form>

            <form class="reject_form" action="{{route('courseassigndecline', $course_teacher['id'])}}" method="POST">
                    @csrf
                    <button class="button is-solid red-button raised" style="cursor: pointer;" >Reject</button>
            </form>
@endif
                </td>








            </tr>

           @endforeach
        </tbody>
    </table>

<div id="pagination">
    {{ $course_teachers->links() }}
  </div>


</div>

</div>
    @endif



