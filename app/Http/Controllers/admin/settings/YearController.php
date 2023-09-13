<?php

namespace App\Http\Controllers\admin\settings;

use App\Http\Controllers\Controller;
use App\Model\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::all();
        return view('backend.admin.years.index', compact('years'));
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
        $request->validate([
            'year' => 'required',
        ]);
        Year::create([
            'year' => $request->year
        ]);
        return back()->with('success', 'Year Added Successfully');
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
        $request->validate([
            'year' => 'required',
        ]);
        $year = Year::find($id);
        $year->year = $request->year;
        if ($request->has('status') && $request->status != "") {
            if ($request->status == 1) {
                $currentYear = Year::where('status', 1)->first();
                if ($currentYear) {
                    $currentYear->status = 0;
                    $currentYear->save();
                }
            }
            $year->status = $request->status;
        }
        $year->save();
        return back()->with('success', 'Year Updated Successfully');
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
            $year = Year::find($id);
            $year->delete();
            return back()->with('success', 'Year Deleted Successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
