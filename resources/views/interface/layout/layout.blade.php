<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Active Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('active/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('active/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <link href="{{ asset('active/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('active/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('active/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('active/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('active/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    @yield('style')
    <link href="{{ asset('active/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    @include('interface.inc.header')
    @yield('content')
    @include('interface.inc.footer')

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i>
    </a>

    <div id="preloader"></div>

    <script src="{{ asset('active/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('active/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('active/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('active/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('active/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('active/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('active/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('active/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    @yield('script')

    <script src="{{ asset('active/assets/js/main.js') }}"></script>

</body>

</html>