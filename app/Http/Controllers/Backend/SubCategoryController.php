<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Session;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderby('created_at','desc')->get();
        $subcategories = SubCategory::all();
        return view('backend.category.subcategory_view', compact('subcategories','categories'));
    }

    public function SubCategoryStore(Request $request)
    {
        $this->validate($request, [
            'category_id'  =>'required',
            'subcategory_name_en'  =>'required',
            'subcategory_name_bng' =>'required',
        ],[
            'category_id.required'  => 'Please Select Any Option',
            'subcategory_name_en.required' => 'Input Sub-Category English Name',
            'subcategory_name_bng.required' => 'Input Sub-Category Bengali Name',
        ]);

        $slug_en  = strtolower(str_replace(' ', '-', $request->subcategory_name_en));
        $slug_bng = strtolower(str_replace(' ', '-', $request->subcategory_name_bng));

       SubCategory::create([
            'category_id'          => $request->category_id,
            'subcategory_name_en'  => $request->subcategory_name_en,
            'subcategory_name_bng' => $request->subcategory_name_bng,
            'subcategory_slug_en'  => $slug_en,
            'subcategory_slug_bng' => $slug_bng,
        ]);

        Session::flash('success', 'Sub-Category Created Successfully');
        return redirect()->route('all.subcategory');

    }

    public function SubCategoryUpdate(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);

        $slug_en  = strtolower(str_replace(' ', '-', $request->subcategory_name_en));
        $slug_bng = strtolower(str_replace(' ', '-', $request->subcategory_name_bng));        
        
        $subcategory->category_id           = $request->category_id;
        $subcategory->subcategory_name_en   = $request->subcategory_name_en;
        $subcategory->subcategory_name_bng  = $request->subcategory_name_bng;
        $subcategory->subcategory_slug_en   = $slug_en;
        $subcategory->subcategory_slug_bng  = $slug_bng;

        $subcategory->save();
        Session::flash('success', 'Sub-Category Updated Successfully');
        return redirect()->route('all.subcategory');
    }

    public function SubCategoryDelete($id)
    {
        $subcategory = SubCategory::find($id);

        $subcategory->delete();

        Session::flash('info', 'Sub-Category Deleted Successfully');
        return redirect()->route('all.subcategory');


    }

}
