<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\Barangay;
use App\Model\Blotter;
use App\Model\Purok;
use App\Model\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $barangayId = auth()->user()->official->barangay_id;

        $residents = Resident::query()->where('barangay_id', $barangayId);

        $residents_count = $residents->count();
        $pwd_residents_count = $residents->where('pwd', 'Yes')->count();
        $senior_residents_count = $residents->whereRaw('TIMESTAMPDIFF(YEAR, birthday, CURDATE()) >= 65')->count();

        $residents_with_subsidy = Resident::whereIn('membership_prog', ['Solo Parent', '4Ps', 'TUPAD'])
            ->where('barangay_id', $barangayId)
            ->get();

        $counts = $residents_with_subsidy->countBy('membership_prog');

        // Transform the data into the desired format
        $residents_with_subsidy = $residents_with_subsidy->map(function ($resident) use ($counts) {
            return [
                'name' => $resident->membership_prog,
                'residents_count' => $counts[$resident->membership_prog] ?? 0
            ];
        });


        $residents_per_purok = Purok::withCount(['residents' => function ($query) use ($barangayId) {
            $query->where('barangay_id', $barangayId);
        }])->whereHas('residents', function ($query) use ($barangayId) {
            $query->where('barangay_id', $barangayId);
        })->get();

        $blotters = Blotter::latest()->take(5)->get();

        return view('backend.user.dashboard.index', compact(
            'residents_count',
            'blotters',
            'pwd_residents_count',
            'senior_residents_count',
            'residents_per_purok',
            'residents_with_subsidy'
        ));
    }
}
