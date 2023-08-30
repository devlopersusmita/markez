<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

class UserDetailController extends Controller
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


    public function institution(Request $request)
    {



        $institutions=User::leftjoin('institution_admins','users.id','=','institution_admins.user_id')->leftjoin('institutions','institution_admins.institution_id','=','institutions.id')->where('users.role','3')->orderBy('institutions.id','desc')->when($request->has("name"),function($q)use($request){



               $name  = $request->get("name");
               if($name!='')
                {
                   return $q->where("institutions.name","like","%".$name."%");
               }


        })->select('users.id','users.email','users.status','institutions.name','institutions.logo')->get();

          $thearray = [];
         if(count($institutions) > 0)
         {
            foreach($institutions as $k2=>$v2)
            {

                $logo = asset('assets/img/icons/activities/drinking.svg');

                if($v2->logo!='' && file_exists($v2->logo))
                {
                    $logo=asset($v2->logo);
                }


                        $thearray[]=array(
                            'name'=>$v2->name
                            ,'email'=>$v2->email
                            ,'avatar'=>$logo
                             ,'status'=>$v2->status
                           ,'id'=>$v2->id
                        );

            }
         }

       $data = $this->paginate_institution($thearray);

       if($request->ajax()){
           return view('admin.user.institution-pagination',['institutions'=>$data]);
       }
       return view('admin.user.institution',['institutions'=>$data]);



    }
     public function statusinstitution($id,$status)
        {
          $data = User::find($id);
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



    public function paginate_institution($items, $perPage = 10, $page = null, $options = [])
        {
            $options = ['path' => Route('institution')] ;

            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
            $items = $items instanceof Collection ? $items : Collection::make($items);
            return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        }
        public function teacher(Request $request)
        {



           $teachers=User::where('role','2')->orderBy('users.id','desc')->when($request->has("name"),function($q)use($request){



                  $name  = $request->get("name");
                  if($name!='')
                   {
                      return $q->where("users.name","like","%".$name."%");
                  }


           })->select('users.*')->get();

             $thearray = [];
            if(count($teachers) > 0)
            {
               foreach($teachers as $k2=>$v2)
               {


                   $avatar = asset('assets/img/icons/activities/drinking.svg');

                   if($v2->avatar!='' && file_exists($v2->avatar))
                   {
                       $avatar=asset($v2->avatar);
                   }


                           $thearray[]=array(
                               'name'=>$v2->name
                                ,'email'=>$v2->email
                                ,'avatar'=>$avatar
                                ,'status'=>$v2->status
                                ,'id'=>$v2->id
                           );

               }
            }

          $data = $this->paginate_teacher($thearray);


          if($request->ajax()){
              return view('admin.user.teacher-pagination',['teachers'=>$data]);
          }
          return view('admin.user.teacher',['teachers'=>$data]);



       }
     public function statusteacher($id,$status)
        {
          $data = User::find($id);
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



    public function paginate_teacher($items, $perPage = 10, $page = null, $options = [])
        {
            $options = ['path' => Route('teacher')] ;

            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
            $items = $items instanceof Collection ? $items : Collection::make($items);
            return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        }
        public function student(Request $request)
        {



            $students=User::where('role','1')->orderBy('users.id','desc')->when($request->has("name"),function($q)use($request){



                   $name  = $request->get("name");
                   if($name!='')
                    {
                       return $q->where("users.name","like","%".$name."%");
                   }


            })->select('users.*')->get();

              $thearray = [];
             if(count($students) > 0)
             {
                foreach($students as $k2=>$v2)
                {

                    $avatar = asset('assets/img/icons/activities/drinking.svg');

                    if($v2->avatar!='' && file_exists($v2->avatar))
                    {
                        $avatar=asset($v2->avatar);
                    }


                            $thearray[]=array(
                                'name'=>$v2->name
                                ,'email'=>$v2->email
                                ,'avatar'=> $avatar
                                 ,'status'=>$v2->status
                               ,'id'=>$v2->id
                            );

                }
             }

           $data = $this->paginate_student($thearray);

           if($request->ajax()){
               return view('admin.user.student-pagination',['students'=>$data]);
           }
           return view('admin.user.student',['students'=>$data]);



        }
     public function statusstudent($id,$status)
        {
          $data = User::find($id);
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


    public function studetupdate(Request $request, $id)
    {
        $v = Validator::make($request->all(),[
            //'title' => 'required|unique:faq,title',
             'student_password' => 'string',

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

         $password = $request->post('student_password');


         $user =  User::where('id',$id)->first();
            $user->password =  Hash::make($password);




            if($user->save()){
                 Session::flash('success', 'successfully student password changed!');

                 return response()->json([
                  'message' => 'successfully student password changed!'
                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);
                 }     }

    }
     public function teacherupdate(Request $request, $id)
    {
        $v = Validator::make($request->all(),[
            //'title' => 'required|unique:faq,title',
             'teacher_password' => 'string',

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

         $password = $request->post('teacher_password');


         $user =  User::where('id',$id)->first();
            $user->password =  Hash::make($password);




            if($user->save()){
                 Session::flash('success', 'successfully Teacher password changed!');

                 return response()->json([
                  'message' => 'successfully Teacher password changed!'
                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);
                 }     }

    }
     public function institutionupdate(Request $request, $id)
    {
        $v = Validator::make($request->all(),[
            //'title' => 'required|unique:faq,title',
             'institution_password' => 'string',

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

         $password = $request->post('institution_password');


         $user =  User::where('id',$id)->first();
            $user->password =  Hash::make($password);




            if($user->save()){
                 Session::flash('success', 'successfully Institution password changed!');

                 return response()->json([
                  'message' => 'successfully Institution password changed!'
                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);
                 }     }

    }
    public function paginate_student($items, $perPage = 10, $page = null, $options = [])
        {
            $options = ['path' => Route('student')] ;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $userDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDetail $userDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDetail $userDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {
        //
    }
}
