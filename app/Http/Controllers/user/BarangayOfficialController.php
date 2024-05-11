<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\Official;
use App\Model\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangayOfficialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user.officials.index', [
            'officials' => Official::query()->where('toArchive', false)->where('barangay_id', Auth::user()->official->barangay->id)->get(),
            'positions' => ['Chairman', 'Co-Chairman', 'Councilor', 'Treasurer', 'Secretary']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'first_name' => ['required', 'string'],
                'middle_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'position' => ['required', 'string'],
            ]);

            Official::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'position' => $request->position,
                'year_id' => Year::where('status', true)->first()->id,
                'barangay_id' => Auth::user()->official->barangay->id,
            ]);
            return redirect()->back()->with('success', 'Barangay Official Successfully Added');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $official = Official::findOrFail($id);
            $official->update([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'position' => $request->position,
            ]);
            return redirect()->back()->with('success', 'Barangay Official Successfully Updated');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $official = Official::findOrFail($id);
            $official->update([
                'toArchive' => true
            ]);
            return redirect()->back()->with('success', 'Barangay Official Successfully Added to Archive');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
