<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSubscription;
use App\Models\Category;
use App\Models\InstitutionAdmin;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use File;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function Course(Request $request)
    {
            $categories = Category::orderBy('name','asc')->get();
            $institutions = Institution::orderBy('name','asc')->get();

            //$institutions= InstitutionAdmin::leftjoin('institutions','institutions.id','=','institution_admins.institution_id')->orderBy('name','asc')->select->get();
            //dd($institutions);




            $data7 = Course::leftjoin('institution_admins','institution_admins.user_id','=','courses.user_id')->leftjoin('institutions','institutions.id','=','institution_admins.institution_id')->leftjoin('categories', 'categories.id', '=', 'courses.category_id')->orderBy('courses.id','desc')
            // dd($institution);


            //    $data7=Course::leftJoin('categories', 'categories.id', '=', 'courses.category_id')->orderBy('courses.id','desc')
            ->when($request->has("title"),function($q)use($request){



                    $title  = $request->get("title");
                    if($title!='')
                    {
                        return $q->where("courses.title","like","%".$title."%");
                    }


            }) ->when($request->has("institution_id"),function($q)use($request){
                $institution_id  = $request->get("institution_id");
                if($institution_id!='')

                {

                    return $q->where("institutions.id",$institution_id);
                }




            })->when($request->has("category_id"),function($q)use($request){
                $category_id  = $request->get("category_id");
                if($category_id!='')

                {

                    return $q->where("courses.category_id",$category_id);
                }




            })
            ->when($request->has("type"),function($q)use($request){
                $type  = $request->get("type");
                if($type!='')

                {

                    return $q->where("courses.type",$type);
                }




            })  ->distinct('courses.id')->select('courses.*','categories.name as category_name','institutions.name as institution_name')
            ->get();

        //dd($data7);


                $thearray = [];
                if(count($data7) > 0)
                {
                foreach($data7 as $k2=>$v2)
                {


                            $thearray[]=array(
                                'course_id'=>$v2->course_id
                                ,'user_id'=>$v2->user_id

                                , 'institution_name'=>$v2->institution_name
                                ,'category_id'=>$v2->category_id

                                , 'category_name'=>$v2->category_name
                                , 'status'=>$v2->status
                                , 'total'=>$v2->total
                                , 'title'=>$v2->title
                                ,'type'=>$v2->type






                                ,'id'=>$v2->id
                            );

                }
            }

            $data = $this->paginate_course($thearray);

            if($request->ajax()){
                return view('admin.course.course-pagination',['courses'=>$data,'categories'=>$categories,'institutions'=>$institutions]);
            }
            return view('admin.course.course',['courses'=>$data,'categories'=>$categories,'institutions'=>$institutions]);



    }
     public function paginate_course($items, $perPage = 10, $page = null, $options = [])
        {
            $options = ['path' => Route('course')] ;

            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
            $items = $items instanceof Collection ? $items : Collection::make($items);
            return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        }

       public function Admincoursesubcriptionlist($id)
        {

           $coursesubcription = CourseSubscription::leftjoin('users','users.id','=','course_subscriptions.user_id')->leftjoin('courses','courses.id','=','course_subscriptions.course_id')->where('course_subscriptions.course_id',$id)->orderBy('course_subscriptions.id','desc')->get();


           if($coursesubcription->count() > 0)
           {
              $avatar_temp = $coursesubcription[0]->avatar;
           }
           else 
           {
             $avatar_temp = 'assets/img/icons/activities/drinking.svg';
           }
          

           $avatar = asset('assets/img/icons/activities/drinking.svg');
     

           if($avatar_temp!='' && file_exists($avatar_temp))
           {
               $avatar = asset($avatar_temp);
           }

           $asset_path = asset('');






         return json_encode(array('status'=>'ok','data'=>$coursesubcription,'asset_path'=>$asset_path,'avatar'=>$avatar));


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

public function update(Request $request, Course $course,$id)
    {
         $start_date = $request->input('start_date');
         $end_date = $request->input('end_date');



         $course =  Course::where('id',$id)->first();

            $course->start_date = $start_date;
            $course->end_date = $end_date;


            if($course->save()){
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


public function courseview($id)
{


    $courses = Course::find($id);
    //return $categories;

    return json_encode(array('status'=>'ok','data'=>$courses));


}
}
