<?php

namespace App\Http\Controllers;

use App\Models\InstitutionTeacher;
use App\Models\InstitutionAdmin;
use Illuminate\Http\Request;


use App\Models\RequestDetails;
use App\Models\Page;
use App\Models\Institution;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;

use Mail;

use App\Mail\NotifyMail;

use Illuminate\Support\Str;


use Illuminate\Support\Facades\Validator;



class InstitutionPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function institutionpage(Request $request)
    {


         //dd($user_id);
         //$userId = Auth::id();
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


         //$user_id = $user->id;

        $data7=Page::orderBy('pages.id','desc')->where('created_by',$user_id)->select('pages.*')->get();

          $thearray = [];
         if(count($data7) > 0)
         {
            foreach($data7 as $k2=>$v2)
            {


                        $thearray[]=array(
                            'title'=>$v2->title
                            ,'slug'=>$v2->slug
                            ,'content'=>$v2->content

                            ,'id'=>$v2->id
                        );

            }
         }


       return view('theme.institution.institution-page',['pages'=>$thearray,'user_id'=>$user_id,'user_ids'=>$user_ids]);



    }


public function pagestore(Request $request)
 {


    //$userId = Auth::id();

    $user_id = $request->user_id;

         //$user = Institution::where('created_by',$user_id)->first();
        // $user_id = $user->id;


    $v = Validator::make($request->all(),[
        'title' => 'required',

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
        $content='';
        if($request->content_value!='')
        {
            $content=$request->content_value;
        }



                $title = $request->input('title');


                // $created_by = Institution::id();

                // $institution = Institution::where('email',$data['email'])->first();
                // dd($created_by);

                $slug = Str::slug($request->input('title'));


                    $page = new Page();
                    $page->title = $request->title;
                    $page->slug = $slug;
                    $page->created_by =  $request->user_id;
                    $page->content =  $content;



                if($page->save())
                {
                    Session::flash('success', 'Successfully page added!');

                    return response()->json([
                    'message' => 'successfully page added!'
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


public function pageupdate(Request $request,$id)
{


    $v = Validator::make($request->all(),[
        'title' => 'required|unique:pages,title,'.$id,
         //'title' => 'required'.$id,

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
        $content='';
        if($request->content_value!='')
        {
            $content=$request->content_value;
        }
     $title = $request->input('title');


     $page =  Page::where('id',$id)->first();
        $page->title = $request->title;
        $page->created_by =  $request->user_id;


         $page->content = $content;


        if($page->save()){
             Session::flash('success', 'successfully page updated!');

             return response()->json([
              'message' => 'successfully page updated!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                  'message' => 'Something wrong!'
                ]);
             }     }

}


public function viewpage($id)
{


    $page = Page::find($id);

    return json_encode(array('status'=>'ok','data'=>$page));


}


public function pagedelete($id)
{

  $page = Page::find($id);
  $result =$page->delete();

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

}
