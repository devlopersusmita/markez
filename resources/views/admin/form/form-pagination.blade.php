
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
            <th>Name</th>

                <th>No of field</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($formdata as $form)
            <tr >
            <td>{{$form['form_name']}}  </td>

                  <td> {{$form['total_field']}}  </td>
                  <td>{{$form['form_status']}}  </td>





                  <td>
                  <table><tr>
                  <td> <span  class="btn btn-success  pageaddfield-modals"  data-toggle="modal" data-target="#pagemodals-add-field" style="cursor: pointer;" data-id="<?php echo $form['id']?>" >Add Field</span></td>
                    <td> <span   class="btn btn-info formview-modals"  data-toggle="modal" data-target="#formmmodals-view" style="cursor: pointer;" data-id="<?php echo $form['id']?>" >View</span></td>
                    <td> <span   class="btn btn-warning formedit_modal" data-toggle="modal" data-target="#formmodals-edit" style="cursor: pointer;" data-id="<?php echo $form['id']?>" >Edit</span></td>
                    <td><span    class="btn btn-danger delete_modal" data-toggle="modal" data-target="#formmodals-delete" style="cursor: pointer;" data-id="<?php echo $form['id']?>" >Delete</span></td>
                </tr></table>



                </td>



            </tr>

           @endforeach

           @if ($formdata->count() == 0)

                <tr>
                <td colspan="6">
                    No Record Found!!
                </td>
                </tr>

            @endif
        </tbody>
    </table>


<div id="pagination">
    {{ $formdata->links() }}
  </div>


</div>

</div>




