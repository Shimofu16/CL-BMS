@extends('backend.user.sidebar')

@section('page-title')
    {{ $certificate }}
@endsection

@section('breadcrumb')
    Residents
@endsection

@section('breadcrumb-link')
    {{ route('user.barangay.resident.index') }}
@endsection
@section('styles')
    <style>
        p {
            color: black;
            padding: 0;
            margin: 0;
        }

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
        .issued,
        .validity {
            margin-top: 70px;
        }
    </style>
@endsection
@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header  border-bottom-0">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('user.barangay.resident.index') }}" class="btn btn-secondary">
                                Back to Residents
                            </a>
                        </div>

                        <div class="d-flex align-items-center justify-content-center">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                @if (!$isHeadOfTheFamily)
                                    <div id="my_camera"></div>
                                    <div id="results" class="d-flex align-items-center justify-content-center mb-2"></div>
                                    <input type="hidden" name="image" class="image-tag">
                                    <button class="btn btn-outline-primary" onclick="take_snapshot()">Capture</button>
                                @endif
                                <div class="mt-1">
                                    <button class="btn btn-outline-primary " onclick="generatepdf()">Download
                                        clearance</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div id="border-blue">
                        <div class="certificate-container">
                            <div class="page" id="element-to-print">
                                <div class="wrapper">
                                    <div class="header">
                                        <p>REPUBLIC OF THE PHILIPPINES</p>
                                        <p> PROVINCE OF LAGUNA </p>
                                        <p> MUNICIPLITY OF CALAUAN </p>
                                        <p> {{ $barangay->name }} </p>

                                        <div class="title-wrapper">
                                            <h1 class="mb-0"
                                                style="border-left: 2px solid black; border-right: 2px solid black;">
                                                {{ $certificate }}</h1>
                                        </div>
                                    </div>


                                    <div class="body">
                                        <div class="officials" style="width: 2.75in; border-left: 2px solid black;">
                                            <div class="official-wrapper">
                                                <img id="logo-img" src="{{ asset('storage/' . $barangay->logo) }}"
                                                    alt="brgy-bayog-logo">
                                                <p style="margin-bottom: 20px;"> <strong> {{ $barangay->name }} </strong>
                                                </p>
                                                @foreach ($barangay_officials as $barangay_official)
                                                    @if ($barangay_official->position == 'Captain')
                                                        <p>
                                                            <strong>Hon. {{ $barangay_official->full_name }}</strong><br>
                                                            {{ $barangay_official->position }}
                                                        </p>

                                                        <p id="councelor-label">
                                                            <strong>COUNCILORS</strong><br>
                                                        </p>
                                                    @else
                                                        <p>
                                                            <strong>Hon. {{ $barangay_official->full_name }}</strong><br>
                                                            {{ $barangay_official->position }}
                                                        </p>
                                                    @endif
                                                @endforeach


                                            </div>
                                        </div>

                                        <div class="content" style=" border-right: 2px solid black;">
                                            <div class="content-wrapper">
                                                <div class="top-part">
                                                    <p id="bayog">
                                                        BAYOG-{{ \Carbon\Carbon::now()->format('Y') }}-{{ $clearance_count }}
                                                    </p>
                                                    {{-- <img id="resident-picture" src="{{ asset('../img/brgy-logo.jpg') }}"
                                                        alt=""> --}}
                                                    <div id="resident-picture">
                                                        {{-- webcam video snapshot --}}
                                                        @if ($isHeadOfTheFamily)
                                                            <img src="{{ asset($resident->image) }}" alt="resident-picture"
                                                                width="120" height="120">
                                                        @else
                                                            <img src="" alt="" id="output"  width="120" height="120">
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="text-part">
                                                    <p id="to-whom">TO WHOM IT MAY CONCERN,</p>
                                                    <p id="content">

                                                        This is to certify that according to our records available in this
                                                        barangay
                                                        and to the best of my actual knowledge, reliable information and
                                                        honest
                                                        belief that <strong>{{ $resident->full_name }}, </strong>
                                                        <strong>{{ $resident->birthday->age }} years old,</strong>
                                                        <strong> {{ $resident->civil_status }} </strong> residing and with
                                                        postal
                                                        address at <strong> {{ $resident->address }}</strong> is a person
                                                        of good
                                                        moral character and reputation He/She is peacefull and law abiding
                                                        citizen.
                                                    <P id="issue-for">
                                                        Issued upon request of subject person in connection with his/her
                                                        application
                                                        for <strong id="transform-upppercase"> {{ $purpose }}
                                                        </strong>
                                                    </P>

                                                    <p id="witness">
                                                        Witness my hand and seal, this <strong>
                                                            {{ \Carbon\Carbon::today()->format('jS \\of F Y') }}</strong>
                                                        at<strong>
                                                            Barangay {{ $barangay->name }} Calauan, Laguna. </strong>
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
                                                    <p>
                                                        <strong>Hon.{{ $chairman->full_name }}</strong>
                                                        <span>{{ $chairman->position }}</span>
                                                    </p>
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

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/packages/webcam/webcam.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        @if (!$isHeadOfTheFamily)
            Webcam.set({
                width: 300,
                height: 300,
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            Webcam.attach('#my_camera');

            function take_snapshot() {
                Webcam.snap(function(data_uri) {
                    $(".image-tag").val(data_uri);
                    document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                    $("#output").attr('src', data_uri);
                    //hide camera
                    Webcam.reset();
                    document.querySelector('#my_camera').style.display = 'none';
                });
            }
        @endif

        function generatepdf() {
            var element = document.getElementById('element-to-print');
            console.log(element)
            var opt = {
                margin: 0,
                filename: 'Barangay Clearance - {{ $resident->full_name }}.pdf',
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
