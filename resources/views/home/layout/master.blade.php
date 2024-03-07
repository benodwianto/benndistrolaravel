<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BENN | DISTRO</title>
    <meta name="description"
        content="Website For Bussines Sablon">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/morvin/dist/assets/images/bennlogo.png">

    <!-- Place favicon.ico in the root directory -->

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

    <!-- all css here -->
    <!-- bootstrap v5 css -->
    <link rel="stylesheet" href="/hurst/css/bootstrap.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="/hurst/css/animate.min.css">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="/hurst/css/jquery-ui.min.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="/hurst/css/meanmenu.min.css">
    <!-- nivo-slider css -->
    <link rel="stylesheet" href="/hurst/lib/css/nivo-slider.css">
    <link rel="stylesheet" href="/hurst/lib/css/preview.css">
    <!-- slick css -->
    <link rel="stylesheet" href="/hurst/css/slick.min.css">
    <!-- lightbox css -->
    <link rel="stylesheet" href="/hurst/css/lightbox.min.css">
    <!-- material-design-iconic-font css -->
    <link rel="stylesheet" href="/hurst/css/material-design-iconic-font.css">
    <!-- All common css of theme -->
    <link rel="stylesheet" href="/hurst/css/default.css">
    <!-- style css -->
    <link rel="stylesheet" href="/hurst/style.css">
    <!-- shortcode css -->
    <link rel="stylesheet" href="/hurst/css/shortcode.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="/hurst/css/responsive.css">
    <!-- modernizr css -->
    <script src="/hurst/js/vendor/modernizr-3.11.2.min.js"></script>

    @yield('css')
    <!-- Bootstrap core icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    {{-- <link href="/css/bootstrap.min.css" rel="stylesheet"> --}}

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

</head>

<body>
    <!-- WRAPPER START -->
    <div class="wrapper">

        <!-- HEADER-AREA START -->
        @include('home.layout.header')
        <!-- HEADER-AREA END -->
        <!-- Mobile-menu start -->
        @include('home.layout.sidemenu')
        <!-- Mobile-menu end -->
        <!-- SLIDER-BANNER-AREA START -->
        @yield('content')
        <!-- SUBSCRIVE-AREA END -->
        <!-- FOOTER START -->
        <br>

        <!-- FOOTER -->
        <footer
        class="text-center text-lg-start text-dark mb-1"
        style="background-color: #ECEFF1"
        >
        <!-- Section: Social media -->
        <section
        class="d-flex justify-content-between p-4 text-white"
        style="background-color: #90e3c6"
        >
        <!-- Left -->
        <div class="me-5">
        <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
        <a href="https://www.instagram.com/bendwwta/" class="text-white">
        <i class="bi bi-instagram fs-5 p-1 rounded bg-primary"></i></i>
        </a>
        <a href="" class="text-white ">
        <i class="bi bi-x fs-5 p-1 rounded bg-dark"></i></i>
        </a>
        <a href="https://www.youtube.com/?hl=ID" class="text-white ">
        <i class="bi bi-youtube fs-5 p-1 rounded bg-danger"></i>
        </a>
        <a href="https://web.facebook.com/beno.dwianto.39" class="text-white ">
        <i class="bi bi-facebook fs-5 p-1 rounded bg-primary"></i></i></i>
        </a>
        <a href="https://www.linkedin.com/in/beno-dwianto-b9372a294/" class="text-white ">
        <i class="bi bi-linkedin fs-5 p-1 rounded bg-info"></i></i>
        </a>
        <a href="https://github.com/benodwianto" class="text-white ">
        <i class="bi bi-github fs-5 p-1 rounded bg-dark"></i>
        </a>
        </div>
        <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
        <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
        <!-- Content -->
        <h6 class="text-uppercase fw-bold">BENN | DISTRO</h6>
        <hr
            class="mb-4 mt-0 d-inline-block mx-auto"
            style="width: 60px; background-color: #7c4dff; height: 2px"
            />
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.327480070281!2d100.3939377748029!3d-0.8987431990925572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b87d9cd1e507%3A0xa6d1145c1072b362!2sPerumahan%20Bumi%20Minang%201!5e0!3m2!1sid!2sid!4v1705244613518!5m2!1sid!2sid" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <!-- Links -->
        <h6 class="text-uppercase fw-bold"></h6>
        
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
        <!-- Links -->
        <h6 class="text-uppercase fw-bold">Links</h6>
        <hr
            class="mb-4 mt-0 d-inline-block mx-auto"
            style="width: 60px; background-color: #7c4dff; height: 2px"
            />
        <p>
            <a href="#!" class="text-dark">benodwianto@gmail.com</a>
        </p>
        <p>
            <a href="#!" class="text-dark">Become an Affiliate</a>
        </p>
        <p>
            <a href="#!" class="text-dark">Shipping Rates</a>
        </p>
        <p>
            <a href="#!" class="text-dark">Help</a>
        </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
        <!-- Links -->
        <h6 class="text-uppercase fw-bold">Contact</h6>
        <hr
            class="mb-4 mt-0 d-inline-block mx-auto"
            style="width: 60px; background-color: #7c4dff; height: 2px"
            />
        <p><i class="fas fa-home mr-3"></i> Padang, PD 1000, ID</p>
        <p><i class="fas fa-envelope mr-3"></i> benndistro@gmail.com</p>
        <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
        <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
        </div>
        <!-- Grid row -->
        </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.2)"
        >
        © 2024 Copyright:
        <a class="text-dark" href="/"
        >BennDistro.com</a
        >
        </div>
        <!-- Copyright -->
        </footer>
        <!-- Footer -->
        </div>
        <!-- End of .container -->
        <!-- Footer -->
        <!-- FOOTER END -->

    </div>

    <!-- WRAPPER END -->

    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="/hurst/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/hurst/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- bootstrap js -->
    <script src="/hurst/js/bootstrap.bundle.min.js"></script>
    <!-- jquery.meanmenu js -->
    <script src="/hurst/js/jquery.meanmenu.js"></script>
    <!-- slick.min js -->
    <script src="/hurst/js/slick.min.js"></script>
    <!-- jquery.treeview js -->
    <script src="/hurst/js/jquery.treeview.js"></script>
    <!-- lightbox.min js -->
    <script src="/hurst/js/lightbox.min.js"></script>
    <!-- jquery-ui js -->
    <script src="/hurst/js/jquery-ui.min.js"></script>
    <!-- jquery.nivo.slider js -->
    <script src="/hurst/lib/js/jquery.nivo.slider.js"></script>
    <script src="/hurst/lib/home.js"></script>
    <!-- jquery.nicescroll.min js -->
    <script src="/hurst/js/jquery.nicescroll.min.js"></script>
    <!-- countdon.min js -->
    <script src="/hurst/js/countdon.min.js"></script>
    <!-- wow js -->
    <script src="/hurst/js/wow.min.js"></script>
    <!-- plugins js -->
    <script src="/hurst/js/plugins.js"></script>
    <!-- main js -->
    <script src="/hurst/js/main.js"></script>

    @yield('js')
</body>

</html>
