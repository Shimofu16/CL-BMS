<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Model\Digging;
use App\Model\Officials;
use Carbon\Carbon;
use App\Model\ActivityLog;
use Illuminate\Support\Facades\Auth;

class DiggingPermitController extends Controller
{
    public function index()
    {
        return view('brgy_permit.digging_permit.index', [
            'diggings' => Digging::orderBy('id','desc')->get(),
        ]);
    }

    public function create()
    {
        return view('brgy_permit.digging_permit.create');
    }

    public function store(Request $request)
    {
        $year = Carbon::now()->year;  
        $digging_cnt = Digging::all()->count();

        $digging_cnt =  $digging_cnt + 1;    
        $digging_number = $year . '-' . $digging_cnt;

        $digging = Digging::create([
            'digging_number' => $digging_number,
            'name' => $request->name,
            'address' => $request->address,
            'digging_location' => $request->digging_location,
            'purpose' => $request->purpose,
        ]);

        return redirect()->route('digging_permit.index')->withStatus('Digging Added Succesfully!');
    }

    public function show($id)
    {
        return view('brgy_permit.digging_permit.show', [
            'digging' => Digging::findOrFail($id)
        ]);
    }
    
    public function clearance($id){
        // officials
        $latest_id= Officials::max('batch_id');
        $b_officials= Officials::where('batch_id',$latest_id)->get();

        ActivityLog::create([
            'user' => Auth::user()->name,
            'description' => 'Issue Brgy Digging Permit',
            'subject' => 'Brgy Digging',
        ]);

        return view('brgy_permit.digging_permit.clearance', [
            'digging' => Digging::findOrFail($id),
            'b_officials' => $b_officials,
        ]); 
    }
}
