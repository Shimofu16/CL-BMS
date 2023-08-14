@extends('backend.admin.sidebar')
@section('page-title')
    Officials
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="card-title"> {{ $year }}
                            {{ $barangay_id ? 'Brgy. ' . $barangay->name : 'Barangay' }} @yield('page-title')
                        </h3>
                        <div class="d-flex align-items-center">

                            <div class="dropdown me-1">
                                <button class="btn btn-violet dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Barangay
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($barangays as $item)
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.official.index', ['year' => $year, 'barangay_id' => $item->id]) }}">{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                    <li><a href="{{ route('admin.official.index', ['year' => $year]) }}"><i
                                                class="fa-solid fa-rotate-right"></i> Reset</a></li>
                                </ul>

                            </div>
                            <div class="dropdown">
                                <button class="btn btn-violet dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Years
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($years as $year)
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.official.index', ['year' => $year]) }}">{{ $year }}</a>
                                        </li>
                                    @endforeach
                                    <li><a href="{{ route('admin.official.index', ['year' => $year]) }}"><i
                                                class="fa-solid fa-rotate-right"></i> Reset</a></li>
                                </ul>

                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Position</th>
                                    @if (!$barangay_id)
                                        <th scope="col">Barangay</th>
                                    @endif
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($officials as $index => $official)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $official->name }}</td>
                                        <td>{{ $official->position }}</td>
                                        @if (!$barangay_id)
                                            <td>{{ $official->barangay->name }}</td>
                                        @endif
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-outline-primary btn-sm ms-1"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $official->id }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm ms-1"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $official->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('backend.admin.officials.modal._edit')
                                            @include('backend.admin.officials.modal._delete')

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
        Add Barangay Official
    </button>
    @include('backend.admin.officials.modal._add')
@endsection
