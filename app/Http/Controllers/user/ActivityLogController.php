<?php

namespace App\Http\Controllers\user;

use App\User;
use App\Model\Barangay;
use App\Model\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $activities = ActivityLog::query()
                                    ->with('user')
                                    ->filter($request->only(['type', 'barangay']))
                                    ->orderBy('created_at','desc')
                                    ->paginate(10)
                                    ->withQueryString();
                                    // dd($request->only(['type', 'barangay']));

        if ($request->ajax()) {
            return view('backend.admin.activity_log.partials.activities', [
                'activities' => $activities,
            ])->render();
        }

        return view('backend.admin.activity_log.index', [
            'activities' => $activities,
            'filters' => ActivityLog::select('scope')->distinct()->get()->pluck('scope'),
            'barangays' => Barangay::all(),
            'params' => $request->only(['type', 'barangay'])
        ]);
    }
}
