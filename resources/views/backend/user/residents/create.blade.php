@extends('backend.user.sidebar')
@section('page-title')
Add Resident
@endsection
@section('breadcrumb')
Residents
@endsection
@section('breadcrumb-link')
{{ route('user.barangay.resident.index') }}
@endsection

@section('contents')
<section class="section">
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <form action="{{ route('user.barangay.resident.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            {{-- @dd(session('error')) --}}
                            @if (session()->has('error'))
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="card-header rounded mt-5 mb-3" style="background: #1e2c3b">
                            <h4 class="mb-0 text-white">Resident Picture</h4>
                        </div>
                        <div class="row">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div id="my_camera"></div>
                                <div id="results"></div>
                                <div class="btn btn-sm btn-violet mt-3" onClick="take_snapshot()">Capture</div>
                            </div>
                            <input type="hidden" name="image" class="image-tag">
                        </div>

                        <div class="card-header rounded mt-5 mb-3" style="background: #1e2c3b">
                            <h4 class="mb-0 text-white">Personal Information</h4>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 col-lg-6">
                                <label class="form-label" for="last_name">Last name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                    value="{{ old('last_name') }}">
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <label class="form-label" for="first_name">First name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control"
                                    value="{{ old('first_name') }}">
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12 col-lg-6">
                                <label class="form-label" for="middle_name">Middle name</label>
                                <input type="text" name="middle_name" id="middle_name" class="form-control"
                                    value="{{ old('middle_name') }}">
                            </div>

                            <div class="col-sm-12 col-lg-6">
                                <label class="form-label" for="suffix_name">Suffix name</label>
                                <input type="text" name="suffix_name" id="suffix_name" class="form-control"
                                    value="{{ old('suffix_name') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 col-lg-3">
                                <label class="form-label" for="gender">Sex</label>
                                <select class="form-select" name="gender" id="gender">
                                    <option selected hidden disabled value="">----- Select Sex -----</option>

                                    <option value="Male" {{ old('gender')==='Male' ? 'selected' : '' }}>
                                        Male
                                    </option>
                                    <option value="Female" {{ old('gender')==='Female' ? 'selected' : '' }}>
                                        Female
                                    </option>
                                </select>
                            </div>

                            <div class="col-sm-12 col-lg-3">
                                <label class="form-label" for="birthday">Birthday</label>
                                <input type="date" name="birthday" id="birthday" class="form-control" required
                                    value="{{ old('birthday') }}">
                            </div>

                            <div class="col-sm-12 col-lg-3">
                                <label class="form-label" for="birthplace">Birth Place</label>
                                <input type="text" name="birthplace" id="birthplace" class="form-control" required
                                    value="{{ old('birthplace') }}">
                            </div>

                            <div class="col-sm-12 col-lg-3">
                                <label class="form-label" for="">PWD</label>
                                <select class="form-select" name="pwd">
                                    <option selected hidden disabled value="">----- Select if PWD -----</option>
                                    <option value="Yes" {{ old('pwd')==='Yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="No" {{ old('pwd')==='No' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label class="form-label" for="occupation">Occupation</label>
                                <input type="text" name="occupation" id="occupation" class="form-control" required
                                    value="{{ old('occupation') }}">
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label" for="civil_status">Civil Status</label>
                                <select class="form-select" name="civil_status" id="civil_status">
                                    <option selected hidden disabled value="">----- Select Civil Status -----</option>
                                    <option value="Single" {{ old('civil_status')==='Single' ? 'selected' : '' }}>
                                        Single
                                    </option>
                                    <option value="Married" {{ old('civil_status')==='Married' ? 'selected' : '' }}>
                                        Married
                                    </option>
                                    <option value="Widowed" {{ old('civil_status')==='Widowed' ? 'selected' : '' }}>
                                        Widowed
                                    </option>
                                    <option value="Divorced/Separated" {{ old('civil_status')==='Divorced/Separated'
                                        ? 'selected' : '' }}>
                                        Divorced/Separated
                                    </option>
                                    <option value="Common-law/Live-in" {{ old('civil_status')==='Common-law/Live-in'
                                        ? 'selected' : '' }}>
                                        Common-law/Live-in
                                    </option>
                                    <option value="Unknown" {{ old('civil_status')==='Unknown' ? 'selected' : '' }}>
                                        Unknown
                                    </option>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-label" for="student">Educational Attainment</label>
                                <select class="form-select" name="student" id="student">
                                    <option selected hidden disabled>----- Select here -----</option>
                                    <option value="N/A" {{ old('student')==='N/A' ? 'selected' : '' }}> N/A
                                    </option>
                                    <option value="Elementary" {{ old('student')==='Elementary' ? 'selected' : '' }}>
                                        Elementary
                                    </option>
                                    <option value="High School" {{ old('student')==='High School' ? 'selected' : '' }}>
                                        High
                                        School</option>
                                    <option value="College" {{ old('student')==='College' ? 'selected' : '' }}>
                                        College
                                    </option>
                                    <option value="Other" {{ old('student')==='Other' ? 'selected' : '' }}>
                                        Other</option>
                                </select>
                            </div>
                        </div>

                        <div id="spouse_fields" style="display: none;">
                            <div class="card-header rounded mt-5 mb-3" style="background: #1e2c3b">
                                <h4 class="mb-0 text-white"> Spouse</h4>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12 col-lg-3">
                                    <label class="form-label" for="spouse_lname">Last name</label>
                                    <input type="text" name="spouse_lname" id="spouse_lname" class="form-control"
                                        value="{{ old('spouse_lname') }}">
                                </div>
                                <div class="col-sm-12 col-lg-3">
                                    <label class="form-label" for="spouse_fname">First name</label>
                                    <input type="text" name="spouse_fname" id="spouse_fname" class="form-control"
                                        value="{{ old('spouse_fname') }}">
                                </div>
                                <div class="col-sm-12 col-lg-3">
                                    <label class="form-label" for="spouse_mname">Middle name</label>
                                    <input type="text" name="spouse_mname" id="spouse_mname" class="form-control"
                                        value="{{ old('spouse_mname') }}">
                                </div>
                                <div class="col-sm-12 col-lg-3">
                                    <label class="form-label" for="spouse_sname">Suffix name</label>
                                    <input type="text" name="spouse_sname" id="spouse_sname" class="form-control"
                                        value="{{ old('spouse_sname') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12 col-lg-3">
                                    <label class="form-label" for="spouse_occupation">Occupation</label>
                                    <input type="text" name="spouse_occupation" id="spouse_occupation"
                                        class="form-control" value="{{ old('spouse_occupation') }}">
                                </div>
                            </div>
                        </div>

                        <div class="card-header rounded mt-5 mb-3" style="background: #1e2c3b">
                            <h4 class="mb-0 text-white"> Address</h4>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 col-lg-4">
                                <label class="form-label" for="house_number">House Number</label>
                                <input type="text" name="house_number" id="house_number" class="form-control"
                                    value="{{ old('house_number') }}">
                            </div>

                            <div class="col-sm-12 col-lg-4">
                                <label class="form-label" for="street">Street</label>
                                <input type="text" name="street" id="street" class="form-control" required
                                    value="{{ old('street') }}">
                            </div>

                            <div class="col-sm-12 col-lg-4">
                                <label class="form-label" for="purok_id">Purok</label>
                                <select class="form-select" name="purok_id" id="purok_id">
                                    <option selected hidden disabled value="">----- Select Purok -----</option>
                                    @foreach ($puroks as $item)
                                    <option value="{{ $item->id }}" {{ old('purok')===$item->id ? 'selected' : '' }}>{{
                                        $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">

                        </div>

                        <div class="card-header rounded mt-5 mb-3" style="background: #1e2c3b">
                            <h4 class="mb-0 text-white"> Other Information</h4>
                        </div>


                        <div class="row mb-3">
                            <div class="col-sm-12 col-lg-6">
                                <label class="form-label" for="">Subsidy Program</label>
                                <select class="form-select" name="membership_prog">
                                    <option selected hidden disabled value="">----- Select Subsidy Program -----
                                    </option>
                                    <option value="None" {{ old('membership_prog')==='None' ? 'selected' : '' }}>
                                        None</option>
                                    <option value="Solo Parent" {{ old('membership_prog')==='Solo Parent' ? 'selected'
                                        : '' }}>
                                        Solo Parent</option>
                                    <option value="4Ps" {{ old('membership_prog')==='4Ps' ? 'selected' : '' }}>
                                        4Ps</option>
                                    <option value="TUPAD" {{ old('membership_prog')==='TUPAD' ? 'selected' : '' }}>
                                        TUPAD</option>
                                </select>
                            </div>

                            <div class="col-sm-12 col-lg-6">
                                <label class="form-label" for="">Type of house</label>
                                <select class="form-select" name="type_of_house">
                                    <option selected hidden disabled value="">----- Select Type of house -----
                                    </option>
                                    <option value="Owned" {{ old('type_of_house')==='Owned' ? 'selected' : '' }}>
                                        Owned
                                    </option>
                                    <option value="Rental" {{ old('type_of_house')==='Rental' ? 'selected' : '' }}>
                                        Rental
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="card-header rounded mt-5 mb-3" style="background: #1e2c3b">
                            <h4 class="mb-0 text-white">Dependents</h4>
                        </div>

                        <button type="button" class="btn btn-primary add" id="addMember">Add dependent</button>

                        <div id="family_members" class="mt-3">
                            {{-- New members go here --}}
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1"><i class="far fa-save"></i>
                            Save</button>
                        <a href="{{ route('residence.index') }}" class="btn btn-danger me-3"><i class="fas fa-ban"></i>
                            Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</section>
@endsection
@section('scripts')
<script src="{{ asset('assets/packages/webcam/webcam.min.js') }}"></script>
<script language="JavaScript">
    Webcam.set({
        width: 300,
        height: 300,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';

            //hide camera
            Webcam.reset();
            document.querySelector('#my_camera').style.display = 'none';
        });
    }

    document.getElementById('civil_status').addEventListener('change', (e) => {
        if (e.target.value === 'Married') {
            document.getElementById('spouse_fields').style.display = 'block'
        } else {
            document.getElementById('spouse_fields').style.display = 'none'
        }
    })

    $(document).ready(function(){
        var memberCount = document.querySelectorAll('.member').length

        $(this).on('click', '.add', function(){
            var html = `
            <div class="row align-items-center member">
                <div class="row col-11 mb-3 align-items-center">
                    <div class="col-sm-12 col-lg-4">
                        <label class="form-label" for="m.${memberCount}.name">Full name</label>
                        <input type="text" name="member[${memberCount}][name]" id="m.${memberCount}.name" class="form-control">
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <label class="form-label" for="m.${memberCount}.birthday">Birthday</label>
                        <input type="date" name="member[${memberCount}][birthday]" id="m.${memberCount}.birthday" class="form-control">
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <label class="form-label" for="m.${memberCount}.relationship">Relationship</label>
                        <input type="text" name="member[${memberCount}][relationship]" id="m.${memberCount}.relationship" class="form-control">
                    </div>
                    <div class="col-sm-12 col-lg-1">
                        <input type="checkbox" name="member[${memberCount}][pwd]" id="m.${memberCount}.pwd" class="form-check-input">
                        <label class="form-check-label" for="m.${memberCount}.pwd">PWD</label>
                    </div>
                </div>
                <div class="row col-1">
                    <button type="button" class="btn btn-danger w-50 remove">x</button>
                </div>
            </div>
            `

            $('#family_members').append(html)
            memberCount += 1
        })

        $(this).on('click', '.remove', function(){
            var target = $(this).parent().parent()
            target.remove()
        })
    })
</script>
@endsection
