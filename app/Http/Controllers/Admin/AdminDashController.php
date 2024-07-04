<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashController extends Controller
{
    public function AdminLogin()
    {
        return view('auth.index');
    }

    public function LoginProcc(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            if(Auth::user()->is_admin == 1) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->with('error','Invalid Credentials');
        }
        
    }

    public function AdminLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }
}
