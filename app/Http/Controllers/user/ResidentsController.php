<?php

namespace App\Http\Controllers\user;

use Carbon\Carbon;
use App\Model\Purok;
use App\Model\Barangay;
use App\Model\Resident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResidentRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ResidentsController extends Controller
{
    public $barangay_id = 1;
    public $residents;
    public $path;

    public function __construct(Request $request)
    {
        // Initialize a default value for barangay_id in case it's not in the session
        $this->barangay_id = session('barangay_id');
        $this->residents = Resident::query()->where('barangay_id', $this->barangay_id);
        $this->path = 'uploads/residents/';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = [
            [
                'title' => 'Barangay Clearance',
                'type' => 'barangay_clearance',
            ],
            [
                'title' => 'Good Moral Certificate',
                'type' => 'good_moral',
            ],
            [
                'title' => 'Income Certificate',
                'type' => 'income',
            ],
            [
                'title' => 'Indigency Certificate',
                'type' => 'indigency',
            ],
            [
                'title' => 'Live-in Certificate',
                'type' => 'livein',
            ],
            [
                'title' => 'PUI/PUM Certificate',
                'type' => 'pui_pum',
            ],
            [
                'title' => 'Residency Certificate',
                'type' => 'residency',
            ],
            [
                'title' => 'Settlement Certificate',
                'type' => 'settlement',
            ]
        ];
        $permits = [
            [
                'title' => 'Building Permit',
                'type' => 'building_permit',
            ],
            [
                'title' => 'Business Permit',
                'type' => 'business_permit',
            ],
            [
                'title' => 'digging Permit',
                'type' => 'digging_permit',
            ],
            [
                'title' => 'fencing Permit',
                'type' => 'fencing_permit',
            ],
            [
                'title' => 'Franchise Clearance',
                'type' => 'franchise_clearance',
            ],
            [
                'title' => 'Meralco Clearance',
                'type' => 'meralco_clearance',
            ],
        ];
        return view('backend.user.residents.index', [
            'residents' => $this->residents->get(),
            'certificates' => $certificates,
            'permits' => $permits,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.residents.create', [
            'puroks' => Barangay::with('puroks')->find($this->barangay_id)->puroks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required'],
            'last_name' => ['required'],
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'suffix_name' => ['required'],
            'gender' => ['required'],
            'birthday' => ['required'],
            'birthplace' => ['required'],
            'civil_status' => ['required'],
            'house_number' => ['required'],
            'street' => ['required'],
            'occupation' => ['required'],
            'student' => ['required'],
            'type_of_house' => ['required'],
            'pwd' => ['required'],
            'membership_prog' => ['required'],
            'purok_id' => ['required'],
        ]);
        $img = $request->get('image');
        $image_parts = explode(";base64,", $img);
        $image_base64 = base64_decode(end($image_parts));
        $fileName = uniqid() . '.png';

        // Save the image using Laravel's Storage facade
        $filePath = $this->path . $fileName;
        Storage::disk('public')->put($filePath, $image_base64);

        $year = Carbon::now()->year;
        $resident_cnt = $this->residents->count() + 1;
        $resident_number = "Brgy-{$year}-{$resident_cnt}";

        $resident = Resident::create([
            'res_num' => $resident_number,
            'image' => $fileName,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'suffix_name' => $request->suffix_name,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'birthplace' => $request->birthplace,
            'civil_status' => $request->civil_status,
            'house_number' => $request->house_number,

            'street' => $request->street,
            'occupation' => $request->occupation,
            'student' => $request->student,
            'type_of_house' => $request->type_of_house,
            'pwd' => $request->pwd,
            'membership_prog' => $request->membership_prog,
            'barangay_id' => $this->barangay_id,
            'purok_id' => $request->purok_id,
        ]);

        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //   ]);

        // if ($request->file('image')) {
        //     $imagePath = $request->file('image');
        //     $imageName = $imagePath->getClientOriginalName();
        //     $path = $request->file('image')->storeAs('residence', $imageName, 'public');
        //   }
        //   $residence->image = $imageName;
        //   $residence->path = '/storage/'.$path;

        return redirect()->back()->with('success', 'Residence added sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('residence.show', [
        //     'resident' => Resident::with('business')->findOrFail($id),
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd(Resident::findOrFail($id));
        return view('backend.user.residents.edit', [
            'resident' => Resident::findOrFail($id),
            'puroks' => Barangay::with('puroks')->find($this->barangay_id)->puroks,
        ]);
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

            $resident = Resident::findOrFail($id);

            if ($request->has('image')) {
                $img = $request->get('image');
                $image_parts = explode(";base64,", $img);
                $image_base64 = base64_decode(end($image_parts));
                $fileName = uniqid() . '.png';

                // Save the image using Laravel's Storage facade
                $filePath = $this->path . $fileName;
                Storage::disk('public')->put($filePath, $image_base64);
            }

            $resident->update([
                'image' => $fileName,
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'suffix_name' => $request->suffix_name,
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'birthplace' => $request->birthplace,
                'civil_status' => $request->civil_status,
                'house_number' => $request->house_number,

                'street' => $request->street,
                'occupation' => $request->occupation,
                'student' => $request->student,
                'type_of_house' => $request->type_of_house,
                'pwd' => $request->pwd,
                'membership_prog' => $request->membership_prog,
                'purok_id' => $request->purok_id,
            ]);
            return redirect()->back()->with('success', 'Resident Updated Successfully.');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
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
        $resident = Resident::findOrfail($id);

        $resident->delete();

        return redirect()->route('residence.index')->with('swal_delete', 'Residence added sucessfully!');
    }

    public function import()
    {
        return view('residence.import');
    }
}
