<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

         $role = Auth::User()->role; 

            switch ($role) {
                case 'Admin':
                return redirect('/admin');
            break;
                case 'Driver':
                return redirect('/requests/dashboard');
            break;
                 case 'Transport Officer':
                return redirect('/transportofficer');
            break; 
                default:
                return '/'; 
            break;
            }
        }

        return $next($request);
    }
}
