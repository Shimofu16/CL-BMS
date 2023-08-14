<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\Resident;
use Illuminate\Http\Request;

class CertificateListController extends Controller
{
    public function create($certificate, $id)
    {
        $residences = Resident::query();
        if ($certificate == 'clearance') {
            return view('backend.user.barangay.certificates.clearance.create', [
                'resident' =>    $residences->findOrFail($id),
                'resident_with_blotter' =>    $residences->with('blotters')->findOrFail($id),
            ]);
        }
    }
}
