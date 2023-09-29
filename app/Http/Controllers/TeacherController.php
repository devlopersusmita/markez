<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseContent;
use App\Models\CourseTeacher;
use App\Models\CourseComment;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\UserDetail;
use App\Models\Country;
use App\Models\City;
use App\Models\RequestDetails;
use App\Models\TeacherStudent;
use App\Models\InstitutionTeacher;
use App\Models\Quiz;

use App\Models\Message;

use App\Models\Question;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Stroage;
use DB;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;

use File;

use Mail;
use App\Mail\NotifyMail;

class TeacherController extends Controller
{
     public function teacherprofile(Request $request)
    {
         //$user = Auth::user();
           $user_id = $request->user_id;
          //dd($user_id);
           $institution_id =$request->institution_id;
            //dd($institution_id);
            $user = User::where('id', $user_id)->first();
            //dd($user);

        $user_details = UserDetail::where('user_id',$user_id)->first();
        $countries = Country::orderBy('c_name','asc')->get();
        $cities = City::where('country_id',$user_details->country_id)->orderBy('city_name','asc')->get();

        return view('theme.teacher.profile',['user'=>$user,'user_details'=>$user_details,'countries'=>$countries,'cities'=>$cities,'user_id'=>$user_id,'institution_id'=>$institution_id]);


    }
      public function sendmessagechatforteacherstudent(Request $request)
    {

       //$user_id=Auth::id();
        //this is institution id //
        $user_id =$request->institution_id;
        //this is teacher id //
         $user_ids =$request->user_id;

       $student_id = $request->post("student_id");
       $contents = $request->post("send_message_text");

        $message = new Message();
          $message->sender_id = $user_ids;
          $message->sender_type = 'Teacher';
          $message->receiver_id = $student_id;
          $message->receiver_type = 'Student';
          $message->contents = $contents;
          $message->created_by = $user_ids;

          $message->save();

           $sender_details = User::where(['id'=>$user_ids])->first();
            $receiver_details = User::where(['id'=>$student_id])->first();

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

     public function getmessagechatforteacherstudent(Request $request)
    {

     //this is institution id //
     $user_id =$request->institution_id;
     //this is teacher id //
      $user_ids =$request->user_id;

       $student_id = $request->post("student_id");

       $teacher_details = User::where('id',$user_ids)->first();
       $student_details = User::where('id',$student_id)->first();

        $data7_public=Message::whereRaw(' ((messages.sender_id="'.$user_ids.'" and messages.sender_type="Teacher" and messages.receiver_id="'.$student_id.'" and messages.receiver_type="Student") or (messages.sender_id="'.$student_id.'" and messages.sender_type="Student" and messages.receiver_id="'.$user_ids.'" and messages.receiver_type="Teacher")) ')
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


             $teacher_name = 'Me';
             if($teacher_details->avatar!='')
             {
                $teacher_avatar = asset($teacher_details->avatar);
             }
             else
             {
                $teacher_avatar = asset('assets/img/icons/activities/drinking.svg');
             }

             $student_name = $student_details->name;
             if($student_details->avatar!='')
             {
                $student_avatar = asset($student_details->avatar);
             }
             else
             {
                $student_avatar = asset('assets/img/icons/activities/drinking.svg');
             }




       return response()->json(['success'=>'success','user_id'=>$user_id,'user_ids'=>$user_ids,'student_id'=>$student_id,'data'=>$thearray_public,'teacher_name'=>$teacher_name,'teacher_avatar'=>$teacher_avatar,'student_name'=>$student_name,'student_avatar'=>$student_avatar]);
   }

    public function getstudentlistforteachermessage(Request $request)
    {

       //this is institution id //
       $user_id =$request->institution_id;
       //this is teacher id //
        $user_ids =$request->user_id;

       $student_search_text = $request->post("student_search_text");

        $data7_public=TeacherStudent::leftJoin('users', 'teacher_students.user_id', '=', 'users.id')
         ->where(['teacher_students.teacher_id'=>$user_ids,'users.status'=>'active','users.role'=>'1'])
         ->orderBy('users.name','asc')

            ->when($request->has("student_search_text"),function($q)use($request){
                   $name  = $request->post("student_search_text");
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



       return response()->json(['success'=>'success','user_id'=>$user_id,'user_ids'=>$user_ids,'student_search_text'=>$student_search_text,'data'=>$thearray_public]);


    }
    public function teachermessage(Request $request)
    {

        //    $user_id=Auth::id();
            //this is institution id ;
            if($request->institution_id == null) {
                $user_id = $_GET['institution_id'];
            } else {
                $user_id = $request->institution_id;
            }
        // this is teacher  id //
            if($request->user_id == null) {
                $user_ids = $_GET['user_id'];
            } else {
                $user_ids = $request->user_id;
            }


      return view('theme.teacher.message',['user_id'=>$user_id,'user_ids'=>$user_ids]);

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
            //dd($user_details);
            $user = User::where('id',$user_id)->first();
            //dd($user);
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
            //$user_id = Auth::id();

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
    public function course(Request $request)
    {

        //this is teacher id//
        $user_id = $request->user_id;

           //this is institution id//
         $institution_id =$request->institution_id;
         //dd($user_id,$institution_id);
         $categories = Category::where('institution_id',$institution_id)->orderBy('name','asc')->get();


         $data7=Course::join('course_teachers', 'course_teachers.course_id', '=', 'courses.id')->leftJoin('categories', 'categories.id', '=', 'courses.category_id')->orderBy('courses.id','desc')
             ->where(['course_teachers.user_id'=>$user_id,'course_teachers.institution_id'=>$institution_id,'course_teachers.status'=>'approve'])
            ->when($request->has("title"),function($q)use($request){



                   $title  = $request->get("title");
                   if($title!='')
                    {
                       return $q->where("courses.title","like","%".$title."%");
                   }


            })->select('courses.*','categories.name as category_name')->get();

              $thearray = [];
             if(count($data7) > 0)
             {
                foreach($data7 as $k2=>$v2)
                {


                            $thearray[]=array(
                                'title'=>$v2->title
                                ,'slug'=>$v2->slug
                                , 'status'=>$v2->status
                                , 'category_id'=>$v2->category_id
                                , 'category_name'=>$v2->category_name
                                , 'type'=>$v2->type
                                ,'start_date'=>date('Y-m-d',strtotime($v2->start_date))
                                ,'end_date'=>date('Y-m-d',strtotime($v2->end_date))
                                , 'is_fully_complete'=>$v2->is_fully_complete
                                ,'id'=>$v2->id
                            );

                }
             }

           $data = $this->paginate_course($thearray);

           if($request->ajax()){
               return view('theme.teacher.course-pagination',['courses'=>$data,'categories'=>$categories,'user_id'=>$user_id,'institution_id'=>$institution_id]);
           }
           return view('theme.teacher.course',['courses'=>$data,'categories'=>$categories,'user_id'=>$user_id,'institution_id'=>$institution_id]);
    }


    public function paginate_course($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('teachercourse')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    public function coursecontent(Request $request,$id)
    {
        $user_id = $request->user_id;
        //dd($user_id);
        $course_id = $id;
        $check_course_accessibility_by_teacher = $this->check_course_accessibility_by_teacher($course_id,$user_id);
        if($check_course_accessibility_by_teacher){
        $course_details = Course::where('id',$course_id)->first();
        $type = $course_details["type"];
       // $user_id = Auth::id();
        $user_id = $request->user_id;
        //dd($user_id);
         $institution_id =$request->institution_id;

         $existforthisuser=Course::leftJoin('course_contents', 'course_contents.course_id', '=', 'courses.id')->join('course_teachers', 'course_teachers.course_id', '=', 'courses.id')
             ->where('course_teachers.user_id',$user_id)
             ->where('courses.id',$course_id)->get()->count();



          if($existforthisuser < 1)
          {
            return redirect()->route('teachercourse')->with('error', 'No access!');
          }


        $data7=CourseContent::join('courses', 'course_contents.course_id', '=', 'courses.id')->join('course_teachers', 'course_teachers.course_id', '=', 'courses.id')
            ->orderBy('course_contents.id','desc')
             ->where('course_teachers.user_id',$user_id)
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
                            );

                }
             }

           $data = $this->paginate_coursecontent($thearray,$course_id);

           if($request->ajax()){
               return view('theme.teacher.coursecontent-pagination',['coursecontents'=>$data,'course_id'=>$course_id,'type'=>$type,'course_details'=>$course_details,'user_id'=>$user_id,'institution_id'=>$institution_id]);
           }
           return view('theme.teacher.coursecontent',['coursecontents'=>$data,'course_id'=>$course_id,'type'=>$type,'course_details'=>$course_details,'user_id'=>$user_id,'institution_id'=>$institution_id]);
        }
        else{
            return view('theme.teacher.no_access_course');
        }
    }
    public function paginate_coursecontent($items, $course_id='',$perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('teachercoursecontent',['id'=>$course_id])] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function student(Request $request)
    {
        //return view('theme.teacher.student');
        //  $user_id = Auth::id();
        $user_id = $request->user_id;
        //dd($user_id);
         $institution_id =$request->institution_id;
          //dd($institution_id);
          $data7_public=TeacherStudent::leftJoin('users', 'teacher_students.user_id', '=', 'users.id')
         ->where(['teacher_students.teacher_id'=>$user_id,'users.status'=>'active','users.role'=>'1'])
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


         $data7_private_pending=RequestDetails::leftJoin('users', 'request_details.receiver_id', '=', 'users.id')
         ->where(['request_details.type'=>'Teacher_Student','request_details.sender_type'=>'Teacher','request_details.sender_id'=>$user_id,'request_details.receiver_type'=>'Student','request_details.status'=>'Pending','users.status'=>'active','users.role'=>'1'])
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
            $thearray_private_sending = [];
             if($name!='')
             {
                $exclude_array = [];

                $teacher_students_user_id = TeacherStudent::where(['teacher_id'=>$user_id])->select('user_id')->get();
                if(!empty($teacher_students_user_id))
                {
                    foreach($teacher_students_user_id as $teacher_students_user_id_value)
                    {
                        array_push($exclude_array,$teacher_students_user_id_value->user_id);
                    }
                }

                $request_details_user_id_1 = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Teacher','receiver_type'=>'Student'])->select('receiver_id')->get();
                if(!empty($request_details_user_id_1))
                {
                    foreach($request_details_user_id_1 as $request_details_user_id_1_value)
                    {
                        array_push($exclude_array,$request_details_user_id_1_value->receiver_id);
                    }
                }

                $request_details_user_id_2 = RequestDetails::where(['receiver_id'=>$user_id,'sender_type'=>'Student','receiver_type'=>'Teacher'])->select('sender_id')->get();
                if(!empty($request_details_user_id_2))
                {
                    foreach($request_details_user_id_2 as $request_details_user_id_2_value)
                    {
                        array_push($exclude_array,$request_details_user_id_2_value->sender_id);
                    }
                }


               $data7_private_sending=User::
             where(['users.status'=>'active','users.role'=>'1'])
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
         ->where(['request_details.type'=>'Teacher_Student','request_details.sender_type'=>'Student','request_details.receiver_id'=>$user_id,'request_details.sender_type'=>'Student','request_details.status'=>'Pending','users.status'=>'active','users.role'=>'1'])
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
                   return view('theme.teacher.student-private-pending-pagination',['private_pending'=>$private_pending,'user_id'=>$user_id,'institution_id'=>$institution_id]);
                }
                else if($request->get("tab_type")=='private_sending')
                {
                   return view('theme.teacher.student-private-sending-pagination',['private_sending'=>$private_sending,'user_id'=>$user_id,'institution_id'=>$institution_id]);
                }
                else if($request->get("tab_type")=='private_receiving')
                {
                   return view('theme.teacher.student-private-receiving-pagination',['private_receiving'=>$private_receiving,'user_id'=>$user_id,'institution_id'=>$institution_id]);
                }
                else if($request->get("tab_type")=='public')
                {
                   return view('theme.teacher.student-public-pagination',['public'=>$public,'user_id'=>$user_id,'institution_id'=>$institution_id]);
                }




           }
           return view('theme.teacher.student',['private_pending'=>$private_pending,'private_sending'=>$private_sending,'private_receiving'=>$private_receiving,'public'=>$public,'user_id'=>$user_id,'institution_id'=>$institution_id]);
    }
    public function paginate_public($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('teacherstudent')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_pending($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('teacherstudent')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_sending($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('teacherstudent')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_receiving($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('teacherstudent')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }



public function statuscourse($id,$status)
{
  $data = Course::find($id);
  $data->status = $status;
  $result = $data->save();
  if($result)
  {
    Session::flash('success', 'Status changed successfully!');

         return response()->json([
          'message' => 'Status changed successfully!'
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


public function statusteachercoursecontent($id,$status)
{
  $data = CourseContent::find($id);
  $data->status = $status;
  $result = $data->save();
  if($result)
  {
    Session::flash('success', 'Status changed successfully!');

         return response()->json([
          'message' => 'Status changed successfully!'
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


public function courseView($id)
{
    $course_content = CourseContent::leftJoin('courses','courses.id','=','course_contents.course_id')->select('courses.title as course_title','course_contents.*')->where(['course_contents.id'=>$id])->first();
    //$course_teachers_user_id = CourseTeacher::where(['course_id'=>$id])->first()->user_id;




    //  $course_name = $coursecontents->courses->title;
    //  echo"<pre>";
    //  print_r()

    return json_encode(array('status'=>'ok','data'=>$course_content));


}


public function store(Request $request)
{


    $v = Validator::make($request->all(),[
        'title' => 'required',
        'status' =>'required',
        'start_date' =>'required',
        'end_date' =>'required',
        'visibility' =>'required',




    ]);

    if ($v->fails())
    {
       //return redirect()->route('create.category')->withInput()->with('error',$v->messages());
       //return redirect()->back()->withErrors($v)->withInput();
       return response()->json([
        'type'=>'error',
        'message' => $v->errors()->all()
    ]);
    }
    else
    {
        $description='';
        if($request->description_value!='')
        {
            $description=$request->description_value;
        }

    $visibility=1;
    if($request->visibility!='')
    {
    $visibility=$request->visibility;
    }





    // $course_id = Course::id();

    //$created_by = Auth::id();
    $created_by = $request->user_id;
    $slug = Str::slug($request->input('title'));

    // $course_id = $id;

     $course_content = new CourseContent();
        $course_content->title = $request->title;
        $course_content->slug = $slug;
        $course_content->status = $request->status;
        $course_content->description =  $description;
        $course_content->created_by = $created_by;
        $course_content->course_id = $request->course_id;
        $course_content->type = $request->type;
        $course_content->start_date = $request->start_date;
        $course_content->end_date = $request->end_date;
        $course_content->visibility =  $visibility;






        if($course_content->save()){



             Session::flash('success', 'successfully course content added!');

             return response()->json([
                'type' => 'success',
              'message' => 'successfully course content added!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                'type' => 'error',
                  'message' => 'Something wrong!',

                ]);
        }
    }
}



public function destroy($id)
{

        $course_content = CourseContent::find($id);




        $result =$course_content->delete();


        if($result)

        {
            Session::flash('error', 'Data deleted successfully!');

            return response()->json([
                'message' => 'Data deleted successfully!'
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


public function update(Request $request,$id)
    {
        $v = Validator::make($request->all(),[
            'title' => 'required',

            'status' =>'required',
           'start_date' =>'required',
            'end_date' =>'required',
            'visibility' =>'required',
            'type' =>'required',


        ]);

        if ($v->fails())
        {

           return redirect()->back()->withErrors($v)->withInput();
        }
        else
        {
            $description='';
            if($request->description_value!='')
            {
                $description=$request->description_value;
            }


            $status='';
            if($request->status!='')
            {
                $status=$request->status;
            }
            $type='';
            if($request->type!='')
            {
                $type=$request->type;
            }
            $course_id='';
            if($request->course_id!='')
            {
                $course_id=$request->course_id;
            }



            $visibility='';
            if($request->visibility!='')
            {
                $visibility=$request->visibility;
            }


            $start_date='';
            if($request->start_date!='')
            {
                $start_date=$request->start_date;
            }
            $end_date='';
            if($request->end_date!='')
            {
                $end_date=$request->end_date;
            }


            //$created_by = Auth::id();
            $created_by = $request->user_id;

        //  $title = $request->input('title');
        //  $status = $request->input('status');
           $slug = Str::slug($request->input('title'));



         $course_content =  CourseContent::where('id',$id)->first();
            $course_content->title = $request->title;
            $course_content->status = $status;

             $course_content->slug = $slug;
             $course_content->description = $description;
             $course_content->course_id = $request->course_id;
             $course_content->created_by = $created_by;
             $course_content->type = $type;
             $course_content->start_date = $start_date;
             $course_content->end_date = $end_date;

             $course_content->visibility = $visibility;






            if($course_content->save()){


                 Session::flash('success', 'successfully course content updated!');

                 return response()->json([
                  'message' => 'successfully course content updated!'
                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);

                }
         }

    }

     public function institution(Request $request)
    {
        //return view('theme.institution.teacher');
         $user_id = Auth::id();

          $data7_public=InstitutionTeacher::leftJoin('institution_admins', 'institution_admins.institution_id', '=', 'institution_teachers.institution_id')
         ->leftJoin('users', 'institution_admins.user_id', '=', 'users.id')
         ->where(['institution_teachers.user_id'=>$user_id,'users.status'=>'active','users.role'=>'3'])
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


         $data7_private_pending=RequestDetails::leftJoin('users', 'request_details.receiver_id', '=', 'users.id')
         ->where(['request_details.type'=>'Institution_Teacher','request_details.sender_type'=>'Teacher','request_details.sender_id'=>$user_id,'request_details.receiver_type'=>'Institution','request_details.status'=>'Pending','users.status'=>'active','users.role'=>'3'])
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
            $thearray_private_sending = [];
             if($name!='')
             {
                $exclude_array = [];

                $Institution_teachers_user_id = InstitutionTeacher::leftJoin('institution_admins', 'institution_admins.institution_id', '=', 'institution_teachers.institution_id')
                 ->leftJoin('users', 'institution_admins.user_id', '=', 'users.id')
                 ->where(['institution_teachers.user_id'=>$user_id,'users.status'=>'active','users.role'=>'3'])
                ->select('users.id as user_id')->get();



                if(!empty($Institution_teachers_user_id))
                {
                    foreach($Institution_teachers_user_id as $Institution_teachers_user_id_value)
                    {
                        array_push($exclude_array,$Institution_teachers_user_id_value->user_id);
                    }
                }

                $request_details_user_id_1 = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Teacher','receiver_type'=>'Institution'])->select('receiver_id')->get();
                if(!empty($request_details_user_id_1))
                {
                    foreach($request_details_user_id_1 as $request_details_user_id_1_value)
                    {
                        array_push($exclude_array,$request_details_user_id_1_value->receiver_id);
                    }
                }

                $request_details_user_id_2 = RequestDetails::where(['receiver_id'=>$user_id,'sender_type'=>'Institution','receiver_type'=>'Teacher'])->select('sender_id')->get();
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




           if($request->ajax()){
                if($request->get("tab_type")=='private_pending')
                {
                   return view('theme.teacher.institution-private-pending-pagination',['private_pending'=>$private_pending]);
                }
                else if($request->get("tab_type")=='private_sending')
                {
                   return view('theme.teacher.institution-private-sending-pagination',['private_sending'=>$private_sending]);
                }

                else if($request->get("tab_type")=='public')
                {
                   return view('theme.teacher.institution-public-pagination',['public'=>$public]);
                }




           }
           return view('theme.teacher.institution',['private_pending'=>$private_pending,'private_sending'=>$private_sending,'public'=>$public]);
    }
    public function paginate_public_it($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('teacherinstitution')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_pending_it($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('teacherinstitution')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_sending_it($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('teacherinstitution')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    // public function paginate_private_receiving_it($items, $perPage = 10, $page = null, $options = [])
    // {
    //     $options = ['path' => Route('teacherinstitution')] ;

    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     $items = $items instanceof Collection ? $items : Collection::make($items);
    //     return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    // }

    // Course Content  Quiz Start ///
public function coursequize(Request $request,$id,$content_id)
{

    $user_id = $request->user_id;
    //dd($user_id);
     $institution_id =$request->institution_id;
    $course_id = $id;
    $check_course_accessibility_by_teacher = $this->check_course_accessibility_by_teacher($course_id,$user_id);
    if($check_course_accessibility_by_teacher){
    $course_content_id = $content_id;
    $course_details = Course::where('id',$course_id)->first();
    $course_content_details = CourseContent::where('id',$course_content_id)->first();

                //  echo "<pre>";
                //  print_r($course_details);

            //    $user_id = Auth::id();




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


                            $thearray[]=array(
                                'title'=>$v2->title
                                ,'slug'=>$v2->slug
                                ,'status'=>$v2->status
                                ,'start_date'=>date('Y-m-d',strtotime($v2->start_date))
                                    ,'end_date'=>date('Y-m-d',strtotime($v2->end_date))
                                    ,'course_id'=>$course_id
                                    ,'course_content_id'=>$course_content_id
                                ,'id'=>$v2->id
                            );

                }
                }

                $data = $this->paginate_coursequize($thearray,$course_id,$course_content_id);







       if($request->ajax()){
           return view('theme.teacher.coursequize-pagination',['quizes'=>$data,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'user_id'=>$user_id,'institution_id'=>$institution_id]);
       }
       return view('theme.teacher.coursequize',['quizes'=>$data,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'user_id'=>$user_id,'institution_id'=>$institution_id]);

    }
    else{
        return view('theme.teacher.no_access_course');
    }

}
public function paginate_coursequize($items, $course_id='', $course_content_id='',$perPage = 10, $page = null, $options = [])
{
    $options = ['path' => Route('teachercoursecontentquize',['id'=>$course_id,'content_id'=>$course_content_id])] ;

    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
}

public function quizestore(Request $request)
{


    $v = Validator::make($request->all(),[
        'title' => 'required',
        'status' =>'required',
        'start_date' =>'required',
        'end_date' =>'required',





    ]);

    if ($v->fails())
    {
       //return redirect()->route('create.category')->withInput()->with('error',$v->messages());
       //return redirect()->back()->withErrors($v)->withInput();
       return response()->json([
        'type'=>'error',
        'message' => $v->errors()->all()


      ]);
    }
    else
    {


    //$created_by = Auth::id();
    $created_by = $request->user_id;

    $slug = Str::slug($request->input('title'));

    // $course_id = $id;

     $quize = new Quiz();
        $quize->title = $request->title;
        $quize->slug = $slug;
        $quize->status = $request->status;
        $quize->created_by = $created_by;
        $quize->course_content_id = $request->course_content_id;
        $quize->start_date = $request->start_date;
        $quize->end_date = $request->end_date;

             if($quize->save()){



             Session::flash('success', 'successfully quiz  added!');

             return response()->json([
                   'type' => 'success',
              'message' => 'successfully quiz  added!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                'type' => 'error',
                  'message' => 'Something wrong!',

                ]);
        }
    }
}


public function quizView($id)
{
     $quiz = Quiz::find($id);

    return json_encode(array('status'=>'ok','data'=>$quiz));


}

public function quizupdate(Request $request,$id)
    {
        $v = Validator::make($request->all(),[
            'title' => 'required',

            'status' =>'required',
           'start_date' =>'required',
            'end_date' =>'required',



        ]);

        if ($v->fails())
        {

           return redirect()->back()->withErrors($v)->withInput();
        }
        else
        {



            $title='';
            if($request->title!='')
            {
                $title=$request->title;
            }

            $status='';
            if($request->status!='')
            {
                $status=$request->status;
            }

            $course_content_id='';
            if($request->course_content_id!='')
            {
                $course_content_id=$request->course_content_id;
            }






            $start_date='';
            if($request->start_date!='')
            {
                $start_date=$request->start_date;
            }
            $end_date='';
            if($request->end_date!='')
            {
                $end_date=$request->end_date;
            }


            // $created_by = Auth::id();
            $created_by = $request->user_id;

        //  $title = $request->input('title');
        //  $status = $request->input('status');
           $slug = Str::slug($request->input('title'));



         $quiz =  Quiz::where('id',$id)->first();
            $quiz->title = $request->title;
            $quiz->status = $status;

             $quiz->slug = $slug;

             $quiz->course_content_id = $request->course_content_id;
             $quiz->created_by = $created_by;

             $quiz->start_date = $start_date;
             $quiz->end_date = $end_date;


       if($quiz->save()){


                 Session::flash('success', 'successfully quiz updated!');

                 return response()->json([
                  'message' => 'successfully quiz updated!'
                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);

                }
         }

    }

    public function check_course_accessibility_by_teacher($course_id, $user_id = 0)
    {

       $course_exist = CourseTeacher::
        where(['user_id'=>$user_id,'course_id'=>$course_id])->count();

        if($course_exist ==0)
        {
            return false;
        }
        return true;
    }

    public function statusteacherquiz($id,$status)
    {
      $data = Quiz::find($id);
      $data->status = $status;
      $result = $data->save();
      if($result)
      {
        Session::flash('success', 'Status changed successfully!');

             return response()->json([
              'message' => 'Status changed successfully!'
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



    public function quizdestroy($id)
    {

            $quiz = Quiz::find($id);

            $result =$quiz->delete();

      if($result)

      {
          Session::flash('error', 'Data deleted successfully!');

          return response()->json([
            'message' => 'Data deleted successfully!'
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
// Course Content  Quiz End ///
   // Course Content  Quiz Question  Start ///
public function coursequizequestion(Request $request,$id,$content_id,$quiz_id)
{
    $user_id = $request->user_id;
    //dd($user_id);
     $institution_id =$request->institution_id;

    $course_id = $id;
    $check_course_accessibility_by_teacher = $this->check_course_accessibility_by_teacher($course_id,$user_id);
    if($check_course_accessibility_by_teacher){
    $course_content_id = $content_id;
    $course_content_quiz_id = $quiz_id;
    $course_details = Course::where('id',$course_id)->first();
    $course_content_details = CourseContent::where('id',$course_content_id)->first();
    $course_content_quiz_details = Quiz::where('id',$course_content_quiz_id)->first();

    //  echo "<pre>";
    $all_q_id_array = explode(',', $course_content_quiz_details->all_questions);

   //$user_id = Auth::id();




   $data7=Question::
   orderBy('id','desc')
    ->whereIn('id',$all_q_id_array)
   ->when($request->has("question_text"),function($q)use($request){



          $question_text  = $request->get("question_text");
          if($question_text!='')
           {
              return $q->where("question_text","like","%".$question_text."%");
          }


  })->select('*')->get();



    $thearray = [];
    if(count($data7) > 0)
    {
       foreach($data7 as $k2=>$v2)
       {


                   $thearray[]=array(
                       'question_text'=>substr(strip_tags($v2->question_text),0,40)
                      ,'status'=>$v2->status
                       ,'answer'=>$v2->answer
                        ,'marks'=>$v2->marks


                       ,'id'=>$v2->id
                   );

       }
    }

  $data = $this->paginate_coursequizequestion($thearray,$course_id,$course_content_id,$course_content_quiz_id);







       if($request->ajax()){
           return view('theme.teacher.coursequestion-pagination',['questions'=>$data,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_content_quiz_id'=>$course_content_quiz_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'course_content_quiz_details'=>$course_content_quiz_details,'user_id'=>$user_id,'institution_id'=>$institution_id]);
       }
       return view('theme.teacher.coursequestion',['questions'=>$data,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_content_quiz_id'=>$course_content_quiz_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'course_content_quiz_details'=>$course_content_quiz_details,'user_id'=>$user_id,'institution_id'=>$institution_id]);

    }
    else{
        return view('theme.teacher.no_access_course');
    }


}
public function paginate_coursequizequestion($items, $course_id='', $course_content_id='',$course_content_quiz_id='',$perPage = 10, $page = null, $options = [])
{
    $options = ['path' => Route('teachercoursecontentquizequestion',['id'=>$course_id,'content_id'=>$course_content_id,'quiz_id'=>$course_content_quiz_id])] ;

    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
}


public function questionstore(Request $request)
{
  $v = Validator::make($request->all(),[
        'question_text_value' =>'required',
        'option_a_value' =>'required',
        'option_b_value' =>'required',
        'option_c_value' =>'required',
        'option_d_value' =>'required',
        'answer' =>'required',
        'marks' => 'required',
        'status' =>'required',


   ]);

    if ($v->fails())
    {
       //return redirect()->route('create.category')->withInput()->with('error',$v->messages());

      //return redirect()->back()->withErrors($v)->withInput();
        return response()->json([
            'type'=>'error',
            'message' => $v->errors()->all()
        ]);

    }
    else
    {
        $question_text='';
        if($request->question_text_value!='')
        {
            $question_text=$request->question_text_value;
        }
        $option_a='';
        if($request->option_a_value!='')
        {
            $option_a=$request->option_a_value;
        }
        $option_b='';
        if($request->option_b_value!='')
        {
            $option_b=$request->option_b_value;
        }
        $option_c='';
        if($request->option_c_value!='')
        {
            $option_c=$request->option_c_value;
        }
        $option_d='';
        if($request->option_d_value!='')
        {
            $option_d=$request->option_d_value;
        }


     //$created_by = Auth::id();
     $created_by = $request->user_id;
     $question = new Question();
        $question->question_text = $question_text;
        $question->option_a = $option_a;
        $question->option_b = $option_b;
        $question->option_c = $option_c;
        $question->option_d = $option_d;
        $question->answer = $request->answer;
        $question->marks = $request->marks;
        $question->status = $request->status;
        $question->created_by = $created_by;




             if($question->save()){
              $question_id = $question->id;
              $course_content_quiz_id = $request->course_content_quiz_id;
              $quiz = Quiz::where('id',$course_content_quiz_id)->first();
               $question_id_string = $quiz->all_questions;

               if($question_id_string !='')
               {
                $question_id_array = explode(',',$question_id_string);
                array_push($question_id_array,$question_id);
                $final_str = implode(',',$question_id_array);
               }
               else{
                $final_str = $question_id;
               }

               $quiz->all_questions = $final_str;
               $quiz->save();
              Session::flash('success', 'successfully question  added!');

             return response()->json([
                'type' => 'success',
              'message' => 'successfully question  added!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                'type' => 'error',
                  'message' => 'Something wrong!',

                ]);
        }
    }
}

public function questionView($id)
{
     $question = Question::find($id);

    return json_encode(array('status'=>'ok','data'=>$question));


}



public function questionupdate(Request $request,$id)
    {
        $v = Validator::make($request->all(),[
            'question_text_value' =>'required',
            'option_a_value' =>'required',
            'option_b_value' =>'required',
            'option_c_value' =>'required',
            'option_d_value' =>'required',
            'status' =>'required',



        ]);

        if ($v->fails())
        {

           return redirect()->back()->withErrors($v)->withInput();
        }
        else
        {
            $question_text='';
            if($request->question_text_value!='')
            {
                $question_text=$request->question_text_value;
            }

            $option_a='';
            if($request->option_a_value!='')
            {
                $option_a=$request->option_a_value;
            }
            $option_b='';
            if($request->option_b_value!='')
            {
                $option_b=$request->option_b_value;
            }
            $option_c='';
            if($request->option_c_value!='')
            {
                $option_c=$request->option_c_value;
            }
            $option_d='';
            if($request->option_d_value!='')
            {
                $option_d=$request->option_d_value;
            }

            $answer ='';
            if($request->answer_value !='')
            {
                $answer =$request->answer_value;
            }

            $marks  ='';
            if($request->marks !='')
            {
                $marks  =$request->marks;
            }


            $status='';
            if($request->status!='')
            {
                $status=$request->status;
            }

            // $created_by = Auth::id();
                $created_by = $request->user_id;

        $question = Question::where('id',$id)->first();
         $question->question_text = $question_text;
         $question->option_a = $option_a;
         $question->option_b = $option_b;
         $question->option_c = $option_c;
         $question->option_d = $option_d;
         $question->answer = $answer;
         $question->status = $status;
         $question->marks = $marks;
            $question->created_by = $created_by;

          if($question->save()){


                 Session::flash('success', 'successfully question updated!');

                 return response()->json([
                  'message' => 'successfully question updated!'
                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);

                }
         }

    }


    public function statusquestion($id,$status)
    {
      $data = Question::find($id);
      $data->status = $status;
      $result = $data->save();
      if($result)
      {
        Session::flash('success', 'Status changed successfully!');

             return response()->json([
              'message' => 'Status changed successfully!'
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


    public function questiondestroy($id,$quiz_id)
    {
     $tempvar =Quiz::where('id', $quiz_id)->first();
     $all_question_id_str  = $tempvar->all_questions;
     $all_question_id_array = explode(',',$all_question_id_str);
     $temparray = [];
     $all_questions_temp ='';
     if(count($all_question_id_array) > 0)
     {
         foreach($all_question_id_array as $indv_id)
         {
             if($indv_id!=$id)
             {
                $temparray[] =$indv_id;
             }
         }
     }
     if(!empty($temparray))
     {
        $all_questions_temp = implode(',',$temparray);
     }
     $tempvar->all_questions = $all_questions_temp;
     $tempvar->save();

     //$all_question_id =->foreignId('all_questions')->constrained()->cascadeOnDelete();
     $question = Question::find($id);
     $result =$question->delete();


      if($result)

      {
          Session::flash('error', 'Data deleted successfully!');

          return response()->json([
            'message' => 'Data deleted successfully!'
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

     // start institution //

     public function institutionview(Request $request)
     {
        $user_id = Auth::id();

        $institutions=User::
           where(['users.status'=>'active','users.role'=>'3'])

           ->orderBy('users.name','asc')

           ->select('users.*')->get();
          // dd($institutions);
          $thearray = [];
               if(count($institutions) > 0)
               {
                  foreach($institutions as $k2=>$v2)
                  {
                       $thearray[]=array(
                          'id'=>$v2->id
                          ,'name'=>$v2->name
                          ,'email'=>$v2->email
                          ,'avatar'=>$v2->avatar


                      );

                  }
               }


         $data = $this->paginate_institutionview($thearray);
         //dd($data);

        if($request->ajax()){
            return view('theme.teacher.institution-page-pagination',['institutions'=>$data]);
        }
        return view('theme.teacher.institution-page',['institutions'=>$data]);



     }

 public function paginate_institutionview($items, $perPage = 10, $page = null, $options = [])
 {
     $options = ['path' => Route('institutionview')] ;

     $page = $page ?: (Paginator::resolveCurrentPage() ?: 3);
     $items = $items instanceof Collection ? $items : Collection::make($items);
     return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
 }


 public function institutioninvitation(Request $request)
     {
         $user_id = Auth::id();
         $data7_private_receiving=RequestDetails::leftJoin('users', 'request_details.sender_id', '=', 'users.id')
         ->where(['request_details.type'=>'Institution_Teacher','request_details.sender_type'=>'Institution','request_details.receiver_type'=>'Teacher','request_details.receiver_id'=>$user_id,'request_details.status'=>'Pending','users.status'=>'active','users.role'=>'3'])
         ->orderBy('request_details.created_at','desc')

            ->select('users.*','request_details.created_at as crtime')->get();
            //dd($data7_private_receiving);

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
            return view('theme.teacher.institution-invitation-pagination',['private_receiving'=>$private_receiving]);
        }
        return view('theme.teacher.institution-invitation',['private_receiving'=>$private_receiving]);



     }
     public function paginate_private_receiving_it($items, $perPage = 1, $page = null, $options = [])
     {
         $options = ['path' => Route('institutioninvitation')] ;

         $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
         $items = $items instanceof Collection ? $items : Collection::make($items);
         return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
     }

     //end institution //

     //assign course //

     public function courseassignlist(Request $request)
     {

                if($request->institution_id == null) {
                    $institution_id = $_GET['institution_id'];
                } else {
                    $institution_id = $request->institution_id;
                }

            // dd($institution_teachers);

            if($request->user_id == null) {
                $teacher_id = $_GET['user_id'];
            } else {
                $teacher_id = $request->user_id;
            }

       $data7 = CourseTeacher::leftJoin('users','users.id','=','course_teachers.user_id')->leftJoin('courses','courses.id','=','course_teachers.course_id')->where(['course_teachers.user_id'=>$teacher_id])->select('course_teachers.*','courses.id as courses_id','courses.title','users.id as users_id','users.name')->get();
        // dd($data7);

          $thearray = [];
         if(count($data7) > 0)
         {
            foreach($data7 as $k2=>$v2)
            {



        $thearray[]=array(
                                'title'=>$v2->title
                                ,'course_id'=>$v2->course_id
                                ,'created_by'=>$v2->created_by
                                ,'name'=>$v2->name
                                ,'status'=>$v2->status

                                ,'id'=>$v2->id
                            );


            }
         }

       $data = $this->paginate_courseassignlist($thearray);

       if($request->ajax()){
           return view('theme.teacher.assigncourse-pagination',['course_teachers'=>$data]);
       }
       return view('theme.teacher.assigncourse',['course_teachers'=>$data]);



    }


    public function paginate_courseassignlist($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('courseassignlist')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
     public function courseassignapprove(Request $request, $id)
     {
         //dd($id);
      $data = CourseTeacher::findorfail($id);
      //dd($data);

      $data->status = 'approve'; //Approved
      $data->save();




      return redirect()->back(); //Redirect user somewhere
   }

   public function courseassigndecline(Request $request, $id)
   {
      $data = CourseTeacher::findorfail($id);
      $data->status = 'reject'; //Declined
      $data->save();



      return redirect()->back(); //Redirect user somewhere
   }

}
