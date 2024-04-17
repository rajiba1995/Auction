<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        // Store the previous URL in the session
        Session::put('previousUrl', url()->previous());
        // Redirect to the login page
        return view('auth.login');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email', // assuming users table has email column
            'password' => 'required',
        ]);
    
        // If validation passes, attempt to log in the user
        if ($this->attemptLogin($request)) {
            // Get the previous URL from the session
            $previousUrl = Session::pull('previousUrl', '/');
            // Redirect the user to the previous URL
            return redirect()->intended($previousUrl);
        }
    
        // If login attempt fails, throw ValidationException
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}
