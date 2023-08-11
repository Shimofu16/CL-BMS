<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Model\Resident;
use App\Model\Officials;
use App\Model\ActivityLog;
use Illuminate\Support\Facades\Auth;

class BarangayLiveinController extends Controller
{
    public function create($id)
    {
        return view('brgy_certificate.livein_certification.create', [
            'resident' => Resident::findOrFail($id),
        ]); 
    }

    public function show($id, Request $request)
    {
        // officials
        $latest_id= Officials::max('batch_id');
        $b_officials= Officials::where('batch_id',$latest_id)->get();

        $resident = Resident::findOrfail($id); 

        $purpose = $request->purpose;
        $partner = $request->partner;
        $long = $request->long;

        ActivityLog::create([
            'user' => Auth::user()->name,
            'description' => 'Issue Brgy Live In Certificate',
            'subject' => 'Brgy Live In',
        ]);

        return view('brgy_certificate.livein_certification.show', [
            'resident' => Resident::findOrFail($id),
            'purpose' => $request->purpose,
            'partner' => $request->partner,
            'long' => $request->long,
            'b_officials' => $b_officials,
        ]);
    }
}
