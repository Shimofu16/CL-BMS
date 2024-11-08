<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class NagcarlanController extends Controller
{
    public function index()
    {
        return view('frontend.municipality.nagcarlan.index');
    }

    public function historicalBackground()
    {
        return view('frontend.municipality.nagcarlan.historical_background');
    }

    public function profile()
    {
        return view('frontend.municipality.nagcarlan.profile');
    }

    public function officials()
    {
        return view('frontend.municipality.nagcarlan.officials');
    }

    public function offices()
    {
        return view('frontend.municipality.nagcarlan.offices');
    }

    public function barangayDirectory()
    {
        $filePath = public_path('excel/Masterlist-of-Barangay-Officials-2023-2025.xlsx');

        // Read the Excel file as an array
        $data = Excel::toArray([], $filePath);

        // Load the Excel file
        $spreadsheet = IOFactory::load($filePath);

        // Prepare an array to store data for each barangay
        $barangays = [];

        // Loop through each sheet
        foreach ($spreadsheet->getAllSheets() as $sheet) {
            // Get the name of the barangay and chairman from cells B9 and C9
            $barangayName = $sheet->getCell('B9')->getValue();
            $barangayChairman = $sheet->getCell('C9')->getValue();

            // Add data to the array if both cells are not empty
            if ($barangayName && $barangayChairman) {
                $barangays[] = [
                    'name' => $barangayName,
                    'chairman' => $barangayChairman
                ];
            }
        }

        return view('frontend.municipality.nagcarlan.barangay-directory', compact('barangays'));
    }
}
