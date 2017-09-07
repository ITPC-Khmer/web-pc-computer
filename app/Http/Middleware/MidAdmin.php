<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MidAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $isUser = 1, $isAdmin= 1)
    {
        if(!$request->session()->has('mysess.id'))
        {
            return redirect('/admin/login');
        }
//        echo $request->session()->get('mysess.role_id');
//        exit();
        if ($request->session()->get('mysess.role_id') - 0 == 2 && $isAdmin-0 == 1) {

            if ($isUser !=1){
                return redirect('/no-permission');
            }
            return $next($request);
        }
        if ($request->session()->get('mysess.role_id') - 0 == 1 && $isUser-0 == 1 ) {
            //return redirect('/no-permission');
            if ($isAdmin ==1){
                return redirect('/no-permission');
            }
            return $next($request);
        }
        return $next($request);

    }
}
