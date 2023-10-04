<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Country;
use App\Models\City;
use App\Models\TeacherStudent;
use App\Models\InstitutionStudent;
use App\Models\Institution;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\RequestDetails;


use App\Models\QuizResponse;
use App\Models\QuizResponseDetails;


use App\Models\Course;
use App\Models\CourseTeacher;

use App\Models\Order;
use App\Models\Payment;

use App\Models\Category;

use App\Models\SystemSetting;
use App\Models\online_classe;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\CourseContent;
use App\Models\CourseSubscription;
use App\Models\Message;
use App\Models\InstitutionTeacherRequest;

use App\Models\Attendance;

use Illuminate\Support\Facades\Stroage;
use DB;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;

use PDF;

use File;

use Mail;
use App\Mail\NotifyMail;


class StudentController extends Controller
{
    public function profile(Request $request)
    {
        //$user = Auth::user();

        $user_id = $request->user_id;
        //dd($user_id);
         $institution_id =$request->institution_id;
         //dd($institution_id);
        $user = User::where('id', $user_id)->first();

        $user_details = UserDetail::where('user_id',$user_id)->first();
        $countries = Country::orderBy('c_name','asc')->get();
        $cities = City::where('country_id',$user_details->country_id)->orderBy('city_name','asc')->get();

        return view('theme.student.profile',['user'=>$user,'user_details'=>$user_details,'countries'=>$countries,'cities'=>$cities,'user_id'=>$user_id,'institution_id'=>$institution_id]);
    }

     public function messageinstitution(Request $request)
    {

                //this is institution id ;
                if($request->institution_id == null) {
                    $user_id = $_GET['institution_id'];
                } else {
                    $user_id = $request->institution_id;
                }
            // this is student  id //
                if($request->user_id == null) {
                    $user_ids = $_GET['user_id'];
                } else {
                    $user_ids = $request->user_id;
                }


      return view('theme.student.institutionmessage',['user_id'=>$user_id,'user_ids'=>$user_ids]);

    }


    public function sendmessagechatforstudentinstitution(Request $request)
    {

    //    $user_id=Auth::id();
         //this is institution id //
         $user_id =$request->institution_ids;
         //this is student id //
          $user_ids =$request->user_id;
       $institution_id = $request->post("institution_id");
       $contents = $request->post("send_message_text");

        $message = new Message();
          $message->sender_id = $user_ids;
          $message->sender_type = 'Student';
          $message->receiver_id = $institution_id;
          $message->receiver_type = 'Institution';
          $message->contents = $contents;
          $message->created_by = $user_ids;

          $message->save();


          $sender_details = User::where(['id'=>$user_ids])->first();



            $receiver_details = Institution::where(['id'=>$institution_id])->first();



            $details = [
                  'receiver_name'=>$receiver_details->name,
                  'sender_name'=>$sender_details->name,
                  'sender_type' => 'An Institution',
                  'body' => 'An Institution'.' ('.$sender_details->name.') sent you a message <br>Message : '.$contents.'<br><br>',
              ];

            Mail::to($receiver_details->email)->send(new NotifyMail($details));


           return response()->json(['success'=>'success','message'=>$message]);



   }

     public function getmessagechatforstudentinstitution(Request $request)
    {

      //this is institution id //
      $user_id =$request->institution_ids;
      //this is student id //
       $user_ids =$request->user_id;
       $institution_id = $request->post("institution_id");

       $institution_details = Institution::where('id',$institution_id)->first();
       $student_details = User::where('id',$user_ids)->first();

        $data7_public=Message::whereRaw(' ((messages.sender_id="'.$user_ids.'" and messages.sender_type="Student" and messages.receiver_id="'.$institution_id.'" and messages.receiver_type="Institution") or (messages.sender_id="'.$institution_id.'" and messages.sender_type="Institution" and messages.receiver_id="'.$user_ids.'" and messages.receiver_type="Student")) ')
         ->orderBy('messages.id','desc')
         ->limit(100)

           ->select('messages.*')->get();
           //->select('messages.*')->toSql();


            $thearray_public = [];

             if(count($data7_public) > 0)
             {
                 //foreach($data7_public as $k2=>$v2)
                for($ccc=(count($data7_public)-1); $ccc >= 0; $ccc--)
                {
                    $v2 = $data7_public[$ccc];

                     $thearray_public[]=array(
                        'sender_id'=>$v2->sender_id
                        ,'sender_type'=>$v2->sender_type
                        ,'receiver_id'=>$v2->receiver_id
                        ,'receiver_type'=>$v2->receiver_type
                        ,'contents'=>$v2->contents
                        ,'created_at'=>Carbon::parse($v2->created_at)->format('M d h:i A')


                    );

                }
             }


             $institution_name = $institution_details->name;
             if($institution_details->logo!='')
             {
                $institution_logo = asset($institution_details->logo);
             }
             else
             {
                $institution_logo = asset('assets/img/icons/activities/drinking.svg');
             }

             $student_name = 'Me';
             if($student_details->avatar!='')
             {
                $student_avatar = asset($student_details->avatar);
             }
             else
             {
                $student_avatar = asset('assets/img/icons/activities/drinking.svg');
             }




       return response()->json(['success'=>'success','user_id'=>$user_id,'institution_id'=>$institution_id,'data'=>$thearray_public,'institution_name'=>$institution_name,'institution_logo'=>$institution_logo,'student_name'=>$student_name,'student_avatar'=>$student_avatar]);
   }

    public function getinstitutionlistforstudentmessage(Request $request)
    {

         //this is institution id //
         $user_id =$request->institution_ids;
         //this is student id //
          $user_ids =$request->user_id;



       $institution_search_text = $request->post("institution_search_text");



        $data7_public=InstitutionStudent::leftJoin('institutions', 'institution_students.institution_id', '=', 'institutions.id')
         ->where(['institution_students.user_id'=>$user_ids])
         ->orderBy('institutions.name','asc')

            ->when($request->has("institution_search_text"),function($q)use($request){
                   $name  = $request->post("institution_search_text");
                   if($name!='')
                    {
                       return $q->where("institutions.name","like","%".$name."%");
                   }


            })->select('institutions.*')->get();
             //})->select('users.*')->toSql();

            // return response()->json(['success'=>'success','user_id'=>$user_id,'institution_search_text'=>$institution_search_text,'data'=>$data7_public]);

              $thearray_public = [];
             if(count($data7_public) > 0)
             {
                foreach($data7_public as $k2=>$v2)
                {
                    $logo = '';
                    if($v2->logo!='')
                    {
                        $logo = asset($v2->logo);
                    }
                    else
                    {
                        $logo = asset('assets/img/icons/activities/drinking.svg');
                    }
                     $thearray_public[]=array(
                        'id'=>$v2->id
                        ,'name'=>$v2->name

                        ,'logo'=>$logo

                    );

                }
             }



       return response()->json(['success'=>'success','user_id'=>$user_id,'institution_search_text'=>$institution_search_text,'data'=>$thearray_public]);


    }

