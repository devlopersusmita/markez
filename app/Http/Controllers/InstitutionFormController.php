<?php

namespace App\Http\Controllers;

use App\Models\InstitutionTeacher;
use App\Models\InstitutionAdmin;
use Illuminate\Http\Request;


use App\Models\RequestDetails;
use App\Models\Page;
use App\Models\Institution;
use App\Models\Form;
use App\Models\FormField;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;

use Mail;

use App\Mail\NotifyMail;

use Illuminate\Support\Str;


use Illuminate\Support\Facades\Validator;



class InstitutionFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function institutionform(Request $request)
    {


        
         //$userId = Auth::id();
         if($request->institution_id == null) {
                $user_id = $_GET['institution_id'];
            } else {
                $user_id = $request->institution_id;
            }
            // dd($user_id);
        if($user_id){
                $user = Institution::where('id',$user_id)->first();
                
                $user_id = $user->id;
    
            $data7=Page::orderBy('pages.id','desc')->where('created_by',$user_id)->select('pages.*')->get();
            $form=Form::orderBy('form.id','desc')->where('institution_id',$user_id)->leftJoin('pages', 'pages.id', '=', 'form.page_id')->select('form.*','pages.title as page_name')->get();
    
            $thearray = [];
            if(count($form) > 0)
            {
                foreach($form as $k2=>$v2)
                {
    
                $field_data=FormField::orderBy('form_field.id','desc')->where('form_id',$v2->id)->select('form_field.*')->get();
    
                            $thearray[]=array(
                                'form_name'=>$v2->form_name
                                ,'page_name'=>$v2->page_name
                                ,'form_status'=>$v2->form_status
                                ,'created_at'=>$v2->created_at
                                ,'id'=>$v2->id
                                ,'total_field'=>$field_data->count()
                            );
    
                }
            }
          
            $formdata = $this->paginate_page($thearray);
    
            if($request->ajax()){
                return view('theme.institution.institution-form-pagination',['pages'=>$data7,'formdata'=> $formdata]);
            }
            return view('theme.institution.institution-form',['pages'=>$data7,'formdata'=> $formdata]);
    
        }else{

            return redirect('/login');
        }

        


    }
     public function paginate_page($items, $perPage = 10, $page = null, $options = [])
        {
            $options = ['path' => Route('institutionpage')] ;

            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
            $items = $items instanceof Collection ? $items : Collection::make($items);
            return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        }


public function fieldstore(Request $request)
 {
    //  return response()->json([
    //         'type'=>'error',
    //         'message' =>$request->all()
    //     ]);

   // $userId = Auth::id();

 if($request->institution_id == null) {
                $user_id = $_GET['institution_id'];
            } else {
                $user_id = $request->institution_id;
            }

         $user = Institution::where('created_by',$user_id)->first();
         $user_id = $user->id;


    $v = Validator::make($request->all(),[
        'field_type' => 'required',

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
        


               
                    if($request->input('field_type') == "input"){
                        $field_value=$request->input('field_input_value');
                        $field_option_value="";
                    }
                    if($request->input('field_type') == "dropdown"){
                        $dropdown_field_value=$request->input('dropdown_value');
                         $dropdown_field_option=$request->input('dropdown_option');
                        $field_value=json_encode($dropdown_field_value);
                         $field_option_value=json_encode($dropdown_field_option);
                    }
                    if($request->input('field_type') == "radio"){
                        $radio_field_value=$request->input('radio_value');
                        $radio_field_option=$request->input('radio_option');
                         $field_value=json_encode($radio_field_value);
                         $field_option_value=json_encode($radio_field_option);
                    }
                    if($request->input('field_type') == "checkbox"){
                        $checkbox_field_text=$request->input('checkbox_text');
                        $checkbox_field_value=$request->input('checkbox_value');
                         $field_value=$checkbox_field_value;
                         $field_option_value=$checkbox_field_text;
                    }

                    $FormField = new FormField();
                    $FormField->form_id = $request->input('form_id');;
                    $FormField->field_type = $request->input('field_type');;
                    $FormField->field_name = $request->input('field_name');;
                    $FormField->field_value =  $field_value;
                    $FormField->field_option_value =  $field_option_value;
                     
                    $FormField->field_order =  $request->input('field_order');;
                    $FormField->field_placeholder_value =  $request->input('field_placeholder_value');;
                    $FormField->field_id =  $request->input('field_id');;
                    $FormField->field_class =  $request->input('field_class');;


                if($FormField->save())
                {
                    Session::flash('success', 'Successfully Field added!');

                    return response()->json([
                    'message' => 'successfully Field added!'
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


public function pageupdate(Request $request, Page $page,$id)
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
public function addnewform(Request $request)
{


     //dd($user_id);
    // $userId = Auth::id();
if($request->institution_id == null) {
                $user_id = $_GET['institution_id'];
            } else {
                $user_id = $request->institution_id;
            }


     $user = Institution::where('created_by',$user_id)->first();
     $user_id = $user->id;
    
    $data7=Page::orderBy('pages.id','desc')->where('created_by',$user_id)->select('pages.*')->get();

    
 
   return view('theme.institution.institution-new-form',['pages'=>$data7]);



}

}
