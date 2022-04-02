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
use PDF;
//use Barryvdh\DomPDF\Facade\Pdf;

class AllUserController extends Controller
{
    public function MyOrders(){

        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_view',compact('orders'));

    }


    public function OrderDetails($order_id){

        $order = Order::where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::where('order_id',$order_id)->orderBy('id','DESC')->get();
        //$order = Order::with('division','district','upazila','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        //$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('frontend.user.order.order_details',compact('order','orderItem'));

    } // end mehtod 


    public function invoiceDownload($order_id){

        $order = Order::where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::where('order_id',$order_id)->orderBy('id','DESC')->get();

        //return view('frontend.user.order.order_invoice',compact('order','orderItem'));

        $pdf = PDF::loadView('frontend.user.order.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    } // end mehtod 
}
