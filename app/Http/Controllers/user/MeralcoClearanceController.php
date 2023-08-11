<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Model\MeralcoClearance;
use App\Model\Officials;
use Carbon\Carbon;
use App\Model\ActivityLog;
use Illuminate\Support\Facades\Auth;

class MeralcoClearanceController extends Controller
{
    public function index()
    {
        // $expired_business = 0;
        // foreach ($businesses as $businesse){
        //     $registration_date = \Carbon\Carbon::parse($businesse->regs_date)->diff(\Carbon\Carbon::now())->format('%y');
            
        //         if($registration_date > 1){
        //             $expired_business = $expired_business = 1;
        //         }
        // }

        return view('brgy_permit.meralco_clearance.index', [
            'meralcos' => MeralcoClearance::orderBy('id','desc')->get()
        ]);
    }

    public function create()
    {
        // $residence = Residence::all();
        return view('brgy_permit.meralco_clearance.create');
    }

    public function store(Request $request)
    {
        $year = Carbon::now()->year;  
        $meralco_cnt = MeralcoClearance::all()->count();

        $meralco_cnt =  $meralco_cnt + 1;    
        $meralco_number = $year . '- BAYOG -' . $meralco_cnt;
        
        $meralco = MeralcoClearance::create([
            'number' => $meralco_number,
            'applicant' => $request->meralco_requestor,
            'address' => $request->address,
            'building_type' => $request->building_type,
        ]);

        return redirect()->route('meralco_clearance.index')->withStatus('Meralco Clearance Added Succesfully!');
    }

    public function show($id)
    {
        return view('brgy_permit.meralco_clearance.show', [
            'meralco' => MeralcoClearance::findOrFail($id),
        ]);
    }

    public function clearance($id)
    {
        // officials
        $latest_id= Officials::max('batch_id');
        $b_officials= Officials::where('batch_id',$latest_id)->get();

        ActivityLog::create([
            'user' => Auth::user()->name,
            'description' => 'Issue Brgy Meralco Clearance',
            'subject' => 'Brgy Meralco',
        ]);

        return view('brgy_permit.meralco_clearance.clearance', [
            'meralco' => MeralcoClearance::findOrFail($id),
            'b_officials' => $b_officials,
        ]); 
    }
}
