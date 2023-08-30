@if(!empty($menus))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Menu Name</th>
                <th>Slug</th>
                <th>Page Name</th>
                <th>Link</th>
                <th>Location</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($menus as $menu)
            <tr >
                  <td>{{$menu['menu_name']}}  </td>
                  <td>{{$menu['slug']}}  </td>
                  <td>{{$menu['page_name']}}  </td>
                  <td>{{$menu['link']}}  </td>
                  <td>{{$menu['location']}}  </td>






                <td>
                    <table><tr>
                        <td> <span  class="button is-success accent-button raised modal-trigger menuview-modals"  data-toggle="modal" data-target="#menumodals-view" style="cursor: pointer;" data-id="<?php echo $menu['id']?>" >View</span></td>
                    <td> <span   class="button is-warning accent-button raised modal-trigger menuedit_modal" data-toggle="modal" data-target="#menumodals-edit" style="cursor: pointer;" data-id="<?php echo $menu['id']?>">Edit</span></td>
                    <td><span    class="button is-danger accent-button raised modal-trigger delete_modal" data-toggle="modal" data-target="#menumodals-delete" style="cursor: pointer;" data-id="<?php echo $menu['id']?>" >Delete</span></td>
                </tr></table>



                </td>




            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
    {{ $menus->links() }}
  </div>


</div>

</div>
    @endif



