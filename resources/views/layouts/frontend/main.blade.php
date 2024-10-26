<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>@yield('title') || {{ config('app.name') }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets') }}/images/logo_ngp_2.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/fontawesome-all.min.css">
    <!-- Magnific popup css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/magnific-popup.css.css">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/slick.css">
    <!-- line awesome -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/line-awesome.min.css">
    <!-- Image Uploader -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/image-uploader.min.css">
    <!-- jQuery Ui Css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/jquery-ui.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/main.css">

</head>

<body>

    <!--==================== Preloader Start ====================-->
    <div class="preloader">
        <div class="loader"></div>
    </div>
    <!--==================== Preloader End ====================-->

    <!--==================== Overlay Start ====================-->
    <div class="overlay"></div>
    <!--==================== Overlay End ====================-->

    <!--==================== Sidebar Overlay End ====================-->
    <div class="side-overlay"></div>
    <!--==================== Sidebar Overlay End ====================-->

    <!-- ==================== Scroll to Top End Here ==================== -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- ==================== Scroll to Top End Here ==================== -->

    @include('layouts.frontend.mobile_menu')

    <main class="body-bg">
        @include('layouts.frontend.header')

        @yield('content')

        @include('layouts.frontend.footer')

    </main>

    <!-- Jquery js -->
    <script src="{{ asset('frontend/assets') }}/js/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap Bundle Js -->
    <script src="{{ asset('frontend/assets') }}/js/boostrap.bundle.min.js"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('frontend/assets') }}/js/magnific-popup.min.js"></script>
    <!-- Slick js -->
    <script src="{{ asset('frontend/assets') }}/js/slick.min.js"></script>
    <!-- Counter Up Js -->
    <script src="{{ asset('frontend/assets') }}/js/counterup.min.js"></script>
    <!-- Marquee text slider -->
    <script src="{{ asset('frontend/assets') }}/js/jquery.marquee.min.js"></script>
    <!-- Image Uploader -->
    <script src="{{ asset('frontend/assets') }}/js/image-uploader.min.js"></script>
    <!-- jQuery Ui Css -->
    <script src="{{ asset('frontend/assets') }}/js/jquery-ui.min.js"></script>

    <!-- main js -->
    <script src="{{ asset('frontend/assets') }}/js/main.js"></script>

</body>

</html>
