@extends('backend.user.sidebar')

@section('page-title')
    Brgy. {{ Str::ucFirst($permit_type) }} Clearance
@endsection

@section('contents')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="section-header d-flex justify-content-between">
                    <div>
                        <h3 class="page__heading">Generate Brgy. {{ Str::ucFirst($permit_type) }} Clearance</h3>
                    </div>
                    <div>
                        @if ($permit_type == 'business')
                            <button class="btn btn-md btn-icon icon-left btn-primary" data-bs-toggle="modal"
                                data-bs-target="#business_modal">
                                Generate
                            </button>
                            <div class="modal fade" id="business_modal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title text-white">Download PDF</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label>OR Number</label>
                                                    <input type="number" name="or_number" id="or_number_input"
                                                        class="form-control phone-number" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input type="number" name="amount" id="amount_input"
                                                        class="form-control phone-number" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"  onclick="generatePdf('{{ $filename }}')">Download</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <button class="btn btn-md btn-icon icon-left btn-primary"
                                onclick="generatePdf('{{ $filename }}')">
                                Download
                            </button>

                        @endif
                    </div>

                </div>
            </div>
            <div class="card-body">

                <div class="d-flex justify-content-around">
                    <div id="border-blue">
                        <div class="certificate-container">
                            <div class="page" style="width: 8.3in;" id="element-to-print">
                                <div class="wrapper">
                                    <div class="head">

                                        <p>REPUBLIC OF THE PHILIPPINES</p>
                                        <p> PROVINCE OF LAGUNA </p>
                                        <p> MUNICIPLITY OF CALAUAN </p>
                                        <p class="text-uppercase"> BARANGAY {{ $barangay->name }}
                                        </p>

                                        <div class="title-wrapper">
                                            <h1 style="border-left: 2px solid black; border-right: 2px solid black;">
                                                Barangay {{ Str::ucFirst($permit_type) }} Clearance</h1>
                                        </div>
                                    </div>

                                    <div class="body">
                                        <div class="officials" style="width: 2.75in;  border-left: 2px solid black;">
                                            <div class="official-wrapper">
                                                <img id="logo-img" src="{{ asset('storage/' . $barangay->logo) }}"
                                                    alt="{{ $barangay->name }}">
                                                <p style="margin-bottom: 20px;"> <strong> Barangay
                                                        {{ $barangay->name }} </strong></p>
                                                @foreach ($officials as $official)
                                                    @if ($official->position == 'Captain')
                                                        <p>
                                                            <strong>Hon. {{ $official->full_name }}</strong><br>
                                                            {{ $official->position }}
                                                        </p>

                                                        <p id="councelor-label">
                                                            <strong>COUNCILORS</strong><br>
                                                        </p>
                                                    @elseif($official->position == 'Secretary')
                                                        <p>
                                                            <strong>{{ $official->full_name }}</strong><br>
                                                            {{ $official->position }}
                                                        </p>
                                                    @elseif($official->position == 'Treasurer')
                                                        <p>
                                                            <strong>{{ $official->full_name }}</strong><br>
                                                            {{ $official->position }}
                                                        </p>
                                                    @elseif($official->position == 'SK Chairperson')
                                                        <p>
                                                            <strong>{{ $official->full_name }}</strong><br>
                                                            {{ $official->position }}
                                                        </p>
                                                    @else
                                                        <p>
                                                            <strong>Hon. {{ $official->full_name }}</strong><br>
                                                            {{ $official->position }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="content" style="width: 5.55in; border-right: 2px solid black;">
                                            <div class="content-wrapper">
                                                @switch($permit_type)
                                                    @case('building')
                                                        <div class="text-part" style="margin-top:100px;">
                                                            <p id="to-whom">TO WHOM IT MAY CONCERN:</p>
                                                            <p id="content">
                                                                Permit is hereby granted to Mr./Mrs.
                                                                <strong>{{ $permit->owner->full_name }}</strong> to construct and
                                                                renovate a
                                                                proposed <strong> {{ $permit->details['type'] }}</strong> located
                                                                at
                                                                <strong>{{ $permit->details['address'] }}</strong>.

                                                            <P id="issue-for">
                                                                SUBJECT, however to the provision of our existing laws, ordinances
                                                                and
                                                                regulation governing the operation and maintenance of the SAME.
                                                            </P>

                                                            <P id="issue-for">This <strong>BARANGAY BUILDING CLEARANCE </strong>may
                                                                be
                                                                revoked at any time when necessary to protect, rules and regulations
                                                                governing the operation and maintenance of the same.</p>

                                                            <p id="witness">
                                                                This permit is expires after the construction of the said building.
                                                            </p>
                                                        </div>


                                                        <div class="cap-sign-part">
                                                            <div class="cap-sign-wrapper">
                                                                <p>
                                                                    <strong>Hon.
                                                                        {{ $captain->full_name }}</strong><br>
                                                                    Barangay Chairman
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div style="margin-top: 60px;">
                                                            <strong>Date Issued:
                                                            </strong>{{ \Carbon\Carbon::today()->format('jS \\of F Y') }}
                                                        </div>
                                                    @break

                                                    @case('business')
                                                        <div class="text-part">
                                                            <p
                                                                style="text-align:center; line-height:10px;  text-transform: uppercase;">
                                                                {{ $permit->details['name'] }}
                                                            <p style="text-align:center;"><strong> BUSINESS NAME </strong></p> <br>
                                                            </p>

                                                            <p
                                                                style="text-align:center; line-height:10px; text-transform: uppercase;">
                                                                {{ $permit->details['address'] }} </p>
                                                            <p style="text-align:center;"> <strong> BUSINESS ADDRESS </strong> </p>
                                                            <br>
                                                            </p>
                                                            <p>
                                                            <p
                                                                style="text-align:center; line-height:10px; text-transform: uppercase;">
                                                                {{ $permit->resident_id ? $permit->owner->full_name : $permit->details['owner__resident'] }}
                                                            </p>
                                                            </p>
                                                            <p style="text-align:center;"><strong> NAME OF OWNER</strong></p>

                                                            </p>
                                                            <P id="issue-for">
                                                                This certifies that the above Business Establishment conforms to the
                                                                requirement for putting up business enterprises with the
                                                                jurisdiction of
                                                                this Barangay.
                                                            </P>
                                                            <br>
                                                            <p style="text-align:center; font-size: 18px;">
                                                                Issued this {{ \Carbon\Carbon::today()->format('jS \\of F Y') }}.
                                                            </p>

                                                            <p id="witness" style="margin-top: 20px;">
                                                                CONFORMED BY:
                                                            </p>
                                                            <br>
                                                            <br>

                                                            <p>
                                                                <strong>
                                                                    <p
                                                                        style="line-height:10px; margin-left:50px; text-transform: uppercase;">
                                                                        {{ $permit->resident_id ? $permit->owner->full_name : $permit->details['non-resident_owner'] }}
                                                                    </p>
                                                                </strong>
                                                            <p style="margin-left:120px;">APPLICANT</p><br>
                                                        </div>
                                                        <div class="cap-sign-part">
                                                            <div class="cap-sign-wrapper">
                                                                <p style="text-transform: uppercase;">
                                                                    <strong>Hon.
                                                                        {{ $captain->full_name }}</strong><br>
                                                                </p>
                                                                <p>
                                                                    Barangay Chairman
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <p id="witness" style="margin-top: 20px; text-align:center;">
                                                            RELEASE BY:
                                                        </p>
                                                        <br>
                                                        <div class="cap-sign-part">
                                                            <div class="cap-sign-wrapper">
                                                                <p style="text-transform: uppercase;">
                                                                    <strong>
                                                                        {{ $secretary->full_name }}</strong><br>
                                                                </p>
                                                                <p>
                                                                    Secretary
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="issued">
                                                            <div class="issued-wrapper">
                                                                <p
                                                                    style="font-size: 20px; text-transform: uppercase; margin-left: 20px;">
                                                                    <strong>OR. No.:</strong> <u id="or_number"></u><br>
                                                                    <strong>Amount: </strong><u id="amount"></u>
                                                                </p>
                                                                <p id="year">
                                                                    {{ \Carbon\Carbon::today()->format('Y') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case('digging')
                                                        <div class="text-part" style="margin-top:100px;">
                                                            <p id="to-whom">Sa Kinauukulan,</p>
                                                            <p id="content">
                                                                Ito ay pagpapatunay na si <strong> {{ $permit->details['name']}} </strong>
                                                                nasa
                                                                hustong taong gulang at kasalukuyang naninirahan sa <strong>{{
                                                                    $permit->details['address']}} </strong>.

                                                            <P id="issue-for">
                                                                Pinatutunayan din na si <strong> {{ $permit->details['name']}} </strong> ay
                                                                pinahihintulutan ng Barangay na magpahukay para sa <strong> {{
                                                                    $permit->details['purpose']}} </strong>.
                                                            </P>

                                                            <p id="witness">
                                                                Ipinagkaloob ngayong ika -

                                                                <strong>

                                                                    {{\Carbon\Carbon::today()->format('d')}}

                                                                    ng

                                                                    {{\Carbon\Carbon::today()->locale('fil')->translatedFormat('F')}}

                                                                    {{\Carbon\Carbon::today()->format('Y')}}

                                                                </strong>
                                                            </p>


                                                            <p id="witness" style="margin-top: 70px;">
                                                                Pinapatunayan:
                                                            </p>
                                                        </div>


                                                        <div class="cap-sign-part">
                                                            <div class="cap-sign-wrapper">

                                                                <p>
                                                                    <strong>Kgg.
                                                                        {{ $captain->full_name }}</strong><br>
                                                                    Punong Barangay
                                                                </p>

                                                            </div>
                                                        </div>
                                                    @break
                                                    @case('fencing')
                                                        <div class="text-part" style="margin-top:100px;">
                                                            <p id="to-whom">Sa Kinauukulan,</p>
                                                            <p id="content">
                                                                Ito ay pagpapatunay na si <strong> {{ $permit->details['name']}} </strong>
                                                                may sapat na gulang at kasalukuyang naninirahan sa <strong>{{
                                                                    $permit->details['address']}}.</strong> At ang kanyang lupain ay nasa
                                                                {{ $permit->details['location'] }}.


                                                            <P id="issue-for">
                                                                Pinatutunayan din ng Tanggapang ito na siya ay binibigyan ng pahintulot na
                                                                magbakod sa kanilang nasasakupan sa {{ $permit->details['location']}}.
                                                            </P>

                                                            <p id="witness">
                                                                Ipinagkaloob ngayong ika -

                                                                <strong>

                                                                    {{\Carbon\Carbon::today()->format('d')}}

                                                                    ng

                                                                    {{\Carbon\Carbon::today()->locale('fil')->translatedFormat('F')}}

                                                                    {{\Carbon\Carbon::today()->format('Y')}}

                                                                </strong>
                                                            </p>


                                                            <p id="witness" style="margin-top: 70px;">
                                                                Pinapatunayan:
                                                            </p>
                                                        </div>


                                                        <div class="cap-sign-part">
                                                            <div class="cap-sign-wrapper">

                                                                <p>
                                                                    <strong>Kgg.
                                                                        {{ $captain->full_name }}</strong><br>
                                                                    Punong Barangay
                                                                </p>
                                                            </div>
                                                        </div>

                                                    @break
                                                    @case('franchise')
                                                        <div class="top-part">
                                                            <div id="resident-picture">
                                                                <img src="{{ asset('storage/uploads/residents/' . $permit->owner->image) }}" width="120" height="120" alt="{{ $permit->owner->full_name }}">
                                                            </div>
                                                        </div>

                                                        <div class="text-part">
                                                            <p id="to-whom">TO WHOM IT MAY CONCERN,</p>
                                                            <p id="content">
                                                                This is to certify that the person whose name, pictures, signature and right
                                                                thumbprint appear hereon has passed the record verification which was
                                                                conducted by this Barangay. The result of which is/are listed below.
                                                            </p>

                                                            <div style="margin-left: 20px; margin-top:20px;">

                                                                <strong>
                                                                    <p>Name:
                                                                </strong>{{ $permit->owner->full_name }}
                                                                </p>
                                                                <strong>
                                                                    <p>Address:
                                                                </strong>{{ $permit->owner->address }}</p>
                                                                <strong>
                                                                    <p>Birthday:
                                                                </strong>{{$permit->owner->birthday}}</p>
                                                                <strong>
                                                                    <p>Birthplace:
                                                                </strong>{{$permit->owner->birthplace}}</p>
                                                                <strong>
                                                                    <p>Motor No.:
                                                                </strong>{{ $permit->details['motor']}}</p>
                                                                <strong>
                                                                    <p>Chasis No.:
                                                                </strong>{{ $permit->details['chassis']}}</p>
                                                                <strong>
                                                                    <p>Plate No.:
                                                                </strong>{{ $permit->details['plate']}}</p>

                                                            </div>


                                                            <P id="issue-for">
                                                                Issued upon request of subject person in connection with his/her application
                                                                for
                                                                <strong id="transform-upppercase"> Renewal </strong>
                                                            </P>

                                                            <p id="witness">
                                                                Witness my hand and seal, this <strong>
                                                                    {{ \Carbon\Carbon::today()->format('l jS \\of F Y') }}</strong> at
                                                                <strong>
                                                                    Barangay {{ $barangay->name }}, Calauan, Laguna.
                                                                </strong>
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
                                                                    <strong>Hon.
                                                                        {{ $captain->full_name }}</strong><br>
                                                                    Chairman
                                                                </p>

                                                            </div>
                                                        </div>

                                                        <div class="issued">
                                                            <div class="issued-wrapper">
                                                                {{-- <p>
                                                                    CTC No.:
                                                                </p> --}}
                                                            </div>
                                                        </div>
                                                    @break
                                                    @case('meralco')
                                                        <div class="text-part" style="margin-top:100px;">
                                                            <p id="to-whom">TO WHOM IT MAY CONCERN:</p>
                                                            <p id="content">
                                                                This is to cerify that <strong> {{
                                                                    $permit->details['building_type'] }}</strong> owned by
                                                                <strong>{{ $permit->details['applicant'] }}</strong> of Brgy {{
                                                                $barangay->name }},
                                                                Calauan, Laguna will be constructed at along <strong>{{
                                                                    $permit->details['address'] }}</strong>. This further certifies
                                                                that the lot where the proposed building will be constructed is free from
                                                                any claims or legal impediments as per record of this barangay.
                                                            </p>


                                                            <P id="issue-for">
                                                                And after inspection conducted, it was found that said structure has no
                                                                encroachment on any public property and has not yet violated any Barangay or
                                                                Municipal Ordinance, therefore this office interpose no objection to the
                                                                construction and recommend the same from approval.
                                                            </P>

                                                            <P id="issue-for">This certification is being issued upon request of the above
                                                                mentioned name on this <strong>{{ \Carbon\Carbon::today()->format('jS \\of F
                                                                    Y') }}</strong> in compliance with the requirement of
                                                                <strong>MERALCO.</strong>
                                                            </p>

                                                        </div>

                                                        <div class="cap-sign-part">
                                                            <div class="cap-sign-wrapper">
                                                                <p>
                                                                    <strong>Hon.
                                                                        {{ $captain->full_name }}</strong><br>
                                                                    Barangay Chairman
                                                                </p>

                                                            </div>
                                                        </div>

                                                        <div style="margin-top: 60px;">
                                                            <strong>Date Issued: </strong>{{ \Carbon\Carbon::today()->format('l jS \\of F Y') }}
                                                        </div>
                                                    @break
                                                @endswitch

                                            </div>
                                            @if ($permit_type == 'franchise')
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


        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
            integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript">
            document.getElementById('business_modal').addEventListener('shown.bs.modal', function () {
                document.getElementById('or_number_input').addEventListener('input', function () {
                    document.getElementById('or_number').textContent = this.value;
                });

                document.getElementById('amount_input').addEventListener('input', function () {
                    document.getElementById('amount').textContent = this.value;
                });
            });
            function generatePdf(filename) {
                var element = document.getElementById('element-to-print');
                var opt = {
                    margin: 0,
                    filename: filename,
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


    </section>
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
            padding: 20px;
        }

        .certificate-container {
            width: 60vw;
            display: flex;
            justify-content: center;
            font-family: 'STIX Two Text', serif;
            color: black;
        }



        .page {
            /* padding: 10px; */
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
        .head p {
            text-align: center;
            line-height: 18px;
        }

        .head h1 {
            padding: 10px;
            text-align: center;
            border: 1px solid black;
        }

        /* body page */
        .body {
            display: flex;
            justify-content: center;
            margin: 10px;
        }

        /* officials */
        .officials {
            /* background-color: rgb(85, 197, 241); */
            /* background-image: linear-gradient(to bottom right, rgb(28, 50, 245), rgb(75, 174, 240)); */
            background: #a0c4e4;
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
            margin-top: 50px;
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
            margin-right: 50px;
            line-height: 17px;
        }

        .cap-sign-part .cap-sign-wrapper p {
            line-height: 18px;
        }

        /* content issue */
        .issued {
            margin-top: 40px;
        }

        .issued-wrapper {
            display: flex;
            justify-content: space-between;
        }

        #year {
            font-size: 48px;
            padding: 15px;
            border: 1px solid green;
            margin-right: 50px;
        }
    </style>
@endsection
