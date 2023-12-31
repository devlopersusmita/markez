<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Markez</title>
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}" />
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
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/core.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

</head>

<body class="is-white">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQHJPZP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Pageloader -->
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>

@include('theme.header')
@yield('content')
@include('theme.footer')

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
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


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
    $(document).on("click", "#add-new-course-link", function(event) {
       $('#modals-add').modal('show');

       });

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

                  // alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                $('#title_edit').val('');
                $('#description_edit').val('');
                $('#status_edit').val('');
                $('#category_id_edit').val('');
                $('#teacher_id_edit').val('');
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
      //alert(id)
;


      $('#edit_id').val(id)
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
                 // alert(JSON.stringify(datav));


var asset = datav.asset;
//alert(asset);





                  $('#title_edit').val(data.title);
                  $('#status_edit').val(data.status);
                  //$('#description_edit').val(data.description);
                  CKEDITOR.instances.description_edit.setData(data.description);

                  $('#category_id_edit').val(data.category_id);
                 // $('#teacher_id_edit').val(datav.course_teachers_user_id);


                 $("#teacher_id_edit").val(course_teacher_ids);


                  $('#students_limit_edit').val(data.students_limit);
                  $('#price_edit').val(data.price);
                  $('#type_edit').val(data.type);
                 $('#visibility_edit').val(data.visibility);
                 $('#is_fully_complete_edit').val(data.is_fully_complete);
                  $('#tags_edit').val(data.tags);
                  $('#old_preview_image').val(`${asset}${data.preview_image}`);
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
if(\Request::route()->getName() == 'institutionmessage')
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
                     //alert(data);
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
              //consloe.log(data)
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
</script>


</body>

</html>