    public function save_quiz_response(Request $request)
    {
        $course_content_quiz_id = $request->input('course_content_quiz_id');

         $course_id = $request->input('course_id');
         $course_content_id = $request->input('course_content_id');



        $course_content_quiz_details = Quiz::where('id',$course_content_quiz_id)->first();
        $all_q_id_array = explode(',', $course_content_quiz_details->all_questions);
        $user_id = Auth::id();
        $data7=Question::
         orderBy('id','desc')
          ->whereIn('id',$all_q_id_array)
          ->where('status','active')
         ->select('*')->get();

         $total_score = 0;
         $full_marks = 0;
         $score_percentage = 0;


       // echo $course_content_quiz_id;
        //echo "<pre>";
        //print_r($data7);
          if(count($data7) > 0)
          {

            foreach($data7 as $k2=>$v2)
            {
                $id = $v2->id;
                $marks = $v2->marks;
                $answer = $v2->answer;
                $response = $request->input('option_'.$id);
                $question_id= $id;

                $full_marks = $full_marks + $marks;
                if($answer==$response)
                {
                    $total_score = $total_score + $marks;
                }

            }

         }
         if($full_marks > 0)
         {
            $score_percentage = ($total_score * 100) / $full_marks;
         }

          $quiz_response = new QuizResponse();
          $quiz_response->course_content_quiz_id = $course_content_quiz_id;
          $quiz_response->user_id = $user_id;
          $quiz_response->total_score = $total_score;
          $quiz_response->full_marks = $full_marks;
          $quiz_response->score_percentage = $score_percentage;
          $quiz_response->save();

          $quiz_response_id = $quiz_response->id;
          if(count($data7) > 0)
          {

            foreach($data7 as $k2=>$v2)
            {
                $id = $v2->id;
                $answer = $v2->answer;
                $response = $request->input('option_'.$id);
                $question_id= $id;
                $correct_option = $answer;
                $user_response = $response;

                $score = 0;
                if($answer==$response)
                {
                    $score =  $marks;
                }

                  $quiz_response_details = new QuizResponseDetails();
                  $quiz_response_details->quiz_response_id = $quiz_response_id;
                  $quiz_response_details->course_content_quiz_id = $course_content_quiz_id;

                  $quiz_response_details->user_id = $user_id;
                  $quiz_response_details->question_id = $question_id;
                  $quiz_response_details->correct_option = $correct_option;
                  $quiz_response_details->user_response = $user_response;
                  $quiz_response_details->score = $score;

                  $quiz_response_details->save();

            }

         }

         return redirect()->route('studentcoursecontentquize',['id'=>$course_id,'content_id'=>$course_content_id])->with('message', 'Successfully completed your Quiz!');

    }

