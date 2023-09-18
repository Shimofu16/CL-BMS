@extends('backend.user.sidebar')

@section('page-title')
Issue Meralco Clearance
@endsection

@section('contents')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Issue Meralco Clearance</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-8">
                <div class="card border border-primary">
                    <div class="card-header">
                        <h4>Meralco Clearance Information</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Meralco Clearance Control No.:</strong> {{ $meralco->details['number'] }}</p>
                        <p><strong>Meralco Clearance Requestor:</strong> {{ $meralco->details['applicant'] }}
                        </p>
                        <p><strong>Building Type:</strong> {{ $meralco->details['building_type'] }}</p>
                        <p><strong>Building Address:</strong> {{ $meralco->details['address'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card border border-primary">
                    <div class="card-header">
                        <h4 class="text-center">Issue Clearance</h4>
                    </div>
                    <div class="card-body text-center">
                        <a href="{{route('meralco_clearance.clearance',$meralco->id)}}" class="btn btn-success">Generate
                            Certificate</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
@endsection