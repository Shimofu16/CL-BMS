<?php

namespace App\Http\Controllers\user;

use App\Permit;
use Carbon\Carbon;
use App\Model\Resident;
use App\Model\Franchise;
use App\Model\Official;
use App\Model\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FranchiseClearanceController extends Controller
{
    public function index()
    {
        return view('backend.user.permits.franchise.index', [
            'franchises' => Permit::with('owner')
                                    ->where('type', 'Franchise clearance')
                                    ->where('barangay_id',Auth::user()->official->barangay->id)
                                    ->get(),
        ]);
    }

    public function create()
    {
        return view('backend.user.permits.franchise.create', [
            'residents' => Resident::where('barangay_id', Auth::user()->official->barangay->id)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $year = Carbon::now()->year;
        $franchise_cnt = Permit::where('type', 'Franchise clearance')
                                ->where('barangay_id',Auth::user()->official->barangay->id)
                                ->count();

        $franchise_cnt =  $franchise_cnt + 1;
        $franchise_number = $year.'-'.Auth::user()->official->barangay->name.'-'.$franchise_cnt;

        $details = [
            'number' => $franchise_number,
            'chassis' => $request->chassis_number,
            'motor' => $request->motor_number,
            'plate' => $request->plate_number,
        ];

        $franchise = Permit::create([
            'type' => 'Franchise clearance',
            'resident_id' => $request->resident,
            'barangay_id' => Auth::user()->official->barangay->id,
            'details' => $details,
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'scope' => 'Permits/Clearances',
            'description' => 'Registered franchise'
        ])->subject()->associate($franchise)->save();

        return redirect()->route('franchise_clearance.index')->withStatus('Franschise Added Succesfully!');
    }

    public function show($id)
    {
        return view('backend.user.permits.franchise.show', [
            'franchise' => Permit::with('owner')->findOrFail($id),
        ]);

    }

    public function clearance($id)
    {
        $franchise = Permit::with('owner')->findOrFail($id);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'description' => 'Issue Brgy Franchise Clearance',
            'scope' => 'Permits/Clearances',
            'action' => 'issuance',
        ])->subject()->associate($franchise)->save();

        return view('backend.user.permits.franchise.clearance', [
            'franchise' => $franchise,
            'b_officials' => Official::query()->where('barangay_id', Auth::user()->official->barangay->id)->get(),
        ]);
    }
}
