<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\model\ActivityLog;
use App\Model\Barangay;
use App\Model\Officials;
use App\Model\Resident;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateListController extends Controller
{
    public $barangay_id;
    public $barangay;
    public $residents;


    public function __construct(Request $request)
    {
        // Initialize a default value for barangay_id in case it's not in the session
        $this->barangay_id = session('barangay_id');

        $this->barangay = Barangay::findOrFail($this->barangay_id);
        $this->residents = Resident::query()->where('barangay_id', $this->barangay_id);
    }
    public function create(Request $request, $resident_id)
    {

        $isHeadOfTheFamily = false;
        // certificate
        $certificate = $request->certificate;
        // receiver id
        $receiver_id = $request->receiver_id;
        // resident
        $resident =  Resident::with('members')->findOrFail($resident_id);
        // receiver
        $isHeadOfTheFamily = $receiver_id == "father";
        $receiver = $isHeadOfTheFamily ? $resident : $resident->members()->where('id', $receiver_id)->first();

        // officials
        $barangay_officials = Officials::query()->where('barangay_id', $this->barangay_id)->get();
        // chairman
        $chairman = $barangay_officials->where('position', 'Captain')->first();


        // remove the _ and replace it with space, then capitalize the first letter of each word and add "certificate"
        $certificate = ucwords(str_replace("_", " ", $certificate)) . " Certificate";
        $clearance_count = ActivityLog::where('subject', '=', $certificate)
            ->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->count() + 1;

        // $clearance_count = $clearance_count + 1;

        // ActivityLog::create([
        //     'user' => Auth::user()->name,
        //     'description' => 'Issue ' . $title . ' to ' . $resident->name,
        //     'subject' => $title,
        // ]);


        // dd($receiver,$resident,$resident->members()->find($receiver_id),$receiver_id);
        return view('backend.user.barangay.certificates.exports.show', [
            'resident' => $resident,
            'receiver' => $receiver,
            'certificate' => $certificate,
            'purpose' => $request->purpose,
            'barangay_officials' => $barangay_officials,
            'barangay' => $this->barangay,
            'chairman' => $chairman,
            'clearance_count' => $clearance_count,
            'isHeadOfTheFamily' => $isHeadOfTheFamily
        ]);
    }
    public function store(Request $request, $certificate, $id)
    {
        // officials
        $officials = Officials::query()->where('barangay_id', $this->barangay_id)->get();
        // chairman
        $chairman = $officials->where('position', 'Chairman')->first();
        // resident
        $resident =  Resident::findOrFail($id);
        // remove the _ and replace it with space, then capitalize the first letter of each word and add "certificate"
        $title = ucwords(str_replace("_", " ", $certificate)) . " Certificate";
        $clearance_count = ActivityLog::where('subject', '=', $title)
            ->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->count() + 1;

        // $clearance_count = $clearance_count + 1;

        // ActivityLog::create([
        //     'user' => Auth::user()->name,
        //     'description' => 'Issue ' . $title . ' to ' . $resident->name,
        //     'subject' => $title,
        // ]);



        return view('backend.user.barangay.certificates.exports.show', [
            'resident' => $resident,
            'purpose' => $request->purpose,
            'officials' => $officials,
            'chairman' => $chairman,
            'clearance_count' => $clearance_count,
        ]);
    }
}
