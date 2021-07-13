<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;



class RoleMiddleware
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
        
    
        //User role is admin
        if ( Auth::check() && Auth::user()->is_admin() )
        {
            return $next($request);
        }
        //If user role is student
        if(Auth::check() && auth()->user()->role === 'it')
        {
             return view('it');
            
        }
        //If user role is teacher
        if(Auth::check() && auth()->user()->role ==='agent')
        {
             return view('user');
             
        }
        //default redirect
        return redirect('admin');
    }
    }

