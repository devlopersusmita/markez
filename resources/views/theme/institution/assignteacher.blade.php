@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Assigned Courses</h2>

    </div>

    <div class="table-responsive">
      <table class="table category-table">
        <thead>
        <th>Course Name</th>
                <th>Teacher Name</th>
                <th>Status</th>

        </thead>
        <tbody>


          @foreach($courses as $course)
          <tr>

          <td>{{$course['title']}}  </td>
                  <td>{{$course['name']}} </td>
                  <td class="starus-row">
                  <?php if($course['status']=='approve'){?>
                        <span class="active">Approve</span>
                    <?php } ?>
                  </td>


          </tr>
          @endforeach


        </tbody>
      </table>


      </div>
 </div>



    </div>

    @endsection




