<?php

namespace App\Http\Middleware;

use Closure;

class EmpCheck
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
//        if (Auth::check()){
//            if(Auth::user()->role != 1){
//                return redirect()->route('Admin.home');
//            }} else return redirect()->route('client');
        return $next($request);
    }
}
