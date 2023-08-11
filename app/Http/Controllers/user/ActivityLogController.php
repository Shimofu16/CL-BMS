<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
        return view('activity_logs.index', [
            'act_logs' => ActivityLog::orderBy('created_at','desc')->get(),
        ]);
    }
}
