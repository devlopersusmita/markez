<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Contactus;
use App\Models\TermsandCondition;
use App\Models\Privacypolicy;
use App\Models\Aboutus;
use App\Models\AdminForm;
use App\Models\AdminFormField;
use App\Models\InstitutionTeacher;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;


use Illuminate\Support\Facades\Stroage;
use DB;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
     public function index(){

        return view('admin.index');
    }

    public function enquiry(Request $request)
    {



        $data7=Contactus::orderBy('contact_us.id','desc')->get();

          $thearray = [];
         if(count($data7) > 0)
         {
            foreach($data7 as $k2=>$v2)
            {


                        $thearray[]=array(
                            'firstname'=>$v2->firstname
                            ,'lastname'=>$v2->lastname
                            , 'email'=>$v2->email
                            ,'phone'=>$v2->phone
                            ,'address'=>$v2->address
                            , 'helpyou'=>$v2->helpyou
                            ,'id'=>$v2->id
                        );

            }
         }

       $data = $this->paginate_enquiry($thearray);

       if($request->ajax()){
           return view('admin.enquiry-pagination',['enquirys'=>$data]);
       }
       return view('admin.enquiry',['enquirys'=>$data]);



    }
     public function paginate_enquiry($items, $perPage = 10, $page = null, $options = [])
        {
            $options = ['path' => Route('enquiry')] ;

            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
            $items = $items instanceof Collection ? $items : Collection::make($items);
            return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        }
        public function enquirydelete($id)
        {

          $enquiry = Contactus::find($id);
          $result =$enquiry->delete();

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
        public function termsandcondition(Request $request)
        {



            $data7=TermsandCondition::orderBy('terms_and_condition.id','desc')->select('terms_and_condition.*')->get();

              $thearray = [];
             if(count($data7) > 0)
             {
                foreach($data7 as $k2=>$v2)
                {




                            $thearray[]=array(
                                'terms_contents'=>$v2->terms_contents



                                ,'id'=>$v2->id

                            );

                }
             }

           $data = $this->paginate_termsandcondition($thearray);

           if($request->ajax()){
               return view('admin.termsandcondition.termsandcondition-pagination',['termsandconditions'=>$data]);
           }
           return view('admin.termsandcondition.termsandcondition',['termsandconditions'=>$data]);



        }
         public function paginate_termsandcondition($items, $perPage = 3, $page = null, $options = [])
            {
                $options = ['path' => Route('termsandcondition')] ;

                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                $items = $items instanceof Collection ? $items : Collection::make($items);
                return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
            }


            public function termsandconditionupdate(Request $request,$id)
            {

                $terms_contents = $request->input('terms_contents_value');
                 $termsandconditions =  TermsandCondition::where('id',$id)->first();

                    $termsandconditions->terms_contents = $terms_contents;







                    if($termsandconditions->save()){

                        $data7=TermsandCondition::orderBy('terms_and_condition.id','desc')->select('terms_and_condition.*')->get();

                         Session::flash('success', 'successfully  updated!');

                         return response()->json([
                          'message' => 'successfully  updated!',
                          'data'=> $data7
                        ]);
                    }else{
                         Session::flash('error', 'Something wrong!');
                         return response()->json([
                              'message' => 'Something wrong!'
                            ]);
                    }

            }


            public function termsandconditionview($id)
            {


                $termsandconditions = TermsandCondition::find($id);
                //return $categories;

                return json_encode(array('status'=>'ok','data'=>$termsandconditions));


            }


            public function privacypolicy(Request $request)
            {



                $data7=Privacypolicy::orderBy('privacy_policy.id','desc')->select('privacy_policy.*')->get();

                //   $thearray = [];
                //  if(count($data7) > 0)
                //  {
                //     foreach($data7 as $k2=>$v2)
                //     {




                //                 $thearray[]=array(
                //                     'privacy_policy'=>$v2->privacy_policy



                //                     ,'id'=>$v2->id

                //                 );

                //     }
                //  }

               $data = $this->paginate_privacypolicy($data7);

               if($request->ajax()){
                   return view('admin.privacypolicy.privacypolicy-pagination',['privacypolicys'=>$data]);
               }
               return view('admin.privacypolicy.privacypolicy',['privacypolicys'=>$data]);



            }
             public function paginate_privacypolicy($items, $perPage = 3, $page = null, $options = [])
                {
                    $options = ['path' => Route('privacypolicy')] ;

                    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                    $items = $items instanceof Collection ? $items : Collection::make($items);
                    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
                }


                public function privacypolicyupdate(Request $request,$id)
                {

                    $exist_no = Privacypolicy::orderBy('privacy_policy.id','desc')->select('privacy_policy.*')->get()->count();

                    if($exist_no == 0) {
                    $privacy_policy = $request->input('privacy_policy_value');
                     $privacypolicys = new Privacypolicy();

                        $privacypolicys->privacy_policy = $privacy_policy;







                        if($privacypolicys->save()){

                            $data7=Privacypolicy::orderBy('privacy_policy.id','desc')->select('privacy_policy.*')->get();

                             Session::flash('success', 'successfully  updated!');

                             return response()->json([
                              'message' => 'successfully  updated!',
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

                        $privacy_policy = $request->input('privacy_policy_value');

                        $privacypolicys =  Privacypolicy::first();

                        // return response()->json([
                        //     'data' => $privacypolicys
                        //   ]);

                        $privacypolicys->privacy_policy = $privacy_policy;



                           if($privacypolicys->save()){

                               $data7=Privacypolicy::orderBy('privacy_policy.id','desc')->select('privacy_policy.*')->get();

                                Session::flash('success', 'successfully  updated!');

                                return response()->json([
                                 'message' => 'successfully  updated!',
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


                public function privacypolicyview($id)
                {


                    $privacypolicys = Privacypolicy::get();
                    //return $categories;



                    return json_encode(array('status'=>'ok','data'=>$privacypolicys));


                }


        public function aboutus(Request $request)
        {



            $data7=Aboutus::orderBy('about_us.id','desc')->select('about_us.*')->get();

              $thearray = [];
             if(count($data7) > 0)
             {
                foreach($data7 as $k2=>$v2)
                {




                            $thearray[]=array(
                                'aboutus_content'=>$v2->aboutus_content
                                ,'aboutus_banner'=>$v2->aboutus_banner
                                ,'aboutus_siteimage'=>$v2->aboutus_siteimage


                                ,'id'=>$v2->id

                            );

                }
             }

           $data = $this->paginate_aboutus($thearray);

           if($request->ajax()){
               return view('admin.aboutus.aboutus-pagination',['aboutuss'=>$data]);
           }
           return view('admin.aboutus.aboutus',['aboutuss'=>$data]);



        }
         public function paginate_aboutus($items, $perPage = 3, $page = null, $options = [])
            {
                $options = ['path' => Route('aboutus')] ;

                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                $items = $items instanceof Collection ? $items : Collection::make($items);
                return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
            }


            public function aboutusupdate(Request $request,$id)
            {

                $aboutus_content = $request->input('aboutus_content_value');

                $aboutus_banner=$request->old_aboutus_banner;


                if($request->file('aboutus_banner'))
                {
                    if(file_exists(public_path().'/'.$request->old_aboutus_banner))
                    {
                        if($request->old_aboutus_banner!='')
                        {
                        unlink(public_path().'/'.$request->old_aboutus_banner);
                        }
                    }

                        $image=$request->file('aboutus_banner') ;


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

                                $aboutus_banner = $attachment_1;
                            }
                            else
                            {
                               return response()->json(['status'=>'error','error'=>'aboutus_banner  couldn\'t save, please try again later!']);
                            }
                         }
                }

                $aboutus_siteimage=$request->old_aboutus_siteimage;


                if($request->file('aboutus_siteimage'))
                {
                    if(file_exists(public_path().'/'.$request->old_aboutus_siteimage))
                    {
                        if($request->old_aboutus_siteimage!='')
                        {
                        unlink(public_path().'/'.$request->old_aboutus_siteimage);
                        }
                    }

                        $image=$request->file('aboutus_siteimage') ;


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

                                $aboutus_siteimage = $attachment_1;
                            }
                            else
                            {
                               return response()->json(['status'=>'error','error'=>'aboutus_siteimage  couldn\'t save, please try again later!']);
                            }
                         }
                }
                 $aboutus =  Aboutus::where('id',$id)->first();
                 if($aboutus_banner) {
                    $aboutus->aboutus_banner = $aboutus_banner;
                }
                if($aboutus_siteimage) {
                    $aboutus-> aboutus_siteimage= $aboutus_siteimage;
                }

                    $aboutus->aboutus_content = $aboutus_content;










                    if($aboutus->save()){

                        $data7=Aboutus::orderBy('about_us.id','desc')->select('about_us.*')->get();

                         Session::flash('success', 'successfully  updated!');

                         return response()->json([
                          'message' => 'successfully  updated!',
                          'data'=> $data7
                        ]);
                    }else{
                         Session::flash('error', 'Something wrong!');
                         return response()->json([
                              'message' => 'Something wrong!'
                            ]);
                    }

            }


            public function aboutusview($id)
            {


                $aboutus = Aboutus::find($id);
                //return $categories;
                $asset = asset('');
                return json_encode(array('status'=>'ok','data'=>$aboutus,'asset'=>$asset));


            }

            public function adminteacherstatus(Request $request)
            {



               $institution_teachers=InstitutionTeacher::leftJoin('institutions','institutions.id','=','institution_teachers.institution_id')->leftjoin('users','users.id','=','institution_teachers.user_id')->orderBy('id','desc')->select('institution_teachers.*','institutions.name as institution_name','users.name as teacher_name')->get();

              // dd($institution_teachers);

                 $thearray = [];
                if(count($institution_teachers) > 0)
                {
                   foreach($institution_teachers as $k2=>$v2)
                   {




                               $thearray[]=array(
                                   'institution_id'=>$v2->institution_id
                                   , 'institution_name'=>$v2->institution_name
                                   , 'teacher_name'=>$v2->teacher_name
                                   ,'user_id'=>$v2->user_id
                                   ,'status'=>$v2->status
                                  ,'id'=>$v2->id
                               );

                   }
                }

              $data = $this->paginate_adminteacherstatus($thearray);

              if($request->ajax()){
                  return view('admin.institution.institution-teacher-pagination',['institution_teachers'=>$data]);
              }
              return view('admin.institution.institution-teacher',['institution_teachers'=>$data]);



           }


           public function paginate_adminteacherstatus($items, $perPage = 10, $page = null, $options = [])
           {
               $options = ['path' => Route('adminteacherstatus')] ;

               $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
               $items = $items instanceof Collection ? $items : Collection::make($items);
               return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
           }

           public function teacherapprove(Request $request, $id)
           {
               //dd($id);
            $data = InstitutionTeacher::findorfail($id);
            //dd($data);

            $data->status = 'approve'; //Approved
            $data->save();

            $user = User::where('id', $data->user_id)->first();
            //dd($user);
            $user->status = "active";
            $user->save();


            return redirect()->back(); //Redirect user somewhere
         }

         public function teacherdecline(Request $request, $id)
         {
            $data = InstitutionTeacher::findorfail($id);
            $data->status = 'reject'; //Declined
            $data->save();
            $user = User::where('id', $data->user_id)->first();
            $user->status = 'inactive';
            $user->save();


            return redirect()->back(); //Redirect user somewhere
         }


     public function adminform(Request $request)
     {
            $form=AdminForm::orderBy('admin_form.id','desc')->select('admin_form.*')->get();

                $thearray = [];
                if(count($form) > 0)
                {
                    foreach($form as $k2=>$v2)
                    {

                    $field_data=AdminFormField::orderBy('admin_form_field.id','desc')->where('form_id',$v2->id)->select('admin_form_field.*')->get();

                                $thearray[]=array(
                                    'form_name'=>$v2->form_name

                                    ,'form_status'=>$v2->form_status
                                    ,'created_at'=>$v2->created_at
                                    ,'id'=>$v2->id
                                    ,'total_field'=>$field_data->count()
                                );

                    }
                }
                // dd($thearray);
                $data = $this->paginate_adminform($thearray);

                if($request->ajax()){
                    return view('admin.form.form-pagination',['formdata'=>$data]);
                }
                return view('admin.form.form',['formdata'=>$data]);





    }
        public function paginate_adminform($items, $perPage = 3, $page = null, $options = [])
            {
                $options = ['path' => Route('adminform')] ;

                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                $items = $items instanceof Collection ? $items : Collection::make($items);
                return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
            }


            public function adminaddnewform(Request $request)
            {

                  $v = Validator::make($request->all(),[
                         'form_name' => 'required',


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
                                    $form = new AdminForm();
                                     $form->form_name = $request->form_name;





                                 if($form->save())
                                 {
                                     Session::flash('success', 'Successfully form added!');

                                     return response()->json([
                                     'message' => 'successfully form added!'
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


            public function adminviewform($id)
            {


                $form = AdminForm::select('admin_form.*')->find($id);


                $field_data=AdminFormField::where('form_id',$id)->select('admin_form_field.*')->get();


                $data = array('form'=>$form,'field_data'=>$field_data);


                return json_encode(array('status'=>'ok','data'=>$data));


            }

            public function adminformdelete($id)
            {

            $form = AdminForm::find($id);
            $result =$form->delete();

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

public function adminformfielddelete($id)
{

  $formfield = AdminFormField::find($id);
  $result =$formfield->delete();

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
public function adminfieldstore(Request $request)
 {

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

                    $FormField = new AdminFormField();
                    $FormField->form_id = $request->input('form_id');
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
                    'message' => 'Successfully Field added!'
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


public function adminformupdate(Request $request,$id)
{



    $v = Validator::make($request->all(),[
        'form_name' => 'required|unique:admin_form,form_name,'.$id,


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

     $form_name = $request->input('form_name');



     $form =  AdminForm::where('id',$id)->first();

        $form->form_name = $request->form_name;





        if($form->save()){
             Session::flash('success', 'successfully form updated!');

             return response()->json([
              'message' => 'successfully form updated!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                  'message' => 'Something wrong!'
                ]);
             }     }

}

}
