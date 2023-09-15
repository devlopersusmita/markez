<?php

namespace App\Http\Controllers;
use App\Models\Institution;
use App\Models\InstitutionSubcription;

use App\Models\InstitutionSubcriptionPackage;
use App\Models\SystemSetting;
use App\Models\User;
use App\Models\InstitutionAdmin;
use App\Models\UserDetail;
use App\Models\Order;
use App\Models\InstitutionTheme;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Stroage;
use DB;

use File;
use Session;




use Carbon\Carbon;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showStep1()
    {


        return view('theme.step1');
    }
    public function Step1submit(Request $request)
    {
        $v = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/[0-9]{9}/',

            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',


        ]);

        if ($v->fails())
        {
           return redirect()->back()
                ->withErrors($v)
                ->withInput();


        }

        else {


            $request->session()->put('step1', $request->all());
            $subscriptions = InstitutionSubcriptionPackage::orderBy('title','asc')->get();
            $data = array_merge($request->session()->get('step1'));

            $system_settings = SystemSetting::first();

            $student_default_subscription_day = $system_settings->student_default_subscription_day;
            $teacher_default_subscription_day = $system_settings->teacher_default_subscription_day;
            $institution_default_subscription_day = $system_settings->institution_default_subscription_day;
            $default_country_id = $system_settings->default_country_id;
            $default_city_id = $system_settings->default_city_id;


            $start_date = Carbon::now();
            $end_date = Carbon::now();

                    $user= User::create([
                       'name' => $data['name'],


                       'email' => $data['email'],
                       //'role' => $data['role'],
                       'role'=> 3,
                       'phone' => $data['phone'], // Add 'phone' field
                       'password' => Hash::make($data['password']),
                       'status'=> 'active',
                   ]);
                   $user_id = $user->id;
                   //dd($user_id);


                   $name = $data['name'];
                   $slug = Str::slug($data['name']);
                           $institution= Institution::create([
                               'name' => $name,
                               'slug' => $slug,
                               'email' => $data['email'],

                               'phone' => $data['phone'], // Add 'phone' field
                               'password' => Hash::make($data['password']),
                               'start_date' => $start_date,
                               'end_date' => $end_date,
                               'created_by'=> $user_id,



                           ]);

               $institution_id = $institution->id;
                   $institution_admin= InstitutionAdmin::create([
                       'institution_id' => $institution_id,
                       'access' => 'dashboard',
                       'created_by' => $institution_id,
                       'user_id'=> $institution_id

                   ]);


           $user_details = UserDetail::create([
               'user_type' => 'Institution',
               'country_id' => $default_country_id,
               'city_id' => $default_city_id,
               'user_id' => $institution_id,
               'created_by'=> $institution_id,
               'user_type'=> 'Institution',
               'subscription_start_date'=> $start_date,
               'subscription_end_date'=> $end_date
           ]);


           $institution_theme_details = new InstitutionTheme();
           $institution_theme_details->institution_id = $institution_id;
           $institution_theme_details->theme_id = 1;

           $institution_theme_details->save();

           return redirect()->route('register.step2',['subscriptions'=>$subscriptions,'institution_id'=>$institution_id]);


        }


    }

    public function showStep2(Request $request)
    {
        $subscriptions = InstitutionSubcriptionPackage::orderBy('title','asc')->get();

        $institution = Institution::where('id',$request->institution_id)->first();

        //dd($users_id);


             $institution_id = $institution->id;


           return view('theme.step2',['subscriptions'=>$subscriptions,'institution_id'=>$institution_id]);




    }
    public function Step2submit(Request $request)
    {
        $v = Validator::make($request->all(),[
            'logo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gov_registration_doc' => 'required|mimes:doc,pdf|max:2048',


        ]);
        if ($v->fails())
        {

            return redirect()->back()
                ->withErrors($v)
                ->withInput();
        }

        else
        {
            $subscriptions = InstitutionSubcriptionPackage::orderBy('title','asc')->get();

            $institution = Institution::where('id',$request->institution_id)->first();

            //dd($users_id);


                 $institution_id = $institution->id;
                 $subscription_id = $request->input('subscription');
                    //dd($subscription_id);


                    $institution_subscription_package = InstitutionSubcriptionPackage::where('id',$subscription_id)->first();


                    $subscription_price =$institution_subscription_package->price;



                    $current_date = date('Y-m-d H:i:s');
                    $start_date = $current_date;
                    $days = $institution_subscription_package->days;

                    $end_date = date('Y-m-d', strtotime($start_date. ' + '.$days.' days'));




                    if($request->hasfile('logo'))
                    {
                            $image=$request->file('logo') ;


                        $originName = $image->getClientOriginalName();
                        $fileName = pathinfo($originName, PATHINFO_FILENAME);
                        $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

                        $extension = $image->getClientOriginalExtension();
                        $fileName = $institution_id.'_'.$fileName.'_'.time().'.'.$extension;

                        if (in_array($extension, ['png','jpg','jpeg',]))
                        {
                            $image->move(public_path().'/images/logo/institution/', $fileName);

                                //  echo '<br>attachment_1='.$attachment_1;


                                    $attachment_1 =  'images/logo/institution/'.$fileName;

                                    $logo = $attachment_1;




                        }




                }


                if($request->hasfile('gov_registration_doc'))
                {
                        $image=$request->file('gov_registration_doc') ;


                    $originName = $image->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

                    $extension = $image->getClientOriginalExtension();
                    $fileName = $institution_id.'_'.$fileName.'_'.time().'.'.$extension;

                    if (in_array($extension, ['pdf','doc']))
                    {
                        $image->move(public_path().'/images/gov_registration_doc/institution/', $fileName);

                        //  echo '<br>attachment_1='.$attachment_1;


                                $attachment_1 =  'images/gov_registration_doc/institution/'.$fileName;

                                $gov_registration_doc = $attachment_1;




                    }




            }









                if ($institution)
                {


                        $institution->logo = $logo;

                        $institution->domain_subdomain = $request->domain_subdomain;

                        $institution->gov_registration_doc = $gov_registration_doc;
                        $institution->domain_status = 'complete';
                        $institution->save();

                }

                $order_details = new Order();
                $order_details->user_id = $institution_id;
                $order_details->course_id = 0;
                $order_details->status = 'Pending';
                $order_details->type = 'subcription';
                $order_details->total = $subscription_price;
                $order_details->days = $days; $order_details->institution_subcription_package_id = $subscription_id;
                $order_details->created_by = $institution_id;
                $order_details->start_date = $start_date;
                $order_details->end_date = $end_date;
                $order_details->save();




                return redirect()->route('register.step3',['subscriptions'=>$subscriptions,'institution_id'=>$institution_id,'order_details'=>$order_details]);




        }

    }
    public function showStep3(Request $request)
    {
        $subscriptions = InstitutionSubcriptionPackage::orderBy('title','asc')->get();

        $institution = Institution::where('id',$request->institution_id)->first();

        //dd($users_id);


             $institution_id = $institution->id;

        return view('theme.step3',['subscriptions'=>$subscriptions,'institution_id'=>$institution_id,'order_details'=>$order_details]);





    }

    public function submit(Request $request)
    {




        return redirect('/')->with('success', 'Registration successful!');
    }
}
