<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use App\Http\Traits\MeetingZoomTrait;

use App\Models\Course;
use App\Models\CourseContent;
use App\Models\online_classe;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;


use App\Models\SystemSetting;
use App\Models\CourseSubscription;



use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Stroage;
use DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Models\Attendance;
use App\Models\User;


class OnlineClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function onlineattendance(Request $request,$id,$content_id,$online_class_id)
    {
        $user_id = Auth::id();

      $course_id = $id;

      $course_content_id = $content_id;

      $course_details = Course::where('id',$course_id)->first();

      $course_content_details = CourseContent::where('id',$course_content_id)->first();

       $total_subscription = CourseSubscription::where('course_id',$course_id)->count();


       $online_class_details = online_classe::where('id',$online_class_id)->first();


       $all_attendance = Attendance::where('online_class_id',$online_class_id)->get();
    $all_attendance_user = [];
    if(count($all_attendance)> 0){
        foreach($all_attendance as $att){
            $all_attendance_user[]=$att->user_id;
        }
    }


      $teacher_online_class_before_minute=SystemSetting::select('teacher_online_class_before_minute')->first()->teacher_online_class_before_minute;


       $courses = Course::leftJoin('course_teachers','courses.id','=','course_teachers.course_id')->where(['course_teachers.user_id'=>$user_id,'courses.type'=>'zoom'])->orderBy('courses.title','asc')->get();
      // dd($courses);

         $coursecontents=CourseContent::leftJoin('courses','courses.id','=','course_contents.course_id')->select('courses.title as course_title','course_contents.*')->where(['course_contents.type'=>'zoom'])
        ->where('courses.id',$course_id)->orderBy('course_contents.title')->get();


         $user_deatils = CourseSubscription::leftJoin('users','users.id','=','course_subscriptions.user_id')->where('course_subscriptions.course_id',$course_id)->orderBy('users.id')->get();
         //dd($user_deatils);

       return view('theme.teacher.attendance',['coursecontents'=>$coursecontents,'user_deatils'=>$user_deatils,'online_class_id'=>$online_class_id,'all_attendance_user'=>$all_attendance_user,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'online_class_details'=>$online_class_details]);



  }
