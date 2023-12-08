<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Resident;
use App\Model\Official;
use App\Model\ActivityLog;
use Illuminate\Support\Facades\Auth;

class BarangayGoodmoralController extends Controller
{
    public function create($id)
    {
        return view('brgy_certificate.goodmoral_certification.create', [
            'resident' => Resident::findOrFail($id),
        ]);
    }

    public function show($id, Request $request)
    {
        // officials
        $latest_id= Officialmax('batch_id');
        $b_officials= Official::where('batch_id',$latest_id)->get();

        $resident = Resident::findOrfail($id);
        $purpose  = $request->purpose;

        ActivityLog::create([
            'user' => Auth::user()->name,
            'description' => 'Issue Brgy Goodmoral Certificate',
            'subject' => 'Brgy Goodmoral',
        ]);

        return view('brgy_certificate.goodmoral_certification.show', [
            'resident' => Resident::findOrFail($id),
            'purpose' => $request->purpose,
            'b_officials' => $b_officials,
        ]);
    }
}
