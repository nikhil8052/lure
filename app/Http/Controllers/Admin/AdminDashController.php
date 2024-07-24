<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplyData;
use App\Models\EmailUpdate;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $alldata = ApplyData::where('status', 1)->where('created_at', '>=', Carbon::now()->subDay())->latest()->take(5)->get();
        $allemail = EmailUpdate::where('status', 1)->where('created_at', '>=', Carbon::now()->subDay())->latest()->take(5)->get();
        return view('admin.dashboard.index',compact('alldata','allemail'));
    }

    public function AllApplication()
    {
        $alldata = ApplyData::where('status',1)->get();
        return view('admin.applications.index',compact('alldata'));
    }

    public function removeClient($id)
    {
        $data = ApplyData::find($id);
        if($data){
            $data->delete();
        }
        return redirect()->back()->with('success','Record deleted successfully');
    }

    public function EmailUpdated()
    {
        $alldata = EmailUpdate::where('status',1)->get();
        return view('admin.applications.emails',compact('alldata'));
    }

    public function removeEmail($id)
    {
        $data = EmailUpdate::find($id);
        if($data){
            $data->delete();
        }
        return redirect()->back()->with('success','Record deleted successfully');
    }
}
