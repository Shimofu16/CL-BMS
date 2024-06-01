@extends('backend.user.sidebar')

@section('page-title')
    Franchise Clearance
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
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Franchise #</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Date Issued</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($franchises as $franchise)
                                    <tr>
                                        <td>
                                            {{ $franchise->details['number'] }}
                                        </td>
                                        <td>
                                            {{ $franchise->owner?->full_name }}
                                        </td>
                                        <td>
                                            {{ $franchise->owner->address }}
                                        </td>
                                        <td>
                                            {{ $franchise->created_at->format('F d, Y') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('franchise_clearance.show', $franchise->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-file-alt"></i>
                                                View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('add')
    <a class="btn btn-outline-violet" href="{{ route('franchise_clearance.create') }}">
        Add Franchise
    </a>
@endsection
