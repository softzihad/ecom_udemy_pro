<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function ViewWishlist(){
		return view('frontend.wishlist.view_wishlist');
	}

	public function GetWishlistProduct()
	{
		$Wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();

		return response()->json($Wishlist);
	}

	public function RemoveWishlistProduct($id){

		Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
		return response()->json(['success' => 'Successfully Product Remove']);
	}
}
