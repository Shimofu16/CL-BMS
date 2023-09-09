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
                                    <th scope="col">Certificates</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($residents as $index => $resident)
                                    <tr>
                                        <th scope="row">{{ $resident->res_num }}</th>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <h5 class="mb-0"> {{ $resident->full_name }}</h5>
                                                <small>{{ $resident->gender }}</small>
                                            </div>
                                        </td>
                                        <td>{{ date('F d, Y', strtotime($resident->birthday)) }}</td>
                                        <td>{{ $resident->birthday->age }}</td>
                                        <td>{{ $resident->address }}</td>
                                        <td>
                                            <button class="btn btn-outline-violet btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#certificate{{ $resident->id }}">
                                                <i class="fa-regular fa-file-lines"></i>
                                                Create Certificate
                                            </button>
                                            @include('backend.user.residents.modals._create')
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('user.barangay.resident.edit', $resident->id) }}"
                                                    class="btn btn-outline-info btn-sm ms-1">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    Edit
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
    <a class="btn btn-outline-violet" href="{{ route('user.barangay.resident.create') }}">
        Add Resident
    </a>
    {{-- @include('backend.user.residents.modals._add') --}}
@endsection
