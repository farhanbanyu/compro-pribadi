<!doctype html>
<html lang="en">

<head>
    <title>Backend</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Backend">
    <meta name="author" content="WAN">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendor/charts-c3/plugin.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        @font-face {
            font-family: 'simple-Line-Icons';
            src: url("{{ asset('backend') }}/fonts/simple-Line-Icons.eot");
            src: url("{{ asset('backend') }}/fonts/simple-Line-Icons.eot") format("embedded-opentype"), url("{{ asset('backend') }}/fonts/simple-Line-Icons.woff") format("woff"), url("{{ asset('backend') }}/fonts/simple-Line-Icons.ttf") format("truetype"), url("{{ asset('backend') }}/fonts/simple-Line-Icons.svg#Simple-Line-Icons") format("svg");
            font-weight: normal;
            font-style: normal
        }

        @font-face {
            font-family: 'weathericons';
            src: url("{{ asset('backend') }}/fonts/weathericons-regular-webfont.eot");
            src: url("{{ asset('backend') }}/fonts/weathericons-regular-webfont.eot?#iefix") format("embedded-opentype"), url("{{ asset('backend') }}/fonts/weathericons-regular-webfont.woff") format("woff"), url("{{ asset('backend') }}/fonts/weathericons-regular-webfont.ttf") format("truetype"), url("{{ asset('backend') }}/fonts/weathericons-regular-webfont.svg#weathericons-regular-webfontRg") format("svg");
            font-weight: normal;
            font-style: normal
        }
    </style>
    {{-- ICON --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/main.css">
    <style>
        #main-content {
            width: calc(100% - 280px);
            margin-right: unset;
        }

        @media(max-width: 768px) {
            .layout-fullwidth #wrapper #main-content {
                width: 100%;
            }
        }
    </style>
    @stack('css')
    @if (isset($css))
        {{ $css }}
    @endif
</head>

<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="theme-cyan">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{ asset('backend') }}/assets/images/logo-icon.svg" width="48"
                        height="48" alt="Iconic">
                </div>
                <p>Please wait...</p>
            </div>
        </div>

        <!-- Top navbar div start -->
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
                    <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars"></i></button>
                    <a href="{{ route('dashboard') }}" class="ml-3">{{ env('APP_NAME') }}</a>
                </div>

                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ url('logout') }}" class="icon-menu"><i class="fa fa-power-off"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <x-backend.sidebar.div />

        <!-- rightbar icon div -->
        <div class="right_icon_bar d-none">
            <ul>
                <li><a href="app-inbox.html"><i class="fa fa-envelope"></i></a></li>
                <li><a href="app-chat.html"><i class="fa fa-comments"></i></a></li>
                <li><a href="app-calendar.html"><i class="fa fa-calendar"></i></a></li>
                <li><a href="file-dashboard.html"><i class="fa fa-folder"></i></a></li>
                <li><a href="app-contact.html"><i class="fa fa-id-card"></i></a></li>
                <li><a href="blog-list.html"><i class="fa fa-globe"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fa fa-plus"></i></a></li>
                <li><a href="javascript:void(0);" class="right_icon_btn"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>

        <!-- mani page content body part -->
        <div id="main-content">
            {{ $slot }}
        </div>

    </div>
    <!-- Javascript -->
    <script src="{{ asset('backend') }}/assets/bundles/libscripts.bundle.js"></script>
    <script src="{{ asset('backend') }}/assets/bundles/vendorscripts.bundle.js"></script>

    <!-- page vendor js file -->
    <script src="{{ asset('backend') }}/assets/vendor/toastr/toastr.js"></script>
    <script src="{{ asset('backend') }}/assets/bundles/c3.bundle.js"></script>

    <!-- page js file -->
    <script src="{{ asset('backend') }}/assets/bundles/mainscripts.bundle.js"></script>
    <script src="{{ asset('backend/js/index.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('js')
    @if (isset($js))
        {{ $js }}
    @endif
</body>

</html>
