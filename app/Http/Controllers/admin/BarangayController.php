<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Barangay;
use App\Model\Purok;
use Illuminate\Http\Request;

class BarangayController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.barangay.index', [
            'barangays' => Barangay::all()
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
    public function store(Request $request, $isBarangay, $barangay_id = null)
    {
        try {
            $message = "Added Successfully";
            if ($isBarangay == 1) {
                Barangay::create([
                    'name' => $request->name,
                ]);
                $message = "Barangay " . $request->name . ' ' . $message;
            } else {
                Purok::create([
                    'name' => $request->name,
                    'barangay_id' => $barangay_id,
                ]);
                $message = "Purok " . $request->name . ' ' . $message;
            }
            return redirect()->back()->with('success', $message);
        } catch (\Throwable $th) {
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
        return view('backend.admin.barangay.show', [
            'barangays' => Barangay::all(),
            'barangay' => Barangay::find($id),
            'puroks' => Purok::query()->where('barangay_id', $id)->get(),
        ]);
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
    public function update(Request $request, $isBarangay, $id)
    {
        try {
            $message = "Updated Successfully";
            if ($isBarangay == 1) {
                $barangay = Barangay::find($id);
                $barangay->update([
                    'name' => $request->name,
                ]);
                $message = "Barangay " .  $request->name . ' ' . $message;
            } else {
                $purok = Purok::find($id);
                $purok->update([
                    'name' => $request->name,
                ]);
                $message = "Purok " .  $request->name . ' ' . $message;
            }
            return redirect()->back()->with('success', $message);
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
    public function destroy($isBarangay, $id)
    {
        try {
            $message = "Deleted Successfully";
            if ($isBarangay == 1) {
                $barangay = Barangay::find($id);
                // delete all purok in this barangay
                $barangay->puroks()->delete();
                // delete barangay
                $barangay->delete();
                $message = "Barangay " .  $barangay->name . ' ' . $message;
            } else {
                $purok = Purok::find($id);
                $purok->delete();
                $message = "Purok " .  $purok->name . ' ' . $message;
            }
            return redirect()->back()->with('success', $message);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
