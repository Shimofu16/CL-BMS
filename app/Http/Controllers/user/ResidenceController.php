<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Model\Resident;
use Carbon\Carbon;
use App\Http\Requests\ResidentRequest;

class ResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Let's do this kind of passing of data to the view
         * This looks cleaner imo
         * 
         * @delete this comment later lol
         */
        return view('residence.index', [
            'residence_list' => Resident::all(),
        ]);
        
        /**
         * This can also be like this
         * 
         * $residents = Resident::all();
         * 
         * return view('residence.index', [
         *      'residence_list' => $residents
         * ]);
         */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('residence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResidentRequest $request)
    {
            //image Request
            $img =  $request->get('image');
            $folderPath = storage_path("app/public/residence/");
            $image_parts = explode(";base64,", $img);
            foreach ($image_parts as $key => $image){
                $image_base64 = base64_decode($image);
            }
            $fileName = uniqid() . '.png';
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);
     
            //resident Number
            $year = Carbon::now()->year;  
            $resident_cnt = Resident::all()->count();
            $resident_cnt = $resident_cnt + 1;

            // change this later, format as <brgy_id>-<resident_count>
            // we can also include the year but we can talk about that later
            $resident_number = 'Byg' . '-' .  $year . '-' . $resident_cnt;

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
                'purok' => $request->purok,
                'street' => $request->street,
                'occupation' => $request->occupation,
                'student' => $request->student,
                'type_of_house' => $request->type_of_house,
                'pwd' => $request->pwd,
                'membership_prog' => $request->membership_prog,
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
    
            return redirect()->route('residence.index')->withStatus('Resident Register Succesfully!');
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

            if ($request->image != null)
            {
                
                $img =  $request->get('image');
                $folderPath = storage_path("app/public/residence/");
                $image_parts = explode(";base64,", $img);
    
                foreach ($image_parts as $key => $image){
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
            $resident->birthplace= $request->birthplace;
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

            return redirect()->route('residence.show',$id)->withStatus('Resident Update Succesfully!');
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

