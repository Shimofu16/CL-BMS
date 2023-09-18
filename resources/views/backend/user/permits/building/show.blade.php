@extends('backend.user.sidebar')
@section('page-title')
Issue Building Clearance
@endsection

@section('contents')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Issue Building Clearance</h3>
    </div>
    <div class="section-body">

        <div class="row">
            <div class="col-8">
                <div class="card border border-primary">
                    <div class="card-header">
                        <h4>Building Information</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Building Owner:</strong> {{ $building->owner->full_name }}</p>
                        <p><strong>Building Type:</strong> {{ $building->details['type'] }}</p>
                        <p><strong>Building Address:</strong> {{ $building->details['address'] }}</p>
                        <p><strong>Date Registered:</strong> {{
                            \Carbon\Carbon::parse($building->details['reg_date'])->format('F d, Y') }}</strong></p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card border border-primary">
                    <div class="card-header">
                        <h4 class="text-center">Issue Building Clearance</h4>
                    </div>
                    <div class="card-body text-center">
                        <a href="{{route('building_permit.clearance',$building->id)}}" class="btn btn-success">Generate
                            Certificate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection