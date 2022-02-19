<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories = Category::all();
        return view('backend.category.category_view', compact('categories'));
    }

    public function CategoryStore(Request $request)
    {
        $this->validate($request, [
            'category_name_en'  =>'required',
            'category_name_bng' =>'required',
            'category_icon'     =>'required',
        ],[
            'category_name_en.required'  => 'Input Category English Name',
            'category_name_bng.required' => 'Input Category Bengali Name',
            'category_icon.required'     => 'Input Category Bengali Name',
        ]);

        $slug_en  = strtolower(str_replace(' ', '-', $request->category_name_en));
        $slug_bng = strtolower(str_replace(' ', '-', $request->category_name_bng));

       Category::create([
            'category_name_en'  => $request->category_name_en,
            'category_name_bng' => $request->category_name_bng,
            'category_slug_en'  => $slug_en,
            'category_slug_bng' => $slug_bng,
            'category_icon'     => $request->category_icon,
        ]);

        Session::flash('success', 'Category Created Successfully');
        return redirect()->route('all.category');

    }

    public function CategoryUpdate(Request $request, $id)
    {
        $category = Category::find($id);

        $slug_en  = strtolower(str_replace(' ', '-', $request->category_name_en));
        $slug_bng = strtolower(str_replace(' ', '-', $request->category_name_bng));
        
        
        $category->category_name_en = $request->category_name_en;
        $category->category_name_bng = $request->category_name_bng;
        $category->category_slug_en = $slug_en;
        $category->category_slug_bng = $slug_bng;
        $category->category_icon = $request->category_icon;

        $category->save();
        Session::flash('success', 'Category Updated Successfully');
        return redirect()->route('all.category');
    }

    public function CategoryDelete($id)
    {
        $category = Category::find($id);

        $category->delete();

        Session::flash('info', 'Category Deleted Successfully');
        return redirect()->route('all.category');


    }
}
