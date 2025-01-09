@extends('backend.user.sidebar')

@section('page-title')
Meralco Clearance Records - Brgy. {{ Auth::user()->official->barangay->name }}
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
                        <h4>List of Meralco Clearances</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable" id="table">
                            <thead>
                                <tr>
                                    <th>Meralco Control Number</th>
                                    <th>Applicant</th>
                                    <th>Building type</th>
                                    <th>Building address</th>
                                    <th>PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meralcos as $meralco)
                                <tr>

                                    <td>
                                        {{$meralco->details['number']}}
                                    </td>
                                    <td>
                                        {{$meralco->details['applicant']}}
                                    </td>
                                    <td>
                                        {{$meralco->details['building_type']}}
                                    </td>
                                    <td>
                                        {{$meralco->details['address']}}
                                    </td>
                                    <td>
                                        <a href="{{route('meralco_clearance.show', $meralco->id)}}"
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
    </div>
</section>

<script>
    $(document).ready(function() {
            $('#table').DataTable();
        });
</script>
@endsection

@section('add')
<a class="btn btn-outline-violet" href="{{ route('meralco_clearance.create') }}">
    Add Meralco Clearance
</a>
@endsection
