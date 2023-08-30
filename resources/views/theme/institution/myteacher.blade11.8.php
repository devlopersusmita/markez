@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>My Teachers</h2>

    </div>

    <div class="table-responsive category-table my-teacher-table">
      <table class="table">
        <thead>
              <th class="teacher-img-row"></th>
              <th>Name</th>
              <th>Email</th>
        </thead>
        <tbody>
          @if(!empty($my_teachers))
          @foreach($my_teachers as $my_teacher)
          <tr>
              <td><img src="images/teacher-img.png" alt=""></td>
              <td>{{$my_teacher['name']}}  </td>
              <td>{{$my_teacher['email']}}  </td>
          </tr>
          @endforeach

          @endif
        </tbody>
      </table>
    </div>

    @endsection






