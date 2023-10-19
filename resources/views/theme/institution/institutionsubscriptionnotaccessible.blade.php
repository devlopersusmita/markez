@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Institution Subscription</h2>

    </div>

    <div class="table-responsive category-table">
           <!-- tab start --->
           <div id="shop-page" class="shop-wrapper">

@if(session()->has('message'))
    <div class="box-heading margin_top_10 margin_bottom_10">
        <h4>{{ session()->get('message') }}</h4>

    </div>
@endif



<div class="store-sections">
    <div class="container">



      <h3>Course Subscription Not Accessible for You ! Please contact with the Adminstrator</h3>


    </div>
</div>
</div>

<!--tab end --->
    </div>

    @endsection






