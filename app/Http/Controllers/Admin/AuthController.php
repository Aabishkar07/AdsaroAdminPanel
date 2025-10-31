<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

     public function index()
    {
        return view("admin.Auth.login");
    }

    public function store(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        try {
            // check credentials and redirect to admin dashboard
            if (Auth::guard("web")->attempt($credentials)) {
                return redirect()->route('admin.dashboard')->with('popsuccess', 'Login Successful');
            }
            return redirect()->route('admin.login')->with('error', 'Credentials do not match');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('admin.login')->with('error', 'An error occurred while processing your request');
        }
    }

    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return redirect()->route('admin.login');
        }
    }
}
