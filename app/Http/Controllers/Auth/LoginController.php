<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
     public function redirectTo(){

    // User role
    $role = Auth::user()->role; 

    // Check user role
    switch ($role) {
        
        case 'admin':
                return '/admin';
            break;
         case 'driver':
                return '/requests/dashboard';
                break;
         case 'to':
                return '/transportofficer';
                break; 
        default:
                return '/'; 
            break;
    }
                return $next($request);
    

}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
