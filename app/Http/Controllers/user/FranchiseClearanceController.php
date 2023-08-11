<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Model\Franchise;
use App\Model\Officials;
use App\Model\Resident;
use Carbon\Carbon;
use App\Model\ActivityLog;
use Illuminate\Support\Facades\Auth;

class FranchiseClearanceController extends Controller
{
    public function index()
    {
        return view('brgy_permit.franchise_clearance.index', [
            'franchises' => Franchise::with('resident')->orderBy('id','desc')->get(),
        ]);
    }

    public function create()
    {
        return view('brgy_permit.franchise_clearance.create', [
            'residents' => Resident::all(),
        ]);
    }

    public function store(Request $request)
    {
        $year = Carbon::now()->year;  
        $franchise_cnt = Franchise::all()->count();

        $franchise_cnt =  $franchise_cnt + 1;    
        $franchise_number = $year . '-' . $franchise_cnt;
        
        $franchise = Franchise::create([
            'franchisee_id' => $request->resident,
            'franchise_number' => $franchise_number,
            'chasis_number' => $request->chasis_number,
            'motor_number' => $request->motor_number,
            'plate_number' => $request->plate_number,
        ]);

        return redirect()->route('franchise_clearance.index')->withStatus('Franschise Added Succesfully!');
    }

    public function show($id)
    {
        return view('brgy_permit.franchise_clearance.show', [
            'franchise' => Franchise::with('resident')->findOrFail($id),
        ]);

    }

    public function clearance($id)
    {
        // officials
        $latest_id= Officials::max('batch_id');
        $b_officials= Officials::where('batch_id',$latest_id)->get();
        
        ActivityLog::create([
            'user' => Auth::user()->name,
            'description' => 'Issue Brgy Franchise Clearance',
            'subject' => 'Brgy Franchise',
        ]);

        return view('brgy_permit.franchise_clearance.clearance', [
            'franchise' => Franchise::with('resident')->findOrFail($id),
            'b_officials' => $b_officials,
        ]); 
    }
}
