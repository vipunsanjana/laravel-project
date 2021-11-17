<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Layout Index</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <link rel="icon" href="{{ asset('uploads/logo/logo.png') }}" type="image/x-icon">
        <!-- VENDOR CSS -->
        <link rel="stylesheet" href="{{asset('auth/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{asset('auth/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{asset('auth/assets/vendor/animate-css/vivify.min.css') }}">

        <!-- MAIN CSS -->
        <link rel="stylesheet" href="{{asset('auth/assets/css/site.min.css') }}">

    </head>
    <body class="theme-cyan font-montserrat">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                <div class="bar4"></div>
                <div class="bar5"></div>
            </div>
        </div>

        <div class="pattern">
            <span class="red"></span>
            <span class="indigo"></span>
            <span class="blue"></span>
            <span class="green"></span>
            <span class="orange"></span>
        </div>

        @yield('content')
        <!-- END WRAPPER -->

        <script src="{{asset('auth/assets/bundles/libscripts.bundle.js') }}"></script>
        <script src="{{asset('auth/assets/bundles/vendorscripts.bundle.js') }}"></script>
        <script src="{{asset('auth/assets/bundles/mainscripts.bundle.js') }}"></script>
    </body>
</html>
