<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserDetail;
use App\Models\Institution;
use App\Models\SystemSetting;
use App\Models\InstitutionAdmin;

use Carbon\Carbon;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::LOGIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'role' => ['required', 'string'],
            'phone' => ['required', 'numeric', 'digits_between:10,15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


        if(isset($data['check_tutar']) && $data['check_tutar'] == 1)
        {
                        $role=2;


                    $user= User::create([
                        'name' => $data['name'],
                        'username' => $data['username'],
                        'email' => $data['email'],
                        //'role' => $data['role'],
                        'role'=> $role,
                        'phone' => $data['phone'], // Add 'phone' field
                        'password' => Hash::make($data['password']),
                        'status'=> 'active',


                    ]);

                    // dd($user);
                    // exit();

                    $user_id = $user->id;


                    //SystemSetting details

                    $system_settings = SystemSetting::first();

                    $student_default_subscription_day = $system_settings->student_default_subscription_day;
                    $teacher_default_subscription_day = $system_settings->teacher_default_subscription_day;
                    $institution_default_subscription_day = $system_settings->institution_default_subscription_day;
                    $default_country_id = $system_settings->default_country_id;
                    $default_city_id = $system_settings->default_city_id;


                    $start_date = Carbon::now();
                    $end_date = Carbon::now();
                    $user_type='Teacher';
                    $end_date = Carbon::now()->addDays($teacher_default_subscription_day);

                                //insert user_details

                    $user_details = UserDetail::create([
                        'user_type' => $user_type,
                        'country_id' => $default_country_id,
                        'city_id' => $default_city_id,
                        'user_id' => $user_id,
                        'created_by'=> $user_id,
                        'user_type'=> $user_type,
                        'subscription_start_date'=> $start_date,
                        'subscription_end_date'=> $end_date
                    ]);
                  


        }
        else
        {
                    $role=1;


                $user= User::create([
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    //'role' => $data['role'],
                    'role'=> $role,
                    'phone' => $data['phone'], // Add 'phone' field
                    'password' => Hash::make($data['password']),


                ]);

                // dd($user);
                // exit();

                $user_id = $user->id;


                //SystemSetting details

                $system_settings = SystemSetting::first();

                $student_default_subscription_day = $system_settings->student_default_subscription_day;
                $teacher_default_subscription_day = $system_settings->teacher_default_subscription_day;
                $institution_default_subscription_day = $system_settings->institution_default_subscription_day;
                $default_country_id = $system_settings->default_country_id;
                $default_city_id = $system_settings->default_city_id;


                $start_date = Carbon::now();
                $end_date = Carbon::now();


                $user_type='Student';
                $end_date = Carbon::now()->addDays($student_default_subscription_day);
                  //insert user_details

                $user_details = UserDetail::create([
                    'user_type' => $user_type,
                    'country_id' => $default_country_id,
                    'city_id' => $default_city_id,
                    'user_id' => $user_id,
                    'created_by'=> $user_id,
                    'user_type'=> $user_type,
                    'subscription_start_date'=> $start_date,
                    'subscription_end_date'=> $end_date
                ]);


        }


    return $user ;

    }
}
