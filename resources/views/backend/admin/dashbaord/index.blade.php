@extends('backend.admin.sidebar')

@section('page-title')
    Dashboard
@endsection
@section('contents')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-4 col-3">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Total Enrolled Barangay</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid text-violet fa-people-roof"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $brangay_count }}</h6>
                                {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                        class="text-muted small pt-2 ps-1">increase</span> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-3">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Total Enrolled Residents</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid text-violet fa-person"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $residents_count }}</h6>
                                {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                        class="text-muted small pt-2 ps-1">increase</span> --}}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-lg-4 col-3">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Total Officials</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid text-violet fa-hospital-user"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $officials_count }}</h6>
                                {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                        class="text-muted small pt-2 ps-1">increase</span> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-3 col-md-4">
                <div class="card h-100">

                    <div class="card-body pb-0">
                        <h5 class="card-title text-center">Residents Per Barangay</h5>
                        <div class="d-flex align-items-center justify-content-center">
                            <!-- Pie Chart -->
                            @if (count($residents_per_barangay) > 0)
                                <canvas id="residents" style="height: 300px;"></canvas>
                            @else
                                <div class="alert alert-info text-center">
                                    <strong>No data found!</strong>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-4">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <h5 class="card-title text-center">Total Residents with Subsidy Program Per Barangay</h5>
                        <div class="d-flex align-items-center justify-content-center">
                            <!-- Pie Chart -->
                            @if (count($residents_with_subsidy_per_brgy) > 0)
                                <canvas id="subsidy" style="height: 300px;"></canvas>
                            @else
                                <div class="alert alert-info text-center">
                                    <strong>No data found!</strong>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('scripts')
    <script>
        const colors = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd', '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22',
            '#17becf', '#1b9e77', '#d95f02', '#7570b3', '#e7298a'
        ];

        function generateCharts(selector, label, data) {
            const dataLength = data.length;
            const backgroundColors = colors.slice(0, dataLength);
            new Chart(document.querySelector(selector), {
                type: 'pie',
                data: {
                    labels: data.map(d => d.name),
                    datasets: [{
                        label: label,
                        data: data.map(d => d.residents_count),
                        backgroundColor: backgroundColors,
                        hoverOffset: 4
                    }]
                }
            });
        }

        document.addEventListener("DOMContentLoaded", () => {
            generateCharts('#residents', 'Residents Per Barangay', {!! json_encode($residents_per_barangay) !!});
            generateCharts('#subsidy', 'Residents with Subsudy Program Per Barangay', {!! json_encode($residents_with_subsidy_per_brgy) !!});

        });
    </script>
@endsection
