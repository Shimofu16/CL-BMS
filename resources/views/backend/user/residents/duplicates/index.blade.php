@extends('backend.user.sidebar')
@section('page-title')
    Duplicate Residents
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
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Existing Barangay</th>
                                    <th scope="col">New Barangay</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (getResidentOverlaps(auth()->user()->official->barangay->id) as $index => $overlap)
                                    @php
                                        $newResident = getResidentByCode($overlap->new_id);
                                        $existingResident = getResidentByCode($overlap->existing_id);
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <h5 class="mb-0">{{ $newResident->full_name }}</h5>
                                                <small>{{ $newResident->gender }}</small>
                                            </div>
                                        </td>
                                        <td>Brgy. {{ Str::ucfirst($existingResident->barangay->name) }}</td>
                                        <td>Brgy. {{ Str::ucfirst($newResident->barangay->name) }}</td>
                                        <td>
                                            <button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                data-bs-target="#info{{ $overlap->id }}">
                                                <i class="fa-regular fa-eye"></i>
                                                View info.
                                            </button>
                                            @include('backend.user.residents.duplicates.modals._view')

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
    <a class="btn btn-outline-violet" href="{{ route('user.barangay.resident.create') }}">
        Add Resident
    </a>
    {{-- @include('backend.user.residents.modals._add') --}}
@endsection
