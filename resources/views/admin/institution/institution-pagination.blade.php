

@if($institutions->count()==0)

@include('frontend.notification')


@else
<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>

                <th>Status</th>

            </tr>
        </thead>
        <tbody>

            @foreach($institutions as $institution)
            <tr >
                  <td>{{$institution['name']}}  </td>
                   <td>{{$institution['email']}} </td>



                <td>
                    <table><tr><td>
                    <?php if($institution['inst_status']=='active'){?>
                        <span class="btn btn-success institution-statuschange_modal" data-toggle="modal" data-target="#institution-modals-statuschange" style="cursor: pointer;" data-status='inactive' data-id="<?php echo $institution['id']?>" >Approved</span>
                    <?php } ?>
                    <?php if($institution['inst_status']=='inactive'){?>
                        <span class="btn btn-danger institution-statuschange_modal" data-toggle="modal" data-target="#institution-modals-statuschange" style="cursor: pointer;" data-status='active' data-id="<?php echo $institution['id']?>" >Approve It</span>
                    <?php } ?>
                    </td></tr></table>
                </td>







            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
    {{ $institutions->links() }}
  </div>


</div>

</div>
    @endif



