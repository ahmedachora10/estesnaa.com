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

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    @stack('component-styles')

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- Scripts -->
    {{-- @vite('resources/css/app.css') --}}



    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}">
        <style>
            .me-2 {
                margin-left: .5rem !important;
            }

            .ms-2 {
                margin-right: .5rem !important;
            }

            .pe-2 {
                padding-left: .5rem !important;
            }

            .ms-2 {
                padding-right: .5rem !important;
            }

            .me-3 {
                margin-left: 1rem !important;
            }

            .ms-3 {
                margin-right: 1rem !important;
            }

            .ps-3 {
                padding-right: 1rem !important;
            }

            .pe-3 {
                padding-left: 1rem !important;
            }

            .ms-auto {
                margin-right: auto !important;
                margin-left: 0 !important;
            }

            .me-auto {
                margin-left: auto !important;
                margin-right: 0 !important;
            }

            .flex-row {
                flex-direction: row-reverse !important;
            }

            .flex-row-reverse {
                flex-direction: row !important;
            }

            aside a.menu-link {
                font-weight: bold !important;
            }


            .alert-dismissible .btn-close {
                top: 2px !important;
                left: 6px !important;
                right: unset !important;
            }

            .dropdown-menu-end[data-bs-popper] {
                left: 0 !important;
                right: auto !important;
                text-align: right;
            }


            @media (min-width: 1200px) {

                .layout-menu-fixed .layout-menu,
                .layout-menu-fixed-offcanvas .layout-menu {
                    right: 0 !important;
                    left: unset !important;
                }

                .layout-menu-fixed:not(.layout-menu-collapsed) .layout-page,
                .layout-menu-fixed-offcanvas:not(.layout-menu-collapsed) .layout-page {
                    padding-right: 16.25rem;
                    padding-left: 0 !important;
                }

            }
        </style>
    @endif

    @stack('styles')

    @livewireStyles
</head>

<body class="font-sans antialiased">

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- sidebar -->
            @include('layouts.admin.sidebar')
            <!-- / sidebar -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('layouts.admin.navbar')
                <!-- / Navbar -->

                <div class="content-wrapper">

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @if (session()->has('success'))
                            <div class="messages alert alert-success alert-dismissible" role="alert">
                                {{ session()->get('success') }}

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif


                        {{ $slot }}
                    </div>
                    <!-- / Content -->


                    <!-- Footer -->
                    @include('layouts.admin.footer')
                    <!-- / Footer -->

                    <div class="layout-overlay layout-menu-toggle"></div>

                </div>

            </div>
            <!-- / Layout container -->

        </div>
    </div>

    <x-dashboard.toast />

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->

    @stack('component-scripts')

    {{-- @vite('resources/js/app.js') --}}
    <script src="{{ asset('build/assets/app.js') }}"></script>

    <script>
        window.addEventListener('toast', event => {
            const toast = $('.toast');
            const target = event.detail;
            toast.find('.title').text(target.title);
            toast.find('.toast-body').text(target.content);
            toast.removeClass('hide');
            toast.addClass('show');

            console.log(target);

            $('.modal .btn-close').trigger('click');

            if ($('#user-profit-amount').length) {
                $('#user-profit-amount').find('h3.card-title').text('$' + target.updatedAmount);
            }
        });
    </script>

    @stack('scripts')

    @livewireScripts


</body>

</html>
