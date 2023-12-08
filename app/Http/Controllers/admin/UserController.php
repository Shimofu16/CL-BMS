<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\model\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role','User')->get();
        return view('backend.admin.users.index', compact('users'));
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

    public function activities($id, Request $request)
    {
        $activities = ActivityLog::query()
                                    ->with('user')
                                    ->where('user_id',$id)
                                    ->filter($request->only(['type']))
                                    ->orderBy('created_at','desc')
                                    ->paginate(10)
                                    ->withQueryString();

        if ($request->ajax()) {
            return view('backend.admin.activity_log.partials.activities', [
                'activities' => $activities,
            ])->render();
        }

        return view('backend.admin.users.activities', [
            'activities' => $activities,
            'filters' => ActivityLog::select('scope')->distinct()->get()->pluck('scope'),
            'params' => $request->only(['type']),
            'userId' => $id
        ]);
    }
}
