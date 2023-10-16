<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
use App\Models\InstitutionTeacherRequest;
use App\Models\User;
use App\Models\UserDetail;






class InstitutionTeacherRequestController extends Controller
{
    //



    public function sendrequest(Request $request)
    {



       $institution_teacher_requests=InstitutionTeacherRequest::leftJoin('institutions','institutions.id','=','institution_teacher_request.institution_id')->leftjoin('users','users.id','=','institution_teacher_request.student_id')->orderBy('id','desc')->select('institution_teacher_request.*','institutions.name as institution_name','users.name as student_name')->get();

         $thearray = [];
        if(count($institution_teacher_requests) > 0)
        {
           foreach($institution_teacher_requests as $k2=>$v2)
           {




                       $thearray[]=array(
                           'institution_id'=>$v2->institution_id
                           , 'institution_name'=>$v2->institution_name
                           , 'student_name'=>$v2->student_name
                           ,'student_id'=>$v2->student_id
                           ,'status'=>$v2->status
                          ,'id'=>$v2->id
                       );

           }
        }

      $data = $this->paginate_sendrequest($thearray);

      if($request->ajax()){
          return view('admin.institution.institution-teacher-request-pagination',['institution_teacher_requests'=>$data]);
      }
      return view('admin.institution.institution-teacher-request',['institution_teacher_requests'=>$data]);



   }


   public function paginate_sendrequest($items, $perPage = 10, $page = null, $options = [])
   {
       $options = ['path' => Route('sendrequest')] ;

       $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
       $items = $items instanceof Collection ? $items : Collection::make($items);
       return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
   }



   public function approve(Request $request, $id)
   {
       //dd($id);
    $data = InstitutionTeacherRequest::findorfail($id);
    //dd($data);

    $data->status = 'approve'; //Approved
    $data->save();

    $user = User::where('id', $data->student_id)->first();
    $user->role = 2;
    $user->save();

    $user_details = UserDetail::where('user_id', $data->student_id)->first();
    $user_details->user_type = 'Teacher';
    $user_details->save();
    return redirect()->back(); //Redirect user somewhere
 }

 public function decline(Request $request, $id)
 {
    $data = InstitutionTeacherRequest::findorfail($id);
    $data->status = 'reject'; //Declined
    $data->save();
    $user = User::where('id', $data->student_id)->first();
    $user->role = 1;
    $user->save();

    $user_details = UserDetail::where('user_id', $data->student_id)->first();
    $user_details->user_type = 'Student';
    $user_details->save();
    return redirect()->back(); //Redirect user somewhere
 }




}
