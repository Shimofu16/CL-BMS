<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Resident;
use App\Model\Official;
use App\Model\Blotter;

class BarangaySettlementAgreementController extends Controller
{
    public function show($id, Request $request)
    {
        // officials
        $latest_id= Officialmax('batch_id');
        $b_officials= Official::where('batch_id',$latest_id)->get();

        $blotter = Blotter::with('residence')->findOrfail($id);
        return view('brgy_certificate.brgy_settle_agreement.show', [
            'b_officials' => $b_officials,
        ]);
    }
}
