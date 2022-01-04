<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Fencing;
use App\Model\Officials;
use Carbon\Carbon;

class FencingController extends Controller
{
    public function index(){

        $fencings = Fencing::all();

        return view('brgy_permit.fencing_permit.index',compact('fencings'));

    }

    public function create(){
        return view('brgy_permit.fencing_permit.create');
    }

    public function store(Request $request){

        $year = Carbon::now()->year;  
        $fencing_cnt = Fencing::all()->count();

        $fencing_cnt =  $fencing_cnt + 1;    
        $fencing_number = $year . '-' . $fencing_cnt;

        $fencing = new Fencing;
        $fencing->fencing_number = $fencing_number;
        $fencing->name = $request->name;
        $fencing->address =$request->address;
        $fencing->fencing_location = $request->fencing_location;
        $fencing->purpose = $request->purpose;
        

        $fencing->save();

        return redirect()->route('fencing_permit.index');

    }


    public function show($id){

        $fencing = Fencing::findorfail($id);
        return view('brgy_permit.fencing_permit.show',compact('fencing'));
    }

    public function clearance($id){
        // officials
        $latest_id= Officials::max('batch_id');
        $b_officials= Officials::where('batch_id',$latest_id)->get();
        //

        $fencing = Fencing::findorfail($id);
        return view('brgy_permit.fencing_permit.clearance',compact('fencing','b_officials')); 
    }
    
}