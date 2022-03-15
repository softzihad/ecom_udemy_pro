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

class CartController extends Controller
{

    public function AddToCart(Request $request, $id){

      $product = Product::find($id);

      if ($product->discount_price == NULL) {
          Cart::add([
              'id' => $id, 
              'name' => $request->product_name, 
              'quantity' => 1, 
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
    } // end method 

    /*=============> Remove Mini Cart <===========*/
    public function RemoveMiniCart($rowId){
      Cart::remove($rowId);
      return response()->json(['success' => 'Product Remove from Cart']);

    } // end mehtod 


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
      

    }
}
