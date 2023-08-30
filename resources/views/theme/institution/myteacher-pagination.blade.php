@if(!empty($my_teachers))
@include('frontend.notification')






<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>

            </tr>
        </thead>
        <tbody>

            @foreach($my_teachers as $my_teacher)
            <tr >
                  <td>{{$my_teacher['name']}}  </td>
                  <td>{{$my_teacher['email']}}  </td>
            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
    {{ $my_teachers->links() }}
  </div>


</div>

</div>

    @endif



