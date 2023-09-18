@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Online Class</h2>

    </div>

    <div class="table-responsive category-table">
      <table class="table course-table">
        <thead>
        <th>Topic</th>
                                           <th>Start At</th>
                                           <th>Duration (Minutes)</th>
        </thead>
        <tbody>

        @foreach($online_classes as $online_classe)

          <tr>
          <td>{{$online_classe['topic']}}</td>
                                                <td>{{$online_classe['start_at']}}</td>
                                                <td>{{$online_classe['duration']}}</td>


          </tr>
          @endforeach


        </tbody>
      </table>
    </div>

    @endsection





