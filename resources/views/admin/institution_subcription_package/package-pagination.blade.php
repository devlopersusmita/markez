
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Title</th>
                <th>Order Number</th>
                <th>Price</th>
                <th>Day</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($institutionsubcriptionpackages as $institutionsubcriptionpackage)
            <tr >
                  <td>{{$institutionsubcriptionpackage['title']}}  </td>
                  <td>{{$institutionsubcriptionpackage['order_no']}} </td>
                  <td>{{$institutionsubcriptionpackage['price']}} </td>
                  <td>{{$institutionsubcriptionpackage['days']}} </td>
                  <td>{!!$institutionsubcriptionpackage['descriptions']!!} </td>





                <td>
                    <table><tr><td> <span   class="btn btn-info view_modalpackage"  data-toggle="modal" data-target="#modals-viewpackage" style="cursor: pointer;" data-id="<?php echo $institutionsubcriptionpackage['id']?>" >View</span></td><td> <span   class="btn btn-warning edit_modalpackage" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $institutionsubcriptionpackage['id']?>" >Edit</span></td></tr></table>



                </td>




            </tr>

           @endforeach

           @if ($institutionsubcriptionpackages->count() == 0)

                <tr>
                <td colspan="6">
                    No Record Found!!
                </td>
                </tr>

            @endif
        </tbody>
    </table>


<div id="pagination">
    {{ $institutionsubcriptionpackages->links() }}
  </div>


</div>

</div>




