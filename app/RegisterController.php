<?php

namespace App\Http\Controllers;
use App\Models\Institution;

use App\Models\InstitutionSubcriptionPackage;
use App\Models\SystemSetting;
use App\Models\User;
use App\Models\InstitutionAdmin;
use App\Models\UserDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



use Carbon\Carbon;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showStep1()
    {


        return view('theme.step1');
    }

    public function showStep2(Request $request)
    {

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
               ]);
               $user_id = $user->id;


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
                   'created_by' => $user_id,
                   'user_id'=> $user_id

               ]);


       $user_details = UserDetail::create([
           'user_type' => 'Institution',
           'country_id' => $default_country_id,
           'city_id' => $default_city_id,
           'user_id' => $user_id,
           'created_by'=> $user_id,
           'user_type'=> 'Institution',
           'subscription_start_date'=> $start_date,
           'subscription_end_date'=> $end_date
       ]);


       return view('theme.step2',['subscriptions'=>$subscriptions]);
    }

    public function showStep3(Request $request)
    {

        $subscriptions = InstitutionSubcriptionPackage::orderBy('title','asc')->get();
        $start_date = Carbon::now();
        $end_date = Carbon::now();

         $request->session()->put('step2', $request->all());
         $data = array_merge($request->session()->get('step1'), $request->session()->get('step2'), $request->all());
      

         $institution = Institution::where('email',$data['email'])->first();

         if ($institution) {


            $institution->logo = $data['logo'];
            $institution->domain_subdomain = $data['domain_subdomain'];
            $institution->gov_registration_doc = $data['gov_registration_doc'];
             $institution->domain_status = 'completed';
            $institution->save();
        }





        return view('theme.step3',['subscriptions'=>$subscriptions]);
    }

    public function submit(Request $request)
    {
        $data = array_merge($request->session()->get('step1'), $request->session()->get('step2'), $request->all());


        // Clear session data
        $request->session()->forget('step1');
        $request->session()->forget('step2');



        return redirect('/')->with('success', 'Registration successful!');
    }
}
