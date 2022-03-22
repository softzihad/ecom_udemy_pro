<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipUpazila;
use Carbon\Carbon;
use Session;


class ShippingAreaController extends Controller
{
    public function DivisionView(){
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('backend.ship.division.view_division',compact('divisions'));

    }


    public function DivisionStore(Request $request){

            $request->validate([
                'division_name' => 'required', 
            ]);

            ShipDivision::create([
                'division_name' => $request->division_name,
            ]);

            Session::flash('success', 'Division Created Successfully');
            return redirect()->route('manage.division');
    } // end method 

    public function DivisionUpdate(Request $request, $id){

        $division = ShipDivision::find($id);
        
        ShipDivision::find($id)->update([
            'division_name' => $request->division_name,
        ]);

        Session::flash('success', 'Division Updated Successfully');
        return redirect()->route('manage.division');
    } // end mehtod 


    public function DivisionDelete($id)
    {
        $division = ShipDivision::find($id);

        $division->delete();

        Session::flash('info', 'Division Deleted Successfully');
        return redirect()->route('manage.division');
    }



    //===========>  Start Ship District ===========>

    public function DistrictView()
    {

        $districts = ShipDistrict::orderBy('id','DESC')->get();
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();

        return view ('backend.ship.district.view_district', compact('districts','divisions'));
    }


    public function DistrictStore(Request $request){

        $request->validate([
            'division_id' => 'required',  
            'district_name' => 'required',       
        ]);

        ShipDistrict::create([

            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
        ]);

        Session::flash('success', 'District Created Successfully');
        return redirect()->route('manage.district');

    } // end method 


    public function DistrictUpdate(Request $request,$id){

        ShipDistrict::find($id)->update([

        'division_id' => $request->division_id,
        'district_name' => $request->district_name,

        ]);

        Session::flash('success', 'District Updated Successfully');
        return redirect()->route('manage.district');


    } // end mehtod 


    public function DistrictDelete($id){

        ShipDistrict::find($id)->delete();

        Session::flash('info', 'District Deleted Successfully');
        return redirect()->route('manage.district');

    } // end method 



    //===========>  Start Ship Upazila ===========>

    public function UpazilaView(){

        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $districts = ShipDistrict::orderBy('district_name','ASC')->get();
        $upazilas = ShipUpazila::orderBy('id','DESC')->get();
            
        return view('backend.ship.upazila.view_upazila',compact('divisions','districts','upazilas'));
    }

    public function GetDistrict($division_id)
    {
       $districts = ShipDistrict::where('division_id', $division_id)->orderBy('district_name','ASC')->get();

       return json_encode($districts);
    }


    public function UpazilaStore(Request $request){

        $request->validate([
            'division_id' => 'required',  
            'district_id' => 'required', 
            'upazila_name' => 'required',      

        ]);


        ShipUpazila::create([

            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazila_name' => $request->upazila_name,

        ]);

        Session::flash('success', 'Upazila Created Successfully');
        return redirect()->route('manage.upazila');

    } // end method 


    public function UpazilaUpdate(Request $request,$id){

        ShipUpazila::find($id)->update([

        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'upazila_name' => $request->upazila_name,

        ]);

        Session::flash('success', 'Upazila Updated Successfully');
        return redirect()->route('manage.upazila');

    } // end mehtod 


    public function UpazilaDelete($id){

        ShipUpazila::find($id)->delete();

        Session::flash('info', 'Upazila Deleted Successfully');
        return redirect()->route('manage.upazila');

    } // end method


}
