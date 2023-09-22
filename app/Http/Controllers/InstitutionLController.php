<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Course;
use App\Models\InstitutionAdmin;
use App\Models\Institution;
use Illuminate\Support\Facades\Hash;
use App\Models\InstitutionSubcriptionPackage;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class InstitutionLController extends Controller
{
    public function instlogin()
    {
      return view('theme.institutionlogin');
    }


    public function postinstlogin(Request $request)
    {


        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');


        $user = Institution::where('email', $email)->first();
        if (($user && Hash::check($password, $user->password)))
        {

                if($user->domain_status == 'pending' && $user->payment_status == 'pending' && $user->inst_status == 'inactive') {
                    $subscriptions = InstitutionSubcriptionPackage::orderBy('title','asc')->get();
                    return view('theme.step2',['subscriptions'=>$subscriptions,'institution_id'=>$user->id]);
                }
                if($user->domain_status == 'complete' && $user->payment_status == 'pending' && $user->inst_status == 'inactive') {
                    $subscriptions = InstitutionSubcriptionPackage::orderBy('title','asc')->get();
                    $order_details = Order::where('user_id',$user->id)->first();
                    return view('theme.step3',['subscriptions'=>$subscriptions,'institution_id'=>$user->id,'order_details'=>$order_details]);
                }
                if($user->domain_status == 'complete' && $user->payment_status == 'paid' && $user->inst_status == 'inactive') {
                    return redirect('/instlogin')->with('error', 'Your status is Inactive, Please contact with Administrator');

                }
                if($user->domain_status == 'complete' && $user->payment_status == 'paid' && $user->inst_status == 'active') {
                    Session::put('institute_name', $user->name);

                    return redirect()->route('institutionprofile', ['institution_id' => $user->id]);

                }

        }
        else
        {
            // Invalid credentials
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
        }






}

public function signout(Request $request) {
    Session::flush();

    return redirect('/');
}



}
