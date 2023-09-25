<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Course;
use App\Models\InstitutionAdmin;
use App\Models\Institution;
use App\Models\InstitutionTeacher;
use App\Models\CourseTeacher;
use App\Models\CourseComment;
use App\Models\CourseContent;
use App\Models\CourseSubscription;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\UserDetail;
use App\Models\Country;
use App\Models\City;
use App\Models\Theme;
use App\Models\InstitutionTheme;
use App\Models\RequestDetails;
use App\Models\InstitutionStudent;
use App\Models\online_classe;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\InstitutionSubcriptionPackage;
use App\Models\InstitutionCompanySetting;
use App\Models\InstitutionSystemSetting;
use App\Models\InstitutionBannerSetting;

use App\Models\InstitutionSubcription;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Faq;
use App\Models\UserVisitor;

use File;
use Session;

use Illuminate\Support\Str;


use Illuminate\Support\Facades\Stroage;
use DB;

use App\Models\Message;

use Mail;
use App\Mail\NotifyMail;


use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class InstitutionLoginController extends Controller
{

    public function institutionprofile(Request $request)
    {
        // $user = Auth::user();
        // //dd($user);
        // $user_id=Auth::id();

        //echo $_GET['institution_id']; exit;
            if($request->institution_id == null) {
                $user_id = $_GET['institution_id'];
            } else {
                $user_id = $request->institution_id;
            }
//userstable id//
            if($request->user_id == null) {
                $user_ids = $_GET['user_id'];
            } else {
                $user_ids = $request->user_id;
            }

        //dd($user_id);


        $institution_id = InstitutionAdmin::where('institution_id',$user_id)->first()->institution_id;


        $institution_details = Institution::where('id',$institution_id)->first();

        $user_details = UserDetail::where('institution_id',$institution_id)->first();

        $themes = Theme::orderBy('theme_name','asc')->get();
        $institution_theme_details = InstitutionTheme::where('institution_id',$institution_id)->first();



         return view('theme.institution.profile',['user_details'=>$user_details,'institution_details'=>$institution_details,'themes'=>$themes,'institution_theme_details'=>$institution_theme_details,'user_id'=>$user_id,'user_ids'=>$user_ids]);

    }

public function institutionmessage(Request $request)
    {

                // $user_id=Auth::id();
                if($request->institution_id == null) {
                    $user_id = $_GET['institution_id'];
                } else {
                    $user_id = $request->institution_id;
                }
            //userstable id//
                if($request->user_id == null) {
                    $user_ids = $_GET['user_id'];
                } else {
                    $user_ids = $request->user_id;
                }


      return view('theme.institution.message',['user_id'=>$user_id,'user_ids'=>$user_ids]);

    }

    public function sendmessagechatforinstitutionstudent(Request $request)
    {

                //    $user_id=Auth::id();
                        // $user_id=Auth::id();
                        $user_id =$request->user_id;

                        $user_ids =$request->user_ids;

       $institution_id = InstitutionAdmin::where('institution_id',$user_id)->first()->institution_id;

       $student_id = $request->post("student_id");
       $contents = $request->post("send_message_text");

        $message = new Message();
          $message->sender_id = $institution_id;
          $message->sender_type = 'Institution';
          $message->receiver_id = $student_id;
          $message->receiver_type = 'Student';
          $message->contents = $contents;
          $message->created_by = $user_id;

          $message->save();

           $sender_details = User::where(['id'=>$user_id])->first();
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

     public function getmessagechatforinstitutionstudent(Request $request)
    {


                        // $user_id=Auth::id();
                        $user_id =$request->user_id;

                        $user_ids =$request->user_ids;

       $student_id = $request->post("student_id");
       $institution_id = InstitutionAdmin::where('institution_id',$user_id)->first()->institution_id;


       $institution_details = Institution::where('id',$institution_id)->first();

       $student_details = User::where('id',$student_id)->first();


        $data7_public=Message::whereRaw(' ((messages.sender_id="'.$institution_id.'" and messages.sender_type="Institution" and messages.receiver_id="'.$student_id.'" and messages.receiver_type="Student") or (messages.sender_id="'.$student_id.'" and messages.sender_type="Student" and messages.receiver_id="'.$institution_id.'" and messages.receiver_type="Institution")) ')
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


             $institution_name = 'Me';
             if($institution_details->logo!='')
             {
                $institution_logo = asset($institution_details->logo);
             }
             else
             {
                $institution_logo = asset('assets/img/icons/activities/drinking.svg');
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




       return response()->json(['success'=>'success','user_id'=>$user_id,'student_id'=>$student_id,'data'=>$thearray_public,'institution_name'=>$institution_name,'institution_logo'=>$institution_logo,'student_name'=>$student_name,'student_avatar'=>$student_avatar,'user_ids'=>$user_ids]);
   }

    public function getstudentlistforinstitutionmessage(Request $request)
    {

         $user_id =$request->user_id;

         $user_ids =$request->user_ids;
    //    $institution_id = InstitutionAdmin::where('institution_id',$user_id)->first()->institution_id;

       $student_search_text = $request->post("student_search_text");



            $data7_public=InstitutionStudent::leftJoin('users','users.id','=','institution_students.user_id')->Join('institutions', 'institutions.id','=','institution_students.institution_id')
            ->where(['institution_students.institution_id'=>$user_id])
            ->orderBy('users.name','asc')->select('users.*')->get();

            echo"<pre>";
             print_r($data7_public);




            // ->when($request->has("student_search_text"),function($q)use($request){
            //        $name  = $request->post("student_search_text");
            //        if($name!='')
            //         {
            //            return $q->where("users.name","like","%".$name."%");
            //        }


            // })->select('users.*')->get();

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



       return response()->json(['success'=>'success','user_id'=>$user_id,'student_search_text'=>$student_search_text,'data'=>$thearray_public,'user_ids'=>$user_ids]);


    }
 public function profileupdate(Request $request)
    {



         $validator = Validator::make($request->all(), [

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
            $user = Auth::user();
            $user_id=$user->id;

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

    public function institutionupdate(Request $request)
    {



         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',

        ]);

        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            //$user = Auth::user();
            $user_id =$request->user_id;
            //dd($user_id);
            // $user = User::where('id',$user_id)->first();
            //  $user->name = $request->input('name');
            //  $user->save();




             $slug = Str::slug($request->input('name'));

             $created_by =  $user_id;
             $logo=$request->old_logo;

            if($request->hasfile('logo'))
            {
                // if($request->old_logo!=''){
                // unlink(public_path().'/'.$request->old_logo);
                // }
                    $image=$request->file('logo') ;


                     $originName = $image->getClientOriginalName();
                     $fileName = pathinfo($originName, PATHINFO_FILENAME);
                     $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

                     $extension = $image->getClientOriginalExtension();
                     $fileName = $created_by.'_'.$fileName.'_'.time().'.'.$extension;

                     if (in_array($extension,['png','jpg','jpeg']))
                     {
                         $image->move(public_path().'/images/logo/institution/', $fileName);

                           //  echo '<br>attachment_1='.$attachment_1;


                                 $attachment_1 =  'images/logo/institution/'.$fileName;
                                  //echo '<br>inside attachment_1='.$attachment_1;
                                  $logo = $attachment_1;




                     }




            }

             $institution_id = InstitutionAdmin::where('institution_id',$user_id)->first()->institution_id;
            //dd($institution_id);
            $institution_details = Institution::where('id',$institution_id)->first();
            //dd($institution_details);

            if($logo!='')
            {
                 $institution_details->logo = $logo;
            }

            $institution_details->name = $request->name;
            $institution_details->slug = $slug;
            $institution_details->save();


            $theme_id=$request->input('theme_id');

            $institution_theme_details = InstitutionTheme::where('institution_id',$institution_id)->first();
            $institution_theme_details->theme_id =$theme_id ;
            $institution_theme_details->save();


            //Session::set('institute_name', $institution_details->name);
            session()->put('institute_name', $institution_details->name);

            return redirect()->back()->with('message', 'Successfully update institution profile!');
        }


    }
     public function ajaxImageUploadPost(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
      ]);


      if ($validator->passes()) {


         if($request->hasFile('image')) {
            $user_id = Auth::id();

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
        if($request->institution_id == null) {
            $user_id = $_GET['institution_id'];
        } else {
            $user_id = $request->institution_id;
        }


            //userstable id//
            if($request->user_id == null) {
                $user_ids = $_GET['user_id'];
            } else {
                $user_ids = $request->user_id;
            }

        //$user_id=Auth::id();
        $categories = Category::where('institution_id',$user_id)->orderBy('name','asc')->get();


        $user_details = UserDetail::where('institution_id',$user_id)->first();

        $current_date = date('Y-m-d H:i:s');
        $subscription_end_date = $user_details->subscription_end_date;

        // if(strtotime($current_date) > strtotime($subscription_end_date)){
        //     return redirect()->route('noaccess');

        // }



        $institution_id = InstitutionAdmin::where('institution_id',$user_id)->first()->institution_id;


        $data7=Course::leftJoin('categories', 'categories.id', '=', 'courses.category_id')->where('courses.institution_id',$institution_id)->orderBy('courses.id','desc')
      ->select('courses.*','categories.name as category_name')
        ->get();

         //dd($data7);

        //$users = User::where('created_at', '>=', $date)->get();

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
                            , 'students_limit'=>$v2->students_limit
                            , 'visibility'=>$v2->visibility
                            , 'is_fully_complete'=>$v2->is_fully_complete
                            , 'type'=>$v2->type
                            ,'start_date'=>date('Y-m-d',strtotime($v2->start_date))
                            ,'end_date'=>date('Y-m-d',strtotime($v2->end_date))
                            , 'total_subscription'=>$v2->total_subscription

                            ,'id'=>$v2->id
                        );

            }
         }


       return view('theme.institution.course',['courses'=>$thearray,'categories'=>$categories,'user_id'=>$user_id,'user_ids'=>$user_ids]);



    }


    public function store(Request $request)
    {

                        $v = Validator::make($request->all(),[
                            'title' => 'required',
                            'status' =>'required',
                            'category_id' =>'required',
                            'students_limit' =>'required',
                            'start_date' =>'required',
                            'end_date' =>'required',
                            'price' =>'required',
                            'visibility' =>'required',
                            'type' =>'required',



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
                        $preview_image='';

                        $preview_video='';
                        if($request->preview_video!='')
                        {
                        $preview_video=$request->preview_video;
                        }

                        $visibility=1;
                        if($request->visibility!='')
                        {
                        $visibility=$request->visibility;
                        }

                        $tags='';
                        if($request->tags!='')
                        {
                        $tags=$request->tags;
                        }

                        $price=0;
                        if($request->price!='')
                        {
                            $price=$request->price;
                        }





                        $created_by = $request->user_ids;

                        $slug = Str::slug($request->input('title'));

                        if($request->hasfile('preview_image'))
                        {
                                $image=$request->file('preview_image') ;


                            $originName = $image->getClientOriginalName();
                            $fileName = pathinfo($originName, PATHINFO_FILENAME);
                            $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

                            $extension = $image->getClientOriginalExtension();
                            $fileName = $created_by.'_'.$fileName.'_'.time().'.'.$extension;

                            if (in_array($extension, ['png','jpg','jpeg',]))
                            {
                                $image->move(public_path().'/frontend/course/previewimage/', $fileName);

                                //  echo '<br>attachment_1='.$attachment_1;


                                        $attachment_1 =  'frontend/course/previewimage/'.$fileName;
                                        //echo '<br>inside attachment_1='.$attachment_1;
                                        $preview_image = $attachment_1;




                            }




                    }


                            $course = new Course();
                            $course->title = $request->title;
                            $course->slug = $slug;
                            $course->status = $request->status;
                            $course->created_by = $created_by;
                            $course->user_id = $created_by;
                            $course->institution_id = $request->user_id;
                            $course->category_id = $request->category_id;
                            $course->description =  $description;
                            $course->students_limit =  $request->students_limit;
                            $course->price =  $price;
                            $course->type = $request->type;
                            $course->preview_image = $preview_image;
                            $course->preview_video = $preview_video;
                            $course->start_date = $request->start_date;
                            $course->end_date = $request->end_date;
                            $course->visibility =  $visibility;
                            $course->tags =  $tags;


                    //          echo "<pre>";
                    //  print_r($course);

                            if($course->save()){
                                // $course_id = $course->id;
                                // $course_teacher = new CourseTeacher();
                                // $course_teacher->course_id = $course_id;
                                // $course_teacher->user_id= $request->teacher_id;
                                // $course_teacher->created_by = Auth::id();
                                // $course_teacher->save();


                                Session::flash('success', 'successfully course added!');

                                return response()->json([
                                    'type' => 'success',
                                'message' => 'successfully course added!'
                                ]);
                            }else{
                                Session::flash('error', 'Something wrong!');
                                return response()->json([
                                    'type' => 'error',
                                    'message' => 'Something wrong!',
                                    'category' => $categories
                                    ]);
                            }
                        }
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

public function courseView($id)
{
    $courses = Course::find($id);
    $preview_image_temp = $courses->preview_image;
    $preview_image = asset('assets/img/icons/activities/drinking.svg');
    if($preview_image_temp!='' && file_exists($preview_image_temp))
    {
        $preview_image = asset($preview_image_temp);

    }
    $asset_path = asset('');
    $course_teachers_result = CourseTeacher::leftJoin('users','users.id','=','course_teachers.user_id')->where(['course_id'=>$id])->select('users.name','users.id')->get();

    // $teacher_id = $courses->users->name;


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

    return json_encode(array('status'=>'ok','data'=>$courses,'course_teachers_user_id'=>$course_teachers_user_id,'category_name'=>$category_name,'asset_path'=>$asset_path,'course_teacher_ids'=>$course_teacher_id,'preview_image'=>$preview_image));


}



    public function courcecommissionpercentage(Request $request, $id)
    {
        $data = [];
        $course_teachers=CourseTeacher::where(['course_id'=>$id])->leftJoin('users','users.id','=','course_teachers.user_id')->select('users.name','users.id','course_teachers.commission_percentage')->get();
         return json_encode(array('status'=>'ok','data'=>$course_teachers,'id'=>$id));
    }

    public function courcecommissionpercentagesave(Request $request, $course_id,$str)
    {
        $data = [];
        //$course_teachers=CourseTeacher::where(['course_id'=>$id])->leftJoin('users','users.id','=','course_teachers.user_id')->select('users.name','users.id','course_teachers.commission_percentage')->get();
        $all_teacher_id_percentage_array = explode('::',$str);
        if(count($all_teacher_id_percentage_array) > 0)
        {
            foreach($all_teacher_id_percentage_array as $all_teacher_id_percentage)
            {
                $temp_array = explode('@@',$all_teacher_id_percentage);
                $user_id = $temp_array[0];
                $commission_percentage = $temp_array[1];
                $course_teacher=CourseTeacher::where(['course_id'=>$course_id,'user_id'=>$user_id])->first();
                $course_teacher->commission_percentage = (int)$commission_percentage;
                $course_teacher->save();
            }
        }

         return json_encode(array('status'=>'ok','message'=>'Successfully Saved'));
    }

  public function destroy($id)
  {


        $course_teacher = CourseTeacher::where('course_id', '=', $id)->delete();
        $course_comment = CourseComment::where('course_id', '=', $id)->delete();
        $course_content = CourseContent::where('course_id', '=', $id)->delete();
        $course_subscription = CourseSubscription::where('course_id', '=', $id)->delete();
        $courses = Course::find($id);
        //$courses = Course::findOrFail($id);

        //$courses =->foreignId('user_id')->constrained()->cascadeOnDelete();
        $result =$courses->delete();

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

public function update(Request $request, Course $course,$id)
{



                        $v = Validator::make($request->all(),[
                            'title' => 'required',

                            'status' =>'required',
                            'category_id' =>'required',
                            'students_limit' =>'required',
                            'start_date' =>'required',
                            'end_date' =>'required',
                            'price' =>'required',
                            'visibility' =>'required',
                            'type' =>'required',


                        ]);

                        if ($v->fails())
                        {
                        //return redirect()->route('create.category')->withInput()->with('error',$v->messages());
                        return redirect()->back()->withErrors($v)->withInput();
                        }
                        else
                        {
                            $description='';
                            if($request->description_value!='')
                            {
                                $description=$request->description_value;
                            }
                            $students_limit='';
                            if($request->students_limit!='')
                            {
                                $students_limit=$request->students_limit;
                            }
                            $price=0;
                            if($request->price!='')
                            {
                                $price=$request->price;
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
                            $category_id='';
                            if($request->category_id!='')
                            {
                                $category_id=$request->category_id;
                            }



                            $is_fully_complete='';
                            if($request->is_fully_complete!='')
                            {
                                $is_fully_complete=$request->is_fully_complete;
                            }




                            $visibility='';
                            if($request->visibility!='')
                            {
                                $visibility=$request->visibility;
                            }

                            $tags='';
                            if($request->tags!='')
                            {
                                $tags=$request->tags;
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
                            $preview_video='';
                            if($request->preview_video!='')
                            {
                                $preview_video=$request->preview_video;
                            }



                            $created_by = $request->user_ids;

                $preview_image=$request->old_preview_image;

                if($request->hasfile('preview_image'))
                {
                $image=$request->file('preview_image') ;
                $originName = $image->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

                $extension = $image->getClientOriginalExtension();
                $extensioncheck = strtolower($extension);
                $fileName = $created_by.'_'.$fileName.'_'.time().'.'.$extension;

                if(in_array($extensioncheck, ['png','jpg','jpeg']))
                {

                    if($image->move(public_path().'/frontend/course/previewimage/', $fileName))
                    {



                        if($request->old_preview_image!='')
                        {
                            if(file_exists(public_path().'/'.$request->old_preview_image))
                            {
                            unlink(public_path().'/'.$request->old_preview_image);
                            }
                        }

                        $attachment_1 =  'frontend/course/previewimage/'.$fileName;
                        $preview_image = $attachment_1;
                    }

                }
                else
                {
                    return response()->json(['status'=>'error','error'=>'Please  upload png / jpg/ jpeg format preview image']);
                }

                }
                        $slug = Str::slug($request->input('title'));




                $course =  Course::where('id',$id)->first();
                    $course->title = $request->title;
                    $course->status = $status;

                    $course->slug = $slug;
                    $course->description = $description;
                    $course->category_id = $category_id;
                    $course->students_limit = $students_limit;
                    $course->price = $price;
                    $course->type = $type;
                    $course->start_date = $start_date;
                    $course->end_date = $end_date;
                    $course->preview_image = $preview_image;

                    $course->preview_video = $preview_video;
                    $course->visibility = $visibility;
                    $course->is_fully_complete = $is_fully_complete;
                    $course->tags = $tags;
                    //$course =  CourseTeacher::where('id',$id)->first();



                    if($course->save()){
                        $course_id = $course->id;
                        //course_teachers_user_id



                        Session::flash('success', 'successfully course updated!');

                        return response()->json([
                        'message' => 'successfully course updated!'
                        ]);
                    }else{
                        Session::flash('error', 'Something wrong!');
                        return response()->json([
                            'message' => 'Something wrong!'
                            ]);

                        }
                }

}

public function student(Request $request)
    {
        //return view('theme.institution.student');
         $user_id = Auth::id();
         $institution_id = InstitutionAdmin::where('institution_id',$user_id)->first()->institution_id;

          $data7_public=InstitutionStudent::leftJoin('users', 'institution_students.user_id', '=', 'users.id')
         ->where(['institution_students.institution_id'=>$institution_id,'users.status'=>'active','users.role'=>'1'])
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
         ->where(['request_details.type'=>'Institution_Student','request_details.sender_type'=>'Institution','request_details.sender_id'=>$user_id,'request_details.receiver_type'=>'Student','request_details.status'=>'Pending','users.status'=>'active','users.role'=>'1'])
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

                $institution_students_user_id = InstitutionStudent::where(['institution_id'=>$institution_id])->select('user_id')->get();
                if(!empty($institution_students_user_id))
                {
                    foreach($institution_students_user_id as $institution_students_user_id_value)
                    {
                        array_push($exclude_array,$institution_students_user_id_value->user_id);
                    }
                }

                $request_details_user_id_1 = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Institution','receiver_type'=>'Student'])->select('receiver_id')->get();
                if(!empty($request_details_user_id_1))
                {
                    foreach($request_details_user_id_1 as $request_details_user_id_1_value)
                    {
                        array_push($exclude_array,$request_details_user_id_1_value->receiver_id);
                    }
                }

                $request_details_user_id_2 = RequestDetails::where(['receiver_id'=>$user_id,'sender_type'=>'Student','receiver_type'=>'Institution'])->select('sender_id')->get();
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
         ->where(['request_details.type'=>'Institution_Student','request_details.sender_type'=>'Student','request_details.receiver_id'=>$user_id,'request_details.sender_type'=>'Student','request_details.status'=>'Pending','users.status'=>'active','users.role'=>'1'])
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
                   return view('theme.institution.student-private-pending-pagination',['private_pending'=>$private_pending]);
                }
                else if($request->get("tab_type")=='private_sending')
                {
                   return view('theme.institution.student-private-sending-pagination',['private_sending'=>$private_sending]);
                }
                else if($request->get("tab_type")=='private_receiving')
                {
                   return view('theme.institution.student-private-receiving-pagination',['private_receiving'=>$private_receiving]);
                }
                else if($request->get("tab_type")=='public')
                {
                   return view('theme.institution.student-public-pagination',['public'=>$public]);
                }




           }
           return view('theme.institution.student',['private_pending'=>$private_pending,'private_sending'=>$private_sending,'private_receiving'=>$private_receiving,'public'=>$public]);
    }
    public function paginate_public($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institutionstudent')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_pending($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institutionstudent')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_sending($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institutionstudent')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_receiving($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institutionstudent')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    public function teacher(Request $request)
    {
        //return view('theme.institution.teacher');
         $user_id = Auth::id();
         $institution_id = InstitutionAdmin::where('user_id',$user_id)->first()->institution_id;

          $data7_public=InstitutionTeacher::leftJoin('users', 'institution_teachers.user_id', '=', 'users.id')
         ->where(['institution_teachers.institution_id'=>$institution_id,'users.status'=>'active','users.role'=>'2'])
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
         ->where(['request_details.type'=>'Institution_Teacher','request_details.sender_type'=>'Institution','request_details.sender_id'=>$user_id,'request_details.receiver_type'=>'Teacher','request_details.status'=>'Pending','users.status'=>'active','users.role'=>'2'])
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

                $Institution_teachers_user_id = InstitutionTeacher::where(['institution_id'=>$institution_id])->select('user_id')->get();
                if(!empty($Institution_teachers_user_id))
                {
                    foreach($Institution_teachers_user_id as $Institution_teachers_user_id_value)
                    {
                        array_push($exclude_array,$Institution_teachers_user_id_value->user_id);
                    }
                }

                $request_details_user_id_1 = RequestDetails::where(['sender_id'=>$user_id,'sender_type'=>'Institution','receiver_type'=>'Teacher'])->select('receiver_id')->get();
                if(!empty($request_details_user_id_1))
                {
                    foreach($request_details_user_id_1 as $request_details_user_id_1_value)
                    {
                        array_push($exclude_array,$request_details_user_id_1_value->receiver_id);
                    }
                }

                $request_details_user_id_2 = RequestDetails::where(['receiver_id'=>$user_id,'sender_type'=>'Teacher','receiver_type'=>'Institution'])->select('sender_id')->get();
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

           $private_sending = $this->paginate_private_sending_it($thearray_private_sending);


            /*
           $data7_private_receiving=RequestDetails::leftJoin('users', 'request_details.sender_id', '=', 'users.id')
         ->where(['request_details.type'=>'Institution_Teacher','request_details.sender_type'=>'Teacher','request_details.receiver_id'=>$user_id,'request_details.status'=>'Pending','users.status'=>'active','users.role'=>'2'])
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
            */

           if($request->ajax()){
                if($request->get("tab_type")=='private_pending')
                {
                   return view('theme.institution.teacher-private-pending-pagination',['private_pending'=>$private_pending]);
                }
                else if($request->get("tab_type")=='private_sending')
                {
                   return view('theme.institution.teacher-private-sending-pagination',['private_sending'=>$private_sending]);
                }

                else if($request->get("tab_type")=='public')
                {
                   return view('theme.institution.teacher-public-pagination',['public'=>$public]);
                }




           }
           return view('theme.institution.teacher',['private_pending'=>$private_pending,'private_sending'=>$private_sending,'public'=>$public]);
    }

    public function coursecontent(Request $request,$id)
    {
       $course_id = $id;
        $user_id = $request->user_id;
            //dd($user_id);
           $check_course_accessibility_by_institution = $this->check_course_accessibility_by_institution($course_id,$user_id);

           if($check_course_accessibility_by_institution){
            $course_details = Course::where('id',$course_id)->first();
            //dd($course_details);
        $type = $course_details["type"];
        //$user_id = Auth::id();

        $existforthisuser=Course::leftJoin('course_contents', 'course_contents.course_id', '=', 'courses.id')
        ->get()->count();
        //dd($existforthisuser);



          if($existforthisuser < 1)
          {
            return redirect()->route('institutioncourse')->with('error', 'No access!');
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




                        return view('theme.institution.coursecontent',['coursecontents'=>$thearray,'course_id'=>$course_id,'type'=>$type,'course_details'=>$course_details,'user_id'=>$user_id]);
        }
        else{
            return view('theme.institution.no_access_course');
        }
    }

     public function institutioncourseView($id)
    {
        $course_content = CourseContent::leftJoin('courses','courses.id','=','course_contents.course_id')->select('courses.title as course_title','course_contents.*')->where(['course_contents.id'=>$id])->first();


       return json_encode(array('status'=>'ok','data'=>$course_content));


    }
        // Course Content  Quiz Start ///
    public function coursequize(Request $request,$id,$content_id)
    {
        $course_id = $id;
        $user_id = $request->user_id;
        $check_course_accessibility_by_institution = $this->check_course_accessibility_by_institution($course_id, $user_id);
        if($check_course_accessibility_by_institution){
        $course_content_id = $content_id;
       //dd($course_content_id);
        $course_details = Course::where('id',$course_id)->first();
        $course_content_details = CourseContent::where('id',$course_content_id)->first();
        //dd($course_content_details);
        // $user_id = Auth::id();
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
           return view('theme.institution.coursequize',['quizes'=>$thearray,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'user_id'=>$user_id]);

        }
        else{
            return view('theme.institution.no_access_course');
        }

    }
    public function paginate_coursequize($items, $course_id='', $course_content_id='',$perPage = 1, $page = null, $options = [])
    {
        $options = ['path' => Route('institutioncoursecontentquize',['id'=>$course_id,'content_id'=>$course_content_id])] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function quizView($id)
    {
         $quiz = Quiz::find($id);

        return json_encode(array('status'=>'ok','data'=>$quiz));


    }

      // Course Content  Quiz Question  Start ///
    public function coursequizequestion(Request $request,$id,$content_id,$quiz_id)
    {

        $course_id = $id;
        $user_id = $request->user_id;
        $check_course_accessibility_by_institution = $this->check_course_accessibility_by_institution($course_id,$user_id);
        if($check_course_accessibility_by_institution){
        $course_content_id = $content_id;
        $course_content_quiz_id = $quiz_id;
        $course_details = Course::where('id',$course_id)->first();
        $course_content_details = CourseContent::where('id',$course_content_id)->first();
        $course_content_quiz_details = Quiz::where('id',$course_content_quiz_id)->first();

        //  echo "<pre>";
        $all_q_id_array = explode(',', $course_content_quiz_details->all_questions);






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
                           'question_text'=>substr(strip_tags($v2->question_text),0,5)
                          ,'status'=>$v2->status
                           ,'answer'=>$v2->answer
                            ,'marks'=>$v2->marks


                           ,'id'=>$v2->id
                       );

           }
        }



           return view('theme.institution.coursequestion',['questions'=>$thearray,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_content_quiz_id'=>$course_content_quiz_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'course_content_quiz_details'=>$course_content_quiz_details,'user_id'=>$user_id]);

        }

else{
            return view('theme.institution.no_access_course');
        }

    }
    public function paginate_coursequizequestion($items, $course_id='', $course_content_id='',$course_content_quiz_id='',$perPage = 1, $page = null, $options = [])
    {
        $options = ['path' => Route('institutioncoursecontentquizequestion',['id'=>$course_id,'content_id'=>$course_content_id,'quiz_id'=>$course_content_quiz_id])] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function check_course_accessibility_by_institution($course_id,$user_id = 0)
    {
        //$user_id = Auth::id();


        $course_exist = Course::
        where(['user_id'=>$user_id,'id'=>$course_id])->count();
        if($course_exist ==0)
        {
            return false;
        }
        return true;
    }
    public function questionView($id)
    {
         $question = Question::find($id);

        return json_encode(array('status'=>'ok','data'=>$question));


    }

     public function onlineclassindex(Request $request,$id,$content_id)
    {
        //$user_id = Auth::id();
        $user_id = $request->user_id;

       $course_id = $id;

       $course_content_id = $content_id;

       $course_details = Course::where('id',$course_id)->first();

       $course_content_details = CourseContent::where('id',$course_content_id)->first();


    $data7=online_classe::leftJoin('users', 'users.id', '=', 'online_classes.user_id')->leftJoin('courses', 'courses.id', '=', 'online_classes.course_id')->leftJoin('course_contents', 'course_contents.id', '=', 'online_classes.course_content_id')->orderBy('online_classes.id','desc')->where(['online_classes.course_id'=>$course_id,'online_classes.course_content_id'=>$course_content_id])
   // dd($data7);




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




           return view('theme.institution.onlineclass',['online_classes'=>$thearray,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'user_id'=>$user_id]);


    }

    public function paginate_class($items,$course_id='', $course_content_id='',$perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institutioncourseonline_classes',['id'=>$course_id,'content_id'=>$course_content_id])] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function paginate_coursecontent($items, $course_id='',$perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institutioncoursecontent',['id'=>$course_id])] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function paginate_public_it($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institutionteacher')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function paginate_private_pending_it($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institutionteacher')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    // public function paginate_private_sending_it($items, $perPage = 10, $page = null, $options = [])
    // {
    //     $options = ['path' => Route('institutionteacher')] ;

    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     $items = $items instanceof Collection ? $items : Collection::make($items);
    //     return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    // }
    public function paginate_private_receiving_it($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institutionteacher')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function institutionsubcription(Request $request)
    {

       $user_id=Auth::id();
       $user_details = UserDetail::where('user_id',$user_id)->first();
        $subcription_enddate = $user_details->subscription_end_date;

            $end_date = date('d-m-Y',strtotime($subcription_enddate));
            $institutionsubscriptionpackages=InstitutionSubcriptionPackage::orderBy('institution_subscription_packages.order_no','asc')->select('institution_subscription_packages.*')->get();





        return view('theme.institution.subcription',['user_details'=>$user_details,'subcription_enddate'=>$subcription_enddate,'end_date'=>$end_date,'institutionsubscriptionpackages'=>$institutionsubscriptionpackages]);

    }


    public function institutionsubscriptionpackage($id)
    {





             if(Auth::user())
            {
            $user_id = Auth::user()->id;


            }
            else
            {
                $user_id = 0;
            }


        $institution_subscription_package = InstitutionSubcriptionPackage::where('id',$id)->first();


        /*
        echo "<br>user_id=".$user_id;
        echo "<br>data_exist=".$data_exist;
        echo "<br>total_subscription=".$course->total_subscription;
        echo "<br>students_limitt=".$course->students_limitt;
        echo "<br>role=".Auth::user()->role;
        */


       if(($user_id > 0)  &&  (Auth::user()->role == '3'))
        {

                $current_date = date('Y-m-d H:i:s');
                $user_details = UserDetail::where('user_id',$user_id)->first();
                $subscription_end_date = $user_details->subscription_end_date;
                $days = $institution_subscription_package->days;
                if(strtotime($current_date) >= strtotime($subscription_end_date)){
                    $start_date = $current_date;
                }
                else{
                    $start_date = $subscription_end_date;
                }
                $end_date = date('Y-m-d', strtotime($start_date. ' + '.$days.' days'));


                 $order_details = new Order();
                    $order_details->user_id = $user_id;
                    $order_details->institution_subcription_package_id = $id;
                    $order_details->status = 'Pending';
                    $order_details->total = $institution_subscription_package->price;
                    $order_details->days = $institution_subscription_package->days;
                    $order_details->start_date =$start_date;
                    $order_details->end_date =$end_date;
                    $order_details->type = 'subcription';

                    $order_details->created_by = $user_id;
                    $order_details->save();



             return view('theme.institution.institutionsubscription',['user_id'=>$user_id,'institution_subscription_package'=>$institution_subscription_package,'id'=>$id,'order_details'=>$order_details]);
        }
        else
        {
            return view('theme.institution.institutionsubscriptionnotaccessible',['user_id'=>$user_id,'institution_subscription_package'=>$institution_subscription_package,'id'=>$id]);
        }



    }

    public function order(Request $request)
    {

       $user_id=Auth::id();
      $order_details=Order::leftJoin('institution_subscription_packages','institution_subscription_packages.id','=','orders.institution_subcription_package_id')->where('orders.user_id',$user_id)->where('orders.type','subcription')->where('orders.status','!=','paid')->select('institution_subscription_packages.*','orders.id as order_id','orders.end_date as end_date')->get();
     // dd($order_details);



      return view('theme.institution.orderremove',['order_details'=>$order_details]);

    }

    public function orderdestroy($id)
 {
    $payment = Payment::where('order_id', '=', $id)->delete();
        $order = Order::find($id);
        $result =$order->delete();
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

public function institutionsubcriptionpackagedetail(Request $request)
{

   $user_id=Auth::id();
   $institutionsubscription_details=InstitutionSubcription::leftJoin('institution_subscription_packages','institution_subscription_packages.id','=','institution_subscriptions.institution_subcription_package_id')->where('institution_subscriptions.user_id',$user_id)->select('institution_subscriptions.*','institution_subscription_packages.*')->get();

  //dd($institutionsubscription_details);



  return view('theme.institution.subscribed',['institutionsubscription_details'=>$institutionsubscription_details]);

}

public function noaccesspage(Request $request)
{

     $user_id=Auth::id();

        $institution_id = InstitutionAdmin::where('institution_id',$user_id)->first()->institution_id;


        $institution_details = Institution::where('id',$institution_id)->first();

        $user_details = UserDetail::where('user_id',$user_id)->first();

    return view('theme.institution.noaccess',['user_details'=>$user_details]);

}

// start teacher mangement//

public function institutionteacherview(Request $request)
{
  //    $user_id = Auth::id();
        if($request->institution_id == null) {
            $user_id = $_GET['institution_id'];
        } else {
            $user_id = $request->institution_id;
        }
        //dd($user_id);
    $institution_id = InstitutionAdmin::where('institution_id',$user_id)->first()->institution_id;
    //dd($institution_id);





            $data7_private_sending=User::
        where(['users.status'=>'active','users.role'=>'2'])

        ->orderBy('users.name','asc')
        ->limit(20)
        ->select('users.*')->get();

        // InstitutionTeacher::leftJoin('users', 'institution_teachers.user_id', '=', 'users.id')
        //  ->where(['institution_teachers.institution_id'=>$institution_id,'users.status'=>'active','users.role'=>'2'])
        //  ->orderBy('users.name','asc')
  // dd($data7_private_sending);


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


   return view('theme.institution.teacherpages',['private_sending'=>$data7_private_sending,'user_id'=>$user_id]);



}

public function institutionmyteacher(Request $request)
{
   //$user_id = Auth::id();

        if($request->institution_id == null) {
            $user_id = $_GET['institution_id'];
        } else {
            $user_id = $request->institution_id;
        }

        //userstable id//
        if($request->user_id == null) {
            $user_ids = $_GET['user_id'];
        } else {
            $user_ids = $request->user_id;
        }
        $categories = Category::where('institution_id',$user_id)->orderBy('name','asc')->get();
        $current_date = date('Y-m-d H:i:s');

        $course_lists = Course::where('user_id',$user_id)->orderBy('title','asc')->get();
        $institution_id = InstitutionAdmin::where('institution_id',$user_id)->first()->institution_id;
        $my_teachers=InstitutionTeacher::leftjoin('users','institution_teachers.user_id','=','users.id')->where(['users.status'=>'active','users.role'=>'2','institution_teachers.institution_id'=>$institution_id,'institution_teachers.status'=>'approve',])->select('users.*')->orderBy('users.name','asc')->get();
            // dd($my_teachers);

            $thearray = [];
                if(count($my_teachers) > 0)
                {
                    foreach($my_teachers as $k2=>$v2)
                    {
                        $thearray[]=array(
                            'id'=>$v2->id
                            ,'name'=>$v2->name
                            ,'email'=>$v2->email


                        );

                    }
                }


   return view('theme.institution.myteacher',['my_teachers'=>$thearray,'user_id'=>$user_id,'categories'=>$categories,'course_lists'=>$course_lists,'user_ids'=>$user_ids]);



}

//start teacher request //
public function teachersend(Request $request)
{

                    $v = Validator::make($request->all(),[




                    ]);

                    if ($v->fails())
                    {

                    return response()->json([
                        'type'=>'error',
                        'message' => $v->errors()->all()


                    ]);
                    }
                    else
                    {


                        $created_by = $request->user_id;

                           //$slug = Str::slug($request->input('title'));
                           //$course_id = $course->id;
                            $course_teacher = new CourseTeacher();
                            $course_teacher->course_id =  $request->course_id;
                            $course_teacher->user_id= $request->teacher_id;
                            $course_teacher->created_by = $created_by;
                            $course_teacher->status = 'pending';
                            $course_teacher->save();


                            Session::flash('success', 'successfully assign to course added!');

                            return response()->json([
                                'type' => 'success',
                            'message' => 'successfully assign to course added!'
                            ]);


                    }

                    Session::flash('error', 'Something wrong!');
                            return response()->json([
                                'type' => 'error',
                                'message' => 'Something wrong!',
                                'category' => $categories
                                ]);
}
//end teacher request//

public function institutionteacherrequest(Request $request)
{
   //$user_id = Auth::id();

        if($request->institution_id == null) {
            $user_id = $_GET['institution_id'];
        } else {
            $user_id = $request->institution_id;
        }
  $institution_id = InstitutionAdmin::where('institution_id',$user_id)->first()->institution_id;


  $teacherrequests=RequestDetails::leftjoin('users as u1','request_details.sender_id','=','u1.id')
  ->leftjoin('users as u2','request_details.receiver_id','=','u2.id')
  ->orderBy('u1.name','asc')
  ->where('request_details.type','Institution_Teacher')
  ->select('request_details.*','u1.name as sender_name','u2.name as receiver_name')->get();
     // dd($teacherrequests);

      $thearray = [];
          if(count($teacherrequests) > 0)
          {
             foreach($teacherrequests as $k2=>$v2)
             {
                $thearray[]=array(
                    'id'=>$v2->id,
                    'sender_name'=>$v2->sender_name,
                    'receiver_name'=>$v2->receiver_name,

                    'type'=>$v2->type,
                    'sender_type'=>$v2->sender_type,
                    'sender_id'=>$v2->sender_id ,
                    'receiver_type'=>$v2->receiver_type,
                    'receiver_id'=>$v2->receiver_id ,
                    'status'=>$v2->status,
                    'created_at'=>$v2->created_at
                );

             }
          }



   return view('theme.institution.teacherrequest',['teacherrequests'=>$thearray,'user_id'=>$user_id]);



}


// end teacher mangement//


//start assigned course request //
public function assigncourserequest(Request $request)
{
    if($request->institution_id == null) {
        $user_id = $_GET['institution_id'];
    } else {
        $user_id = $request->institution_id;
    }
    //userstable id//
    if($request->user_id == null) {
        $user_ids = $_GET['user_id'];
    } else {
        $user_ids = $request->user_id;
    }
    $categories = Category::where('institution_id',$user_id)->orderBy('name','asc')->get();
    $current_date = date('Y-m-d H:i:s');
    $course_lists = Course::where('user_id',$user_id)->orderBy('title','asc')->get();
    //dd($course_lists);
   $data_teacher=InstitutionTeacher::leftjoin('users','institution_teachers.user_id','=','users.id')->where(['users.status'=>'active','users.role'=>'2','institution_teachers.institution_id'=>$user_id])->select('users.*')->orderBy('users.name','asc')->get();
   $t2_array =[];
   if(!empty($data_teacher) )
    {
        foreach ($data_teacher as $teacher)
        {
            $t2_array[]= $teacher->id;
        }
    }

  //dd($data_teacher);

     $data7 = CourseTeacher::leftJoin('users','users.id','=','course_teachers.user_id')->leftJoin('courses','courses.id','=','course_teachers.course_id')->where(['course_teachers.created_by'=>$user_id])->select('course_teachers.*','courses.id as courses_id','courses.title','users.id as users_id','users.name')->get();




 //dd($data7);





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


   return view('theme.institution.assigncourserequest',['courses'=>$thearray,'categories'=>$categories,'course_lists'=>$course_lists,'data_teacher'=>$data_teacher,'user_id'=>$user_id,'user_ids'=>$user_ids]);



}

//end assigned course request //
//start assign teacher //
public function assigncoursetoteacher(Request $request)
{
    if($request->institution_id == null) {
        $user_id = $_GET['institution_id'];
    } else {
        $user_id = $request->institution_id;
    }

    //userstable id//
    if($request->user_id == null) {
        $user_ids = $_GET['user_id'];
    } else {
        $user_ids = $request->user_id;
    }
    $categories = Category::where('institution_id',$user_id)->orderBy('name','asc')->get();
    //$user_id=Auth::id();
   // $user_details = UserDetail::where('user_id',$user_id)->first();

    $current_date = date('Y-m-d H:i:s');
    //$subscription_end_date = $user_details->subscription_end_date;
    // $institution_id = InstitutionAdmin::where('user_id',$user_id)->first()->institution_id;
    $course_lists = Course::where('user_id',$user_id)->orderBy('title','asc')->get();
    //dd($course_lists);
   $data_teacher=InstitutionTeacher::leftjoin('users','institution_teachers.user_id','=','users.id')->where(['users.status'=>'active','users.role'=>'2','institution_teachers.institution_id'=>$user_id])->select('users.*')->orderBy('users.name','asc')->get();
   $t2_array =[];
   if(!empty($data_teacher) )
    {
        foreach ($data_teacher as $teacher)
        {
            $t2_array[]= $teacher->id;
        }
    }

  //dd($data_teacher);

     $data7 = CourseTeacher::leftJoin('users','users.id','=','course_teachers.user_id')->leftJoin('courses','courses.id','=','course_teachers.course_id')->where(['course_teachers.created_by'=>$user_id,'course_teachers.status'=>'approve'])->select('course_teachers.*','courses.id as courses_id','courses.title','users.id as users_id','users.name')->get();




 //dd($data7);





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


   return view('theme.institution.assignteacher',['courses'=>$thearray,'categories'=>$categories,'course_lists'=>$course_lists,'data_teacher'=>$data_teacher,'user_id'=>$user_id,'user_ids'=>$user_ids]);



}


public function assigncoursetoteacherstore(Request $request)
{

                    $v = Validator::make($request->all(),[




                    ]);

                    if ($v->fails())
                    {

                    return response()->json([
                        'type'=>'error',
                        'message' => $v->errors()->all()


                    ]);
                    }
                    else
                    {


                        $created_by = $request->user_id;

                           //$slug = Str::slug($request->input('title'));
                           //$course_id = $course->id;
                            $course_teacher = new CourseTeacher();
                            $course_teacher->course_id =  $request->course_id;
                            $course_teacher->user_id= $request->teacher_id;
                            $course_teacher->created_by = $created_by;
                            $course_teacher->save();


                            Session::flash('success', 'successfully assign to course added!');

                            return response()->json([
                                'type' => 'success',
                            'message' => 'successfully assign to course added!'
                            ]);


                    }

                    Session::flash('error', 'Something wrong!');
                            return response()->json([
                                'type' => 'error',
                                'message' => 'Something wrong!',
                                'category' => $categories
                                ]);
}


public function assigncoursetoteacherupdate(Request $request,$id)
{



                        $v = Validator::make($request->all(),[


                        ]);

                        if ($v->fails())
                        {
                        //return redirect()->route('create.category')->withInput()->with('error',$v->messages());
                        return redirect()->back()->withErrors($v)->withInput();
                        }
                        else
                        {
                            $created_by = $request->user_id;
                                $course =  CourseTeacher::where('id',$id)->first();
                                $course->course_id = $request->course_id;
                                $course->user_id = $request->teacher_id;



                                if($course->save()){
                                    Session::flash('success', 'successfully update !');

                                    return response()->json([
                                     'message' => 'successfully update '
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

public function courseteacherview($id)
{
     $courses = CourseTeacher::find($id);
     //dd($courses);




    return json_encode(array('status'=>'ok','data'=>$courses));


}
//end assign teacher //
// START STATICE//
public function statistics(Request $request)
{


    $user_id=Auth::id();
    $current_date = date('Y-m-d H:i:s');

    $institution_id = InstitutionAdmin::where('user_id',$user_id)->first()->institution_id;
    $course_count = Course::where(['user_id'=>$user_id])->orderBy('id','asc')->get()->count();
    //dd($courses);
    $total_payment = Payment::where(['user_id'=>$institution_id])->orderBy('id','asc')->get()->sum('amount');
    //dd($total_payment);






   return view('theme.institution.statistics',['course_count'=>$course_count,'total_payment'=>$total_payment]);



}



// END STATICE//

//start company settings//
public function institutioncompany(Request $request)
{
    if($request->institution_id == null) {
        $user_id = $_GET['institution_id'];
    } else {
        $user_id = $request->institution_id;
    }

    //userstable id//
    if($request->user_id == null) {
        $user_ids = $_GET['user_id'];
    } else {
        $user_ids = $request->user_id;
    }

  $data7=InstitutionCompanySetting::where('institution_id',$user_id)->select('institution_company_settings.*')->first();

  return view('theme.institution.settings.company',['companys'=>$data7,'user_id'=>$user_id,'user_ids'=>$user_ids]);



}



    public function institutioncompanyupdate(Request $request,$id)
    {
         $name = $request->input('name');
         $user_id = $request->input('user_id');
         $address = $request->input('address');
         $phone = $request->input('phone');
         $fax = $request->input('fax');
         $website = $request->input('website');
         $country = $request->input('country');
         $copyright_text = $request->input('copyright_text');

         $home_page_short_description = $request->input('home_page_short_description_value');
         $footer_text = $request->input('footer_text_value');
         $header_text = $request->input('header_text_value');


         $logo=$request->old_logo;


            if($request->file('logo'))
            {
                if(file_exists(public_path().'/'.$request->old_logo))
                {
                    if($request->old_logo!='')
                    {
                    unlink(public_path().'/'.$request->old_logo);
                    }
                }

                    $image=$request->file('logo') ;


                     $originName = $image->getClientOriginalName();
                     $fileName = pathinfo($originName, PATHINFO_FILENAME);
                     $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

                     $extension = $image->getClientOriginalExtension();
                     $fileName = $fileName.'_'.time().'.'.$extension;

                     if (in_array($extension,['png','jpg','jpeg']))
                     {
                        if($image->move(public_path().'/frontend/images/', $fileName))
                        {
                            $attachment_1 =  'frontend/images/'.$fileName;

                            $logo = $attachment_1;
                        }
                        else
                        {
                           return response()->json(['status'=>'error','error'=>'logo  couldn\'t save, please try again later!']);
                        }
                     }
            }

             $fav_icon=$request->old_fav_icon;


            if($request->file('fav_icon'))
            {
                if(file_exists(public_path().'/'.$request->old_fav_icon))
                {
                    if($request->old_fav_icon!='')
                    {
                    unlink(public_path().'/'.$request->old_fav_icon);
                    }
                }

                    $image=$request->file('fav_icon') ;


                     $originName = $image->getClientOriginalName();
                     $fileName = pathinfo($originName, PATHINFO_FILENAME);
                     $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

                     $extension = $image->getClientOriginalExtension();
                     $fileName = $fileName.'_'.time().'.'.$extension;

                     if (in_array($extension,['png','jpg','jpeg','ico']))
                     {
                        if($image->move(public_path().'/frontend/images/', $fileName))
                        {
                            $attachment_1 =  'frontend/images/'.$fileName;

                            $fav_icon = $attachment_1;
                        }
                        else
                        {
                           return response()->json(['status'=>'error','error'=>'Fav icon  couldn\'t save, please try again later!']);
                        }
                     }
            }


             $director_signature=$request->old_director_signature;


            if($request->file('director_signature'))
            {
                if(file_exists(public_path().'/'.$request->old_director_signature))
                {
                    if($request->old_director_signature!='')
                    {
                    unlink(public_path().'/'.$request->old_director_signature);
                    }
                }

                    $image=$request->file('director_signature') ;


                     $originName = $image->getClientOriginalName();
                     $fileName = pathinfo($originName, PATHINFO_FILENAME);
                     $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

                     $extension = $image->getClientOriginalExtension();
                     $fileName = $fileName.'_'.time().'.'.$extension;

                     if (in_array($extension,['png','jpg','jpeg']))
                     {
                        if($image->move(public_path().'/frontend/images/', $fileName))
                        {
                            $attachment_1 =  'frontend/images/'.$fileName;

                            $director_signature = $attachment_1;
                        }
                        else
                        {
                           return response()->json(['status'=>'error','error'=>'Director signature  couldn\'t save, please try again later!']);
                        }
                     }
            }

            if($id == 0) {

                $company = new InstitutionCompanySetting();

                $company->name = $request->name;
                $company->institution_id =$request->user_id;
                $company->address = $request->address;
                $company->phone = $request->phone;
                $company->fax = $request->fax;
                $company->website = $request->website;
                $company->country = $request->country;
                $company->home_page_short_description = $home_page_short_description;
                $company->footer_text = $footer_text;
                $company->header_text = $header_text;
                $company->copyright_text = $request->copyright_text;
                $company->logo = $logo;
                $company->fav_icon = $fav_icon;
                $company->director_signature = $director_signature;



                 $company->facebook_link = $request->facebook_link;
                  $company->instagram_link = $request->instagram_link;
                   $company->twiter_link = $request->twiter_link;
                    $company->linkedin_link = $request->linkedin_link;
                     $company->youtube_link = $request->youtube_link;




                if($company->save()){

                    $data7=InstitutionCompanySetting::orderBy('institution_company_settings.id','desc')->select('institution_company_settings.*')->get();

                     Session::flash('success', 'successfully company updated!');

                     return response()->json([
                      'message' => 'successfully company updated!',
                      'data'=> $data7
                    ]);
                }else{
                     Session::flash('error', 'Something wrong!');
                     return response()->json([
                          'message' => 'Something wrong!'
                        ]);
                }

                    ////////////////////////////////////////////////
            }
            else
            {
                $company =  InstitutionCompanySetting::where('id',$id)->first();

                $company->name = $request->name;
                $company->institution_id =$request->user_id;
                $company->address = $request->address;
                $company->phone = $request->phone;
                $company->fax = $request->fax;
                $company->website = $request->website;
                $company->country = $request->country;
                $company->home_page_short_description = $home_page_short_description;
                $company->footer_text = $footer_text;
                $company->header_text = $header_text;
                $company->copyright_text = $request->copyright_text;
                $company->logo = $logo;
                $company->fav_icon = $fav_icon;
                $company->director_signature = $director_signature;



                 $company->facebook_link = $request->facebook_link;
                  $company->instagram_link = $request->instagram_link;
                   $company->twiter_link = $request->twiter_link;
                    $company->linkedin_link = $request->linkedin_link;
                     $company->youtube_link = $request->youtube_link;




                if($company->save()){

                    $data7=InstitutionCompanySetting::orderBy('institution_company_settings.id','desc')->select('institution_company_settings.*')->get();

                     Session::flash('success', 'successfully company updated!');

                     return response()->json([
                      'message' => 'successfully company updated!',
                      'data'=> $data7
                    ]);
                }else{
                     Session::flash('error', 'Something wrong!');
                     return response()->json([
                          'message' => 'Something wrong!'
                        ]);
                }
            }



    }


    public function institutioncompanyview($id)
    {




        $companys = InstitutionCompanySetting::find($id);

        $asset = asset('');
        return json_encode(array('status'=>'ok','data'=>$companys,'asset'=>$asset));


    }

//end company settings//

//start system settings//

public function institutionsystem(Request $request)
{

    if($request->institution_id == null) {
        $user_id = $_GET['institution_id'];
    } else {
        $user_id = $request->institution_id;
    }

    //userstable id//
    if($request->user_id == null) {
        $user_ids = $_GET['user_id'];
    } else {
        $user_ids = $request->user_id;
    }
    $countries = Country::orderBy('c_name','asc')->get();
    $cities = City::orderBy('city_name','asc')->get();

    $data7 = InstitutionSystemSetting::leftJoin('countries','institution_system_settings.default_country_id','=','countries.id')->leftJoin('cities','institution_system_settings.default_city_id','=','cities.id')->where('institution_id',$user_id)->select('institution_system_settings.*','countries.c_name','cities.city_name')->first();
     return view('theme.institution.settings.system',['systems'=>$data7,'countries'=>$countries,'cities'=>$cities,'user_id'=>$user_id,'user_ids'=>$user_ids]);



}

public function institutionsystemupdate(Request $request,$id)
{
     $student_default_subscription_day = $request->input('student_default_subscription_day');
     $user_id = $request->input('user_id');
     $teacher_default_subscription_day = $request->input('teacher_default_subscription_day');
     $institution_default_subscription_day = $request->input('institution_default_subscription_day');
     $default_country_id = $request->input('default_country_id');
     $default_city_id = $request->input('default_city_id');
     $teacher_online_class_before_minute = $request->input('teacher_online_class_before_minute');
     $student_online_class_before_minute = $request->input('student_online_class_before_minute');

     if($id == 0) {
        $system = new InstitutionSystemSetting();


        $system->institution_id =$request->user_id;
        $system->student_default_subscription_day = $request->student_default_subscription_day;
        $system->teacher_default_subscription_day = $request->teacher_default_subscription_day;
        $system->institution_default_subscription_day = $request->institution_default_subscription_day;
        $system->default_country_id  =$request->default_country_id;
        $system->default_city_id = $request->default_city_id;
        $system->teacher_online_class_before_minute = $request->teacher_online_class_before_minute;
        $system->student_online_class_before_minute = $request->student_online_class_before_minute;
        //  $category->slug = $slug;

        if($system->save()){

            $data7 = InstitutionSystemSetting::leftJoin('countries','institution_system_settings.default_country_id','=','countries.id')->leftJoin('cities','institution_system_settings.default_city_id','=','cities.id')->select('institution_system_settings.*','countries.c_name','cities.city_name')->get();

             Session::flash('success', 'successfully system settings updated!');

             return response()->json([
              'message' => 'successfully  system settings updated!',
              'data'=> $data7

            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                  'message' => 'Something wrong!'
                ]);
        }
     }
     else{

        $system =  InstitutionSystemSetting::where('id',$id)->first();
        $system->institution_id =$request->user_id;
        $system->student_default_subscription_day = $request->student_default_subscription_day;
        $system->teacher_default_subscription_day = $request->teacher_default_subscription_day;
        $system->institution_default_subscription_day = $request->institution_default_subscription_day;
        $system->default_country_id  =$request->default_country_id;
        $system->default_city_id = $request->default_city_id;
        $system->teacher_online_class_before_minute = $request->teacher_online_class_before_minute;
        $system->student_online_class_before_minute = $request->student_online_class_before_minute;
        //  $category->slug = $slug;

        if($system->save()){

            $data7 = InstitutionSystemSetting::leftJoin('countries','institution_system_settings.default_country_id','=','countries.id')->leftJoin('cities','institution_system_settings.default_city_id','=','cities.id')->select('institution_system_settings.*','countries.c_name','cities.city_name')->get();

             Session::flash('success', 'successfully system settings updated!');

             return response()->json([
              'message' => 'successfully  system settings updated!',
              'data'=> $data7

            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                  'message' => 'Something wrong!'
                ]);
        }

     }


}


public function institutionsystemview($id)
{


    $systems = InstitutionSystemSetting::find($id);
    //return $categories;
    return json_encode(array('status'=>'ok','data'=>$systems));


}

// end system settings//

//start banner setting //

public function institutionbannersetting(Request $request)
{
    if($request->institution_id == null) {
        $user_id = $_GET['institution_id'];
    } else {
        $user_id = $request->institution_id;
    }

    //userstable id//
    if($request->user_id == null) {
        $user_ids = $_GET['user_id'];
    } else {
        $user_ids = $request->user_id;
    }

    $data7=InstitutionBannerSetting::where('institution_id',$user_id)->select('institution_banner_settings.*')->get();

      $thearray = [];
     if(count($data7) > 0)
     {
        foreach($data7 as $k2=>$v2)
        {


                    $thearray[]=array(

                        'slider'=>$v2->slider
                       ,'slider_text'=>$v2->slider_text
                       ,'slider_header'=>$v2->slider_header
                       ,'description'=>$v2->description
                       ,'link'=>$v2->link
                       ,'institution_id'=>$v2->institution_id
                        ,'id'=>$v2->id
                    );

        }
     }


   return view('theme.institution.settings.home',['homes'=>$thearray,'user_id'=>$user_id,'user_ids'=>$user_ids]);



}





public function institutionbannersettingview($id)
{


        $home_settings = InstitutionBannerSetting::find($id);
        $asset_path = asset('');

        return json_encode(array('status'=>'ok','data'=>$home_settings,'asset_path'=>$asset_path,));


}

public function institutionbannersettingdelete($id)
{

        $home_settings = InstitutionBannerSetting::find($id);
        $result =$home_settings->delete();

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

public function institutionbannersettingstore(Request $request)
{

        if($request->hasfile('slider'))
        {
                $image=$request->file('slider') ;


            $originName = $image->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

            $extension = $image->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;


            if (in_array($extension, ['png','jpg','jpeg',]))
            {
                $image->move(public_path().'/frontend/images/', $fileName);
                $attachment_1 =  'frontend/images/'.$fileName;

                $slider = $attachment_1;




            }




        }
        $home_settings = new InstitutionBannerSetting();

            $home_settings->slider = $slider;
            $home_settings->slider_text = $request->slider_text;
            $home_settings->slider_header = $request->slider_header;
            $home_settings->description = $request->description;
            $home_settings->institution_id = $request->user_id;
            $home_settings->link = $request->link;



            if($home_settings->save()){
                Session::flash('success', 'successfully home setting added!');

                return response()->json([
                'message' => 'successfully home setting added!'
                ]);
            }else{
                Session::flash('error', 'Something wrong!');
                return response()->json([
                    'message' => 'Something wrong!'
                    ]);
            }


}

public function institutionbannersettingupdate(Request $request,$id)
{


        $slider=$request->old_slider;


        if($request->file('slider'))
        {
            if(file_exists(public_path().'/'.$request->old_slider))
            {
                if($request->old_slider!='')
                {
                unlink(public_path().'/'.$request->old_slider);
                }
            }

                $image=$request->file('slider') ;


                $originName = $image->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

                $extension = $image->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;

                if (in_array($extension,['png','jpg','jpeg']))
                {
                    if($image->move(public_path().'/frontend/images/', $fileName))
                    {
                        $attachment_1 =  'frontend/images/'.$fileName;

                        $slider = $attachment_1;
                    }
                    else
                    {
                    return response()->json(['status'=>'error','error'=>'slider  couldn\'t save, please try again later!']);
                    }
                }
        }
            $home_settings =  InstitutionBannerSetting::where('id',$id)->first();
            if($slider) {
                $home_settings->slider = $slider;
            }
            $home_settings->slider_text = $request->slider_text;
            $home_settings->slider_header = $request->slider_header;
            $home_settings->description = $request->description;
            $home_settings->institution_id = $request->user_id;
            $home_settings->link = $request->link;




            if($home_settings->save()){
                Session::flash('success', 'successfully home setting updated!');

                return response()->json([
                'message' => 'successfully home setting updated!'
                ]);
            }else{
                Session::flash('error', 'Something wrong!');
                return response()->json([
                    'message' => 'Something wrong!'
                    ]);
                }
}

//end banner setting //

//start category //
public function institutioncategory(Request $request)
{
    if($request->institution_id == null) {
        $user_id = $_GET['institution_id'];
    } else {
        $user_id = $request->institution_id;
    }
        //userstable id//

        if($request->user_id == null) {
            $user_ids = $_GET['user_id'];
        } else {
            $user_ids = $request->user_id;
        }


    $data7=Category::where('institution_id',$user_id)->orderBy('categories.id','desc')->select('categories.*')->get();

      $thearray = [];
     if(count($data7) > 0)
     {
        foreach($data7 as $k2=>$v2)
        {


                    $thearray[]=array(
                        'name'=>$v2->name
                        ,'slug'=>$v2->slug
                        , 'status'=>$v2->status
                        , 'institution_id'=>$v2->institution_id
                        ,'id'=>$v2->id
                    );

        }
     }


   return view('theme.institution.category.category',['categories'=>$thearray,'user_id'=>$user_id,'user_ids'=>$user_ids]);



}

public function institutioncategorystore(Request $request)
{
    $name = $request->input('name');
   // $slug = $request->input('name');
    $created_by = $request->user_id;

    $slug = Str::slug($request->input('name'));

     $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->institution_id = $created_by;
        //$category->created_by = $created_by;

        if($category->save()){
             Session::flash('success', 'successfully category added!');

             return response()->json([
              'message' => 'successfully category added!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                  'message' => 'Something wrong!'
                ]);
        }

}



public function institutioncategoryupdate(Request $request,$id)
{
     $name = $request->input('name');
     $status = $request->input('status');
       $slug = Str::slug($request->input('name'));


     $category =  Category::where('id',$id)->first();
        $category->name = $request->name;
        $category->status = $status;
        $category->institution_id = $request->user_id;
         $category->slug = $slug;

        if($category->save()){
             Session::flash('success', 'successfully category updated!');

             return response()->json([
              'message' => 'successfully category updated!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                  'message' => 'Something wrong!'
                ]);
        }

}





public function institutionstatuscategory($id,$status)
{
            $data = Category::find($id);
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

public function institutionviewcategory($id)
{


        $categories = Category::find($id);
        //return $categories;
        return json_encode(array('status'=>'ok','data'=>$categories));


}


public function institutioncategorydelete($id)
{

        $categories = Category::find($id);
        $result =$categories->delete();

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



//end category //

//faq section//
public function institutionfaq(Request $request)
{

    if($request->institution_id == null) {
        $user_id = $_GET['institution_id'];
    } else {
        $user_id = $request->institution_id;
    }


        //userstable id//
        if($request->user_id == null) {
            $user_ids = $_GET['user_id'];
        } else {
            $user_ids = $request->user_id;
        }

    $data7=Faq::where('institution_id',$user_id)->orderBy('faq.id','desc')->select('faq.*')->get();

      $thearray = [];
     if(count($data7) > 0)
     {
        foreach($data7 as $k2=>$v2)
        {


                    $thearray[]=array(
                        'title'=>$v2->title
                        ,'slug'=>$v2->slug
                        ,'contents'=>$v2->contents
                        ,'order_no'=>$v2->order_no
                        , 'status'=>$v2->status
                        ,'institution_id'=>$v2->institution_id
                        ,'id'=>$v2->id
                    );

        }
     }


   return view('theme.institution.faq.faq',['faqs'=>$thearray,'user_id'=>$user_id,'user_ids'=>$user_ids]);



}


public function institutionstatusfaq($id,$status)
{
      $data = Faq::find($id);
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


    public function institutionviewfaq($id)
{


            $faq = Faq::find($id);

            return json_encode(array('status'=>'ok','data'=>$faq));


}

public function institutionfaqdelete($id)
{

        $faq = Faq::find($id);
        $result =$faq->delete();

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

public function institutionfaqstore(Request $request)
{

            $v = Validator::make($request->all(),[
                'title' => 'required|unique:faq,title',

            ]);

            if ($v->fails())
            {

            return response()->json([
                'type'=>'error',
                'message' => $v->errors()->all()
            ]);
            }
            else
            {
                $contents='';
                if($request->contents_value!='')
                {
                    $contents=$request->contents_value;
                }



            $title = $request->input('title');


            $created_by = $request->user_id;

            $slug = Str::slug($request->input('title'));


            $faq = new Faq();
                $faq->title = $request->title;
                $faq->slug = $slug;
                $faq->institution_id = $created_by;
                $faq->created_by = $created_by;
                $faq->contents =  $contents;
                $faq->order_no = $request->order_no;


                if($faq->save()){
                    Session::flash('success', 'successfully faq added!');

                    return response()->json([
                    'message' => 'successfully faq added!'
                    ]);
                }else{
                    Session::flash('error', 'Something wrong!');
                    return response()->json([
                        'message' => 'Something wrong!'
                        ]);
                }
            }

}

public function institutionfaqupdate(Request $request,$id)
{
            $v = Validator::make($request->all(),[
                //'title' => 'required|unique:faq,title',
                'title' => 'required|unique:faq,title,'.$id,

            ]);

            if ($v->fails())
            {

            return response()->json([
                'type'=>'error',
                'message' => $v->errors()->all()
            ]);
            }
            else
            {
                $contents='';
                if($request->contents_value!='')
                {
                    $contents=$request->contents_value;
                }
            $title = $request->input('title');
            $status = $request->input('status');

            $faq =  Faq::where('id',$id)->first();
                $faq->title = $request->title;
                $faq->status = $status;
                $faq->institution_id = $request->user_id;
                $faq->contents = $contents;
                $faq->order_no = $request->order_no;

                if($faq->save()){
                    Session::flash('success', 'successfully faq updated!');

                    return response()->json([
                    'message' => 'successfully faq updated!'
                    ]);
                }else{
                    Session::flash('error', 'Something wrong!');
                    return response()->json([
                        'message' => 'Something wrong!'
                        ]);
                    }     }

}


//end faq section//
//start view subscription //

public function showinstitutionsubscription(Request $request)
{

    if($request->institution_id == null) {
        $user_id = $_GET['institution_id'];
    } else {
        $user_id = $request->institution_id;
    }
    //userstable id//
    if($request->user_id == null) {
        $user_ids = $_GET['user_id'];
    } else {
        $user_ids = $request->user_id;
    }

    $data7=InstitutionSubcription::leftJoin('institution_subscription_packages','institution_subscription_packages.id','=','institution_subscriptions.institution_subcription_package_id')->where('user_id',$user_id)->orderBy('institution_subscriptions.id','desc')->select('institution_subscriptions.*','institution_subscription_packages.title','institution_subscription_packages.price')->get();

      $thearray = [];
     if(count($data7) > 0)
     {
        foreach($data7 as $k2=>$v2)
        {


                    $thearray[]=array(
                        'user_id'=>$v2->user_id
                        ,'institution_subcription_package_id'=>$v2->institution_subcription_package_id
                        ,'title'=>$v2->title
                        ,'price'=>$v2->price
                        ,'created_by'=>$v2->created_by
                        ,'days'=>$v2->days
                        , 'start_date'=>$v2->start_date
                        ,'end_date'=>$v2->end_date
                        ,'id'=>$v2->id
                    );

        }
     }
   return view('theme.institution.subscription',['subscriptions'=>$thearray,'user_id'=>$user_id,'user_ids'=>$user_ids]);



}


//end view subscription //

public function institutiondashboard(Request $request)
    {

            if($request->institution_id == null) {
                $user_id = $_GET['institution_id'];
            } else {
                $user_id = $request->institution_id;
            }

            //userstable id//
            if($request->user_id == null) {
                $user_ids = $_GET['user_id'];
            } else {
                $user_ids = $request->user_id;
            }

          $current_date = date('Y-m-d H:i:s');
                $course_count = Course::where(['institution_id'=>$user_id])->orderBy('id','asc')->get()->count();
                //dd($courses);
                $total_payment = Payment::where(['institution_id'=>$user_id])->orderBy('id','asc')->get()->sum('amount');
                //dd($total_payment);
                $total_student = InstitutionStudent::where(['institution_id'=>$user_id])->orderBy('id','asc')->get()->count();
                //dd($total_student);

            $students_lists= InstitutionStudent::leftjoin('users', 'users.id', '=', 'institution_students.user_id')->where(['institution_id'=>$user_id])->orderBy('id','asc') ->select('institution_students.*','users.name as student_name')->get();

            $teachers_lists= InstitutionTeacher::leftjoin('users', 'users.id', '=', 'institution_teachers.user_id')->where(['institution_id'=>$user_id])->orderBy('id','asc') ->select('institution_teachers.*','users.name as teacher_name')->get();
            $total_visitor = UserVisitor::get()->count();




       return view('theme.institution.dashboard',['user_id'=>$user_id,'course_count'=>$course_count,'total_payment'=>$total_payment,'total_student'=>$total_student,'students_lists'=>$students_lists,'teachers_lists'=>$teachers_lists,'total_visitor'=>$total_visitor,'user_ids'=>$user_ids]);

    }

}
