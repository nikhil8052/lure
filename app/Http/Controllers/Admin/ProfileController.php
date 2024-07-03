<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function ProfileUpdate(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'required',
            ]);
    
            // $user = Auth::user();
            
            auth()->user()->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number
            ]);
    
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e);
        }
        
    }

    public function PasswordUpdate(Request $request) 
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password|min:6'
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'errors' => ['current_password' => ['Current password is incorrect']]
            ], 422);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['success' => 'Password changed successfully!']);
    }

    public function ProfileImageUpdate(Request $request)
    {
        try {
            $request->validate([
                'profile_photo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);
    
            if($request->hasFile('profile_photo')) {
                $file = $request->file('profile_photo');
                $filename ='profile' . time() . '.' . $file->extension();
                $file->move(public_path() . '/admin/images/', $filename);
            }
    
            auth()->user()->update([
                'profile_photo' => $filename,
            ]);
    
            return redirect()->back()->with('success','Profile Image Updated Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e);
        }
        
    }
}
