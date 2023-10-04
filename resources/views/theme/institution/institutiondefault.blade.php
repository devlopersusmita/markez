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
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/core.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

      <!-- start 24.07.23 -->
      <link rel="stylesheet"  href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet"  href="{{asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet"  href="{{asset('assets/css/style.css')}}">

    <!-- end 24.07.23 -->
</head>

<body class="is-white">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQHJPZP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Pageloader -->
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>

@include('theme.institution.institutionheader')
@yield('content')
@include('theme.institution.institutionfooter')

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

      <!-- start 24.07.23 -->

      <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/owl.carousel.js')}}"></script>
        <script src="{{asset('assets/js/custom.js')}}"></script>

    <!-- end 24.07.23 -->


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
<input type="hidden" id="baseurl" value="{{url('/')}}" />
    <script>
         var  baseurl =$('#baseurl').val();
         var  user_type_student =$('#user_type_student').val();




        $.ajaxSetup({

           headers: {

               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

           }

       });


     $(document).on('click', '.subscribe_free', function () {



          event.preventDefault();
           document.getElementById('coursesubscriptionpay-form').submit();
          // view_modal_course_details

        });


      $(document).on('click', '.course_comment_rating_submit', function () {

        var course_comment = $('#course_comment').val();
        var comment_rating = $('#comment_rating').val();
        var course_id = $('#c_id').val();


        if(course_comment!='')
        {
            //alert('course_id='+course_id);
            //alert('course_comment='+course_comment);
            //alert('comment_rating='+comment_rating);

             var url = baseurl + '/coursecommentsubmit';
      $.ajax({
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: {'course_id':course_id,'course_comment':course_comment,'comment_rating':comment_rating},
              url: url,
              type: "post",
              dataType: 'json',
              success: function (data) {


              // alert(JSON.stringify(data));

              //alert('#view_modal_course_details_'+course_id);

               // $('#view_modal_course_details_'+course_id).trigger('click');

               loadcomments(course_id);



              },
              error: function (data) {
                  alert(JSON.stringify(data));
                  console.log( data);

              } ,
              complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
              }
          });
        }

      });

      function loadcomments(id,user_id,institution_id)
      {

             $('#coursesubscriptionpay_id').val(id);

              var url = baseurl + '/courseview/'+id;
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


                        var data_exist = datav.data_exist;
                        //alert(data_exist);
                          //alert(JSON.stringify(data));

                          var is_logged_in = datav.is_logged_in;

                           var all_comments = datav.all_comments;

                           var allready_commented = datav.allready_commented;

                          // alert('is_logged_in='+is_logged_in);
                          // alert('all_comments='+all_comments);
                          // alert('allready_commented='+allready_commented);
                          var default_image = datav.defaultimage;
                        //   alert(default_image);
                        //  alert(data.preview_image);
                        // var previewimage  = data.preview_image;
                        // alert(previewimage);
                        var preview_image = datav.data.preview_image;

                        var previewvideo  = data.preview_video;

                        var sd = data.start_date;
                          var sdar = sd.split(' ');
                          var s_date = sdar[0];

                          var ed = data.end_date;
                          var edar = ed.split(' ');
                          var e_date = edar[0];

                           var category_name = datav.category_name;


                        //   alert(category_name);

                         var htmlcont = '';
                         htmlcont=htmlcont+'<table class="table"  width="100%" cell-padding="10" cell-spacing="10">';






                         htmlcont=htmlcont+'<tr>';
                         htmlcont=htmlcont+'<td>';
                         htmlcont=htmlcont+'Ttile';
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
                             htmlcont=htmlcont+'Preview';
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
                         htmlcont=htmlcont+'Category';
                         htmlcont=htmlcont+'</td>';
                         htmlcont=htmlcont+'<td>';
                         htmlcont=htmlcont+category_name;
                         htmlcont=htmlcont+'</td>';
                         htmlcont=htmlcont+'</tr>';



                        if(previewvideo!=''){

                             htmlcont=htmlcont+'<tr>';
                             htmlcont=htmlcont+'<td>';
                             htmlcont=htmlcont+'Preview Video';
                             htmlcont=htmlcont+'</td>';
                             htmlcont=htmlcont+'<td>';
                             htmlcont=htmlcont+`<video width="320" height="240" controls>
              <source src=${previewvideo} type="video/mp4"></video>`;
                             htmlcont=htmlcont+'</td>';
                             htmlcont=htmlcont+'</tr>';
                         }


                         if(data.price==0){
                             htmlcont=htmlcont+'<tr>';
                             htmlcont=htmlcont+'<td>';
                             htmlcont=htmlcont+'Price';
                             htmlcont=htmlcont+'</td>';
                             htmlcont=htmlcont+'<td>';
                             htmlcont=htmlcont+data.price+"{{env('CURRENCY')}}"+' (Free) ';
                             htmlcont=htmlcont+'</td>';
                             htmlcont=htmlcont+'</tr>';
                         }
                         else{
                             htmlcont=htmlcont+'<tr>';
                             htmlcont=htmlcont+'<td>';
                             htmlcont=htmlcont+'Price';
                             htmlcont=htmlcont+'</td>';
                             htmlcont=htmlcont+'<td>';
                             htmlcont=htmlcont+data.price+"{{env('CURRENCY')}}";
                             htmlcont=htmlcont+'</td>';
                             htmlcont=htmlcont+'</tr>';
                         }




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

                         if(user_type_student=='Yes')
                         {

                             if(data_exist=='1'){
                                 htmlcont=htmlcont+'<tr>';
                                 htmlcont=htmlcont+'<td>';
                                 htmlcont=htmlcont+'';
                                 htmlcont=htmlcont+'</td>';
                                 htmlcont=htmlcont+'<td>';
                                 htmlcont=htmlcont+' <div class="button is-solid green-button" >Subscribed</div>';
                                 htmlcont=htmlcont+'</td>';
                                 htmlcont=htmlcont+'</tr>';
                             }else{
                                  if(data.price==0){
                                     htmlcont=htmlcont+'<tr>';
                                     htmlcont=htmlcont+'<td>';
                                     htmlcont=htmlcont+'';
                                     htmlcont=htmlcont+'</td>';
                                     htmlcont=htmlcont+'<td>';
                                     htmlcont=htmlcont+' <a class="button is-solid accent-button subscribe_free" href="'+baseurl + '/coursesubscription/'+id+'">Subscribe</a>';
                                     htmlcont=htmlcont+'</td>';
                                     htmlcont=htmlcont+'</tr>';
                                  }
                                  else{
                                     htmlcont=htmlcont+'<tr>';
                                     htmlcont=htmlcont+'<td>';
                                     htmlcont=htmlcont+'';
                                     htmlcont=htmlcont+'</td>';
                                     htmlcont=htmlcont+'<td>';
                                     htmlcont=htmlcont+' <a class="button is-solid accent-button " href="'+baseurl + '/coursesubscription/'+id+'">Pay</a>';
                                     htmlcont=htmlcont+'</td>';
                                     htmlcont=htmlcont+'</tr>';
                                  }


                             }
                        }



                         htmlcont=htmlcont+'<tr>';
                         htmlcont=htmlcont+'<td>';
                         htmlcont=htmlcont+'Comments';
                         htmlcont=htmlcont+'</td>';
                         htmlcont=htmlcont+'<td>';
                         htmlcont=htmlcont+'.....';
                         htmlcont=htmlcont+'</td>';
                         htmlcont=htmlcont+'</tr>';

                         if(all_comments.length > 0)
                         {
                            for(var p=0; p <all_comments.length ; p++)
                            {
                                var temp_v = all_comments[p];

                                htmlcont=htmlcont+'<tr>';
                                 htmlcont=htmlcont+'<td>';
                                 htmlcont=htmlcont+'';
                                 htmlcont=htmlcont+'</td>';
                                 htmlcont=htmlcont+'<td>';
                                 htmlcont=htmlcont+temp_v.comments+'('


                                 for(var cc=1; cc <=temp_v.rating;cc++ )
                                 {
                                    htmlcont=htmlcont+'<img src="'+baseurl+'/frontend/images/star-icon.png" width="15" />';
                                 }
                                 if(temp_v.rating < 5)
                                 {
                                    for(var dd=1; dd <= (5-temp_v.rating); dd++)
                                    {
                                        htmlcont=htmlcont+'<img src="'+baseurl+'/frontend/images/star-icon-blank.png" width="15" />';
                                    }
                                 }

                                 htmlcont=htmlcont+') ... by ('+temp_v.user_name+') ...  on '+temp_v.ca;
                                 htmlcont=htmlcont+'</td>';
                                htmlcont=htmlcont+'</tr>';
                            }
                         }


                         if((allready_commented=='No') && (data_exist=='1'))
                         {
                             htmlcont=htmlcont+'<tr>';
                             htmlcont=htmlcont+'<td>';
                             htmlcont=htmlcont+'';
                             htmlcont=htmlcont+'</td>';
                             htmlcont=htmlcont+'<td>';
                             htmlcont=htmlcont+' <div class="field field-group"><input type="hidden" id="c_id" value="'+id+'" /><label>Message</label><div class="control"><textarea id="course_comment" type="text" class="textarea is-fade" rows="1" placeholder="Fill in your comments..."></textarea></div></div><div class="control has-icons-left"><label style="padding-right:10px;">Rating</label><div class="select"><select id="comment_rating"><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1</option></select></div> <button class="button is-solid accent-button course_comment_rating_submit">Submit</button></div>';
                             htmlcont=htmlcont+'</td>';
                             htmlcont=htmlcont+'</tr>';
                         }


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
      }

     $(document).on('click', '.view_modal_course_details', function () {

        var id = $(this).data("id");
        var user_id = $(this).data("user_id");
        var institution_id = $(this).data("institution_id");
       alert(institution_id);
       loadcomments(id,user_id,institution_id);



  });

</script>
</body>

</html>
