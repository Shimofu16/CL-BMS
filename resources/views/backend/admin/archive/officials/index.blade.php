@extends('backend.admin.sidebar')
@section('page-title')
    Archieve - Barangay Officials
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="card-title">@yield('page-title')</h3>
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        @if ($folder === 'official')
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Position</th>

                                        <th scope="col">Barangay</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archives as $index => $official)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $official->name }}</td>
                                            <td>{{ $official->position }}</td>
                                            <td>{{ $official->barangay->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-outline-primary btn-sm ms-1"
                                                        data-bs-toggle="modal" data-bs-target="#restore{{ $official->id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                </div>

                                                @include('backend.admin.archive.modals.restore')

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
