@extends('backend.admin.sidebar')

@section('page-title')
    Dashboard
@endsection
@section('contents')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            @foreach ($years as $year)
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard.index',['year_id' => $year->year]) }}">{{ $year->year
                                     }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title text-center">Residents Per Barangay</h5>
                        <div class="d-flex align-items-center justify-content-center">
                            <!-- Pie Chart -->
                            @if (isset($getTotalPerSpecialization))
                                <canvas id="residents" style="min-height: 400px;"></canvas>
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
            generateCharts('#residents', 'Residents Per Barangay', {!! json_encode($total_residents_per_barangay) !!});

        });
    </script>
@endsection
