<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Model\Fencing;
use App\Model\Officials;
use Carbon\Carbon;
use App\Model\ActivityLog;
use Illuminate\Support\Facades\Auth;

class FencingController extends Controller
{
    public function index()
    {
        return view('brgy_permit.fencing_permit.index', [
            'fencings' => Fencing::orderBy('id','desc')->get(),
        ]);
    }

    public function create()
    {
        return view('brgy_permit.fencing_permit.create');
    }

    public function store(Request $request)
    {
        $year = Carbon::now()->year;  
        $fencing_cnt = Fencing::all()->count();

        $fencing_cnt =  $fencing_cnt + 1;    
        $fencing_number = $year . '-' . $fencing_cnt;

        $fencing = Fencing::create([
            'fencing_number' => $fencing_number,
            'name' => $request->name,
            'address' => $request->address,
            'fencing_location' => $request->fencing_location,
            'purpose' => $request->purpose,
        ]);

        return redirect()->route('fencing_permit.index')->withStatus('Fencing Added Succesfully!');
    }

    public function show($id)
    {
        return view('brgy_permit.fencing_permit.show', [
            'fencing' => Fencing::findOrFail($id),
        ]);
    }

    public function clearance($id)
    {
        // officials
        $latest_id= Officials::max('batch_id');
        $b_officials= Officials::where('batch_id',$latest_id)->get();

        ActivityLog::create([
            'user' => Auth::user()->name,
            'description' => 'Issue Brgy Fencing Permit',
            'subject' => 'Brgy Fencing',
        ]);

        return view('brgy_permit.fencing_permit.clearance', [
            'fencing' => Fencing::findOrFail($id),
            'b_officials' => $b_officials,
        ]); 
    }
}
