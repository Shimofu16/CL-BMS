@extends('backend.admin.sidebar')
@section('page-title')
    Users
@endsection
@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="card-title">@yield('page-title')
                        </h3>
                        <div class="d-flex align-items-center">

                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Barangay</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Activities</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td scope="row">{{ $index + 1 }}</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-0">{{ $user->name }}</h6>
                                                <span>{{ $user->email }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $user->official->barangay->name }}</td>
                                        <td>{{ $user->official->position }}</td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-sm" href="#">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-outline-primary btn-sm ms-1"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm ms-1"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $user->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>

                                            {{-- @include('backend.admin.barangay.modal._edit')
                                            @include('backend.admin.barangay.modal._delete') --}}

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
    <button class="btn btn-outline-violet" data-bs-toggle="modal" data-bs-target="#add">
        Add User
    </button>
    {{-- @include('backend.admin.barangay.modal._add') --}}
@endsection
