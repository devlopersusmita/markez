<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
    $company_settings = \App\Models\CompanySetting::first();


    ?>
    <title>{{$company_settings->name}}</title>
    <link rel="icon" type="image/png" href="{{$company_settings->fav_icon!= ''?asset($company_settings->fav_icon):asset('assets/img/favicon.png')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KQHJPZP');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

    <!-- Google fonts -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/core.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">


    <!-- start 31.07.23 -->
    <link rel="stylesheet"  href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- end 31.07.23 -->

</head>

<body class="is-white">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQHJPZP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Pageloader -->
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>

    @include('theme.institution.header')
@yield('content')

    </div>

    <!-- Concatenated js plugins and jQuery -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('assets/data/tipuedrop_content.js')}}"></script>

    <!-- Core js -->
    <script src="{{asset('assets/js/global.js')}}"></script>

    <!-- Navigation options js -->
    <script src="{{asset('assets/js/navbar-v1.js')}}"></script>
    <script src="{{asset('assets/js/navbar-v2.js')}}"></script>
    <script src="{{asset('assets/js/navbar-mobile.js')}}"></script>
    <script src="{{asset('assets/js/navbar-options.js')}}"></script>
    <script src="{{asset('assets/js/sidebar-v1.js')}}"></script>

    <!-- Core instance js -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/chat.js')}}"></script>
    <script src="{{asset('assets/js/touch.js')}}"></script>
    <script src="{{asset('assets/js/tour.js')}}"></script>

    <!-- Components js -->
    <script src="{{asset('assets/js/explorer.js')}}"></script>
    <script src="{{asset('assets/js/widgets.js')}}"></script>
    <script src="{{asset('assets/js/modal-uploader.js')}}"></script>
    <script src="{{asset('assets/js/popovers-users.js')}}"></script>
    <script src="{{asset('assets/js/popovers-pages.js')}}"></script>
    <script src="{{asset('assets/js/lightbox.js')}}"></script>

    <!-- Landing page js -->
    <script src="{{asset('assets/js/landing.js')}}"></script>
    <script src="{{asset('assets/js/shop.js')}}"></script>

    <!-- Signup page js -->

        <!-- 31.07.23 -->


	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/sidebar.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>


    <!-- end 31.07.23 -->

    <!-- Feed pages js -->

    <!-- profile js -->

    <!-- stories js -->

    <!-- friends js -->

    <!-- questions js -->

    <!-- video js -->

    <!-- events js -->

    <!-- news js -->

    <!-- shop js -->

    <!-- inbox js -->

    <!-- settings js -->

    <!-- map page js -->

    <!-- elements page js -->


    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script>
    setTimeout(function(){
      $('#alert').slideUp();
    },4000);
  </script>
  <input type="hidden" id="baseurl" value="{{url('/')}}" />
    <script>

       var  baseurl =$('#baseurl').val();



        $.ajaxSetup({

           headers: {

               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

           }

       });


 $(document).on('click', '.view_modal', function () {
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




                 var htmlcont = '';
                 htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';





                    htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td colspan="2">';
                 htmlcont=htmlcont+'<div class="cover-bg-2">';


                    htmlcont=htmlcont+'<img id="background_image_id" class="cover-image bg-image" src="'+background_image+'"  alt="">';



                    htmlcont=htmlcont+'<div class="avatar">';

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

    $(document).on('click', '.send_modal', function () {
      var id = $(this).data("id");
       $('#send_id').val(id);

       var type = $(this).data("type");
       $('#send_type').val(type);



    });

    $(document).on('click', '.delete_modal', function () {
      var id = $(this).data("id");
       $('#delete_id').val(id);

       var type = $(this).data("type");
       $('#delete_type').val(type);



    });

     $(document).on('click', '.approve_modal', function () {
      var id = $(this).data("id");
       $('#approve_id').val(id);

       var type = $(this).data("type");
       $('#approve_type').val(type);



    });

      $(document).on('click', '.student_send', function () {


        var id = $('#send_id').val();
        var type = $('#send_type').val();
      var url = baseurl + '/institutionstudentstudentsend/'+id+'/'+type;

      $('#loading_student_send').show();

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

                 $('#search_btn_'+type).trigger('click');
                  $('#search_btn_private_pending').trigger('click');

                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-send').hide();
                $('#loading_student_send').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_student_send').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_student_send').hide();
              }
          });



      });

      $(document).on('click', '.student_delete', function () {


        var id = $('#delete_id').val();
        var type = $('#delete_type').val();
      var url = baseurl + '/institutionstudentstudentdelete/'+id+'/'+type;

      $('#loading_student_delete').show();

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

                 $('#search_btn_'+type).trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-delete').hide();
                $('#loading_student_delete').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_student_delete').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_student_delete').hide();
              }
          });



      });

       $(document).on('click', '.student_approve', function () {


        var id = $('#approve_id').val();
        var type = $('#approve_type').val();
      var url = baseurl + '/institutionstudentstudentapprove/'+id+'/'+type;

      $('#loading_student_approve').show();

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

                 $('#search_btn_'+type).trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-approve').hide();
                $('#loading_student_approve').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_student_approve').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_student_approve').hide();
              }
          });



      });


 $(document).on('click', '.view_modal_it', function () {
      var id = $(this).data("id");

      var url = baseurl + '/teacherview/'+id;

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



                var users = datav.data.users;
                var user_details = datav.data.user_details;
                var asset_path = datav.data.asset_path;
                var background_image = datav.data.background_image;
                var avatar = datav.data.avatar;





                 var htmlcont = '';
                 htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';


                    htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td colspan="2">';
                 htmlcont=htmlcont+'<div class="cover-bg-2">';


                    htmlcont=htmlcont+'<img id="background_image_id" class="cover-image bg-image" src="'+background_image+'"  alt="">';


                    htmlcont=htmlcont+'<div class="avatar">';

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


                  $('#details_modal_body_content_it').html(htmlcont);





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

    $(document).on('click', '.send_modal_it', function () {
      var id = $(this).data("id");
       $('#send_id_it').val(id);

       var type = $(this).data("type");
       $('#send_type_it').val(type);



    });

    $(document).on('click', '.delete_modal_it', function () {
      var id = $(this).data("id");
       $('#delete_id_it').val(id);

       var type = $(this).data("type");
       $('#delete_type_it').val(type);



    });

     $(document).on('click', '.approve_modal_it', function () {
      var id = $(this).data("id");
       $('#approve_id_it').val(id);

       var type = $(this).data("type");
       $('#approve_type_it').val(type);



    });

      $(document).on('click', '.teacher_send_it', function () {


        var id = $('#send_id_it').val();
        var type = $('#send_type_it').val();
      var url = baseurl + '/institutionteacherteachersend/'+id+'/'+type;

      $('#loading_teacher_send_it').show();

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

                 $('#search_btn_'+type+'_it').trigger('click');
                  $('#search_btn_private_pending_it').trigger('click');

                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-send_it').hide();
                $('#loading_teacher_send_it').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_teacher_send_it').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_teacher_send_it').hide();
              }
          });



      });

      $(document).on('click', '.teacher_delete_it', function () {


        var id = $('#delete_id_it').val();
        var type = $('#delete_type_it').val();
      var url = baseurl + '/institutionteacherteacherdelete/'+id+'/'+type;

      $('#loading_teacher_delete_it').show();

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

                 $('#search_btn_'+type+'_it').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-delete_it').hide();
                $('#loading_teacher_delete_it').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_teacher_delete_it').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_teacher_delete_it').hide();
              }
          });



      });

       $(document).on('click', '.teacher_approve_it', function () {


        var id = $('#approve_id_it').val();
        var type = $('#approve_type_it').val();
      var url = baseurl + '/institutionteacherteacherapprove/'+id+'/'+type;

      $('#loading_teacher_approve_it').show();

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

                 $('#search_btn_'+type+'_it').trigger('click');
                 $('#search_btn_public_it').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-approve_it').hide();
                $('#loading_teacher_approve_it').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_teacher_approve_it').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_teacher_approve_it').hide();
              }
          });



      });


    $(document).on("click", "#pagination_private_pending a,#search_btn_private_pending", function(event) {
          event.preventDefault();

          $("#pagination_data_private_pending").html('<center><img src="'+baseurl+'/frontend/images/loadingpleasewait.gif" width="80" /></center>');

          //get url and make final url for ajax
          var url = $(this).attr("href");
          var append = url.indexOf("?") == -1 ? "?" : "&";
          var finalURL = url + append + $("#searchform_private_pending").serialize();
          //alert(finalURL);
          //set to current url
          //window.history.pushState({}, null, finalURL);

          $.ajax({
              type : 'GET',
              url : finalURL,
              dataType : 'html',
              data: {
                'tab_type':'private_pending'

              },
              success : function(data){
                   //alert(data);

                   $("#pagination_data_private_pending").html(data);
              },
              error : function(data) {
                  alert('Errors');
                  alert(JSON.stringify(data));
              }
          });
      });

    $(document).on("click", "#pagination_private_sending a,#search_btn_private_sending", function(event) {
          event.preventDefault();

          $("#pagination_data_private_sending").html('<center><img src="'+baseurl+'/frontend/images/loadingpleasewait.gif" width="80" /></center>');

          //get url and make final url for ajax
          var url = $(this).attr("href");
          var append = url.indexOf("?") == -1 ? "?" : "&";
          var finalURL = url + append + $("#searchform_private_sending").serialize();
          //alert(finalURL);
          //set to current url
          //window.history.pushState({}, null, finalURL);

          $.ajax({
              type : 'GET',
              url : finalURL,
              dataType : 'html',
              data: {
                'tab_type':'private_sending'

              },
              success : function(data){
                   //alert(data);

                   $("#pagination_data_private_sending").html(data);
              },
              error : function(data) {
                  alert('Errors');
                  alert(JSON.stringify(data));
              }
          });
      });

    $(document).on("click", "#pagination_private_receiving a,#search_btn_private_receiving", function(event) {
          event.preventDefault();

          $("#pagination_data_private_receiving").html('<center><img src="'+baseurl+'/frontend/images/loadingpleasewait.gif" width="80" /></center>');

          //get url and make final url for ajax
          var url = $(this).attr("href");
          var append = url.indexOf("?") == -1 ? "?" : "&";
          var finalURL = url + append + $("#searchform_private_receiving").serialize();
          //alert(finalURL);
          //set to current url
          //window.history.pushState({}, null, finalURL);

          $.ajax({
              type : 'GET',
              url : finalURL,
              dataType : 'html',
              data: {
                'tab_type':'private_receiving'

              },
              success : function(data){
                   //alert(data);

                   $("#pagination_data_private_receiving").html(data);
              },
              error : function(data) {
                  alert('Errors');
                  alert(JSON.stringify(data));
              }
          });
      });

    $(document).on("click", "#pagination_public a,#search_btn_public", function(event) {
          event.preventDefault();

          $("#pagination_data_public").html('<center><img src="'+baseurl+'/frontend/images/loadingpleasewait.gif" width="80" /></center>');

          //get url and make final url for ajax
          var url = $(this).attr("href");
          var append = url.indexOf("?") == -1 ? "?" : "&";
          var finalURL = url + append + $("#searchform_public").serialize();
          //alert(finalURL);
          //set to current url
          //window.history.pushState({}, null, finalURL);

          $.ajax({
              type : 'GET',
              url : finalURL,
              dataType : 'html',
              data: {
                'tab_type':'public'

              },
              success : function(data){
                   //alert(data);

                   $("#pagination_data_public").html(data);
              },
              error : function(data) {
                  alert('Errors');
                  alert(JSON.stringify(data));
              }
          });
      });

    $(document).on("click", "#pagination_private_pending_it a,#search_btn_private_pending_it", function(event) {
          event.preventDefault();

          $("#pagination_data_private_pending_it").html('<center><img src="'+baseurl+'/frontend/images/loadingpleasewait.gif" width="80" /></center>');

          //get url and make final url for ajax
          var url = $(this).attr("href");
          var append = url.indexOf("?") == -1 ? "?" : "&";
          var finalURL = url + append + $("#searchform_private_pending_it").serialize();
          //alert(finalURL);
          //set to current url
          //window.history.pushState({}, null, finalURL);

          $.ajax({
              type : 'GET',
              url : finalURL,
              dataType : 'html',
              data: {
                'tab_type':'private_pending'

              },
              success : function(data){
                   //alert(data);

                   $("#pagination_data_private_pending_it").html(data);
              },
              error : function(data) {
                  alert('Errors');
                  alert(JSON.stringify(data));
              }
          });
      });

    $(document).on("click", "#pagination_private_sending_it a,#search_btn_private_sending_it", function(event) {
          event.preventDefault();

          $("#pagination_data_private_sending_it").html('<center><img src="'+baseurl+'/frontend/images/loadingpleasewait.gif" width="80" /></center>');

          //get url and make final url for ajax
          var url = $(this).attr("href");
          var append = url.indexOf("?") == -1 ? "?" : "&";
          var finalURL = url + append + $("#searchform_private_sending_it").serialize();
          //alert(finalURL);
          //set to current url
          //window.history.pushState({}, null, finalURL);

          $.ajax({
              type : 'GET',
              url : finalURL,
              dataType : 'html',
              data: {
                'tab_type':'private_sending'

              },
              success : function(data){
                   //alert(data);

                   $("#pagination_data_private_sending_it").html(data);
              },
              error : function(data) {
                  alert('Errors');
                  alert(JSON.stringify(data));
              }
          });
      });

    $(document).on("click", "#pagination_private_receiving_it a,#search_btn_private_receiving_it", function(event) {
          event.preventDefault();

          $("#pagination_data_private_receiving_it").html('<center><img src="'+baseurl+'/frontend/images/loadingpleasewait.gif" width="80" /></center>');

          //get url and make final url for ajax
          var url = $(this).attr("href");
          var append = url.indexOf("?") == -1 ? "?" : "&";
          var finalURL = url + append + $("#searchform_private_receiving_it").serialize();
          //alert(finalURL);
          //set to current url
          //window.history.pushState({}, null, finalURL);

          $.ajax({
              type : 'GET',
              url : finalURL,
              dataType : 'html',
              data: {
                'tab_type':'private_receiving'

              },
              success : function(data){
                   //alert(data);

                   $("#pagination_data_private_receiving_it").html(data);
              },
              error : function(data) {
                  alert('Errors');
                  alert(JSON.stringify(data));
              }
          });
      });

    $(document).on("click", "#pagination_public_it a,#search_btn_public_it", function(event) {
          event.preventDefault();

          $("#pagination_data_public_it").html('<center><img src="'+baseurl+'/frontend/images/loadingpleasewait.gif" width="80" /></center>');

          //get url and make final url for ajax
          var url = $(this).attr("href");
          var append = url.indexOf("?") == -1 ? "?" : "&";
          var finalURL = url + append + $("#searchform_public_it").serialize();
          //alert(finalURL);
          //set to current url
          //window.history.pushState({}, null, finalURL);

          $.ajax({
              type : 'GET',
              url : finalURL,
              dataType : 'html',
              data: {
                'tab_type':'public'

              },
              success : function(data){
                   //alert(data);

                   $("#pagination_data_public_it").html(data);
              },
              error : function(data) {
                  alert('Errors');
                  alert(JSON.stringify(data));
              }
          });
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


    // course start //

    // $(document).on("click", "#add-new-course-link", function(event) {
    //    $('#modals-add').modal('show');

    //    });

     var newCourseForm = $('.add-new-course');
     var editCourseForm = $('.edit-new-course');


  if (newCourseForm.length) {


    newCourseForm.on('submit', function (e) {

      e.preventDefault();

// console.log(baseurl)


          $('#course_add').html('Sending..');


          var formData = new FormData(this);
        //   newurl = baseurl.replaceAll(" ",'') + '/institutioncoursestore'

         var description = CKEDITOR.instances.description.getData();

        var form_data = new FormData(this);

        form_data.append('description_value', description);
        $('#form-input-error').html('');
           $('#form-input-success').html('');


         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url:baseurl + '/institutioncoursestore',
               method:"POST",
               //data:new FormData(this),
               data:form_data,
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {


                window.location.href=`/institutioncourse?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;


                if(data.type == 'success'){
                    $('#form-input-error').html('');
                 $('#form-input-success').html('');
                    $('#course_add').html('Save');
                  // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                //  $('body').removeClass('modal-open');
                // $('body').css('padding-right', '0px');
                // $('.modal-backdrop').remove();
                $('#title').val('');
                $('#category_id').val('');
                $('#status').val('');
                $('#description').val('');
                $('#students_limit').val('');
                $('#price').val('');
                $('#type').val('');
                $('#start_date').val('');
                $('#end_date').val('');
                $('#preview_image').val('');
                $('#preview_video').val('');
                $('#tags').val('');
                $('#visibility').val('');
                // $('#modals-add').hide();
                $('#modals-add').modal('hide');
                }
                else if(data.type == 'error'){
                    $('#form-input-error').html(data.message);
                 $('#form-input-success').html('')
                    $('#course_add').html('Save');
                 alert(data.message);
                }



              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#course_add').html('Save Changes');

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

   if (editCourseForm.length) {


    editCourseForm.on('submit', function (e) {

      e.preventDefault();

        var id = $('#edit_id').val();


          $('#course_edit').html('Sending..');

           var description_edit = CKEDITOR.instances.description_edit.getData();

          var formData = new FormData(this);



          formData.append('description_value', description_edit);

          //alert(JSON.stringify(formData));

          $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url: baseurl + '/institutioncourseupdate/'+id,
              method:"POST",
               data:formData,
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {

               $('#course_edit').html('Save');
               window.location.href=`/institutioncourse?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;

                  // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                $('#title_edit').val('');
                $('#description_edit').val('');
                $('#status_edit').val('');
                $('#category_id_edit').val('');
               // $('#teacher_id_edit').val('');
                $('#students_limit_edit').val('');
                $('#price_edit').val('');
                $('#type_edit').val('');
                $('#preview_image_edit').val('');
                $('#start_date_edit').val('');
                $('#visibility_edit').val('');
                 $('#is_fully_complete_edit').val('');
                $('#tags_edit').val('');
                $('#preview_video_edit').val('');
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


     $(document).on('click', '#course_statuschange', function () {


        var id = $('#statuschange_id').val();
         var status = $('#statuschange_status').val();
      var url = baseurl + '/institutioncoursestatus/'+id+'/'+status;

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
                //alert('success');
                  //alert(JSON.stringify(data));
                  $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-statuschange').hide();



              },
              error: function (data) {
                  // alert('error');
                  // alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });



      });



    $(document).on('click', '#course_delete', function () {


        var id = $('#delete_id').val();
      var url = baseurl + '/institutioncoursedelete/'+id;


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

                $('#modals-delete').hide();


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

     $(document).on('click', '.setup_modal', function () {
      var id = $(this).data("id");

      $("#commission_percentage_message_div").html('');

        var url = baseurl + '/institutioncourcecommissionpercentage/'+id;
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
              success: function (datav) {

                //alert(JSON.stringify(data));

                var data = datav.data;
                  //alert(JSON.stringify(data));

                   var htmlcont = '';
                 htmlcont=htmlcont+'<table class="table table-border"  width="100%" cell-padding="10" cell-spacing="10">';
                  htmlcont=htmlcont+'<tr>';
                    htmlcont=htmlcont+'<th>';
                    htmlcont=htmlcont+'Name';
                    htmlcont=htmlcont+'</th>';
                    htmlcont=htmlcont+'<th>';
                    htmlcont=htmlcont+'Percentage';
                    htmlcont=htmlcont+'</th>';
                    htmlcont=htmlcont+'</tr>';

                  var total_percentage = 0;

                  var teacher_ids_array = [];

                 if(data.length > 0)
                 {
                  for(var aa=0; aa < data.length ; aa++)
                  {


                    var temp = data[aa];
                    htmlcont=htmlcont+'<tr>';
                    htmlcont=htmlcont+'<td>';
                     htmlcont=htmlcont+temp.name;
                    htmlcont=htmlcont+'</td>';
                    htmlcont=htmlcont+'<td>';
                    htmlcont=htmlcont+'<input type="text" class="commission_percentage" id="commission_percentage_'+temp.id+'" value="'+temp.commission_percentage+'" />';
                    htmlcont=htmlcont+'</td>';
                    htmlcont=htmlcont+'</tr>';

                    var temp_percentage = temp.commission_percentage;
                    temp_percentage = parseFloat(temp_percentage);
                    total_percentage = total_percentage + temp_percentage;

                    teacher_ids_array.push(temp.id);


                  }
                 }
                  htmlcont=htmlcont+'<tr>';
                    htmlcont=htmlcont+'<th>';
                    htmlcont=htmlcont+'<h2>Total</h2>';
                    htmlcont=htmlcont+'</th>';
                    htmlcont=htmlcont+'<th>';
                    htmlcont=htmlcont+'<h2><div id="commission_percentage">'+total_percentage+'</div></h2>';
                    htmlcont=htmlcont+'</th>';
                    htmlcont=htmlcont+'</tr>';
                 htmlcont=htmlcont+'</table>';

                // alert(teacher_ids_array);
                 var teacher_ids = teacher_ids_array.join(',');

                 $('#commission_percentage_div').html(htmlcont);

                  $('#course_setup_course_id').val(id);
                  $('#course_setup_teacher_ids').val(teacher_ids);



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


      $(document).on('click', '#course_setup', function () {

          var course_id = $('#course_setup_course_id').val();
          var teacher_ids =$('#course_setup_teacher_ids').val();
          var all_teacher_id_array = [];
          var outputarray = [];
          if(teacher_ids!='')
          {
            all_teacher_id_array = teacher_ids.split(',');
            if(all_teacher_id_array.length > 0)
            {
              for(var p=0; p < all_teacher_id_array.length; p++)
              {
                var temp_teacher_id = all_teacher_id_array[p];

                var temp_commission_percentage =$('#commission_percentage_'+temp_teacher_id).val();

                outputarray.push(temp_teacher_id+'@@'+temp_commission_percentage);

              }
            }
          }

          var outputstr =  outputarray.join('::');
          //alert(outputstr);
           var url = baseurl + '/institutioncourcecommissionpercentagesave/'+course_id+'/'+outputstr;
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

                //alert('success');

                $("#commission_percentage_message_div").html(data.message);

                //alert(JSON.stringify(data));




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

     $(document).on('keyup', '.commission_percentage', function () {
      var total_commission_percentage = 0;
           $(".commission_percentage").each(function(){
            var localval = ($(this).val());
            localval = parseFloat(localval);
            total_commission_percentage=total_commission_percentage+localval ;

          });
           //alert(total_commission_percentage);

           $('#commission_percentage').html(total_commission_percentage);
           if(total_commission_percentage >= 100)
           {
            alert('All total percentage couldn\'t be more than 100%');

             $('#course_setup').hide();
           }
           else
           {
             $('#course_setup').show();
           }
     });
     $(document).on('click', '.statuschange_modal', function () {
      var id = $(this).data("id");
      var status = $(this).data("status");
      if(status=='active')
      {
        $('#course_status_span').html('<span class="alert-success p-2">Active</span>');
      }
      else if(status=='inactive')
      {
        $('#course_status_span').html('<span class="alert-danger p-2">Inactive</span>');
      }


       $('#statuschange_id').val(id);
       $('#statuschange_status').val(status);



    });

    $(document).on('click', '.delete_modal', function () {
      var id = $(this).data("id");
       $('#delete_id').val(id);

    });


   $(document).on('click', '.view_modal_course', function () {
      var id = $(this).data("id");

      var url = baseurl + '/institutioncourseview/'+id;

    //  alert(baseurl) ;

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

                var asset = datav.asset;
                //alert(asset);
                  //alert(JSON.stringify(data));
                 var category_name = datav.category_name;
                 var teacher_id = datav.course_teachers_user_id;
                // alert(teacher_id);


                 //var previewimage  = data.preview_image;
                 var preview_image = datav.data.preview_image;
                 //alert(preview_image);
                 var previewvideo  = data.preview_video;

                 var sd = data.start_date;
              var sdar = sd.split(' ');
              var s_date = sdar[0];

              var ed = data.end_date;
              var edar = ed.split(' ');
              var e_date = edar[0];

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

               var visibility = "";
               if(data.visibility=='1')
               {
                  var visibility = "<span class='text-success'>Yes</span>";
               }
               else if(data.visibility=='0')
               {
                  var visibility = "<span class='text-danger'>No</span>";
               }

               var is_fully_complete = "";
               if(data.is_fully_complete=='1')
               {
                  var is_fully_complete = "<span class='text-success'>Yes</span>";
               }
               else if(data.is_fully_complete=='0')
               {
                  var is_fully_complete = "<span class='text-danger'>No</span>";
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
                 htmlcont=htmlcont+'Description';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.description;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Category';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+category_name;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Teacher';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+teacher_id;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Student Limit';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.students_limit;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';



                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Preview Image';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                    if((datav.preview_image=='') || (datav.preview_image==null))
                   {

                   }
                   else
                   {

                 htmlcont=htmlcont+`<img src=${datav.preview_image} width="220" height="140" >`;
                   }
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';


                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Preview Video';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';

                     if((data.preview_video=='') || (data.preview_video==null))
                   {
                   }
                   else
                   {
                 htmlcont=htmlcont+`<video width="320" height="240" controls>
  <source src=${previewvideo} type="video/mp4"></video>`;
  }
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';


                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Price';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.price;
                 htmlcont=htmlcont+'{{env('CURRENCY')}}';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';



                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Type';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.type;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Visibility';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+visibility;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';



                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'complete';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+is_fully_complete;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Start Date';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+s_date;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'End Date';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+e_date;
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

      var url = baseurl + '/institutioncourseview/'+id;

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


                var course_teacher_ids = datav.course_teacher_ids;

                //alert(JSON.stringify(data));
                //alert(course_teacher_ids);

                  //alert(data.from_date);
                  var sd = data.start_date;
                  var sdar = sd.split(' ');
                  var s_date = sdar[0];
                 // alert(s_date);
                 var ed = data.end_date;
                  var edar = ed.split(' ');
                  var e_date = edar[0];

                  var preview_image = datav.data.preview_image;

                  //alert(preview_image);
                  //alert(JSON.stringify(datav));


var asset = datav.asset_path;
//alert(asset);





                  $('#title_edit').val(data.title);
                  $('#status_edit').val(data.status);
                  //$('#description_edit').val(data.description);
                  CKEDITOR.instances.description_edit.setData(data.description);

                  $('#category_id_edit').val(data.category_id);
                 // $('#teacher_id_edit').val(datav.course_teachers_user_id);


                 //$("#teacher_id_edit").val(course_teacher_ids);


                  $('#students_limit_edit').val(data.students_limit);
                  $('#price_edit').val(data.price);
                  $('#type_edit').val(data.type);
                 $('#visibility_edit').val(data.visibility);
                 $('#is_fully_complete_edit').val(data.is_fully_complete);
                  $('#tags_edit').val(data.tags);
                //   alert(asset);
                //   alert(data.asset);
                $('#old_preview_image').val(`${data.preview_image}`);
                   if((datav.preview_image=='') || (datav.preview_image==null))
                   {

                   }
                   else
                    {
                     // var ultiimg = asset+previewimage;
                     $('#preview_image_edit_div').html('<img src="'+datav.preview_image+'" width="100" />');
                    }

                   $('#preview_video_edit').val(data.preview_video);
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

       //institutioncoursecontent ///

      $(document).on('click', '.coursecontentview_modal', function () {
    var id = $(this).data("id");

    var url = baseurl + '/institutioncoursecontentview/'+id;

  //  alert(baseurl) ;

   // alert(baseurl);
    //alert(id)

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






               var htmlcont = '';
               htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';

                var content  = data.content;


                var sd = data.start_date;
              var sdar = sd.split(' ');
              var s_date = sdar[0];

              var ed = data.end_date;
              var edar = ed.split(' ');
              var e_date = edar[0];




             var status = "";
             if(data.status=='active')
             {
                var status = "<span class='text-success'>Active</span>";
             }
             else if(data.status=='inactive')
             {
                var status = "<span class='text-danger'>Inactive</span>";
             }


             var visibility = "";
               if(data.visibility=='1')
               {
                  var visibility = "<span class='text-success'>Yes</span>";
               }
               else if(data.visibility=='0')
               {
                  var visibility = "<span class='text-danger'>No</span>";
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
                 htmlcont=htmlcont+'Description';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.description;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

               htmlcont=htmlcont+'<tr>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+'Type';
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'<td>';
               htmlcont=htmlcont+data.type;
               htmlcont=htmlcont+'</td>';
               htmlcont=htmlcont+'</tr>';

               htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Course';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.course_title;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                  if(data.type == 'text')
                  {
                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Content';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+content;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';
                  }



                htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Visibility';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+visibility;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';


                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Start Date';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+s_date;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'End Date';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+e_date;
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

$(document).on('click', '.view_modal_quize', function () {
      var id = $(this).data("id");

      var url = baseurl + '/institutioncoursecontentquizeview/'+id;


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

                   //var temp[0]= stri.split('start_date ')

            //        var sdar = stri.split(' ');
            //   var s_date = data.sdar[0];
            //   alert(s_date);
            var sd = data.start_date;
              var sdar = sd.split(' ');
              var s_date = sdar[0];

              var ed = data.end_date;
              var edar = ed.split(' ');
              var e_date = edar[0];




               var status = "";
               if(data.status=='active')
               {
                  var status = "<span class='text-success'>Active</span>";
               }
               else if(data.status=='inactive')
               {
                  var status = "<span class='text-danger'>Inactive</span>";
               }


            //     var sdate = date(data.start_date);
            //    alert(sdate);
            // $date = date('d-m-Y H:i:s', 1565600000);

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
                 htmlcont=htmlcont+'Start Date';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+s_date;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'End Date';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+e_date;
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
    $('.drop-menu').click(function(){

$('.sub-menu').toggle();
})


 $(document).on('click', '.view_modal_question', function () {
      var id = $(this).data("id");

      var url = baseurl + '/institutioncoursecontentquizequestionview/'+id;


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
                 htmlcont=htmlcont+'Question Text';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.question_text;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Option A';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.option_a;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Option B';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.option_b;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Option C';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.option_c;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Option D';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.option_d;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Answer';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.answer;
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'</tr>';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+'Marks';
                 htmlcont=htmlcont+'</td>';
                 htmlcont=htmlcont+'<td>';
                 htmlcont=htmlcont+data.marks;
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
    // category end //


    </script>
     <script type="text/javascript">


    $('.upload-image-form').submit(function(e) {

      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
      type:'POST',
      url: "{{ url('institutionajaxImageUpload')}}",
      data: formData,
      cache:false,
      contentType: false,
      processData: false,
      success: (data) => {


        if(data.error)
        {
          alert(data.error);
        }
        else
        {
          if(data.picture_type=='background_photo'){
            $("#background_image_id").attr("src",data.output_path);
          }
          else if(data.picture_type=='avatar'){
            $("#avatar_image_id").attr("src",data.output_path);
          }

            this.reset();
        }

        $('.close-modal').trigger('click');
      },
      error: function(data){
         alert('error');
        //alert(JSON.stringify(data));
      }

    });



    });

    //order list delete//

    $(document).on('click', '#order_delete', function () {


var id = $('#delete_id').val();
var url = baseurl + '/institutionorderdelete/'+id;


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
      type: "post",
      dataType: 'json',
      success: function (data) {

        window.location.href="{{route('institutionorder')}}";




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



     $(document).on('change', '.getcity', function () {
        var country_id = $('#country_id').val();
        var nextid = $(this).data("nextid");
       // alert(nextid);

        var url = baseurl + '/getcity/'+country_id;
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
              type: "get",
              dataType: 'html',
              success: function (data) {
                  $('#'+nextid).html(data);
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

     <?php
if(\Request::route()->getName() == `institutionmessage?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`)
{
  ?>

     var student_search_text = '';
     //alert(student_search_text);
     getstudentlistforinstitutionmessage(student_search_text);

     $("#student_search_text").keyup(function(){
        // alert('123');
       student_search_text = $('#student_search_text').val();
       //alert('000');
       getstudentlistforinstitutionmessage(student_search_text);
     });

     var last_student_id_for_message = '';

     $(document).on('click', '.student_message_chat', function () {
           var student_id = $(this).data("id");
           last_student_id_for_message = student_id;
           getmessagechatforinstitutionstudent();
     });


     $(document).on('click', '#send_message_button', function () {
           var send_message_text = $('#send_message_text').val();
           if(send_message_text!='')
           {

             $('#send_message_button').text('Sending ...');
             $('#loading_message_send').show();

              //alert('send_message_text='+send_message_text);
              //alert('last_teacher_id_for_message='+last_teacher_id_for_message);

                $.ajax({
                type : 'POST',
                url : baseurl+'/sendmessagechatforinstitutionstudent',
                dataType : 'json',
                data: {
                  'student_id':last_student_id_for_message,
                  'send_message_text':send_message_text
                },
                success : function(data){
                     alert(data);
                    // alert('success');
                     //alert(JSON.stringify(data));
                     $('#send_message_text').val('');
                     $('#send_message_button').text('Send');
                       $('#loading_message_send').hide();
                       getmessagechatforinstitutionstudent();





                },
                error : function(data) {
                  $('#send_message_button').text('Send');
                       $('#loading_message_send').hide();
                    alert('Errors');
                    alert(JSON.stringify(data));
                }
            });
           }

     });

     setInterval(getmessagechatforinstitutionstudent, 5000);

     function getmessagechatforinstitutionstudent()
     {
      if(last_student_id_for_message!='')
      {

        $("#send_message").show();
       // alert(last_teacher_id_for_message);

            $.ajax({
              type : 'POST',
              url : baseurl+'/getmessagechatforinstitutionstudent',
              dataType : 'json',
              data: {
                'student_id':last_student_id_for_message
              },
              success : function(data){
                   //alert(data);
                   //alert('success');
                  //alert(JSON.stringify(data));


                    $("#student_name").html(data.student_name);
                    $("#student_avatar").html('<img class="subscriber-avatar" src="'+data.student_avatar+'"  alt="">');

                    var fdata = data.data;
                 var html = "";
                 if(fdata.length > 0)
                 {
                  for(var aa=0; aa < fdata.length; aa++ )
                  {
                    var temp = fdata[aa];


                      if(temp.sender_type=='Institution')
                      {
                         html = html + '<div class="chat-message is-sent">';
                          html = html + '<img src="'+data.institution_logo+'"  alt="">';
                      }
                      else if(temp.sender_type=='Student')
                      {
                         html = html + '<div class="chat-message is-received">';
                          html = html + '<img src="'+data.student_avatar+'"  alt="">';
                      }

                      html = html + '<div class="message-block">';
                          html = html + '<span>'+temp.created_at+'</span>';
                          html = html + '<div class="message-text">'+temp.contents+'</div>';
                     html = html + ' </div>';
                  html = html + '</div>';


                   }
                 }
                 else
                 {
                  html = 'No chat founds!!';
                 }
                 $("#dan-conversation").html(html);

                  $("#dan-conversation").animate({
                      scrollTop: $("#dan-conversation").get(0).scrollHeight
                  }, 2000);


              },
              error : function(data) {
                  alert('Errors');
                  alert(JSON.stringify(data));
              }
          });
        }
     }

     function getstudentlistforinstitutionmessage(student_search_text)
     {
   //alert(student_search_text);
       $.ajax({
          type : 'POST',
          url : baseurl+'/getstudentlistforinstitutionmessage',
          dataType : 'json',
          data: {
            'student_search_text':student_search_text
          },
          success : function(data){
              consloe.log(data)
            //    alert(data);
            //    alert('success');
            //   alert(JSON.stringify(data));
               var fdata = data.data;
               var html = "";
               if(fdata.length > 0)
               {
                for(var aa=0; aa < fdata.length; aa++ )
                {
                  var temp = fdata[aa];
                    html = html + '<div class="box-subscriber student_message_chat"  data-id="'+temp.id+'">';
                    if(temp.avatar!='')
                    {
                       html = html + '<img class="subscriber-avatar" src="'+temp.avatar+'" data-user-popover="10" alt="">';
                    }



                    html = html + '<div class="subscriber-meta">';
                    html = html + '<span class="meta-title">'+temp.name+'</span>';

                    html = html + ' </div>';
                   html = html + ' </div>';
                 }
               }
               else
               {
                html = 'No result founds!!';
               }
               $("#box-subscribers").html(html);

          },
          error : function(data) {
              alert('Errors');
              alert(JSON.stringify(data));
          }
      });
     }

  <?php
}
?>

// page start //

// add page//
var newPageForm = $('.add-new-page');


  if (newPageForm.length) {


    newPageForm.on('submit', function (e) {

      e.preventDefault();




          $('#page_add').html('Sending..');


          var formData = new FormData(this);

          var content = CKEDITOR.instances.content.getData();

        var form_data = new FormData(this);

        form_data.append('content_value', content);

                $.ajax({
                    beforeSend: function(){
                        $('.ajax-loader').css("visibility", "visible");
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    //data: $('#postForm').serialize(),

                    url:baseurl + '/pagestore',
                    method:"POST",
                    // data:new FormData(this),
                    data:form_data,
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {


                        window.location.href=`/institutionpage?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
                        if(data.type == 'success'){
                            $('#form-input-error').html('');
                        $('#form-input-success').html('');

                    $('#page_add').html('Save');
                        // alert(JSON.stringify(data));

                            $('#search_btn').trigger('click');
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '0px');
                        $('.modal-backdrop').remove();
                        $('#title').val('');

                        $('#content').val('');

                        $('#pagemodals-add').hide();



                    }
                        else if(data.type == 'error'){
                            $('#form-input-error').html('');
                        $('#form-input-success').html('');
                            $('#page_add').html('Save');
                        alert(data.message);
                        }
                    },
                    error: function (data) {
                        alert(JSON.stringify(data));
                        $('#page_add').html('Save Changes');

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


// add page//

// edit page//

//var editPageForm = $('.edit-new-page');

var editPageForm = $('.edit-new-page');
if (editPageForm.length) {


    editPageForm.on('submit', function (e) {

  e.preventDefault();

    var id = $('#pageedit_id').val();


      $('#page_edit').html('Sending..');
      var content_edit = CKEDITOR.instances.content_edit.getData();

var formData = new FormData(this);

formData.append('content_value', content_edit);


     // var formData = new FormData(this);

      $.ajax({
          beforeSend: function(){
            $('.ajax-loader').css("visibility", "visible");
          },
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          //data: $('#postForm').serialize(),
          url: baseurl + '/pageupdate/'+id,
          method:"POST",
          data:formData,
        //    data:new FormData(this),
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
          success: function (data) {
            window.location.href=`/institutionpage?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
            if(data.type == 'success'){
                $('#form-input-error').html('');
             $('#form-input-success').html('');

           $('#page_edit').html('Save');
               // alert(JSON.stringify(data));

                $('#search_btn').trigger('click');
             $('body').removeClass('modal-open');
            $('body').css('padding-right', '0px');
            $('.modal-backdrop').remove();
            $('#title_edit').val('');
            $('#content_edit').val('');

            $('#pagemodals-edit').hide();
        }
            else if(data.type == 'error'){
                $('#form-input-error').html('');
             $('#form-input-success').html('');
                $('#page_edit').html('Save');
             alert(data.message);
            }

          },
          error: function (data) {
              alert(JSON.stringify(data));
              $('#page_edit').html('Save Changes');
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

$(document).on('click', '.pageedit_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/viewpage/'+id;

      //alert(id) ;

     // alert(baseurl);
      //alert(id);


      $('#pageedit_id').val(id);




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


                  CKEDITOR.instances.content_edit.setData(data.content);










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

    $(document).on('click', '.pageview-modals', function () {
      var id = $(this).data("id");

      var url = baseurl + '/viewpage/'+id;

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
                 htmlcont=htmlcont+data.content;
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

    $(document).on('click', '#page_delete', function () {


var id = $('#delete_id').val();
var url = baseurl + '/pagedelete/'+id;

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
        window.location.href=`/institutionpage?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
         $('#search_btn').trigger('click');
         $('body').removeClass('modal-open');
        $('body').css('padding-right', '0px');
        $('.modal-backdrop').remove();

        $('#pagemodals-delete').modal('hide');






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



// edit page//

//end page//

//start menu //
// add menu//
var newMenuForm = $('.add-new-menu');
if (newMenuForm.length)
{


                newMenuForm.on('submit', function (e) {

                e.preventDefault();




                    $('#menu_add').html('Sending..');


                    var formData = new FormData(this);

                    //   var content = CKEDITOR.instances.content.getData();

                    var form_data = new FormData(this);

                    // form_data.append('content_value', content);

                            $.ajax({
                                beforeSend: function(){
                                    $('.ajax-loader').css("visibility", "visible");
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                //data: $('#postForm').serialize(),

                                url:baseurl + '/menustore',
                                method:"POST",
                                // data:new FormData(this),
                                data:form_data,
                                dataType:'JSON',
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function (data) {


                                    window.location.href=`/institutionmenu?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;

                                    if(data.type == 'success'){
                                        $('#form-input-error').html('');
                                    $('#form-input-success').html('');

                                $('#menu_add').html('Save');
                                    // alert(JSON.stringify(data));

                                        $('#search_btn').trigger('click');
                                    $('body').removeClass('modal-open');
                                    $('body').css('padding-right', '0px');
                                    $('.modal-backdrop').remove();
                                    $('#menu_name').val('');

                                    $('#page_id').val('');
                                    $('#link').val('');
                                    $('#sort_order').val('');
                                    $('#location').val('');
                                    $('#menu_parent_id').val('');



                                    $('#menumodals-add').hide();



                                }
                                    else if(data.type == 'error'){
                                        $('#form-input-error').html('');
                                    $('#form-input-success').html('');
                                        $('#menu_add').html('Save');
                                    alert(data.message);
                                    }
                                },
                                error: function (data) {
                                    alert(JSON.stringify(data));
                                    $('#menu_add').html('Save Changes');

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
// add menu//
//edit menu //
var editMenuForm = $('.edit-new-menu');
if (editMenuForm.length)
{

            //console.log($('#page_id_edit').val(),"========= gdfgdf ====================");
                editMenuForm.on('submit', function (e) {

            e.preventDefault();

                var id = $('#menuedit_id').val();
                //alert(id);


                $('#menu_edit').html('Sending..');
                //var content_edit = CKEDITOR.instances.content_edit.getData();

            var formData = new FormData(this);

            //formData.append('content_value', content_edit);


                // var formData = new FormData(this);

                $.ajax({
                    beforeSend: function(){
                        $('.ajax-loader').css("visibility", "visible");
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    //data: $('#postForm').serialize(),
                    url: baseurl + '/menuupdate/'+id,
                    method:"POST",
                    data:formData,
                    //    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {




                        window.location.href=`/institutionmenu?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
                        if(data.type == 'success'){
                            $('#form-input-error').html('');
                        $('#form-input-success').html('');

                    $('#menu_edit').html('Save');
                            alert(JSON.stringify(data));

                            $('#search_btn').trigger('click');
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '0px');
                        $('.modal-backdrop').remove();
                        $('#menu_name_edit').val('');
                        $('#page_id_edit').val('');
                        $('#link_edit').val('');
                        $('#sort_order_edit').val('');

                        $('#location_edit').val('');

                        $('#menumodals-edit').hide();
                    }
                        else if(data.type == 'error'){
                            $('#form-input-error').html('');
                        $('#form-input-success').html('');
                            $('#menu_edit').html('Save');
                        alert(data.message);
                        }

                    },
                    error: function (data) {
                        alert(JSON.stringify(data));
                        $('#menu_edit').html('Save Changes');
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
$(document).on('click', '.menuedit_modal', function ()
{
      var id = $(this).data("id");
       var url = baseurl + '/viewmenu/'+id;

       $('#menuedit_id').val(id);
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

                  $('#menu_name_edit').val(data.menu_name);
                  $('#page_id_edit').val(data.page_id);
                  $('#link_edit').val(data.link);
                  $('#sort_order_edit').val(data.sort_order);
                  $('#location_edit').val(data.location);


                 // CKEDITOR.instances.content_edit.setData(data.content);
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
$(document).on('click', '.menuview-modals', function ()
{
            var id = $(this).data("id");

            var url = baseurl + '/viewmenu/'+id;
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






                        htmlcont=htmlcont+'<tr>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+'Menu Name';
                        htmlcont=htmlcont+'</td>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+data.menu_name;
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
                        htmlcont=htmlcont+'Page Name';
                        htmlcont=htmlcont+'</td>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+data.page_id;
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

                        htmlcont=htmlcont+'<tr>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+'Location';
                        htmlcont=htmlcont+'</td>';
                        htmlcont=htmlcont+'<td>';
                        htmlcont=htmlcont+data.location;
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
//edit menu //
$(document).on('click', '#menu_delete', function ()
{
            var id = $('#delete_id').val();
            var url = baseurl + '/menudelete/'+id;

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


                    window.location.href=`/institutionmenu?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;

                    $('#search_btn').trigger('click');
                    $('body').removeClass('modal-open');
                    $('body').css('padding-right', '0px');
                    $('.modal-backdrop').remove();

                    $('#menumodals-delete').modal('hide');






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
//start show hide field//
$(document).ready(function()
{
        // Hide the div initially
        $('#sub-menu-type').hide();

        // Handle the onchange event of the select dropdown
        $('#menu_type').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue === '1') {
                $('#sub-menu-type').show();
            } else {
                $('#sub-menu-type').hide();
            }
        });
});
//end show hide field//
//end menu //



// ============= Add Field ====================
var newfieldForm = $('.add-new-field');

  if (newfieldForm.length) {
   // alert("ok");


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

                    url:baseurl + '/fieldstore',
                    method:"POST",
                    // data:new FormData(this),
                    data:form_data,
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log(data,"add field success");

                        window.location.href=`/institution-form?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;

                        if(data.type == 'success'){
                            $('#form-input-error').html('');
                            $('#form-input-success').html('');

                            $('#field_add').html('Save');
                             alert(JSON.stringify(data));

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
                            $('#form_add').html('Save');
                            alert(data.message);
                        }
                    },
                    error: function (data) {
                        alert(JSON.stringify(data));
                        $('#form_add').html('Save Changes');

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



//start assign to teacher //

// $(document).on("click", "#add-assign-course-link", function(event)
//     {
//         $('#assigncourse-add').modal('show');

//     });

var newAssigncourseForm = $('.assign-course-to-teacher');



  if (newAssigncourseForm.length)
  {
     newAssigncourseForm.on('submit', function (e) {

      e.preventDefault();

    // console.log(baseurl)


          $('#assign_course_to_teacher_add').html('Sending..');


          var formData = new FormData(this);


        var form_data = new FormData(this);


        $('#form-input-error').html('');
           $('#form-input-success').html('');


         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url:baseurl + '/assigncoursetoteacherstore',
               method:"POST",
               //data:new FormData(this),
               data:form_data,
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {
                window.location.href=`/assigncoursetoteacher?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;



                if(data.type == 'success'){
                    $('#form-input-error').html('');
                 $('#form-input-success').html('');
                    $('#assign_course_to_teacher_add').html('Save');
                  // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                //  $('body').removeClass('modal-open');
                // $('body').css('padding-right', '0px');
                // $('.modal-backdrop').remove();
                $('#course_id').val('');
                $('#teacher_id').val('');


                // $('#modals-add').hide();
                $('#assigncourse-add').modal('hide');
                }
                else if(data.type == 'error'){
                    $('#form-input-error').html(data.message);
                 $('#form-input-success').html('')
                    $('#assign_course_to_teacher_add').html('Save');
                 alert(data.message);
                }



              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#assign_course_to_teacher_add').html('Save Changes');

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

  //////////////////////////////////////////////////

  var editAssigncourseForm = $('.edit-assign-course-to-teacher');

  if (editAssigncourseForm.length)
   {


    editAssigncourseForm.on('submit', function (e) {

      e.preventDefault();

        var id = $('#assignedit_id').val();


          $('#assign_edit').html('Sending..');



          var formData = new FormData(this);





          //alert(JSON.stringify(formData));

          $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              //data: $('#postForm').serialize(),
              url: baseurl + '/assigncoursetoteacherupdate/'+id,
              method:"POST",
               data:formData,
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {
                window.location.href=`/assigncoursetoteacher?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;

               $('#assign_edit').html('Save');

                  // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#course_id_edit').val('');
                $('#teacher_id_edit').val('');


                $('#courseassign-edit').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#assign_edit').html('Save Changes');
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

  $(document).on('click', '.assignedit_modal', function ()
{
      var id = $(this).data("id");
       var url = baseurl + '/courseteacherview/'+id;
      //alert(id);
       //alert(url);

   $('#assignedit_id').val(id);
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



                  $('#course_id_edit').val(data.course_id);
                  $('#teacher_id_edit').val(data.user_id);



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
/////////////////////////////////////////////////////////////

$(document).on('click', '.view_modal_assignteacher', function ()
{
      var id = $(this).data("id");

      var url = baseurl + '/courseteacherview/'+id;

    //  alert(baseurl) ;

     // alert(baseurl);
      alert(id);
      alert(url);

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

console.log(data);

            var data = datav.data;
            alert(JSON.stringify(data));

            // alert(data.from_date);

            var htmlcont = '';
            htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';

            htmlcont=htmlcont+'<tr>';
            htmlcont=htmlcont+'<td>';
            htmlcont=htmlcont+'Course Name';
            htmlcont=htmlcont+'</td>';
            htmlcont=htmlcont+'<td>';
            htmlcont=htmlcont+data.course_id;
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
//end assign to teacher //
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
              url: baseurl + '/institutioncompanyupdate/'+id,
              method:"POST",
               data:formData,
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {

                window.location.href=`/institutioncompany?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;

                  var responce = data.data[0];
                  //console.log(responce,"ertwer")


               $('#company_edit').html('Save');
                   // alert(JSON.stringify(data));

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

  $(document).on('click', '.companyedit_modal', function () {
      var id = $(this).data("id");
      //alert(id);

      var url = baseurl + '/institutioncompanyview/'+id;
     // alert(url);

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
                //   alert(JSON.stringify(data));



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
                            url: baseurl + '/institutionsystemupdate/'+id,
                            method:"POST",
                            data:new FormData(this),
                            dataType:'JSON',
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function (data) {


                                window.location.href=`/institutionsystem?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
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

  $(document).on('click', '.systemedit_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/institutionsystemview/'+id;

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
                                url: baseurl + '/institutionbannersettingstore',
                                method:"POST",
                                // data:new FormData(this),
                                data:form_data,
                                dataType:'JSON',
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function (data) {

                                    window.location.href=`/institutionbannersetting?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
                                    if(data.type == 'success'){
                                        $('#form-input-error').html('');
                                    $('#form-input-success').html('');

                                $('#homesetting_add').html('Save');
                                     alert(JSON.stringify(data));

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
              url: baseurl + '/institutionbannersettingupdate/'+id,
              method:"POST",
              data:formData,
            //    data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {

                window.location.href=`/institutionbannersetting?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
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
      var url = baseurl + '/institutionbannersettingdelete/'+id;

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

                window.location.href=`/institutionbannersetting?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;

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

                var url = baseurl + '/institutionbannersettingview/'+id;

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
    $(document).on('click', '.settingsbanneredit_modal', function () {
            var id = $(this).data("id");

            var url = baseurl + '/institutionbannersettingview/'+id;

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
              url: baseurl + '/institutioncategorystore',
              method:"POST",
               data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {

                window.location.href=`/institutioncategory?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;

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
              url: baseurl + '/institutioncategoryupdate/'+id,
              method:"POST",
               data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {
                // window.location.href="{{ route('institutioncategory', ['institution_id' => $_GET['institution_id'],'user_id'=>$_GET['user_id']]) }}";

                window.location.href=`/institutioncategory?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;

               $('#category_edit').html('Save');
                   // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                $('#name_edit').val('');
                $('#modals-edit').hide();


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
      var url = baseurl + '/institutionstatuscategory/'+id+'/'+status;

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
                window.location.href=`/institutioncategory?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;

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
      $(document).on('click', '#category_delete', function () {


var id = $('#delete_id').val();
var url = baseurl + '/institutioncategorydelete/'+id;

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
        window.location.href=`/institutioncategory?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;


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
$(document).on('click', '.categoryview_modal', function () {

var id = $(this).data("id");

var url = baseurl + '/institutionviewcategory/'+id;




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

      var url = baseurl + '/institutionviewcategory/'+id;

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


 // faq start //


 var editFaqForm = $('.edit-new-faq');
    var newFaqForm = $('.add-new-faq');


  if (newFaqForm.length)
  {


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
                                url: baseurl + '/institutionfaqstore',
                                method:"POST",
                                // data:new FormData(this),
                                data:form_data,
                                dataType:'JSON',
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function (data) {


                                    window.location.href=`/institutionfaq?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
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

   if (editFaqForm.length)
   {
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
              url: baseurl + '/institutionfaqupdate/'+id,
              method:"POST",
              data:formData,
            //    data:new FormData(this),
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {


                window.location.href=`/institutionfaq?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
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


     $(document).on('click', '#faq_statuschange', function ()
      {


         var id = $('#statuschange_id').val();
          var status = $('#statuschange_status').val();
         var url = baseurl + '/institutionstatusfaq/'+id+'/'+status;

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

                window.location.href=`/institutionfaq?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;

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

      $(document).on('click', '#faq_delete', function ()
    {


        var id = $('#delete_id').val();
      var url = baseurl + '/institutionfaqdelete/'+id;

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

                window.location.href=`/institutionfaq?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;

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

    $(document).on('click', '.delete_modal', function ()
    {
      var id = $(this).data("id");
       $('#delete_id').val(id);

    });


     $(document).on('click', '.faqview_modals', function ()
     {
                var id = $(this).data("id");

                var url = baseurl + '/institutionviewfaq/'+id;

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
    $(document).on('click', '.faqedit_modal', function ()
      {
                    var id = $(this).data("id");

                    var url = baseurl + '/institutionviewfaq/'+id;

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

                    url:baseurl + '/addnewform',
                    method:"POST",
                    // data:new FormData(this),
                    data:form_data,
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {

                        window.location.href=`/institution-form?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
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
 //start edit form //
  $(document).on('click', '.formedit_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/viewform/'+id;

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
                  $('#page_id_edit').val(data.form.page_id);













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
          url: baseurl + '/formupdate/'+id,
          method:"POST",
          data:formData,
        //    data:new FormData(this),
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
          success: function (data) {
            window.location.href=`/institution-form?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
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
//view form start //
    $(document).on('click', '.formview-modals', function () {
      var id = $(this).data("id");
      var url = baseurl + '/viewform/'+id;
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
                 htmlcont=htmlcont+'Page Name';
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
                 htmlcont=htmlcont+data.form.page_name;
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
                 htmlcont=htmlcont+'<span onclick="fielddelete('+field_datalist[i].id+')" class="button is-danger">';
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
var url = baseurl + '/formfielddelete/'+id;

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


        window.location.href=`/institution-form?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
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

//start delete form //

$(document).on('click', '#form_delete', function () {


var id = $('#delete_id').val();
var url = baseurl + '/formdelete/'+id;

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
        window.location.href=`/institution-form?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;
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



</script>
   <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
    <?php
if(Route::currentRouteName()=='institutioncourse')
 {
 ?>
CKEDITOR.replace('description', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('description_edit', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
<?php } ?>


CKEDITOR.replace('content', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('content_edit', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});

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
    CKEDITOR.replace('contents', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('contents_edit', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});

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


// 03.08.2023



    $(document).ready(function() {
            // Click event for the main menu link
            $(".main-menu-link").click(function(e) {
                e.preventDefault(); // Prevent the default link behavior
                $(this).siblings('.hide-menu').fadeToggle(1000);
            });
        });

//start teacher send //

var newTeachersendForm = $('.assign-teacher-send');



        if (newTeachersendForm.length)
        {
            newTeachersendForm.on('submit', function (e) {

            e.preventDefault();

            // console.log(baseurl)


                $('#institution_teacher_send').html('Sending..');


                var formData = new FormData(this);


                var form_data = new FormData(this);


                $('#form-input-error').html('');
                $('#form-input-success').html('');


                $.ajax({
                    beforeSend: function(){
                        $('.ajax-loader').css("visibility", "visible");
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    //data: $('#postForm').serialize(),
                    url:baseurl + '/teachersend',
                    method:"POST",
                    //data:new FormData(this),
                    data:form_data,
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        window.location.href=`/institutionmyteacher?institution_id={{$_GET['institution_id']}}&user_id={{$_GET['user_id']}}`;


                        if(data.type == 'success'){
                            $('#form-input-error').html('');
                        $('#form-input-success').html('');
                            $('#institution_teacher_send').html('Save');
                        // alert(JSON.stringify(data));

                            $('#search_btn').trigger('click');
                        //  $('body').removeClass('modal-open');
                        // $('body').css('padding-right', '0px');
                        // $('.modal-backdrop').remove();
                        $('#course_id').val('');



                        // $('#modals-add').hide();
                        $('#teacher-send-add').modal('hide');
                        }
                        else if(data.type == 'error'){
                            $('#form-input-error').html(data.message);
                        $('#form-input-success').html('')
                            $('#institution_teacher_send').html('Save');
                        alert(data.message);
                        }



                    },
                    error: function (data) {
                        alert(JSON.stringify(data));
                        $('#institution_teacher_send').html('Save Changes');

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

      function valuePass(teacher_id)
      {
        $('#teacher_id').val(teacher_id);
      }
//start teacher send //

</script>




</body>

</html>
