<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Permit;
use Auth;
use Illuminate\Http\Request;
use Str;

class PermitController extends Controller
{
    protected $permit_type;

    protected $barangay_id;
    public function __construct($permit_type)
    {
        $this->permit_type = $permit_type;
        $this->barangay_id = Auth::user()->official->barangay->id;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewPath = "backend.user.permits.{$this->permit_type}.index";
        $permitType = Str::ucFirst($this->permit_type) . ' permit';
        $permits = Permit::where('type', $permitType)
            ->where('barangay_id', $this->barangay_id)
            ->get();

        return view($viewPath, compact('permits'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
