<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    // Show the admin login form
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    public function showClientLoginForm()
    {
        return view('auth.client-login');
    }

    // Handle admin login
    public function login(Request $request)
    {
        // Validate the login data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Attempt to log in the admin
        if (Auth::guard('admin')->attempt($credentials)) {
            //  dd('id');
            return redirect()->intended('/admin/dashboard');
        }
        // Authentication failed
        return back()
        ->withErrors(['loginError' => 'Invalid login credentials'])
        ->withInput($request->only('email')); 
    }
    public function adminlogin(Request $request)
    {
        // Validate the login data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Attempt to log in the admin
        if (Auth::guard('admin')->attempt($credentials)) {
            //  dd('id');
            return redirect()->intended('/admin/dashboard');
        }
        // Authentication failed
        return back()
        ->withErrors(['loginError' => 'Invalid login credentials'])
        ->withInput($request->only('email')); 
    }
    public function clientlogin(Request $request)
    {
        // Validate the login data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Attempt to log in the admin
        if (Auth::guard('client')->attempt($credentials)) {
            return redirect()->intended('/client/dashboard');
        }
        // Authentication failed
        return back()->with('error', 'Invalid login credentials!')->withInput($request->only('email')); 
    }

    // Logout the admin
    public function adminlogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function clientlogout()
    {
        Auth::guard('client')->logout();
        return redirect()->route('client.login');
    }

}
