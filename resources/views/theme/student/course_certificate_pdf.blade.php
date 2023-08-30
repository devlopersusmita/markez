     <?php if($purpose=='pdf'){?>
                            
       <?php
    $company_settings = \App\Models\CompanySetting::first();


    ?>                     


                                 
                                          
  <!DOCTYPE html>
                            <html lang="en">
                               <head>
                                  <meta charset="UTF-8">
                                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                 <title>{{$company_settings->name}}</title>
    <link rel="icon" type="image/png" href="{{$company_settings->fav_icon!= ''?asset($company_settings->fav_icon):asset('assets/img/favicon.png')}}" />
     <meta name="csrf-token" content="{{ csrf_token() }}">
                                  
                                  <style type="text/css">
                                     body {
                              margin: 0;
                              box-sizing: border-box; 
                            }

                              .certificate2-bg{
                            background: url({{asset('assets/img/certificate/img.jpg')}});
                              background-repeat: no-repeat;
                              background-size: cover;
                              background-position: center center;
                            width: 600px;
                                margin: 40px auto;
                                height: 463px;
                                padding: 40px;
                                text-align: center;
                                color: #a48a46;
                              }
                            .certificate2-bg img {
                                padding:  0 0 20px;
                            }
                            .certificate2-bg h1 {
                            font-size: 18px;
                            line-height: normal;
                               
                                font-weight: 200;
                                margin: 0;
                                text-transform: uppercase;
                            }
                            .certificate2-bg h2 {
                            padding: 20px 0 0;
                                font-style: italic;
                                font-weight: 400;
                                font-size: 30px;
                                margin: 0;
                            }
                            .certificate2-bg h3 {
                                padding: 5px 0 5px;
                                font-style: italic;
                                font-weight: bold;
                                font-size: 24px;
                                margin: 0;
                            }
                            .certificate2-bg h5 {
                                
                                margin: 0;
                            }
                            .sign2-sec {
                                width: 100%;
                                /*display: flex;*/
                                justify-content: space-around;
                                padding: 20px 0;
                            }
                            .sign2-sec-l, .sign2-sec-r {
                                
                                padding-top: 5px;
                                float:left;
                            }
                            .sign-sec-l .sign-text, .sign-sec-r .date-text{
                               width: 100%;
                                padding-bottom: 6px;
                                text-align: center;
                            }
                            .sign-sec-l , .sign-sec-r {
                               width: 50%;
                               float: left;
                            }
                            .sign-sec-l .sign-img, .sign-sec-r .date{
                                width: 100%;
                               padding-bottom: 6px;
                            }
                            .sign-sec-l .sign-img img {
                                width: 63px;
                                padding-bottom: 4px;
                               
                            }

                                                        .row {
    margin-right: -15px;
    margin-left: -15px;
}

@media (min-width: 768px)
.col-sm-12 {
    width: 100%;
}
@media (min-width: 768px)
.col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
    float: left;
}
.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.text-center {
    text-align: center;
}
                                  </style>
                               </head>
                               <body>
                                  <div class="certificate2-bg">
                                  <div class="container-fluid">
                                     <div class="row">
                                        <div class="col-sm-12 text-center">
                                           <img src="{{$company_settings->logo!= ''?asset($company_settings->logo):asset('assets/img/logo/friendkit-bold.svg')}}" height="60">
                                           <h1>{{$company_settings->name}}</h1>
                                           <h2>Certificate of Completion</h2>
                                           <h5>This is to certify that</h5>
                                         
                                            <h3>
                                                        <?php if($student_details->avatar!=''){echo "<img src='".asset($student_details->avatar)."' width='80' />";}?></h3><h3> {{$student_details->name}}</h3>
                                                   

                                           <h5>has completed the course</h5>

                                            <h5>{{$course->title}}</h5>

                                           <div class="sign2-sec">
                                              <div class="sign-sec-l">
                                                 <div class="sign-img">
                                                    <img src="{{$company_settings->director_signature!= ''?asset($company_settings->director_signature):asset('assets/img/certificate/signature.png')}}" alt="signature">
                                                 </div>
                                                <div class="sign-text">
                                                 Director
                                                </div>
                                              </div>
                                              <div class="sign-sec-r">
                                                 <div class="date">
                                                    <?php echo date('Y-m-d') ; ?>
                                                 </div>
                                                <div class="date-text">
                                                 Date
                                                </div>
                                              </div>
                                           </div>
                                        </div>

                                     </div>
                                  </div>
                                  </div>
                               </body>
                            </html>




        <?php }
        else{
            ?>
             <img  src="{{asset('assets/img/certificate/certificate.jpg')}}" alt=""  width="700" height="600">

            <?php

        }
        ?>
                           


                       
