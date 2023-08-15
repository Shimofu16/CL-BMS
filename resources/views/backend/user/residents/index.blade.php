@extends('backend.user.sidebar')
@section('page-title')
Residents of Brgy. {{ auth()->user()->official->barangay->name }}
@endsection

@section('contents')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between border-bottom-0">
                    {{-- <h3 class="card-title">@yield('page-title')</h3> --}}
                </div>
                <div class="card-body">

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Resident #</th>
                                <th scope="col">Name</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Age</th>
                                <th scope="col">Address</th>
                                <th scope="col">Certificates/Permits</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($residents as $index => $resident)
                            <tr>
                                <th scope="row">{{ $resident->res_num }}</th>
                                <td>
                                    <div class="d-flex flex-column">
                                        <h5 class="mb-0"> {{ $resident->getFullName() }}</h5>
                                        <small>{{ $resident->gender }}</small>
                                    </div>
                                </td>
                                <td>{{ date('F d, Y', strtotime($resident->birthday)) }}</td>
                                <td>{{ $resident->getAge() }}</td>
                                <td>{{ $resident->getAddress() }}</td>
                                <td>
                                    {{-- dropdown for certificates --}}
                                    <div class="dropdown">
                                        <button class="btn btn-outline-violet btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Certificates
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('user.barangay.certificate.create', ['certificate_type' => 'barangay_clearance','resident_id' => $resident->id]) }}">Barangay
                                                    Clearance</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('user.barangay.certificate.create', ['certificate_type' =>  'business_permit','resident_id' => $resident->id]) }}">Business
                                                    Permit</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('user.barangay.certificate.create', ['certificate_type' =>  'certificate_of_indigency','resident_id' => $resident->id]) }}">Certificate
                                                    of Indigency</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('user.barangay.certificate.create', ['certificate_type' =>  'certificate_of_residency','resident_id' => $resident->id]) }}">Certificate
                                                    of Residency</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('user.barangay.certificate.create', ['certificate_type' =>  'certificate_of_poor','resident_id' => $resident->id]) }}">Certificate
                                                    of Poor</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('user.barangay.certificate.create', ['certificate_type' =>  'certificate_of_good_moral','resident_id' => $resident->id]) }}">Certificate
                                                    of Good Moral</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('user.barangay.certificate.create', ['certificate_type' =>  'certificate_of_no_property','resident_id' => $resident->id]) }}">Certificate
                                                    of No Property</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('user.barangay.certificate.create', ['certificate_type' =>  'certificate_of_no_record','resident_id' => $resident->id]) }}">Certificate
                                                    of No Record</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('user.barangay.certificate.create', ['certificate_type' =>  'certificate_of_no_relationship','resident_id' => $resident->id]) }}">Certificate
                                                    of No Relationship</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('user.barangay.certificate.create', ['certificate_type' =>  'certificate_of_no_pending_case','resident_id' => $resident->id]) }}">Certificate
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('user.resident.edit', $resident->id) }}"
                                            class="btn btn-outline-info btn-sm ms-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
@section('add')
{{-- <button class="btn btn-outline-violet" data-bs-toggle="modal" data-bs-target="#add">
    Add Residence
</button> --}}
<a class="btn btn-outline-violet" href="{{ route('user.resident.create') }}">
    Add Resident
</a>
{{-- @include('backend.user.residents.modals._add') --}}
@endsection