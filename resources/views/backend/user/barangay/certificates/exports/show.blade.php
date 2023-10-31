@extends('backend.user.sidebar')

@section('page-title')
    {{ $title }}
@endsection

@section('breadcrumb')
    Residents
@endsection

@section('breadcrumb-link')
    {{ route('user.barangay.resident.index') }}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pdf.css') }}">
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
                    <div class="card-body d-flex align-items-center justify-content-center">

                        <div id="border-blue">
                            <div class="certificate-container">
                                <div class="page" id="element-to-print">
                                    <div class="wrapper mt-2">
                                        <div class="head">
                                            <p>REPUBLIC OF THE PHILIPPINES</p>
                                            <p> PROVINCE OF LAGUNA </p>
                                            <p> MUNICIPLITY OF CALAUAN </p>
                                            <p> Barangay {{ $barangay->name }} </p>

                                            <div class="title-wrapper">
                                                <h1 class="mb-1"
                                                    style="border-left: 2px solid black; border-right: 2px solid black;">
                                                    {{ $title }}</h1>
                                            </div>
                                        </div>


                                        <div class="body">
                                            <div class="officials" style="width: 8.75in; border-left: 2px solid black;">
                                                <div class="official-wrapper">
                                                    <img id="logo-img" src="{{ asset('storage/' . $barangay->logo) }}"
                                                        alt="brgy-bayog-logo">
                                                    <p style="margin-bottom: 20px;"> <strong> {{ $barangay->name }}
                                                        </strong>
                                                    </p>
                                                    @foreach ($barangay_officials as $barangay_official)
                                                        @if ($barangay_official->position == 'Captain')
                                                            <p>
                                                                <strong>Hon.
                                                                    {{ $barangay_official->full_name }}</strong><br>
                                                                {{ $barangay_official->position }}
                                                            </p>

                                                            <p id="councelor-label">
                                                                <strong>COUNCILORS</strong><br>
                                                            </p>
                                                        @else
                                                            <p>
                                                                <strong>Hon.
                                                                    {{ $barangay_official->full_name }}</strong><br>
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
                                                            @if ($certificate_type == 'barangay_clearance')
                                                                {{ $barangay->name }}-{{ date('Y') }}-{{ $clearance_count }}
                                                            @endif
                                                        </p>
                                                        {{-- <img id="resident-picture" src="{{ asset('../img/brgy-logo.jpg') }}"
                                                            alt=""> --}}
                                                        <div id="resident-picture">
                                                            {{-- webcam video snapshot --}}
                                                            @if ($isHeadOfTheFamily)
                                                                <img src="{{ asset('storage/uploads/residents/' . $resident->image) }}"
                                                                    alt="resident-picture" width="120" height="120">
                                                            @else
                                                                <img src="" alt="" id="output"
                                                                    width="120" height="120">
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="text-part">
                                                        @switch($certificate_type)
                                                            @case('barangay_clearance')
                                                                <p id="to-whom">
                                                                    TO WHOM IT MAY CONCERN,
                                                                </p>
                                                                <p id="content">
                                                                    This is to certify that according to our records available in
                                                                    this
                                                                    barangay
                                                                    and to the best of my actual knowledge, reliable information and
                                                                    honest
                                                                    belief that <strong>{{ $resident->full_name }}, </strong>
                                                                    <strong>{{ $resident->birthday->age }} years old,</strong>
                                                                    <strong> {{ $resident->civil_status }} </strong> residing and
                                                                    with
                                                                    postal
                                                                    address at <strong> {{ $resident->address }}</strong> is a
                                                                    person
                                                                    of good
                                                                    moral character and reputation He/She is peacefull and law
                                                                    abiding
                                                                    citizen.
                                                                </p>
                                                                <P id="issue-for">
                                                                    Issued upon request of subject person in connection with
                                                                    his/her
                                                                    application
                                                                    for <strong id="transform-upppercase">
                                                                        {{ $purpose }}
                                                                    </strong>
                                                                </P>

                                                                <p id="witness">
                                                                    Witness my hand and seal, this <strong>
                                                                        {{ date('jS \\of F Y') }}</strong>
                                                                    at<strong>
                                                                        Barangay {{ $barangay->name }} Calauan, Laguna.
                                                                    </strong>
                                                                </p>
                                                                <div class="sign-part">
                                                                    <div class=sign-wrapper>
                                                                        <p id="signature">SIGNATURE</p>
                                                                    </div>
                                                                    <div class=tumb-wrapper>
                                                                        <p id="tumb-box"></p>


                                                                        <p>RIGHT THUMB MARK</p>
                                                                    </div>
                                                                </div>
                                                            @break

                                                            @case('good_moral')
                                                                <p id="to-whom">
                                                                    To Whom It May Concern:
                                                                </p>
                                                                <p id="content">
                                                                    This is to certify that
                                                                    <strong>{{ $resident->full_name }}</strong> of legal age and
                                                                    bonafide resident
                                                                    of <strong>{{ $resident->address }}</strong> has not been
                                                                    charged of any misconduct in violation of Barangay
                                                                    rules and policies. Neither had I received any information that
                                                                    he/she has
                                                                    no pending case in court. He/she is observed to be of
                                                                    <strong>Good Moral
                                                                        Character</strong>.
                                                                </p>
                                                                <P id="issue-for">
                                                                    This certification is being issued upon the request of
                                                                    <strong>{{ $resident->full_name }}</strong> for
                                                                    <strong>{{ $purpose }}</strong>.
                                                                </P>

                                                                <p id="witness">
                                                                    Given this <strong>
                                                                        {{ date('jS \\of F Y') }}
                                                                    </strong>
                                                                </p>


                                                                <p id="witness" style="margin-top: 70px;">
                                                                    Certify By:
                                                                </p>
                                                            @break

                                                            @case('income')
                                                                <p id="to-whom">Sa Kinauukulan,</p>
                                                                <p id="content">
                                                                    Ito ay pagpapatunay na si
                                                                    <strong>{{ $resident->full_name }}</strong>,
                                                                    <strong>{{ $resident->birthday->age }}</strong>
                                                                    taong gulang ipinanganak noong
                                                                    <strong>{{ date('M d, Y', strtotime($resident->birthday)) }}</strong>
                                                                    sa
                                                                    {{ $resident->birthplace }} at nakatira sa
                                                                    <strong>{{ $resident->address }}</strong>.
                                                                </p>
                                                                <P id="issue-for">
                                                                    Pagpapatunay din na si
                                                                    <strong>{{ $resident->full_name }}</strong>, ay
                                                                    {{ $resident->occupation }} na kanyang pinagkakakitaan.
                                                                </P>

                                                                <p id="witness">
                                                                    Ipinagkaloob ngayong ika -
                                                                    <strong>{{ date('d') }} ng
                                                                        {{ \Carbon\Carbon::today()->locale('fil')->translatedFormat('F') }}
                                                                        {{ date('Y') }}</strong>
                                                                </p>


                                                                <p id="witness" style="margin-top: 70px;">
                                                                    Pinatutunayan ni:
                                                                </p>
                                                            @break

                                                            @case('indigency')
                                                                <p id="content">
                                                                    Ito ay nagpapatunay na si <strong>{{ $resident->full_name }},
                                                                        {{ $resident->birthday->age }}
                                                                        taong gulang </strong> ipinanganak noong
                                                                    <strong>{{ date('F d, Y', strtotime($resident->birthday)) }}
                                                                    </strong> sa
                                                                    <strong> {{ $resident->birthplace }} </strong> at kasalukuyang
                                                                    nakatira sa
                                                                    {{ $resident->address }} ay nabibilang sa mahihirap na pamilya
                                                                    sa aming Barangay
                                                                    at walang
                                                                    pirmihang pinagkakakitaan.
                                                                </P>
                                                                <P id="issue-for">
                                                                    Ang pagpapatunay na ito ay para sa kahilingan ni
                                                                    <strong>{{ $resident->full_name }}</strong> para magamit bilang
                                                                    requirement sa
                                                                    <strong
                                                                        style="text-transform:uppercase;">{{ $purpose }}</strong>.
                                                                </P>
                                                                <p id="witness">
                                                                    Ipinagkaloob ngayong ika -
                                                                    <strong>{{ date('d') }} ng
                                                                        {{ \Carbon\Carbon::today()->locale('fil')->translatedFormat('F') }}
                                                                        {{ date('Y') }}</strong>
                                                                </p>


                                                                <p id="witness" style="margin-top: 70px;">
                                                                    Pinatutunayan ni:
                                                                </p>
                                                            @break

                                                            @case('livein')
                                                                <p id="to-whom">Sa Kinauukulan,</p>
                                                                <p id="content">
                                                                    Ito ay pagpapatunay na sila <strong>{{ $resident->full_name }}
                                                                        at
                                                                        {{ $partner }}</strong> nasa hustong taong gulang,
                                                                    residente ng
                                                                    <strong>{{ address }}</strong> ay nagsasama bilang mag
                                                                    asawa.
                                                                    Pagpapatunay pa din na sila ay nagsasama ng humigit kumulang
                                                                    <strong>{{ $long }}</strong> ng nagsama bilang mag
                                                                    asawa
                                                                    requirement para sa <strong>{{ $purpose }}</strong>.
                                                                </p>
                                                                <p id="witness">
                                                                    Ipinagkaloob ngayong ika -
                                                                    <strong>{{ date('d') }} ng
                                                                        {{ \Carbon\Carbon::today()->locale('fil')->translatedFormat('F') }}
                                                                        {{ date('Y') }}</strong>
                                                                </p>


                                                                <p id="witness" style="margin-top: 70px;">
                                                                    Pinatutunayan ni:
                                                                </p>
                                                            @break

                                                            @case('pui_pum')
                                                                <p id="to-whom">To Whom It May Concern:</p>
                                                                <p id="content">
                                                                    This is to certify that <strong>{{ $resident->full_name }},
                                                                        Barangay {{ $barangay->name }}, Calauan, Laguna.</strong>
                                                                </p>
                                                                <p id="content">
                                                                    This is to certify further that
                                                                    <strong>{{ $resident->full_name }}</strong> is not a Person
                                                                    Under Monitoring
                                                                    (PUM) nor a Person Under Investigation (PUI) in relation to
                                                                    COVID 19 while
                                                                    he/she is in the barangay.
                                                                </p>
                                                                <P id="issue-for">
                                                                    This CERTIFICATION is being issued upon the request of
                                                                    <strong>{{ $resident->full_name }}</strong> for any legal
                                                                    purpose this may
                                                                    serve.
                                                                </P>

                                                                <p id="witness">
                                                                    Given this <strong> {{ date('jS \\of F Y') }}
                                                                    </strong>
                                                                </p>


                                                                <p id="witness" style="margin-top: 70px;">
                                                                    Certify By:
                                                                </p>
                                                            @break

                                                            @case('residency')
                                                                <p id="to-whom">Sa kinauukulan,</p>
                                                                <p id="content">
                                                                    Ito ay nagpapatunay na si
                                                                    <strong>{{ $resident->full_name }}</strong> ,
                                                                    <strong>{{ $resident->birthday->age }}
                                                                    </strong> taong gulang ipinanganak noong
                                                                    <strong>{{ date('M d, Y', strtotime($resident->birthday)) }}</strong>
                                                                    sa {{ $resident->birthplace }} at naninirahan sa <strong>
                                                                        {{ $resident->address }}</strong>
                                                                <P id="issue-for">
                                                                    Pagpapatunay pa din na si <strong>{{ $resident->full_name }}
                                                                    </strong>, 8 buwan ng naninirahan sa Barangay
                                                                    {{ $barangay->name }} hangang sa kasalukuyan.
                                                                </P>
                                                                <p id="witness">
                                                                    Ipinagkaloob ngayong ika -
                                                                    <strong>{{ date('d') }} ng
                                                                        {{ \Carbon\Carbon::today()->locale('fil')->translatedFormat('F') }}
                                                                        {{ date('Y') }}</strong>
                                                                </p>


                                                                <p id="witness" style="margin-top: 70px;">
                                                                    Pinatutunayan ni:
                                                                </p>
                                                            @break

                                                            @case('settlement')
                                                                <p id="content">
                                                                    {{ $blotter->agreement }}
                                                                </p>
                                                                <p id="witness" style="margin-top: 70px;">
                                                                    Certify By:
                                                                </p>
                                                            @break

                                                            @default
                                                        @endswitch


                                                    </div>



                                                    <div class="cap-sign-part">
                                                        <div class="cap-sign-wrapper">
                                                            <p>
                                                                <strong>{{ $certificate_type == 'income' || $certificate_type == 'indigency' || $certificate_type == 'livein' || $certificate_type == 'residency' ? 'Kgg' : 'Hon' }}.
                                                                    {{ $chairman->full_name }}</strong>
                                                                <br>
                                                                <span>{{ $certificate_type == 'income' || $certificate_type == 'indigency' || $certificate_type == 'livein' || $certificate_type == 'residency' ? 'Punong Barangay' : 'Barangay ' . $chairman->position }}</span>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    @if ($certificate_type == 'barangay_clearance')
                                                        <div class="issued">
                                                            <div class="issued-wrapper">
                                                                <p>
                                                                    CTC No.:
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                                @if ($certificate_type == 'barangay_clearance')
                                                    <div class="validity">
                                                        <div class="validity-wrapper">
                                                            <p>
                                                                *VALID UNTIL THREE(3) MONTHS FROM THE DATE ISSUED*
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endif
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
                    document.getElementById('results').innerHTML = '<img src="' + data_uri +
                        '" width="120" height="120"/>';
                    $("#output").attr('src', data_uri);
                    //hide camera
                    Webcam.reset();
                    document.querySelector('#my_camera').style.display = 'none';
                });
            }
        @endif

        function generatepdf() {
            var element = document.getElementById('element-to-print');
            @if (!$isHeadOfTheFamily)
                // check if the image-tag has value
                if ($('.image-tag').val() == '') {
                    alert('Please capture the picture');
                    return false;
                }
            @endif
            var opt = {
                margin: 0,
                filename: '{{ $title }} - {{ $resident->full_name }}.pdf',
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
