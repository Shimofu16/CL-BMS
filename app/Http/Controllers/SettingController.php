<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('backend.admin.settings.index', compact('settings'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $setting = Setting::find($id);
            $path = 'storage/settings/';
            if ($setting->key == 'name') {
                $request->validate([
                    'value' => 'required|string'
                ]);
                $setting->update([
                    'value' => $request->value,
                ]);
                return back()->with('success', 'Successfully Updated Settings');
            }
            $request->validate([
                'value' =>  'required|image|mimes:png,jpg|max:2048',
            ]);
            $logo = $request->file('value');
            $extension = $logo->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $file = $path . $fileName;
            $logo->storeAs('settings', $fileName,'public');
            $setting->update([
                'value' => $file,
            ]);
            return back()->with('success', 'Successfully Updated Settings');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
