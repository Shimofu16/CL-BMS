<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\Barangay;
use App\Model\Official;
use App\Permit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PermitController extends Controller
{
    protected $permit_type;

    protected $barangay;

    public function __construct(Request $request)
    {
        $this->permit_type = $request->get('permit_type');
        if ($request->has('permit_type')) {
            
        }
        $this->barangay = Barangay::find(Auth::user()->official->barangay->id);
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
            ->where('barangay_id', $this->barangay->id)
            ->get();

        return view($viewPath, compact('permits'));
    }

    public function pdf($permit_id)
    {
        // dd($this->permit_type, $permit_id);

        return view(
            'backend.user.permits.pdf',
            [
                'filename' => "{$this->permit_type}_permit.pdf",
                'officials' => Official::where('barangay_id', $this->barangay->id)->get(),
                'barangay' => $this->barangay,
                'permit_type' => $this->permit_type,
                'permit' => Permit::find($permit_id),
                'captain' => Official::where('barangay_id', $this->barangay->id)->where('position', 'Captain')->first(),
                'secretary' => Official::where('barangay_id', $this->barangay->id)->where('position', 'Secretary')->first(),
            ]
        );
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
