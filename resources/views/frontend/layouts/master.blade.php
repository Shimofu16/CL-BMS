<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') | {{ $name->value }}</title>
    {{-- icon --}}
    <link rel="icon" href="{{ asset($logo->value) }}" type="image/x-icon">
    <!-- General CSS Files -->
    <link href="{{ asset('assets/packages/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/barangay.css') }}">
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/packages/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/packages/jQuery-3.6.0/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('home/js/app.js') }}"></script>
    <script src="{{ asset('home/js/jquery-3.6.0.min.js') }}"></script>
    {{-- sweetalert --}}
    {{-- @include('sweetalert::alert') --}}
</body>

</html>
