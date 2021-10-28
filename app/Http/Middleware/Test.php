<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Test
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
        if(Auth::check()){
            if(Auth::user()->usertype=='Admin'){
                //dd('Php department room no 101');
                return redirect()->route('hr.dashboard');
            }else if (Auth::user()->usertype=='User'){
               // dd('Asp.net department room no 102');
               return redirect()->route('hk.dashboard');
            }
        }else{
            return redirect('/login');
           // return redirect()->back();
        }
           
    }
}
