<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Unitrack Admin')</title>

    <link rel="shortcut icon" href="{{ asset('unitrack-admin/assets/images/favicon.ico') }}">

    <!-- Duralux / Bootstrap Admin Theme Styles -->
    <link href="{{ asset('unitrack-admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('unitrack-admin/assets/vendors/css/vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('unitrack-admin/assets/vendors/css/daterangepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('unitrack-admin/assets/css/theme.min.css') }}" rel="stylesheet" />
</head>
<body>
    @yield('content')

    <!-- Theme Scripts -->
    <script src="{{ asset('unitrack-admin/assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('unitrack-admin/assets/vendors/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('unitrack-admin/assets/vendors/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('unitrack-admin/assets/vendors/js/circle-progress.min.js') }}"></script>

    <script src="{{ asset('unitrack-admin/assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('unitrack-admin/assets/js/dashboard-init.min.js') }}"></script>
    <script src="{{ asset('unitrack-admin/assets/js/theme-customizer-init.min.js') }}"></script>

    @stack('scripts')
</body>
</html>
