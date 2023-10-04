<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseContent;
use App\Models\Category;
use App\Models\CourseSubscription;
use App\Models\UserDetail;
use App\Models\InstitutionSubcription;
use App\Models\InstitutionSubcriptionPackage;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Cms;
use App\Models\Faq;
use App\Models\CourseComment;
use App\Models\TermsandCondition;
use App\Models\Privacypolicy;
use App\Models\Aboutus;
use App\Models\SystemSetting;
use App\Models\UserVisitor;


use File;


use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use App\Models\City;

use App\Models\RequestDetails;
use App\Models\TeacherStudent;
use App\Models\online_classe;
use App\Models\Contactus;
use App\Models\HomeSetting;
use App\Models\InstitutionCompanySetting;
use App\Models\InstitutionSystemSetting;
use App\Models\InstitutionBannerSetting;


use App\Models\InstitutionAdmin;

use App\Models\InstitutionStudent;
use App\Models\InstitutionTeacher;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Stroage;

use Illuminate\Support\Facades\Http;

use DB;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

use App\Models\Country;
use App\Models\Institution;

use Mail;

use App\Mail\NotifyMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       // return view('home');
        $togonotadmin = false;
         if(Auth::check())
         {
            if(Auth::user()->role == '4'){
                 return redirect('/admin/dashboard');
            }
            else
            {
                $togonotadmin = true;

            }

         }
         else
         {
            $togonotadmin = true;
         }

         if($togonotadmin==true)
         {
            $data9= [];
            if(Auth::user())
            {
                $user_id = Auth::user()->id;
                $data9=CourseSubscription::where(['user_id'=>$user_id])->orderBy('id','desc')->get();

            }
            else
            {
                $user_id = 0;
            }

            $current_date_time = date('Y-m-d');


             $categories=Category::where(['status'=>'active'])->orderBy('id','desc')->limit(4)->get();


            $data7=Course::leftjoin('categories','categories.id','=','courses.category_id')->where(['courses.status'=>'active','courses.visibility'=>1])->whereDate('courses.start_date', '<=', Carbon::now())->orderBy('courses.id','desc')->select('courses.*','categories.name as category_name')->get();

            // dd($data7);
            $institution_lists = Institution::where(['inst_status'=>'active'])->orderBy('id','desc')->limit(4)->get();
                           // dd($institutions);

                           $subcription_package_lists = InstitutionSubcriptionPackage::orderBy('institution_subscription_packages.id','desc')->orderBy('id','desc')->get();

                           $sliders=HomeSetting::orderBy('home_settings.id','desc')->select('home_settings.*')->limit(3)->get();
                           //dd($sliders);



            $output_array =[];
            if(!empty($data7))
            {
                foreach($data7 as $data7s)
                {

                $courseconid = $data7s->id;
                //echo($courseconid);


                 $totalcoursecontentid = CourseContent::where('course_contents.course_id','=',$courseconid)->get()->count();




            //  start  coursecontent_typewisebutton type //

                 $coursecontent_typewisebutton = CourseContent::where('course_contents.course_id','=',$courseconid)->get();

                $array = array();
                $course_type =[];


                    foreach($coursecontent_typewisebutton as $coursecontent_typewisebuttons)
                    {


                    $course_type_wise = $coursecontent_typewisebuttons->type;


                            if($course_type_wise == 'zoom')
                            {


                    $onlineclass_starttime = online_classe::where('online_classes.course_id','=',$courseconid)->select('online_classes.start_at')->get();
                    //dd($onlineclass_starttime);

                    $zoomclass_array =[];
                        if(!empty($onlineclass_starttime))
                        {
                            $pass = '';
                            foreach($onlineclass_starttime as $onlineclass_starttimes)
                            {


                            $zoom_class_start = $onlineclass_starttimes->start_at;
                            //echo($zoom_class_start);
                            $pass = $zoom_class_start;


                            }
                        }


                        $current_time = date('Y-m-d H:i:s');
                        // echo $current_datetime;

                       $show_currenttime =strtotime($current_time);
                        $show_zoomclasstime =strtotime($pass);



                       if($show_currenttime > $show_zoomclasstime)
                       {

                           array_push($array,"1");



                       }
                       else
                       {
                          array_push($array,"0");
                       }
                    }

                            else{
                                array_push($array,"0");

                            }

                    }

                    $variables =false;
                    if (in_array("1", $array))
                      {
                     $variables =true;
                      }

 //  end  coursecontent_typewisebutton type //



    // $onlineclass_starttime = online_classe::where('online_classes.course_id','=',$courseconid)->select('online_classes.start_at')->get();

    //         $zoomclass_array =[];
    //             if(!empty($onlineclass_starttime))
    //             {
    //                 $pass = '';
    //                 foreach($onlineclass_starttime as $onlineclass_starttimes)
    //                 {


    //                 $zoom_class_start = $onlineclass_starttimes->start_at;
    //                 //echo($zoom_class_start);
    //                 $pass = $zoom_class_start;


    //                 }
    //             }








            //  start  content type //

            $coursecontent_type = CourseContent::where('course_contents.course_id','=',$courseconid)->get();


            $coursecontent_typear = [];

            $array = array();

            foreach($coursecontent_type as $coursecontent_types)
            {
             $content_type = $coursecontent_types->type;

             if($content_type == 'zoom')
             {
                // echo  "EEEEE";
                 $onlineclass_end = online_classe::where('online_classes.course_id','=',$courseconid)->select('online_classes.start_at')->get();

                 $zoom_array =[];
                if(!empty($onlineclass_end))
                {
                    $zoom_end = '';
                    foreach($onlineclass_end as $onlineclass_ends)
                    {


                    $online_class_time = $onlineclass_ends->start_at;
                    //echo($zoom_class_start);
                    $zoom_end = $online_class_time;
                    }
                }

                 // echo $onlineclass_end;
                 $current_datetime = date('Y-m-d H:i:s');
                 // echo $current_datetime;

                $show_currentdatetime =strtotime($current_datetime);
                 $show_zoomclassdatetime =strtotime($zoom_end);



                if($show_currentdatetime > $show_zoomclassdatetime)
                {
                    //"tttttt";

                    //array_push($array,0);
                    array_push($array,"0");
                   // die();


                }
                else
                {



                   // array_push($array,1);

                      array_push($array,"1");
                }

             }

             else
             {

                    //"dfggggg";
                                //array_push($array,1);
                                array_push($array,"1");
             }








            }


 $variable =false;
if (in_array("1", $array))
  {
 $variable =true;
  }




            // end content type //





                $data7s['totalcoursecontent']= $totalcoursecontentid;

                $data7s['zoom_endtime']= $variables;
                 $data7s['content_course_type']= $variable;
                //  echo($variable);
                //  die();


                $output_array[]=$data7s;

                }
            }








            //Session::get();



            return view('theme.home',['user_id'=>$user_id,'courses'=>$output_array,'course_subscriptions'=>$data9,'categories'=>$categories,'institution_lists'=>$institution_lists,'subcription_package_lists'=>$subcription_package_lists,'sliders'=>$sliders]);
         }
    }

    public function page($slug)
    {
        $page=Cms::where(['status'=>'active','slug'=>$slug])->first();
         return view('theme.page',['page'=>$page]);
    }


    public function faq()
    {
        $faqs=Faq::where(['status'=>'active'])->orderBy('order_no','asc')->get();
         return view('theme.faq',['faqs'=>$faqs]);
    }

    public function studentview($id)
    {
        $student = User::where('id',$id)->first();
        $background_image_temp = $student->background_image;
        $background_image = asset('assets/img/1600x460.png');
        if($background_image_temp!='' && file_exists($background_image_temp))
        {
            $background_image = asset($background_image_temp);
        }
        $avatar_temp = $student->avatar;
        $avatar = asset('assets/img/icons/activities/drinking.svg');
        if($avatar_temp!='' && file_exists($avatar_temp))
        {
            $avatar = asset($avatar_temp);
        }

        $asset_path = asset('');


       $user_details = UserDetail::leftJoin('countries','user_details.country_id','=','countries.id')->leftJoin('cities','user_details.city_id','=','cities.id')->where('user_id',$id)->select('user_details.*','countries.c_name as country_name','cities.city_name')->first();

        $data = array('users'=>$student,'background_image'=>$background_image,'avatar'=>$avatar,'user_details'=>$user_details,'asset_path'=>$asset_path);



        return json_encode(array('status'=>'ok','data'=>$data));


    }
     public function courseview($id)
    {
        $course = Course::where('id',$id)->first();
        $category_name = Category::where('id',$course->category_id)->first()->name;
         $data_exist = 0;
         $is_logged_in = 'No';
         $allready_commented = 'Yes';
         if(Auth::user())
            {
                $is_logged_in = 'Yes';
                $user_id = Auth::user()->id;
                $data_exist=CourseSubscription::where(['user_id'=>$user_id,'course_id'=>$id])->count();

                $allready_commented_count = CourseComment::where(['course_id'=>$id,'user_id'=>$user_id])->count();
                if($allready_commented_count > 0)
                {
                    $allready_commented = 'Yes';
                }
                else
                {
                   $allready_commented = 'No';
                }
             }

             $all_comments = CourseComment::leftjoin('users','course_comments.user_id','=','users.id')->where(['course_comments.course_id'=>$id])->orderBy('course_comments.id','desc')
             ->select('course_comments.*','users.name as user_name','course_comments.created_at as ca')
             ->limit(10)->get();
             $defaultimage = asset('frontend/course/defaultcourse.jpg');


             $preview_image_temp = $course->preview_image;
             $preview_image = asset('frontend/course/defaultcourse.jpg');
             if($preview_image_temp!='' && file_exists($preview_image_temp))
             {
                 $preview_image = asset($preview_image_temp);

             }
             $asset_path = asset('');

        return json_encode(array('status'=>'ok','allready_commented'=>$allready_commented,'is_logged_in'=>$is_logged_in,'all_comments'=>$all_comments,'data'=>$course,'category_name'=>$category_name,'data_exist'=>$data_exist,'defaultimage'=>$defaultimage,'asset_path'=>$asset_path,'preview_image'=>$preview_image));


    }

  public function getcity($country_id)
    {
        $html ='';
       $cities = City::where('country_id',$country_id)->orderBy('city_name','asc')->get();
       if(!empty($cities))
       {
        foreach($cities as $city)
        {
            $html=$html.'<option value="'.$city->id.'">'.$city->city_name.'</option>';
        }
       }
       return $html;
    }

