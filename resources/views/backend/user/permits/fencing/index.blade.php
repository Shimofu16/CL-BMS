@extends('backend.user.sidebar')

@section('page-title')
Fencing Permits - Brgy. {{ Auth::user()->official->barangay->name }}
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
                        <h4>List of Fencings</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable" id="table">
                            <thead>
                                <tr>
                                    <th>View</th>
                                    <th>Fencing Number</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Location</th>
                                    <th>Purpose</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fencings as $fencing)
                                <tr>
                                    <td>
                                        <a href="{{route('fencing_permit.show', $fencing->id)}}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-file-alt"></i>
                                            View</a>
                                    </td>
                                    <td>
                                        {{$fencing->details['number']}}
                                    </td>
                                    <td>
                                        {{$fencing->details['name']}}
                                    </td>
                                    <td>
                                        {{$fencing->details['address']}}
                                    </td>
                                    <td>
                                        {{$fencing->details['location']}}
                                    </td>
                                    <td>
                                        {{$fencing->details['purpose']}}
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
<a class="btn btn-outline-violet" href="{{ route('fencing_permit.create') }}">
    Add Fencing
</a>
@endsection