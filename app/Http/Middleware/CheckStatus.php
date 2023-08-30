<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
      
        //If the status is not approved redirect to login
       
            if(Auth::check() && Auth::user()->status != 'active')
            {
                Auth::logout();
                return redirect('/login')->with('error', 'Your status is Inactive, Please contact with Administrator');
            }
            return $response;

        

    }
}