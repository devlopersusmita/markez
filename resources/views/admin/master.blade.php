<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">


  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>Markez | Dashboard</title>



  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="{{URL::asset('backend/plugins/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Ionicons -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" type="text/css">

  <!-- Tempusdominus Bootstrap 4 -->

  <link rel="stylesheet" href="{{URL::asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

  <!-- iCheck -->

  <link rel="stylesheet" href="{{URL::asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

  <!-- JQVMap -->

  <link rel="stylesheet" href="{{URL::asset('backend/plugins/jqvmap/jqvmap.min.css')}}">

  <!-- Theme style -->

  <link rel="stylesheet" href="{{URL::asset('backend/dist/css/adminlte.min.css')}}">

  <!-- overlayScrollbars -->

  <link rel="stylesheet" href="{{URL::asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

  <!-- Daterange picker -->

  <link rel="stylesheet" href="{{URL::asset('backend/plugins/daterangepicker/daterangepicker.css')}}">

  <!-- summernote -->

  <link rel="stylesheet" href="{{URL::asset('backend/plugins/summernote/summernote-bs4.min.css')}}">



  <link rel="stylesheet" href="{{URL::asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{URL::asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{URL::asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{URL::asset('backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{URL::asset('backend/dist/css/admin_style.css')}}">

  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<input type="hidden" id="baseurl" value="{{url('')}}" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">



  <!-- Preloader -->

  <!-- <div class="preloader flex-column justify-content-center align-items-center">

    <img class="animation__shake" src="{{URL::asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">

  </div> -->



  <!-- Navbar -->

  @include('admin.layout.header')

  <!-- /.navbar -->



  <!-- Main Sidebar Container -->

 @include('admin.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->

   @yield('contents')

  <!-- /.content-wrapper -->



  @include('admin.layout.footer')




  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

  </aside>

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->



<!-- jQuery -->

<script src="{{URL::asset('backend/plugins/jquery/jquery.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->

<script src="{{URL::asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>

  $.widget.bridge('uibutton', $.ui.button)

</script>

<!-- Bootstrap 4 -->

<script src="{{URL::asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- ChartJS -->

<script src="{{URL::asset('backend/plugins/chart.js/Chart.min.js')}}"></script>

<!-- Sparkline -->

<script src="{{URL::asset('backend/plugins/sparklines/sparkline.js')}}"></script>

<!-- JQVMap -->

<script src="{{URL::asset('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>

<script src="{{URL::asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

<!-- jQuery Knob Chart -->

<script src="{{URL::asset('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<!-- daterangepicker -->

<script src="{{URL::asset('backend/plugins/moment/moment.min.js')}}"></script>

<script src="{{URL::asset('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- Tempusdominus Bootstrap 4 -->

<script src="{{URL::asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<!-- Summernote -->

<script src="{{URL::asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>

<!-- overlayScrollbars -->

<script src="{{URL::asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<!-- AdminLTE App -->

<script src="{{URL::asset('backend/dist/js/adminlte.js')}}"></script>

<!-- AdminLTE for demo purposes -->

<!-- <script src="{{URL::asset('backend/dist/js/demo.js')}}"></script> -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="{{URL::asset('backend/dist/js/pages/dashboard.js')}}"></script>

<script src="{{URL::asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>

<script src="{{URL::asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{URL::asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>

<script src="{{URL::asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{URL::asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>

<script src="{{URL::asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

<script src="{{URL::asset('backend/plugins/jszip/jszip.min.js')}}"></script>

<script src="{{URL::asset('backend/plugins/pdfmake/pdfmake.min.js')}}"></script>

<script src="{{URL::asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>



<script src="{{URL::asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>

<script src="{{URL::asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>

<script src="{{URL::asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{URL::asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{URL::asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script>
    setTimeout(function(){
      $('#alert').slideUp();
    },4000);
  </script>
    <script>

       var  baseurl = $('#baseurl').val();


        $.ajaxSetup({

           headers: {

               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

           }

       });




    $(document).on("click", "#pagination a,#search_btn", function(event) {



      event.preventDefault();

      $("#pagination_data").html('<center><img src="../frontend/images/loadingpleasewait.gif" width="80" /></center>');

      //get url and make final url for ajax
      var url = $(this).attr("href");
      var append = url.indexOf("?") == -1 ? "?" : "&";
      var finalURL = url + append + $("#searchform").serialize();
      //alert(finalURL);
      //set to current url
      window.history.pushState({}, null, finalURL);



      $.ajax({
          type : 'GET',
          url : finalURL,
          dataType : 'html',
          data: {

          },
          success : function(data){
               //alert(data);

               $("#pagination_data").html(data);
          },
          error : function(data) {
              alert('Errors');
              alert(JSON.stringify(data));
          }
      });





      });


    // category start //


     var newCategoryForm = $('.add-new-category');
     var editCategoryForm = $('.edit-new-category');


  if (newCategoryForm.length) {


    newCategoryForm.on('submit', function (e) {

      e.preventDefault();




          $('#category_add').html('Sending..');


          var formData = new FormData(this);

          $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url: baseurl + '/admin/categorystore',
              method:"POST",
               data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {
                window.location.href="{{ route('category') }}";

               $('#category_add').html('Save');
                   // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                $('#name').val('');
                $('#modals-add').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#category_add').html('Save Changes');

                   //newGameSidebar.modal('hide');
                $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });




    });
  }

   if (editCategoryForm.length) {


    editCategoryForm.on('submit', function (e) {

      e.preventDefault();

        var id = $('#edit_id').val();


          $('#category_edit').html('Sending..');


          var formData = new FormData(this);

          $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url: baseurl + '/admin/categoryupdate/'+id,
              method:"POST",
               data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {
                window.location.href="{{ route('category') }}";

               $('#category_edit').html('Save');
                   // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                $('#name_edit').val('');
                $('#categorymodals-edit').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#category_edit').html('Save Changes');
                   //newGameSidebar.modal('hide');
                $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });




    });
  }


     $(document).on('click', '#category_statuschange', function () {


        var id = $('#statuschange_id').val();
         var status = $('#statuschange_status').val();
      var url = baseurl + '/admin/statuscategory/'+id+'/'+status;

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {
                window.location.href="{{ route('category') }}";

                 $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-statuschange').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });

   $(document).on('click', '#request_approve', function () {


        var id = $('#approve_request_details_id').val();

      var url = baseurl + '/admin/approve_request/'+id;

      $('#approve_loading_approval').show();

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {
                $('#approve_loading_approval').hide();
               // alert(JSON.stringify(data));
               location.reload();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });

    $(document).on('click', '#request_reject', function () {


        var id = $('#reject_request_details_id').val();

      var url = baseurl + '/admin/reject_request/'+id;

      $('#reject_loading_approval').show();

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {
                $('#reject_loading_approval').hide();
               // alert(JSON.stringify(data));
               location.reload();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });


    $(document).on('click', '#request_reject', function () {


        var id = $('#reject_request_details_id').val();

      var url = baseurl + '/admin/reject_request/'+id;

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {

               location.reload();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });

    $(document).on('click', '#category_delete', function () {


        var id = $('#delete_id').val();
      var url = baseurl + '/admin/categorydelete/'+id;

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {
                window.location.href="{{ route('category') }}";


                 $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-delete').modal('hide');






              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });



     $(document).on('click', '.statuschange_modal', function () {
      var id = $(this).data("id");
      var status = $(this).data("status");
      if(status=='active')
      {
        $('#category_status_span').html('<span class="alert-success p-2">Active</span>');
      }
      else if(status=='inactive')
      {
        $('#category_status_span').html('<span class="alert-danger p-2">Inactive</span>');
      }


       $('#statuschange_id').val(id);
       $('#statuschange_status').val(status);



    });

      $(document).on('click', '.student-statuschange_modal', function () {
      var id = $(this).data("id");
      var status = $(this).data("status");
      if(status=='active')
      {
        $('#student_status_span').html('<span class="alert-success p-2">Approved</span>');
      }
      else if(status=='inactive')
      {
        $('#student_status_span').html('<span class="alert-danger p-2">Approve It</span>');
      }


       $('#student_statuschange_id').val(id);
       $('#student_statuschange_status').val(status);



    });

    $(document).on('click', '.approve_modal', function () {
      var id = $(this).data("id");



       $('#approve_request_details_id').val(id);

    });


    $(document).on('click', '.reject_modal', function () {
      var id = $(this).data("id");



       $('#reject_request_details_id').val(id);

    });

    $(document).on('click', '.delete_modal', function () {
      var id = $(this).data("id");
       $('#delete_id').val(id);

    });


    $(document).on('click', '.categoryview_modal', function () {

      var id = $(this).data("id");

      var url = baseurl + '/admin/viewcategory/'+id;
//alert(url);
     // alert(url) ;

     // alert(baseurl);
     // alert(id);




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                 // alert(JSON.stringify(data));

                 // alert(data.from_date);

                 var htmlcont = '';
                 htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';


               var status = "";
               if(data.status=='active')
               {
                  var status = "<span class='text-success'>Active</span>";
               }
               else if(data.status=='inactive')
               {
                  var status = "<span class='text-danger'>Inactive</span>";
               }



                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Name';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.name;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Slug';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.slug;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Status';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+status;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';





                 htmlcont=htmlcont+'</table>';


                  $('#details_modal_body_content').html(htmlcont);





              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });

      $(document).on('click', '.categoryedit_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/viewcategory/'+id;

      //alert(url) ;

     // alert(baseurl);
      //alert(id);


      $('#edit_id').val(id);




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                 // alert(data.from_date);




                  $('#name_edit').val(data.name);
                  $('#status_edit').val(data.status);






              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });

    // category end //

    //Company start//
    var editCompanyForm = $('.edit-new-company');
if (editCompanyForm.length) {
//  $('.ajax-loader').css("visibility", "visible");

    editCompanyForm.on('submit', function (e) {

        // $('.ajax-loader').css("visibility", "visible");
      e.preventDefault();

        var id = $('#edit_id').val();


          $('#company_edit').html('Sending..');

            var home_page_short_description_edit = CKEDITOR.instances.home_page_short_description_edit.getData();
             var footer_text_edit = CKEDITOR.instances.footer_text_edit.getData();
             var header_text_edit = CKEDITOR.instances.header_text_edit.getData();




          var formData = new FormData(this);

          formData.append('home_page_short_description_value', home_page_short_description_edit);
          formData.append('footer_text_value', footer_text_edit);
          formData.append('header_text_value', header_text_edit);

          $.ajax({
              beforeSend: function(){
                //   alert("gmlkkljkljk")
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url: baseurl + '/admin/companyupdate/'+id,
              method:"POST",
               data:formData,
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {

                window.location.href="{{route('company')}}";

                  var responce = data.data[0];
                  //console.log(responce,"ertwer")


               $('#company_edit').html('Save');
                   // alert(JSON.stringify(data));
                $('#show_name').text(responce.name);
                $('#show_address').text(responce.address);
                $('#show_phone').text(responce.phone);
                $('#show_fax').text(responce.fax);
                $('#show_website').text(responce.website);
                $('#show_country').text(responce.country);
                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                $('#name_edit').val('');
                $('#copyright_text_edit').val('');
                $('#address_edit').val('');
                $('#phone_edit').val('');
                $('#fax_edit').val('');
                $('#website_edit').val('');
                $('#country_edit').val('');
                $('#modals-edit').hide();



              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#company_edit').html('Save Changes');
                   //newGameSidebar.modal('hide');
                $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

              } ,
              complete: function(){
                // $('.ajax-loader').css("visibility", "hidden");
              }
          });




    });
  }

  $(document).on('click', '.edit_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/viewcompany/'+id;

     $('#edit_id').val(id);
    $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                 // alert(data.from_date);

                var asset = datav.asset;




                  $('#name_edit').val(data.name);
                  $('#copyright_text_edit').val(data.copyright_text);
                 // $('#status_edit').val(data.status);
                 $('#address_edit').val(data.address);
                  $('#phone_edit').val(data.phone);
                  $('#fax_edit').val(data.fax);
                 $('#website_edit').val(data.website);
                 $('#country_edit').val(data.country);

                 CKEDITOR.instances.home_page_short_description_edit.setData(data.home_page_short_description);

                  CKEDITOR.instances.footer_text_edit.setData(data.footer_text);
                  CKEDITOR.instances.header_text_edit.setData(data.header_text);

                   if((data.logo=='') || (data.logo==null))
                   {

                   }
                   else
                    {
                       $('#logo_edit_div').html('<img src="'+asset+data.logo+'" width="100" />');
                    }
                    $('#old_logo').val(data.logo);


                     if((data.fav_icon=='') || (data.fav_icon==null))
                   {

                   }
                   else
                    {
                       $('#fav_icon_edit_div').html('<img src="'+asset+data.fav_icon+'" width="100" />');
                    }
                    $('#old_fav_icon').val(data.fav_icon);

                     if((data.director_signature=='') || (data.director_signature==null))
                   {

                   }
                   else
                    {
                       $('#director_signature_edit_div').html('<img src="'+asset+data.director_signature+'" width="100" />');
                    }
                    $('#old_director_signature').val(data.director_signature);


                    $('#facebook_link_edit').val(data.facebook_link);
                    $('#instagram_link_edit').val(data.instagram_link);
                    $('#twiter_link_edit').val(data.twiter_link);
                    $('#linkedin_link_edit').val(data.linkedin_link);
                    $('#youtube_link_edit').val(data.youtube_link);




              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });

  //Company end //

 //System start//
 var editSystemForm = $('.edit-new-system');
if (editSystemForm.length) {


    editSystemForm.on('submit', function (e) {

      e.preventDefault();

        var id = $('#edit_id').val();


          $('#system_edit').html('Sending..');


          var formData = new FormData(this);

          $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url: baseurl + '/admin/systemupdate/'+id,
              method:"POST",
               data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {

                window.location.href="{{route('system')}}";
                var responce = data.data[0];
                  //console.log(responce,"ertwer")

                //alert(data)

               $('#system_edit').html('Save');
                   // alert(JSON.stringify(data));
                   $('#show_student_default_subscription_day').text(responce.student_default_subscription_day);
                $('#show_teacher_default_subscription_day').text(responce.teacher_default_subscription_day);
                $('#show_institution_default_subscription_day').text(responce.institution_default_subscription_day);
                $('#show_country_name').text(responce.c_name);
                $('#show_city_name').text(responce.city_name);
                $('#show_teacher_online_class_before_minute').text(responce.teacher_online_class_before_minute);
                $('#show_student_online_class_before_minute').text(responce.student_online_class_before_minute);

                $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                 $('body').css('padding-right', '0px');
                 $('.modal-backdrop').remove();
                 $('#student_default_subscription_day_edit').val('');
                 $('#teacher_default_subscription_day_edit').val('');
                 $('#institution_default_subscription_day_edit').val('');
                 $('#default_country_id_edit').val('');
                 $('#default_city_id_edit').val('');
                 $('#teacher_online_class_before_minute_edit').val('');
                 $('#student_online_class_before_minute_edit').val('');
                 $('#modals-edit').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#system_edit').html('Save Changes');
                   //newGameSidebar.modal('hide');
                $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

              } ,
               complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });




    });
  }

  $(document).on('click', '.edit_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/viewsystem/'+id;

      //alert(url) ;

     // alert(baseurl);
      //alert(id);


      $('#edit_id').val(id);




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                  // alert(data.from_date);




                  $('#student_default_subscription_day_edit').val(data.student_default_subscription_day);
                  $('#teacher_default_subscription_day_edit').val(data.teacher_default_subscription_day);
                  $('#institution_default_subscription_day_edit').val(data.institution_default_subscription_day);
                  $('#default_country_id_edit').val(data.default_country_id);
                  $('#default_city_id_edit').val(data.default_city_id);
                  $('#teacher_online_class_before_minute_edit').val(data.teacher_online_class_before_minute);
                  $('#student_online_class_before_minute_edit').val(data.student_online_class_before_minute);







              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });

  //System end //

  //order payment//


  $(document).on('click', '.view_modall', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/viewpayment/'+id;

     // alert(url) ;

     // alert(baseurl);
     // alert(id)
;




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                 // alert(data.from_date);


const array1 = data;
var htmlcont = '';


var countno = 0;



for (const element of array1) {

 console.log(element);

var status = "";
               if(element.status=='paid')
               {
                  var status = "<span class='text-success'>Paid</span>";
               }
               else if(element.status=='failed')
               {
                  var status = "<span class='text-danger'>Failed</span>";
               }


               countno++;



             var created = new Date(`${element.created_at}`).toLocaleString(undefined, {timeZone: 'Asia/Kolkata'});
            // alert(created);


               htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';

                htmlcont=htmlcont+'<tr>';
                htmlcont=htmlcont+countno+'.';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Name';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+element.name;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';

               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Description';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+element.description;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';


               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Status ';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+status;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';

               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Payment Id ';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+element.payment_id;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';


               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Amount';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+element.amount_format;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';



               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Message';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+element.message;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';



                 htmlcont=htmlcont+'<tr>';

               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Created at';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+created;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';










              htmlcont=htmlcont+'</table>';
            }
            $('#details_modal_body_content').html(htmlcont);
           },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });
      //order payment//

  //order payment institution_subcription//


  $(document).on('click', '.view_modall_institution_subcription', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/viewpayment_institution_subcription/'+id;

     // alert(url) ;

     // alert(baseurl);
     // alert(id)
;




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                 // alert(data.from_date);


const array1 = data;
var htmlcont = '';


var countno = 0;



for (const element of array1) {

 console.log(element);

var status = "";
               if(element.status=='paid')
               {
                  var status = "<span class='text-success'>Paid</span>";
               }
               else if(element.status=='failed')
               {
                  var status = "<span class='text-danger'>Failed</span>";
               }


               countno++;



             var created = new Date(`${element.created_at}`).toLocaleString(undefined, {timeZone: 'Asia/Kolkata'});
            // alert(created);


               htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';

                htmlcont=htmlcont+'<tr>';
                htmlcont=htmlcont+countno+'.';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Name';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+element.name;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';

               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Description';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+element.description;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';


               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Status ';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+status;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';

               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Payment Id ';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+element.payment_id;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';


               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Amount';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+element.amount_format;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';



               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Message';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+element.message;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';



                 htmlcont=htmlcont+'<tr>';

               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Created at';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+created;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';










              htmlcont=htmlcont+'</table>';
            }
            $('#details_modal_body_institution_subcription_content').html(htmlcont);
           },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });
      //order payment//
      // cms start //


    var editCmsForm = $('.edit-new-cms');
    var newCmsForm = $('.add-new-cms');


  if (newCmsForm.length) {


    newCmsForm.on('submit', function (e) {

      e.preventDefault();




          $('#cms_add').html('Sending..');


          var formData = new FormData(this);

          var contents = CKEDITOR.instances.contents.getData();

var form_data = new FormData(this);

form_data.append('contents_value', contents);

          $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url: baseurl + '/admin/cmsstore',
              method:"POST",
              // data:new FormData(this),
              data:form_data,
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {

                window.location.href="{{route('cms')}}";
                if(data.type == 'success'){
                    $('#form-input-error').html('');
                 $('#form-input-success').html('');

               $('#cms_add').html('Save');
                   // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                $('#title').val('');
                $('#status').val('');
                $('#contents').val('');
                 $('#modals-add').hide();



            }
                else if(data.type == 'error'){
                    $('#form-input-error').html('');
                 $('#form-input-success').html('');
                    $('#cms_add').html('Save');
                 alert(data.message);
                }
              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#cms_add').html('Save Changes');

                   //newGameSidebar.modal('hide');
                $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });




    });
  }

   if (editCmsForm.length) {


    editCmsForm.on('submit', function (e) {

      e.preventDefault();

        var id = $('#edit_id').val();


          $('#cms_edit').html('Sending..');
          var contents_edit = CKEDITOR.instances.contents_edit.getData();

var formData = new FormData(this);

formData.append('contents_value', contents_edit);


         // var formData = new FormData(this);

          $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url: baseurl + '/admin/cmsupdate/'+id,
              method:"POST",
              data:formData,
            //    data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {
                window.location.href="{{route('cms')}}";
                if(data.type == 'success'){
                    $('#form-input-error').html('');
                 $('#form-input-success').html('');

               $('#cms_edit').html('Save');
                   // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                $('#title_edit').val('');
                $('#contents_edit').val('');
                $('#status_edit').val('');
                $('#modals-edit').hide();
            }
                else if(data.type == 'error'){
                    $('#form-input-error').html('');
                 $('#form-input-success').html('');
                    $('#cms_edit').html('Save');
                 alert(data.message);
                }

              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#cms_edit').html('Save Changes');
                   //newGameSidebar.modal('hide');
                $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });




    });
  }


     $(document).on('click', '#cms_statuschange', function () {


        var id = $('#statuschange_id').val();
         var status = $('#statuschange_status').val();
      var url = baseurl + '/admin/statuscms/'+id+'/'+status;

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {

                 $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-statuschange').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });



    $(document).on('click', '#cms_delete', function () {


        var id = $('#delete_id').val();
      var url = baseurl + '/admin/cmsdelete/'+id;

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {

                 $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-delete').modal('hide');






              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });



     $(document).on('click', '.statuschange_modal', function () {
      var id = $(this).data("id");
      var status = $(this).data("status");
      if(status=='active')
      {
        $('#cms_status_span').html('<span class="alert-success p-2">Active</span>');
      }
      else if(status=='inactive')
      {
        $('#cms_status_span').html('<span class="alert-danger p-2">Inactive</span>');
      }


       $('#statuschange_id').val(id);
       $('#statuschange_status').val(status);



    });

    $(document).on('click', '.delete_modal', function () {
      var id = $(this).data("id");
       $('#delete_id').val(id);

    });


     $(document).on('click', '.view_modals', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/viewcms/'+id;

     // alert(url) ;

     // alert(baseurl);
     // alert(id);




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                 // alert(data.from_date);

                 var htmlcont = '';
                 htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';


               var status = "";
               if(data.status=='active')
               {
                  var status = "<span class='text-success'>Active</span>";
               }
               else if(data.status=='inactive')
               {
                  var status = "<span class='text-danger'>Inactive</span>";
               }



                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Title';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.title;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Slug';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.slug;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Content';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.contents;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Status';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+status;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';





                 htmlcont=htmlcont+'</table>';


                  $('#details_modal_body_content').html(htmlcont);





              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });

      $(document).on('click', '.edit_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/viewcms/'+id;

      //alert(url) ;

     // alert(baseurl);
      //alert(id);


      $('#edit_id').val(id);




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                 // alert(data.from_date);




                  $('#title_edit').val(data.title);
                  $('#status_edit').val(data.status);

                  CKEDITOR.instances.contents_edit.setData(data.contents);








              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });

    // cms end //

     // faq start //


     var editFaqForm = $('.edit-new-faq');
    var newFaqForm = $('.add-new-faq');


  if (newFaqForm.length) {


    newFaqForm.on('submit', function (e) {

      e.preventDefault();




          $('#faq_add').html('Sending..');


          var formData = new FormData(this);

          var contents = CKEDITOR.instances.contents.getData();

var form_data = new FormData(this);

form_data.append('contents_value', contents);

          $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url: baseurl + '/admin/faqstore',
              method:"POST",
              // data:new FormData(this),
              data:form_data,
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {

                window.location.href="{{route('faq')}}";
                if(data.type == 'success'){
                    $('#form-input-error').html('');
                 $('#form-input-success').html('');

               $('#faq_add').html('Save');
                   // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                $('#title').val('');
                $('#status').val('');
                $('#contents').val('');
                $('#order_no').val('');
                 $('#modals-add').hide();



            }
                else if(data.type == 'error'){
                    $('#form-input-error').html('');
                 $('#form-input-success').html('');
                    $('#faq_add').html('Save');
                 alert(data.message);
                }
              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#faq_add').html('Save Changes');

                   //newGameSidebar.modal('hide');
                $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });




    });
  }

   if (editFaqForm.length) {


    editFaqForm.on('submit', function (e) {

      e.preventDefault();

        var id = $('#edit_id').val();


          $('#faq_edit').html('Sending..');
          var contents_edit = CKEDITOR.instances.contents_edit.getData();

var formData = new FormData(this);

formData.append('contents_value', contents_edit);


         // var formData = new FormData(this);

          $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url: baseurl + '/admin/faqupdate/'+id,
              method:"POST",
              data:formData,
            //    data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {
                window.location.href="{{route('faq')}}";
                if(data.type == 'success'){
                    $('#form-input-error').html('');
                 $('#form-input-success').html('');

               $('#faq_edit').html('Save');
                   // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                $('#title_edit').val('');
                $('#contents_edit').val('');
                $('#status_edit').val('');
                $('#order_no_edit').val('');
                $('#modals-edit').hide();
            }
                else if(data.type == 'error'){
                    $('#form-input-error').html('');
                 $('#form-input-success').html('');
                    $('#faq_edit').html('Save');
                 alert(data.message);
                }

              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#faq_edit').html('Save Changes');
                   //newGameSidebar.modal('hide');
                $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });




    });
  }


     $(document).on('click', '#faq_statuschange', function () {


        var id = $('#statuschange_id').val();
         var status = $('#statuschange_status').val();
      var url = baseurl + '/admin/statusfaq/'+id+'/'+status;

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {

                 $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-statuschange').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });

     $(document).on('click', '#student_statuschange', function () {


        var id = $('#student_statuschange_id').val();
         var status = $('#student_statuschange_status').val();
      var url = baseurl + '/admin/statusstudent/'+id+'/'+status;

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {

                 $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#student-modals-statuschange').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });


    $(document).on('click', '#faq_delete', function () {


        var id = $('#delete_id').val();
      var url = baseurl + '/admin/faqdelete/'+id;

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {

                 $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-delete').modal('hide');






              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });



     $(document).on('click', '.statuschange_modal', function () {
      var id = $(this).data("id");
      var status = $(this).data("status");
      if(status=='active')
      {
        $('#faq_status_span').html('<span class="alert-success p-2">Active</span>');
      }
      else if(status=='inactive')
      {
        $('#faq_status_span').html('<span class="alert-danger p-2">Inactive</span>');
      }


       $('#statuschange_id').val(id);
       $('#statuschange_status').val(status);



    });

    $(document).on('click', '.delete_modal', function () {
      var id = $(this).data("id");
       $('#delete_id').val(id);

    });


     $(document).on('click', '.faqview_modals', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/viewfaq/'+id;

     // alert(url) ;

     // alert(baseurl);
     // alert(id);




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                 // alert(data.from_date);

                 var htmlcont = '';
                 htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';


               var status = "";
               if(data.status=='active')
               {
                  var status = "<span class='text-success'>Active</span>";
               }
               else if(data.status=='inactive')
               {
                  var status = "<span class='text-danger'>Inactive</span>";
               }



                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Title';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.title;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Slug';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.slug;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Content';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.contents;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';


                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Order Number';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.order_no;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Status';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+status;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';





                 htmlcont=htmlcont+'</table>';


                  $('#details_modal_body_content').html(htmlcont);





              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });


      $(document).on('click', '.student_view_modals', function () {
         var id = $(this).data("id");
          var url = baseurl + '/studentview/'+id;

    //  alert(baseurl) ;

     // alert(baseurl);
     // alert(id)
;




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {




                var data = datav.data;
                  //alert(JSON.stringify(data));


                  var users = datav.data.users;
                var user_details = datav.data.user_details;
                var asset_path = datav.data.asset_path;
                var background_image = datav.data.background_image;
                var avatar = datav.data.avatar;


                //   alert(category_name);

                 var htmlcont = '';
                 htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';





                    htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td colspan="2">';
                 htmlcont=htmlcont+'<div class="cover-bg-2">';


                    htmlcont=htmlcont+'<img id="background_image_id" class="cover-image bg-image" src="'+background_image+'" width="100%"  alt="">';




                    htmlcont=htmlcont+'<img id="avatar_image_id" class="avatar-image"  src="'+avatar+'"  alt="">';




                            htmlcont=htmlcont+'</div>';
                            htmlcont=htmlcont+'</div>';
                            htmlcont=htmlcont+'</td>';
                            htmlcont=htmlcont+'</tr>';



                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Name';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+users.name;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Email';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+users.email;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

              if(user_details.description){
                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Description';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+user_details.description;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';
                 }

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Country';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+user_details.country_name;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'City';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+user_details.city_name;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Address';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+user_details.address;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';





                 htmlcont=htmlcont+'</table>';



                  $('#student_details_modal_body_content').html(htmlcont);





              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });

      });

      $(document).on('click', '.student_password_modal', function () {
      var id = $(this).data("id");
       $('#student_password_id').val(id);

      });


      $(document).on('click', '#student_password_change', function () {
           var id = $('#student_password_id').val();
           var student_password = $('#student_password').val();

          if(student_password.length >=8)
          {
                $.ajax({
                beforeSend: function(){
                  $('.ajax-loader').css("visibility", "visible");
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                //data: $('#postForm').serialize(),
                url: baseurl + '/admin/studetupdate/'+id,
                method:"POST",
                data:{'student_password':student_password},
              //    data:new FormData(this),
                 dataType:'JSON',

                success: function (data) {

                  //alert(JSON.stringify(data));
                  alert(data.message);
                  window.location.href="{{route('student')}}";

               },
                error: function (data) {
                    alert(JSON.stringify(data));


                } ,
                complete: function(){
                  $('.ajax-loader').css("visibility", "hidden");
                }
              });
            }
            else
            {
              alert('Please give minimum 8 characters');
            }

      });

      $(document).on('click', '.edit_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/viewfaq/'+id;

      //alert(url) ;

     // alert(baseurl);
      //alert(id);


      $('#edit_id').val(id);




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                 // alert(data.from_date);




                  $('#title_edit').val(data.title);
                  $('#status_edit').val(data.status);

                  CKEDITOR.instances.contents_edit.setData(data.contents);

                  $('#order_no_edit').val(data.order_no);








              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });

    // faq end //

    //teacher start //

     $(document).on('click', '.teacher_view_modals', function () {
         var id = $(this).data("id");
          var url = baseurl + '/studentview/'+id;

    //  alert(baseurl) ;

     // alert(baseurl);
     // alert(id)
;




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {




                var data = datav.data;
                  //alert(JSON.stringify(data));


                  var users = datav.data.users;
                var user_details = datav.data.user_details;
                var asset_path = datav.data.asset_path;
                var background_image = datav.data.background_image;
                var avatar = datav.data.avatar;


                //   alert(category_name);

                 var htmlcont = '';
                 htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';





                    htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td colspan="2">';
                 htmlcont=htmlcont+'<div class="cover-bg-2">';

                    htmlcont=htmlcont+'<img id="background_image_id" class="cover-image bg-image" src="'+background_image+'" width="100%"  alt="">';




htmlcont=htmlcont+'<img id="avatar_image_id" class="avatar-image"  src="'+avatar+'"  alt="">';


                        htmlcont=htmlcont+'</div>';
                        htmlcont=htmlcont+'</div>';

                 htmlcont=htmlcont+'</td>';

                 htmlcont=htmlcont+'</tr>';



                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Name';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+users.name;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Email';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+users.email;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

              if(user_details.description){
                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Description';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+user_details.description;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';
                 }

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Country';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+user_details.country_name;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'City';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+user_details.city_name;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Address';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+user_details.address;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';





                 htmlcont=htmlcont+'</table>';



                  $('#teacher_details_modal_body_content').html(htmlcont);





              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });

      });

      $(document).on('click', '.teacher_password_modal', function () {
      var id = $(this).data("id");
       $('#teacher_password_id').val(id);

      });


      $(document).on('click', '#teacher_password_change', function () {
           var id = $('#teacher_password_id').val();
           var teacher_password = $('#teacher_password').val();

        //   alert(teacher_password);

          if(teacher_password.length >=8)
          {
                $.ajax({
                beforeSend: function(){
                  $('.ajax-loader').css("visibility", "visible");
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                //data: $('#postForm').serialize(),
                url: baseurl + '/admin/teacherupdate/'+id,
                method:"POST",
                data:{'teacher_password':teacher_password},
              //    data:new FormData(this),
                 dataType:'JSON',

                success: function (data) {

                  //alert(JSON.stringify(data));
                  alert(data.message);
                  window.location.href="{{route('teacher')}}";

               },
                error: function (data) {
                    alert(JSON.stringify(data));


                } ,
                complete: function(){
                  $('.ajax-loader').css("visibility", "hidden");
                }
              });
            }
            else
            {
              alert('Please give minimum 8 characters');
            }

      });

       $(document).on('click', '.teacher-statuschange_modal', function () {
      var id = $(this).data("id");
      var status = $(this).data("status");
      if(status=='active')
      {
        $('#teacher_status_span').html('<span class="alert-success p-2">Approved</span>');
      }
      else if(status=='inactive')
      {
        $('#teacher_status_span').html('<span class="alert-danger p-2">Approve It</span>');
      }


       $('#teacher_statuschange_id').val(id);
       $('#teacher_statuschange_status').val(status);



    });

        $(document).on('click', '#teacher_statuschange', function () {


        var id = $('#teacher_statuschange_id').val();
         var status = $('#teacher_statuschange_status').val();
      var url = baseurl + '/admin/statusstudent/'+id+'/'+status;

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {

                 $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#teacher-modals-statuschange').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });

  //institution start //

     $(document).on('click', '.institution_view_modals', function () {
         var id = $(this).data("id");
          var url = baseurl + '/institutionview/'+id;

    //  alert(baseurl) ;

     // alert(baseurl);
     // alert(id)
;




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {




                var data = datav.data;
                 // alert(JSON.stringify(data));


                 var institution = datav.data.institution;

                 var institution_details = datav.data.institution_details;


               var user_details = datav.data.user_details;

               var asset_path = datav.data.asset_path;
               var logo = datav.data.logo;






                 var htmlcont = '';
                 htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td colspan="2">';
                 htmlcont=htmlcont+'<div class="cover-bg-2">';




                    htmlcont=htmlcont+'<div class="avatar1">';

                    htmlcont=htmlcont+'<img id="avatar_image_id" class="avatar-image"  src="'+logo+'"  alt="">';




                        htmlcont=htmlcont+'</div>';
                        htmlcont=htmlcont+'</div>';

                 htmlcont=htmlcont+'</td>';

                 htmlcont=htmlcont+'</tr>';



                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Name';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+institution.name;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                  htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Email';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+institution.email;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';




              if(institution_details.description){
                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Description';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+institution_details.description;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';
                 }

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Country';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+user_details.country_name;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'City';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+user_details.city_name;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Address';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+user_details.address;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';
                 htmlcont=htmlcont+'</table>';


                  $('#institution_details_modal_body_content').html(htmlcont);





              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });

      });

      $(document).on('click', '.institution_password_modal', function () {
      var id = $(this).data("id");
       $('#institution_password_id').val(id);

      });


      $(document).on('click', '#institution_password_change', function () {
           var id = $('#institution_password_id').val();
           var institution_password = $('#institution_password').val();

        //   alert(institution_password);

          if(institution_password.length >=8)
          {
                $.ajax({
                beforeSend: function(){
                  $('.ajax-loader').css("visibility", "visible");
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                //data: $('#postForm').serialize(),
                url: baseurl + '/admin/institutionupdate/'+id,
                method:"POST",
                data:{'institution_password':institution_password},
              //    data:new FormData(this),
                 dataType:'JSON',

                success: function (data) {

                  //alert(JSON.stringify(data));
                  alert(data.message);
                  window.location.href="{{route('institution')}}";

               },
                error: function (data) {
                    alert(JSON.stringify(data));


                } ,
                complete: function(){
                  $('.ajax-loader').css("visibility", "hidden");
                }
              });
            }
            else
            {
              alert('Please give minimum 8 characters');
            }

      });

      $(document).on('click', '.institution-statuschange_modal', function () {
      var id = $(this).data("id");
      //alert(id);
      var status = $(this).data("status");
      //alert(status);
      if(status=='active')
      {
        $('#institution_status_span').html('<span class="alert-success p-2">Approved</span>');
      }
      else if(status=='inactive')
      {
        $('#institution_status_span').html('<span class="alert-danger p-2">Approve It</span>');
      }


       $('#institution_statuschange_id').val(id);
       $('#institution_statuschange_status').val(status);



    });

        $(document).on('click', '#institution_statuschange', function () {


        var id = $('#institution_statuschange_id').val();
         var status = $('#institution_statuschange_status').val();
      var url = baseurl + '/admin/admininstitutionstatus/'+id+'/'+status;

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {

                window.location.href="{{route('admininstitution')}}";

                 $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#institution-modals-statuschange').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });

          //course subcsription list//


  $(document).on('click', '.view_modalsubcription', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/coursesubcriptionlist/'+id;

       $('#details_modal_body_content').html('');



       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                 // alert(JSON.stringify(data));
             var asset_path = datav.asset_path;
             var avatar = datav.data[0].avatar;
            // alert(avatar);


             const array1 = data;
                var htmlcont = '';


                var countno = 0;





        for (const element of array1) {

        console.log(element);

var avatarimg = datav.avatar != ''? datav.avatar:element.avatar;
 //alert(avatarimg);


                    countno++;



                    var created = new Date(`${element.created_at}`).toLocaleString(undefined, {timeZone: 'Asia/Kolkata'});
                    //alert(avatar);


                    htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';
                    htmlcont=htmlcont+'<tr>';

                    htmlcont=htmlcont+'<th>';
                    htmlcont=htmlcont+'Name';
                    htmlcont=htmlcont+'</th>';
                    htmlcont=htmlcont+'<th>';
                    htmlcont=htmlcont+'Photo';
                    htmlcont=htmlcont+'</th>';
                    htmlcont=htmlcont+'<th>';
                    htmlcont=htmlcont+'Email';
                    htmlcont=htmlcont+'</th>';
                    htmlcont=htmlcont+'<th>';
                    htmlcont=htmlcont+'Price';
                    htmlcont=htmlcont+'</th>';
                    htmlcont=htmlcont+'<th>';
                    htmlcont=htmlcont+'Created at';
                    htmlcont=htmlcont+'</th>';
                    htmlcont=htmlcont+'</tr>';




                        htmlcont=htmlcont+'<tr>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+element.name;
                        htmlcont=htmlcont+'</td>';
                        htmlcont=htmlcont+'<td>';

                       htmlcont=htmlcont+'<img id="avatar_image_id" class="avatar-image"  src="'+avatarimg+'"  alt="" width="60%">';


                    htmlcont=htmlcont+'</td>';
                    htmlcont=htmlcont+'<td>';
                    htmlcont=htmlcont+element.email;
                    htmlcont=htmlcont+'</td>';
                    htmlcont=htmlcont+'<td>';
                    htmlcont=htmlcont+element.price;
                    htmlcont=htmlcont+'</td>';
                    htmlcont=htmlcont+'<td>';
                    htmlcont=htmlcont+created;
                    htmlcont=htmlcont+'</td>';
                    htmlcont=htmlcont+'</tr>';

                     htmlcont=htmlcont+'</table>';
                    }
            $('#details_modal_body_content').html(htmlcont);
           },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });
      //course subcsription list end//

//course status change start//
     $(document).on('click', '#course_statuschange', function () {


        var id = $('#statuschange_id').val();
        var status = $('#statuschange_status').val();
        var url = baseurl + '/admin/statuscourse/'+id+'/'+status;

        // alert(url);

        $.ajax({
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: [],
            url: url,
            type: "post",
            dataType: 'json',
            success: function (data) {

                $('#search_btn').trigger('click');
                $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-statuschange').hide();


            },
            error: function (data) {
                alert(JSON.stringify(data));
                console.log( data);

            } ,
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            }
        });



        });

//course status change end//

//course update//
var editCourseForm = $('.edit-new-course');
if (editCourseForm.length) {


    editCourseForm.on('submit', function (e) {

  e.preventDefault();

    var id = $('#edit_id').val();


      $('#course_edit').html('Sending..');


      var formData = new FormData(this);

      $.ajax({
          beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
          },
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          //data: $('#postForm').serialize(),
          url: baseurl + '/admin/courseupdate/'+id,
          method:"POST",
           data:new FormData(this),
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
          success: function (data) {

           $('#course_edit').html('Save');
               // alert(JSON.stringify(data));

                $('#search_btn').trigger('click');
             $('body').removeClass('modal-open');
            $('body').css('padding-right', '0px');
            $('.modal-backdrop').remove();
            $('#start_date_edit').val('');
            $('#end_date_edit').val('');
            $('#modals-edit').hide();


          },
          error: function (data) {
              alert(JSON.stringify(data));
              $('#course_edit').html('Save Changes');
               //newGameSidebar.modal('hide');
            $('#search_btn').trigger('click');
             $('body').removeClass('modal-open');
            $('body').css('padding-right', '0px');
            $('.modal-backdrop').remove();

          } ,
          complete: function(){
            $('.ajax-loader').css("visibility", "hidden");
          }
      });




});
}
$(document).on('click', '.edit_modalcourse', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/viewcourse/'+id;




      $('#edit_id').val(id);




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                 // alert(JSON.stringify(data));

                //alert(data.start_date);

                 var sd = data.start_date;
                  var sdar = sd.split(' ');
                  var s_date = sdar[0];
                // alert(s_date);
                 var ed = data.end_date;
                  var edar = ed.split(' ');
                  var e_date = edar[0];
                  //alert(e_date);




                  $('#start_date_edit').val(s_date);
                  $('#end_date_edit').val(e_date);






              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });

 // package start //

// package start //


var newPackageForm = $('.add-new-package');
  if (newPackageForm.length)
  {


    newPackageForm.on('submit', function (e) {

      e.preventDefault();




          $('#pacakge_add').html('Sending..');


          var formData = new FormData(this);
          var descriptions = CKEDITOR.instances.descriptions.getData();

var form_data = new FormData(this);

form_data.append('descriptions_value', descriptions);


          $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url: baseurl + '/admin/packagestore',
              method:"POST",
              //    data:new FormData(this),


                // data:new FormData(this),
                data:form_data,
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {
                window.location.href="{{route('institutionsubcriptionpackage')}}";

               $('#pacakge_add').html('Save');
                   // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                $('#title').val('');
                $('#order_no').val('');
                $('#price').val('');
                $('#days').val('');
                $('#descriptions').val('');

                $('#modals-add').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#pacakge_add').html('Save Changes');

                   //newGameSidebar.modal('hide');
                $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });




    });
  }


  $(document).on('click', '.view_modalpackage', function ()
  {

                var id = $(this).data("id");

                var url = baseurl + '/admin/viewpackage/'+id;
                $.ajax({
                        beforeSend: function(){
                        $('.ajax-loader').css("visibility", "visible");
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: [],
                        url: url,
                        type: "get",
                        dataType: 'json',
                        success: function (datav) {
                         var data = datav.data;
                         var htmlcont = '';
                        htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';

                        htmlcont=htmlcont+'<tr>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+'Title';
                        htmlcont=htmlcont+'</td>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+data.title;
                        htmlcont=htmlcont+'</td>';
                        htmlcont=htmlcont+'</tr>';

                        htmlcont=htmlcont+'<tr>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+'Order Number';
                        htmlcont=htmlcont+'</td>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+data.order_no;
                        htmlcont=htmlcont+'</td>';
                        htmlcont=htmlcont+'</tr>';

                        htmlcont=htmlcont+'<tr>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+'Price';
                        htmlcont=htmlcont+'</td>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+data.price;
                        htmlcont=htmlcont+'</td>';
                        htmlcont=htmlcont+'</tr>';

                        htmlcont=htmlcont+'<tr>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+'Day';
                        htmlcont=htmlcont+'</td>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+data.days;
                        htmlcont=htmlcont+'</td>';
                        htmlcont=htmlcont+'</tr>';


                                htmlcont=htmlcont+'<tr>';
                                htmlcont=htmlcont+'<td>';
                                htmlcont=htmlcont+'Descriptions';
                                htmlcont=htmlcont+'</td>';
                                htmlcont=htmlcont+'<td>';
                                htmlcont=htmlcont+data.descriptions;
                                htmlcont=htmlcont+'</td>';
                                htmlcont=htmlcont+'</tr>';

                        htmlcont=htmlcont+'</table>';


                            $('#details_modal_body_content').html(htmlcont);
                       },
                        error: function (data) {
                            alert(JSON.stringify(data));
                            console.log( data);

                        } ,
                        complete: function(){
                        $('.ajax-loader').css("visibility", "hidden");
                        }
                    });



});

var editPackageForm = $('.edit-new-package');
if (editPackageForm.length)
{


                    editPackageForm.on('submit', function (e) {

                e.preventDefault();

                    var id = $('#edit_id').val();


                    $('#package_edit').html('Sending..');


                    var descriptions_edit = CKEDITOR.instances.descriptions_edit.getData();

      var formData = new FormData(this);

             formData.append('descriptions_value', descriptions_edit);


                    $.ajax({
                        beforeSend: function(){
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        //data: $('#postForm').serialize(),
                        url: baseurl + '/admin/packageupdate/'+id,
                        method:"POST",
                        data:formData,
                        //data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            window.location.href="{{route('institutionsubcriptionpackage')}}";

                        $('#package_edit').html('Save');
                            //alert(JSON.stringify(data));

                                $('#search_btn').trigger('click');
                            $('body').removeClass('modal-open');
                            $('body').css('padding-right', '0px');
                            $('.modal-backdrop').remove();
                            $('#title_edit').val('');
                            $('#order_no_edit').val('');
                            $('#price_edit').val('');
                            $('#days_edit').val('');
                            $('#descriptions_edit').val('');
                            $('#modals-edit').hide();


                        },
                        error: function (data) {
                            alert(JSON.stringify(data));
                            $('#package_edit').html('Save Changes');
                            //newGameSidebar.modal('hide');
                            $('#search_btn').trigger('click');
                            $('body').removeClass('modal-open');
                            $('body').css('padding-right', '0px');
                            $('.modal-backdrop').remove();

                        } ,
                        complete: function(){
                            $('.ajax-loader').css("visibility", "hidden");
                        }
                    });




                });
}


$(document).on('click', '.edit_modalpackage', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/viewpackage/'+id;




      $('#edit_id').val(id);




       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                 // alert(JSON.stringify(data));

                 // alert(data.from_date);




                  $('#title_edit').val(data.title);
                  $('#order_no_edit').val(data.order_no);
                  $('#price_edit').val(data.price);
                  $('#days_edit').val(data.days);

                  CKEDITOR.instances.descriptions_edit.setData(data.descriptions);






              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });


    //add payement note //


    var editNoteForm = $('.edit-new-note');
    if (editNoteForm.length) {


        editNoteForm.on('submit', function (e) {

  e.preventDefault();

    var id = $('#note_id').val();


      $('#note_edit').html('Sending..');
     // var contents_edit = CKEDITOR.instances.contents_edit.getData();

   var formData = new FormData(this);

 //formData.append('contents_value', contents_edit);


     // var formData = new FormData(this);

      $.ajax({
          beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
          },
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          //data: $('#postForm').serialize(),
          url: baseurl + '/admin/studentpaymentupdate/'+id,
          method:"POST",
          data:formData,
        //    data:new FormData(this),
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
          success: function (data) {
            window.location.href="{{route('studentpayment')}}";
            if(data.type == 'success'){
                $('#form-input-error').html('');
             $('#form-input-success').html('');

           $('#note_edit').html('Save');
               // alert(JSON.stringify(data));

                $('#search_btn').trigger('click');
             $('body').removeClass('modal-open');
            $('body').css('padding-right', '0px');
            $('.modal-backdrop').remove();
            $('#payment_note_edit').val('');

            $('#modals-edit').hide();
        }
            else if(data.type == 'error'){
                $('#form-input-error').html('');
             $('#form-input-success').html('');
                $('#note_edit').html('Save');
             alert(data.message);
            }

          },
          error: function (data) {
              alert(JSON.stringify(data));
              $('#note_edit').html('Save Changes');
               //newGameSidebar.modal('hide');
            $('#search_btn').trigger('click');
             $('body').removeClass('modal-open');
            $('body').css('padding-right', '0px');
            $('.modal-backdrop').remove();

          } ,
          complete: function(){
            $('.ajax-loader').css("visibility", "hidden");
          }
      });




});
}

$(document).on('click', '.student_payment_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/viewstudentpayment/'+id;

      //alert(url) ;

     // alert(baseurl);
     // alert(id);


      $('#note_id').val(id);
//alert( $('#note_id').val(id));



       $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                 //alert(data.from_date);




                  $('#payment_note_edit').val(data.payment_note);









              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });

//START HOME SETTING //



var editHomesettingForm = $('.edit-new-homestting');
    var newHomesettingForm = $('.add-new-homestting');


  if (newHomesettingForm.length)
  {


    newHomesettingForm.on('submit', function (e) {

                        e.preventDefault();




                            $('#homesetting_add').html('Sending..');


                            var formData = new FormData(this);

                            //var contents = CKEDITOR.instances.contents.getData();

                    var form_data = new FormData(this);

                   // form_data.append('contents_value', contents);

                            $.ajax({
                                beforeSend: function(){
                                    $('.ajax-loader').css("visibility", "visible");
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                //data: $('#postForm').serialize(),
                                url: baseurl + '/admin/adminhomesettingstore',
                                method:"POST",
                                // data:new FormData(this),
                                data:form_data,
                                dataType:'JSON',
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function (data) {

                                    window.location.href="{{route('adminhomesetting')}}";
                                    if(data.type == 'success'){
                                        $('#form-input-error').html('');
                                    $('#form-input-success').html('');

                                $('#homesetting_add').html('Save');
                                    // alert(JSON.stringify(data));

                                        $('#search_btn').trigger('click');
                                    $('body').removeClass('modal-open');
                                    $('body').css('padding-right', '0px');
                                    $('.modal-backdrop').remove();
                                    $('#slider_header').val('');
                                    $('#description').val('');
                                    $('#slider').val('');

                                    $('#slider_text').val('');
                                    $('#link').val('');
                                    $('#homemodals-add').hide();



                                }
                                    else if(data.type == 'error'){
                                        $('#form-input-error').html('');
                                    $('#form-input-success').html('');
                                        $('#homesetting_add').html('Save');
                                    alert(data.message);
                                    }
                                },
                                error: function (data) {
                                    alert(JSON.stringify(data));
                                    $('#homesetting_add').html('Save Changes');

                                    //newGameSidebar.modal('hide');
                                    $('#search_btn').trigger('click');
                                    $('body').removeClass('modal-open');
                                    $('body').css('padding-right', '0px');
                                    $('.modal-backdrop').remove();

                                } ,
                                complete: function(){
                                    $('.ajax-loader').css("visibility", "hidden");
                                }
                            });




    });
}

   if (editHomesettingForm.length)
   {
    editHomesettingForm.on('submit', function (e) {

      e.preventDefault();

        var id = $('#edit_id').val();


          $('#homesetting_edit').html('Sending..');
        //   var contents_edit = CKEDITOR.instances.contents_edit.getData();

       var formData = new FormData(this);

        // formData.append('contents_value', contents_edit);


        //   var formData = new FormData(this);

          $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url: baseurl + '/admin/adminhomesettingupdate/'+id,
              method:"POST",
              data:formData,
            //    data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {

                window.location.href="{{route('adminhomesetting')}}";
                if(data.type == 'success'){
                    $('#form-input-error').html('');
                 $('#form-input-success').html('');

               $('#homesetting_edit').html('Save');
                   // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#slider_edit').val('');

                $('#slider_text_edit').val('');



                    $('#slider_header_edit').val('');
                    $('#description_edit').val('');

                    $('#link_edit').val('');

                $('#homemodals-edit').hide();
            }
                else if(data.type == 'error'){
                    $('#form-input-error').html('');
                 $('#form-input-success').html('');
                    $('#homesetting_edit').html('Save');
                 alert(data.message);
                }

              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#homesetting_edit').html('Save Changes');
                   //newGameSidebar.modal('hide');
                $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });




    });
  }




     $(document).on('click', '#homesetting_delete', function ()
    {


        var id = $('#delete_id').val();
      var url = baseurl + '/admin/adminhomesettingdelete/'+id;

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {

                window.location.href="{{route('adminhomesetting')}}";

                 $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-delete').modal('hide');






              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });





    $(document).on('click', '.delete_modal', function ()
    {
      var id = $(this).data("id");
       $('#delete_id').val(id);

    });


     $(document).on('click', '.homesettingview_modals', function ()
     {
                var id = $(this).data("id");

                var url = baseurl + '/admin/adminhomesettingview/'+id;

                 //alert(url) ;

                // alert(baseurl);
                 //alert(id);






                $.ajax({
                        beforeSend: function(){
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: [],
                        url: url,
                        type: "get",
                        dataType: 'json',
                        success: function (datav) {



                            var data = datav.data;
                            //alert(JSON.stringify(data));



                            var htmlcont = '';
                            htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';







                            htmlcont=htmlcont+'<tr>';
                            htmlcont=htmlcont+'<td>';
                            htmlcont=htmlcont+'Slug';
                            htmlcont=htmlcont+'</td>';
                            htmlcont=htmlcont+'<td>';
                            htmlcont=htmlcont+data.slider;
                            htmlcont=htmlcont+'</td>';
                            htmlcont=htmlcont+'</tr>';



                            htmlcont=htmlcont+'<tr>';
                            htmlcont=htmlcont+'<td>';
                            htmlcont=htmlcont+'Slider Text';
                            htmlcont=htmlcont+'</td>';
                            htmlcont=htmlcont+'<td>';
                            htmlcont=htmlcont+data.slider_text;
                            htmlcont=htmlcont+'</td>';
                            htmlcont=htmlcont+'</tr>';

                            htmlcont=htmlcont+'<tr>';
                            htmlcont=htmlcont+'<td>';
                            htmlcont=htmlcont+'Slider Header';
                            htmlcont=htmlcont+'</td>';
                            htmlcont=htmlcont+'<td>';
                            htmlcont=htmlcont+data.slider_header;
                            htmlcont=htmlcont+'</td>';
                            htmlcont=htmlcont+'</tr>';

                            htmlcont=htmlcont+'<tr>';
                            htmlcont=htmlcont+'<td>';
                            htmlcont=htmlcont+'Description';
                            htmlcont=htmlcont+'</td>';
                            htmlcont=htmlcont+'<td>';
                            htmlcont=htmlcont+data.description;
                            htmlcont=htmlcont+'</td>';
                            htmlcont=htmlcont+'</tr>';

                            htmlcont=htmlcont+'<tr>';
                            htmlcont=htmlcont+'<td>';
                            htmlcont=htmlcont+'Link';
                            htmlcont=htmlcont+'</td>';
                            htmlcont=htmlcont+'<td>';
                            htmlcont=htmlcont+data.link;
                            htmlcont=htmlcont+'</td>';
                            htmlcont=htmlcont+'</tr>';








                            htmlcont=htmlcont+'</table>';


                            $('#details_modal_body_content').html(htmlcont);





                        },
                        error: function (data) {
                            alert(JSON.stringify(data));
                            console.log( data);

                        } ,
                        complete: function(){
                            $('.ajax-loader').css("visibility", "hidden");
                        }
                    });



    });
    $(document).on('click', '.edit_modal', function () {
            var id = $(this).data("id");

            var url = baseurl + '/admin/adminhomesettingview/'+id;

            //alert(url) ;

            // alert(baseurl);
            //alert(id);


            $('#edit_id').val(id);




            $.ajax({
                    beforeSend: function(){
                        $('.ajax-loader').css("visibility", "visible");
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: [],
                    url: url,
                    type: "get",
                    dataType: 'json',
                    success: function (datav) {



                        var data = datav.data;
                        //alert(JSON.stringify(data));

                        // alert(data.from_date);

                        var silder = datav.data.slider;

                        //alert(silder);
                        //alert(JSON.stringify(datav));
                        var asset = datav.asset_path;
                        //alert(asset);




                        // $('#old_slider').val(data.slider);
                        $('#old_slider').attr('src', asset+silder);
                        $('#slider_text_edit').val(data.slider_text);
                        $('#slider_header_edit').val(data.slider_header);
                        $('#description_edit').val(data.description);
                        $('#link_edit').val(data.link);






                    },
                    error: function (data) {
                        alert(JSON.stringify(data));
                        console.log( data);

                    } ,
                    complete: function(){
                        $('.ajax-loader').css("visibility", "hidden");
                    }
                });



    });



//END HOME SETTING//
    //TERMS AND CONDITION Start//
    var editTermsandConditionForm = $('.edit-new-termsandcondition');
       if (editTermsandConditionForm.length) {


        editTermsandConditionForm.on('submit', function (e) {

                    // $('.ajax-loader').css("visibility", "visible");
                e.preventDefault();

                    var id = $('#edit_id').val();


                    $('#termsandcondition_edit').html('Sending..');

                        var terms_contents_edit = CKEDITOR.instances.terms_contents_edit.getData();





                    var formData = new FormData(this);

                    formData.append('terms_contents_value', terms_contents_edit);


                    $.ajax({
                        beforeSend: function(){
                            //   alert("gmlkkljkljk")
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        //data: $('#postForm').serialize(),
                        url: baseurl + '/admin/termsandconditionupdate/'+id,
                        method:"POST",
                        data:formData,
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {

                            window.location.href="{{route('termsandcondition')}}";

                            var responce = data.data[0];
                            //console.log(responce,"ertwer")


                        $('#termsandcondition_edit').html('Save');
                            // alert(JSON.stringify(data));

                                $('#search_btn').trigger('click');
                            $('body').removeClass('modal-open');
                            $('body').css('padding-right', '0px');
                            $('.modal-backdrop').remove();

                            $('#modals-edit').hide();



                        },
                        error: function (data) {
                            alert(JSON.stringify(data));
                            $('#termsandcondition_edit').html('Save Changes');
                            //newGameSidebar.modal('hide');
                            $('#search_btn').trigger('click');
                            $('body').removeClass('modal-open');
                            $('body').css('padding-right', '0px');
                            $('.modal-backdrop').remove();

                        } ,
                        complete: function(){
                            // $('.ajax-loader').css("visibility", "hidden");
                        }
                    });




    });
  }

  $(document).on('click', '.edit_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/termsandconditionview/'+id;

     $('#edit_id').val(id);
    $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                 // alert(data.from_date);

             CKEDITOR.instances.terms_contents_edit.setData(data.terms_contents);








              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });

  //TERMS AND CONDITION end //


    //Privacy policy Start//
    var editPrivacypolicyForm = $('.edit-new-privacypolicy');
       if (editPrivacypolicyForm.length) {


        editPrivacypolicyForm.on('submit', function (e) {

                    // $('.ajax-loader').css("visibility", "visible");
                e.preventDefault();

                    var id = $('#edit_id').val();


                    $('#privacypolicy_edit').html('Sending..');

                        var privacy_policy_edit = CKEDITOR.instances.privacy_policy_edit.getData();





                    var formData = new FormData(this);

                    formData.append('privacy_policy_value', privacy_policy_edit);


                    $.ajax({
                        beforeSend: function(){
                            //   alert("gmlkkljkljk")
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        //data: $('#postForm').serialize(),
                        url: baseurl + '/admin/privacypolicyupdate/'+id,
                        method:"POST",
                        data:formData,
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {

                            window.location.href="{{route('privacypolicy')}}";

                            var responce = data.data[0];
                            //console.log(responce,"ertwer")


                        $('#privacypolicy_edit').html('Save');
                            // alert(JSON.stringify(data));

                                $('#search_btn').trigger('click');
                            $('body').removeClass('modal-open');
                            $('body').css('padding-right', '0px');
                            $('.modal-backdrop').remove();

                            $('#modals-edit').hide();



                        },
                        error: function (data) {
                            alert(JSON.stringify(data));
                            $('#privacypolicy_edit').html('Save Changes');
                            //newGameSidebar.modal('hide');
                            $('#search_btn').trigger('click');
                            $('body').removeClass('modal-open');
                            $('body').css('padding-right', '0px');
                            $('.modal-backdrop').remove();

                        } ,
                        complete: function(){
                            // $('.ajax-loader').css("visibility", "hidden");
                        }
                    });




    });
  }

  $(document).on('click', '.privacypolicyedit_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/privacypolicyview/'+id;

     $('#edit_id').val(id);
    $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                 // alert(data.from_date);

             CKEDITOR.instances.privacy_policy_edit.setData(data.privacy_policy);








              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });

  //Privacy policy end //
        //ABOUTUS  Start//
        var editAboutusForm = $('.edit-new-aboutus');
       if (editAboutusForm.length) {


        editAboutusForm.on('submit', function (e) {

                    // $('.ajax-loader').css("visibility", "visible");
                e.preventDefault();

                    var id = $('#edit_id').val();


                    $('#aboutus_edit').html('Sending..');

                        var aboutus_content_edit = CKEDITOR.instances.aboutus_content_edit.getData();





                    var formData = new FormData(this);

                    formData.append('aboutus_content_value', aboutus_content_edit);


                    $.ajax({
                        beforeSend: function(){
                            //   alert("gmlkkljkljk")
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        //data: $('#postForm').serialize(),
                        url: baseurl + '/admin/aboutusupdate/'+id,
                        method:"POST",
                        data:formData,
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {

                            window.location.href="{{route('aboutus')}}";

                            var responce = data.data[0];
                            //console.log(responce,"ertwer")


                        $('#aboutus_edit').html('Save');
                            // alert(JSON.stringify(data));

                                $('#search_btn').trigger('click');
                            $('body').removeClass('modal-open');
                            $('body').css('padding-right', '0px');
                            $('.modal-backdrop').remove();

                            $('#modals-edit').hide();



                        },
                        error: function (data) {
                            alert(JSON.stringify(data));
                            $('#aboutus_edit').html('Save Changes');
                            //newGameSidebar.modal('hide');
                            $('#search_btn').trigger('click');
                            $('body').removeClass('modal-open');
                            $('body').css('padding-right', '0px');
                            $('.modal-backdrop').remove();

                        } ,
                        complete: function(){
                            // $('.ajax-loader').css("visibility", "hidden");
                        }
                    });




    });
  }

  $(document).on('click', '.edit_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/admin/aboutusview/'+id;

     $('#edit_id').val(id);
    $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: [],
              url: url,
              type: "get",
              dataType: 'json',
              success: function (datav) {



                var data = datav.data;
                  //alert(JSON.stringify(data));

                 // alert(data.from_date);
                 var asset = datav.asset;

             CKEDITOR.instances.aboutus_content_edit.setData(data.aboutus_content);


             if((data.aboutus_banner=='') || (data.aboutus_banner==null))
                   {

                   }
                   else
                    {
                       $('#aboutus_banner_edit_div').html('<img src="'+asset+data.aboutus_banner+'" width="100" />');
                    }
                    $('#old_aboutus_banner').val(data.aboutus_banner);


                     if((data.aboutus_siteimage=='') || (data.aboutus_siteimage==null))
                   {

                   }
                   else
                    {
                       $('#aboutus_siteimage_edit_div').html('<img src="'+asset+data.aboutus_siteimage+'" width="100" />');
                    }
                    $('#old_aboutus_siteimage').val(data.aboutus_siteimage);





              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



    });

  //ABOUTUS End //
  // ============= Add Field ====================
var newfieldForm = $('.add-new-field');

if (newfieldForm.length) {


  newfieldForm.on('submit', function (e) {

    e.preventDefault();




        $('#field_add').html('Sending..');



      var form_data = new FormData(this);

      console.log(form_data,"add field form data")

              $.ajax({
                  beforeSend: function(){
                      $('.ajax-loader').css("visibility", "visible");
                  },
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  //data: $('#postForm').serialize(),

                  url:baseurl + '/admin/adminfieldstore',
                  method:"POST",
                  // data:new FormData(this),
                  data:form_data,
                  dataType:'JSON',
                  contentType: false,
                  cache: false,
                  processData: false,
                  success: function (data) {
                      console.log(data,"add field success");
                      window.location.href="{{ route('adminform') }}";
                      if(data.type == 'success'){
                          $('#form-input-error').html('');
                          $('#form-input-success').html('');

                          $('#field_add').html('Save');
                          // alert(JSON.stringify(data));

                          $('#search_btn').trigger('click');
                          $('body').removeClass('modal-open');
                          $('body').css('padding-right', '0px');
                          $('.modal-backdrop').remove();
                          $('#field_type').val('');
                          $('#field_name').val('');
                          $('#field_value').val('');
                          $('#field_order').val('');
                          $('#field_placeholder_value').val('');
                          $('#field_id').val('');
                          $('#field_class').val('');
                          $('#form_id').val('');
                          $('#pagemodals-add-field').hide();

                      }else if(data.type == 'error'){
                          $('#form-input-error').html('');
                          $('#form-input-success').html('');
                          $('#field_add').html('Save');
                          alert(data.message);
                      }
                  },
                  error: function (data) {
                      alert(JSON.stringify(data));
                      $('#field_add').html('Save Changes');

                      //newGameSidebar.modal('hide');
                      $('#search_btn').trigger('click');
                      $('body').removeClass('modal-open');
                      $('body').css('padding-right', '0px');
                      $('.modal-backdrop').remove();

                  } ,
                  complete: function(){
                      $('.ajax-loader').css("visibility", "hidden");
                  }
              });




          });
}
$(document).on('click', '.pageaddfield-modals', function () {
    var id = $(this).data("id");

    $('#form_id').val(id);

});

// ================ End =======================
//START FORM ADD //
var newFormForm = $('.add-new-form');


if (newFormForm.length) {
 //alert("from add");

  newFormForm.on('submit', function (e) {

    e.preventDefault();




        $('#formselect_add').html('Sending..');


        var formData = new FormData(this);

        //var content = CKEDITOR.instances.content.getData();

      var form_data = new FormData(this);

      //form_data.append('content_value', content);

              $.ajax({
                  beforeSend: function(){
                      $('.ajax-loader').css("visibility", "visible");
                  },
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  //data: $('#postForm').serialize(),

                  url:baseurl + '/admin/adminaddnewform',


                  method:"POST",
                  // data:new FormData(this),
                  data:form_data,
                  dataType:'JSON',
                  contentType: false,
                  cache: false,
                  processData: false,
                  success: function (data) {

                      window.location.href="{{ route('adminform') }}";

                      if(data.type == 'success'){
                          $('#form-input-error').html('');
                      $('#form-input-success').html('');

                  $('#formselect_add').html('Save');
                      // alert(JSON.stringify(data));

                          $('#search_btn').trigger('click');
                      $('body').removeClass('modal-open');
                      $('body').css('padding-right', '0px');
                      $('.modal-backdrop').remove();
                      $('#form_name').val('');

                      $('#page_id').val('');

                      $('#formmodals-add').hide();



                  }
                      else if(data.type == 'error'){
                          $('#form-input-error').html('');
                      $('#form-input-success').html('');
                          $('#formselect_add').html('Save');
                      alert(data.message);
                      }
                  },
                  error: function (data) {
                      alert(JSON.stringify(data));
                      $('#formselect_add').html('Save Changes');

                      //newGameSidebar.modal('hide');
                      $('#search_btn').trigger('click');
                      $('body').removeClass('modal-open');
                      $('body').css('padding-right', '0px');
                      $('.modal-backdrop').remove();

                  } ,
                  complete: function(){
                      $('.ajax-loader').css("visibility", "hidden");
                  }
              });




          });
}
//end form add //
//view form start //
$(document).on('click', '.formview-modals', function () {
    var id = $(this).data("id");
    var url = baseurl + '/admin/adminviewform/'+id;
    var form_idwisefield = $('#form_ids').val();

     $.ajax({
            beforeSend: function(){
              $('.ajax-loader').css("visibility", "visible");
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: [],
            url: url,
            type: "get",
            dataType: 'json',
            success: function (datav) {
             var data = datav.data;
               // alert(JSON.stringify(data));
             // console.log(data.field_data.length,"dsfgsdoifgusoiduf");
             var field_datalist = data.field_data;


               var htmlcont = '';
               htmlcont=htmlcont+'<div class="table-responsive">';
               htmlcont=htmlcont+'<table class="table form_fields"  width="100%" cell-padding="10" cell-spacing="10">';
              htmlcont=htmlcont+'<thead>';
               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<th>';
               htmlcont=htmlcont+'Form Name';
               htmlcont=htmlcont+'</th>';
               htmlcont=htmlcont+'<th>';
               htmlcont=htmlcont+'Field Type';
               htmlcont=htmlcont+'</th>';
               htmlcont=htmlcont+'<th>';
               htmlcont=htmlcont+'Field Name';
               htmlcont=htmlcont+'</th>';
               htmlcont=htmlcont+'<th>';
               htmlcont=htmlcont+'Field Value';
               htmlcont=htmlcont+'</th>';
               htmlcont=htmlcont+'<th>';
               htmlcont=htmlcont+'Field Option Value';
               htmlcont=htmlcont+'</th>';
               htmlcont=htmlcont+'<th>';
               htmlcont=htmlcont+'Field Order';
               htmlcont=htmlcont+'</th>';
               htmlcont=htmlcont+'<th>';
               htmlcont=htmlcont+'Field Placeholder Value';
               htmlcont=htmlcont+'</th>';
               htmlcont=htmlcont+'<th>';
               htmlcont=htmlcont+'Field Id';
               htmlcont=htmlcont+'</th>';
               htmlcont=htmlcont+'<th>';
               htmlcont=htmlcont+'Field Class';
               htmlcont=htmlcont+'</th>';
               htmlcont=htmlcont+'<th>';
               htmlcont=htmlcont+'Action';
               htmlcont=htmlcont+'</th>';
               htmlcont=htmlcont+'</tr>';

               htmlcont=htmlcont+'</thead>';
               htmlcont=htmlcont+'<tbody>';
               let text = "";
             for (let i = 0; i < field_datalist.length; i++) {
               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+data.form.form_name;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+field_datalist[i].field_type;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+field_datalist[i].field_name;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+field_datalist[i].field_value;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+field_datalist[i].field_option_value;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+field_datalist[i].field_order;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+field_datalist[i].field_placeholder_value;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+field_datalist[i].field_id;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+field_datalist[i].field_class;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'<span onclick="fielddelete('+field_datalist[i].id+')" class="btn btn-danger">';
               htmlcont=htmlcont+'Delete';

              //  htmlcont=htmlcont+field_datalist[i].id;


               htmlcont=htmlcont+'</span>';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';

}

               htmlcont=htmlcont+'</tbody>';











               htmlcont=htmlcont+'</table>';
               htmlcont=htmlcont+'</div>';

                $('#details_modal_body_content').html(htmlcont);





            },
            error: function (data) {
                alert(JSON.stringify(data));
                console.log( data);

            } ,
            complete: function(){
              $('.ajax-loader').css("visibility", "hidden");
            }
        });



  });

  function valuePass(form_ids)
    {

      $('#form_ids').val(form_ids);
    }
     //start form field delete //
    function fielddelete(id)
    {
    //alert(id);





//var id = $('#delete_id').val();
var url = baseurl + '/admin/adminformfielddelete/'+id;

//alert(url);

$.ajax({
    beforeSend: function(){
      $('.ajax-loader').css("visibility", "visible");
    },
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: [],
    url: url,
    type: "post",
    dataType: 'json',
    success: function (data) {
      window.location.href="{{ route('adminform') }}";
       $('#search_btn').trigger('click');
       $('body').removeClass('modal-open');
      $('body').css('padding-right', '0px');
      $('.modal-backdrop').remove();

      $('#formmodals-delete').modal('hide');






    },
    error: function (data) {
        alert(JSON.stringify(data));
        console.log( data);

    } ,
    complete: function(){
      $('.ajax-loader').css("visibility", "hidden");
    }
});





//end form field delete  //
    }

//view form end//

//start edit form //
$(document).on('click', '.formedit_modal', function () {
    var id = $(this).data("id");

    var url = baseurl + '/admin/adminviewform/'+id;

    //alert(id) ;

    //alert(baseurl);
    //alert(id);


    $('#formedit_id').val(id);




     $.ajax({
            beforeSend: function(){
              $('.ajax-loader').css("visibility", "visible");
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: [],
            url: url,
            type: "get",
            dataType: 'json',
            success: function (datav) {



              var data = datav.data;
               //alert(JSON.stringify(data));

               // alert(data.from_date);
              $('#form_name_edit').val(data.form.form_name);
                },
            error: function (data) {
                alert(JSON.stringify(data));
                console.log( data);

            } ,
            complete: function(){
              $('.ajax-loader').css("visibility", "hidden");
            }
        });



  });


var editFormForm = $('.edit-new-form');
if (editFormForm.length) {


  editFormForm.on('submit', function (e) {

e.preventDefault();

  var id = $('#formedit_id').val();


    $('#form_edit').html('Sending..');


var formData = new FormData(this);



   // var formData = new FormData(this);

    $.ajax({
        beforeSend: function(){
          $('.ajax-loader').css("visibility", "visible");
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        //data: $('#postForm').serialize(),
        url: baseurl + '/admin/adminformupdate/'+id,
        method:"POST",
        data:formData,
      //    data:new FormData(this),
         dataType:'JSON',
         contentType: false,
         cache: false,
         processData: false,
        success: function (data) {
          window.location.href="{{ route('adminform') }}";
          if(data.type == 'success'){
              $('#form-input-error').html('');
           $('#form-input-success').html('');

         $('#form_edit').html('Save');
             //alert(JSON.stringify(data));

              $('#search_btn').trigger('click');
           $('body').removeClass('modal-open');
          $('body').css('padding-right', '0px');
          $('.modal-backdrop').remove();
          $('#form_name_edit').val('');
          $('#page_id_edit').val('');

          $('#formmodals-edit').hide();
      }
          else if(data.type == 'error'){
              $('#form-input-error').html('');
           $('#form-input-success').html('');
              $('#form_edit').html('Save');
           alert(data.message);
          }

        },
        error: function (data) {
            alert(JSON.stringify(data));
            $('#form_edit').html('Save Changes');
             //newGameSidebar.modal('hide');
          $('#search_btn').trigger('click');
           $('body').removeClass('modal-open');
          $('body').css('padding-right', '0px');
          $('.modal-backdrop').remove();

        } ,
        complete: function(){
          $('.ajax-loader').css("visibility", "hidden");
        }
    });




});
}

//end edit form //
//start delete form //

$(document).on('click', '#form_delete', function () {


var id = $('#delete_id').val();
var url = baseurl + '/admin/adminformdelete/'+id;

// alert(url);

$.ajax({
    beforeSend: function(){
      $('.ajax-loader').css("visibility", "visible");
    },
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: [],
    url: url,
    type: "post",
    dataType: 'json',
    success: function (data) {
      window.location.href="{{ route('adminform') }}";
       $('#search_btn').trigger('click');
       $('body').removeClass('modal-open');
      $('body').css('padding-right', '0px');
      $('.modal-backdrop').remove();

      $('#formmodals-delete').modal('hide');






    },
    error: function (data) {
        alert(JSON.stringify(data));
        console.log( data);

    } ,
    complete: function(){
      $('.ajax-loader').css("visibility", "hidden");
    }
});



});

//end delete form //


//END FORM  //

//start delete form //

$(document).on('click', '#enquiry_delete', function () {


var id = $('#delete_id').val();
var url = baseurl + '/admin/enquirydelete/'+id;

// alert(url);

$.ajax({
    beforeSend: function(){
      $('.ajax-loader').css("visibility", "visible");
    },
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: [],
    url: url,
    type: "post",
    dataType: 'json',
    success: function (data) {
      window.location.href="{{ route('enquiry') }}";
       $('#search_btn').trigger('click');
       $('body').removeClass('modal-open');
      $('body').css('padding-right', '0px');
      $('.modal-backdrop').remove();

      $('#enquirymodals-delete').modal('hide');






    },
    error: function (data) {
        alert(JSON.stringify(data));
        console.log( data);

    } ,
    complete: function(){
      $('.ajax-loader').css("visibility", "hidden");
    }
});



});

//end delete form //


function getfieldtype(value){
if(value == "input"){
   $(".fieldinput").show();
   $(".fieldselect").hide();
   $(".fieldradio").hide();
   $(".fieldcheckbox").hide();

}
if(value == "dropdown"){
   $(".fieldselect").show();
   $(".fieldinput").hide();
   $(".fieldradio").hide();
   $(".fieldcheckbox").hide();

}
if(value == "radio"){
   $(".fieldradio").show();
   $(".fieldselect").hide();
   $(".fieldinput").hide();
   $(".fieldcheckbox").hide();

}
if(value == "checkbox"){
   $(".fieldcheckbox").show();
   $(".fieldselect").hide();
   $(".fieldinput").hide();
   $(".fieldradio").hide();
}
}


    </script>
</body>











<script>

  $(function () {

    $("#example1").DataTable({

      // "responsive": true, "lengthChange": false, "autoWidth": false,

      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({

      "paging": false,

      "lengthChange": false,

      "searching": false,

      "ordering": true,

      "info": true,

      "autoWidth": false,

      "responsive": true,

    });

  });



</script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>

CKEDITOR.replace('contents', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('contents_edit', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('descriptions', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('descriptions_edit', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('terms_contents_edit', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('privacy_policy_edit', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('aboutus_content_edit', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });


    <?php
if(Route::currentRouteName()=='company')
 {
 ?>

    CKEDITOR.replace('home_page_short_description_edit', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('footer_text_edit', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('header_text_edit', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
<?php } ?>
</script>

</script>
</body>

</html>

