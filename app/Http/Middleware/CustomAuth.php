<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use Redirect;

class CustomAuth
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
         $path= $request->path();
         if(!Auth::check()){
            //   echo "hey its me !!" . $path;
            
                //
                //echo "hey its me !";
            
                //return redirect('/user-register');
                //dd(Auth::User());
               return redirect("user-login")->withSuccess('New Post created !!');;
              
        // 
        // //&& (session()->get('user'))
        
          }
          //return view("login");

        // if(Auth::check()){
        //     echo "hello its me ";
           
        //     

        // }
        
        return $next($request);
    }
}
