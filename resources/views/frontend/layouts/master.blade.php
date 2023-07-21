<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') | {{ config('app.name') }}</title>
    {{-- icon --}}
    <link rel="icon" href="{{ asset('new assets/images/CL-LOGO.png') }}" type="image/x-icon">
    <!-- General CSS Files -->
    <link href="{{ asset('new assets/packages/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('new assets/css/style.css') }}">
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
        <!-- Vendor JS Files -->
        <script src="{{ asset('new assets/packages/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('new assets/packages/jQuery-3.6.0/jquery-3.6.0.min.js') }}"></script>

        {{-- sweetalert --}}
        {{-- @include('sweetalert::alert') --}}
</body>

</html>
