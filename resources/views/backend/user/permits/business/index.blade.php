@extends('backend.user.sidebar')
@section('page-title')
Business Clearance - Brgy. {{ auth()->user()->official->barangay->name }}
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
                        <h4>List of Businesses</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable" id="table">
                            <thead>
                                <tr>
                                    <th>Business Number</th>
                                    <th>
                                        Business Owner
                                    </th>
                                    <th>
                                        Business Name
                                    </th>
                                    <th>
                                        Business Address
                                    </th>
                                    <th>
                                        Business Type
                                    </th>
                                    <th>
                                        Registration Date
                                    </th>
                                    <th>PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($businesses as $business)
                                <tr>

                                    <td>
                                        {{$business->details['number']}}
                                    </td>
                                    <td>
                                        {{$business->owner?->full_name}}
                                        {{ $business->details['non-resident_owner'] }}
                                    </td>
                                    <td>
                                        {{$business->details['name']}}
                                    </td>
                                    <td>
                                        {{$business->details['address']}}
                                    </td>
                                    <td>
                                        {{$business->details['type']}}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($business->details['registration_date'])->format('F d,
                                        Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('user.barangay.permit.pdf', [ 'permit_id' => $business->id, 'permit_type' => 'business']) }}"
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
<a class="btn btn-outline-violet" href="{{ route('create_business') }}">
    Register Business
</a>
@endsection
