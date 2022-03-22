<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Session;

class CouponController extends Controller
{
    public function CouponView(){
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('backend.coupon.view_coupon',compact('coupons'));

    }

    public function CouponStore(Request $request){

        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);

    Coupon::insert([
        'coupon_name' => strtoupper($request->coupon_name),
        'coupon_discount' => $request->coupon_discount, 
        'coupon_validity' => $request->coupon_validity,

        ]);

        Session::flash('success', 'Coupon Created Successfully');
        return redirect()->route('manage.coupon');

    } // end method 


    public function CouponUpdate(Request $request, $id){

      Coupon::find($id)->update([
        'coupon_name' => strtoupper($request->coupon_name),
        'coupon_discount' => $request->coupon_discount, 
        'coupon_validity' => $request->coupon_validity,

        ]);

        Session::flash('success', 'Coupon Updated Successfully');
        return redirect()->route('manage.coupon');
    } // end mehtod 


    public function CouponDelete($id)
    {
        $coupon = Coupon::find($id);

        $coupon->delete();

        Session::flash('info', 'Coupon Deleted Successfully');
        return redirect()->route('manage.coupon');
    }

}
