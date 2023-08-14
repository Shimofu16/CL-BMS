<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Resident;
use App\Model\Officials;
use App\Model\ActivityLog;
use Illuminate\Support\Facades\Auth;

class BarangayIndigencyController extends Controller
{
    public function create($id)
    {
        return view('brgy_certificate.indigency_certification.create', [
            'resident' => Resident::findOrFail($id),
        ]);
    }

    public function show($id, Request $request)
    {
         // officials
        $latest_id= Officials::max('batch_id');
        $b_officials= Officials::where('batch_id',$latest_id)->get();

        ActivityLog::create([
            'user' => Auth::user()->name,
            'description' => 'Issue Brgy Indigency Certificate',
            'subject' => 'Brgy Indigency',
        ]);

        return view('brgy_certificate.indigency_certification.show', [
            'resident' => Resident::findOrFail($id),
            'purpose' => $request->purpose,
            'b_officials' => $b_officials
        ]);
    }
}
