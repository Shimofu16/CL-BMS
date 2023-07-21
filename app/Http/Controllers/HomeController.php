<?php

namespace App\Http\Controllers;

use App\Barangay;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $barangays = Barangay::all();
        return view('frontend.home.index', compact('barangays'));
    }
    public function login($barangay_id){
        $barangay = Barangay::find($barangay_id);
        return view('frontend.auth.login', compact('barangay'));
    }
}
