<?php

namespace App\Http\Controllers\user;

use App\Permit;
use Carbon\Carbon;
use App\Model\Building;
use App\Model\Resident;
use App\Model\Official;
use App\Model\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BuildingPermitController extends Controller
{
    public function index()
    {
        // $expired_business = 0;
        // foreach ($businesses as $businesse){
        //     $registration_date = \Carbon\Carbon::parse($businesse->regs_date)->diff(\Carbon\Carbon::now())->format('%y');

        //         if($registration_date > 1){
        //             $expired_business = $expired_business = 1;
        //         }
        // }

        return view('backend.user.permits.building.index', [
            'buildings' => Permit::where('type', 'Building permit')
                                    ->where('barangay_id',Auth::user()->official->barangay->id)
                                    ->get(),
        ]);
    }

    public function create()
    {
        return view('backend.user.permits.building.create', [
            'residents' => Resident::where('barangay_id',Auth::user()->official->barangay->id)->get()
        ]);
    }

    public function store(Request $request)
    {
        $year = Carbon::now()->year;
        $building_cnt = Permit::where('type', 'Building permit')
                                    ->where('barangay_id',Auth::user()->official->barangay->id)
                                    ->count();

        $building_cnt =  $building_cnt + 1;
        $building_number = $year . '-'.Auth::user()->official->barangay->name .'-' . $building_cnt;

        $details = [
            'number' => $building_number,
            'type' => $request->building_type,
            'address' => $request->building_address,
            'registration_date' => $request->reg_date,
        ];

        $buildingPermit = Permit::create([
            'type' => 'Building permit',
            'resident_id' => $request->resident,
            'barangay_id' => Auth::user()->official->barangay->id,
            'details' => $details,
        ]);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'scope' => 'Permits/Clearances',
            'action' => 'create',
            'description' => 'Registered building',
        ])->subject()->associate($buildingPermit)->save();

        return redirect()->route('building_permit.index')->withStatus('Building Added Succesfully!');
    }

    public function show($id)
    {
        return view('backend.user.permits.building.show', [
            'building' => Permit::where('type','Building permit')
                                    ->findOrFail($id),
        ]);
    }

    public function clearance($id)
    {
        $building = Permit::with('owner')->findOrFail($id);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'scope' => 'Permits/Clearances',
            'action' => 'issuance',
            'description' => 'Issued Brgy Building Clearance',
        ])->subject()->associate($buildilng)->save();

        return view('backend.user.permits.building.clearance', [
            'building' => $buildilng,
            'b_officials' => Official::query()->where('barangay_id', Auth::user()->official->barangay->id)->get(),
        ]);
    }

    // idk what happened here and at this point im too afraid to ask

     //public function create_clearance($id){
     //    return view('brgy_permit.business_clearance.clearance');
     //}


    // public function show_clearance($id){
    //     // officials
    //     $b_cap = Officials::where('brgy_official_position','Barangay Chairman')->first();
    //     $b_councelor1 = Officials::where('brgy_official_position','Councilor 1')->first();
    //     $b_councelor2 = Officials::where('brgy_official_position','Councilor 2')->first();
    //     $b_councelor3 = Officials::where('brgy_official_position','Councilor 3')->first();
    //     $b_councelor4 = Officials::where('brgy_official_position','Councilor 4')->first();
    //     $b_councelor5 = Officials::where('brgy_official_position','Councilor 5')->first();
    //     $b_councelor6 = Officials::where('brgy_official_position','Councilor 6')->first();
    //     $b_councelor7 = Officials::where('brgy_official_position','Councilor 7')->first();
    //     $b_sk = Officials::where('brgy_official_position','SK Chairperson')->first();
    //     $b_sec = Officials::where('brgy_official_position','Barangay Secretary')->first();
    //     $b_tres = Officials::where('brgy_official_position','Barangay Treasurer')->first();
    //     $b_clerk = Officials::where('brgy_official_position','Barangay Clerk')->first();
    //     //

    //     $business = Business::with('residence')->findOrfail($id);
    //     return view('brgy_permit.business_clearance.clearance',compact('business', 'b_cap','b_councelor1','b_councelor2','b_councelor3','b_councelor4','b_councelor5','b_councelor6' ,'b_councelor7', 'b_sk', 'b_sec' , 'b_tres', 'b_clerk'));
    // }
}
