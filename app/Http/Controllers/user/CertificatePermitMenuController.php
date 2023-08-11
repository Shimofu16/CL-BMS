<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

class CertificatePermitMenuController extends Controller
{
    public function brgy_clearance()
    {
        return view('brgy_certificate.brgy_clearance.index', [
            'residence_list' => Resident::all(),
        ]);
    }
}
