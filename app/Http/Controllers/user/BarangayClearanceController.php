<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Resident;
use App\Model\Blotter;
use App\Model\Official;
use App\Model\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Carbon\carbon;

class BarangayClearanceController extends Controller
{
    public function index()
    {
        return view('brgy_certificate.brgy_clearance.index', [
            'residence_list' => Resident::all()
        ]);
    }

    public function create($id)
    {
        return view('brgy_certificate.brgy_clearance.create', [
            'resident' => Resident::findOrFail($id),
            'resident_with_blotter' => Resident::with('blotters')->findOrFail($id),
        ]);
    }

    public function show($id, Request $request)
    {
         // officials
        $latest_id= Officialmax('batch_id');
        $b_officials= Official::where('batch_id',$latest_id)->get();

        $clearance_cnt = ActivityLog::where('subject', '=', 'Brgy Clearance')
                                        ->whereBetween('created_at', [
                                            Carbon::now()->startOfYear(),
                                            Carbon::now()->endOfYear(),
                                        ])
                                        ->count();

        $clearance_cnt = $clearance_cnt + 1;

        $ActivityLog = ActivityLog::create([
            'user' => Auth::user()->name,
            'description' => 'Issue Brgy Clearance Certificate',
            'subject' => 'Brgy Clearance',
        ]);

        $ActivityLog_id = $ActivityLog->id;

        return view('brgy_certificate.brgy_clearance.show', [
            'resident' => Resident::findOrFail($id),
            'purpose' => $request->purpose,
            'b_officials' => $b_officials,
            'clearance_cnt' => $clearance_cnt,
        ]);
    }
}
