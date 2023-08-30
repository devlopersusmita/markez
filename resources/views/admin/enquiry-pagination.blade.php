@if(!empty($enquirys))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name </th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>


            </tr>
        </thead>
        <tbody>

            @foreach($enquirys as $enquiry)
            <tr >
                  <td>{{$enquiry['firstname']}}  </td>
                  <td>{{$enquiry['lastname']}} </td>
                  <td>{{$enquiry['email']}} </td>
                  <td>{{$enquiry['phone']}} </td>
                  <td>{{$enquiry['address']}} </td>












            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
    {{ $enquirys->links() }}
  </div>


</div>

</div>
    @endif



