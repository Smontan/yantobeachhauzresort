<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
     *.
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    // Login Authentication
    protected function authenticated()
    {
        if (Auth::user()->role_as == '1') {
            flash()
                ->option('timeout', 3000)
                ->addSuccess('Welcome to Admin Dashboard');
            return redirect('/admin/dashboard');
        } else {

            flash()
                ->option('timeout', 3000)
                ->addSuccess('Login successfully');
            // return redirect('/')->with('status', 'Login successfully!');
            return redirect('/');
        }
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
