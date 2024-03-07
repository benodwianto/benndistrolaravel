<!doctype html>
<html lang="en">

    <head>


        <meta charset="utf-8" />
        <title>BENN | DISTRO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="aing" name="beno" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/morvin/dist/assets/images/bennlogo.png">

        @yield('css')

        <!-- Bootstrap Css -->
        <link href="/morvin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/morvin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/morvin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


    </head>


    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('admin.layouts.master_topnav')

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layouts.master_sidenav')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    @yield('content')
                </div>
                <!-- End Page-content -->

                {{-- <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Morvin.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                </div>
                            </div>
                        </div>
                    </div>
                </footer> --}}
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="/morvin/dist/assets/libs/jquery/jquery.min.js"></script>
        <script src="/morvin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/morvin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/morvin/dist/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/morvin/dist/assets/libs/node-waves/waves.min.js"></script>

        @yield('js')

        <script src="/morvin/dist/assets/js/app.js"></script>

    </body>
</html>
