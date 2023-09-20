@if($institution_teacher_requests->count()==0)
    <div class="review_filter">
        <h3>No Data Found</h3>
      </div>
@include('frontend.notification')


@else
<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Institution Name</th>
                <th>Student Name</th>
                <th>Status</th>

            </tr>
        </thead>
        <tbody>

            @foreach($institution_teacher_requests as $institution_teacher_request)
            <tr >
                  <td>{{$institution_teacher_request['institution_name']}}  </td>
                   <td>{{$institution_teacher_request['student_name']}} </td>



                <td>
@if ($institution_teacher_request['status'] === 'approve')
                                <button class="btn btn-success" disabled>Approved</button>

                        <form action="{{route('admin.decline', $institution_teacher_request['id'])}}" method="POST">
                                @csrf
                                <button class="btn btn-danger">Reject</button>
                        </form>
 @elseif ($institution_teacher_request['status'] === 'reject')
                    <form action="{{route('admin.approve', $institution_teacher_request['id'])}}" method="POST">
                                        @csrf
                            <!-- Form fields and submit button -->
                            <button class="btn btn-success" >Approve</button>
                </form>
                        <button class="btn btn-danger" disabled>Rejected</button>
@else
            <form action="{{route('admin.approve', $institution_teacher_request['id'])}}" method="POST">
                                    @csrf
                        <!-- Form fields and submit button -->
                        <button class="btn btn-success" >Approve</button>
            </form>

            <form action="{{route('admin.decline', $institution_teacher_request['id'])}}" method="POST">
                    @csrf
                    <button class="btn btn-danger" >Reject</button>
            </form>
@endif
                </td>








            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
    {{ $institution_teacher_requests->links() }}
  </div>


</div>

</div>
    @endif



