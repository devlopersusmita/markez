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
    <title> {{$company_settings->name}}</title>
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
@include('theme.student.header')
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




    $(document).on("click", "#pagination a,#search_btn", function(event) {



      event.preventDefault();

      $("#pagination_data").html('<center><img src="'+baseurl+'/frontend/images/loadingpleasewait.gif" width="80" /></center>');

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

     //student teacher default start//

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

     $(document).on('click', '.view_modal', function () {
      var id = $(this).data("id");

      //var url = baseurl + '/teacherview/'+id;
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

               // alert(JSON.stringify(datav.data));

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

     $(document).on('click', '.teacher_send', function () {


        var id = $('#send_id').val();
        var type = $('#send_type').val();
        var student_id = $('#user_id').val();
      var url = baseurl + '/studentteacherstudentsend/'+id+'/'+type;

      $('#loading_teacher_send').show();

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: { student_id: student_id },
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
                $('#loading_teacher_send').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_teacher_send').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_teacher_send').hide();
              }
          });



      });

     $(document).on('click', '.teacher_delete', function () {


        var id = $('#delete_id').val();
        var type = $('#delete_type').val();
        var student_id = $('#user_id').val();
      var url = baseurl + '/studentteacherstudentdelete/'+id+'/'+type;

      $('#loading_teacher_delete').show();
     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: { student_id: student_id },
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {

                 $('#search_btn_'+type).trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-delete').hide();
                $('#loading_teacher_delete').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_teacher_delete').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_teacher_delete').hide();
              }
          });



      });

     $(document).on('click', '.teacher_approve', function () {


        var id = $('#approve_id').val();
        var type = $('#approve_type').val();
        var student_id = $('#user_id').val();
       // alert(student_id);
      var url = baseurl + '/studentteacherstudentapprove/'+id+'/'+type;

      $('#loading_teacher_approvet').show();
      //alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: { student_id: student_id },
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {

                 $('#search_btn_'+type).trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-approve').hide();
                $('#loading_teacher_approvet').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_teacher_approvet').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_teacher_approvet').hide();
              }
          });



      });


   //student teacher default end//

 //student institution default start//

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

      $(document).on('click', '.view_modal_it', function () {
      var id = $(this).data("id");

      //var url = baseurl + '/institutionview/'+id;
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



               // var data = datav.data;
                //alert(JSON.stringify(data));
                //var users = datav.data.users;
                var institution = datav.data.institution;

                 var institution_details = datav.data.institution_details;


               var user_details = datav.data.user_details;

               var asset_path = datav.data.asset_path;
               var logoimg = datav.data.logo;





                 var htmlcont = '';
                 htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';

                 htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td colspan="2">';
                 htmlcont=htmlcont+'<div class="cover-bg-2">';




                    htmlcont=htmlcont+'<div class="avatar1">';

                    htmlcont=htmlcont+'<img id="avatar_image_id" class="avatar-image"  src="'+logoimg+'"  alt="">';




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

   // teacher message //
     var teacher_search_text = '';
     getteacherlistforstudentmessage(teacher_search_text);
     $("#teacher_search_text").keyup(function(){
       teacher_search_text = $('#teacher_search_text').val();
       getteacherlistforstudentmessage(teacher_search_text);
     });

     var last_teacher_id_for_message = '';

     $(document).on('click', '.teacher_message_chat', function () {
           var teacher_id = $(this).data("id");
           last_teacher_id_for_message = teacher_id;
           getmessagechatforstudentteacher();
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
                url : baseurl+'/sendmessagechatforstudentteacher',
                dataType : 'json',
                data: {
                  'teacher_id':last_teacher_id_for_message,
                  'send_message_text':send_message_text
                },
                success : function(data){
                    // alert(data);
                     //alert('success');
                     //alert(JSON.stringify(data));
                     $('#send_message_text').val('');
                      $('#send_message_button').text('Send');
                       $('#loading_message_send').hide();
                     getmessagechatforstudentteacher();





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

     setInterval(getmessagechatforstudentteacher, 5000);

     function getmessagechatforstudentteacher()
     {
       if(last_teacher_id_for_message!='')
       {


          $("#send_message").show();
          //alert(last_teacher_id_for_message);

              $.ajax({
                type : 'POST',
                url : baseurl+'/getmessagechatforstudentteacher',
                dataType : 'json',
                data: {
                  'teacher_id':last_teacher_id_for_message
                },
                success : function(data){
                     //alert(data);
                     //alert('success');
                    // alert(JSON.stringify(data));


                      $("#teacher_name").html(data.teacher_name);
                      $("#teacher_avatar").html('<img class="subscriber-avatar" src="'+data.teacher_avatar+'"  alt="">');

                      var fdata = data.data;
                   var html = "";
                   if(fdata.length > 0)
                   {
                    for(var aa=0; aa < fdata.length; aa++ )
                    {
                      var temp = fdata[aa];


                        if(temp.sender_type=='Student')
                        {
                           html = html + '<div class="chat-message is-sent">';
                            html = html + '<img src="'+data.student_avatar+'"  alt="">';
                        }
                        else if(temp.sender_type=='Teacher')
                        {
                           html = html + '<div class="chat-message is-received">';
                            html = html + '<img src="'+data.teacher_avatar+'"  alt="">';
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

     function getteacherlistforstudentmessage(teacher_search_text)
     {

       $.ajax({
          type : 'POST',
          url : baseurl+'/getteacherlistforstudentmessage',
          dataType : 'json',
          data: {
            'teacher_search_text':teacher_search_text
          },
          success : function(data){
               //alert(data);
               //alert('success');
               //alert(JSON.stringify(data.data));
               var fdata = data.data;
               var html = "";
               if(fdata.length > 0)
               {
                for(var aa=0; aa < fdata.length; aa++ )
                {
                  var temp = fdata[aa];
                    html = html + '<div class="box-subscriber teacher_message_chat"  data-id="'+temp.id+'">';
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


    $(document).on('click', '.send_modal_it', function () {
      var id = $(this).data("id");
       $('#send_id_it').val(id)
;

       var type = $(this).data("type");
       $('#send_type_it').val(type);



    });

    $(document).on('click', '.delete_modal_it', function () {
      var id = $(this).data("id");
       $('#delete_id_it').val(id)
;

       var type = $(this).data("type");
       $('#delete_type_it').val(type);



    });

     $(document).on('click', '.approve_modal_it', function () {
      var id = $(this).data("id");
       $('#approve_id_it').val(id)
;

       var type = $(this).data("type");
       $('#approve_type_it').val(type);



    });

     $(document).on('click', '.institution_send_it', function () {


        var id = $('#send_id_it').val();
        var type = $('#send_type_it').val();
      var url = baseurl + '/studentinstitutionstudentsend/'+id+'/'+type;

      $('#loading_institution_send_it').show();

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
                $('#loading_institution_send_it').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_institution_send_it').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_institution_send_it').hide();
              }
          });



      });

     $(document).on('click', '.institution_delete_it', function () {


        var id = $('#delete_id_it').val();
        var type = $('#delete_type_it').val();
      var url = baseurl + '/studentinstitutionstudentdelete/'+id+'/'+type;

      $('#loading_institution_delete_it').show();
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
                $('#loading_institution_delete_it').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_institution_delete_it').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_institution_delete_it').hide();
              }
          });



      });

     $(document).on('click', '.institution_approve_it', function () {


        var id = $('#approve_id_it').val();
        var type = $('#approve_type_it').val();
      var url = baseurl + '/studentinstitutionstudentapprove/'+id+'/'+type;

      $('#loading_institution_approvet_it').show();
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

                $('#modals-approve_it').hide();
                $('#loading_institution_approvet_it').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_institution_approvet_it').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_institution_approvet_it').hide();
              }
          });



      });


   //student institution default end//
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




    </script>
    <script>
        // Get the modal
        /*
        var modal_add = document.getElementById("modals-add");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");







        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal_add.style.display = "none";
          }
        }
        */
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
      url: "{{ url('ajaxImageUpload')}}",
      data: formData,
      cache:false,
      contentType: false,
      processData: false,
      success: (data) => {

       //alert(JSON.stringify(data));

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

    //studentcoursecontent ///

       $(document).on('click', '.coursecontentview_modal', function () {
    var id = $(this).data("id");

    var url = baseurl + '/studentcoursecontentview/'+id;

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



                var sd = data.start_date;
              var sdar = sd.split(' ');
              var s_date = sdar[0];

              var ed = data.end_date;
              var edar = ed.split(' ');
              var e_date = edar[0];

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
      var url = baseurl + '/studentcoursecontentquizeview/'+id;
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

              var sd = data.start_date;
              var sdar = sd.split(' ');
              var s_date = sdar[0];

              var ed = data.end_date;
              var edar = ed.split(' ');
              var e_date = edar[0];


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

      var url = baseurl + '/studentcoursecontentquizequestionview/'+id;


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

$(".view_modal_payment").click(function(){

    var id = $(this).data("id");

    var url = baseurl + '/studentorderpaymentview/'+id;

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
//alert(datav);
              var data = datav.data;



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

     $(document).on('click', '.view_modal_course', function () {
      var id = $(this).data("id");

      var url = baseurl + '/studentcourseview/'+id;
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
              dataType: 'json',
              success: function (datav) {

               var data = datav.data;
              // alert(data);
                var category_name = datav.category_name;
                //alert(category_name);
                 var teacher_id = datav.course_teachers_user_id;
                // var previewimage  = data.preview_image;
                var asset = datav.asset;
                 //alert(asset);
                var preview_image = datav.data.preview_image;
                // alert(preview_image);



                 var previewvideo  = data.preview_video;
                  var sd = data.start_date;
              var sdar = sd.split(' ');
              var s_date = sdar[0];
               var ed = data.end_date;
              var edar = ed.split(' ');
              var e_date = edar[0];

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
                    if(data.preview_video!='')
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

</script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('description', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>
<script>
     var loadFile = function(event,img_id) {
    var output = document.getElementById(img_id);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };

<?php
if(\Request::route()->getName() == 'studentmessage')
{
  ?>
     var teacher_search_text = '';
     getteacherlistforstudentmessage(teacher_search_text);
     $("#teacher_search_text").keyup(function(){
       teacher_search_text = $('#teacher_search_text').val();
       getteacherlistforstudentmessage(teacher_search_text);
     });

     var last_teacher_id_for_message = '';

     $(document).on('click', '.teacher_message_chat', function () {
           var teacher_id = $(this).data("id");
           last_teacher_id_for_message = teacher_id;
           getmessagechatforstudentteacher();
     });




     setInterval(getmessagechatforstudentteacher, 5000);

     function getmessagechatforstudentteacher()
     {
       if(last_teacher_id_for_message!='')
       {


          $("#send_message").show();
          //alert(last_teacher_id_for_message);

              $.ajax({
                type : 'POST',
                url : baseurl+'/getmessagechatforstudentteacher',
                dataType : 'json',
                data: {
                  'teacher_id':last_teacher_id_for_message
                },
                success : function(data){
                     //alert(data);
                     //alert('success');
                    // alert(JSON.stringify(data));


                      $("#teacher_name").html(data.teacher_name);
                      $("#teacher_avatar").html('<img class="subscriber-avatar" src="'+data.teacher_avatar+'"  alt="">');

                      var fdata = data.data;
                   var html = "";
                   if(fdata.length > 0)
                   {
                    for(var aa=0; aa < fdata.length; aa++ )
                    {
                      var temp = fdata[aa];


                        if(temp.sender_type=='Student')
                        {
                           html = html + '<div class="chat-message is-sent">';
                            html = html + '<img src="'+data.student_avatar+'"  alt="">';
                        }
                        else if(temp.sender_type=='Teacher')
                        {
                           html = html + '<div class="chat-message is-received">';
                            html = html + '<img src="'+data.teacher_avatar+'"  alt="">';
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

     function getteacherlistforstudentmessage(teacher_search_text)
     {

       $.ajax({
          type : 'POST',
          url : baseurl+'/getteacherlistforstudentmessage',
          dataType : 'json',
          data: {
            'teacher_search_text':teacher_search_text
          },
          success : function(data){
               //alert(data);
               //alert('success');
               //alert(JSON.stringify(data.data));
               var fdata = data.data;
               var html = "";
               if(fdata.length > 0)
               {
                for(var aa=0; aa < fdata.length; aa++ )
                {
                  var temp = fdata[aa];
                    html = html + '<div class="box-subscriber teacher_message_chat"  data-id="'+temp.id+'">';
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
$('.drop-menu').click(function(){

        $('.sub-menu').toggle();
    })


<?php
if(\Request::route()->getName() == 'studentmessage')
{
  ?>
     var teacher_search_text = '';
     getteacherlistforstudentmessage(teacher_search_text);
     $("#teacher_search_text").keyup(function(){
       teacher_search_text = $('#teacher_search_text').val();
       getteacherlistforstudentmessage(teacher_search_text);
     });

     var last_teacher_id_for_message = '';

     $(document).on('click', '.teacher_message_chat', function () {
           var teacher_id = $(this).data("id");
           last_teacher_id_for_message = teacher_id;
           getmessagechatforstudentteacher();
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
                url : baseurl+'/sendmessagechatforstudentteacher',
                dataType : 'json',
                data: {
                  'teacher_id':last_teacher_id_for_message,
                  'send_message_text':send_message_text
                },
                success : function(data){
                    // alert(data);
                     //alert('success');
                     //alert(JSON.stringify(data));
                     $('#send_message_text').val('');
                      $('#send_message_button').text('Send');
                       $('#loading_message_send').hide();
                     getmessagechatforstudentteacher();





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

     setInterval(getmessagechatforstudentteacher, 5000);

     function getmessagechatforstudentteacher()
     {
       if(last_teacher_id_for_message!='')
       {


          $("#send_message").show();
          //alert(last_teacher_id_for_message);

              $.ajax({
                type : 'POST',
                url : baseurl+'/getmessagechatforstudentteacher',
                dataType : 'json',
                data: {
                  'teacher_id':last_teacher_id_for_message
                },
                success : function(data){
                     //alert(data);
                     //alert('success');
                    // alert(JSON.stringify(data));


                      $("#teacher_name").html(data.teacher_name);
                      $("#teacher_avatar").html('<img class="subscriber-avatar" src="'+data.teacher_avatar+'"  alt="">');

                      var fdata = data.data;
                   var html = "";
                   if(fdata.length > 0)
                   {
                    for(var aa=0; aa < fdata.length; aa++ )
                    {
                      var temp = fdata[aa];


                        if(temp.sender_type=='Student')
                        {
                           html = html + '<div class="chat-message is-sent">';
                            html = html + '<img src="'+data.student_avatar+'"  alt="">';
                        }
                        else if(temp.sender_type=='Teacher')
                        {
                           html = html + '<div class="chat-message is-received">';
                            html = html + '<img src="'+data.teacher_avatar+'"  alt="">';
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

     function getteacherlistforstudentmessage(teacher_search_text)
     {

       $.ajax({
          type : 'POST',
          url : baseurl+'/getteacherlistforstudentmessage',
          dataType : 'json',
          data: {
            'teacher_search_text':teacher_search_text
          },
          success : function(data){
               //alert(data);
               //alert('success');
               //alert(JSON.stringify(data.data));
               var fdata = data.data;
               var html = "";
               if(fdata.length > 0)
               {
                for(var aa=0; aa < fdata.length; aa++ )
                {
                  var temp = fdata[aa];
                    html = html + '<div class="box-subscriber teacher_message_chat"  data-id="'+temp.id+'">';
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

<?php
if(\Request::route()->getName() == 'studentmessageinstitution')
{
  ?>
     var institution_search_text = '';

     getinstitutionlistforstudentmessage(institution_search_text);

     $("#institution_search_text").keyup(function(){
        institution_search_text = $('#institution_search_text').val();
        getinstitutionlistforstudentmessage(institution_search_text);
     });

     var last_institution_id_for_message = '';

     $(document).on('click', '.institution_message_chat', function () {
           var institution_id = $(this).data("id");
           last_institution_id_for_message = institution_id;
           getmessagechatforstudentinstitution();
     });


     $(document).on('click', '#send_message_button', function () {
        user_id=<?php echo $_GET['user_id']; ?>;
         institution_ids=<?php echo $_GET['institution_id']; ?>;
           var send_message_text = $('#send_message_text').val();
           if(send_message_text!='')
           {


            $('#send_message_button').text('Sending ...');
             $('#loading_message_send').show();



              //alert('send_message_text='+send_message_text);
              //alert('last_teacher_id_for_message='+last_teacher_id_for_message);

                $.ajax({
                type : 'POST',
                url : baseurl+'/sendmessagechatforstudentinstitution',
                dataType : 'json',
                data: {
                  'institution_id':last_institution_id_for_message,
                  'send_message_text':send_message_text,
                  'user_id':user_id,
            'institution_id':institution_ids,
                },
                success : function(data){
                    //  alert(data);
                    //  alert('success');
                    //  alert(JSON.stringify(data));
                     $('#send_message_text').val('');
                      $('#send_message_button').text('Send');
                       $('#loading_message_send').hide();
                       getmessagechatforstudentinstitution();





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

     setInterval(getmessagechatforstudentinstitution, 5000);

     function getmessagechatforstudentinstitution()
     {
        user_id=<?php echo $_GET['user_id']; ?>;
        institution_ids=<?php echo $_GET['institution_id']; ?>;
       if(last_institution_id_for_message!='')
       {


          $("#send_message").show();
          //alert(last_teacher_id_for_message);

              $.ajax({
                type : 'POST',
                url : baseurl+'/getmessagechatforstudentinstitution',
                dataType : 'json',
                data: {
                  'institution_id':last_institution_id_for_message,
                  'user_id':user_id,
            'institution_id':institution_ids,
                },
                success : function(data){
                    //  alert(data);
                    //  alert('success');
                    // alert(JSON.stringify(data));


                      $("#institution_name").html(data.institution_name);
                      $("#institution_logo").html('<img class="subscriber-avatar" src="'+data.institution_logo+'"  alt="">');

                      var fdata = data.data;
                   var html = "";
                   if(fdata.length > 0)
                   {
                    for(var aa=0; aa < fdata.length; aa++ )
                    {
                      var temp = fdata[aa];


                        if(temp.sender_type=='Student')
                        {
                           html = html + '<div class="chat-message is-sent">';
                            html = html + '<img src="'+data.student_avatar+'"  alt="">';
                        }
                        else if(temp.sender_type=='Institution')
                        {
                           html = html + '<div class="chat-message is-received">';
                            html = html + '<img src="'+data.institution_logo+'"  alt="">';
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

     function getinstitutionlistforstudentmessage(institution_search_text)
     {
        user_id=<?php echo $_GET['user_id']; ?>;
         institution_ids=<?php echo $_GET['institution_id']; ?>;

       $.ajax({
          type : 'POST',
          url : baseurl+'/getinstitutionlistforstudentmessage',
          dataType : 'json',
          data: {
            'institution_search_text':institution_search_text,
            'user_id':user_id,
            'institution_id':institution_ids,
          },
          success : function(data){
               //alert(data);
               //alert('success');
              // alert(JSON.stringify(data));
               var fdata = data.data;
               var html = "";
               if(fdata.length > 0)
               {
                for(var aa=0; aa < fdata.length; aa++ )
                {
                  var temp = fdata[aa];
                    html = html + '<div class="box-subscriber institution_message_chat"  data-id="'+temp.id+'">';
                    if(temp.logo!='')
                    {
                       html = html + '<img class="subscriber-avatar" src="'+temp.logo+'" data-user-popover="10" alt="">';
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

</body>

</html>
