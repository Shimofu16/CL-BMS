@extends('backend.user.sidebar')
@section('page-title')
Building Permits - Brgy. {{ auth()->user()->official->barangay->name }}
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
                        <h4>List of Registered Buildings</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable" id="table">
                            <thead>
                                <tr>
                                    <th>View</th>
                                    <th>Building Permit No.</th>

                                    <th>
                                        Building Owner
                                    </th>
                                    <th>
                                        Building Type
                                    </th>
                                    <th>
                                        Building Address
                                    </th>
                                    <th>
                                        Registration Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buildings as $building)
                                <tr>
                                    <td>
                                        <a href="{{route('building_permit.show', $building->id)}}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-file-alt"></i>
                                            View</a>
                                    </td>
                                    <td>
                                        {{$building->details['number']}}
                                    </td>
                                    <td>
                                        {{$building->owner->full_name}}
                                    </td>
                                    <td>
                                        {{$building->details['type']}}
                                    </td>
                                    <td>
                                        {{$building->details['address']}}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($building->details['registration_date'])->format('F j,
                                        Y') }}
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
<a class="btn btn-outline-violet" href="{{ route('building_permit.create') }}">
    Register Building
</a>
@endsection