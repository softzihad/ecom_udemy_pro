<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;
use Session;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderBy('created_at','desc')->get();
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

    /*=======================================
            Sub Sub-Category Work Here 
    =======================================*/

    public function SubSubCategoryView()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('subsubcategories','subcategories','categories'));
    }

    public function GetSubCategory($category_id)
    {
       $subcategory = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en','ASC')->get();

       return json_encode($subcategory);
    }

    public function SubSubCategoryStore(Request $request)
    {
        $this->validate($request, [
            'category_id'  =>'required',
            'subcategory_id'  =>'required',
            'subsubcategory_name_en'  =>'required',
            'subsubcategory_name_bng' =>'required',
        ],[
            'category_id.required'  => 'Please Select Any Option',
            'subsubcategory_name_en.required' => 'Input Sub-Category English Name',
            'subsubcategory_name_bng.required' => 'Input Sub-Category Bengali Name',
        ]);

        $slug_en  = strtolower(str_replace(' ', '-', $request->subcategory_name_en));
        $slug_bng = strtolower(str_replace(' ', '-', $request->subcategory_name_bng));

       SubSubCategory::create([
            'category_id'             => $request->category_id,
            'subcategory_id'          => $request->subcategory_id,
            'subsubcategory_name_en'  => $request->subsubcategory_name_en,
            'subsubcategory_name_bng' => $request->subsubcategory_name_bng,
            'subsubcategory_slug_en'  => $slug_en,
            'subsubcategory_slug_bng' => $slug_bng,
        ]);

        Session::flash('success', 'Sub Sub-Category Created Successfully');
        return redirect()->route('all.subsubcategory');

    }

    public function SubSubCategoryUpdate(Request $request, $id)
    {
        $subsubcategory = SubSubCategory::find($id);

        $slug_en  = strtolower(str_replace(' ', '-', $request->subsubcategory_name_en));
        $slug_bng = strtolower(str_replace(' ', '-', $request->subsubcategory_name_bng));        
        
        $subsubcategory->category_id              = $request->category_id;
        $subsubcategory->subcategory_id           = $request->subcategory_id;
        $subsubcategory->subsubcategory_name_en   = $request->subsubcategory_name_en;
        $subsubcategory->subsubcategory_name_bng  = $request->subsubcategory_name_bng;
        $subsubcategory->subsubcategory_slug_en   = $slug_en;
        $subsubcategory->subsubcategory_slug_bng  = $slug_bng;

        $subsubcategory->save();
        Session::flash('success', 'Sub Sub-Category Updated Successfully');
        return redirect()->route('all.subsubcategory');
    }

    public function SubSubCategoryDelete($id)
    {
        $subsubcategory = SubSubCategory::find($id);

        $subsubcategory->delete();

        Session::flash('info', 'Sub Sub-Category Deleted Successfully');
        return redirect()->route('all.subsubcategory');

    }

    /* ===========> 2nd Step Dropdown Clickable Select Field <========== */

    public function GetSubSubCategory($subcategory_id)
    {
       $subsubcategory = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();

       return json_encode($subsubcategory);
    }

    /* ===========> End 2nd Step Dropdown Clickable Select Field <========== */

}
