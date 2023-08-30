<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //return $next($request);
        if(Auth::check())
         {
             if(Auth::user()->role == '4')  //1 Student, 2 Teacher , 3. Institution, 4. Admin
            {
                 return $next($request);
             }else if(Auth::user()->role == '1'){
                session()->flash('error', 'You don\'t have Admin access');
                 return redirect('/profile');
             }else if(Auth::user()->role == '2'){
                session()->flash('error', 'You don\'t have Admin access');
                 return redirect('/teacherprofile');
             }else if(Auth::user()->role == '3'){
                session()->flash('error', 'You don\'t have Admin access');
                 return redirect('/institutionprofile');
             }
             else{
                session()->flash('error', 'You don\'t have access');
                 return redirect('/');
             }
         }else
         {
            session()->flash('error', 'Please Login First');
             return redirect('/login');
         }
    }
}
