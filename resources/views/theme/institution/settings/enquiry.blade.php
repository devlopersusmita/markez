@extends('theme.institution.default')
@section('content')
<div class="app-main">
@include('theme.institution.sidebar')

<div class="app-main__outer">
   <div class="app-main__inner">

    <div class="category-top-row">
      <h2>Contact Us</h2>

    </div>

    <div class="table-responsive category-table banner-setting-table">
      <table class="table">
        <thead>
        <th>First Name</th>
                <th>Last Name </th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>


        </thead>
        <tbody>



          @foreach($enquirys as $enquiry)
          <tr>

          <td>{{$enquiry['firstname']}}  </td>
                  <td>{{$enquiry['lastname']}} </td>
                  <td>{{$enquiry['email']}} </td>
                  <td>{{$enquiry['phone']}} </td>
                  <td>{{$enquiry['address']}} </td>
                  <td><span  class="delete_modal" data-toggle="modal" data-target="#enquirymodals-delete" style="cursor: pointer;" data-id="<?php echo $enquiry['id']?>" ><i class="fa fa-trash-o" style="font-size:18px"></i></span></td>
          </tr>
          @endforeach



        </tbody>
      </table>
    </div>

    @endsection

  <!-- Modal to delete enquiry start-->
  <div class="modal fade" id="enquirymodals-delete" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header">
            <h5 class="modal-title" >Delete Enqiury</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-3 pt-0">

            <div class="alert alert-warning" role="alert">
                 <p>Are you sure?</p>
              <h6 class="alert-heading">Warning!</h6>
              <div class="alert-body">
                Do you really want to delete this record? This process cannot be undone.
              </div>
            </div>



              <div class="col-sm-12 ps-sm-0">
                <input type="hidden" id="delete_id" value="" />
                <button type="submit" id="enquiry_delete" class="btn btn-danger data-delete">Delete</button>
                 <button data-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary" >Cancel</button>
              </div>


          </div>
        </div>
      </div>
    </div>
    <!-- Modal to delete enquiry Ends-->
