<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => "Logout Successfully",
            'alert-type' => 'success'
        );
        return  redirect('/login')->with($notification);
    }


    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.profile', compact('user'));
    }


    public function editProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.layouts.editProfile', compact('user'));
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => "required|min:3|max:20",
            'email' => "required|email|max:30"
        ]);

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->image) {
            $fileName = $request->file('image')->getClientOriginalName();
            $data->image = $fileName;
            $request->file('image')->move(public_path('profileImg'), $fileName);
        }
        $data->save();

        $notification = array(
            'message' => "Profile Update Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }


    public function editPassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.changePassword', compact('user'));
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);


        $authUserPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $authUserPassword)) {
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->confirm_password);
            $user->save();

            $notification = array(
                'message' => "Password Update Successfully",
                'alert-type' => 'success'
            );

            return redirect()->route('logout')->with($notification);
        } else {
            $notification = array(
                'message' => "Old Password not match",
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        }
    }
}
