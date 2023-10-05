@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Subscription</h2>

    </div>

    <div class="table-responsive category-table">
      <table class="table">
        <thead>
          <th>Title</th>
          <th>Price</th>
          <th>Days</th>
          <th class="subscription_enddate">Start Date</th>
          <th class="subscription_enddate">End Date</th>
          <th>Action</th>
        </thead>
        <tbody>

          @if(!empty($subscriptions))
          @foreach($subscriptions as $subscription)
          <tr>
            <td>{{$subscription['title']}} </td>
            <td>{{$subscription['price']}} SAR </td>
            <td>{{$subscription['days']}}</td>
            <td>{{ date('Y-m-d', strtotime($subscription['start_date'])) }}</td>
            <td>{{ date('Y-m-d', strtotime($subscription['end_date'])) }}</td>



            <td class="subscription_action">

            <a href="{{ URL::to('/#subscribe') }}" class="button is-solid green-button raised" data-toggle="modal"   style="cursor: pointer;" >View Plan</a>

            <?php
                    $current_date_time = Carbon\Carbon::now();
                    $current_date_time->toDateString();
                    $end_date =  strtotime($subscription['end_date']);
                    $end_date =  date('Y-m-d',$end_date);
                   $seven_days_before = date('Y-m-d', strtotime('-7 day', strtotime($end_date)));


                    if($current_date_time > $seven_days_before ){?>
                           <a href="" class="button is-solid green-button raised" data-toggle="modal"   style="cursor: pointer;" >Renew</a>
                    <?php } ?>

                    </td>

          </tr>
          @endforeach

          @endif
        </tbody>
      </table>
    </div>

    @endsection






