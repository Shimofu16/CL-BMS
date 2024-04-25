<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | {{ $name->value }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset($logo->value) }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="
        {{asset('homepage/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="
        {{asset('homepage/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="
        {{asset('homepage/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="
        {{asset('homepage/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="
        {{asset('homepage/assets/css/slick.css')}}">
    <link rel="stylesheet" href="
        {{asset('homepage/assets/css/default.css')}}">
    <link rel="stylesheet" href="
        {{asset('homepage/assets/css/style.css')}}">
    <link rel="stylesheet" href="
        {{asset('homepage/assets/css/responsive.css')}}">
</head>

<body>

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    @include('frontend.municipality.layouts.header')

    <!-- main-area -->
    <main>
           @yield('content')
    </main>
    <!-- main-area-end -->

    @include('frontend.municipality.layouts.footer')

    <!-- JS here -->
    <script src="{{asset('homepage/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('homepage/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('homepage/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('homepage/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('homepage/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('homepage/assets/js/element-in-view.js')}}"></script>
    <script src="{{asset('homepage/assets/js/slick.min.js')}}"></script>
    <script src="{{asset('homepage/assets/js/ajax-form.js')}}"></script>
    <script src="{{asset('homepage/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('homepage/assets/js/plugins.js')}}"></script>
    <script src="{{asset('homepage/assets/js/main.js')}}"></script>
</body>

</html>
