@extends('backend.user.sidebar')

@section('page-title')
Issue Franchise Clearance
@endsection

@section('contents')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Franchise</h3>
    </div>
    <div class="section-body">

        <div class="row">
            <div class="col-8">
                <div class="card border border-primary">
                    <div class="card-header">
                        <h4>Franchise Information</h4>
                    </div>
                    <div class="card-body">
                        <p><strong> Franchise Number: </strong> {{ $franchise->details['number'] }}</p>
                        <p><strong> Plate Number: </strong> {{ $franchise->details['plate'] }}</p>
                        <p><strong> Chassis Number: </strong>{{ $franchise->details['chassis'] }}</p>
                        <p><strong> Motor Number: </strong> {{ $franchise->details['motor'] }}</p>
                    </div>
                    <div class="card-body">
                        <p><strong> Name: </strong> {{ $franchise->owner->full_name }}</p>
                        <p><strong> Age: </strong> {{ $franchise->owner->birthday->age }}
                        </p>
                        <p><strong> Address: </strong>{{ $franchise->owner->address }}</p>

                    </div>
                    <div class="card-footer">
                        <p><strong> Date Issued: </strong> {{ \Carbon\Carbon::parse($franchise->created_at)->format('F
                            d, Y') }}</p>
                    </div>
                </div>

            </div>

            <div class="col-4">
                <div class="card border border-primary">
                    <div class="card-header">
                        <h4 class="text-center">Issue Business Clearance</h4>
                    </div>
                    <div class="card-body text-center">
                        <a href="{{route('franchise_clearance.clearance',$franchise->id)}}"
                            class="btn btn-success">Generate Certificate</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
@endsection