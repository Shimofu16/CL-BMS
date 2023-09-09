@extends('layouts.app')
@section('title')
{{ $certificate }}
@endsection
@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tinos:wght@400;700&display=swap');

        p {
            color: black;
            font-family: 'Tinos', serif;
            padding: 0;
            margin: 0;

        }

        .screen {
            display: flex;
            justify-content: center;
        }

        .certificate-container {
            width: 56vw;
            display: flex;
            justify-content: center;
            color: black;
        }

        .page {}

        /* wrapper */
        .wrapper {
            margin-top: 30px;
        }

        .title-wrapper {
            margin: 20px 10px 0px 10px;
        }

        .title-wrapper h1 {
            font-family: 'serif';
        }

        /* header */

        .header {}

        .header p {
            text-align: center;
            line-height: 18px;
        }

        .header h1 {
            padding: 10px;
            text-align: center;
            border: 1px solid black;
        }

        /* body page */
        .body {
            display: flex;
            justify-content: center;
            padding: 10px;
            font-family: 'STIX Two Text', serif;

        }

        /* officials */
        .officials {
            /* background-image: linear-gradient(to bottom right, rgb(28, 50, 245), rgb(75, 174, 240)); */
            background-color: #a0c4e4;
            border: 1px solid black;
            margin-right: 5px;
        }

        .official-wrapper {
            padding: 5px;
            text-align: center;
        }

        #logo-img {
            width: 80px;
            height: auto;
        }

        .officials p {
            padding-top: 6px;
            line-height: 20px;


            font-size: 16px;
            margin-bottom: 10px;
        }

        #councelor-label {
            margin-bottom: 0;
            padding-bottom: 0;
        }

        /* content */
        .content {
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .content-wrapper {
            margin: 10px;
        }

        /* content top-part */
        .content-wrapper .top-part {
            display: flex;
            justify-content: space-between;
        }

        #bayog {
            margin-left: 20px;
            padding-top: 20px;
        }

        #resident-picture {
            width: 120px;
            height: 120px;
            border: 1px solid black;
            margin-right: 50px;
            margin-left: auto;
        }

        /* content text-part */
        .content-wrapper .text-part {
            margin-top: 20px;
        }

        #to-whom {
            margin-left: 20px;
        }

        #content {
            margin-top: 20px;
            text-indent: 50px;
            line-height: 28px;
            font-weight: 500;
        }

        #issue-for {
            text-indent: 50px;
            margin-top: 20px;
            line-height: 25px;
        }

        #transform-upppercase {
            text-transform: uppercase;
        }

        #witness {
            text-indent: 50px;
            margin-top: 20px;
            line-height: 25px;
        }

        /* content sign-part */
        .sign-part {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .sign-part .sign-wrapper {
            margin-top: auto;
        }

        #signature {
            padding: 0 20px;
            border-top: 1px solid black;
        }

        .sign-part .tumb-wrapper {}

        #tumb-box {
            margin: 0 auto;
            width: 90px;
            height: 75px;
            border: 1px solid black;
        }

        /* content cap-sign-part */
        .cap-sign-part {
            display: flex;
            justify-content: flex-end;
            margin-top: 70px;
        }

        .cap-sign-part .cap-sign-wrapper {
            text-align: center;
            margin-right: 60px;
            line-height: 17px;
        }

        .cap-sign-part .cap-sign-wrapper p {
            line-height: 18px;
        }

        /* content issue */
        .issued {
            margin-top: 40px;
        }

        .validity {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">{{ $certificate }}</h3>
        </div>
        <div class="d-flex justify-content-around">
            <div id="border-blue">
                <div class="certificate-container">
                    <div class="page" style="width: 8.3in; hieght: 11.7in;" id="element-to-print">
                        <div class="wrapper">
                            <div class="header">
                                <p>REPUBLIC OF THE PHILIPPINES</p>
                                <p> PROVINCE OF LAGUNA </p>
                                <p> MUNICIPLITY OF CALAUAN </p>
                                <p> {{ $barangay->name }} </p>

                                <div class="title-wrapper">
                                    <h1 class="mb-0" style="border-left: 2px solid black; border-right: 2px solid black;">{{ $certificate }}</h1>
                                </div>
                            </div>


                            <div class="body">
                                <div class="officials" style="width: 2.75in; border-left: 2px solid black;">
                                    <div class="official-wrapper">
                                        <img id="logo-img" src="{{ asset($barangay->logo) }}"
                                            alt="brgy-bayog-logo">
                                        <p style="margin-bottom: 20px;"> <strong> {{ $barangay->name }} </strong></p>
                                        @foreach ($barangay_officials as $barangay_official)
                                            @if ($barangay_official->position == 'Chairman')
                                                <p>
                                                    <strong>Hon. {{ $barangay_official->name }}</strong><br>
                                                    {{ $barangay_official->position }}
                                                </p>

                                                <p id="councelor-label">
                                                    <strong>COUNCILORS</strong><br>
                                                </p>
                                            @elseif($barangay_official->position == 'Secretary')
                                                <p>
                                                    <strong>{{ $barangay_official->name }}</strong><br>
                                                    {{ $barangay_official->position }}
                                                </p>
                                            @elseif($barangay_official->position == 'Treasurer')
                                                <p>
                                                    <strong>{{ $barangay_official->name }}</strong><br>
                                                    {{ $barangay_official->position }}
                                                </p>
                                            @elseif($barangay_official->position == 'Clerk')
                                                <p>
                                                    <strong>{{ $barangay_official->name }}</strong><br>
                                                    {{ $barangay_official->position }}
                                                </p>
                                            @else
                                                <p>
                                                    <strong>Hon. {{ $barangay_official->name }}</strong><br>
                                                    {{ $barangay_official->position }}
                                                </p>
                                            @endif
                                        @endforeach


                                    </div>
                                </div>

                                <div class="content" style="width: 5.55in; border-right: 2px solid black;">
                                    <div class="content-wrapper">
                                        <div class="top-part">
                                            <p id="bayog">
                                                BAYOG-{{ \Carbon\Carbon::now()->format('Y') }}-{{ $clearance_cnt }}
                                            </p>
                                            {{-- <img id="resident-picture" src="{{ asset('../img/brgy-logo.jpg') }}"
                                            alt=""> --}}
                                            <div id="resident-picture">
                                                {{-- webcam video snapshot --}}
                                                <canvas id="canvas" width="120" height="120"></canvas>
                                            </div>
                                        </div>

                                        <div class="text-part">
                                            <p id="to-whom">TO WHOM IT MAY CONCERN,</p>
                                            <p id="content">

                                                This is to certify that according to our records available in this barangay
                                                and
                                                to
                                                the
                                                best
                                                of
                                                my actual knowledge, reliable information and honest belief that <strong>
                                                    {{ $resident->first_name }} {{ $resident->middle_name }}
                                                    {{ $resident->last_name }} {{ $resident->suffix_name }}, </strong>
                                                <strong>
                                                    {{ \Carbon\Carbon::parse($resident->birthday)->diff(\Carbon\Carbon::now())->format('%y') }}
                                                    years
                                                    old,</strong>
                                                <strong> {{ $resident->civil_status }} </strong> residing and with postal
                                                address at <strong> {{ $resident->house_number }}
                                                    {{ $resident->street }}
                                                    Bayog,
                                                    Los
                                                    Baños, Laguna</strong>
                                                is a person of good moral character and reputation He/She is peacefull and
                                                law
                                                abiding
                                                citizen.
                                            <P id="issue-for">
                                                Issued upon request of subject person in connection with his/her application
                                                for
                                                <strong id="transform-upppercase"> {{ $purpose }} </strong>
                                            </P>

                                            <p id="witness">
                                                Witness my hand and seal, this <strong>
                                                    {{ \Carbon\Carbon::today()->format('jS \\of F Y') }}</strong> at
                                                <strong>
                                                    Barangay Bayog Los
                                                    Baños Laguna. </strong>
                                            </p>

                                            </p>
                                        </div>

                                        <div class="sign-part">
                                            <div class=sign-wrapper>
                                                <p id="signature">SIGNATURE</p>
                                            </div>
                                            <div class=tumb-wrapper>
                                                <p id="tumb-box"></p>


                                                <p>RIGHT THUMB MARK</p>
                                            </div>
                                        </div>

                                        <div class="cap-sign-part">
                                            <div class="cap-sign-wrapper">

                                                @foreach ($b_officials as $b_official)
                                                    @if ($b_official->brgy_official_position == 'Barangay Chairman')
                                                        <p>
                                                            <strong>Hon.
                                                                {{ $b_official->name }}</strong><br>
                                                            {{ $b_official->brgy_official_position }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="issued">
                                            <div class="issued-wrapper">
                                                <p>
                                                    CTC No.:
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="validity">
                                        <div class="validity-wrapper">
                                            <p>
                                                *VALID UNTIL THREE(3) MONTHS FROM THE DATE ISSUED*
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="camera-container d-flex p-3" id="border-blue">

                <div class="camera-wrapper">
                    <h3 class="text-center">Take a Picture</h3>
                    {{-- stream video via webcam --}}
                    <div class="video-wrap">
                        <video id="video" playsinline autoplay></video>
                    </div>
                    {{-- Trigger canvas web API --}}
                    <div class="download-container d-flex justify-content-center mt-3">
                        <button id="snap"
                            class="btn btn-lg btn-icon icon-left btn-success text-dark mr-3">Capture</button>
                        <button class="btn btn-lg btn-icon icon-left btn-success" onclick="generatepdf()">Download</button>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('assets/packages/html2pdf/html2pdf.main.js') }}"></script>
    <script type="text/javascript">
        function generatepdf() {
            var element = document.getElementById('element-to-print');
            var opt = {
                margin: 0,
                filename: 'Barangay Clearance - {{ $resident->last_name }}, {{ $resident->first_name }}.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };
            html2pdf().set(opt).from(element).save();
        };
    </script>
@endsection
