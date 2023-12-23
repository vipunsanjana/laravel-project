<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel Class</title>
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

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('plugins/noUiSlider/nouislider.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
        <!-- END THEME GLOBAL STYLES -->

        <link href="{{ asset('assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">

        <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/noUiSlider/custom-nouiSlider.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('plugins/bootstrap-range-Slider/bootstrap-slider.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('plugins/autocomplete/autocomplete.css') }}" rel="stylesheet" type="text/css" />

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
        <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

        <link href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('plugins/sweetalerts/promise-polyfill.js') }}"></script>
        <link href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />

        <style>
            .text-muted { color: #009688 !important; font-size: 12px; }
            .form-group label, label { font-size: 14px; font-weight: 600; color: #888ea8; }
        </style>

        @yield('css')

    </head>
    <body class="theme-cyan font-montserrat">

        @yield('content')
        <!-- END WRAPPER -->

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
        <!-- <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script> -->
        <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- END GLOBAL MANDATORY SCRIPTS -->
        <script src="{{ asset('assets/js/authentication/form-1.js') }}"></script>
        <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/widgets/modules-widgets.css') }}">
        <script>
            $(document).ready(function() {
                App.init();
            });
        </script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/js/dashboard/dash_1.js') }}"></script>

        <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
        <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
        <script src="{{ asset('assets/js/users/account-settings.js') }}"></script>
        <script src="{{ asset('plugins/highlight/highlight.pack.js') }}"></script>

        <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
        <!-- <script src="{{ asset('plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
        <script src="{{ asset('plugins/input-mask/input-mask.js') }}"></script> -->

        <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
        <script src="{{ asset('plugins/noUiSlider/nouislider.min.js') }}"></script>

        <script src="{{ asset('plugins/flatpickr/custom-flatpickr.js') }}"></script>
        <script src="{{ asset('plugins/noUiSlider/custom-nouiSlider.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js') }}"></script>

        <script src="{{ asset('plugins/autocomplete/jquery.mockjax.js') }}"></script>
        <script src="{{ asset('plugins/autocomplete/jquery.autocomplete.js') }}"></script>
        <script src="{{ asset('plugins/autocomplete/countries.js') }}"></script>
        <script src="{{ asset('plugins/autocomplete/demo.js') }}"></script>

        <script src="{{ asset('assets/js/authentication/form-2.js') }}"></script>

        <script src="{{ asset('assets/js/widgets/modules-widgets.js') }}"></script>

        <!-- sweet alert -->
        <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>

        @yield('js')
    </body>
</html>
