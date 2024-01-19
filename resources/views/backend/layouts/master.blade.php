<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ Auth::user()->role }} @hasSection('page-title')
            - @yield('page-title')
        @else
        @endif
    </title>

    <!-- Icon -->
    <link rel="icon" href="{{ asset($logo->value) }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/packages/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/packages/fontawesome/css/all.min.css') }}" rel="stylesheet">
    {{--
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}"> --}}

    @if (!Route::is('*.dashboard.index'))
        <link href="{{ asset('assets/packages/DataTables/datatables.min.css') }}" rel="stylesheet">
    @endif
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    {{-- page css --}}
    @yield('styles')


</head>

<body>

    <!-- ======= Header ======= -->
    @include('backend.layouts.header')
    @include('backend.layouts.logout-modal')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @yield('sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        {{-- page titles --}}
        <div class="pagetitle d-flex align-items-center justify-content-between">
            <div class="d-flex flex-column">
                <h1 class="text-violet">@yield('page-title')</h1>
                @if (!Route::is(Str::lower(Auth::user()->role) . '.dashboard.index'))
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route(Str::lower(Auth::user()->role) . '.dashboard.index') }}">Dashboard</a>
                            </li>
                            @hasSection('breadcrumb')
                                <li class="breadcrumb-item"><a href="@yield('breadcrumb-link')">@yield('breadcrumb')</a></li>
                                <li class="breadcrumb-item active">@yield('page-title')</li>
                            @else
                                <li class="breadcrumb-item active">@yield('page-title')</li>
                            @endif
                        </ol>
                    </nav>
                @endif
            </div>
            <div class="add">
                @yield('add')
            </div>

        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            @yield('contents')
        </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('sweetalert::alert')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/packages/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/packages/jQuery-3.6.0/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap-select.min.js') }}"></script>

    @if (Route::is('*.dashboard.index'))
        <script src="{{ asset('assets/packages/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/packages/chart.js/chart.umd.js') }}"></script>
        <script src="{{ asset('assets/packages/echarts/echarts.min.js') }}"></script>
        <script src="{{ asset('assets/packages/quill/quill.min.js') }}"></script>
    @endif

    <script src="{{ asset('assets/packages/DataTables/datatables.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


    @yield('scripts')
    <script>
        $(document).ready(function() {
            //disable auto order
            $('.datatable').DataTable({
                "ordering": false
            });
        });
    </script>
</body>

</html>
