@extends('backend.user.sidebar')

@section('page-title')
Issue Digging Permit
@endsection

@section('contents')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Issue Digging Permit</h3>
    </div>
    <div class="section-body">

        <div class="row">
            <div class="col-8">
                <div class="card border border-primary">
                    <div class="card-header">
                        <h4>Digging Information</h4>
                    </div>
                    <div class="card-body">
                        <p><strong> Digging Number: </strong> {{$digging->details['number']}} </p>
                        <p><strong> Name: </strong> {{$digging->details['name']}} </p>
                        <p><strong> Address: </strong> {{$digging->details['address']}} </p>
                        <p><strong> Digging Location: </strong> {{$digging->details['location']}} </p>
                        <p><strong> Purpose: </strong> {{$digging->details['purpose']}} </p>
                    </div>
                    <div class="card-footer">
                        <p><strong> Date Issued: </strong> {{ \Carbon\Carbon::parse($digging->created_at)->format('F d,
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
                        <a href="{{route('digging_permit.clearance', $digging->id)}}" class="btn btn-success">Generate
                            Certificate</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
@endsection