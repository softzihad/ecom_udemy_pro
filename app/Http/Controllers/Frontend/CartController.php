<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Auth;
use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function AddToCart(Request $request, $id){

      if (Session::has('coupon')) {
           Session::forget('coupon');
      }

      $product = Product::find($id);

      if ($product->discount_price == NULL) {
          Cart::add([
              'id' => $id, 
              'name' => $request->product_name, 
              'quantity' => $request->quantity, 
              'price' => $product->selling_price,
              'weight' => 1, 
              'attributes' => [
                  'image' => $product->product_thambnail,
                  'color' => $request->color,
                  'size' => $request->size,
              ],
          ]);

          return response()->json(['success' => 'Successfully Added on Your Cart']);

      }else{

          Cart::add([
              'id' => $id, 
              'name' => $request->product_name, 
              'quantity' => $request->quantity, 
              'price' => $product->discount_price,
              'weight' => 1, 
              'attributes' => [
                  'image' => $product->product_thambnail,
                  'color' => $request->color,
                  'size' => $request->size,
              ],
          ]);
          return response()->json(['success' => 'Successfully Added on Your Cart']);
      }

    } // end mehtod 

    /*=============> Mini Cart Section  <===========*/
    public function AddMiniCart(){

      $carts = Cart::getContent();
      $cartQty = Cart::getTotalQuantity();
      $cartTotal = Cart::getTotal();

      return response()->json([
        'carts' => $carts,
        'cartQty' => $cartQty,
        'cartTotal' => round($cartTotal),

      ]);
    }// end method 

    /*=============> Remove Mini Cart <===========*/
    public function RemoveMiniCart($rowId){
      Cart::remove($rowId);
      return response()->json(['success' => 'Product Remove from Cart']);

    }// end mehtod 


    /*=============> add to wishlist mehtod <===========*/
    public function AddToWishlist(Request $request, $product_id){

      if (Auth::check()) {
        
        $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

        if (!$exists) {
               Wishlist::create([
                'user_id' => Auth::user()->id, 
                'product_id' => $product_id, 
                'created_at' => Carbon::now(), 
            ]);
           return response()->json(['success' => 'Successfully Added On Your Wishlist']);
        }else{
          return response()->json(['error' => 'This Product Has Already On Your Wishlist']);
        }

      }else{
        return response()->json(['error' => 'At First Login Your Account']);
      }
      

    }// end mehtod


    /*=============> Coupon Apply mehtod <===========*/
    public function CouponApply(Request $request){

      $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::getTotal() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::getTotal() - Cart::getTotal() * $coupon->coupon_discount/100)
            ]);

            return response()->json(['success' => 'Coupon Applied Successfully']);

        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }// end mehtod

    /*=============> Coupon Calculation mehtod <===========*/
    public function CouponCalculation(){

      $total = Cart::getTotal();

      if($total == 0){
        return response()->json(['zero' => 0]);
      }

        if (Session::has('coupon')){

            return response()->json([
                'subtotal' => Cart::getTotal(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ]);

          }else{
              return response()->json([
                  'total' => Cart::getTotal(),
              ]);
          }
      

    } // end method


    /*=============> Remove Coupon Apply mehtod <===========*/
    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }



}
