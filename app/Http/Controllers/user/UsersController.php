<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\Official;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangay_id = Auth::user()->official->barangay_id;

        $users = User::where('role', 'User')
            ->whereHas('official', function ($query) use ($barangay_id) {
                $query->where('barangay_id', $barangay_id);
            })
            ->with(['official' => function ($query) {
                $query->orderBy('position', 'ASC');
            }])
            ->get();

        $officials = Official::doesntHave('user')
            ->where('barangay_id', $barangay_id)
            ->get();



        return view('backend.admin.users.index', compact('users', 'officials'));
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
                'official_id' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'confirm_password' => ['required', 'string', 'min:8', 'same:password'],
            ]);
            $official = Official::findOrFail($request->official_id);
            User::create([
                'name' => $official->full_name,
                'official_id' => $request->official_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return back()->with('success', 'User Added Successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', 'Email already exist');
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
            $request->validate([
                'email' => ['required', 'email', 'unique:users,email'],
                'current_password' => ['required', 'string', 'min:8'],
                'new_password' => ['required', 'string', 'min:8'],
                'confirm_password' => ['required', 'string', 'min:8', 'same:new_password'],
            ]);
            $user = User::findOrFail($id);
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
            $user->update([
                'email' => $request->email,
                'password' => Hash::make($request->new_password),
            ]);
            return back()->withSuccess('User updated successfully.');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => $th->getMessage()]);
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
        //
    }
}
