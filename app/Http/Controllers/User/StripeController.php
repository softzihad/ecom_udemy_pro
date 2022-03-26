<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){

        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::getTotal());
        }

        \Stripe\Stripe::setApiKey('sk_test_qwHUl41XsCroo9Qk3mNYpK3s');


        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
          'amount' => $total_amount*100,
          'currency' => 'usd',
          'description' => 'Easy Online Store',
          'source' => $token,
          'metadata' => ['order_id' => uniqid()],
        ]);

        //dd($charge);

        //Insert Order
        $order_id = Order::insertGetId([
        'user_id'       => Auth::id(),
        'division_id'   => $request->division_id,
        'district_id'   => $request->district_id,
        'upazila_id'    => $request->upazila_id,
        'name'          => $request->name,
        'email'         => $request->email,
        'phone'         => $request->phone,
        'post_code'     => $request->post_code,
        'notes'         => $request->notes,

        'payment_type'    => 'Stripe',
        'payment_method'  => 'Stripe',
        'payment_type'    => $charge->payment_method,
        'transaction_id'  => $charge->balance_transaction,
        'currency'        => $charge->currency,
        'amount'          => $total_amount,
        'order_number'    => $charge->metadata->order_id,

        'invoice_no'    => 'EOS'.mt_rand(10000000,99999999),
        'order_date'    => Carbon::now()->format('d F Y'),
        'order_month'   => Carbon::now()->format('F'),
        'order_year'    => Carbon::now()->format('Y'),
        'status'        => 'Pending', 
        'created_at' => Carbon::now(),  

     ]);


    // Start Send Email 
      $invoice = Order::findOrFail($order_id);
      
      $data = [
        'invoice_no' => $invoice->invoice_no,
        'amount' => $total_amount,
        'name' => $invoice->name,
        'email' => $invoice->email,
      ];

      Mail::to($request->email)->send(new OrderMail($data));

     // End Send Email 


    //Insert Order Product Items Into Order Item Table
    $carts = Cart::getContent();

    foreach ($carts as $cart) {
        OrderItem::create([
            'order_id' => $order_id, 
            'product_id' => $cart->id,
            'color' => $cart->attributes->color,
            'size' => $cart->attributes->size,
            'qty' => $cart->quantity,
            'price' => $cart->price,
        ]);
    }

    //Coupon Destroy
    if (Session::has('coupon')) {
      Session::forget('coupon');
    }

    //Cart Destroy
    Cart::clear();

    Session::flash('success', 'Your Order Place Successfully');
    return redirect()->route('dashboard');

  } // end method 



}
