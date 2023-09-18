@extends('backend.user.sidebar')

@section('page-title')
Franchise Clearance Records - Brgy. {{ Auth::user()->official->barangay->name }}
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
                        <h4>List of Franchises</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable" id="table">
                            <thead>
                                <tr>
                                    <th>View</th>
                                    <th>Franchise Number</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Date Issued</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($franchises as $franchise)
                                <tr>
                                    <td>
                                        <a href="{{route('franchise_clearance.show', $franchise->id)}}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-file-alt"></i>
                                            View</a>
                                    </td>
                                    <td>
                                        {{$franchise->details['number']}}
                                    </td>
                                    <td>
                                        {{$franchise->owner?->full_name}}
                                    </td>
                                    <td>
                                        {{$franchise->owner?->address}}
                                    </td>
                                    <td>
                                        {{ $franchise->created_at->format('F d, Y') }}
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
<a class="btn btn-outline-violet" href="{{ route('franchise_clearance.create') }}">
    Add Franchise
</a>
@endsection