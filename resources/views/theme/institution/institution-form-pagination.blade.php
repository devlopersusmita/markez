@if(!empty($pages))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Name</th>
                <th>Page</th>
                <th>no of field</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($formdata as $form)
            <tr >
                  <td>{{$form['form_name']}}  </td>
                  <td>{{$form['page_name']}}  </td>
                  <td> {{$form['total_field']}}  </td>
                  <td>{{$form['form_status']}}  </td>
                 

                <td>
                    <table><tr>
                    <td> <span  class="button is-success accent-button raised modal-trigger pageaddfield-modals"  data-toggle="modal" data-target="#pagemodals-add-field" style="cursor: pointer;" data-id="<?php echo $form['id']?>" >Add Field</span></td>
                    <td> <span  class="button is-success accent-button raised modal-trigger pageview-modals"  data-toggle="modal" data-target="#pagemodals-view" style="cursor: pointer;" data-id="<?php echo $form['id']?>" >View</span></td>
                    <td> <span   class="button is-warning accent-button raised modal-trigger pageedit_modal" data-toggle="modal" data-target="#pagemodals-edit" style="cursor: pointer;" data-id="<?php echo $form['id']?>" >Edit</span></td>
                    <td><span    class="button is-danger accent-button raised modal-trigger delete_modal" data-toggle="modal" data-target="#pagemodals-delete" style="cursor: pointer;" data-id="<?php echo $form['id']?>" >Delete</span></td>
                </tr></table>



                </td>




            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
    {{ $formdata->links() }}
  </div>


</div>

</div>
    @endif



