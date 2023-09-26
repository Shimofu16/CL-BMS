<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Barangay;
use App\Model\Year;

class DashboardController extends Controller
{
    public function index($year = null)
    {
        $years = Year::all();
        // Initialize the query builder
        $barangays = Barangay::query();

        if ($year) {
            // Split the year range
            list($from, $to) = explode('-', $year);

            // Filter residents based on the year range
            $barangays->withCount(['residents' => function ($query) use ($from, $to) {
                $query->whereBetween('year', [$from, $to]);
            }]);
        } else {
            // If no year range is specified, get all residents
            $barangays->withCount('residents');
        }

        // Execute the query
        $total_residents_per_barangay = $barangays->get();

        return view('backend.admin.dashbaord.index', compact('total_residents_per_barangay','years'));
    }
}
