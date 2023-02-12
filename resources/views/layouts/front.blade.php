<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Style -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet"> --}}

    <!-- bootstrap css -->
    {{-- <link rel = "stylesheet" href = "{{ asset('frontend/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}"> --}}



    <!-- Bootstrap -->
    {{-- <link type="text/css" rel="stylesheet" href="{{ asset('frontend/new/css/bootstrap.min.css') }}"/> --}}

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/new/css/slick.css') }}"/>
    {{-- <link type="text/css" rel="stylesheet" href="{{ asset('frontend/new/css/slick-theme.css') }}"/> --}}

    <!-- nouislider -->
    {{-- <link type="text/css" rel="stylesheet" href="{{ asset('frontend/new/css/nouislider.min.css') }}"/> --}}

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('frontend/new/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/new/css/style.css') }}"/>

    <!-- Bootstrap4 files-->
    {{-- <link href="{{ asset('frontend/bootstrap-5.2.1-dist/css/bootstrap.min.css') }}" rel="stylesheet"> --}}

    <!-- Font awesome 5 -->
    <link href="{{ asset('frontend/fonts/fontawesome/css/all.min.css') }}" type="text/css" rel="stylesheet">
    <!-- owl -->
    {{-- <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet"> --}}


    <!--     Fonts and icons     -->
    {{-- <link href="{{ asset('frontend/fonts/fontawesome/css/all.css') }}" rel="stylesheet"> --}}


    {{-- free it service --}}

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/owl.carousel.min.css') }}">


    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet"> --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('layouts.inc.frontnav')
                 <!-- navbar -->

                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')
                </div>
                
                <div class="whatsapp-chat">
                    <a href="https://wa.me/22899509353/?text=Je%20suis%20intérssé%20par%20un%20menu" target="_blank">
                        <img src="{{ asset('frontend/WhatsApp_logo.png') }}" alt="whatsapp logo" width="50px" height="50px"></a>
                </div>
                
            </div>
            <!-- Footer -->
            @include('layouts.inc.frontfooter')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
       

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- jquery -->
        <script src="{{ asset('frontend/js/jquery-3.6.1.js') }}"></script>
        <!-- bootstrap js -->
        {{-- <script src = "{{ asset('frontend/bootstrap-5.0.2-dist/js/bootstrap.min.js') }}"></script> --}}


        <!-- jQuery Plugins -->
        <script src="{{ asset('frontend/new/js/jquery.min.js') }}"></script>
        {{-- <script src="{{ asset('frontend/new/js/bootstrap.min.js') }}"></script> --}}
        <script src="{{ asset('frontend/new/js/slick.min.js') }}"></script>
        {{-- <script src="{{ asset('frontend/new/js/nouislider.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('frontend/new/js/jquery.zoom.min.js') }}"></script> --}}
        <script src="{{ asset('frontend/new/js/main.js') }}"></script>




        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/6339f87037898912e96c7d8a/1ged74ucl';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
            </script>
        <!--End of Tawk.to Script-->

            <style>
                a{
                    text-decoration: none !important;
                }
            </style>


    <!-- flash message  -->
        <script src="{{ asset('frontend/js/app.js') }}"></script>
        @yield('script')
    </div>
</body>
</html>
