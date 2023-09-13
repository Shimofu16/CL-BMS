@extends('backend.admin.sidebar')
@section('page-title')
    Years
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="card-title">
                            @yield('page-title')
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
                                    <th scope="col">Year</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($years as $year)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $year->year }}</td>
                                        <td>
                                            @if ($year->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary btn-sm ms-1"
                                                data-bs-toggle="modal" data-bs-target="#edit{{ $year->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>

                                            @include('backend.admin.years.modal._edit')
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
        Add Year
    </button>
    @include('backend.admin.years.modal._add')
@endsection
