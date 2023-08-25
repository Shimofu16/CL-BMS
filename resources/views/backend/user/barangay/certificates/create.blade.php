@extends('backend.user.sidebar')
@section('page-title')
    {{ $title }}
@endsection
@section('breadcrumb')
    Residents
@endsection
@section('breadcrumb-link')
    {{ route('user.barangay.resident.index') }}
@endsection
@section('contents')
    <section class="section">
        <div class="card profile-widget" id="border-blue">
            <div class="row">

                <div class="col-6 col-md-6 col-lg-6">
                    <div class="profile-widget-header d-flex justify-content-center px-5 pt-5">

                        <img alt="image" src="{{ asset('storage/uploads/residents/' . $resident->image) }}"
                            class="rounded-circle" height="300px" width="300px">

                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name text-center mb-4">
                            <strong>
                                <h5>
                                    {{ $resident->full_name }}
                                    {{ Str::ucfirst(Str::substr($resident->suffix_name, 0, 1)) }}
                                </h5>
                                <h6>{{ $resident->occupation }}</h6>
                            </strong>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-6">
                                <p>
                                    <strong>Full Name: </strong>
                                    {{ $resident->full_name }}
                                    {{ Str::ucfirst(Str::substr($resident->suffix_name, 0, 1)) }}
                                </p>

                                <p>
                                    <strong>Birthday: </strong>
                                    {{ $resident->birthday->format('F j, Y') }}
                                </p>

                                <p>
                                    <strong>Sex: </strong>{{ $resident->gender }}
                                </p>

                                <p>
                                    <strong>Occupation: </strong>{{ $resident->occupation }}
                                </p>

                                <p>
                                    <strong>Address: </strong>{{ $resident->address }}
                                </p>

                                <p>
                                    <strong>PWD: </strong>{{ $resident->pwd }}
                                </p>
                            </div>

                            <div class="col-md-6">
                                <p>
                                    <strong>Age: </strong>
                                    {{ $resident->birthday->age }}
                                </p>

                                <p>
                                    <strong>Birthplace: </strong>{{ $resident->birthplace }}
                                </p>

                                <p>
                                    <strong>Status: </strong>{{ $resident->civil_status }}
                                </p>

                                <p>
                                    <strong>Student: </strong>{{ $resident->student }}
                                </p>

                                <p>
                                    <strong>Type of house: </strong>{{ $resident->type_of_house }}
                                </p>

                                <p>
                                    <strong>Membership Program: </strong>{{ $resident->membership_prog }}
                                </p>
                            </div>
                        </div>

                        @foreach ($resident->getUnsettledBlotter() as $blotter)
                            <div class="row">
                                <div class="col-sm-12 col-lg-12 mt-5">
                                    <h5 class="text-center text-danger">Blotters Information</h5>
                                    <p class="ml-5 fw-bold">
                                        <span>Complained By:{{ $blotter->complainant_name }}</span>
                                        <span>Blotter Complain:{{ $blotter->Blotters_info }}</span>
                                        <span>Incident:{{ date('F d, Y', strtotime($blotter->date_of_incident)) }}</span>
                                    <p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-6 col-md-6 col-lg-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <div class="card p-5" style="width: 100%">
                            <form
                                action="{{ route('user.barangay.certificate.store', ['certificate_type' => $certificate, 'resident_id' => $resident->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="purpose" class="form-label fw-bold">Purpose</label>
                                            <input type="text" name="purpose" class="form-control" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex flex-column">
                                        <button type="submit" class="btn btn-icon icon-left btn-success mb-2">
                                            <i class="far fa-edit"></i> Generate
                                        </button>
                                        <a href="{{ route('user.barangay.resident.index') }}" class="btn btn-icon icon-left btn-outline-danger">
                                            <i class="fas fa-chevron-circle-left"></i> Back
                                        </a>
                                </div>
                            </form>
                            @if ($resident->hasUnsettledBlotter())
                                <div class="row d-flex justify-content-center">
                                    <div class="col-8 ">
                                        <div class="alert alert-danger">
                                            <h5 class="text-center text-dark">This Person has a Blotter Record !</h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
