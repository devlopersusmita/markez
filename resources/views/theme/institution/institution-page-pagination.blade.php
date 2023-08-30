@if(!empty($pages))
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Content</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($pages as $page)
            <tr >
                  <td>{{$page['title']}}  </td>
                  <td>{{$page['slug']}}  </td>
                   <td><?php $content=$page['content']; $content=strip_tags($content); $out = strlen($content) > 100 ? substr($content,0,100)."..." : $content; ?> {!! $out !!} </td>





                <td>
                    <table><tr>
                    <td> <span  class="button is-success accent-button raised modal-trigger pageview-modals"  data-toggle="modal" data-target="#pagemodals-view" style="cursor: pointer;" data-id="<?php echo $page['id']?>" >View</span></td>
                    <td> <span   class="button is-warning accent-button raised modal-trigger pageedit_modal" data-toggle="modal" data-target="#pagemodals-edit" style="cursor: pointer;" data-id="<?php echo $page['id']?>" >Edit</span></td>
                    <td><span    class="button is-danger accent-button raised modal-trigger delete_modal" data-toggle="modal" data-target="#pagemodals-delete" style="cursor: pointer;" data-id="<?php echo $page['id']?>" >Delete</span></td>
                </tr></table>



                </td>




            </tr>

           @endforeach
        </tbody>
    </table>


<div id="pagination">
    {{ $pages->links() }}
  </div>


</div>

</div>
    @endif



