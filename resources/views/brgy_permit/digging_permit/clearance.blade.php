@extends('layouts.app')
@section('title')
Brgy Digging Permit
@endsection
@section('content')

    <section class="section">
        <div class="section-header d-flex justify-content-between">
                <div>
                    <h3 class="page__heading">Brgy Digging Permit</h3>
                </div>
                <div>
                    <button class="btn btn-md btn-icon icon-left btn-success" onclick="generatepdf()">Download</button> 
                </div>
      
        </div>
        <div class="d-flex justify-content-around">
            <div style="border: 1px solid #6474ec;">
            <div class="certificate-container">
                <div class="page" style="width: 8.3in;" id="element-to-print">
                    <div class="wrapper">
                        <div class="header">
    
                            <p>REPUBLIC OF THE PHILIPPINES</p>
                            <p> PROVINCE OF LAGUNA </p>
                            <p>   MUNICIPLITY LOS BAÑOS </p>
                            <p> BARANGAY BAYOG  </p>
                            
                            <div class="title-wrapper">
                                <h1>SERTIPIKASYON NG PAGHUHUKAY</h1>
                            </div>
                        </div>
       
                        <div class="body">
                            <div class="officials" style="width: 2.75in;">
                                <div class="official-wrapper">
                                        <img id="logo-img" src="{{ asset('../img/brgy-bayog-logo.png') }}"
                                        alt="brgy-bayog-logo" >
                                    <p style = "margin-bottom: 20px;"> <strong> Barangay Bayog </strong></p>
                                    @foreach ($b_officials as $b_official)

                                        @if ($b_official->brgy_official_position == 'Barangay Chairman')
                                            <p>
                                                <strong>Hon. {{ $b_official->brgy_official_name }}</strong><br>
                                                {{ $b_official->brgy_official_position }}
                                            </p>

                                            <p id="councelor-label">
                                                <strong>COUNCILORS</strong><br>
                                            </p>

                                        
                                        @elseif($b_official->brgy_official_position == 'Barangay Secretary')
                                        <p>
                                            <strong>{{ $b_official->brgy_official_name }}</strong><br>
                                            {{ $b_official->brgy_official_role }}
                                        </p>

                                        @elseif($b_official->brgy_official_position == 'Barangay Treasurer')
                                        <p>
                                            <strong>{{ $b_official->brgy_official_name }}</strong><br>
                                            {{ $b_official->brgy_official_role }}
                                        </p>

                                        @elseif($b_official->brgy_official_position == 'Barangay Clerk')
                                        <p>
                                            <strong>{{ $b_official->brgy_official_name }}</strong><br>
                                            {{ $b_official->brgy_official_role }}
                                        </p>

                                        @else
                                            <p>
                                                <strong>Hon. {{ $b_official->brgy_official_name }}</strong><br>
                                                {{ $b_official->brgy_official_role }}
                                            </p>
                                            
                                        @endif

                                    @endforeach


                                </div>
                            </div>
    
                            <div class="content" style="width: 5.55in;">
                                <div class="content-wrapper">
    
                                    <div class="text-part" style = "margin-top:100px;">
                                        <p id="to-whom">Sa Kinauukulan,</p>
                                        <p id="content">
                                            Ito ay pagpapatunay na si <strong> {{ $digging->name}} </strong> nasa hustong taong gulang  at kasalukuyang naninirahan sa <strong>{{ $digging->address}} </strong>.
                                           
                                        <P id="issue-for">
                                            Pinatutunayan din  na si <strong> {{ $digging->name}} </strong> ay pinahihintulutan ng Barangay na magpahukay para sa <strong> {{ $digging->purpose}} </strong>.
                                        </P>
                                        
                                        <p id="witness">
                                            Ipinagkaloob ngayong {{ \Carbon\Carbon::today()->format('l jS \\of F Y') }}. 
                                        </p>
    
                                       
                                        <p id="witness" style="margin-top: 70px;">
                                            Pinapatunayan:
                                         </p>
                                    </div>


                                    <div class="cap-sign-part">           
                                        <div class="cap-sign-wrapper">
                                            
                                            @foreach ($b_officials as $b_official)

                                            @if ($b_official->brgy_official_position == 'Barangay Chairman')
                                                <p>
                                                    <strong>Kgg.
                                                        {{ $b_official->brgy_official_name }}</strong><br>
                                                    Punong Barangay
                                                </p>
                                   
                                            @endif
                                     @endforeach
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
                integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript">
            function generatepdf() {
                var element = document.getElementById('element-to-print');
                var opt = {
                    margin: 0,
                    filename: 'digging-permit.pdf',
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
            width:60vw;
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
    
        .title-wrapper h1{
            font-family: 'STIX Two Text', serif;
        }
    
        /* header */
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
            margin: 10px;
        }
    
        /* officials */
        .officials {
            /* background-color: rgb(85, 197, 241); */
            background-image: linear-gradient(to bottom right, rgb(28, 50, 245), rgb(75, 174, 240));
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

    
        #councelor-label{
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
    
        .sign-part .tumb-wrapper {
            
        }
    
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
    
        .cap-sign-part .cap-sign-wrapper p{
            line-height: 18px;
        }
    
        /* content issue */
        .issued {
            margin-top: 40px;
        }
    </style>
@endsection