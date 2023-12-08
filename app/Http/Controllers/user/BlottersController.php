<?php

namespace App\Http\Controllers\user;

use Carbon\Carbon;
use App\Model\Blotter;
use App\Model\Resident;
use App\Model\Officials;
use App\model\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlottersController extends Controller
{
    public function index()
    {
        // $blotters = Blotter::with('residents')->where('status', '!=', 'Settled')->get();
        return view('backend.user.blotters.index', [
            'blotters' => Blotter::with('residents')
                ->where('barangay_id', Auth::user()->official->barangay->id)
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }

    public function create()
    {
        return view('backend.user.blotters.create', [
            'residents' => Resident::where('barangay_id', Auth::user()->official->barangay->id)->get(),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $year = Carbon::now()->year;
        $blot_cnt = Blotter::where('barangay_id', Auth::user()->official->barangay->id)->count();

        $case_cnt =  $blot_cnt + 1;
        $case_number = $year . '-' . Auth::user()->official->barangay->name . '-' . $case_cnt;

        $blotter = Blotter::create([
            'barangay_id' => Auth::user()->official->barangay->id,
            'case_number' => $case_number,
            'complainant_name' => $request->complainant_name,
            'complained_resident' => $request->complained_resident,
            'blotters_info' => $request->blotter_info,
            'case_type' => $request->case_type,
            'status' => $request->status,
            'date_of_incident' => $request->date_of_incident,
        ]);
        $blotter->residents()->attach($request->resident_id);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'action' => 'create',
            'scope' => 'Blotter',
            'description' => "Added blotter case",
        ])->subject()->associate($blotter)->save();

        return redirect()->route('user.barangay.blotters.index')->withStatus('Blotter Added Succesfully!');
    }

    public function show($id)
    {
        return view('backend.user.blotters.show', [
            'blotter' => Blotter::with('residents')->findOrFail($id),
        ]);
    }

    public function settelement($id)
    {
        return view('backend.user.blotters.settlementAgreement', [
            'blotter' => Blotter::with('residents')->findOrFail($id),
        ]);
    }

    public function settelement_save(Request $request, $id)
    {
        $blotter = Blotter::findOrfail($id);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'scope' => 'Blotter',
            'action' => 'settle',
            'description' => "Settled blotter case",
        ])->subject()->associate($blotter)->save();

        $blotter->update([
            'agreement' => $request->agreement,
            'settled_at' => now(),
        ]);

        return redirect()->route('user.barangay.blotters.show', $id)->withStatus('Case has been settlled!');
    }

    public function update(Request $request, $id)
    {
        $blotter = Blotter::findOrfail($id);
        if ($request->patawag === "bcp1") {
            $blotter->bcp1 = $request->patawag;
            $blotter->save();
            return redirect()->route('user.barangay.blotters.show', $id)->withStatus('Brgy Captain Patawag 1 has been created!');
        } elseif ($request->patawag === "bcp2") {
            $blotter->bcp2 = $request->patawag;
            $blotter->save();
            return redirect()->route('user.barangay.blotters.show', $id)->withStatus('Brgy Captain Patawag 2 has been created!');
        } elseif ($request->patawag === "bcp3") {
            $blotter->bcp3 = $request->patawag;
            $blotter->save();
            return redirect()->route('user.barangay.blotters.show', $id)->withStatus('Brgy Captain Patawag 3 has been created!');
        } elseif ($request->patawag === "lbp1") {
            $blotter->lbp1 = $request->patawag;
            $blotter->save();
            return redirect()->route('user.barangay.blotters.show', $id)->withStatus('Lupon ng Tagapamayapa Patawag 1 has been created!');
        } elseif ($request->patawag === "lbp2") {
            $blotter->lbp2 = $request->patawag;
            $blotter->save();
            return redirect()->route('user.barangay.blotters.show', $id)->withStatus('Lupon ng Tagapamayapa Patawag 2 has been created!');
        } elseif ($request->patawag === "lbp3") {
            $blotter->lbp3 = $request->patawag;
            $blotter->save();
            return redirect()->route('user.barangay.blotters.show', $id)->withStatus('Lupon ng Tagapamayapa Patawag 3 has been created!');
        }

        if ($request->patawag === "Settled") {
            return redirect()->route('user.barangay.blotters.settelement', $id);
        }

        if ($request->patawag === "Cancelled") {
            ActivityLog::create([
                'user_id' => Auth::user()->id,
                'scope' => 'Blotter',
                'action' => 'cancel',
                'description' => 'Cancelled blotter case',
            ])->subject()->associate($blotter)->save();
            
            $blotter->cancelled_at = now();
            $blotter->save();
            return redirect()->route('user.barangay.blotters.show', $id)->withStatus('Case has been cancelled!');
        }
    }

    public function Manage(Request $request, $id)
    {
        $blotter = Blotter::findOrfail($id);

        $blotter->bcp1_date = $request->bcp1_date;
        $blotter->bcp1_note = $request->bcp1_note;

        $blotter->bcp2_date = $request->bcp2_date;
        $blotter->bcp2_note = $request->bcp2_note;

        $blotter->bcp3_date = $request->bcp3_date;
        $blotter->bcp3_note = $request->bcp3_note;

        $blotter->lbp1_date = $request->lbp1_date;
        $blotter->lbp1_note = $request->lbp1_note;

        $blotter->lbp2_date = $request->lbp2_date;
        $blotter->lbp2_note = $request->lbp2_note;

        $blotter->lbp3_date = $request->lbp3_date;
        $blotter->lbp3_note = $request->lbp3_note;

        $blotter->save();

        return redirect()->back();
    }

    public function patawag($date, $id)
    {
        // $latest_id = Officials::max('batch_id');
        // $b_officials = Officials::where('batch_id', $latest_id)->get();

        // return view('blotters.patawag',compact('date','blotter','b_officials'));
        // idk why there's a date here so i will just comment it for now

        return view('backend.user.blotters.patawag', [
            'date' => $date,
            'blotter' => Blotter::with('residents')->findOrFail($id),
            'b_officials' => Officials::query()->where('barangay_id', Auth::user()->official->barangay->id)->get(),
        ]);
    }
}
