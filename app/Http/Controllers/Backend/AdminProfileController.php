<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $adminData = Admin::find(1);
        return view('admin.admin_profile', compact('adminData'));
    }

    public function AdminProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function AdminProfileupdate(Request $request)
    {
        $adminData = Admin::find(1);

        $adminData->name = $request->name;
        $adminData->email = $request->email;

        if($request->hasfile('profile_photo_path')){

            unlink($adminData->profile_photo_path);

            $profile_photo = $request->profile_photo_path;
            $profile_photo_new_name = time().$profile_photo->getClientOriginalName();
            $profile_photo->move('backend-admin/uploads/admin-images', $profile_photo_new_name);

            $adminData->profile_photo_path ='backend-admin/uploads/admin-images/'.$profile_photo_new_name;
        }

        $adminData->save();
        Session::flash('success', 'Admin Profile Updated Successfully');
        return redirect()->route('admin.profile');

    }

    public function AdminChangePassword($value='')
    {
        return view('admin.admin_change_password');
    }

    public function AdminChangePasswordUpdate(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required',
        ]);

        $hashedPassword = Admin::find(1)->password;
        //dd($hashedPassword);

        if(Hash::check($request->oldpassword,$hashedPassword)) {
            
            $admin = Admin::find(1);

            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
            //dd("ok");

        }else{
            return redirect()->back();
        }
    }
}
