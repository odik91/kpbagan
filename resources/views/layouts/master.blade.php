<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kp Karet - @if(isset($title)) {{ $title }} @else {{ 'Beranda' }} @endif</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset("image/kp-karet-32.png")}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset("template/lib/owlcarousel/assets/owl.carousel.min.css")}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("template/css/style.css")}}" rel="stylesheet">
    @stack('addon-header')
</head>

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset("template/lib/easing/easing.min.js")}}"></script>
    <script src="{{asset("template/lib/owlcarousel/owl.carousel.min.js")}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset("template/mail/jqBootstrapValidation.min.js")}}"></script>
    <script src="{{asset("template/mail/contact.js")}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset("template/js/main.js")}}"></script>

    @stack('addon-script')
</body>

</html>
