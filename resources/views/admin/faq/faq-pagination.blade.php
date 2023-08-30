@if(!empty($faqs))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Title</th>
                <th>Order Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($faqs as $faq)
            <tr >
                  <td>{{$faq['title']}}  </td>
                   <td>{{$faq['order_no']}} </td>


                <td>
                    <table><tr><td>
                    <?php if($faq['status']=='active'){?>
                        <span class="btn btn-success statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $faq['id']?>" >Active</span>
                    <?php } ?>
                    <?php if($faq['status']=='inactive'){?>
                        <span class="btn btn-danger statuschange_modal" data-toggle="modal" data-target="#modals-statuschange" style="cursor: pointer;" data-status='active' data-id="<?php echo $faq['id']?>" >Inactive</span>
                    <?php } ?>
                    </td></tr></table>
                </td>


                <td>
                    <table><tr><td> <span   class="btn btn-info faqview_modals"  data-toggle="modal" data-target="#modals-view" style="cursor: pointer;" data-id="<?php echo $faq['id']?>" >View</span></td><td> <span   class="btn btn-warning edit_modal" data-toggle="modal" data-target="#modals-edit" style="cursor: pointer;" data-id="<?php echo $faq['id']?>" >Edit</span></td><td><span    class="btn btn-danger delete_modal" data-toggle="modal" data-target="#modals-delete" style="cursor: pointer;" data-id="<?php echo $faq['id']?>" >Delete</span></td></tr></table>



                </td>




            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
    {{ $faqs->links() }}
  </div>


</div>

</div>
    @endif



