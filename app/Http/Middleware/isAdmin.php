<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class isAdmin
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

        if (Auth::user() &&  Auth::user()->hasRole('admin')) {
                return $next($request);
         }
         elseif(!Auth::check())
         {
            return redirect('admin/login');
         }
         else{
             return redirect()->route('index');
         }
   
    }
}
