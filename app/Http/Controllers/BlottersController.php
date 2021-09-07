<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Residence;
use App\Model\Blotter;
class BlottersController extends Controller
{
    public function index(){
        $blotters = Blotter::with('residence')->get();
        return view('blotters.index', compact('blotters'));
    }

    public function create(){

        $residence = Residence::all();
        return view('blotters.create', compact('residence'));
    }

    public function store(Request $request){
        
        $blotter = new Blotter;     
            $blotter->person_to_complain_id = $request->person_to_complain;
            $blotter->complainant_name = $request->complainant_name;
            $blotter->blotters_info = $request->blotter_info;
            $blotter->date_of_incident = $request->date_of_incident;  
            $blotter->status = $request->status;   
        $blotter->save(); 

    }

    public function show($id){
        $blotter = Blotter::with('residence')->findOrfail($id);

        return view('blotters.show', compact('blotter'));
    }

    public function settelement($id){
        $blotter = Blotter::with('residence')->findOrfail($id);
        return view('blotters.settlementAgreement', compact('blotter'));
    }

    public function settelement_save(Request $request, $id){
        $blotter = Blotter::findOrfail($id);
        $blotter->agreement = $request->agreement;
        $blotter->status = $request->status;
        $blotter->save();
    }
}
