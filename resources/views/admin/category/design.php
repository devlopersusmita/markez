<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>

            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $categorie)
        <tr>
              <td>{{$categorie->name}} </td>
              <td>{{$categorie->slug}} </td>


                <td>
                    <center>
                     <form action="{{route('category.status',$categorie->id)}}" method="post">
                     @csrf
                      <input data-toggle="tooltip" title="{{$categorie->status=='active' ? 'Active' : 'Inactive'}}" data-id="{{$categorie->id}}" class="categorystatusBtn1"  type="checkbox" {{$categorie->status=='inactive' ? 'checked' : ''}} >
                     </form>
                  </center>
               </td>


                  <td>







               </td>




        </tr>

       @endforeach
    </tbody>
</table>
