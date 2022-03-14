<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;

class IndexController extends Controller
{
    
    public function index()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders    = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products   = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $featured   = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
        $hot_deals  = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(6)->get();
        $special_offer  = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();
        $special_deals  = Product::where('special_deals',1)->orderBy('id','DESC')->limit(6)->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0  = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1  = Product::where('status',1)->where('category_id',$skip_category_1)->orderBy('id','DESC')->get();

        $skip_brand_0 = Brand::skip(2)->first();
        $skip_brand_product_0  = Product::where('status',1)->where('category_id',$skip_brand_0)->orderBy('id','DESC')->get();

        return view('frontend.index', compact('categories','sliders','products','featured','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_0','skip_brand_product_0'));
    }

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile()
    {
       /* $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile')->with('user',$user);*/

        if (Auth::User() == TRUE) {
          
            $id = Auth::user()->id;
            $user = User::find($id);

            return view('frontend.profile.user_profile')->with('user',$user);
        }else{
            return redirect()->route('login');
        }
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


    /*===========> Product Details Here <===============  */
    public function ProductDetails($id,$slug){

        $product = Product::find($id);
        $productDetails = Product::find($id);
        $multiImag = MultiImg::where('product_id',$id)->get();

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_bng = $product->product_color_bng;
        $product_color_bng = explode(',', $color_bng);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_bng = $product->product_size_bng;
        $product_size_bng = explode(',', $size_bng);

        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

        $hot_deals  = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(6)->get();

        return view('frontend.product.product_details',compact('product','multiImag','product_color_en','product_color_bng','product_size_en','product_size_bng','relatedProduct','hot_deals','productDetails'));

    }

    /*===========> Tag Wise-Product Here <===============  */
    public function TagWiseProduct($tag){

        //$products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_bng',$tag)->orderBy('id','DESC')->get();
        $products = Product::where('status',1)->where('product_tags_en',$tag)->orderBy('id','DESC')->paginate(1);
        $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('frontend.tags.tags_view',compact('products','categories'));

    }

    /*===========> Subcategory Wise-Product Here <===============  */
    public function SubCatWiseProduct($subcat_id,$slug){
        $products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(1);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.product.subcategory_view',compact('products','categories'));

    }

    /*===========> Sub Subcategory Wise-Product Here <===============  */
    public function SubSubCatWiseProduct($subsubcat_id,$slug){
        $products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(1);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.product.subsubcategory_view',compact('products','categories'));

    }


    /*===========> Product View With Ajax <===============  */
    public function ProductViewAjax($id){

        $product = Product::with('category','brand')->find($id);

        $color = $product->product_color_en;
        $product_color = explode(',', $color);

        $size = $product->product_size_en;
        $product_size = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,

        ));

    } // end method 
}
