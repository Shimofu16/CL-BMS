<?php

namespace App\Http\Controllers\user;

use App\Permit;
use Carbon\Carbon;
use App\Model\Officials;
use App\Model\ActivityLog;
use Illuminate\Http\Request;
use App\Model\MeralcoClearance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MeralcoClearanceController extends Controller
{
    public function index()
    {
        return view('backend.user.permits.meralco.index', [
            'meralcos' => Permit::where('type', 'Meralco clearance')
                                    ->where('barangay_id',Auth::user()->official->barangay->id)
                                    ->get()
        ]);
    }

    public function create()
    {
        return view('backend.user.permits.meralco.create');
    }

    public function store(Request $request)
    {
        $year = Carbon::now()->year;  
        $meralco_cnt = Permit::where('type', 'Meralco clearance')
                                    ->where('barangay_id',Auth::user()->official->barangay->id)
                                    ->count();

        $meralco_cnt =  $meralco_cnt + 1;    
        $meralco_number = $year . '-'.Auth::user()->official->barangay->name.'-'.$meralco_cnt;

        $details = [
            'number' => $meralco_number,
            'applicant' => $request->applicant,
            'address' => $request->address,
            'building_type' => $request->building_type
        ];
        
        $meralco = Permit::create([
            'type' => 'Meralco clearance',
            'barangay_id' => Auth::user()->official->barangay->id,
            'details' => $details,
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'scope' => 'Permits/Clearances',
            'description' => 'Added Meralco clearance',
        ])->subject()->associate($meralco)->save();

        return redirect()->route('meralco_clearance.index')->withStatus('Meralco Clearance Added Succesfully!');
    }

    public function show($id)
    {
        return view('backend.user.permits.meralco.show', [
            'meralco' => Permit::findOrFail($id),
        ]);
    }

    public function clearance($id)
    {
        $meralco = Permit::with('owner')->findOrFail($id);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'description' => 'Issue Brgy Meralco Clearance',
            'scope' => 'Permits/Clearances',
            'action' => 'issuance'
        ])->subject()->associate($meralco)->save();

        return view('backend.user.permits.meralco.clearance', [
            'meralco' => $meralco,
            'b_officials' => Officials::query()->where('barangay_id', Auth::user()->official->barangay->id)->get(),
        ]); 
    }
}
