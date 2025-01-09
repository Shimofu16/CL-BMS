@extends('backend.user.sidebar')

@section('page-title')
    Barangay Clearance - {{ Str::ucFirst($permitType) }}
@endsection

@section('contents')
<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h3 class="page__heading">Barangay {{ Str::ucFirst($permitType) }} Clearance</h3>
        <button class="btn btn-lg btn-icon icon-left btn-success mr-5" onclick="generatepdf()">Download</button>
    </div>
    <div class="d-flex justify-content-center">
        <div id="border-blue">
            <div class="certificate-container">
                <div class="page" style="width: 8.3in;" id="element-to-print">
                    <div class="wrapper">
                        <div class="header">
                            <p class="text-uppercase">REPUBLIC OF THE PHILIPPINES <br>
                                PROVINCE OF LAGUNA <br>
                                MUNICIPLITY OF CALAUAN <br>
                                BARANGAY {{ Auth::user()->official->barangay->name }} <br>
                            </p>
                            <div class="title-wrapper">
                                <h1 style="border-left: 2px solid black; border-right: 2px solid black;">
                                    Barangay {{ Str::ucFirst($permitType) }} Clearance
                                </h1>
                            </div>
                        </div>

                        <div class="body">
                            <div class="officials" style="width: 2.75in; border-left: 2px solid black;">
                                <div class="official-wrapper">
                                    <img id="logo-img" src="{{ asset('storage/'.Auth::user()->official->barangay->logo) }}"
                                        alt="{{ Auth::user()->official->barangay->name }}">
                                    <p style="margin-bottom: 20px;"> <strong> Barangay {{
                                            Auth::user()->official->barangay->name }} </strong></p>
                                    @foreach ($b_officials as $b_official)
                                        @if ($b_official->position == 'Captain')
                                            <p>
                                                <strong>Hon. {{ $b_official->full_name }}</strong><br>
                                                Barangay Captain
                                            </p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="content">
                                <p><strong> Clearance Number: </strong> {{ $details['number'] }} </p>
                                <p><strong> Name: </strong> {{ $details['name'] }} </p>
                                <p><strong> Address: </strong> {{ $details['address'] }} </p>
                                @if($permitType == 'business')
                                    <p><strong> Business Type: </strong> {{ $details['type'] }} </p>
                                    <p><strong> Registration Date: </strong> {{ \Carbon\Carbon::parse($details['registration_date'])->format('F d, Y') }} </p>
                                @elseif($permitType == 'fencing')
                                    <p><strong> Fencing Location: </strong> {{ $details['location'] }} </p>
                                @elseif($permitType == 'franchise')
                                    <p><strong> Motor Number: </strong> {{ $details['motor'] }} </p>
                                    <p><strong> Chassis Number: </strong> {{ $details['chassis'] }} </p>
                                @elseif($permitType == 'meralco')
                                    <p><strong> Building Type: </strong> {{ $details['building_type'] }} </p>
                                @elseif($permitType == 'digging')
                                    <p><strong> Digging Location: </strong> {{ $details['location'] }} </p>
                                @endif
                            </div>
                        </div>

                        <div class="footer">
                            <p><strong> Date Issued: </strong> {{ \Carbon\Carbon::parse($created_at)->format('F d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script>
    function generatepdf() {
        // Your PDF generation logic here
    }
</script>
