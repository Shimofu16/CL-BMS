<?php

namespace App\Http\Controllers\user;

use App\Permit;
use Carbon\Carbon;
use App\Model\Fencing;
use App\Model\Officials;
use App\Model\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FencingController extends Controller
{
    public function index()
    {
        return view('backend.user.permits.fencing.index', [
            'fencings' => Permit::where('type','Fencing permit')
                                    ->where('barangay_id',Auth::user()->official_id)
                                    ->get(),
        ]);
    }

    public function create()
    {
        return view('backend.user.permits.fencing.create');
    }

    public function store(Request $request)
    {
        $year = Carbon::now()->year;  
        $fencing_cnt = Permit::where('type', 'Fencing permit')
                                ->where('barangay_id', Auth::user()->official_id)
                                ->count();

        $fencing_cnt =  $fencing_cnt + 1;    
        $fencing_number = $year.'-'.Auth::user()->official->barangay->name.'-'. $fencing_cnt;

        $details = [
            'number' => $fencing_number,
            'name' => $request->name,
            'address' => $request->address,
            'location' => $request->location,
            'purpose' => $request->purpose,
        ];

        $fencing = Permit::create([
            'type' => 'Fencing permit',
            'barangay_id' => Auth::user()->official_id,
            'details' => $details,
        ]);

        return redirect()->route('fencing_permit.index')->withStatus('Fencing Added Succesfully!');
    }

    public function show($id)
    {
        return view('backend.user.permits.fencing.show', [
            'fencing' => Permit::findOrFail($id),
        ]);
    }

    public function clearance($id)
    {
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'description' => 'Issue Brgy Fencing Permit',
            'subject' => 'Brgy Fencing',
        ]);

        return view('backend.user.permits.fencing.clearance', [
            'fencing' => Permit::findOrFail($id),
            'b_officials' => Officials::query()->where('barangay_id', Auth::user()->official_id)->get(),
        ]); 
    }
}
