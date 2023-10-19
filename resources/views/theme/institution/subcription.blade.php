@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Subscription</h2>
      <p>Subscription End Date : {{$end_date}}</p>
                            <div class="text-center"><p>Extend Subscription Upto : </p></div>
    </div>

    <div class="table-responsive category-table">
      <table class="table">
        <thead>
        <th>Month</th>
        <th>Day</th>
        <th>Price</th>

        <th>Action</th>

        </thead>
        <tbody>


        @foreach($institutionsubscriptionpackages as $institutionsubscriptionpackage)
                                    <tr>
                                        <td>{{$institutionsubscriptionpackage->title}}</td>
                                        <td>    {{$institutionsubscriptionpackage->days}}</td>
                                        <td>{{$institutionsubscriptionpackage->price}}SAR</td>
                                        <td><a href="{{Route('institutionsubscription',['id'=>$institutionsubscriptionpackage['id']])}}" class="button is-solid green-button raised" data-toggle="modal"   style="cursor: pointer;">Pay</a></td>
                                    </tr>
                                    @endforeach
        </tbody>
      </table>
    </div>

    @endsection






