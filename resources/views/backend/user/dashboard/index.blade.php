@extends('backend.user.sidebar')
@section('page-title')
    Dashboard
@endsection

@section('contents')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-4 col-3">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Enrolled Residents</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid text-violet fa-people-roof"></i>
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
                        <h5 class="card-title">Total PWD Residents</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid text-violet fa-person-walking-with-cane"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $pwd_residents_count }}</h6>
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
                        <h5 class="card-title">Total Senior Citizen Residents</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid text-violet fa-hospital-user"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $senior_residents_count }}</h6>
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
                        <h5 class="card-title text-center">Residents with subsudy program</h5>
                        <div class="d-flex align-items-center justify-content-center">
                            <!-- Pie Chart -->
                            @if (count($residents_with_subsidy) > 0)
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
            <div class="col-xxl-3 col-md-4">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <h5 class="card-title text-center">Residents Per Purok</h5>
                        <div class="d-flex align-items-center justify-content-center">
                            <!-- Pie Chart -->
                            @if (count($residents_per_purok) > 0)
                                <canvas id="purok" style="height: 300px;"></canvas>
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
                    {{-- <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div> --}}

                    <div class="card-body">
                        <h5 class="card-title">Recent Blotters {{-- <span>| Today</span> --}}</h5>

                        <div class="activity">
                            @forelse ($blotters as $blotter)
                                <div class="activity-item d-flex">
                                    <div class="activity-label">{{ $blotter->created_at->diffForHumans() }}</div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content d-flex">
                                        <p class="me-4">{{ $blotter->blotters_info }}</p>
                                        <a href="{{ route('user.barangay.blotters.show', $blotter->id) }}"
                                            class="fw-bold text-dark">View</a>
                                    </div>
                                </div>
                            @empty
                                <div class="activity-item d-flex justify-content-center">
                                    <div class="activity-label ">No Blotters</div>
                                </div>
                            @endforelse
                            <!-- End activity item-->

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
            generateCharts('#purok', 'Residents Per Purok ', {!! json_encode($residents_per_purok) !!});
            generateCharts('#subsidy', 'Residents with subsudy program', {!! json_encode($residents_with_subsidy) !!});

        });
    </script>
@endsection
