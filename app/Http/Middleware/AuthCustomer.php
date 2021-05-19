<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //to prevent accessing the dashboard page without login
        if(!session()->has('LoggedCustomer') && $request->path() !='customer' ){
            return redirect('customer')->with('fail','You must be logged in');
        }

        //to prevent accessing the login page if already logged in
        if(session()->has('LoggedCustomer') && $request->path() == 'customer' ){
            return redirect('customerdashboard')->with('fails','You are already logged in');; //redirects to the dashboard
        }

        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
        ->header('Pragma','no-cache')
        ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
