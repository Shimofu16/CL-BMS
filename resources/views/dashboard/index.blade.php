@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <style>
        /* officials */
        .officials {
            background-color: whitesmoke;
            border: 1px solid black;
            margin-right: 5px;
        }

        .official-wrapper {
            padding: 5px;
            text-align: center;
        }

        .officials p {
            line-height: 20px;
            font-size: 15px;
        }

        #councelor-label {
            margin-bottom: 0;
            padding-bottom: 0;
            margin-bottom: 10px;
            margin-top: 30px;
        }

        #logo-img {
            width: 80px;
            height: auto;
            margin-bottom: 30px;
        }

        #brgy {
            text-align: center;
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
        }

    </style>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">

                        <div class="card-body bg-secondary rounded">
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="card card-primary">
                                        <div class="pt-2">
                                            <h5 class="text-center">No. of Business</h5>
                                        </div>
                                        <div class="card-body py-2 ">
                                            <h1 class="text-center text-primary">{{ $total_business }}</h1>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card card-primary">
                                        <div class="pt-2">
                                            <h5 class="text-center">No. of PWD</h5>
                                        </div>
                                        <div class="card-body py-2 ">
                                            <h1 class="text-center text-primary">{{ $senior_Cnt }}</h1>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card card-primary">
                                        <div class="pt-2">
                                            <h5 class="text-center">No. of 4P's Beficiaries</h5>
                                        </div>
                                        <div class="card-body py-2 ">
                                            <h1 class="text-center text-primary">{{ $total_business }}</h1>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card card-primary">

                                        <div class="pt-2">
                                            <h5 class="text-center">Total Population</h5>
                                        </div>
                                        <div class="card-body py-2 px-2">
                                            <h1 class="text-center text-primary">{{ $total_res }}</h1>
                                                <canvas id="genderChart"></canvas>
                                            {{-- <div class="d-flex justify-content-between pt-2">
                                                <Strong>Male - <span
                                                        class="text-primary">{{ $male_Cnt }}</span></Strong>
                                                <Strong>Female - <span
                                                        class="text-primary">{{ $female_Cnt }}</span></Strong>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="card card-primary">
                                        <div class="pt-2">
                                            <h5 class="text-center">No. of Blotters</h5>
                                        </div>
                                        <div class="card-body py-2 px-2">
                                            <h1 class="text-center text-primary">{{ $total_blotters }}</h1>
                                            <canvas id="blotterChart"></canvas>
                                        </div>     
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="card card-primary">
                                        <div class="pt-2">
                                            <h5 class="text-center">No. of Senior's Citizen</h5>
                                        </div>
                                        <div class="card-body py-2 px-2">
                                            <h1 class="text-center text-primary">{{ $senior_Cnt }}</h1>
                                            <canvas id="seniorChart"></canvas>
                                        </div>
                                    </div>
                                </div>      

                                

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">

                    <div class="card ">
                        <div class="card-body bg-primary rounded p-1 ">

                            <div class="officials">
                                <p id="brgy">Brgy. Bayog
                                <p>
                                <div class="official-wrapper">
                                    <img id="logo-img" src="{{ asset('../img/brgy-bayog-logo.png') }}"
                                        alt="brgy-bayog-logo">
                                    <p>
                                        <strong>{{ $b_cap->brgy_official_name }}</strong><br>
                                        {{ $b_cap->brgy_official_position }}
                                    </p>

                                    </p>
                                    <p id="councelor-label">
                                        <strong>COUNCILORS</strong><br>
                                    </p>
                                    <p>
                                        <strong>{{ $b_councelor1->brgy_official_name }}</strong><br>
                                        {{ $b_councelor1->brgy_official_role }}
                                    </p>

                                    </p>
                                    <p>
                                        <strong>{{ $b_councelor2->brgy_official_name }}</strong><br>
                                        {{ $b_councelor2->brgy_official_role }}
                                    </p>
                                    </p>

                                    </p>
                                    <p>
                                        <strong>{{ $b_councelor3->brgy_official_name }}</strong><br>
                                        {{ $b_councelor3->brgy_official_role }}
                                    </p>
                                    </p>

                                    </p>
                                    <p>
                                        <strong>{{ $b_councelor4->brgy_official_name }}</strong><br>
                                        {{ $b_councelor4->brgy_official_role }}
                                    </p>
                                    </p>

                                    </p>
                                    <p>
                                        <strong>{{ $b_councelor5->brgy_official_name }}</strong><br>
                                        {{ $b_councelor5->brgy_official_role }}
                                    </p>
                                    </p>

                                    </p>
                                    <p>
                                        <strong>{{ $b_councelor6->brgy_official_name }}</strong><br>
                                        {{ $b_councelor6->brgy_official_role }}
                                    </p>
                                    </p>

                                    </p>
                                    <p>
                                        <strong>{{ $b_councelor7->brgy_official_name }}</strong><br>
                                        {{ $b_councelor7->brgy_official_role }}
                                    </p>
                                    </p>

                                    </p>
                                    <p>
                                        <strong>{{ $b_sk->brgy_official_name }}</strong><br>
                                        {{ $b_sk->brgy_official_position }} – {{ $b_sk->brgy_official_role }}
                                    </p>

                                    </p>
                                    <p>
                                        <strong>{{ $b_sec->brgy_official_name }}</strong><br>
                                        {{ $b_sec->brgy_official_position }}
                                    </p>

                                    </p>
                                    <p>
                                        <strong>{{ $b_tres->brgy_official_name }}</strong><br>
                                        {{ $b_tres->brgy_official_position }}
                                    </p>

                                    </p>
                                    <p>
                                        <strong>{{ $b_clerk->brgy_official_name }}</strong><br>
                                        {{ $b_clerk->brgy_official_position }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            var ctx = document.getElementById('blotterChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [
                            {{$unsettled_blotters}},
                            {{$settled_blotters}}
                            // 40,
                            // 30,
                            // 20,
                        ],
                        backgroundColor: [
                            '#191d21',
                            '#63ed7a'
                            // '#ffa426',
                            // '#fc544b',
                            // '#6777ef',
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Unsettle',
                        'Settled'
                        //     'Yellow',
                        //     'Red',
                        //     'Blue'
                    ],
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                }
            });
        </script>

        <script>
            var ctx = document.getElementById('genderChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [
                            {{ $female_Cnt }},
                            {{ $male_Cnt }}
                            // 40,
                            // 30,
                            // 20,
                        ],
                        backgroundColor: [
                            '#191d21',
                            '#63ed7a'
                            // '#ffa426',
                            // '#fc544b',
                            // '#6777ef',
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Female',
                        'Male'
                        //     'Yellow',
                        //     'Red',
                        //     'Blue'
                    ],
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                }
            });
        </script>

        <script>
            var ctx = document.getElementById('seniorChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [
                            {{$senior_notpwd_Cnt}},
                            {{$senior_pwd_Cnt}}
                            // 40,
                            // 30,
                            // 20,
                        ],
                        backgroundColor: [
                            '#191d21',
                            '#63ed7a'
                            // '#ffa426',
                            // '#fc544b',
                            // '#6777ef',
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Senior',
                        'Senior/PWD'
                        //     'Yellow',
                        //     'Red',
                        //     'Blue'
                    ],
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                }
            });
        </script>

    </section>


@endsection
