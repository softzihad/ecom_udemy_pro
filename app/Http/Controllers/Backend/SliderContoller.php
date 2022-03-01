<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;
use Session;

class SliderContoller extends Controller
{
    public function SliderView(){

        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view',compact('sliders'));
    }

    public function SliderStore(Request $request){

        $request->validate([

            'slider_img' => 'required',
        ],[
            'slider_img.required' => 'Plz Select One Image',

        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
        $image_path = 'uploads/slider/'.$name_gen;

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $image_path,

        ]);

        Session::flash('success', 'Slider Created Successfully');
        return redirect()->route('manage.slider');

    } // end method 

    public function SliderUpdate(Request $request,$id)
    {
        $slider = Slider::find($id);

        if($request->file('slider_img')){

            $imgFile = $slider->slider_img;
            unlink($imgFile);

            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
            $image_path = 'uploads/slider/'.$name_gen;

            $slider->slider_img = $image_path;
        }

        $slider->title = $request->title;
        $slider->description = $request->description;

        $slider->save();
        Session::flash('info', 'Slider Updated Successfully');
        return redirect()->route('manage.slider');
    }

    public function SliderDelete($id)
    {
        $slider = Slider::find($id);

        $imgFile = $slider->slider_img;
        unlink($imgFile);

        $slider->delete();

        Session::flash('info', 'Slider Deleted Successfully');
        return redirect()->route('manage.slider');
    }






    //===========> Slider Active & Inactive <============
    public function SliderInactive($id){

        Slider::find($id)->update(['status' => 0]);

        Session::flash('success', 'Slider Inactive Successfully');
        return redirect()->back();
     }


    public function SliderActive($id){

        Slider::find($id)->update(['status' => 1]);

        Session::flash('success', 'Slider Active Successfully');
        return redirect()->back();

    }
}
