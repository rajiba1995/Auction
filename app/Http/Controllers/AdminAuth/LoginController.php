<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\Admin;
use App\Models\EmployeeAttandance;
use Carbon\Carbon;


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
    public function showEmployeeLoginForm()
    {
        return view('auth.employee-login');
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
    public function employeelogin(Request $request)
    {
        // Validate the login data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the Employee
        if (Auth::guard('client')->attempt($credentials)) {
            $employee = Auth::guard('client')->user();
            // Check if the employee is an admin (type == 2)
            if ($employee->type == 2) {
                return redirect()->intended('/employee/dashboard');
            } else {
                // If the employee is not an admin, log them out and redirect with an error message
                Auth::guard('client')->logout();
                return redirect()->route('employee.login')->with('error', 'Unauthorized access.');
            }
        }

        // If authentication attempt fails, redirect back with an error message
        return redirect()->route('employee.login')->with('error', 'Invalid credentials.');
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
    public function employeelogout()
    {
        Auth::guard('client')->logout();
        return redirect()->route('employee.login');
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
    public function employeeAttendanceLogin()
    {
        $employee = Auth::guard('client')->user();
         // Check if the employee already has an entry for the current day in the employee_attendance table
         $existingAttendance = EmployeeAttandance::where('user_id', $employee->id)->whereDate('login_time', now())->first();
         if(!$existingAttendance){
         $attandance = new EmployeeAttandance();
         $attandance->user_id = $employee->id;
         $attandance->login_time=now();
         $attandance->save();
         }
         // Update login status of the employee in Admin table
         $emp = Admin::where('id', $employee->id)->first();
         if ($emp) {
             $emp->loggedin_status = 1;
             $emp->save();
         }
         return redirect()->back();
    }

    public function employeeAttendanceLogout()
    {
        $employee = Auth::guard('client')->user();
        // Find the latest attendance record where logout_time is null
        $attendance = EmployeeAttandance::where('user_id', $employee->id)->whereDate('login_time', now())->latest()->first();
        if ($attendance) {
            $attendance->logout_time = Carbon::now();
            $attendance->save();
        }
          // Update login status of the employee in Admin table
          $emp = Admin::where('id', $employee->id)->first();
          if ($emp) {
              $emp->loggedin_status = 0;
              $emp->save();
          }
          return redirect()->back();
       
    }

}