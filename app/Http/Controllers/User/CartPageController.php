<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function MyCart(){

        return view('frontend.wishlist.view_mycart');
    }

    public function GetCartProduct(){
        $carts = Cart::getContent();
        $cartQty = Cart::getTotalQuantity();
        $cartTotal = Cart::getTotal();

      return response()->json([
        'carts' => $carts,
        'cartQty' => $cartQty,
        'cartTotal' => round($cartTotal),

      ]);

    } //end method 

    public function RemoveCartProduct($rowId){
        Cart::remove($rowId);

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }

        return response()->json(['success' => 'Successfully Remove From Cart']);
    }

    public function CartIncrement($rowId)
    {
        $row = Cart::get($rowId);

        Cart::update($rowId, [
          'quantity' => 1, // so if the current product has a quantity of 4, it will Addition 1 and will result to 5
        ]);

        /* Coupon Apply */
        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

           Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::getTotal() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::getTotal() - Cart::getTotal() * $coupon->coupon_discount/100)  
            ]);

        }/* End Coupon Apply */

        //return response()->json('increment');
        return response()->json(['success' => 'Cart Increment Successfully']);
    }

    public function CartDecrement($rowId)
    {
        $row = Cart::get($rowId);

        Cart::update($rowId, [
          'quantity' => -1, // so if the current product has a quantity of 4, it will Substruct 1 and will result to 3
        ]);

        /* Coupon Apply */
        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

           Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::getTotal() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::getTotal() - Cart::getTotal() * $coupon->coupon_discount/100)  
            ]);
           
        }/* End Coupon Apply */

        //return response()->json('increment');
        return response()->json(['success' => 'Cart Decrement Successfully']);
        
    }

}
