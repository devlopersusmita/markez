@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Teacher Requests</h2>

    </div>

    <div class="table-responsive">
      <table class="table category-table">
        <thead>
        <th>Institution</th>
                <th>Teacher</th>
                <th>Request By</th>
                <th>Date</th>
                <th>Status</th>
        </thead>
        <tbody>

          @if(!empty($teacherrequests))
          @foreach($teacherrequests as $teacherrequest)
          <tr>
          <td>

                    </td>
                  <td>
               </td>


               <td> <?php echo $teacherrequest['sender_type'];?></td>
               <td> <?php echo $teacherrequest['created_at'];?></td>
               <td> <?php echo $teacherrequest['status'];?></td>



          </tr>
          @endforeach

          @endif
        </tbody>
      </table>
    </div>

    @endsection






