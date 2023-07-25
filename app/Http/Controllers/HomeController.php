<?php

namespace App\Http\Controllers;

use App\Barangay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if (Auth::user()->role === 'Admin') {
                $this->generateSession(false);
                return redirect()->intended(route('admin.dashboard.index'));
            }

            if (Auth::user()->role === 'User' && Auth::user()->official->barangay_id === session('barangay_id')) {
                $this->generateSession(false);
                return redirect()->intended(route('user.dashboard.index'));
            }
            $this->generateSession(true);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('home.index');
    }
}
