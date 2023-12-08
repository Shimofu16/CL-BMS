<?php

namespace App\Http\Controllers\user;

use App\Permit;
use Carbon\Carbon;
use App\Model\Official;
use App\Model\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DiggingPermitController extends Controller
{
    public function index()
    {
        return view('backend.user.permits.digging.index', [
            'diggings' => Permit::where('type', 'Digging permit')
                                    ->where('barangay_id',Auth::user()->official->barangay->id)
                                    ->get(),
        ]);
    }

    public function create()
    {
        return view('backend.user.permits.digging.create');
    }

    public function store(Request $request)
    {
        $year = Carbon::now()->year;
        $digging_cnt = Permit::where('type', 'Digging permit')
                                ->where('barangay_id',Auth::user()->official->barangay->id)
                                ->count();

        $digging_cnt =  $digging_cnt + 1;
        $digging_number = $year . '-'.Auth::user()->official->barangay->name.'-'. $digging_cnt;

        $details = [
            'number' => $digging_number,
            'name' => $request->name,
            'address' => $request->address,
            'location' => $request->location,
            'purpose' => $request->purpose,
        ];

        $digging = Permit::create([
            'type' => 'Digging permit',
            'barangay_id' => Auth::user()->official->barangay->id,
            'details' => $details,
        ]);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'scope' => 'Permits/Clearances',
            'action' => 'create',
            'description' => 'Registered digging',
        ])->subject()->associate($digging)->save();

        return redirect()->route('digging_permit.index')->withStatus('Digging Added Succesfully!');
    }

    public function show($id)
    {
        return view('backend.user.permits.digging.show', [
            'digging' => Permit::findOrFail($id)
        ]);
    }

    public function clearance($id)
    {
        $digging = Permit::with('owner')->findOrFail($id);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'description' => 'Issue Brgy Digging Permit',
            'scope' => 'Permits/Clearances',
            'action' => 'issuance'
        ])->subject()->associate($digging)->save();

        return view('backend.user.permits.digging.clearance', [
            'digging' => $digging,
            'b_officials' => Official::query()->where('barangay_id', Auth::user()->official->barangay->id)->get(),
        ]);
    }
}
