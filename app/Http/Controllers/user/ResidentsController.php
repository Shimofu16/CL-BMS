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
        $this->barangay_id = session('barangay_id'); // 0 or any default value
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
        return view('backend.user.residents.index', [
            'residents' => $this->residents->get(),
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

        return redirect()->back()->with('Resident Register Succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('residence.show', [
            'resident' => Resident::with('business')->findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('residence.edit', [
            'resident' => Resident::findOrFail($id)
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
        $resident = Resident::findorfail($id);

        if ($request->image != null) {

            $img =  $request->get('image');
            $folderPath = storage_path("app/public/residence/");
            $image_parts = explode(";base64,", $img);

            foreach ($image_parts as $key => $image) {
                $image_base64 = base64_decode($image);
            }

            $fileName = uniqid() . '.png';
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);

            $resident->image = $fileName;
        }

        $resident->last_name = $request->last_name;
        $resident->first_name = $request->first_name;
        $resident->middle_name = $request->middle_name;
        $resident->gender = $request->gender;
        $resident->birthday = $request->birthday;
        $resident->birthplace = $request->birthplace;
        $resident->civil_status = $request->civil_status;
        $resident->house_number = $request->house_number;
        $resident->purok = $request->purok;
        $resident->street = $request->street;
        $resident->occupation = $request->occupation;
        $resident->student = $request->student;
        $resident->type_of_house = $request->type_of_house;
        $resident->pwd = $request->pwd;
        $resident->membership_prog = $request->membership_prog;
        $resident->save();

        return redirect()->route('residence.show', $id)->withStatus('Resident Update Succesfully!');
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