public function attendancestore(Request $request,$id,$online_class_id)
{
    $user_id = Auth::id();

         $student_user_id = $id;
            $stuonline_class_id = $online_class_id;
            //dd($user_id,$student_user_id);
            $thistype = $request->post('thistype');

            if($thistype== 'checked'){
                //insert
                $exits = Attendance::where(['online_class_id'=>$stuonline_class_id,'user_id'=>$student_user_id ])->count();
                if($exits == 0){
                    $attendance = new Attendance();
                    $attendance->online_class_id = $stuonline_class_id;
                    $attendance->user_id = $student_user_id;
                  $attendance->created_by =$user_id;

                    $attendance->save();


                }

                return response()->json(['success'=>'Attendance successfully submitted']);
            }
            else if($thistype== 'not checked'){
                //delete
                $del = Attendance::where(['online_class_id'=>$stuonline_class_id,'user_id'=>$student_user_id ])->delete();

                return response()->json(['success'=>'Attendance successfully removed']);
            }




}
   public function index(Request $request,$id,$content_id)
    {
        // $user_id = Auth::id();
       // $course_id = $id;
    //    $course_id = $id;
      // dd($course_id);
      $user_id = $request->user_id;
      //dd($user_id);
       $institution_id =$request->institution_id;
       //dd($user_id,$institution_id);
      $course_id = $id;

      $course_content_id = $content_id;

      $course_details = Course::where('id',$course_id)->first();

      $course_content_details = CourseContent::where('id',$course_content_id)->first();


      $total_subscription = CourseSubscription::where('course_id',$course_id)->count();


      $teacher_online_class_before_minute=SystemSetting::select('teacher_online_class_before_minute')->first()->teacher_online_class_before_minute;


       $courses = Course::leftJoin('course_teachers','courses.id','=','course_teachers.course_id')->where(['course_teachers.user_id'=>$user_id,'courses.type'=>'zoom'])->orderBy('courses.title','asc')->get();

    $coursecontents=CourseContent::leftJoin('courses','courses.id','=','course_contents.course_id')->select('courses.title as course_title','course_contents.*')->where(['course_contents.type'=>'zoom'])
    ->where('courses.id',$course_id)->  orderBy('course_contents.title')->get();


        $data7=online_classe::leftJoin('courses', 'courses.id', '=', 'online_classes.course_id')->leftJoin('course_contents', 'course_contents.id', '=', 'online_classes.course_content_id')->orderBy('online_classes.id','desc')->where(['online_classes.course_id'=>$course_id,'online_classes.course_content_id'=>$course_content_id])->select('online_classes.*','courses.title as course_title','course_contents.title as coursecontent_title')->get();

            $thearray = [];
             if(count($data7) > 0)
             {
                foreach($data7 as $k2=>$v2)
                {

                     $total_attendance = Attendance::where('online_class_id',$v2->id)->count();


                            $thearray[]=array(
                                'course_name'=>$v2->course_title
                                ,'coursecontent_name'=>$v2->coursecontent_title
                                ,'topic'=>$v2->topic
                                , 'start_at'=>$v2->start_at
                                , 'duration'=>$v2->duration
                                , 'start_url'=>$v2->start_url
                                , 'meeting_id'=>$v2->meeting_id
                                // ,'course_id'=>$course_id
                                // ,'course_content_id'=>$course_content_id

                                ,'id'=>$v2->id
                                ,'total_attendance'=>$total_attendance
                            );

                }
             }

           $data = $this->paginate_class($thearray,$course_id,$course_content_id);

           if($request->ajax()){
               return view('theme.online_classes.index-pagination',['online_classes'=>$data,'courses'=>$courses,'coursecontents'=>$coursecontents,'teacher_online_class_before_minute'=>$teacher_online_class_before_minute,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'total_subscription'=>$total_subscription,'user_id'=>$user_id,'institution_id'=>$institution_id]);
           }
           return view('theme.online_classes.index',['online_classes'=>$data,'courses'=>$courses,'coursecontents'=>$coursecontents,'teacher_online_class_before_minute'=>$teacher_online_class_before_minute,'course_id'=>$course_id,'course_content_id'=>$course_content_id,'course_details'=>$course_details,'course_content_details'=>$course_content_details,'total_subscription'=>$total_subscription,'user_id'=>$user_id,'institution_id'=>$institution_id]);

        //return view('theme.online_classes.index', ['online_classes'=>$online_classes,'id'=>$id]);
    }

     public function paginate_class($items,$course_id='', $course_content_id='',$perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('online_classes',['id'=>$course_id,'content_id'=>$course_content_id])] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function testing(Request $request)
    {
         echo "<pre>";


            $user7 = Zoom::user()->create([
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'email' => 'test7@test.com',
                'password' => 'Asecret!@#',
                'type' => 1,
                'pmi' => '5731171783',
                'timezone' => 'Asia/Calcutta',
                'verified' => 0,
                'created_at' => '2022-08-26T04:45:53Z',
                'last_login_time' => '2022-08-29T06:44:06Z',
                'pic_url' => 'https://lh3.googleusercontent.com/a-/AFdZucqup-_IRC5aNujTErFBfZqwcZnbtrhDCG6ZlJuh=s96-c',
                'language' => 'en-US',
                'phone_number' => '3453453',
                'status' => 'active',
                'role_id' => 0
            ]);
            //$user7->save();
            print_r($user7);


        $user = Zoom::user()->get();
        print_r($user->toarray());
    }
    public function store(Request $request)
    {
        $user_id = $request->user_id;
         $v = Validator::make($request->all(),[
        'topic' => 'required',
        'start_time' =>'required',
        'duration' =>'required',


    ]);

    if ($v->fails())
    {
       //return redirect()->route('create.category')->withInput()->with('error',$v->messages());
       return redirect()->back()->withErrors($v)->withInput();
    }
    else
    {
    }



         //$meeting = $this->createMeeting($request);

            //  $user = Zoom::user()->first();
                // Retrieve the Zoom user
        $user = Zoom::user()->find($user_id);

            /*  $user = Zoom::user()->create([
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'email' => 'test@test.com',
                    'password' => 'Aa@12345'
                ]);

             Session::flash('success', 'mmm');

             return response()->json([
              'message' => 'mmm'
            ]);
            */


        $meetingData = [
            'topic' => $request->topic,
            'duration' => $request->duration,
            'password' => $request->password,
            'start_time' => $request->start_time,
            'timezone' => config('zoom.timezone')
          // 'timezone' => 'Africa/Cairo'
        ];
        $meeting = Zoom::meeting()->make($meetingData);

        $meeting->settings()->make([
            'join_before_host' => false,
            'host_video' => false,
            'participant_video' => false,
            'mute_upon_entry' => true,
            'waiting_room' => true,
            'approval_type' => config('zoom.approval_type'),
            'audio' => config('zoom.audio'),
            'auto_recording' => config('zoom.auto_recording')
        ]);

        $meeting =  $user->meetings()->save($meeting);

             $created_by = $request->user_id;

            $online_classes = new online_classe();
            $online_classes->course_id = $request->course_id;


            $online_classes->course_content_id = $request->course_content_id;
            $online_classes->user_id = $created_by;
            $online_classes->meeting_id = $meeting->id;
            $online_classes->topic = $request->topic;
            $online_classes->start_at = $request->start_time;
            $online_classes->duration = $meeting->duration;
            $online_classes->password = $meeting->password;
            $online_classes->start_url = $meeting->start_url;
            $online_classes->join_url = $meeting->join_url;

             if($online_classes->save()){

                // $data7=online_classe::leftJoin('courses', 'courses.id', '=', 'online_classes.course_id')->leftJoin('course_contents', 'course_contents.id', '=', 'online_classes.course_content_id')->orderBy('online_classes.id','desc')->where(['online_classes.user_id'=>$user_id])->select('online_classes.*','courses.title as course_title','course_contents.title as coursecontent_title')->get();

             Session::flash('success', 'successfully zoom meeting created!');

             return response()->json([
              'message' => 'successfully zoom meeting created!'
            //   'data'=> $data7
            ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!',

                    ]);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {


         try {
            $meeting = Zoom::meeting()->find($id);
            $meeting->delete();
            online_classe::where('meeting_id', $id)->delete();
            Session::flash('success', 'successfully zoom meeting deleted!');
            return response()->json([
              'message' => 'successfully zoom meeting deleted!'
            ]);

        } catch (\Exception $e) {
             Session::flash('error', 'Something wrong!');
            return response()->json([
              'message' => $e->getMessage(),

            ]);
        }
    }
}
