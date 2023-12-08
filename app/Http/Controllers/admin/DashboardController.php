<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Barangay;
use App\Model\Official;
use App\Model\Resident;
use App\Model\Year;

class DashboardController extends Controller
{
    public function index($year = null)
    {
        $barangays = Barangay::query();

        $residents_per_barangay = $barangays->has('residents')->withCount('residents')->get();

        $residents_count = Resident::count();

        $brangay_count = Barangay::count();

        $officials_count = Official::count();

        $residents_with_subsidy_per_brgy = Barangay::has('residents')->withCount('residents')
            ->whereHas('residents', function ($query) {
                $query->whereIn('membership_prog', ['Solo Parent', '4Ps', 'TUPAD']);
            })
            ->get();



        return view(
            'backend.admin.dashbaord.index',
            compact(
                'residents_per_barangay',
                'residents_count',
                'brangay_count',
                'officials_count',
                'residents_with_subsidy_per_brgy'
            )
        );
    }
}
