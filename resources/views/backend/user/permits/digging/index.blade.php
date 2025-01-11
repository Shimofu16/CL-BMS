@extends('backend.user.sidebar')
@section('page-title')
    Digging Permits - Brgy. {{ auth()->user()->official->barangay->name }}
@endsection

@section('contents')
    <section class="section">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="border-blue">
                    <div class="card-header mb-4">
                        <div>
                            <h4>List of Digging</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="table">
                                <thead>
                                    <tr>
                                        <th>Digging Number</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Purpose</th>
                                        <th>PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diggings as $digging)
                                        <tr>

                                            <td>
                                                {{ $digging->details['number'] }}
                                            </td>
                                            <td>
                                                {{ $digging->details['name'] }}
                                            </td>
                                            <td>
                                                {{ $digging->details['address'] }}
                                            </td>
                                            <td>
                                                {{ $digging->details['location'] }}
                                            </td>
                                            <td>
                                                {{ $digging->details['purpose'] }}
                                            </td>
                                            <td>
                                                <a href="{{ route('user.barangay.permit.pdf', [ 'permit_id' => $digging->id, 'permit_type' => 'digging']) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-file-alt"></i> View
                                                 </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection

@section('add')
    <a class="btn btn-outline-violet" href="{{ route('digging_permit.create') }}">
        Add Digging
    </a>
@endsection
