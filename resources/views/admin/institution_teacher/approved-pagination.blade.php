
@include('frontend.notification')



<div class="card">
<div class="card-body table-responsive">
    <table id="example1_123" class="table table-bordered table-striped">
        <div class="row">


        <thead>
            <tr>
                <th>Institution</th>
                <th>Teacher</th>

                <th>Date</th>

            </tr>
        </thead>
        <tbody>

            @foreach($data as $result)
            <tr >
                   <td> <?php echo $result['institution_name'];?></td>
                     <td> <?php echo $result['teacher_name'];?></td>

               <td> <?php echo $result['created_at'];?></td>



            </tr>

           @endforeach
           @if ($data->count() == 0)

<tr>
<td colspan="6">
    No Record Found!!
</td>
</tr>

@endif
        </tbody>
    </table>


<div id="pagination">
    {{ $data->links() }}
  </div>


</div>

</div>




