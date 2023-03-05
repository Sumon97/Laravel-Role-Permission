<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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


    /*
    //authenticated logic 

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.home');
        } elseif ($user->hasRole('superadmin')) {
            return redirect()->route('super.home');
        } else {
            return redirect()->route('home');
        }

    */


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
