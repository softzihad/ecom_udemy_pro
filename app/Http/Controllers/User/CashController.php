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

class CashController extends Controller
{
    public function CashOrder(Request $request){


        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::getTotal());
        }


        $order_id = Order::insertGetId([
        'user_id' => Auth::id(),
        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'upazila_id' => $request->upazila_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'post_code' => $request->post_code,
        'notes' => $request->notes,

        'payment_type' => 'Cash On Delivery',
        'payment_method' => 'Cash On Delivery',

        'currency' =>  'Bdt',
        'amount' => $total_amount,


        'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
        'order_date' => Carbon::now()->format('d F Y'),
        'order_month' => Carbon::now()->format('F'),
        'order_year' => Carbon::now()->format('Y'),
        'status' => 'Pending',
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
