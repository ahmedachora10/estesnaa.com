<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed"
    dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    {{-- <title>{{ setting('app_name') ?? config('app.name', 'WMW Admin') }}</title> --}}


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="{{ asset(str_replace('public/', 'storage/', setting('icon'))) ?? asset('assets/img/favicon/favicon.ico') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link href="{{ asset('assets/fontawesome/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/solid.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="assets/css/fontawesome.css"> --}}
    @if (!request()->routeIs('login'))
        <link href="{{ asset('front/css/general.css') }}" rel="stylesheet">
        <link href="{{ asset('front/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/vendor/aos/aos.css') }}" rel="stylesheet">
    @endif
    <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    @if (!request()->routeIs('login'))
        <!-- Template Main CSS File -->
        <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('front/css/main.css') }}" rel="stylesheet">

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

        <!-- Page CSS -->
        <style>
            label.form-label {
                padding-top: .9rem;
            }

            @media only screen and (max-width:767px) {
                .register {
                    width: 100%;
                    margin: 0;
                }

                section.breadcrumbs .container {
                    width: 100%;
                }
            }
        </style>
    @endif
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    {{-- <script src="{{ asset('assets/js/config.js') }}"></script> --}}

    <!-- Scripts -->
    {{-- @vite('resources/css/app.css') --}}


    @stack('styles')

    @livewireStyles
</head>

<body @class(['hold-transition login-page' => request()->routeIs('login')])>
    <main>
        @if (!request()->routeIs('login'))
            {{-- Header Section --}}
            @include('layouts.front.header', ['sliders' => []])
        @endif

        {{-- Content --}}
        {{ $slot }}
    </main>

    {{-- Footer Section --}}
    @if (!request()->routeIs('login'))
        @include('layouts.front.footer')
    @endif

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>

    {{-- <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}

    <!-- Template Main JS File -->
    {{-- <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('front/js/main.js') }}"></script>


    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->

    @stack('component-scripts')

    {{-- @vite('resources/js/app.js') --}}
    <script src="{{ asset('build/assets/app.js') }}"></script>

    @stack('scripts')

    @livewireScripts

</body>

</html>
