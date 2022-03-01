<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;
use Session;

class ProductController extends Controller
{

    public function ProductView()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }

    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();

        return view('backend.product.add_product', compact('categories','brands'));
    }

    public function ProductStore(Request $request)
    {
        
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$name_gen);
        $save_url = 'uploads/products/thambnail/'.$name_gen;

        $product = Product::create([
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'subsubcategory_id' => $request->subsubcategory_id,
        'product_name_en' => $request->product_name_en,
        'product_name_bng' => $request->product_name_bng,
        'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
        'product_slug_bng' => str_replace(' ', '-', $request->product_name_bng),
        'product_code' => $request->product_code,

        'product_qty' => $request->product_qty,
        'product_tags_en' => $request->product_tags_en,
        'product_tags_bng' => $request->product_tags_bng,
        'product_size_en' => $request->product_size_en,
        'product_size_bng' => $request->product_size_bng,
        'product_color_en' => $request->product_color_en,
        'product_color_bng' => $request->product_color_bng,

        'selling_price' => $request->selling_price,
        'discount_price' => $request->discount_price,
        'short_descp_en' => $request->short_descp_en,
        'short_descp_bng' => $request->short_descp_bng,
        'long_descp_en' => $request->long_descp_en,
        'long_descp_bng' => $request->long_descp_bng,

        'hot_deals' => $request->hot_deals,
        'featured' => $request->featured,
        'special_offer' => $request->special_offer,
        'special_deals' => $request->special_deals,

        'product_thambnail' => $save_url,
        'status' => 1,
        'created_at' => Carbon::now(),

      ]);


        //===========>  Multiple Image Upload Start ===========>
        $images = $request->file('multi_img');

        foreach ($images as $img) {

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('uploads/products/multi-image/'.$make_name);
            $uploadPath = 'uploads/products/multi-image/'.$make_name;

            MultiImg::create([

                'product_id' => $product->id,
                'photo_name' => $uploadPath,

            ]);
        }//===========>  End Multiple Image Upload Start ===========>


        Session::flash('success', 'Product Created Successfully');
        return redirect()->route('product.view');

    }

    public function ProductEdit($id){

        $multiImgs = MultiImg::where('product_id',$id)->get();

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $product = Product::find($id);

        return view('backend.product.product_edit',compact('categories','brands','subcategory','subsubcategory','product','multiImgs'));

    }

    public function ProductUpdate(Request $request, $id)
    {
        $product_id = $id;

         Product::find($product_id)->update([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bng' => $request->product_name_bng,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_bng' => str_replace(' ', '-', $request->product_name_bng),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bng' => $request->product_tags_bng,
            'product_size_en' => $request->product_size_en,
            'product_size_bng' => $request->product_size_bng,
            'product_color_en' => $request->product_color_en,
            'product_color_bng' => $request->product_color_bng,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bng' => $request->short_descp_bng,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bng' => $request->long_descp_bng,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,          
            'status' => 1,   

        ]);

        
        Session::flash('success', 'Product Updated Successfully');
        return redirect()->back();
    }

    //===========>  Multiple Image Update <=============
    public function MultiImageUpdate(Request $request){

        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {

            $imgDel = MultiImg::find($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('uploads/products/multi-image/'.$make_name);
            $uploadPath = 'uploads/products/multi-image/'.$make_name;

            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadPath
            ]);

        } // end foreach

        Session::flash('success', 'Product Image Updated Successfully');
        return redirect()->back();

    } // end mehtod 


    //===========> Product Main Thambnail Update <============
     public function ThambnailImageUpdate(Request $request){

        $product_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$name_gen);
        $save_url = 'uploads/products/thambnail/'.$name_gen;

        Product::find($product_id)->update([
            'product_thambnail' => $save_url,

        ]);

        Session::flash('success', 'Product Image Thambnail Updated Successfully');
        return redirect()->back();

     } // end method


    //===========> Multi Image Delete When You Edit The Product <============
     public function MultiImageDelete($id){

        $oldimg = MultiImg::find($id);
        unlink($oldimg->photo_name);
        MultiImg::find($id)->delete();
        
        Session::flash('success', 'Product Image Deleted Successfully');
        return redirect()->back();

     } // end method 



    //===========> Product Active & Inactive <============
    public function ProductInactive($id){

        Product::find($id)->update(['status' => 0]);

        Session::flash('success', 'Product Inactive Successfully');
        return redirect()->back();
     }


    public function ProductActive($id){

        Product::find($id)->update(['status' => 1]);

        Session::flash('success', 'Product Active Successfully');
        return redirect()->back();

    }

    //===========> Product Delete <============
    public function ProductDelete($id){

        $product = Product::find($id);
        unlink($product->product_thambnail);
        Product::find($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        Session::flash('success', 'Product Deleted Successfully');
        return redirect()->back();

    }// end method 




}
