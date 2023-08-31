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



                //   alert(category_name);

                 var htmlcont = '';
                 htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';





                    htmlcont=htmlcont+'<tr>';
                 htmlcont=htmlcont+'<td colspan="2">';
                 htmlcont=htmlcont+'<div class="cover-bg-2">';

                // //   if(users.background_image == '')
                // //   {
                //     htmlcont=htmlcont+'<img id="background_image_id" class="cover-image bg-image" src="'+asset_path+'assets/img/1600x460.png"  alt="">';
                // //   }
                // //   else
                // //   {
                //     htmlcont=htmlcont+'<img id="background_image_id" class="cover-image bg-image"  src="'+asset_path+users.background_image+'"  alt="">';
                // //   }

                htmlcont=htmlcont+'<img id="background_image_id" class="cover-image bg-image" src="'+background_image+'" width="100%"  alt="">';


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
       // alert(id);
        var type = $('#send_type').val();
        var teacher_id = $('#user_id').val();
        //alert(teacher_id);

      var url = baseurl + '/teacherstudentstudentsend/'+id+'/'+type;
      $('#loading_student_send').show();

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: { teacher_id: teacher_id },
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {
                  console.log('data',data);

                $('#loading_student_send').hide();

                 $('#search_btn_'+type).trigger('click');
                  $('#search_btn_private_pending').trigger('click');

                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-send').hide();


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
        var teacher_id = $('#user_id').val();
       // alert(teacher_id);
      var url = baseurl + '/teacherstudentstudentdelete/'+id+'/'+type;
       $('#loading_student_delete').show();

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data:  { teacher_id: teacher_id },
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
        var teacher_id = $('#user_id').val();
        alert(teacher_id);
      var url = baseurl + '/teacherstudentstudentapprove/'+id+'/'+type;

      $('#loading_student_approvet').show();

     // alert(url);

         $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: { teacher_id: teacher_id },
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {

                 $('#search_btn_'+type).trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-approve').hide();
                $('#loading_student_approvet').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_student_approvet').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_student_approvet').hide();
              }
          });



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

       $(document).on('click', '#course_statuschange', function () {


var id = $('#statuschange_id').val();
 var status = $('#statuschange_status').val();
var url = baseurl + '/teachercoursestatus/'+id+'/'+status;

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


   $(document).on('click', '#coursecontent_statuschange', function () {


var id = $('#coursecontentstatuschange_id').val();
 var status = $('#coursecontentstatuschange_status').val();
var url = baseurl + '/teachercoursecontentstatus/'+id+'/'+status;

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

        $('#modals-statuschangecoursecontent').hide();



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

$(document).on('click', '.coursecontentstatuschange_modal', function () {
      var id = $(this).data("id");
      var status = $(this).data("status");
      if(status=='active')
      {
        $('#coursecontent_status_span').html('<span class="alert-success p-2">Active</span>');
      }
      else if(status=='inactive')
      {
        $('#coursecontent_status_span').html('<span class="alert-danger p-2">Inactive</span>');
      }


       $('#coursecontentstatuschange_id').val(id)
;
       $('#coursecontentstatuschange_status').val(status);



    });

      $(document).on('click', '.coursecontentview_modal', function () {
    var id = $(this).data("id");

    var url = baseurl + '/teachercoursecontenteview/'+id;

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

               // var content  = data.content;
                // var video  = data.video_url;
                // var zoom   = data.zoom_url;

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

  $(document).on('click', '#course_delete', function () {


var id = $('#delete_id').val();
var url = baseurl + '/teachercoursecontentdelete/'+id;


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


  $(document).on('click', '.zoom_meeting_delete', function () {
      var id = $(this).data("id");
      $('#meeting_id').val(id);
    });

$(document).on('click', '#meeting_delete', function () {


var id = $('#meeting_id').val();
var url = baseurl + '/online_classes_delete/'+id;

 $('#loading_meeting_delete').show();
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



         $('#search_btn').trigger('click');
         $('body').removeClass('modal-open');
        $('body').css('padding-right', '0px');
        $('.modal-backdrop').remove();

        $('#modals-meeting-delete').hide();

         $('#loading_meeting_delete').hide();


      },
      error: function (data) {
         // alert(JSON.stringify(data));
          console.log( data);
          $('#loading_meeting_delete').hide();

      } ,
      complete: function(){
        $('.ajax-loader').css("visibility", "hidden");
        $('#loading_meeting_delete').hide();
      }
  });



});
$(document).on("click", "#add-new-coursecontent-link", function(event) {
       $('#modals-add').modal('show');
       //alert('ghgjhgjhjh');
       $('#form-input-error').html('');
           $('#form-input-success').html('');

       });
$(document).on('click', '.coursecontentdelete_modal', function () {
      var id = $(this).data("id");
       $('#delete_id').val(id);

    });

    var newCourseForm = $('.add-new-course');
     var editCourseForm = $('.edit-new-course');

      var newMeetingForm = $('.add-new-meeting');


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
            url:baseurl + '/teachercoursecontentstore',
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
                        $('#form-input-success').html(data.message);
                    $('#course_add').html('Save');
                        //alert(JSON.stringify(data));

                            $('#search_btn').trigger('click');
                        //  $('body').removeClass('modal-open');
                        // $('body').css('padding-right', '0px');
                        // $('.modal-backdrop').remove();
                        $('#title').val('');
                        $('#status').val('');
                        $('#description').val('');
                        $('#course_id').val('');
                        $('#type').val('');
                        $('#start_date').val('');
                        $('#end_date').val('');
                        $('#visibility').val('');
                        // $('#content').val('');
                        // $('#video_url').val('');
                        // $('#zoom_url').val('');
                        //$('#modals-add').hide();
                        $('#modals-add').modal('hide');

                    }
                        else if(data.type == 'error'){
                            $('#form-input-error').html(data.message);
                        $('#form-input-success').html('');
                            $('#course_add').html('Save');
                        //alert(data.message);
                        }


                    },
                    error: function (data) {
                        //alert(JSON.stringify(data));
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

  if (newMeetingForm.length) {


    newMeetingForm.on('submit', function (e) {

      e.preventDefault();

// console.log(baseurl)

$('#course_meeting_add').html('Sending..');


var formData = new FormData(this);
//   newurl = baseurl.replaceAll(" ",'') + '/institutioncoursestore'

 $('#loading_course_meeting_add').show();

var form_data = new FormData(this);



$.ajax({
    beforeSend: function(){
      $('.ajax-loader').css("visibility", "visible");
    },
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    //data: $('#postForm').serialize(),
    url:baseurl + '/online_classes_store',
     method:"POST",
     //data:new FormData(this),
     data:form_data,
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {
               // var responce = data.data[0];
                //console.log(responce,"ertwer")



                 $('#loading_course_meeting_add').hide();

               $('#course_meeting_add').html('Save');
               //RefreshTable()
                   //alert(JSON.stringify(data));
                  // $('#modals-add-meeting').reset();
                 // $("#modals-add-meeting").load(location.href + " #modals-add-meeting");


                    $('#search_btn').trigger('click');
                //  $('body').removeClass('modal-open');
                // $('body').css('padding-right', '0px');
                // $('.modal-backdrop').remove();
                $('#topic').val('');
                 $('#start_time').val('');
                $('#duration').val('');

              // $('#modals-add-meeting').hide();
                $('#modals-add-meeting').modal('hide');


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#course_meeting_add').html('Save Changes');

                   //newGameSidebar.modal('hide');
                $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                 $('#loading_course_meeting_add').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                 //$('#loading_course_meeting_add').hide();
              }
          });


    });
  }

//   function RefreshTable() {
//        $( ".tableid1" ).load( `${baseurl + '/online_classes_store'} .tableid1` );
//    }
   if (editCourseForm.length) {


    editCourseForm.on('submit', function (e) {

      e.preventDefault();

        var id = $('#edit_id').val();


          $('#course_edit').html('Sending..');

          var description_edit = CKEDITOR.instances.description_edit.getData();

var formData = new FormData(this);

formData.append('description_value', description_edit);

$.ajax({
    beforeSend: function(){
      $('.ajax-loader').css("visibility", "visible");
    },
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    //data: $('#postForm').serialize(),
    url: baseurl + '/teachercoursecontentupdate/'+id,
    method:"POST",
     data:formData,
               dataType:'JSON',
               contentType: false,
               cache: false,
               processData: false,
              success: function (data) {

               $('#course_edit').html('Save');
                   //alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
                $('#title_edit').val('');
                $('#description_edit').val('');
                $('#status_edit').val('');
                // $('#course_id_edit').val('');
                 $('#type_edit').val('');
                // $('#content_edit').val('');
                // $('#video_url_edit').val('');
                // $('#zoom_url_edit').val('');
                $('#start_date_edit').val('');
                $('#end_date_edit').val('');
                $('#visibility_edit').val('');
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
  $(document).on('click', '.edit_modal', function () {
      var id = $(this).data("id");

      var url = baseurl + '/teachercoursecontenteview/'+id;

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

                  //alert(data.from_date);
                  var sd = data.start_date;
                  var sdar = sd.split(' ');
                  var s_date = sdar[0];
                 // alert(s_date);
                 var ed = data.end_date;
                  var edar = ed.split(' ');
                  var e_date = edar[0];

//alert(datav.course_teachers_user_id);




                  $('#title_edit').val(data.title);
                  $('#status_edit').val(data.status);
                  $('#type_edit').val(data.type);
                  //$('#description_edit').val(data.description);
                  CKEDITOR.instances.description_edit.setData(data.description);

                 $('#visibility_edit').val(data.visibility);

                //   $('#content_edit').val(data.content);

                //    $('#video_url_edit').val(data.video_url);
                //    $('#zoom_url_edit').val(data.zoom_url);
                $('#start_date_edit').val(s_date);
                $('#end_date_edit').val(e_date);

                //preview_image_edit_div







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



 $(document).on('click', '.view_modal_it', function () {
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



                // var data = datav.data;
                //   alert(JSON.stringify(data));
                  var institution = datav.data.institution;
                  var institution_details = datav.data.institution_details;


       var logoimg = datav.data.logo;


       var user_details = datav.data.user_details;

       var asset_path = datav.data.asset_path;


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

      $(document).on('click', '.institution_send_it', function () {


        var id = $('#send_id_it').val();
        var type = $('#send_type_it').val();
      var url = baseurl + '/teacherinstitutioninstitutionsend/'+id+'/'+type;


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

                $('#loading_institution_send_it').hide();

                 $('#search_btn_'+type+'_it').trigger('click');
                  $('#search_btn_private_pending_it').trigger('click');

                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-send_it').hide();


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

        //alert('institution_delete_it');
        var id = $('#delete_id_it').val();
        var type = $('#delete_type_it').val();
      var url = baseurl + '/teacherinstitutioninstitutiondelete/'+id+'/'+type;

        $('#loading_institution_delete_it').show();


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
                 $('#loading_institution_delete_it').hide();

               // alert(JSON.stringify(data));
                 $('#search_btn_'+type+'_it').trigger('click');
                 $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $('#modals-delete_it').hide();


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
      var url = baseurl + '/teacherinstitutioninstitutionapprove/'+id+'/'+type;

      $('#loading_institution_approve_it').show();


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
                $('#loading_institution_approve_it').hide();


              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);
                  $('#loading_institution_approve_it').hide();

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
                $('#loading_institution_approve_it').hide();
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
      url: "{{ url('teacherajaxImageUpload')}}",
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


    // course content start //

    //////// course content start quiz /////////////
      var newQuizForm = $('.add-new-quiz');
     var editQuizForm = $('.edit-new-quiz');


  if (newQuizForm.length) {


    newQuizForm.on('submit', function (e) {

      e.preventDefault();

// console.log(baseurl)

$('#quiz_add').html('Sending..');


var formData = new FormData(this);
//   newurl = baseurl.replaceAll(" ",'') + '/institutioncoursestore'



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
    url:baseurl + '/teachercoursecontentquizestore',
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
                 $('#form-input-success').html(data.message);

               $('#quiz_add').html('Save');
                   //alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                //  $('body').removeClass('modal-open');
                // $('body').css('padding-right', '0px');
                // $('.modal-backdrop').remove();
                $('#title').val('');
                 $('#status').val('');
                 $('#course_content_id').val('');
                 $('#start_date').val('');
                $('#end_date').val('');
               // $('#modals-add').hide();
                $('#modals-add').modal('hide');
            }
                else if(data.type == 'error'){
                    $('#form-input-error').html(data.message);
                 $('#form-input-success').html('');
                    $('#quiz_add').html('Save');
                 alert(data.message);
                }

              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  $('#quiz_add').html('Save Changes');

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



    $(document).on('click', '.view_modal_quize', function () {
      var id = $(this).data("id");

      var url = baseurl + '/teachercoursecontentquizeview/'+id;


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

    if (editQuizForm.length) {


        editQuizForm.on('submit', function (e) {

  e.preventDefault();

    var id = $('#quizedit_id').val();


      $('#quiz_edit').html('Sending..');



var formData = new FormData(this);


$.ajax({
beforeSend: function(){
  $('.ajax-loader').css("visibility", "visible");
},
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
//data: $('#postForm').serialize(),
url: baseurl + '/teachercoursecontentquizeupdate/'+id,
method:"POST",
 data:formData,
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
          success: function (data) {

           $('#quiz_edit').html('Save');
               //alert(JSON.stringify(data));

                $('#search_btn').trigger('click');
             $('body').removeClass('modal-open');
            $('body').css('padding-right', '0px');
            $('.modal-backdrop').remove();
            $('#title_edit').val('');

            $('#status_edit').val('');
            $('#start_date_edit').val('');
            $('#end_date_edit').val('');

            $('#modals-edit').hide();


          },
          error: function (data) {
              alert(JSON.stringify(data));
              $('#quiz_edit').html('Save Changes');
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
$(document).on('click', '.edit_modal_quize', function () {
  var id = $(this).data("id");

  var url = baseurl + '/teachercoursecontentquizeview/'+id;

  //alert(url) ;

 // alert(baseurl);
  //alert(id)
;


  $('#quizedit_id').val(id)
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

              //alert(data.from_date);
              var sd = data.start_date;
              var sdar = sd.split(' ');
              var s_date = sdar[0];
             // alert(s_date);
             var ed = data.end_date;
              var edar = ed.split(' ');
              var e_date = edar[0];






              $('#title_edit').val(data.title);
              $('#status_edit').val(data.status);
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


$(document).on('click', '#quiz_statuschange', function () {


var id = $('#quizstatuschange_id').val();
 var status = $('#quizstatuschange_status').val();
var url = baseurl + '/teachercoursecontentquizestatus/'+id+'/'+status;

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

        $('#modals-statuschangequiz').hide();



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


$(document).on('click', '.quizestatuschange_modal', function () {
      var id = $(this).data("id");
      var status = $(this).data("status");
      if(status=='active')
      {
        $('#quiz_status_span').html('<span class="alert-success p-2">Active</span>');
      }
      else if(status=='inactive')
      {
        $('#quiz_status_span').html('<span class="alert-danger p-2">Inactive</span>');
      }


       $('#quizstatuschange_id').val(id)
;
       $('#quizstatuschange_status').val(status);



    });

    $(document).on('click', '#quiz_delete', function () {


var id = $('#delete_id').val();
var url = baseurl + '/teachercoursecontentquizedelete/'+id;


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
    $(document).on('click', '.quizdelete_modal', function () {
      var id = $(this).data("id");
       $('#delete_id').val(id)
;

    });

    //////// Course Content  Quiz End /////////////

     //////// Course Content  Question Start /////////////

    var newQuestionForm = $('.add-new-question');
     var editQuestionForm = $('.edit-new-question');


  if (newQuestionForm.length) {


    newQuestionForm.on('submit', function (e) {

      e.preventDefault();

// console.log(baseurl)

$('#question_add').html('Sending..');


var formData = new FormData(this);
//   newurl = baseurl.replaceAll(" ",'') + '/institutioncoursestore'

var question_text = CKEDITOR.instances.question_text.getData();
var option_a = CKEDITOR.instances.option_a.getData();
var option_b = CKEDITOR.instances.option_b.getData();
var option_c = CKEDITOR.instances.option_c.getData();
var option_d = CKEDITOR.instances.option_d.getData();
if((question_text=='') || (question_text==null))
{
    $('#question_add').html('Save');
   alert('Please give Question text');
    exit();
}
if((option_a=='') || (option_a==null))
{
    $('#question_add').html('Save');
    alert('Please give Option A');
    exit();
}
if((option_b=='') || (option_b==null))
{
    $('#question_add').html('Save');
    alert('Please give Option B');
    exit();
}
if((option_c=='') || (option_c==null))
{
    $('#question_add').html('Save');
    alert('Please give Option C');
    exit();
}
if((option_d=='') || (option_d==null))
{
    $('#question_add').html('Save');
    alert('Please give Option D');
    exit();
}

var answer = '';
if($("#a").prop("checked"))
{
    answer='a';
}
else if($("#b").prop("checked"))
{
    answer='b';
}
else if($("#c").prop("checked"))
{
    answer='c';
}
else if($("#d").prop("checked"))
{
    answer='d';
}
if((answer=='') || (answer==null)){
    $('#question_add').html('Save');
    alert('Please checked answer');
    exit();
}

var form_data = new FormData(this);

form_data.append('question_text_value', question_text);
form_data.append('option_a_value', option_a);
form_data.append('option_b_value', option_b);
form_data.append('option_c_value', option_c);
form_data.append('option_d_value', option_d);

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
    url:baseurl + '/teachercoursecontentquizequestionstore',
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
                 $('#question_add').html('Save');
                //alert("success");
                  //alert(JSON.stringify(data));

                    $('#search_btn').trigger('click');
                //  $('body').removeClass('modal-open');
                // $('body').css('padding-right', '0px');
                // $('.modal-backdrop').remove();

                 $('#status').val('');
                $('#question_text').val('');
                $('#option_a').val('');
                $('#option_b').val('');
                $('#option_c').val('');
                $('#option_d').val('');
                $('#answer').val('');
                $('#marks').val('');
                 // $('#modals-add').hide();
                $('#modals-add').modal('hide');
                $('#new-question').trigger("reset");
                CKEDITOR.instances.question_text.setData();
                CKEDITOR.instances.option_a.setData('');
               CKEDITOR.instances.option_b.setData();
               CKEDITOR.instances.option_c.setData();
               CKEDITOR.instances.option_d.setData();
                //document.getElementById("new-question").reset();
            }
                else if(data.type == 'error'){
                    $('#form-input-error').html(data.message);
                 $('#form-input-success').html('');

                    $('#question_add').html('Save');
                 alert(data.message);
                }

              },
              error: function (data) {
                  //alert("error");
                  //
                  alert(JSON.stringify(data));
                  $('#question_add').html('Save Changes');

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

  if (editQuestionForm.length) {


    editQuestionForm.on('submit', function (e) {

     e.preventDefault();

    var id = $('#questionedit_id').val();


      $('#question_edit').html('Sending..');


      var question_text_edit = CKEDITOR.instances.question_text_edit.getData();
      var option_a_edit = CKEDITOR.instances.option_a_edit.getData();
      var option_b_edit = CKEDITOR.instances.option_b_edit.getData();
      var option_c_edit = CKEDITOR.instances.option_c_edit.getData();
      var option_d_edit = CKEDITOR.instances.option_d_edit.getData();

if((question_text_edit=='') || (question_text_edit==null))
{
    $('#question_edit').html('Save');
   alert('Please give Question text');
    exit();
 }
 if((option_a_edit=='') || (option_a_edit==null))
{
    $('#question_edit').html('Save');
   alert('Please give Option A');
    exit();
 }
 if((option_b_edit=='') || (option_b_edit==null))
{
    $('#question_edit').html('Save');
   alert('Please give Option B');
    exit();
 }
 if((option_c_edit=='') || (option_c_edit==null))
{
    $('#question_edit').html('Save');
   alert('Please give Option C');
    exit();
 }
 if((option_d_edit=='') || (option_d_edit==null))
{
    $('#question_edit').html('Save');
   alert('Please give Option D');
    exit();
 }
//  if( $('#radio').attr('checked') ){
//     console.log("Is checked!");
// }


var answer = '';
if($("#a_edit").prop("checked"))
{
    answer='a';
}
else if($("#b_edit").prop("checked"))
{
    answer='b';
}
else if($("#c_edit").prop("checked"))
{
    answer='c';
}
else if($("#d_edit").prop("checked"))
{
    answer='d';
}
if((answer=='') || (answer==null)){
    $('#question_add').html('Save');
    alert('Please checked answer');
    exit();
}
var formData = new FormData(this);

formData.append('question_text_value', question_text_edit);
formData.append('option_a_value', option_a_edit);
formData.append('option_b_value', option_b_edit);
formData.append('option_c_value', option_c_edit);
formData.append('option_d_value', option_d_edit);
formData.append('answer_value', answer);

//alert(JSON.stringify(formData));


$.ajax({
beforeSend: function(){
  $('.ajax-loader').css("visibility", "visible");
},
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
//data: $('#postForm').serialize(),
url: baseurl + '/teachercoursecontentquizequestionupdate/'+id,
method:"POST",
 data:formData,
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
          success: function (data) {

            location.reload();

           $('#question_edit').html('Save');

              // alert(JSON.stringify(data));

                $('#search_btn').trigger('click');
             $('body').removeClass('modal-open');
            $('body').css('padding-right', '0px');
            $('.modal-backdrop').remove();
            $('#question_text_edit').val('');
            $('#option_a_edit').val('');
            $('#option_b_edit').val('');
            $('#option_c_edit').val('');
            $('#option_d_edit').val('');
            $('#a_edit').val('');
            $('#b_edit').val('');
            $('#c_edit').val('');
            $('#d_edit').val('');
            $('#marks_edit').val('');
            $('#status_edit').val('');
            $('#modals-edit').hide();


          },
          error: function (data) {
              alert(JSON.stringify(data));
              $('#question_edit').html('Save Changes');
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
$(document).on('click', '.edit_modal_course_question', function () {
  var id = $(this).data("id");

  var url = baseurl + '/teachercoursecontentquizequestionview/'+id;

  //alert(url) ;

 // alert(baseurl);
  //alert(id)
;


  $('#questionedit_id').val(id)
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

          CKEDITOR.instances.question_text_edit.setData(data.question_text);
          CKEDITOR.instances.option_a_edit.setData(data.option_a);
          CKEDITOR.instances.option_b_edit.setData(data.option_b);
          CKEDITOR.instances.option_c_edit.setData(data.option_c);
          CKEDITOR.instances.option_d_edit.setData(data.option_d);

        //  alert(data.answer);


          if(data.answer=='a')
          {
            $("#a_edit").prop("checked", true);
          }
          else  if(data.answer=='b')
          {
            $("#b_edit").prop("checked", true);
          }
          else  if(data.answer=='c')
          {
            $("#c_edit").prop("checked", true);
          }
          else  if(data.answer=='d')
          {
            $("#d_edit").prop("checked", true);
          }
          $('#marks_edit').val(data.marks);
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



$(document).on('click', '#question_statuschange', function () {


var id = $('#questionstatuschange_id').val();
 var status = $('#questionstatuschange_status').val();
var url = baseurl + '/teachercoursecontentquizequestionstatus/'+id+'/'+status;

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

        $('#modals-statuschangequestion').hide();



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


$(document).on('click', '.questionstatuschange_modal', function () {
      var id = $(this).data("id");
      var status = $(this).data("status");
      if(status=='active')
      {
        $('#question_status_span').html('<span class="alert-success p-2">Active</span>');
      }
      else if(status=='inactive')
      {
        $('#question_status_span').html('<span class="alert-danger p-2">Inactive</span>');
      }


       $('#questionstatuschange_id').val(id)

;
       $('#questionstatuschange_status').val(status);



    });



    $(document).on('click', '.view_modal_question', function () {
      var id = $(this).data("id");

      var url = baseurl + '/teachercoursecontentquizequestionview/'+id;


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


    $(document).on('click', '#question_delete', function () {


        var id = $('#delete_id').val();
        var quiz_id = $('#quiz_id').val();
        var url = baseurl + '/teachercoursecontentquizequestiondelete/'+id+'/'+quiz_id;
        $('#loading_questions_delete').show();



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
        $('#loading_questions_delete').hide();


      },
      error: function (data) {
          alert(JSON.stringify(data));
          console.log( data);

      } ,
      complete: function(){
        $('.ajax-loader').css("visibility", "hidden");
        $('#loading_questions_delete').hide();
      }
  });



});
    $(document).on('click', '.questiondelete_modal', function () {
      var id = $(this).data("id");
       $('#delete_id').val(id)

  ;

    });

    $(document).on("click", "#add-new-quize-link", function(event) {
       $('#modals-add').modal('show');
       $('#form-input-error').html('');
           $('#form-input-success').html('');


       });

       $(document).on("click", "#add-new-question-link", function(event) {
       $('#modals-add').modal('show');

       });


$(document).on("click", "#add-new-meeting-link", function(event) {
       $('#modals-add-meeting').modal('show');

       });



</script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
  <?php
if(Route::currentRouteName()=='teachercoursecontent')
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
<?php
if(Route::currentRouteName()=='teachercoursecontentquizequestion')
 {
 ?>
CKEDITOR.replace('question_text',{
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'




});
CKEDITOR.replace('question_text_edit', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('option_a', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('option_a_edit', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('option_b', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('option_b_edit', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('option_c', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('option_c_edit', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('option_d', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('option_d_edit', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});

<?php } ?>

 $(document).on("click", ".attendance_check_box", function(event) {
    $('#message_id').html('');

        var thistype = '';
if (this.checked)
    {
    thistype = 'checked';
    }
    else
    {
        thistype ='not checked';
    }
//alert(thistype);
    var user_id = $(this).data("id");
    var oline_id =  $(this).data("onlineid");
    var url = baseurl + '/teacheronlineattendancestore/'+user_id+'/'+oline_id;
   // alert(user_id);
    // alert(oline_id);
    // alert(url);



    $.ajax({
      beforeSend: function(){
        $('.ajax-loader').css("visibility", "visible");
      },
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {'thistype':thistype},
      url: url,
      type: "post",
      dataType: 'json',
      success: function (data) {

        //alert('success');
        //alert(JSON.stringify(data));

        $('#message_id').html(data.success);


      },
      error: function (data) {
          alert(JSON.stringify(data));
          console.log( data);

      } ,
      complete: function(){
        //$('.ajax-loader').css("visibility", "hidden");

      }
  });




});

<?php
if(\Request::route()->getName() == 'teachermessage')
{
  ?>

     var student_search_text = '';
     getstudentlistforteachermessage(student_search_text);
     $("#student_search_text").keyup(function(){
       student_search_text = $('#student_search_text').val();
       getstudentlistforteachermessage(student_search_text);
     });

     var last_student_id_for_message = '';

     $(document).on('click', '.student_message_chat', function () {
           var student_id = $(this).data("id");
           last_student_id_for_message = student_id;
           getmessagechatforteacherstudent();
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
                url : baseurl+'/sendmessagechatforteacherstudent',
                dataType : 'json',
                data: {
                  'student_id':last_student_id_for_message,
                  'send_message_text':send_message_text
                },
                success : function(data){
                    // alert(data);
                     //alert('success');
                     //alert(JSON.stringify(data));
                     $('#send_message_text').val('');
                     $('#send_message_button').text('Send');
                       $('#loading_message_send').hide();
                     getmessagechatforteacherstudent();





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

     setInterval(getmessagechatforteacherstudent, 5000);

     function getmessagechatforteacherstudent()
     {
      if(last_student_id_for_message!='')
      {

        $("#send_message").show();
        //alert(last_teacher_id_for_message);

            $.ajax({
              type : 'POST',
              url : baseurl+'/getmessagechatforteacherstudent',
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


                      if(temp.sender_type=='Teacher')
                      {
                         html = html + '<div class="chat-message is-sent">';
                          html = html + '<img src="'+data.teacher_avatar+'"  alt="">';
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

     function getstudentlistforteachermessage(student_search_text)
     {

       $.ajax({
          type : 'POST',
          url : baseurl+'/getstudentlistforteachermessage',
          dataType : 'json',
          data: {
            'student_search_text':student_search_text
          },
          success : function(data){
               //alert(data);
               //alert('success');
              // alert(JSON.stringify(data.data));
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


$('.drop-menu').click(function()
{
   $('.sub-menu').toggle();
})
</script>
</body>

</html>
