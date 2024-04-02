<?php
$ac = 1;
include './validation.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Dashboard | ADSP - Admin </title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="./favicon.ico">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

        <link rel="stylesheet" href="./assets/vendor/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="./assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css">

        <!-- CSS Front Template -->

        <link rel="preload" href="./assets/css/theme.min.css" data-hs-appearance="default" as="style">
        <link rel="preload" href="./assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

        <style data-hs-appearance-onload-styles>
            *
            {
                transition: unset !important;
            }

            body
            {
                opacity: 0;
            }
        </style>
        <script src="./assets/js/indexscript.js"></script>
    </head>

    <body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

        <script src="./assets/js/hs.theme-appearance.js"></script>

        <script src="./assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

        <!-- ========== HEADER ========== -->

        <?php include './includes/header.php' ?>

        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <!-- Navbar Vertical -->

        <?php include './includes/navbar.php' ?>

        <!-- End Navbar Vertical -->

        <main id="content" role="main" class="main">
            <!-- Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="page-header-title">Dashboard</h1>
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                            <a class="btn btn-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#inviteUserModal">
                                <i class="bi-person-plus-fill me-1"></i> Invite users
                            </a>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Page Header -->

                <!-- Stats -->
                <div class="row">
                    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                        <a class="card card-hover-shadow" href="#">
                            <div class="card-body">
                                <i class="bi bi-person-square" style="font-size: 2em;"></i>
                                <h4 class="mt-1">Total Customer</h4>
                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-6">
                                        <h2 class="card-title text-inherit">29.4%</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                        <a class="card card-hover-shadow" href="#">
                            <div class="card-body">
                                <i class="bi bi-person-square" style="font-size: 2em;"></i>
                                <h4 class="mt-1">Total Silvered Customer</h4>
                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-6">
                                        <h2 class="card-title text-inherit">29.4%</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                        <a class="card card-hover-shadow" href="#">
                            <div class="card-body">
                                <i class="bi bi-person-square" style="font-size: 2em;"></i>
                                <h4 class="mt-1">Total Gold Customer</h4>
                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-6">
                                        <h2 class="card-title text-inherit">29.4%</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                        <a class="card card-hover-shadow" href="#">
                            <div class="card-body">
                                <i class="bi bi-person-square" style="font-size: 2em;"></i>
                                <h4 class="mt-1">Total Platinum Customer</h4>
                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-6">
                                        <h2 class="card-title text-inherit">29.4%</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Content -->

            <!-- Footer -->

            <?php include './includes/footer.php'; ?>

            <!-- End Footer -->
        </main>
        <!-- ========== END MAIN CONTENT ========== -->



        <!-- JS Global Compulsory  -->
        <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="./assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
        <script src="./assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

        <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="./assets/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js"></script>
        <script src="./assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>
        <script src="./assets/vendor/daterangepicker/moment.min.js"></script>
        <script src="./assets/vendor/daterangepicker/daterangepicker.js"></script>
        <script src="./assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
        <script src="./assets/vendor/clipboard/dist/clipboard.min.js"></script>
        <script src="./assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="./assets/vendor/datatables.net.extensions/select/select.min.js"></script>
        <!-- JS Front -->
        <script src="./assets/js/theme.min.js"></script>
        <script src="./assets/js/hs.theme-appearance-charts.js"></script>
        <!-- JS Plugins Init. -->
        <script src="./assets/js/initialization.js"></script>
        <!-- Style Switcher JS -->
        <script src="./assets/js/styleswitcher.js"></script>
        <!-- End Style Switcher JS -->
    </body>
</html>

