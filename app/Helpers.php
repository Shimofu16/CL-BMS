<?php

use App\Overlap;
use App\Model\Resident;
use Illuminate\Support\Str;

if (!function_exists('getResidentOverlaps')) {
    function getResidentOverlaps($barangay_id)
    {
        $year = now()->format('Y');
        $barangay_code = "Brgy-{$barangay_id}-{$year}-";
        // dd($barangay_code);
        return Overlap::where('existing_id', 'like', "%{$barangay_code}%")
            ->orWhere('new_id', 'like', "%{$barangay_code}%")
            ->get();
    }
}
if (!function_exists('getOverlapByResidentCode')) {
    function getOverlapByResidentCode($resident_code, $barangay_id)
    {
        $year = now()->format('Y');
        $barangay_code = "Brgy-{$barangay_id}-{$year}-";
        // Remove the last character from $resident_code
        $formatted_resident_code = Str::substr($resident_code, 0, -1);

        // Check if the formatted resident code matches the barangay code
        if ($barangay_code == $formatted_resident_code) {
            return Overlap::where('new_id', $resident_code)->get();
        }

        return false;
    }
}

if (!function_exists('getResidentByCode')) {
    function getResidentByCode($resident_code)
    {   
        return Resident::with('barangay')->where('res_num', $resident_code)->first();
    }
}
