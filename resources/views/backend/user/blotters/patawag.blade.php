@extends('backend.user.sidebar')
@section('page-title')
Blotter Patawag Letter
@endsection

@section('contents')
<section class="section">
    <div class="section-header">
        <div class="d-flex justify-content-between" style="width: 100%;">
            <div>
                <h3 class="page__heading">Blotter Patawag Letter</h3>
            </div>
            <div>
                <button class="btn btn-sm btn-icon icon-left btn-success mr-5" onclick="generatepdf()">Download</button>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="card" id="border-blue">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div class="certificate-container">
                        <div class="page" style="width: 8.3in; hieght: 11.7in; border: 1px solid black;"
                            id="element-to-print">
                            <div class="wrapper">
                                <div class="header">
                                    <img id="logo-img" src="{{ asset('../img/brgy-bayog-logo.png') }}"
                                        alt="brgy-bayog-logo"
                                        style="position: absolute; margin-left: 110px; width:80px; height:auto;">
                                    <p>REPUBLIC OF THE PHILIPPINES</p>
                                    <p> PROVINCE OF LAGUNA </p>
                                    <p> MUNICIPLITY OF CALAUAN </p>
                                    <p class="text-uppercase"> BARANGAY {{ Auth::user()->official->barangay->name }}
                                    </p>

                                    <div class="title-wrapper">
                                        <h1 class="mb-0" style="margin-top: 30px;">Tanggapan ng Lupong
                                            Tagapamayapa</h1>
                                    </div>
                                </div>
                                <div class="body" style="padding: 50px;">
                                    <div class="petsa">
                                        <p style="text-align: right; margin-right: 3.5rem;">
                                            Petsa:

                                            {{ \Carbon\Carbon::parse($date)->locale('fil')->translatedFormat('F j, Y')
                                            }}
                                        </p>
                                        <p style="margin-top: 50px;">Usapin Blg. {{ $blotter->case_number }}</p>
                                        <p>Tungkol sa: Paglilinaw</p>
                                        <h2 style="text-align: center; margin-top: 20px;">PAABISO NG PAGDINIG</h2>
                                        <p style="margin-top: 50px;">Kay:
                                            @foreach ($blotter->residents as $resident)
                                            {{ $resident->full_name }}
                                            @if (!$loop->last)
                                            <span class="mr-2">,</span>
                                            @endif
                                            @endforeach
                                            {{ $blotter->complained_resident }}
                                        </p>
                                        <p>(Mga) Inerereklamo</p>


                                        <p style="text-align: center; padding: 0px 20px 0px 20px; margin-top: 50px;">
                                            Ikaw ay hinihilingan na humarap sa akin sa
                                            {{ \Carbon\Carbon::parse($date)->locale('fil')->translatedFormat('F j, Y')
                                            }}. Sa
                                            ganap na ika {{ date('h:i', strtotime($date)) }} ng
                                            {{ date('A', strtotime($date)) == 'AM' ? 'umaga' : 'hapon' }} para sa
                                            pagdinig sa isang usapin.
                                        </p>

                                        <div style="margin-right: 50px; margin-top: 100px;">
                                            <p style="text-align: right;  line-height: 10px;"> <strong>Hon.
                                                    @foreach ($b_officials as $b_official)

                                                    @if ($b_official->position == 'Captain')

                                                    {{ $b_official->full_name }}

                                                    @endif
                                                    @endforeach
                                                </strong></p>
                                            <p style="text-align: right; margin-right: 20px;">Punong Barangay</p>
                                        </div>



                                        <p style="margin-top: 50px;">Ipinagbibigay alam ngayong darating na
                                            {{\Carbon\Carbon::parse($date)->locale('fil')->translatedFormat('F j, Y')}}.
                                        </p>

                                        <p style="margin-top: 50px;">(Mga) Nagrereklamo: </p>
                                        <p>{{ $blotter->complainant_name }}</p>
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

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
<style>
    p {
        color: black;

        padding: 0;
        margin: 0;
    }

    .screen {
        display: flex;
        justify-content: center;
    }

    .certificate-container {
        width: 60vw;
        display: flex;
        justify-content: center;
        font-family: 'STIX Two Text', serif;
        color: black;
    }


    /* wrapper */
    .wrapper {
        margin-top: 30px;
    }

    .title-wrapper {
        margin: 20px 10px 0px 10px;
    }

    .title-wrapper h1 {
        font-family: 'STIX Two Text', serif;
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
        border-bottom: 2px solid black;
    }

    /* body page */
    .body {
        display: flex;
        justify-content: center;
        padding: 10px;
        font-family: 'STIX Two Text', serif;

    }

    .body p {
        font-family: 'Montserrat', sans-serif !important;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
    integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    function generatepdf() {
            var element = document.getElementById('element-to-print');
            var opt = {
                margin: 0,
                filename: 'BarangayPatawag.pdf',
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