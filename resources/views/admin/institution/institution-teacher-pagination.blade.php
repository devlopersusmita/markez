

@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Institution Name</th>
                <th>Teacher Name</th>
                <th>Status</th>

            </tr>
        </thead>
        <tbody>

            @foreach($institution_teachers as $institution_teacher)
            <tr >
                  <td>{{$institution_teacher['institution_name']}}  </td>
                   <td>{{$institution_teacher['teacher_name']}} </td>



                <td>
@if ($institution_teacher['status'] === 'approve')
                                <button class="btn btn-success" disabled>Approved</button>

                        <form action="{{route('admin.teacherdecline', $institution_teacher['id'])}}" method="POST">
                                @csrf
                                <button class="btn btn-danger">Reject</button>
                        </form>
 @elseif ($institution_teacher['status'] === 'reject')
                    <form action="{{route('admin.teacherapprove', $institution_teacher['id'])}}" method="POST">
                                        @csrf
                            <!-- Form fields and submit button -->
                            <button class="btn btn-success" >Approve</button>
                </form>
                        <button class="btn btn-danger" disabled>Rejected</button>
@else
            <form action="{{route('admin.teacherapprove', $institution_teacher['id'])}}" method="POST">
                                    @csrf
                        <!-- Form fields and submit button -->
                        <button class="btn btn-success" >Approve</button>
            </form>

            <form action="{{route('admin.teacherdecline', $institution_teacher['id'])}}" method="POST">
                    @csrf
                    <button class="btn btn-danger" >Reject</button>
            </form>
@endif
                </td>








            </tr>

           @endforeach

                        @if ($institution_teachers->count() == 0)

                <tr>
                <td colspan="3">
                    No Record Found!!
                </td>
                </tr>

                @endif
        </tbody>
    </table>


<div id="pagination">
    {{ $institution_teachers->links() }}
  </div>


</div>

</div>