    public function profileupdate(Request $request)
    {



         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'country_id' => 'required|integer',
            'city_id' => 'required|integer',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            // $user = Auth::user();
            // $user_id=$user->id;
            $user_id =$request->user_id;
            $institution_id =$request->institution_id;

            $address = '';
            if($request->input('address')!='')
            {
                $address = $request->input('address');
            }
            $description = '';
            if($request->input('description')!='')
            {
                $description = $request->input('description');
            }
            $phone = '';
            if($request->input('phone')!='')
            {
                $phone = $request->input('phone');
            }


            $user_details = UserDetail::where('user_id',$user_id)->first();
            $user = User::where('id',$user_id)->first();

            $user->name = $request->input('name');
            $user->phone = $phone;
            $user->save();

            $user_details->address = $address;
            $user_details->description = $description;
            $user_details->country_id = $request->input('country_id');
            $user_details->city_id = $request->input('city_id');
            $user_details->save();

            return redirect()->back()->with('message', 'Successfully update your profile!');
        }


    }

    public function ajaxImageUploadPost(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
      ]);


      if ($validator->passes()) {


         if($request->hasFile('image')) {
            // $user_id = Auth::id();
            $user_id =$request->user_id;
            $institution_id =$request->institution_id;

             $user_type  = $request->get("user_type");
             $picture_type  = $request->get("picture_type");



            $folder = 'images/'.$picture_type.'/'.$user_type.'/';

            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $user_id.'_'.$fileName.'_'.time().'.'.$extension;

            $request->file('image')->move(public_path($folder), $fileName);

            $msg = 'Image uploaded successfully';

            $output_path = asset($folder.$fileName);
            $db_path = $folder.$fileName;

            $user = User::where('id',$user_id)->first();
            if($picture_type=='background_photo')
            {
                $old_image_path = $user->background_image;

            if(file_exists($old_image_path))
            {

                if($old_image_path!='')
                {
                    unlink($old_image_path);
                }
            }
                $user->background_image = $db_path;
            }
            else  if($picture_type=='avatar')
            {
                $old_image_path = $user->avatar;
                if(file_exists($old_image_path))
                {
                if($old_image_path!='')
                {
                    unlink($old_image_path);
                }
            }
                $user->avatar = $db_path;
            }


            $user->save();

             return response()->json(['success'=>$msg,'output_path'=>$output_path,'picture_type'=>$picture_type]);

        }



        return response()->json(['success'=>'done','picture_type'=>'avatar']);
      }


      return response()->json(['error'=>$validator->errors()->all()]);
    }
     public function check_student_subscription($user_id=0)
    {
        //$user_id = Auth::id();
      //  $user_id = $request->user_id;
        //dd($user_id);
         //$institution_id =$request->institution_id;

        $users_subscription_exist = UserDetail::where(['user_id'=>$user_id,'user_type'=>'Student'])->whereDate('subscription_end_date', '>=', Carbon::now())->whereDate('subscription_start_date', '<=', Carbon::now())->count();
        if($users_subscription_exist ==0)
        {
            return false;
        }
        return true;
    }
    public function check_course_accessibility($course_id,$user_id =0)
    {
        //$user_id = Auth::id();

        $users_subscription_exist = UserDetail::where(['user_id'=>$user_id,'user_type'=>'Student'])
        ->whereDate('subscription_end_date', '>=', Carbon::now())
        ->whereDate('subscription_start_date', '<=', Carbon::now())->count();
        //dd($users_subscription_exist);
        if($users_subscription_exist ==0)
        {
            return false;
        }

        $course_subscription_exist = Course::leftJoin('course_subscriptions','course_subscriptions.course_id','=','courses.id')->
        where(['course_subscriptions.user_id'=>$user_id,'courses.id'=>$course_id])
        ->whereDate('courses.end_date', '>=', Carbon::now())
        ->whereDate('courses.start_date', '<=', Carbon::now())->count();
        dd($course_subscription_exist);
        if($course_subscription_exist ==0)
        {
            return false;
        }
        return true;
    }
    public function course(Request $request)
    {
            // $user_id=Auth::id();
            $user_id = $request->user_id;
            //dd($user_id);
            $institution_id =$request->institution_id;
            //($user_id,$institution_id);
            $check_student_subscription_exist = $this->check_student_subscription($user_id) ;
            $categories = Category::where('institution_id',$institution_id)->orderBy('name','asc')->get();





            if($check_student_subscription_exist){
            $data7=Course::leftJoin('course_subscriptions','courses.id','=','course_subscriptions.course_id')->leftJoin('categories', 'categories.id', '=', 'courses.category_id')->where('course_subscriptions.user_id',$user_id)
            ->whereDate('courses.end_date', '>=', Carbon::now())
            ->whereDate('courses.start_date', '<=', Carbon::now())
            ->orderBy('courses.id','desc')

           ->when($request->has("title"),function($q)use($request){

            $title  = $request->get("title");
            if($title!='')
             {
                return $q->where("courses.title","like","%".$title."%");
            }


           })->select('courses.*','categories.name as category_name','course_subscriptions.is_complete')->get();

             //dd($data7);


           $thearray = [];



           $completed = 1;
            if(count($data7) > 0)
            {
             foreach($data7 as $k2=>$v2)
             {
                $course_id = $v2->id;
                 $data88=CourseContent::join('courses', 'course_contents.course_id', '=', 'courses.id')
                    ->orderBy('course_contents.id','desc')
                     ->where('courses.id',$course_id)
                     ->select('course_contents.*')->get();

                     if(count($data88) > 0)
                     {
                        foreach($data88 as $k28=>$v28)
                        {

                            $course_content_id = $v28->id;


                            if($v28->type=='quiz')
                            {


                                $all_quizes = Quiz::where(['course_content_id'=>$course_content_id])->get();

                                if(count($all_quizes) > 0)
                                 {
                                    foreach($all_quizes as $k5=>$v5)
                                    {
                                        if($v5->all_questions!='')
                                        {
                                            $course_content_quiz_id = $v5->id;
                                             $tempvar = QuizResponse::orderBy('score_percentage','desc')->where('course_content_quiz_id',$course_content_quiz_id)->where('user_id',$user_id)->limit(1);

                                               $score_percentage = 0 ;
                                               if($tempvar->count() > 0)
                                               {
                                                 $score_percentage = $tempvar->first()->score_percentage;

                                               }

                                               if($score_percentage < env('QUIZ_PERCENTAGE_MIN_REQ'))
                                                {
                                                    $completed = $completed * 0;
                                                 }
                                         }
                                    }
                                 }
                                }
                               else  if($v28->type=='zoom')
                                {


                                    $all_classes = online_classe::where(['course_content_id'=>$course_content_id])->get();
                                     if(count($all_classes) > 0)
                                     {
                                        foreach($all_classes as $k83=>$v83)
                                        {
                                            $online_class_id = $v83->id;
                                            $tempt_completed = Attendance::where(['online_class_id'=>$online_class_id,'user_id'=>$user_id])->count();

                                            $completed = $completed * $tempt_completed;
                                        }
                                    }
                                }





                        }
                     }


                        $thearray[]=array(
                            'title'=>$v2->title
                            ,'slug'=>$v2->slug
                            , 'status'=>$v2->status
                            , 'category_id'=>$v2->category_id
                            , 'category_name'=>$v2->category_name
                            , 'students_limit'=>$v2->students_limit
                            , 'visibility'=>$v2->visibility
                            , 'type'=>$v2->type
                            , 'is_complete'=>$v2->is_complete
                            ,'start_date'=>date('Y-m-d',strtotime($v2->start_date))
                            ,'end_date'=>date('Y-m-d',strtotime($v2->end_date))
                            ,'id'=>$v2->id
                            ,'completed'=>$completed
                            , 'is_fully_complete'=>$v2->is_fully_complete
                        );

            }
        }

       $data = $this->paginate_course($thearray);
       // dd($data);

           if($request->ajax()){

               return view('theme.student.course-pagination',['courses'=>$data,'categories'=>$categories,'user_id'=>$user_id,'institution_id'=>$institution_id]);
           }
           return view('theme.student.course',['courses'=>$data,'categories'=>$categories,'user_id'=>$user_id,'institution_id'=>$institution_id]);
        }
        else
        {
            return view('theme.student.no_access');
        }
    }

    public function paginate_course($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('studentcourse')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 3);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    public function coursecontent(Request $request,$id)
    {
            $course_id = $id;
            $check_course_accessibility = $this->check_course_accessibility($course_id);
            //dd($check_course_accessibility);
            if($check_course_accessibility){
            $course_details = Course::where('id',$course_id)->first();

        $type = $course_details["type"];
        $user_id = $request->user_id;

        $institution_id =$request->institution_id;
        //($user_id,$institution_id);


        $existforthisuser=Course::leftJoin('course_contents', 'course_contents.course_id', '=', 'courses.id')
        ->get()->count();
        dd($existforthisuser);



          if($existforthisuser < 1)
          {
            return redirect()->route('studentcourse')->with('error', 'No access!');
          }



        $data7=CourseContent::join('courses', 'course_contents.course_id', '=', 'courses.id')
                    ->orderBy('course_contents.id','desc')
                     ->where('courses.id',$course_id)
              ->when($request->has("title"),function($q)use($request){



                   $title  = $request->get("title");
                   if($title!='')
                    {
                       return $q->where("course_contents.title","like","%".$title."%");
                   }


            })->select('course_contents.*')->get();

        //return view('theme.teacher.coursedetails',['course_details'=>$course_details]);
              $thearray = [];
             if(count($data7) > 0)
             {
                foreach($data7 as $k2=>$v2)
                {

                    $course_content_id = $v2->id;


                    if($v2->type=='quiz')
                    {

                        $completed = 1;
                        $all_quizes = Quiz::where(['course_content_id'=>$course_content_id])->get();

                        if(count($all_quizes) > 0)
                         {
                            foreach($all_quizes as $k5=>$v5)
                            {
                                if($v5->all_questions!='')
                                {
                                    $course_content_quiz_id = $v5->id;
                                     $tempvar = QuizResponse::orderBy('score_percentage','desc')->where('course_content_quiz_id',$course_content_quiz_id)->where('user_id',$user_id)->limit(1);

                                       $score_percentage = 0 ;
                                       if($tempvar->count() > 0)
                                       {
                                         $score_percentage = $tempvar->first()->score_percentage;

                                       }

                                       if($score_percentage < env('QUIZ_PERCENTAGE_MIN_REQ'))
                                        {
                                            $completed = $completed * 0;
                                         }
                                 }
                            }
                         }
                        }
                       else  if($v2->type=='zoom')
                        {

                            $completed = 1;



                            $all_classes = online_classe::where(['course_content_id'=>$course_content_id])->get();
                             if(count($all_classes) > 0)
                             {
                                foreach($all_classes as $k8=>$v8)
                                {
                                    $online_class_id = $v8->id;
                                    $tempt_completed = Attendance::where(['online_class_id'=>$online_class_id,'user_id'=>$user_id])->count();

                                    $completed = $completed * $tempt_completed;
                                }
                            }
                        }



                            $thearray[]=array(
                                'title'=>$v2->title
                                ,'slug'=>$v2->slug
                                ,'visibility'=>$v2->visibility
                                ,'status'=>$v2->status
                                 ,'type'=>$v2->type
                                 ,'start_date'=>date('Y-m-d',strtotime($v2->start_date))
                                ,'end_date'=>date('Y-m-d',strtotime($v2->end_date))
                                 ,'course_id'=>$v2->course_id
                                ,'id'=>$v2->id
                                ,'completed'=>$completed
                            );

                }
             }

                $data = $this->paginate_coursecontent($thearray,$course_id);

                if($request->ajax()){
                    return view('theme.student.coursecontent-pagination',['coursecontents'=>$data,'course_id'=>$course_id,'type'=>$type,'course_details'=>$course_details,'user_id'=>$user_id,'institution_id'=>$institution_id]);
                }
                return view('theme.student.coursecontent',['coursecontents'=>$data,'course_id'=>$course_id,'type'=>$type,'course_details'=>$course_details,'user_id'=>$user_id,'institution_id'=>$institution_id]);
                }
                else{
                    return view('theme.student.no_access_course');
                }
    }
    public function paginate_coursecontent($items, $course_id='',$perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('studentcoursecontent',['id'=>$course_id])] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function studentcourseView($id)
    {
        $course_content = CourseContent::leftJoin('courses','courses.id','=','course_contents.course_id')->select('courses.title as course_title','courses.preview_image as preview_image','course_contents.*')->where(['course_contents.id'=>$id])->first();
        //$courses = Course::find($id);




       return json_encode(array('status'=>'ok','data'=>$course_content));


    }

      // Course Content  Quiz Start ///
      public function coursequize(Request $request,$id,$content_id)
      {
          $course_id = $id;
          $check_course_accessibility = $this->check_course_accessibility($course_id);
          if($check_course_accessibility){
          $course_content_id = $content_id;
          $course_details = Course::where('id',$course_id)->first();
          $course_content_details = CourseContent::where('id',$course_content_id)->first();

          //  echo "<pre>";
          //  print_r($course_details);

          $user_id = $request->user_id;
          //dd($user_id);
          $institution_id =$request->institution_id;




         $data7=Quiz::
         orderBy('id','desc')

          ->where('course_content_id',$course_content_id)
           ->when($request->has("title"),function($q)use($request){



                $title  = $request->get("title");
                if($title!='')
                 {
                    return $q->where("title","like","%".$title."%");
                }


         })->select('*')->get();

          //  echo "<pre>";
          //  print_r($data7);

          $thearray = [];
          if(count($data7) > 0)
          {
             foreach($data7 as $k2=>$v2)
             {

               if($v2->all_questions!=''){


               $tempvar = QuizResponse::orderBy('score_percentage','desc')->where('course_content_quiz_id',$v2->id)->where('user_id',$user_id)->limit(1);

               $score_percentage = 0 ;


               if($tempvar->count() > 0)
               {
                 $score_percentage = $tempvar->first()->score_percentage;
                 $score_percentage = (int)$score_percentage;

               }

               // echo "<br>score_percentage=".$score_percentage;


                         $thearray[]=array(
                             'title'=>$v2->title
                             ,'slug'=>$v2->slug
                             ,'status'=>$v2->status
                             ,'start_date'=>date('Y-m-d',strtotime($v2->start_date))
                              ,'end_date'=>date('Y-m-d',strtotime($v2->end_date))
                              ,'course_id'=>$course_id
                              ,'course_content_id'=>$course_content_id
                             ,'id'=>$v2->id

                             ,'score_percentage'=>$score_percentage

                         );
                }

             }
          }

        $data = $this->paginate_coursequize($thearray,$course_id,$course_content_id);







             if($request->ajax()){
                 return view('theme.student.coursequize-pagination',['quizes'=>$data,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'user_id'=>$user_id,'institution_id'=>$institution_id]);
             }
             return view('theme.student.coursequize',['quizes'=>$data,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'user_id'=>$user_id,'institution_id'=>$institution_id]);

            }
            else{
                return view('theme.student.no_access_course');
            }

      }
      public function paginate_coursequize($items, $course_id='', $course_content_id='',$perPage = 10, $page = null, $options = [])
      {
          $options = ['path' => Route('studentcoursecontentquize',['id'=>$course_id,'content_id'=>$course_content_id])] ;

          $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
          $items = $items instanceof Collection ? $items : Collection::make($items);
          return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
      }

      public function quizView($id)
      {
           $quiz = Quiz::find($id);

          return json_encode(array('status'=>'ok','data'=>$quiz));


      }

      public function coursecertificate(Request $request,$id,$download)
    {
        $course_id = $id;

        $check_student_subscription_exist = $this->check_student_subscription() ;
        $categories = Category::orderBy('name','asc')->get();
        $user_id = $request->user_id;
        //dd($user_id);
        $institution_id =$request->institution_id;
        if($check_student_subscription_exist)
        {

            $completed = 1;

            $data7=CourseContent::join('courses', 'course_contents.course_id', '=', 'courses.id')
                    ->orderBy('course_contents.id','desc')
                     ->where('courses.id',$course_id)
             ->select('course_contents.*')->get();

        //return view('theme.teacher.coursedetails',['course_details'=>$course_details]);

             if(count($data7) > 0)
             {
                foreach($data7 as $k2=>$v2)
                {

                    $course_content_id = $v2->id;


                    if($v2->type=='quiz')
                    {


                        $all_quizes = Quiz::where(['course_content_id'=>$course_content_id])->get();

                        if(count($all_quizes) > 0)
                         {
                            foreach($all_quizes as $k5=>$v5)
                            {
                                if($v5->all_questions!='')
                                {
                                    $course_content_quiz_id = $v5->id;
                                     $tempvar = QuizResponse::orderBy('score_percentage','desc')->where('course_content_quiz_id',$course_content_quiz_id)->where('user_id',$user_id)->limit(1);

                                       $score_percentage = 0 ;
                                       if($tempvar->count() > 0)
                                       {
                                         $score_percentage = $tempvar->first()->score_percentage;

                                       }

                                       if($score_percentage < env('QUIZ_PERCENTAGE_MIN_REQ'))
                                        {
                                            $completed = $completed * 0;
                                         }
                                 }
                            }
                         }
                        }
                       else  if($v2->type=='zoom')
                        {



                            $all_classes = online_classe::where(['course_content_id'=>$course_content_id])->get();
                             if(count($all_classes) > 0)
                             {
                                foreach($all_classes as $k8=>$v8)
                                {
                                    $online_class_id = $v8->id;
                                    $tempt_completed = Attendance::where(['online_class_id'=>$online_class_id,'user_id'=>$user_id])->count();

                                    $completed = $completed * $tempt_completed;
                                }
                            }
                        }




                }
             }

             if($completed==1)
             {

                    if($download=='pdf')
                    {
                        set_time_limit(300);
                         $user_id = Auth::id();
                        $course = Course::where('id',$course_id)->first();
                        $student_details = User::where('id',$user_id)->first();



                        //return view('theme.student.course_certificate_pdf',['course_id'=>$course_id,'purpose'=>'pdf','course'=>$course,'student_details'=>$student_details]);

                        $pdf = PDF::loadView('theme.student.course_certificate_pdf',['course_id'=>$course_id,'purpose'=>'pdf','course'=>$course,'student_details'=>$student_details,"user_id"=>$user_id,"institution_id"=>$institution_id]);

                       return $pdf->download('certificate.pdf');
                    }
                    //echo "444";
                    return view('theme.student.course_certificate',['course_id'=>$course_id,"user_id"=>$user_id,"institution_id"=>$institution_id]);
              }
         }
        else
        {
            return view('theme.student.no_access');
        }

    }

     public function coursequizeresult(Request $request,$id,$content_id,$quiz_id)
      {


          $course_id = $id;
          $check_course_accessibility = $this->check_course_accessibility($course_id);
          if($check_course_accessibility){
          $course_content_id = $content_id;
          $course_content_quiz_id = $quiz_id;
          //dd($course_content_quiz_id);
          $course_details = Course::where('id',$course_id)->first();
          $course_content_details = CourseContent::where('id',$course_content_id)->first();
          $course_content_quiz_details = Quiz::where('id',$course_content_quiz_id)->first();
          $all_q_id_array = explode(',', $course_content_quiz_details->all_questions);


          $user_id = $request->user_id;
          //dd($user_id);
          $institution_id =$request->institution_id;
        $data7=Question::
         orderBy('id','desc')
          ->whereIn('id',$all_q_id_array)
          ->where('status','active')
         ->select('*')->get();


           $score_percentage = 0 ;
           $total_score = 0 ;
           $full_marks = 0 ;

               $responses=[];

          $tempvar = QuizResponse::orderBy('score_percentage','desc')->where('course_content_quiz_id',$course_content_quiz_id)->where('user_id',$user_id)->limit(1); $tempvar = QuizResponse::orderBy('score_percentage','desc')->where('course_content_quiz_id',$course_content_quiz_id)->where('user_id',$user_id)->limit(1);

          if($tempvar->count() > 0)
               {
                 $score_percentage = $tempvar->first()->score_percentage;
                 $score_percentage = (int)$score_percentage;

                  $total_score = $tempvar->first()->total_score;
                 $total_score = (int)$total_score;

                  $full_marks = $tempvar->first()->full_marks;
                 $full_marks = (int)$full_marks;

                  $responses = $tempvar->first()->quiz_response_details->toArray();

               }

              // echo "<br>score_percentage=".$score_percentage;


          $thearray = [];
          if(count($data7) > 0)
          {
              $slno =0;
             foreach($data7 as $k2=>$v2)
             {
                $slno++;












                        $thearray[]=
                        array(
                            'id'=>$v2->id,
                            'question_text'=>$v2->question_text,
                            'option_a'=>$v2->option_a,
                            'option_b'=>$v2->option_b,
                            'option_c'=>$v2->option_c,
                            'option_d'=>$v2->option_d,
                            'answer'=>$v2->answer,
                            'marks'=>$v2->marks,


                        );




             }
          }




             return view('theme.student.coursequizresult',['questions'=>$thearray,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_content_quiz_id'=>$course_content_quiz_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'course_content_quiz_details'=>$course_content_quiz_details,'responses'=>$responses,'score_percentage'=>$score_percentage,'total_score'=>$total_score,'full_marks'=>$full_marks,"user_id"=>$user_id,"institution_id"=>$institution_id]);

            }
            else{
                return view('theme.student.no_access_course');
            }


      }

      public function coursequizequestion(Request $request,$id,$content_id,$quiz_id)
      {


          $course_id = $id;
          $check_course_accessibility = $this->check_course_accessibility($course_id);
          if($check_course_accessibility){
          $course_content_id = $content_id;
          $course_content_quiz_id = $quiz_id;
          //dd($course_content_quiz_id);
          $course_details = Course::where('id',$course_id)->first();
          $course_content_details = CourseContent::where('id',$course_content_id)->first();
          $course_content_quiz_details = Quiz::where('id',$course_content_quiz_id)->first();
          $all_q_id_array = explode(',', $course_content_quiz_details->all_questions);


          $user_id = $request->user_id;
          //dd($user_id);
          $institution_id =$request->institution_id;
        $data7=Question::
         orderBy('id','desc')
          ->whereIn('id',$all_q_id_array)
          ->where('status','active')
         ->select('*')->get();



          $thearray = [];
          if(count($data7) > 0)
          {
              $slno =0;
             foreach($data7 as $k2=>$v2)
             {
                $slno++;






                        $thearray[]=
                        array(
                            'id'=>$v2->id,
                            'question_text'=>$v2->question_text,
                            'option_a'=>$v2->option_a,
                            'option_b'=>$v2->option_b,
                            'option_c'=>$v2->option_c,
                            'option_d'=>$v2->option_d,
                            'answer'=>$v2->answer,
                            'marks'=>$v2->marks,
                        );




             }
          }




             return view('theme.student.coursequestion',['questions'=>$thearray,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_content_quiz_id'=>$course_content_quiz_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'course_content_quiz_details'=>$course_content_quiz_details,"user_id"=>$user_id,"institution_id"=>$institution_id]);

            }
            else{
                return view('theme.student.no_access_course');
            }


      }
      public function paginate_coursequizequestion($items, $course_id='', $course_content_id='',$course_content_quiz_id='',$perPage = 10, $page = null, $options = [])
      {
          $options = ['path' => Route('studentcoursecontentquizequestion',['id'=>$course_id,'content_id'=>$course_content_id,'quiz_id'=>$course_content_quiz_id])] ;

          $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
          $items = $items instanceof Collection ? $items : Collection::make($items);
          return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
      }

      public function questionView($id)
      {
           $question = Question::find($id);

          return json_encode(array('status'=>'ok','data'=>$question));


      }


    public function courseView($id)
    {
        $courses = Course::find($id);
        $course_teachers_result = CourseTeacher::leftJoin('users','users.id','=','course_teachers.user_id')->where(['course_id'=>$id])->select('users.name','users.id')->get();

        $preview_image_temp = $courses->preview_image;
        $preview_image = asset('assets/img/icons/activities/drinking.svg');
            if($preview_image_temp!='' && file_exists($preview_image_temp))
            {
                $preview_image = asset($preview_image_temp);


            }
             $asset_path = asset('');
        $t_array=[];
        $course_teacher_id = [];
        if(!empty($course_teachers_result))
        {
            foreach($course_teachers_result as $kk=>$vv)
            {
                $t_array[]=$vv->name;
                $course_teacher_id[] = $vv->id;

            }
        }

        $course_teachers_user_id = implode(' , ',$t_array);

         $category_name = $courses->category->name;

        return json_encode(array('status'=>'ok','data'=>$courses,'course_teachers_user_id'=>$course_teachers_user_id,'category_name'=>$category_name,'course_teacher_ids'=>$course_teacher_id,'asset_path'=>$asset_path,'preview_image'=>$preview_image));


    }

     public function onlineclassstudent(Request $request,$id,$content_id)
    {
       $user_id = $request->user_id;
        //dd($user_id);
        $institution_id =$request->institution_id;
       $student_online_class_before_minute=SystemSetting::select('student_online_class_before_minute')->first()->student_online_class_before_minute;
      $course_subcription=CourseSubscription::where(['course_subscriptions.user_id'=>$user_id])->get();
      $t2_array =[];
      if(!empty($course_subcription) )
       {
           foreach ($course_subcription as $coursesubcription)
           {
               $t2_array[]= $coursesubcription->course_id;
           }
       }
       $course_id = $id;

       $course_content_id = $content_id;

       $course_details = Course::where('id',$course_id)->first();

       $course_content_details = CourseContent::where('id',$course_content_id)->first();
       $onlineclass_details =online_classe::leftJoin('users', 'users.id', '=', 'online_classes.user_id')->leftJoin('courses', 'courses.id', '=', 'online_classes.course_id')->leftJoin('course_contents', 'course_contents.id', '=', 'online_classes.course_content_id')->orderBy('online_classes.id','desc')->where(['online_classes.course_id'=>$course_id,'online_classes.course_content_id'=>$course_content_id])->select('online_classes.*','courses.title as course_title','course_contents.title as course_content_title','users.name')->get();
       //dd($onlineclass_details);


        $data7=online_classe::leftJoin('users', 'users.id', '=',   'online_classes.user_id')->leftJoin('courses', 'courses.id', '=', 'online_classes.course_id')->leftJoin('course_contents', 'course_contents.id', '=', 'online_classes.course_content_id')->orderBy('online_classes.id','desc')->where(['online_classes.course_id'=>$course_id,'online_classes.course_content_id'=>$course_content_id])




                ->when($request->has("topic"),function($q)use($request){

                $topic  = $request->get("topic");

                if($topic!='')
                {
                    return $q->where("topic","like","%".$topic."%");
                }


                })->select('online_classes.*','courses.title as course_title','course_contents.title as course_content_title','users.name')->get();


            $thearray = [];

            if(count($data7) > 0)
            {
            foreach($data7 as $k2=>$v2)
            {


                        $thearray[]=array(
                            'course_name'=>$v2->course_title
                            ,'course_content_name'=>$v2->course_content_title
                            ,'topic'=>$v2->topic
                            , 'start_at'=>$v2->start_at
                            , 'duration'=>$v2->duration
                            , 'join_url'=>$v2->join_url
                            , 'meeting_id'=>$v2->meeting_id
                            , 'teacher_id'=>$v2->user_id
                            ,'teacher_name'=>$v2->name




                            ,'id'=>$v2->id
                        );

            }
            }

            $data = $this->paginate_class($thearray,$course_id,$course_content_id);

                if($request->ajax()){
                        return view('theme.student.onlineclass-pagination',['online_classes'=>$data,'course_subcription'=>$course_subcription,'student_online_class_before_minute'=>$student_online_class_before_minute,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,
                        'onlineclass_details'=>$onlineclass_details,"user_id"=>$user_id,"institution_id"=>$institution_id]);
                    }
                    return view('theme.student.onlineclass',['online_classes'=>$data,'course_subcription'=>$course_subcription,'student_online_class_before_minute'=>$student_online_class_before_minute,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details, 'onlineclass_details'=>$onlineclass_details,"user_id"=>$user_id,"institution_id"=>$institution_id]);


    }


    public function paginate_class($items,$course_id='', $course_content_id='',$perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('studentcourseonline_classes',['id'=>$course_id,'content_id'=>$course_content_id])] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function order(Request $request)
    {

        $user_id = $request->user_id;
        //dd($user_id);
        $institution_id =$request->institution_id;



            $data7=Order::leftJoin('courses','courses.id','=','orders.course_id')->where('orders.user_id',$user_id)->where('orders.type','course')->select('orders.*','courses.title as course_name')->get();
            //dd($data7);




            $thearray = [];
            if(count($data7) > 0)
            {
            foreach($data7 as $k2=>$v2)
            {


                        $thearray[]=array(
                            'course_id'=>$v2->course_id
                            ,'user_id'=>$v2->user_id
                            , 'status'=>$v2->status
                            , 'total'=>$v2->total
                            , 'course_name'=>$v2->course_name



                            ,'id'=>$v2->id
                        );

            }
        }

        $data = $this->paginate_order($thearray);
        //dd($thearray);

            if($request->ajax()){

                return view('theme.student.order-pagination',['orders'=>$data,"user_id"=>$user_id,"institution_id"=>$institution_id]);
            }
            return view('theme.student.order',['orders'=>$data,"user_id"=>$user_id,"institution_id"=>$institution_id]);

    }
    public function message(Request $request)
    {

    //    $user_id=Auth::id();
                    //this is institution id ;
                if($request->institution_id == null) {
                    $user_id = $_GET['institution_id'];
                } else {
                    $user_id = $request->institution_id;
                }
            // this is student  id //
                if($request->user_id == null) {
                    $user_ids = $_GET['user_id'];
                } else {
                    $user_ids = $request->user_id;
                }

      return view('theme.student.message',['user_id'=>$user_id,'user_ids'=>$user_ids]);

    }

     public function sendmessagechatforstudentteacher(Request $request)
    {


    // $user_id=Auth::id();
    //this is institution id //
    $user_id =$request->institution_id;
    //this is student id //
     $user_ids =$request->user_id;
       $teacher_id = $request->post("teacher_id");
       $contents = $request->post("send_message_text");

        $message = new Message();
          $message->sender_id = $user_ids;
          $message->sender_type = 'Student';
          $message->receiver_id = $teacher_id;
          $message->receiver_type = 'Teacher';
          $message->contents = $contents;
          $message->created_by = $user_ids;

          $message->save();


          $sender_details = User::where(['id'=>$user_ids])->first();
            $receiver_details = User::where(['id'=>$teacher_id])->first();

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
                  'body' => $sender_type.' ('.$sender_details->name.') sent you a message <br>Message : '.$contents.'<br><br>',
              ];

            Mail::to($receiver_details->email)->send(new NotifyMail($details));


           return response()->json(['success'=>'success','message'=>$message]);



   }

     public function getmessagechatforstudentteacher(Request $request)
    {

    //    $user_id=Auth::id();
       //this is institution id //
       $user_id =$request->institution_id;
       //this is student id //
        $user_ids =$request->user_id;
       $teacher_id = $request->post("teacher_id");

       $teacher_details = User::where('id',$teacher_id)->first();
       $student_details = User::where('id',$user_ids)->first();

        $data7_public=Message::whereRaw(' ((messages.sender_id="'.$user_ids.'" and messages.sender_type="Student" and messages.receiver_id="'.$teacher_id.'" and messages.receiver_type="Teacher") or (messages.sender_id="'.$teacher_id.'" and messages.sender_type="Teacher" and messages.receiver_id="'.$user_ids.'" and messages.receiver_type="Student")) ')
         ->orderBy('messages.id','desc')
         ->limit(100)

           ->select('messages.*')->get();
           //->select('messages.*')->toSql();


            $thearray_public = [];

             if(count($data7_public) > 0)
             {
                 //foreach($data7_public as $k2=>$v2)
                for($ccc=(count($data7_public)-1); $ccc >= 0; $ccc--)
                {
                    $v2 = $data7_public[$ccc];

                     $thearray_public[]=array(
                        'sender_id'=>$v2->sender_id
                        ,'sender_type'=>$v2->sender_type
                        ,'receiver_id'=>$v2->receiver_id
                        ,'receiver_type'=>$v2->receiver_type
                        ,'contents'=>$v2->contents
                        ,'created_at'=>Carbon::parse($v2->created_at)->format('M d h:i A')


                    );

                }
             }


             $teacher_name = $teacher_details->name;
             if($teacher_details->avatar!='')
             {
                $teacher_avatar = asset($teacher_details->avatar);
             }
             else
             {
                $teacher_avatar = asset('assets/img/icons/activities/drinking.svg');
             }

             $student_name = 'Me';
             if($student_details->avatar!='')
             {
                $student_avatar = asset($student_details->avatar);
             }
             else
             {
                $student_avatar = asset('assets/img/icons/activities/drinking.svg');
             }




       return response()->json(['success'=>'success','teacher_id'=>$teacher_id,'data'=>$thearray_public,'teacher_name'=>$teacher_name,'teacher_avatar'=>$teacher_avatar,'student_name'=>$student_name,'student_avatar'=>$student_avatar,'user_id'=>$user_id,'user_ids'=>$user_ids]);
   }

    public function getteacherlistforstudentmessage(Request $request)
    {

          //this is institution id //
    $user_id =$request->institution_id;
    //this is student id //
     $user_ids =$request->user_id;
       $teacher_search_text = $request->post("teacher_search_text");

        $data7_public=TeacherStudent::leftJoin('users', 'teacher_students.teacher_id', '=', 'users.id')
         ->where(['teacher_students.user_id'=>$user_ids,'users.status'=>'active','users.role'=>'2'])
         ->orderBy('users.name','asc')

            ->when($request->has("teacher_search_text"),function($q)use($request){
                   $name  = $request->post("teacher_search_text");
                   if($name!='')
                    {
                       return $q->where("users.name","like","%".$name."%");
                   }


            })->select('users.*')->get();

              $thearray_public = [];
             if(count($data7_public) > 0)
             {
                foreach($data7_public as $k2=>$v2)
                {
                    $avatar = '';
                    if($v2->avatar!='')
                    {
                        $avatar = asset($v2->avatar);
                    }
                    else
                    {
                        $avatar = asset('assets/img/icons/activities/drinking.svg');
                    }
                     $thearray_public[]=array(
                        'id'=>$v2->id
                        ,'name'=>$v2->name
                        ,'email'=>$v2->email
                        ,'avatar'=>$avatar

                    );

                }
             }



       return response()->json(['success'=>'success','teacher_search_text'=>$teacher_search_text,'data'=>$thearray_public,'user_id'=>$user_id,'user_ids'=>$user_ids]);


    }
    public function paginate_order($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('studentorder')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 3);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function paymentView($id)
      {

         $payment = Payment::where('payments.order_id',$id)->orderBy('payments.id','desc')->get();
       return json_encode(array('status'=>'ok','data'=>$payment));


      }
   public function teacher(Request $request)
    {
        //return view('theme.student.teacher');


        //  $user_id = Auth::id();

    $user_id = $request->user_id;
    //dd($user_id);
     $institution_id =$request->institution_id;



        //   $data7_public=TeacherStudent::leftJoin('users', 'teacher_students.user_id', '=', 'users.id')
        //  ->where(['teacher_students.user_id'=>$user_id,'users.status'=>'active','users.role'=>'1'])
        //  ->orderBy('users.name','asc')
         $data7_public=TeacherStudent::leftJoin('users', 'teacher_students.teacher_id', '=', 'users.id')
         ->where(['teacher_students.user_id'=>$user_id,'users.status'=>'active','users.role'=>'2'])
         ->orderBy('users.name','asc')

            ->when($request->has("name"),function($q)use($request){
                   $name  = $request->get("name");
                   if($name!='')
                    {
                       return $q->where("users.name","like","%".$name."%");
                   }


            })->select('users.*')->get();

              $thearray_public = [];
             if(count($data7_public) > 0)
             {
                foreach($data7_public as $k2=>$v2)
                {
                     $thearray_public[]=array(
                        'id'=>$v2->id
                        ,'name'=>$v2->name
                        ,'email'=>$v2->email

                    );

                }
             }


           $public = $this->paginate_public($thearray_public);
        //    echo"<pre>";
        //    print_r($public);


         $data7_private_pending=RequestDetails::leftJoin('users', 'request_details.receiver_id', '=', 'users.id')
         ->where(['request_details.type'=>'Teacher_Student','request_details.sender_type'=>'Student','request_details.sender_id'=>$user_id,'request_details.receiver_type'=>'Teacher','request_details.status'=>'Pending','users.status'=>'active','users.role'=>'2'])
         ->orderBy('request_details.created_at','desc')

            ->when($request->has("name"),function($q)use($request){
                   $name  = $request->get("name");
                   if($name!='')
                    {
                       return $q->where("users.name","like","%".$name."%");
                   }


            })->select('users.*','request_details.created_at as crtime')->get();

              $thearray_private_pending = [];
             if(count($data7_private_pending) > 0)
             {
                foreach($data7_private_pending as $k2=>$v2)
                {
                     $thearray_private_pending[]=array(
                        'id'=>$v2->id
                        ,'name'=>$v2->name
                        ,'email'=>$v2->email
                         ,'crtime'=>$v2->crtime

                    );

                }
             }

           $private_pending = $this->paginate_private_pending($thearray_private_pending);

           $name  = $request->get("name");
        //    echo"<pre>";
        //    print_r($name);
            $thearray_private_sending = [];
             if($name!='')
             {
                $exclude_array = [];

                //$teacher_students_user_id = TeacherStudent::where(['user_id'=>$user_id])->select('user_id')->get();
                $teacher_students_user_id = TeacherStudent::where(['teacher_id'=>$user_id])->select('user_id')->get();
                if(!empty($teacher_students_user_id))
                {
                    foreach($teacher_students_user_id as $teacher_students_user_id_value)
                    {
                        array_push($exclude_array,$teacher_students_user_id_value->user_id);
                    }
                }

                $request_details_user_id_1 = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Student','receiver_type'=>'Teacher'])->select('receiver_id')->get();
                if(!empty($request_details_user_id_1))
                {
                    foreach($request_details_user_id_1 as $request_details_user_id_1_value)
                    {
                        array_push($exclude_array,$request_details_user_id_1_value->receiver_id);
                    }
                }

                $request_details_user_id_2 = RequestDetails::where(['receiver_id'=>$user_id,'sender_type'=>'Teacher','receiver_type'=>'Student'])->select('sender_id')->get();
                if(!empty($request_details_user_id_2))
                {
                    foreach($request_details_user_id_2 as $request_details_user_id_2_value)
                    {
                        array_push($exclude_array,$request_details_user_id_2_value->sender_id);
                    }
                }


               $data7_private_sending=User::
             where(['users.status'=>'active','users.role'=>'2'])
             ->whereNotIn('users.id', $exclude_array)
             ->orderBy('users.name','asc')
             ->limit(20)
             ->when($request->has("name"),function($q)use($request){
                       $name  = $request->get("name");
                       if($name!='')
                        {
                           return $q->where("users.name","like","%".$name."%");
                       }


                })->select('users.*')->get();


                 if(count($data7_private_sending) > 0)
                 {
                    foreach($data7_private_sending as $k2=>$v2)
                    {
                         $thearray_private_sending[]=array(
                            'id'=>$v2->id
                            ,'name'=>$v2->name
                            ,'email'=>$v2->email

                        );

                    }
                 }
             }

           $private_sending = $this->paginate_private_sending($thearray_private_sending);



           $data7_private_receiving=RequestDetails::leftJoin('users', 'request_details.sender_id', '=', 'users.id')
         ->where(['request_details.type'=>'Teacher_Student','request_details.sender_type'=>'Teacher','request_details.receiver_id'=>$user_id,'request_details.sender_type'=>'Teacher','request_details.status'=>'Pending','users.status'=>'active','users.role'=>'2'])
         ->orderBy('request_details.created_at','desc')

            ->when($request->has("name"),function($q)use($request){
                   $name  = $request->get("name");
                   if($name!='')
                    {
                       return $q->where("users.name","like","%".$name."%");
                   }


            })->select('users.*','request_details.created_at as crtime')->get();

              $thearray_private_receiving = [];
             if(count($data7_private_receiving) > 0)
             {
                foreach($data7_private_receiving as $k2=>$v2)
                {
                     $thearray_private_receiving[]=array(
                        'id'=>$v2->id
                        ,'name'=>$v2->name
                        ,'email'=>$v2->email
                        ,'crtime'=>$v2->crtime

                    );

                }
             }

           $private_receiving = $this->paginate_private_receiving($thearray_private_receiving);


           if($request->ajax()){
                if($request->get("tab_type")=='private_pending')
                {
                   return view('theme.student.teacher-private-pending-pagination',['private_pending'=>$private_pending,'user_id'=>$user_id,'institution_id'=>$institution_id]);
                }
                else if($request->get("tab_type")=='private_sending')
                {
                   return view('theme.student.teacher-private-sending-pagination',['private_sending'=>$private_sending,'user_id'=>$user_id,'institution_id'=>$institution_id]);
                }
                else if($request->get("tab_type")=='private_receiving')
                {
                   return view('theme.student.teacher-private-receiving-pagination',['private_receiving'=>$private_receiving,'user_id'=>$user_id,'institution_id'=>$institution_id]);
                }
                else if($request->get("tab_type")=='public')
                {
                   return view('theme.student.teacher-public-pagination',['public'=>$public,'user_id'=>$user_id,'institution_id'=>$institution_id]);
                }




           }
           return view('theme.student.teacher',['private_pending'=>$private_pending,'private_sending'=>$private_sending,'private_receiving'=>$private_receiving,'public'=>$public,'user_id'=>$user_id,'institution_id'=>$institution_id]);

    }
    public function paginate_public($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('studentteacher')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function paginate_private_pending($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('studentteacher')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_sending($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('studentteacher')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_receiving($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('studentteacher')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function institution(Request $request)
    {
        //return view('theme.student.institution');


         $user_id = Auth::id();



        //   $data7_public=institutionStudent::leftJoin('users', 'institution_students.user_id', '=', 'users.id')
        //  ->where(['institution_students.user_id'=>$user_id,'users.status'=>'active','users.role'=>'1'])
        //  ->orderBy('users.name','asc')
         $data7_public=InstitutionStudent::leftJoin('institution_admins', 'institution_admins.institution_id', '=', 'institution_students.institution_id')
         ->leftJoin('users', 'institution_admins.user_id', '=', 'users.id')
         ->where(['institution_students.user_id'=>$user_id,'users.status'=>'active','users.role'=>'3'])
         ->orderBy('users.name','asc')

            ->when($request->has("name"),function($q)use($request){
                   $name  = $request->get("name");
                   if($name!='')
                    {
                       return $q->where("users.name","like","%".$name."%");
                   }


            })->select('users.*')->get();

              $thearray_public = [];
             if(count($data7_public) > 0)
             {
                foreach($data7_public as $k2=>$v2)
                {
                     $thearray_public[]=array(
                        'id'=>$v2->id
                        ,'name'=>$v2->name
                        ,'email'=>$v2->email

                    );

                }
             }


           $public = $this->paginate_public_it($thearray_public);
        //    echo"<pre>";
        //    print_r($public);


         $data7_private_pending=RequestDetails::leftJoin('users', 'request_details.receiver_id', '=', 'users.id')
         ->where(['request_details.type'=>'Institution_Student','request_details.sender_type'=>'Student','request_details.sender_id'=>$user_id,'request_details.receiver_type'=>'Institution','request_details.status'=>'Pending','users.status'=>'active','users.role'=>'3'])
         ->orderBy('request_details.created_at','desc')

            ->when($request->has("name"),function($q)use($request){
                   $name  = $request->get("name");
                   if($name!='')
                    {
                       return $q->where("users.name","like","%".$name."%");
                   }


            })->select('users.*','request_details.created_at as crtime')->get();

              $thearray_private_pending = [];
             if(count($data7_private_pending) > 0)
             {
                foreach($data7_private_pending as $k2=>$v2)
                {
                     $thearray_private_pending[]=array(
                        'id'=>$v2->id
                        ,'name'=>$v2->name
                        ,'email'=>$v2->email
                         ,'crtime'=>$v2->crtime

                    );

                }
             }

           $private_pending = $this->paginate_private_pending_it($thearray_private_pending);

           $name  = $request->get("name");
        //    echo"<pre>";
        //    print_r($name);
            $thearray_private_sending = [];
             if($name!='')
             {
                $exclude_array = [];

                //$institution_students_user_id = institutionStudent::where(['user_id'=>$user_id])->select('user_id')->get();
                $institution_students_user_id = InstitutionStudent::leftJoin('institution_admins', 'institution_admins.institution_id', '=', 'institution_students.institution_id')
                 ->leftJoin('users', 'institution_admins.user_id', '=', 'users.id')
                 ->where(['institution_students.user_id'=>$user_id,'users.status'=>'active','users.role'=>'3'])
                ->select('users.id as user_id')->get();
                if(!empty($institution_students_user_id))
                {
                    foreach($institution_students_user_id as $institution_students_user_id_value)
                    {
                        array_push($exclude_array,$institution_students_user_id_value->user_id);
                    }
                }

                $request_details_user_id_1 = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Student','receiver_type'=>'Institution'])->select('receiver_id')->get();
                if(!empty($request_details_user_id_1))
                {
                    foreach($request_details_user_id_1 as $request_details_user_id_1_value)
                    {
                        array_push($exclude_array,$request_details_user_id_1_value->receiver_id);
                    }
                }

                $request_details_user_id_2 = RequestDetails::where(['receiver_id'=>$user_id,'sender_type'=>'Institution','receiver_type'=>'Student'])->select('sender_id')->get();
                if(!empty($request_details_user_id_2))
                {
                    foreach($request_details_user_id_2 as $request_details_user_id_2_value)
                    {
                        array_push($exclude_array,$request_details_user_id_2_value->sender_id);
                    }
                }


               $data7_private_sending=User::
             where(['users.status'=>'active','users.role'=>'3'])
             ->whereNotIn('users.id', $exclude_array)
             ->orderBy('users.name','asc')
             ->limit(20)
             ->when($request->has("name"),function($q)use($request){
                       $name  = $request->get("name");
                       if($name!='')
                        {
                           return $q->where("users.name","like","%".$name."%");
                       }


                })->select('users.*')->get();


                 if(count($data7_private_sending) > 0)
                 {
                    foreach($data7_private_sending as $k2=>$v2)
                    {
                         $thearray_private_sending[]=array(
                            'id'=>$v2->id
                            ,'name'=>$v2->name
                            ,'email'=>$v2->email

                        );

                    }
                 }
             }

           $private_sending = $this->paginate_private_sending_it($thearray_private_sending);



           $data7_private_receiving=RequestDetails::leftJoin('users', 'request_details.sender_id', '=', 'users.id')
         ->where(['request_details.type'=>'Institution_Student','request_details.sender_type'=>'Institution','request_details.receiver_id'=>$user_id,'request_details.status'=>'Pending','users.status'=>'active','users.role'=>'3'])
         ->orderBy('request_details.created_at','desc')

            ->when($request->has("name"),function($q)use($request){
                   $name  = $request->get("name");
                   if($name!='')
                    {
                       return $q->where("users.name","like","%".$name."%");
                   }


            })->select('users.*','request_details.created_at as crtime')->get();

              $thearray_private_receiving = [];
             if(count($data7_private_receiving) > 0)
             {
                foreach($data7_private_receiving as $k2=>$v2)
                {
                     $thearray_private_receiving[]=array(
                        'id'=>$v2->id
                        ,'name'=>$v2->name
                        ,'email'=>$v2->email
                        ,'crtime'=>$v2->crtime

                    );

                }
             }

           $private_receiving = $this->paginate_private_receiving_it($thearray_private_receiving);


           if($request->ajax()){
                if($request->get("tab_type")=='private_pending')
                {
                   return view('theme.student.institution-private-pending-pagination',['private_pending'=>$private_pending]);
                }
                else if($request->get("tab_type")=='private_sending')
                {
                   return view('theme.student.institution-private-sending-pagination',['private_sending'=>$private_sending]);
                }
                else if($request->get("tab_type")=='private_receiving')
                {
                   return view('theme.student.institution-private-receiving-pagination',['private_receiving'=>$private_receiving]);
                }
                else if($request->get("tab_type")=='public')
                {
                   return view('theme.student.institution-public-pagination',['public'=>$public]);
                }




           }
           return view('theme.student.institution',['private_pending'=>$private_pending,'private_sending'=>$private_sending,'private_receiving'=>$private_receiving,'public'=>$public]);

    }
    public function paginate_public_it($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('studentinstitution')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function paginate_private_pending_it($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('studentinstitution')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_sending_it($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('studentinstitution')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_receiving_it($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('studentinstitution')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function becometeacher(Request $request)
    {

       //$user_id=Auth::id();
       $user_id = $request->user_id;
       //dd($user_id);
        $institution_id =$request->institution_id;

      return view('theme.student.landingpage',['user_id'=>$user_id,'institution_id'=>$institution_id]);

    }


  public function submitrequest(Request $request)
    {

       //$user_id=Auth::id();
       $user_id = $request->user_id;
       $institution_id =$request->institution_id;
       $send_requests = InstitutionTeacherRequest::where(['institution_id'=>$institution_id,'student_id'=>$user_id])->get()->count();
       //dd($send_requests);
       if($send_requests > 0)
       {
        return redirect()->back()->with('success','Already sent');

       }
       else
       {

        $institution_teacher_request = new InstitutionTeacherRequest();
        $institution_teacher_request->institution_id = $institution_id;
        $institution_teacher_request->student_id = $user_id;
        $institution_teacher_request->status = 'pending';

        $institution_teacher_request->save();





   return redirect()->back()->with('success', 'Successfully send a request admin');


       }


    }



}
