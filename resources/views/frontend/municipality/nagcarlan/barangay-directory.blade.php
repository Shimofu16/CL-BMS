@extends('frontend.municipality.nagcarlan.master')
@section('title')
Home
@endsection
@section('content')

<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">Barangay Directory</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Barangay Directory
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="portfolio__inner" style="padding: 0">
    <div class="container">
        <div class="portfolio__inner__item grid-item cat-three">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-12 col-md-10">
                    <div class="portfolio__inner__content" style="text-align: left;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="title">Barangay Name</th>
                                    <th class="title">Barangay Chairman</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barangays as $barangay)
                                <tr>
                                    <td>
                                        <p>{{ $barangay['name'] }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $barangay['chairman'] }}</p>
                                    </td>
                                </tr>
                                @endforeach
                                {{-- <tr>
                                    <td>
                                        <p>ABO</p>
                                    </td>
                                    <td>
                                        <p>MARIO O. PONTIPEDRA</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>ALIBUNGBUNGAN
                                        </p>
                                    </td>
                                    <td>
                                        <p>JESSICA H. BELLEN
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p>ALUMBRADO
                                        </p>
                                    </td>
                                    <td>
                                        <p>ARNEL C. GESMUNDO
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p>BALAYONG
                                        </p>
                                    </td>
                                    <td>
                                        <p>DEXTER O. DORADO
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p>BALIMBING
                                        </p>
                                    </td>
                                    <td>
                                        <p>CONSTANCIA D. ORTEGA
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p>BALINACON
                                        </p>
                                    </td>
                                    <td>
                                        <p>RUDY C. CONDINO
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p>BAMBANG
                                        </p>
                                    </td>
                                    <td>
                                        <p>ANALYN U. CONSEBIDO
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p>BANAGO
                                        </p>
                                    </td>
                                    <td>
                                        <p>HERMIS M. ALBARICO
                                        </p>
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td>-------------------------------------------------------------------------------
                                    </td>
                                    <td>-------------------------------------------------------------------------------
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
