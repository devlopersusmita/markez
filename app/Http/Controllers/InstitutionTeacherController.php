<?php

namespace App\Http\Controllers;

use App\Models\InstitutionTeacher;
use App\Models\InstitutionAdmin;
use Illuminate\Http\Request;


use App\Models\RequestDetails;
use App\Models\User;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;

use Mail;

use App\Mail\NotifyMail;

use Illuminate\Support\Str;

class InstitutionTeacherController extends Controller
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

public function approve_request(Request $request,$id)
    {

        $data7=RequestDetails::leftjoin('users as u1','request_details.sender_id','=','u1.id')
        ->leftjoin('users as u2','request_details.receiver_id','=','u2.id')
         ->where('request_details.id',$id)
         ->select('request_details.*','u1.name as sender_name','u2.name as receiver_name')
         ->first();

         if($data7->sender_type=='Institution')
         {
            $institution_id = $data7->sender_id;
            $teacher_id = $data7->receiver_id;
         }
         else if($data7->sender_type=='Teacher')
         {
            $institution_id = $data7->receiver_id;
            $teacher_id = $data7->sender_id;
         }

         //approved
         //insert in to institution_teachers table

         $institution_id_org = InstitutionAdmin::where('user_id',$institution_id)->first()->institution_id;

            $institution_teacher = new InstitutionTeacher();
            $institution_teacher->institution_id = $institution_id_org;
            $institution_teacher->user_id = $teacher_id;
            $institution_teacher->created_by = $data7->sender_id;
            $institution_teacher->save();



         //send mail to institution
         $sender_details_institution = User::where(['id'=>$institution_id])->first();
        $receiver_details_institution = User::where(['id'=>$teacher_id])->first();

        if($sender_details_institution->role=='1')
        {
            $sender_type_institution = 'A Student';
        }
        else if($sender_details_institution->role=='2')
        {
            $sender_type_institution = 'A Teacher';
        }
        else if($sender_details_institution->role=='3')
        {
            $sender_type_institution = 'An Institution';
        }

        $details_institution = [
              'receiver_name'=>$receiver_details_institution->name,
              'sender_name'=>$sender_details_institution->name,
              'sender_type' => $sender_type_institution,
              'body' => 'A request with '.$sender_type_institution.' ('.$sender_details_institution->name.') is approved by our Administration. <br><br><br>',
          ];

        Mail::to($receiver_details_institution->email)->send(new NotifyMail($details_institution));
         //send mail to teacher
        $sender_details_teacher = User::where(['id'=>$teacher_id])->first();
        $receiver_details_teacher = User::where(['id'=>$institution_id])->first();

        if($sender_details_teacher->role=='1')
        {
            $sender_type_teacher = 'A Student';
        }
        else if($sender_details_teacher->role=='2')
        {
            $sender_type_teacher = 'A Teacher';
        }
        else if($sender_details_teacher->role=='3')
        {
            $sender_type_teacher = 'An Institution';
        }

        $details_teacher = [
              'receiver_name'=>$receiver_details_teacher->name,
              'sender_name'=>$sender_details_teacher->name,
              'sender_type' => $sender_type_teacher,
              'body' => 'A request with '.$sender_type_teacher.' ('.$sender_details_teacher->name.') is approved by our Administration. <br><br><br>',
          ];

        Mail::to($receiver_details_teacher->email)->send(new NotifyMail($details_teacher));

         //delete from request_details
        $result = RequestDetails::where(['id'=>$id])->delete();

        Session::flash('success', 'Successfully approved');
        return json_encode(array('status'=>'ok','data'=>$id));
    }

    public function reject_request(Request $request,$id)
    {

        $data7777=RequestDetails::leftjoin('users as u1','request_details.sender_id','=','u1.id')
        ->leftjoin('users as u2','request_details.receiver_id','=','u2.id')
         ->where('request_details.id',$id)
         ->select('request_details.*','u1.name as sender_name','u2.name as receiver_name');



         //reject

         if($data7777->count() > 0)
         {


             $data7 = $data7777->first();

             //send mail to institution
             if($data7->sender_type=='Institution')
             {
                 $sender_details_institution = User::where(['id'=>$data7->receiver_id])->first();
                 $receiver_details_institution = User::where(['id'=>$data7->sender_id])->first();
             }
             else  if($data7->sender_type=='Teacher')
             {
                 $sender_details_institution = User::where(['id'=>$data7->sender_id])->first();
                 $receiver_details_institution = User::where(['id'=>$data7->receiver_id])->first();
             }



            if($sender_details_institution->role=='1')
            {
                $sender_type_institution = 'A Student';
            }
            else if($sender_details_institution->role=='2')
            {
                $sender_type_institution = 'A Teacher';
            }
            else if($sender_details_institution->role=='3')
            {
                $sender_type_institution = 'An Institution';
            }

            $details_institution = [
                  'receiver_name'=>$receiver_details_institution->name,
                  'sender_name'=>$sender_details_institution->name,
                  'sender_type' => $sender_type_institution,
                  'body' => 'A request with '.$sender_type_institution.' ('.$sender_details_institution->name.') is rejected by our Administration. <br><br><br>',
              ];

            Mail::to($receiver_details_institution->email)->send(new NotifyMail($details_institution));

              //delete from request_details
                 $result = RequestDetails::where(['id'=>$id])->delete();
         }

        Session::flash('success', 'Successfully reject');
         return json_encode(array('status'=>'ok','data'=>$id));

    }

    public function institution_teacher_need_approval(Request $request)
    {

        $institution_details = User::where(['role'=>'3','status'=>'active'])->orderBy('name','asc')->get();

        $data7=RequestDetails::leftjoin('users as u1','request_details.sender_id','=','u1.id')
        ->leftjoin('users as u2','request_details.receiver_id','=','u2.id')
        ->orderBy('u1.name','asc')
        ->where('request_details.type','Institution_Teacher')
        ->when($request->has("institution_id"),function($q)use($request){



               $institution_id  = $request->get("institution_id");
               if($institution_id!='')
                {
                   return $q->whereRaw(" ((request_details.sender_id ='".$institution_id."' and sender_type='Institution' and receiver_type='Teacher' ) or (request_details.receiver_id ='".$institution_id."' and receiver_type='Institution' and sender_type='Teacher')) ");
               }


        })->select('request_details.*','u1.name as sender_name','u2.name as receiver_name')->get();

          $thearray = [];
         if(count($data7) > 0)
         {
            foreach($data7 as $k2=>$v2)
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

       $data = $this->paginate_category($thearray);

       if($request->ajax()){
           return view('admin.institution_teacher.need_approval-pagination',['data'=>$data,'institution_details'=>$institution_details]);
       }
       return view('admin.institution_teacher.need_approval',['data'=>$data,'institution_details'=>$institution_details]);



    }

    public function institution_teacher_approved(Request $request)
    {

        $institution_details = User::where(['role'=>'3','status'=>'active'])->orderBy('name','asc')->get();

        $data7=InstitutionTeacher::leftjoin('users as u1','institution_teachers.user_id','=','u1.id')
        ->leftjoin('institution_admins as ia','institution_teachers.institution_id','=','ia.id')
        ->leftjoin('institutions as i','ia.institution_id','=','i.id')
        ->orderBy('u1.name','asc')

        ->when($request->has("institution_id"),function($q)use($request){



               $institution_id  = $request->get("institution_id");
               if(InstitutionAdmin::where('user_id',$institution_id)->count() > 0)
               {
                   $institution_id_org = InstitutionAdmin::where('user_id',$institution_id)->first()->institution_id;

                   if($institution_id!='')
                    {
                       return $q->where('institution_teachers.institution_id',$institution_id_org);
                   }
               }



        })->select('institution_teachers.*','u1.name as teacher_name','i.name as institution_name')->get();

          $thearray = [];
         if(count($data7) > 0)
         {
            foreach($data7 as $k2=>$v2)
            {


                        $thearray[]=array(
                            'id'=>$v2->id,
                            'teacher_name'=>$v2->teacher_name,
                            'institution_name'=>$v2->institution_name,
                            'created_at'=>$v2->created_at


                        );

            }
         }

       $data = $this->paginate_category_approved($thearray);

       if($request->ajax()){
           return view('admin.institution_teacher.approved-pagination',['data'=>$data,'institution_details'=>$institution_details]);
       }
       return view('admin.institution_teacher.approved',['data'=>$data,'institution_details'=>$institution_details]);



    }


    public function paginate_category($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institution_teacher_need_approval')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function paginate_category_approved($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institution_teacher_approved')] ;

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
     * @param  \App\Models\InstitutionTeacher  $institutionTeacher
     * @return \Illuminate\Http\Response
     */
    public function show(InstitutionTeacher $institutionTeacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstitutionTeacher  $institutionTeacher
     * @return \Illuminate\Http\Response
     */
    public function edit(InstitutionTeacher $institutionTeacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InstitutionTeacher  $institutionTeacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstitutionTeacher $institutionTeacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstitutionTeacher  $institutionTeacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstitutionTeacher $institutionTeacher)
    {
        //
    }
}
