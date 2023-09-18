@extends('backend.user.sidebar')

@section('page-title')
Issue Fencing Permit
@endsection

@section('contents')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Issue Fencing Permit</h3>
    </div>
    <div class="section-body">

        <div class="row">
            <div class="col-8">
                <div class="card border border-primary">
                    <div class="card-header">
                        <h4>Fencing Information</h4>
                    </div>
                    <div class="card-body">
                        <p><strong> Fencing Number: </strong> {{$fencing->details['number']}} </p>
                        <p><strong> Name: </strong> {{$fencing->details['name']}} </p>
                        <p><strong> Address: </strong> {{$fencing->details['address']}} </p>
                        <p><strong> Fencing Location: </strong> {{$fencing->details['location']}} </p>
                        <p><strong> Purpose: </strong> {{$fencing->details['purpose']}} </p>
                    </div>
                    <div class="card-footer">
                        <p><strong> Date Issued: </strong> {{ \Carbon\Carbon::parse($fencing->created_at)->format('F d,
                            Y') }}</p>
                    </div>
                </div>

            </div>



            <div class="col-4">
                <div class="card border border-primary">
                    <div class="card-header">
                        <h4 class="text-center">Issue Digging Permit</h4>
                    </div>
                    <div class="card-body text-center">
                        <a href="{{route('fencing_permit.clearance', $fencing->id)}}" class="btn btn-success">Generate
                            Certificate</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
@endsection