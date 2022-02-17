<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    
    public function index()
    {
        return view('frontend.index');
    }

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile')->with('user',$user);
    }

    public function UserProfileUpdate(Request $request)
    {
        $userData = User::find(Auth::user()->id);

        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->phone = $request->phone;

        if($request->hasfile('profile_photo_path')){

            unlink($userData->profile_photo_path);

            $profile_photo = $request->profile_photo_path;
            $profile_photo_new_name = time().$profile_photo->getClientOriginalName();
            $profile_photo->move('uploads/user-images', $profile_photo_new_name);

            $userData->profile_photo_path ='uploads/user-images/'.$profile_photo_new_name;
        }

        $userData->save();
        Session::flash('success', 'User Profile Updated Successfully');
        return redirect()->route('dashboard');
    }

    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_change_password')->with('user',$user);
    }

    public function UserUpdatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required',
        ]);

        $id = Auth::user()->id;

        $hashedPassword = User::find($id)->password;

        if(Hash::check($request->current_password,$hashedPassword)) {
            
            $user = User::find($id);

            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
            //dd("ok");

        }else{
            return redirect()->back();
        }
    }
}
