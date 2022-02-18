<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use Session;
use App\DataTables\BrandDataTable;

class BrandContoller extends Controller
{
    
    public function BrandView(BrandDataTable $dataTable)
    {
        $brands = Brand::all();
        return view('backend.brand.brand_view')->with('brands', $brands);
        //return $dataTable->render('backend.brand.brand_view');
    }

    public function BrandStore(Request $request)
    {
        $this->validate($request, [

            'brand_name_en'   =>'required',
            'brand_name_bng'  =>'required',
            'brand_image'     =>'required'
        ],[
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_bng.required' => 'Input Brand Bengali Name',
        ]);

        $str_en = $request->brand_name_en;
        $str_bng = $request->brand_name_bng;

        $slug_en = trim(preg_replace('/\s+/', '-', $str_en));
        $slug_bng = trim(preg_replace('/\s+/', '-', $str_bng));


        $image = $request->brand_image;
        $image_new_name = time().$image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('uploads/brand/'.$image_new_name);
        $image_path = 'uploads/brand/'.$image_new_name;

        $brand = Brand::create([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_bng' => $request->brand_name_bng,
            'brand_slug_en' => $slug_en,
            'brand_slug_bng' => $slug_bng,
            'brand_image' => $image_path,
        ]);

        Session::flash('success', 'Brand Created Successfully');
        return redirect()->route('all.brand');

    }

    public function BrandUpdate(Request $request, $id)
    {
        $brand = Brand::find($id);

        $str_en = $request->brand_name_en;
        $str_bng = $request->brand_name_bng;

        $slug_en = trim(preg_replace('/\s+/', '-', $str_en));
        $slug_bng = trim(preg_replace('/\s+/', '-', $str_bng));
        
        if($request->file('brand_image')){

            $imgFile = $brand->brand_image;
            unlink($imgFile);

            $image = $request->brand_image;
            $image_new_name = time().$image->getClientOriginalName();
            Image::make($image)->resize(300,300)->save('uploads/brand/'.$image_new_name);
            $image_path = 'uploads/brand/'.$image_new_name;

            $brand->brand_image = $image_path;
        }

        $brand->brand_name_en = $request->brand_name_en;
        $brand->brand_name_bng = $request->brand_name_bng;
        $brand->brand_slug_en = $slug_en;
        $brand->brand_slug_bng = $slug_bng;

        $brand->save();
        Session::flash('info', 'Brand Updated Successfully');
        return redirect()->route('all.brand');
    }

    public function BrandDelete($id)
    {
        $brand = Brand::find($id);

        $imgFile = $brand->brand_image;
        unlink($imgFile);

        $brand->delete();

        Session::flash('info', 'Brand Deleted Successfully');
        return redirect()->route('all.brand');


    }
}
