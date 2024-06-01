@extends('backend.user.sidebar')
@section('page-title')
    Residents
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
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($residents as $index => $resident)
                                    <tr>
                                        <th scope="row">{{ $resident->res_num }}</th>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <h5 class="mb-0">{{ $resident->full_name }}</h5>
                                                <small>{{ $resident->gender }}</small>
                                            </div>
                                        </td>
                                        <td>{{ date('F d, Y', strtotime($resident->birthday)) }}</td>
                                        <td>{{ $resident->birthday->age }}</td>
                                        <td>{{ $resident->address }}</td>

                                        <td>
                                            <a class="icon" href="#" data-bs-toggle="dropdown">
                                                <i
                                                    class="fa-solid fa-ellipsis-vertical"></i>
                                                </a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li class="dropdown-header text-start">
                                                    <h6>Actions</h6>
                                                </li>

                                                <li>
                                                    <button class="dropdown-item" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#family{{ $resident->id }}">
                                                        <i class="fa-regular fa-eye"></i>
                                                        View Family
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#certificate{{ $resident->id }}">
                                                        <i class="fa-regular fa-file-lines"></i>
                                                        Create Certificate
                                                    </button>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('user.barangay.resident.edit', $resident->id) }}">
                                                          <i class="fa-solid fa-pen-to-square"></i> Edit
                                                        </a>
                                                </li>
                                            </ul>
                                                @include('backend.user.residents.modals._view')
                                                @include('backend.user.residents.modals._create')
                                            {{-- <div class="d-flex flex-column">

                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-original-title="View Family">
                                                    <button class="btn btn-outline-primary btn-sm mb-1" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#family{{ $resident->id }}">
                                                        <i class="fa-regular fa-eye p-1"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-original-title="Create Certificate">
                                                    <button class="btn btn-outline-primary btn-sm mb-1" type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#certificate{{ $resident->id }}">
                                                        <i class="fa-regular fa-file-lines p-1"></i>
                                                    </button>
                                                </div>



                                                <a href="" class="btn btn-outline-primary btn-sm ms-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-original-title="Edit Resident">

                                                </a>
                                            </div> --}}
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
