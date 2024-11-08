<?php

namespace App\Http\Controllers;

use App\Model\Barangay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

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
        return view('index', compact('barangays'));
    }

    // CALAUAN

    public function municipality()
    {
        $barangays = Barangay::all();
        return view('frontend.municipality.calauan.index', compact('barangays'));
    }

    public function historicalBackground()
    {
        $barangays = Barangay::all();
        return view('frontend.municipality.calauan.historical_background', compact('barangays'));
    }

    public function profile()
    {
        $barangays = Barangay::all();
        $total = $barangays->count();
        $column1 = ceil($total / 3);
        $column2 = ceil(($total - $column1) / 2);
        return view('frontend.municipality.calauan.profile', compact('barangays', 'column1', 'column2'));
    }

    public function officials()
    {
        $barangays = Barangay::all();
        return view('frontend.municipality.calauan.officials', compact('barangays'));
    }

    public function offices()
    {
        $barangays = Barangay::all();
        return view('frontend.municipality.calauan.offices', compact('barangays'));
    }

    public function barangayDirectory()
    {
        $barangays = Barangay::all();
        return view('frontend.municipality.calauan.barangay-directory', compact('barangays'));
    }

    public function barangay($barangay_id)
    {
        $barangay = Barangay::find($barangay_id);
        $officials = $barangay->officials;
        return view('frontend.barangays.index', compact('barangay', 'officials'));
    }

    public function login($barangay_id)
    {
        $barangay = Barangay::find($barangay_id);
        // store barangay id to session
        session(['barangay_id' => $barangay->id]);
        return view('frontend.auth.login', compact('barangay'));
    }
    public function admin()
    {
        return view('frontend.auth.login');
    }
    private function generateSession($isOffline)
    {
        if ($isOffline) {
            Auth::user()->status = "offline";
            Auth::user()->save();
            session()->regenerate();
            session()->forget(Auth::id() . '_last_activity');
        } else {
            Auth::user()->status = "online";
            Auth::user()->save();
            session()->regenerate();
            session()->put(Auth::id() . '_last_activity', now());
            // Log::create([
            //     'user_id' => Auth::id(),
            //     'action' => 'login',
            //     'time_in' => now(),
            // ]);
        }
    }
    private function isPreviousUrl($url)
    {
        $previous_url = request()->root() . str_replace(url('/'), '', URL::previous());
        $url = request()->root() . $url;
        return $previous_url == $url;
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            // if (Auth::user()->force_change_password) {
            //     return redirect()->intended(route(Auth::user()->role->name.'.change-password.index'));
            // }
            $previous_url = URL::previous();

            if (Auth::user()->role === 'Admin' &&  $this->isPreviousUrl('/admin/login')) {
                $this->generateSession(false);
                return redirect()->intended(route('admin.dashboard.index'));
            }

            if (Auth::user()->role === 'User' && Auth::user()->official->barangay_id === session('barangay_id')) {
                $this->generateSession(false);
                return redirect()->intended(route('user.dashboard.index'));
            }
        }
        $this->generateSession(true);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('home');
    }
}
