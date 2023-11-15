@extends('backend.user.sidebar')
@section('page-title')
Blotters - Brgy. {{ auth()->user()->official->barangay->name }}
@endsection

@section('contents')


<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card pt-4" id="border-blue">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="table">
                                <thead>
                                    <tr>
                                        <th>View</th>
                                        <th>Case Number</th>
                                        <th>Complainant</th>
                                        <th>Respondents</th>
                                        <th>Blotter Information</th>
                                        <th>Incident Date</th>
                                        <th>Case Type</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($blotters as $blotter)
                                    <tr>
                                        <td>
                                            <div class="row d-flex justify-content-center">
                                                <a href="{{route('user.barangay.blotters.show', $blotter->id)}}"
                                                    class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i
                                                        class="fas fa-eye"></i></a>

                                            </div>
                                        </td>
                                        <td>{{$blotter->case_number}}</td>
                                        <td>{{$blotter->complainant_name}}</td>
                                        <td>
                                            @foreach ($blotter->residents as $resident)
                                            <p>{{$resident->last_name}} {{$resident->first_name}}
                                                {{$resident->middle_name}} </p>
                                            @endforeach
                                            <p>{{$blotter->complained_resident}}</p>
                                        </td>
                                        <td>{{$blotter->blotters_info}}</td>
                                        <td>{{ \Carbon\Carbon::parse($blotter->date_of_incident)->format('F d, Y') }}
                                        </td>
                                        <td>{{$blotter->case_type}}</td>
                                        <td>{{$blotter->status}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('add')
<a class="btn btn-outline-violet" href="{{ route('user.barangay.blotters.create') }}">
    <i class="far fa-edit"></i> Write blotter
</a>
@endsection