public function coursecommentsubmit(Request $request)
    {
      $user_id = Auth::user()->id;
      $course_id = $request->post('course_id');
      $course_comment_field = $request->post('course_comment');
      $comment_rating = $request->post('comment_rating');

      //CourseComment
        $course_comment = new CourseComment();
        $course_comment->course_id = $course_id;
        $course_comment->user_id = $user_id;
        $course_comment->rating  = $comment_rating;
        $course_comment->comments  = $course_comment_field;
        $course_comment->created_by  = $user_id;

        $course_comment->save();


        $course_details = Course::where('id',$course_id)->first();
        $average_rating = $course_details->average_rating;
        $total_comments = $course_details->total_comments;

        $final_total_comments = $total_comments + 1;
        $total_rating = ($average_rating * $total_comments);
        $final_average_rating = ($total_rating + $comment_rating)/$final_total_comments;

        $course_details->average_rating =$final_average_rating ;
        $course_details->total_comments =$final_total_comments ;
        $course_details->save();


      return json_encode(array('status'=>'ok','message'=>'Successfully comment submitted!','temp'=>array('user_id'=>$user_id,'course_id'=>$course_id,'course_comment'=>$course_comment,'comment_rating'=>$comment_rating)));


    }

public function coursesubscriptionpay(Request $request)
    {
       $id = $request->id;
         $data_exist = 0;

            //course subcription limit//
            $course_id=Course::where('id',$id)->first();
            $students_limit=$course_id->students_limit;
            $course_subcription_count=CourseSubscription::where('course_id',$id)->count();
             if($course_subcription_count >=  $students_limit)
                {

                    return redirect()->route('home')->with('message', 'This course  reaches maximum student subcriptions!');
                }

        if(Auth::user())
            {
            $user_id = Auth::user()->id;
            $data_exist=CourseSubscription::where(['user_id'=>$user_id,'course_id'=>$id])->count();

            }
            else
            {
                $user_id = 0;
            }
            $course = Course::where('id',$id)->first();

             if(($user_id > 0) && ($data_exist ==0) && ($course->total_subscription < $course->students_limit) && (Auth::user()->role == '1'))
            {
                 ///

                $course_subscription = new CourseSubscription();
                $course_subscription->course_id = $id;
                $course_subscription->user_id = $user_id;
                $course_subscription->created_by  = $user_id;


        //          echo "<pre>";
        //  print_r($course);

                if($course_subscription->save()){
                     return redirect()->route('home')->with('message', 'Successfully subscribed!');
                }
                else{
                    return redirect()->back()->with('message', 'Something errors');

                }

            }
            else
            {
               ///
                return redirect()->back()->with('message', 'Something errors');
            }

    }


     public function coursesubscriptionpay_ajax(Request $request)
    {
       $id = $request->id;
         $data_exist = 0;
        if(Auth::user())
            {
            $user_id = Auth::user()->id;
            $data_exist=CourseSubscription::where(['user_id'=>$user_id,'course_id'=>$id])->count();

            }
            else
            {
                $user_id = 0;
            }
            $course = Course::where('id',$id)->first();

             if(($user_id > 0) && ($data_exist ==0) && ($course->total_subscription < $course->students_limit) && (Auth::user()->role == '1'))
            {
                 ///

                $course_subscription = new CourseSubscription();
                $course_subscription->course_id = $id;
                $course_subscription->user_id = $user_id;
                $course_subscription->created_by  = $user_id;


        //          echo "<pre>";
        //  print_r($course);

                if($course_subscription->save()){
                      return json_encode(array('status'=>'ok','message'=>'Successfully subscribed!'));
                }
                else{
                   return json_encode(array('status'=>'ok','message'=>'Something errors'));

                }

            }
            else
            {
               ///
                return json_encode(array('status'=>'ok','message'=>'Something errors'));
            }

    }




  public function callback(Request $request, Order $order)
    {
       // dd(env('CURRENCY'));

       $id=$request->id;
       $institution_id=$request->institution_id;
       $user_id = $request->user_id;

       $token = base64_encode("sk_test_hniWbWT7zPnoPFEcUxM1UxHgt8ZvAD5DtGTpnxKo".':');
       $payment = Http::baseUrl('https://api.moyasar.com/v1')
       ->withBasicAuth("sk_test_hniWbWT7zPnoPFEcUxM1UxHgt8ZvAD5DtGTpnxKo",'')
       ->get("payments/{$id}")
       ->json();

       $order_id =$order->id;
       $order_details = Order::where('id',$order_id)->first();
       if($order_details->type=='course')
       {
                if(isset($payment['type']) && $payment['type']=='invalid_request_error')
                {
                return redirect()->route('coursesubscription',['id'=>$order_details->course_id])->with('error',$payment['source']['message']);
                }

                //dd($payment);

                $user_id = Auth::user()->id;

                $paymentdb = new Payment();
                $paymentdb->payment_id = $payment['id'];
                $paymentdb->order_id = $order->id;
                $paymentdb->status = $payment['status'];
                $paymentdb->amount = $payment['amount'];
                $paymentdb->fee = $payment['fee'];
                $paymentdb->currency = $payment['currency'];
                $paymentdb->refunded_at = $payment['refunded_at'];
                $paymentdb->captured = $payment['captured'];
                $paymentdb->captured_at = $payment['captured_at'];
                $paymentdb->voided_at = $payment['voided_at'];
                $paymentdb->description = $payment['description'];
                $paymentdb->amount_format = $payment['amount_format'];

                $paymentdb->fee_format = $payment['fee_format'];
                $paymentdb->refunded_format = $payment['refunded_format'];
                $paymentdb->captured_format = $payment['captured_format'];
                $paymentdb->ip = $payment['ip'];
                $paymentdb->created_at = $payment['created_at'];
                $paymentdb->updated_at = $payment['updated_at'];
                $paymentdb->message = $payment['source']['message'];

                $paymentdb->type = $payment['source']['type'];
                $paymentdb->company = $payment['source']['company'];
                $paymentdb->name = $payment['source']['name'];
                $paymentdb->number = $payment['source']['number'];
                $paymentdb->gateway_id = $payment['source']['gateway_id'];
                $paymentdb->reference_number = $payment['source']['reference_number'];
                $paymentdb->token = $payment['source']['token'];
                $paymentdb->transaction_url = $payment['source']['transaction_url'];


                $paymentdb->user_id = $user_id;


                $paymentdb->save();

                if($payment['status']=='paid')
                {
                    $order->status='Paid';
                    $order->save();

                    $course_id = $order_details->course_id;
                    $data_exist = 0;
                    $data_exist=CourseSubscription::where(['user_id'=>$user_id,'course_id'=>$course_id])->count();
                    $course = Course::where('id',$course_id)->first();

                    $total_subscription = $course->total_subscription;
                    $total_subscription++;
                    $course->total_subscription=$total_subscription;
                    $course->save();

                    if(($user_id > 0) && ($data_exist ==0) && (Auth::user()->role == '1'))
                        {
                            ///

                            $course_subscription = new CourseSubscription();
                            $course_subscription->course_id = $course_id;
                            $course_subscription->user_id = $user_id;
                            $course_subscription->created_by  = $user_id;


                    //          echo "<pre>";
                    //  print_r($course);

                            if($course_subscription->save()){
                                return redirect()->route('coursesubscription',['id'=>$course_id])->with('success','Successfully subscribed!');
                            }
                            else{
                                return redirect()->route('coursesubscription',['id'=>$course_id])->with('error','Something errors');
                            }
                        }

                }
                else
                {
                    return redirect()->route('coursesubscription',['id'=>$order_details->course_id])->with('error',$payment['source']['message']);
                }

       }
       else  if($order_details->type=='subcription')
       {
            if(isset($payment['type']) && $payment['type']=='invalid_request_error')
            {
            return redirect()->route('institutionsubscription',['id'=>$order_details->institution_subcription_package_id])->with('error',$payment['source']['message']);
            }

            //dd($payment);
            //dd(Auth::user());

            //$user_id = $institution_id;
            //dd($user_id);

            $paymentdb = new Payment();
            $paymentdb->payment_id = $payment['id'];
            $paymentdb->order_id = $order->id;
            $paymentdb->status = $payment['status'];
            $paymentdb->amount = $payment['amount'];
            $paymentdb->fee = $payment['fee'];
            $paymentdb->currency = $payment['currency'];
            $paymentdb->refunded_at = $payment['refunded_at'];
            $paymentdb->captured = $payment['captured'];
            $paymentdb->captured_at = $payment['captured_at'];
            $paymentdb->voided_at = $payment['voided_at'];
            $paymentdb->description = $payment['description'];
            $paymentdb->amount_format = $payment['amount_format'];

            $paymentdb->fee_format = $payment['fee_format'];
            $paymentdb->refunded_format = $payment['refunded_format'];
            $paymentdb->captured_format = $payment['captured_format'];
            $paymentdb->ip = $payment['ip'];
            $paymentdb->created_at = $payment['created_at'];
            $paymentdb->updated_at = $payment['updated_at'];
            $paymentdb->message = $payment['source']['message'];

            $paymentdb->type = $payment['source']['type'];
            $paymentdb->company = $payment['source']['company'];
            $paymentdb->name = $payment['source']['name'];
            $paymentdb->number = $payment['source']['number'];
            $paymentdb->gateway_id = $payment['source']['gateway_id'];
            $paymentdb->reference_number = $payment['source']['reference_number'];
            $paymentdb->token = $payment['source']['token'];
            $paymentdb->transaction_url = $payment['source']['transaction_url'];

            $paymentdb->payment_type = 'subcription';


            $paymentdb->user_id = $user_id;
            $paymentdb->institution_id = $institution_id;


            $paymentdb->save();

            if($payment['status']=='paid')
            {
                $order->status='Paid';
                $order->save();

                $institution_subcription_package_id = $order->institution_subcription_package_id;

                $institution_subcription_package = InstitutionSubcriptionPackage::where('id',$institution_subcription_package_id)->first();



                if(($institution_id > 0))
                    {

                        ///
                       // echo "institution add";

                                $institution_subscription = new InstitutionSubcription();
                                $institution_subscription->institution_subcription_package_id = $institution_subcription_package_id;
                                $institution_subscription->user_id = $institution_id;
                                $institution_subscription->created_by  = $institution_id;
                                $institution_subscription->days = $order_details->days;
                                $institution_subscription->start_date = $order_details->start_date;
                                $institution_subscription->end_date = $order_details->end_date;


                        //          echo "<pre>";
                        //  print_r($course);

                        if($institution_subscription->save())
                        {



                            $institution = Institution::where('id',$institution_id)->first();

                            if ($institution)
                            {
                               $institution->payment_status = 'paid';
                               $institution->save();
                           }
                           $user_details = UserDetail::where('institution_id',$institution_id)->first();
                           //dd($user_details);
                           $user_details->subscription_end_date=$order_details->end_date;
                           $user_details->save();

                            return redirect()->route('instlogin')->with('success', 'Registration successful!');
                       }
                       else
                       {
                           return redirect()->back()->with('message', 'Something errors');

                       }
                    }

            }
            else
            {
                return redirect()->route('institutionsubscription',['id'=>$order_details->institution_subcription_package_id])->with('error',$payment['source']['message']);
            }

       }






    }

    public function coursesubscription($id)
{
$data_exist = 0;

//course subcription limit//
$course_id=Course::where('id',$id)->first();
//dd($course_id);
$students_limit=$course_id->students_limit;
$course_subcription_count=CourseSubscription::where('course_id',$id)->count();
//dd($course_subcription_count);
if($course_subcription_count >=  $students_limit)
{

return redirect()->route('home')->with('message', 'You Reach Maximum Student for this limit!');
}
if (Session::has('user_role'))
{
 $user_id = Session::get('user_id');
//$user_id = Session::get('user_role')->id;
$data_exist=CourseSubscription::where(['user_id'=>$user_id,'course_id'=>$id])->count();
}
else
{
$user_id = 0;
}
$course = Course::where('id',$id)->first();
$category_name = Category::where('id',$course->category_id)->first()->name;
/*
echo "<br>user_id=".$user_id;
echo "<br>data_exist=".$data_exist;
echo "<br>total_subscription=".$course->total_subscription;
echo "<br>students_limitt=".$course->students_limitt;
echo "<br>role=".Auth::user()->role;
*/
dd($institution_id = Session::put('institution_id', $request->institution_id));
if(($user_id > 0)  && ($course->total_subscription < $course->students_limit) && Session::get('user_role') == '1')
{
$data_exist_order=Order::where(['user_id'=>$user_id,'course_id'=>$id,'type'=>'course'])->count();
if($data_exist_order > 0)
{
$order_details = Order::where(['user_id'=>$user_id,'course_id'=>$id,'type'=>'course'])->first();
}
else
{
$order_details = new Order();
$order_details->user_id = $user_id;
$order_details->course_id = $id;
$order_details->status = 'Pending';
$order_details->total = $course->price;
$order_details->created_by = $user_id;
$order_details->save();
//dd($order_details);
}
return view('theme.course.coursesubscription',['user_id'=>$user_id,'course'=>$course,'category_name'=>$category_name,'id'=>$id,'data_exist'=>$data_exist,'order_details'=>$order_details]);
}
else
{
return view('theme.course.coursesubscriptionnotaccessible',['user_id'=>$user_id,'course'=>$course,'category_name'=>$category_name,'id'=>$id,'data_exist'=>$data_exist]);
}
}
    public function teacherview($id)
    {
        $teacher = User::where('id',$id)->first();
        //$user = Auth::user();
        //dd($user);
        $background_image_temp = $teacher->background_image;

        $background_image = asset('assets/img/1600x460.png');
        if($background_image_temp!='' && file_exists($background_image_temp))
        {
            $background_image = asset($background_image_temp);
        }
        $avatar_temp = $teacher->avatar;
        $avatar = asset('assets/img/icons/activities/drinking.svg');
        if($avatar_temp!='' && file_exists($avatar_temp))
        {
            $avatar = asset($avatar_temp);
        }

        $asset_path = asset('');


        $user_details = UserDetail::leftJoin('countries','user_details.country_id','=','countries.id')->leftJoin('cities','user_details.city_id','=','cities.id')->where('user_id',$id)->select('user_details.*','countries.c_name as country_name','cities.city_name')->first();

        $data = array('users'=>$teacher,
        'user_details'=>$user_details,'background_image'=>$background_image,'avatar'=>$avatar,'asset_path'=>$asset_path);
        return json_encode(array('status'=>'ok','data'=>$data));


    }
    public function institutionview($id)
    {
        $institution = User::where('id',$id)->first();


                    $institution_details = Institution::leftJoin('institution_admins','institutions.id','=','institution_admins.institution_id')->where('institution_admins.user_id',$id)->select('institutions.logo','institutions.description')->first();
                     $logo_temp = $institution_details->logo;


                $logo = asset('assets/img/icons/activities/drinking.svg');
                if($logo_temp!='' && file_exists($logo_temp))
                {
                    $logo = asset($logo_temp);

                }
                     $asset_path = asset('');
                    $user_details = UserDetail::leftJoin('countries','user_details.country_id','=','countries.id')
                    ->leftJoin('cities','user_details.city_id','=','cities.id')
                    ->where('user_id',$id)->select('user_details.*','countries.c_name as country_name','cities.city_name')->first();

                    $data = array('institution'=>$institution,
                    'logo'=>$logo,'institution_details'=>$institution_details,'user_details'=>$user_details,'asset_path'=>$asset_path);
                    return json_encode(array('status'=>'ok','data'=>$data));



    }


    public function teacherstudentstudentapprove(Request $request,$id,$type)
      {
        //$user_id=Auth::id();
        $user_id = $request->teacher_id;
        $result = null;
        if($type=='private_receiving')
        {
            $exist_no = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Student','receiver_type'=>'Teacher','receiver_id'=>$user_id,'type'=>'Teacher_Student'])->get()->count();
            if($exist_no > 0)
            {
                 $result = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Student','receiver_type'=>'Teacher','receiver_id'=>$user_id,'type'=>'Teacher_Student'])->delete();


                 $exist_in_teacher_students_no = TeacherStudent::where(['teacher_id'=>$user_id,'user_id'=>$id])->get()->count();
                 if($exist_in_teacher_students_no > 0)
                 {
                     Session::flash('error', 'Already exist!');

                        return response()->json([
                          'message' => 'Already exist!'
                        ]);
                 }
                 else
                 {
                    //insert into TeacherStudent
                    $teacher_student = new TeacherStudent();
                    $teacher_student->teacher_id = $user_id;
                    $teacher_student->user_id = $id;
                    $teacher_student->created_by = $id;
                    if($teacher_student->save())
                    {

                        // email to send receiver_id , that sender_id approved request

                        $sender_details = User::where(['id'=>$user_id])->first();
                        $receiver_details = User::where(['id'=>$id])->first();

                        if($sender_details->role=='1')
                        {
                            $sender_type = 'A Student';
                        }
                        else if($sender_details->role=='2')
                        {
                            $sender_type = 'A Teacher';
                        }
                        else if($sender_details->role=='3')
                        {
                            $sender_type = 'An Institution';
                        }

                        $details = [
                              'receiver_name'=>$receiver_details->name,
                              'sender_name'=>$sender_details->name,
                              'sender_type' => $sender_type,
                              'body' => $sender_type.' ('.$sender_details->name.') approved your request <br><br><br>',
                          ];

                        Mail::to($receiver_details->email)->send(new NotifyMail($details));


                        Session::flash('error', 'Approved request successfully!');

                        return response()->json([
                          'message' => 'Approved request successfully!'
                        ]);
                    }
                    else
                    {
                       Session::flash('error', 'Something wrong!');

                        return response()->json([
                          'message' => 'Something wrong!'
                        ]);
                    }
                 }

            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }

    }

     public function institutionstudentstudentapprove($id,$type)
      {
        $user_id=Auth::id();
        $institution_id = InstitutionAdmin::where('user_id',$user_id)->first()->institution_id;
        $result = null;
        if($type=='private_receiving')
        {
            $exist_no = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Student','receiver_type'=>'Institution','receiver_id'=>$user_id,'type'=>'Institution_Student'])->get()->count();
            if($exist_no > 0)
            {
                 $result = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Student','receiver_type'=>'Institution','receiver_id'=>$user_id,'type'=>'Institution_Student'])->delete();


                 $exist_in_teacher_students_no = InstitutionStudent::where(['institution_id'=>$institution_id,'user_id'=>$id])->get()->count();
                 if($exist_in_teacher_students_no > 0)
                 {
                     Session::flash('error', 'Already exist!');

                        return response()->json([
                          'message' => 'Already exist!'
                        ]);
                 }
                 else
                 {
                    //insert into TeacherStudent
                    $teacher_student = new InstitutionStudent();
                    $teacher_student->institution_id = $institution_id;
                    $teacher_student->user_id = $id;
                    $teacher_student->created_by = $id;
                    if($teacher_student->save())
                    {

                        // email to send receiver_id , that sender_id approved request

                        $sender_details = User::where(['id'=>$user_id])->first();
                        $receiver_details = User::where(['id'=>$id])->first();

                        if($sender_details->role=='1')
                        {
                            $sender_type = 'A Student';
                        }
                        else if($sender_details->role=='2')
                        {
                            $sender_type = 'A Teacher';
                        }
                        else if($sender_details->role=='3')
                        {
                            $sender_type = 'An Institution';
                        }

                        $details = [
                              'receiver_name'=>$receiver_details->name,
                              'sender_name'=>$sender_details->name,
                              'sender_type' => $sender_type,
                              'body' => $sender_type.' ('.$sender_details->name.') approved your request <br><br><br>',
                          ];

                        Mail::to($receiver_details->email)->send(new NotifyMail($details));


                        Session::flash('error', 'Approved request successfully!');

                        return response()->json([
                          'message' => 'Approved request successfully!'
                        ]);
                    }
                    else
                    {
                       Session::flash('error', 'Something wrong!');

                        return response()->json([
                          'message' => 'Something wrong!'
                        ]);
                    }
                 }

            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }

    }
    public function institutionteacherteacherapprove($id,$type)
      {
        $user_id=Auth::id();
         $institution_id = InstitutionAdmin::where('user_id',$user_id)->first()->institution_id;
        $result = null;
        if($type=='private_receiving')
        {
            $exist_no = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Teacher','receiver_type'=>'Institution','receiver_id'=>$user_id,'type'=>'Institution_Teacher'])->get()->count();
            if($exist_no > 0)
            {
                 $result = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Teacher','receiver_type'=>'Institution','receiver_id'=>$user_id,'type'=>'Institution_Teacher'])->delete();


                 $exist_in_teacher_students_no = InstitutionTeacher::where(['institution_id'=>$institution_id,'user_id'=>$id])->get()->count();
                 if($exist_in_teacher_students_no > 0)
                 {
                     Session::flash('error', 'Already exist!');

                        return response()->json([
                          'message' => 'Already exist!'
                        ]);
                 }
                 else
                 {
                    //insert into TeacherStudent
                    $teacher_student = new InstitutionTeacher();
                    $teacher_student->institution_id = $institution_id;
                    $teacher_student->user_id = $id;
                    $teacher_student->created_by = $id;
                    if($teacher_student->save())
                    {

                        // email to send receiver_id , that sender_id approved request

                        $sender_details = User::where(['id'=>$user_id])->first();
                        $receiver_details = User::where(['id'=>$id])->first();

                        if($sender_details->role=='1')
                        {
                            $sender_type = 'A Student';
                        }
                        else if($sender_details->role=='2')
                        {
                            $sender_type = 'A Teacher';
                        }
                        else if($sender_details->role=='3')
                        {
                            $sender_type = 'An Institution';
                        }

                        $details = [
                              'receiver_name'=>$receiver_details->name,
                              'sender_name'=>$sender_details->name,
                              'sender_type' => $sender_type,
                              'body' => $sender_type.' ('.$sender_details->name.') approved your request <br><br><br>',
                          ];

                        Mail::to($receiver_details->email)->send(new NotifyMail($details));


                        Session::flash('error', 'Approved request successfully!');

                        return response()->json([
                          'message' => 'Approved request successfully!'
                        ]);
                    }
                    else
                    {
                       Session::flash('error', 'Something wrong!');

                        return response()->json([
                          'message' => 'Something wrong!'
                        ]);
                    }
                 }

            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }

    }
    public function teacherinstitutioninstitutionapprove($id,$type)
    {
      $user_id=Auth::id();
       $institution_id = InstitutionAdmin::where('user_id',$id)->first()->institution_id;
      $result = null;
      if($type=='private_receiving')
      {
          $exist_no = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Institution','receiver_type'=>'Teacher','receiver_id'=>$user_id,'type'=>'Institution_Teacher'])->get()->count();
          if($exist_no > 0)
          {
                $result = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Institution','receiver_type'=>'Teacher','receiver_id'=>$user_id,'type'=>'Institution_Teacher'])->update(['status' => 'Approved']);


               $exist_in_teacher_students_no = InstitutionTeacher::where(['institution_id'=>$institution_id,'user_id'=>$user_id])->get()->count();
               if($exist_in_teacher_students_no > 0)
               {
                   Session::flash('error', 'Already exist!');

                      return response()->json([
                        'message' => 'Already exist!'
                      ]);
               }
               else
               {
                  //insert into TeacherStudent
                  $teacher_student = new InstitutionTeacher();
                  $teacher_student->institution_id = $institution_id;
                  $teacher_student->user_id = $user_id;
                  $teacher_student->created_by = $id;
                  if($teacher_student->save())
                  {

                      // email to send receiver_id , that sender_id approved request

                      $sender_details = User::where(['id'=>$user_id])->first();
                      $receiver_details = User::where(['id'=>$id])->first();

                      if($sender_details->role=='1')
                      {
                          $sender_type = 'A Student';
                      }
                      else if($sender_details->role=='2')
                      {
                          $sender_type = 'A Teacher';
                      }
                      else if($sender_details->role=='3')
                      {
                          $sender_type = 'An Institution';
                      }

                      $details = [
                            'receiver_name'=>$receiver_details->name,
                            'sender_name'=>$sender_details->name,
                            'sender_type' => $sender_type,
                            'body' => $sender_type.' ('.$sender_details->name.') approved your request <br><br><br>',
                        ];

                      Mail::to($receiver_details->email)->send(new NotifyMail($details));
                      //delete from request_details
                      // $result = RequestDetails::where(['receiver_id'=>$user_id])->delete();
                      //dd($result);
                      // $result = RequestDetails::find($user_id);
                      // $result->status = 'Approved';
                      // $result->save();



                      Session::flash('error', 'Approved request successfully!');

                      return response()->json([
                        'message' => 'Approved request successfully!'
                      ]);
                  }
                  else
                  {
                     Session::flash('error', 'Something wrong!');

                      return response()->json([
                        'message' => 'Something wrong!'
                      ]);
                  }
               }

          }
          else
          {
              Session::flash('error', 'Something wrong!');

              return response()->json([
                'message' => 'Something wrong!'
              ]);
          }
      }

  }

    public function studentteacherstudentapprove(Request $request,$id,$type)
      {
        $user_id = $request->student_id;
       $result = null;
        if($type=='private_receiving')
        {
            $exist_no = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Teacher','receiver_type'=>'Student','receiver_id'=>$user_id,'type'=>'Teacher_Student'])->get()->count();
            if($exist_no > 0)
            {
                 $result = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Teacher','receiver_type'=>'Student','receiver_id'=>$user_id,'type'=>'Teacher_Student'])->delete();


                // $exist_in_teacher_students_no = TeacherStudent::where(['user_id'=>$user_id,'user_id'=>$id])->get()->count();
                 $exist_in_teacher_students_no = TeacherStudent::where(['teacher_id'=>$id,'user_id'=>$user_id])->get()->count();
                 if($exist_in_teacher_students_no > 0)
                 {
                     Session::flash('error', 'Already exist!');

                        return response()->json([
                          'message' => 'Already exist!'
                        ]);
                 }
                 else
                 {
                    //insert into TeacherStudent
                    $teacher_student = new TeacherStudent();
                    $teacher_student->teacher_id = $id;
                    $teacher_student->user_id = $user_id;
                    $teacher_student->created_by = $id;
                    if($teacher_student->save())
                    {

                        // email to send receiver_id , that sender_id approved request

                        $sender_details = User::where(['id'=>$user_id])->first();
                        $receiver_details = User::where(['id'=>$id])->first();

                        if($sender_details->role=='1')
                        {
                            $sender_type = 'A Student';
                        }
                        else if($sender_details->role=='2')
                        {
                            $sender_type = 'A Teacher';
                        }
                        else if($sender_details->role=='3')
                        {
                            $sender_type = 'An Institution';
                        }

                        $details = [
                              'receiver_name'=>$receiver_details->name,
                              'sender_name'=>$sender_details->name,
                              'sender_type' => $sender_type,
                              'body' => $sender_type.' ('.$sender_details->name.') approved your request <br><br><br>',
                          ];

                        Mail::to($receiver_details->email)->send(new NotifyMail($details));


                        Session::flash('error', 'Approved request successfully!');

                        return response()->json([
                          'message' => 'Approved request successfully!'
                        ]);
                    }
                    else
                    {
                       Session::flash('error', 'Something wrong!');

                        return response()->json([
                          'message' => 'Something wrong!'
                        ]);
                    }
                 }

            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }

    }
    public function studentinstitutionstudentapprove($id,$type)
      {
        $user_id=Auth::id();
        $result = null;
        $institution_id = InstitutionAdmin::where('user_id',$id)->first()->institution_id;

        if($type=='private_receiving')
        {
            $exist_no = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Institution','receiver_type'=>'Student','receiver_id'=>$user_id,'type'=>'Institution_Student'])->get()->count();
            if($exist_no > 0)
            {
                 $result = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Institution','receiver_type'=>'Student','receiver_id'=>$user_id,'type'=>'Institution_Student'])->delete();


                // $exist_in_institution_students_no = institutionStudent::where(['user_id'=>$user_id,'user_id'=>$id])->get()->count();
                 $exist_in_institution_students_no = InstitutionStudent::where(['institution_id'=>$institution_id,'user_id'=>$user_id])->get()->count();
                 if($exist_in_institution_students_no > 0)
                 {
                     Session::flash('error', 'Already exist!');

                        return response()->json([
                          'message' => 'Already exist!'
                        ]);
                 }
                 else
                 {
                    //insert into institutionStudent
                    $institution_student = new InstitutionStudent();
                    $institution_student->institution_id = $institution_id;
                    $institution_student->user_id = $user_id;
                    $institution_student->created_by = $id;
                    if($institution_student->save())
                    {

                        // email to send receiver_id , that sender_id approved request

                        $sender_details = User::where(['id'=>$user_id])->first();
                        $receiver_details = User::where(['id'=>$id])->first();

                        if($sender_details->role=='1')
                        {
                            $sender_type = 'A Student';
                        }
                        else if($sender_details->role=='2')
                        {
                            $sender_type = 'A institution';
                        }
                        else if($sender_details->role=='3')
                        {          //dd($categorys);
                            // $categorywise_courselists=Course::leftJoin('categories', 'categories.id', '=', 'courses.category_id')->where('category_id',$categorys)->orderBy('courses.id','desc')
                            // ->select('courses.*','categories.name as category_name')
                            // ->get();
                          // dd($categorywise_courselists);
                        }

                        $details = [
                              'receiver_name'=>$receiver_details->name,
                              'sender_name'=>$sender_details->name,
                              'sender_type' => $sender_type,
                              'body' => $sender_type.' ('.$sender_details->name.') approved your request <br><br><br>',
                          ];

                        Mail::to($receiver_details->email)->send(new NotifyMail($details));


                        Session::flash('error', 'Approved request successfully!');

                        return response()->json([
                          'message' => 'Approved request successfully!'
                        ]);
                    }
                    else
                    {
                       Session::flash('error', 'Something wrong!');

                        return response()->json([
                          'message' => 'Something wrong!'
                        ]);
                    }
                 }

            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }

    }
    public function studentteacherstudentdelete(Request $request,$id,$type)
      {
        //$user_id=Auth::id();
        $user_id = $request->student_id;
        $result = null;
        if($type=='private_pending')
        {
             $result = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Student','receiver_type'=>'Teacher','receiver_id'=>$id,'type'=>'Teacher_Student'])->delete();



            if($result)
            {
                Session::flash('error', 'Request remove successfully!');

                return response()->json([
                  'message' => 'Request remove successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }
        else  if($type=='private_receiving')
        {
             $result = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Teacher','receiver_type'=>'Student','receiver_id'=>$user_id,'type'=>'Teacher_Student'])->delete();



            if($result)
            {
                // email to send receiver_id , that sender_id rejected request

                $sender_details = User::where(['id'=>$user_id])->first();
                $receiver_details = User::where(['id'=>$id])->first();

                if($sender_details->role=='1')
                {
                    $sender_type = 'A Student';
                }
                else if($sender_details->role=='2')
                {
                    $sender_type = 'A Teacher';
                }
                else if($sender_details->role=='3')
                {
                    $sender_type = 'An Institution';
                }

                $details = [
                      'receiver_name'=>$receiver_details->name,
                      'sender_name'=>$sender_details->name,
                      'sender_type' => $sender_type,
                      'body' => $sender_type.' ('.$sender_details->name.') rejected your request <br><br><br>',
                  ];

                Mail::to($receiver_details->email)->send(new NotifyMail($details));

                Session::flash('error', 'Request reject successfully!');

                return response()->json([
                  'message' => 'Request reject successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }
        else  if($type=='public')
        {
             //$result = TeacherStudent::where(['user_id'=>$id,'user_id'=>$user_id])->delete();
            //  $result = TeacherStudent::where(['teacher_id'=>$id,'user_id'=>$user_id])->delete();
             $result = TeacherStudent::where(['user_id'=>$user_id,'teacher_id'=>$id])->delete();



            if($result)
            {
                Session::flash('error', 'Request remove successfully!');

                return response()->json([
                  'message' => 'Request remove successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }





    }

     public function studentinstitutionstudentdelete($id,$type)
      {
        $user_id=Auth::id();
        $result = null;
        if($type=='private_pending')
        {
             $result = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Student','receiver_type'=>'Institution','receiver_id'=>$id,'type'=>'Institution_Student'])->delete();



            if($result)
            {
                Session::flash('error', 'Request remove successfully!');

                return response()->json([
                  'message' => 'Request remove successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }
        else  if($type=='private_receiving')
        {
             $result = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Institution','receiver_type'=>'Student','receiver_id'=>$user_id,'type'=>'Institution_Student'])->delete();



            if($result)
            {
                // email to send receiver_id , that sender_id rejected request

                $sender_details = User::where(['id'=>$user_id])->first();
                $receiver_details = User::where(['id'=>$id])->first();

                if($sender_details->role=='1')
                {
                    $sender_type = 'A Student';
                }
                else if($sender_details->role=='2')
                {
                    $sender_type = 'A institution';
                }
                else if($sender_details->role=='3')
                {
                    $sender_type = 'An Institution';
                }

                $details = [
                      'receiver_name'=>$receiver_details->name,
                      'sender_name'=>$sender_details->name,
                      'sender_type' => $sender_type,
                      'body' => $sender_type.' ('.$sender_details->name.') rejected your request <br><br><br>',
                  ];

                Mail::to($receiver_details->email)->send(new NotifyMail($details));

                Session::flash('error', 'Request reject successfully!');

                return response()->json([
                  'message' => 'Request reject successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }
        else  if($type=='public')
        {
             //$result = institutionStudent::where(['user_id'=>$id,'user_id'=>$user_id])->delete();
            //  $result = institutionStudent::where(['institution_id'=>$id,'user_id'=>$user_id])->delete();
             $result = InstitutionStudent::where(['user_id'=>$user_id,'institution_id'=>$id])->delete();



            if($result)
            {
                Session::flash('error', 'Request remove successfully!');

                return response()->json([
                  'message' => 'Request remove successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }





    }

    public function studentteacherstudentsend(Request $request,$id,$type)
      {
        //$user_id=Auth::id();
        $user_id = $request->student_id;
        $result = null;

        $exist_no = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Student','receiver_type'=>'Teacher','receiver_id'=>$id,'type'=>'Teacher_Student'])->get()->count();
        if($exist_no > 0)
        {
            Session::flash('error', 'Already sent');

            return response()->json([
              'message' => 'Already sent!'
            ]);
        }

        if($type=='private_sending')
        {
             $result = new RequestDetails();
             $result->sender_id=$user_id;
             $result->sender_type='Student';
             $result->receiver_type='Teacher';
             $result->receiver_id=$id;
             $result->type='Teacher_Student';




            if($result->save())
            {
                // email to send receiver_id , that sender_id sent a request

                $sender_details = User::where(['id'=>$user_id])->first();
                $receiver_details = User::where(['id'=>$id])->first();

                if($sender_details->role=='1')
                {
                    $sender_type = 'A Student';
                }
                else if($sender_details->role=='2')
                {
                    $sender_type = 'A Teacher';
                }
                else if($sender_details->role=='3')
                {
                    $sender_type = 'An Institution';
                }

                $details = [
                      'receiver_name'=>$receiver_details->name,
                      'sender_name'=>$sender_details->name,
                      'sender_type' => $sender_type,
                      'body' => $sender_type.' ('.$sender_details->name.') send request you to Add<br><br><br>',
                  ];

                Mail::to($receiver_details->email)->send(new NotifyMail($details));



                Session::flash('error', 'Send request successfully!');

                return response()->json([
                  'message' => 'Send request successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }



    }
    public function studentinstitutionstudentsend($id,$type)
      {
        $user_id=Auth::id();
        $result = null;

        $exist_no = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Student','receiver_type'=>'Institution','receiver_id'=>$id,'type'=>'Institution_Student'])->get()->count();
        if($exist_no > 0)
        {
            Session::flash('error', 'Already sent');

            return response()->json([
              'message' => 'Already sent!'
            ]);
        }

        if($type=='private_sending')
        {
             $result = new RequestDetails();
             $result->sender_id=$user_id;
             $result->sender_type='Student';
             $result->receiver_type='Institution';
             $result->receiver_id=$id;
             $result->type='Institution_Student';




            if($result->save())
            {
                // email to send receiver_id , that sender_id sent a request

                $sender_details = User::where(['id'=>$user_id])->first();
                $receiver_details = User::where(['id'=>$id])->first();

                if($sender_details->role=='1')
                {
                    $sender_type = 'A Student';
                }
                else if($sender_details->role=='2')
                {
                    $sender_type = 'A institution';
                }
                else if($sender_details->role=='3')
                {
                    $sender_type = 'An Institution';
                }

                $details = [
                      'receiver_name'=>$receiver_details->name,
                      'sender_name'=>$sender_details->name,
                      'sender_type' => $sender_type,
                      'body' => $sender_type.' ('.$sender_details->name.') send request you to Add<br><br><br>',
                  ];

                Mail::to($receiver_details->email)->send(new NotifyMail($details));



                Session::flash('error', 'Send request successfully!');

                return response()->json([
                  'message' => 'Send request successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }



    }
    public function teacherstudentstudentdelete(Request $request,$id,$type)
      {
        //$user_id=Auth::id();
        $user_id = $request->teacher_id;
        $result = null;
        if($type=='private_pending')
        {
             $result = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Teacher','receiver_type'=>'Student','receiver_id'=>$id,'type'=>'Teacher_Student'])->delete();



            if($result)
            {
                Session::flash('error', 'Request remove successfully!');

                return response()->json([
                  'message' => 'Request remove successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }
        else  if($type=='private_receiving')
        {
             $result = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Student','receiver_type'=>'Teacher','receiver_id'=>$user_id,'type'=>'Teacher_Student'])->delete();



            if($result)
            {
                // email to send receiver_id , that sender_id rejected request

                $sender_details = User::where(['id'=>$user_id])->first();
                $receiver_details = User::where(['id'=>$id])->first();

                if($sender_details->role=='1')
                {
                    $sender_type = 'A Student';
                }
                else if($sender_details->role=='2')
                {
                    $sender_type = 'A Teacher';
                }
                else if($sender_details->role=='3')
                {
                    $sender_type = 'An Institution';
                }

                $details = [
                      'receiver_name'=>$receiver_details->name,
                      'sender_name'=>$sender_details->name,
                      'sender_type' => $sender_type,
                      'body' => $sender_type.' ('.$sender_details->name.') rejected your request <br><br><br>',
                  ];

                Mail::to($receiver_details->email)->send(new NotifyMail($details));

                Session::flash('error', 'Request reject successfully!');

                return response()->json([
                  'message' => 'Request reject successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }
        else  if($type=='public')
        {
             $result = TeacherStudent::where(['user_id'=>$id,'teacher_id'=>$user_id])->delete();



            if($result)
            {
                Session::flash('error', 'Request remove successfully!');

                return response()->json([
                  'message' => 'Request remove successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }





    }

    public function institutionstudentstudentdelete($id,$type)
      {
        $user_id=Auth::id();
        $institution_id = InstitutionAdmin::where('user_id',$user_id)->first()->institution_id;
        $result = null;
        if($type=='private_pending')
        {
             $result = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Institution','receiver_type'=>'Student','receiver_id'=>$id,'type'=>'Institution_Student'])->delete();



            if($result)
            {
                Session::flash('error', 'Request remove successfully!');

                return response()->json([
                  'message' => 'Request remove successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }
        else  if($type=='private_receiving')
        {
             $result = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Student','receiver_type'=>'Institution','receiver_id'=>$user_id,'type'=>'Institution_Student'])->delete();



            if($result)
            {
                // email to send receiver_id , that sender_id rejected request

                $sender_details = User::where(['id'=>$user_id])->first();
                $receiver_details = User::where(['id'=>$id])->first();

                if($sender_details->role=='1')
                {
                    $sender_type = 'A Student';
                }
                else if($sender_details->role=='2')
                {
                    $sender_type = 'A Teacher';
                }
                else if($sender_details->role=='3')
                {
                    $sender_type = 'An Institution';
                }

                $details = [
                      'receiver_name'=>$receiver_details->name,
                      'sender_name'=>$sender_details->name,
                      'sender_type' => $sender_type,
                      'body' => $sender_type.' ('.$sender_details->name.') rejected your request <br><br><br>',
                  ];

                Mail::to($receiver_details->email)->send(new NotifyMail($details));

                Session::flash('error', 'Request reject successfully!');

                return response()->json([
                  'message' => 'Request reject successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }
        else  if($type=='public')
        {
             $result = InstitutionStudent::where(['user_id'=>$id,'institution_id'=>$institution_id])->delete();



            if($result)
            {
                Session::flash('error', 'Request remove successfully!');

                return response()->json([
                  'message' => 'Request remove successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }





    }

    public function institutionteacherteacherdelete($id,$type)
      {
        $user_id=Auth::id();
        $institution_id = InstitutionAdmin::where('user_id',$user_id)->first()->institution_id;
        $result = null;
        if($type=='private_pending')
        {
             $result = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Institution','receiver_type'=>'Teacher','receiver_id'=>$id,'type'=>'Institution_Teacher'])->delete();



            if($result)
            {
                Session::flash('error', 'Request remove successfully!');

                return response()->json([
                  'message' => 'Request remove successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }
        else  if($type=='private_receiving')
        {
             $result = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Teacher','receiver_type'=>'Institution','receiver_id'=>$user_id,'type'=>'Institution_Teacher'])->delete();



            if($result)
            {
                // email to send receiver_id , that sender_id rejected request

                $sender_details = User::where(['id'=>$user_id])->first();
                $receiver_details = User::where(['id'=>$id])->first();

                if($sender_details->role=='1')
                {
                    $sender_type = 'A Student';
                }
                else if($sender_details->role=='2')
                {
                    $sender_type = 'A Teacher';
                }
                else if($sender_details->role=='3')
                {
                    $sender_type = 'An Institution';
                }

                $details = [
                      'receiver_name'=>$receiver_details->name,
                      'sender_name'=>$sender_details->name,
                      'sender_type' => $sender_type,
                      'body' => $sender_type.' ('.$sender_details->name.') rejected your request <br><br><br>',
                  ];

                Mail::to($receiver_details->email)->send(new NotifyMail($details));

                Session::flash('error', 'Request reject successfully!');

                return response()->json([
                  'message' => 'Request reject successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }
        else  if($type=='public')
        {
             $result = InstitutionTeacher::where(['user_id'=>$id,'institution_id'=>$institution_id])->delete();



            if($result)
            {
                Session::flash('error', 'Request remove successfully!');

                return response()->json([
                  'message' => 'Request remove successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }





    }
    public function teacherinstitutioninstitutiondelete($id,$type)
    {
      $user_id=Auth::id();
      $result = null;
      if($type=='private_pending')
      {
           $result = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Teacher','receiver_type'=>'Institution','receiver_id'=>$id,'type'=>'Institution_Teacher'])->delete();



          if($result)
          {
              Session::flash('error', 'Request remove successfully!');

              return response()->json([
                'message' => 'Request remove successfully!'
              ]);
          }
          else
          {
              Session::flash('error', 'Something wrong!');

              return response()->json([
                'message' => 'Something wrong!'
              ]);
          }
      }
      else  if($type=='private_receiving')
      {
           $result = RequestDetails::where(['sender_id'=>$id,'sender_type'=>'Institution','receiver_type'=>'Teacher','receiver_id'=>$user_id,'type'=>'Institution_Teacher'])->update(['status' => 'Rejected']);



          if($result)
          {
              // email to send receiver_id , that sender_id rejected request

              $sender_details = User::where(['id'=>$user_id])->first();
              $receiver_details = User::where(['id'=>$id])->first();

              if($sender_details->role=='1')
              {
                  $sender_type = 'A Student';
              }
              else if($sender_details->role=='2')
              {
                  $sender_type = 'A Teacher';
              }
              else if($sender_details->role=='3')
              {
                  $sender_type = 'An Institution';
              }

              $details = [
                    'receiver_name'=>$receiver_details->name,
                    'sender_name'=>$sender_details->name,
                    'sender_type' => $sender_type,
                    'body' => $sender_type.' ('.$sender_details->name.') rejected your request <br><br><br>',
                ];

              Mail::to($receiver_details->email)->send(new NotifyMail($details));

              Session::flash('error', 'Request reject successfully!');

              return response()->json([
                'message' => 'Request reject successfully!'
              ]);
          }
          else
          {
              Session::flash('error', 'Something wrong!');

              return response()->json([
                'message' => 'Something wrong!'
              ]);
          }
      }
      else  if($type=='public')
      {
           $result = InstitutionTeacher::where(['user_id'=>$user_id,'institution_id'=>$id])->delete();



          if($result)
          {
              Session::flash('error', 'Request remove successfully!');

              return response()->json([
                'message' => 'Request remove successfully!'
              ]);
          }
          else
          {
              Session::flash('error', 'Something wrong!');

              return response()->json([
                'message' => 'Something wrong!'
              ]);
          }
      }





  }
    public function teacherstudentstudentsend(Request $request, $id,$type)
      {

          $user_id = $request->teacher_id;
        $result = null;

        $exist_no = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Teacher','receiver_type'=>'Student','receiver_id'=>$id,'type'=>'Teacher_Student'])->get()->count();
        if($exist_no > 0)
        {
            Session::flash('error', 'Already sent');

            return response()->json([
              'message' => 'Already sent!'
            ]);
        }

        if($type=='private_sending')
        {
             $result = new RequestDetails();
             $result->sender_id=$user_id;
             $result->sender_type='Teacher';
             $result->receiver_type='Student';
             $result->receiver_id=$id;
             $result->type='Teacher_Student';




            if($result->save())
            {
                // email to send receiver_id , that sender_id sent a request

                $sender_details = User::where(['id'=>$user_id])->first();
                $receiver_details = User::where(['id'=>$id])->first();

                if($sender_details->role=='1')
                {
                    $sender_type = 'A Student';
                }
                else if($sender_details->role=='2')
                {
                    $sender_type = 'A Teacher';
                }
                else if($sender_details->role=='3')
                {
                    $sender_type = 'An Institution';
                }

                $details = [
                      'receiver_name'=>$receiver_details->name,
                      'sender_name'=>$sender_details->name,
                      'sender_type' => $sender_type,
                      'body' => $sender_type.' ('.$sender_details->name.') send request you to Add<br><br><br>',
                  ];

                Mail::to($receiver_details->email)->send(new NotifyMail($details));



                Session::flash('error', 'Send request successfully!');

                return response()->json([
                  'message' => 'Send request successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }



    }

    public function institutionstudentstudentsend($id,$type)
      {
        $user_id=Auth::id();
        $result = null;

        $exist_no = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Institution','receiver_type'=>'Student','receiver_id'=>$id,'type'=>'Institution_Student'])->get()->count();
        if($exist_no > 0)
        {
            Session::flash('error', 'Already sent');

            return response()->json([
              'message' => 'Already sent!'
            ]);
        }

        if($type=='private_sending')
        {
             $result = new RequestDetails();
             $result->sender_id=$user_id;
             $result->sender_type='Institution';
             $result->receiver_type='Student';
             $result->receiver_id=$id;
             $result->type='Institution_Student';




            if($result->save())
            {
                // email to send receiver_id , that sender_id sent a request

                $sender_details = User::where(['id'=>$user_id])->first();
                $receiver_details = User::where(['id'=>$id])->first();

                if($sender_details->role=='1')
                {
                    $sender_type = 'A Student';
                }
                else if($sender_details->role=='2')
                {
                    $sender_type = 'A Teacher';
                }
                else if($sender_details->role=='3')
                {
                    $sender_type = 'An Institution';
                }

                $details = [
                      'receiver_name'=>$receiver_details->name,
                      'sender_name'=>$sender_details->name,
                      'sender_type' => $sender_type,
                      'body' => $sender_type.' ('.$sender_details->name.') send request you to Add<br><br><br>',
                  ];

                Mail::to($receiver_details->email)->send(new NotifyMail($details));



                Session::flash('error', 'Send request successfully!');

                return response()->json([
                  'message' => 'Send request successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }



    }
    public function institutionteacherteachersend(Request $request,$id,$type)
      {
        // dd($user_id = $request->user_id);
        // exit();

            $user_id =  $request->user_id;
             return response()->json([
                'user_id' => $user_id
              ]);
              exit();

        $result = null;

        $exist_no = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Institution','receiver_type'=>'Teacher','receiver_id'=>$id,'type'=>'Institution_Teacher'])->get()->count();
        if($exist_no > 0)
        {
            Session::flash('error', 'Already sent');

            return response()->json([
              'message' => 'Already sent!'
            ]);
        }

        if($type=='private_sending')
        {
             $result = new RequestDetails();
             $result->sender_id=$user_id;
             $result->sender_type='Institution';
             $result->receiver_type='Teacher';
             $result->receiver_id=$id;
             $result->type='Institution_Teacher';




            if($result->save())
            {
                // email to send receiver_id , that sender_id sent a request

                $sender_details = Institution::where(['id'=>$user_id])->first();
                $receiver_details = User::where(['id'=>$id])->first();

                if($sender_details->role=='1')
                {
                    $sender_type = 'A Student';
                }
                else if($sender_details->role=='2')
                {
                    $sender_type = 'A Teacher';
                }
                else if($sender_details->role=='3')
                {
                    $sender_type = 'An Institution';
                }

                $details = [
                      'receiver_name'=>$receiver_details->name,
                      'sender_name'=>$sender_details->name,
                      'sender_type' => $sender_type,
                      'body' => $sender_type.' ('.$sender_details->name.') send request you to Add<br><br><br>',
                  ];

                Mail::to($receiver_details->email)->send(new NotifyMail($details));



                Session::flash('error', 'Send request successfully!');

                return response()->json([
                  'message' => 'Send request successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }



    }
     public function teacherinstitutioninstitutionsend($id,$type)
      {
        $user_id=Auth::id();
        $result = null;

        $exist_no = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Teacher','receiver_type'=>'Institution','receiver_id'=>$id,'type'=>'Institution_Teacher'])->get()->count();
        if($exist_no > 0)
        {
            Session::flash('error', 'Already sent');

            return response()->json([
              'message' => 'Already sent!'
            ]);
        }

        if($type=='private_sending')
        {
             $result = new RequestDetails();
             $result->sender_id=$user_id;
             $result->sender_type='Teacher';
             $result->receiver_type='Institution';
             $result->receiver_id=$id;
             $result->type='Institution_Teacher';




            if($result->save())
            {
                // email to send receiver_id , that sender_id sent a request

                $sender_details = User::where(['id'=>$user_id])->first();
                $receiver_details = User::where(['id'=>$id])->first();

                if($sender_details->role=='1')
                {
                    $sender_type = 'A Student';
                }
                else if($sender_details->role=='2')
                {
                    $sender_type = 'A Teacher';
                }
                else if($sender_details->role=='3')
                {
                    $sender_type = 'An Institution';
                }

                $details = [
                      'receiver_name'=>$receiver_details->name,
                      'sender_name'=>$sender_details->name,
                      'sender_type' => $sender_type,
                      'body' => $sender_type.' ('.$sender_details->name.') send request you to Add<br><br><br>',
                  ];

                Mail::to($receiver_details->email)->send(new NotifyMail($details));



                Session::flash('error', 'Send request successfully!');

                return response()->json([
                  'message' => 'Send request successfully!'
                ]);
            }
            else
            {
                Session::flash('error', 'Something wrong!');

                return response()->json([
                  'message' => 'Something wrong!'
                ]);
            }
        }



    }
    // 25.07.23//
public function contactusstore(Request $request)
{

        $contact_us = new Contactus();
        $contact_us->firstname = $request->firstname;
        $contact_us->lastname = $request->lastname;
        $contact_us->email = $request->email;
        $contact_us->phone =  $request->phone;
        $contact_us->address = $request->address;
        $contact_us->helpyou =  $request->helpyou;



        if($contact_us->save())
        {

            return redirect('/')->with('success', 'contact us successful!');

        }
        else
        {
            Session::flash('error', 'Something wrong!');

            return response()->json([
              'message' => 'Something wrong!'
            ]);

        }


}
public function allinstitutions()
{

     $allinstitutions = Institution::where(['inst_status'=>'active'])->orderBy('id','desc')->get();

     return view('theme.allinstitutions',['allinstitutions'=>$allinstitutions]);
}
// 25.07.23//


public function directtermsandcondition()
{
    $termsandconditions=TermsandCondition::orderBy('terms_and_condition.id','desc')->select('terms_and_condition.*')->get();

     return view('theme.termsandcondition',['termsandconditions'=>$termsandconditions]);
}
public function directprivacypolicy()
{
    $privacypolicys=Privacypolicy::orderBy('privacy_policy.id','desc')->select('privacy_policy.*')->get();

     return view('theme.privacypolicy',['privacypolicys'=>$privacypolicys]);
}
public function directaboutus()
{
    $aboutuss=Aboutus::orderBy('about_us.id','desc')->select('about_us.*')->get();

     return view('theme.aboutus',['aboutuss'=>$aboutuss]);
}

public function institutionwebsite(Request $request,$id)
{
    $ip = $request->ip();
    $user_visitors_check = UserVisitor::where(['ip_address' => $ip])->count();


    if ($user_visitors_check == 0)
    {
        $visitor = new UserVisitor(['ip_address' => $ip]);
        $visitor->save();
    }

      // new course added //

     $togonotadmin = false;
     if(Session::has('user_role'))
     {
     if(Session::get('user_role') == '4'){
     return redirect('/admin/dashboard');
     }
     else
     {
     $togonotadmin = true;
     }
     }
     else
     {
     $togonotadmin = true;
     }
     if($togonotadmin==true)
     {
     $data9= [];
     if (Session::has('user_role'))
     {
        $user_id = Session::get('user_id');


     $data9=CourseSubscription::where(['user_id'=>$user_id])->orderBy('id','desc')->get();
     }
     else
     {
     $user_id = 0;
     }
     $id = $request->id;
     $institution_sliders=InstitutionBannerSetting::where('institution_id',$id)->select('institution_banner_settings.*')->limit(3)->get();
         //dd($institution_sliders);
         $category_lists =Category::where('institution_id',$id)->orderBy('name','asc')->get();
       // dd($category_lists);
             $popular_courses =Course::where('institution_id',$id)->orderBy('courses.id','desc')
             ->select('courses.*')
             ->get();
     $current_date_time = date('Y-m-d');
     $categories=Category::where(['status'=>'active','institution_id'=>$id])->orderBy('id','desc')->limit(4)->get();
     $data7=Course::leftjoin('categories','categories.id','=','courses.category_id')->where(['courses.status'=>'active','courses.visibility'=>1,'courses.institution_id'=>$id])->whereDate('courses.start_date', '<=', Carbon::now())->orderBy('courses.id','desc')->select('courses.*','categories.name as category_name')->get();
     // dd($data7);

     $output_array =[];
     if(!empty($data7))
     {
     foreach($data7 as $data7s)
     {
     $courseconid = $data7s->id;
     //echo($courseconid);
     $totalcoursecontentid = CourseContent::where('course_contents.course_id','=',$courseconid)->get()->count();
     //  start  coursecontent_typewisebutton type //
     $coursecontent_typewisebutton = CourseContent::where('course_contents.course_id','=',$courseconid)->get();
     $array = array();
     $course_type =[];
     foreach($coursecontent_typewisebutton as $coursecontent_typewisebuttons)
     {
     $course_type_wise = $coursecontent_typewisebuttons->type;
     if($course_type_wise == 'zoom')
     {
     $onlineclass_starttime = online_classe::where('online_classes.course_id','=',$courseconid)->select('online_classes.start_at')->get();
     //dd($onlineclass_starttime);
     $zoomclass_array =[];
     if(!empty($onlineclass_starttime))
     {
     $pass = '';
     foreach($onlineclass_starttime as $onlineclass_starttimes)
     {
     $zoom_class_start = $onlineclass_starttimes->start_at;
     //echo($zoom_class_start);
     $pass = $zoom_class_start;
     }
     }
     $current_time = date('Y-m-d H:i:s');
     // echo $current_datetime;
     $show_currenttime =strtotime($current_time);
     $show_zoomclasstime =strtotime($pass);
     if($show_currenttime > $show_zoomclasstime)
     {
     array_push($array,"1");
     }
     else
     {
     array_push($array,"0");
     }
     }
     else{
     array_push($array,"0");
     }
     }
     $variables =false;
     if (in_array("1", $array))
     {
     $variables =true;
     }
     //  end  coursecontent_typewisebutton type //

     //  start  content type //
     $coursecontent_type = CourseContent::where('course_contents.course_id','=',$courseconid)->get();
     $coursecontent_typear = [];
     $array = array();
     foreach($coursecontent_type as $coursecontent_types)
     {
     $content_type = $coursecontent_types->type;
     if($content_type == 'zoom')
     {
     // echo  "EEEEE";
     $onlineclass_end = online_classe::where('online_classes.course_id','=',$courseconid)->select('online_classes.start_at')->get();
     $zoom_array =[];
     if(!empty($onlineclass_end))
     {
     $zoom_end = '';
     foreach($onlineclass_end as $onlineclass_ends)
     {
     $online_class_time = $onlineclass_ends->start_at;
     //echo($zoom_class_start);
     $zoom_end = $online_class_time;
     }
     }
     // echo $onlineclass_end;
     $current_datetime = date('Y-m-d H:i:s');
     // echo $current_datetime;
     $show_currentdatetime =strtotime($current_datetime);
     $show_zoomclassdatetime =strtotime($zoom_end);
     if($show_currentdatetime > $show_zoomclassdatetime)
     {
     //"tttttt";
     //array_push($array,0);
     array_push($array,"0");
     // die();
     }
     else
     {
     // array_push($array,1);
     array_push($array,"1");
     }
     }
     else
     {
     //"dfggggg";
     //array_push($array,1);
     array_push($array,"1");
     }
     }
     $variable =false;
     if (in_array("1", $array))
     {
     $variable =true;
     }
     // end content type //
     $data7s['totalcoursecontent']= $totalcoursecontentid;
     $data7s['zoom_endtime']= $variables;
     $data7s['content_course_type']= $variable;
     //  echo($variable);
     //  die();
     $output_array[]=$data7s;
     }
     }
     return view('theme.institution.institutionwebsite',['user_id'=>$user_id,'courses'=>$output_array,'course_subscriptions'=>$data9,'categories'=>$categories,'institution_sliders' =>$institution_sliders,'id'=>$id,'popular_courses'=>$popular_courses]);
     }


     // end course //


}

public function teacherstudentregister(Request $request,$id)
{

   $institution_id = $request->id;
   return view('theme.institution.register',['institution_id'=>$institution_id]);
}
public function teacherstudentlogin(Request $request,$id)
{

    $institution_id = $request->id;
    //dd()

    return view('theme.institution.login',['institution_id'=>$institution_id]);
}

public function registerstore(Request $request)
{

    $request->validate([
        'email' => 'required|email|unique:users',
        'password' => 'required',
    ]);

    $institution_id = $request->institution_id;
    //dd(institution_id)


    if(isset($request->check_tutar) && $request->check_tutar == 1)
    {

      //teacher add //
      $institution_id = $request->institution_id;
        $role=2;



                    $user= new User();
                    $user->name = $request->name;

                    $user->username = $request->username;
                    $user->email = $request->email;
                     $user->role = $role;
                     $user->phone =  $request->phone; // Add 'phone' field
                      $user->password = Hash::make( $request->password);
                      $user->status = 'inactive';

                       $user->save();

                // dd($user);
                // exit();

                $user_id = $user->id;


                //SystemSetting details

                $system_settings = SystemSetting::first();

                $student_default_subscription_day = $system_settings->student_default_subscription_day;
                $teacher_default_subscription_day = $system_settings->teacher_default_subscription_day;
                $institution_default_subscription_day = $system_settings->institution_default_subscription_day;
                $default_country_id = $system_settings->default_country_id;
                $default_city_id = $system_settings->default_city_id;


                $start_date = Carbon::now();
                $end_date = Carbon::now();
                $user_type='Teacher';
                $end_date = Carbon::now()->addDays($teacher_default_subscription_day);

                            //insert user_details

                $user_details = UserDetail::create([
                    'user_type' => $user_type,
                    'country_id' => $default_country_id,
                    'city_id' => $default_city_id,
                    'user_id' => $user_id,
                    'created_by'=> $user_id,
                    'user_type'=> $user_type,
                    'subscription_start_date'=> $start_date,
                    'subscription_end_date'=> $end_date
                ]);

                $institution_teacher = new InstitutionTeacher();
                $institution_teacher->institution_id = $institution_id;
                $institution_teacher->user_id = $user_id;
                $institution_teacher->status = 'Pending';
                $institution_teacher->created_by = $institution_id;

                $institution_teacher->save();




    }
    else
    {
              //student add //
              $institution_id = $request->institution_id;

                $role=1;


            $user= new User();
            $user->name = $request->name;

            $user->username = $request->username;
            $user->email = $request->email;
             $user->role = $role;
             $user->phone =  $request->phone; // Add 'phone' field
              $user->password = Hash::make( $request->password);
            $user->save();


            $user_id = $user->id;


            //SystemSetting details

            $system_settings = SystemSetting::first();

            $student_default_subscription_day = $system_settings->student_default_subscription_day;
            $teacher_default_subscription_day = $system_settings->teacher_default_subscription_day;
            $institution_default_subscription_day = $system_settings->institution_default_subscription_day;
            $default_country_id = $system_settings->default_country_id;
            $default_city_id = $system_settings->default_city_id;


            $start_date = Carbon::now();
            $end_date = Carbon::now();


            $user_type='Student';
            $end_date = Carbon::now()->addDays($student_default_subscription_day);
              //insert user_details

            $user_details = UserDetail::create([
                'user_type' => $user_type,
                'country_id' => $default_country_id,
                'city_id' => $default_city_id,
                'user_id' => $user_id,
                'created_by'=> $user_id,
                'user_type'=> $user_type,
                'subscription_start_date'=> $start_date,
                'subscription_end_date'=> $end_date
            ]);

            $institution_student = new InstitutionStudent();
            $institution_student->institution_id = $institution_id;
            $institution_student->user_id = $user_id;
            $institution_student->created_by = $institution_id;

            $institution_student->save();


 }
    return view('theme.institution.login',['institution_id'=>$institution_id])->with('sucess', 'Your Registration Successfully');

}

public function postteacherstudentlogin(Request $request)
{
    //echo "lgjdfjgl";exit;
    // Validate the login request
    // $request->validate([
    //     'email' => 'required|email|users',
    //     'password' => 'required',
    // ]);

    $email = $request->input('email');
    $password = $request->input('password');
    $institution_id = $request->institution_id;

    $user = User::where('email', $email)->first();
    //dd($user->id);


    if ($user && ($user->role == 2 || $user->role == 1)) {
        // Check for valid user credentials
        if (Hash::check($password, $user->password)) {
            // Authentication successful
            if ($user->role == 2) {
                // Check if the user is a teacher
                $institution_teacher = InstitutionTeacher::where('user_id', $user->id)->get();
                $institution_teacher_relation = InstitutionTeacher::where(['user_id' => $user->id, 'institution_id' => $institution_id])->get();

                if ($institution_teacher_relation->isEmpty()) {
                    return redirect()->route('teacherstudentlogin', [$request->institution_id])->with('error', 'You are not registered in this Institution');
                }

                if ($user->status == 'inactive' && $institution_teacher[0]->status == 'pending') {
                    return redirect()->route('teacherstudentlogin', [$request->institution_id])->with('error', 'Your status is Inactive. Please contact the Administrator');
                }

                if ($user->status == 'active' && $institution_teacher[0]->status == 'approve') {
                    // Set session variables for the teacher
                    Session::put('teacher_name', $user->name);
                    Session::put('institution_id', $request->institution_id);
                    Session::put('user_role', $user->role);
                    Session::put('user_id', $user->id);

                    return redirect()->route('teacherprofile', ['institution_id' => $request->institution_id, 'user_id' => $user->id]);
                }
            } elseif ($user->role == 1) {
                // Check if the user is a student
                $institution_student_relation = InstitutionStudent::where(['user_id' => $user->id, 'institution_id' => $institution_id])->get();

                if ($institution_student_relation->isEmpty()) {
                    return redirect()->route('teacherstudentlogin', [$request->institution_id])->with('error', 'You are not registered in this Institution');
                }

                // Set session variables for the student
                Session::put('student_name', $user->name);
                Session::put('institution_id', $request->institution_id);
                Session::put('user_role', $user->role);
                Session::put('user_id', $user->id);

                return redirect()->route('profile', ['institution_id' => $request->institution_id, 'user_id' => $user->id]);
            }
        } else {
            // Invalid credentials
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
        }
    } else {
        // Invalid credentials
        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
    }







}

}
