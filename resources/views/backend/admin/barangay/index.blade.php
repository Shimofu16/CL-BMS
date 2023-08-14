@extends('backend.admin.sidebar')
@section('page-title')
    Brangay
@endsection
@php
    $title = 'Brangay';
    $isBarangay = 1;
@endphp
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
                                    <th scope="col">Porok</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangays as $index => $barangay)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $barangay->name }}</td>
                                        <td>
                                            {{-- view button --}}
                                            <a href="{{ route('admin.barangay.show', ['id' => $barangay->id]) }}"
                                                class="btn btn-outline-info btn-sm">    
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-outline-primary btn-sm ms-1"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $barangay->id }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm ms-1"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $barangay->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('backend.admin.barangay.modal._edit')
                                            @include('backend.admin.barangay.modal._delete')

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
        Add Barangay
    </button>
    @include('backend.admin.barangay.modal._add')
@endsection
