@if(!empty($homes))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Slider</th>
                <th>Slider Text</th>
                <th>Slider Header </th>
                <th>Slider Description </th>
                <th>Slider Link </th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($homes as $home)
            <tr >
                  <td><img src="{{asset($home['slider'])}}" alt="" width="100%">

                </td>
                <td>{{$home['slider_header']}} </td>

                   <td>{{$home['slider_text']}} </td>
                   <td>{{$home['description']}} </td>
                   <td>{{$home['link']}} </td>





                <td>
                    <table><tr><td> <span   class="btn btn-warning edit_modal" data-toggle="modal" data-target="#homemodals-edit" style="cursor: pointer;" data-id="<?php echo $home['id']?>" >Edit</span></td><td><span    class="btn btn-danger delete_modal" data-toggle="modal" data-target="#modals-delete" style="cursor: pointer;" data-id="<?php echo $home['id']?>" >Delete</span></td></tr></table>



                </td>




            </tr>

           @endforeach


           @if ($homes->count() == 0)

                <tr>
                <td colspan="6">
                    No Record Found!!
                </td>
                </tr>

            @endif
        </tbody>
    </table>


<div id="pagination">
    {{ $homes->links() }}
  </div>


</div>

</div>




