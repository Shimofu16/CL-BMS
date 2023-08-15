<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\model\ActivityLog;
use App\Model\Officials;
use App\Model\Resident;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateListController extends Controller
{
    public function create($certificate, $id)
    {
        $residences = Resident::query();
        if ($certificate == 'barangay_clearance') {
            return view('backend.user.barangay.certificates.clearance.create', [
                'resident' =>    $residences->findOrFail($id),
                'resident_with_blotter' =>    $residences->with('blotters')->findOrFail($id),
            ]);
        }
    }
    public function store(Request $request, $certificate, $id){
           // officials
           $latest_id= Officials::max('batch_id');
           $b_officials= Officials::where('batch_id',$latest_id)->get();
   
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
   
           return view('backend.user.barangay.certificates.clearance.show', [
               'resident' => Resident::findOrFail($id),
               'purpose' => $request->purpose,
               'b_officials' => $b_officials,
               'clearance_cnt' => $clearance_cnt,
           ]);
    }
}
