<?php
$ac = 2;
include './validation.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Business | Shopeemart - Admin</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="./favicon.ico">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

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

        <?php include './includes/header.php'; ?>

        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <!-- Navbar Vertical -->

        <?php include './includes/navbar.php'; ?>

        <main id="content" role="main" class="main">
            <!-- Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-sm mb-2 mb-sm-0">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-no-gutter">
                                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pages</a></li>
                                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Business</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Overview</li>
                                </ol>
                            </nav>

                            <h1 class="page-header-title">Business</h1>
                        </div>
                        <!-- End Col -->

                        <div class="col-sm-auto">
                            <a class="btn btn-primary" href="./add-buisness.php">
                                <i class="bi-person-plus-fill me-1"></i> Add Business Details
                            </a>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Page Header -->

                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header card-header-content-md-between">
                        <div class="mb-2 mb-md-0">
                            <form>
                                <!-- Search -->
                                <div class="input-group input-group-merge input-group-flush">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="bi-search"></i>
                                    </div>
                                    <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                                </div>
                                <!-- End Search -->
                            </form>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <div class="table-responsive datatable-custom position-relative">
                        <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                               "columnDefs": [{
                               "targets": [0, 7],
                               "orderable": false
                               }],
                               "order": [],
                               "info": {
                               "totalQty": "#datatableWithPaginationInfoTotalQty"
                               },
                               "search": "#datatableSearch",
                               "entries": "#datatableEntries",
                               "pageLength": 15,
                               "isResponsive": false,
                               "isShowPaging": false,
                               "pagination": "datatablePagination"
                               }'>
                            <thead class="thead-light">
                                <tr>
                                    <th>Business Name</th>
                                    <th>City</th>
                                    <th>Category</th>
                                    <th>Multiple Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody style="text-transform: capitalize;">
                                <?php
                                $cu = $conn->link->query("SELECT * FROM tb_business_details tb JOIN tb_buisness_cities tbc ON tb.bd_city=tbc.bc_id JOIN tb_category tca ON tb.bd_category=tca.ca_id");
                                $cu_rec = $cu->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($cu_rec as $cr) {
                                    $sc = $conn->link->query("SELECT * FROM tb_buisness_category tbc JOIN tb_category tc ON tbc.bca_bc_id=tc.ca_id where bca_bd_id={$cr['bd_id']}");
                                    $sc_rec = $sc->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <tr>
                                        <td><?= $cr['bd_business_name'] ?></td>
                                        <td><?= $cr['bc_name'] ?></td>
                                        <td><?= $cr['ca_name'] ?></td>
                                        <td>
                                            <?php
                                            foreach ($sc_rec as $subcategory) {
                                                ?>
                                                <span class="badge bg-primary"><?= $subcategory['ca_name'] ?></span>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td>                                            
                                            <a href="./add-buisness.php?id=<?= $cr['bd_id'] ?>&action=edit"><i class="bi bi-pencil-square"></i></a>
                                            <a href="./custom/rest/request.php?id=<?= $cr['bd_id'] ?>&action=delete_buisness_details"><i class="bi bi-eye-fill"></i></a>
                                            <i class="bi bi-trash"></i>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                </div>
                <!-- End Card -->
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

        <script src="./assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js"></script>
        <script src="./assets/vendor/hs-file-attach/dist/hs-file-attach.min.js"></script>
        <script src="./assets/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js"></script>
        <script src="./assets/vendor/hs-step-form/dist/hs-step-form.min.js"></script>
        <script src="./assets/vendor/hs-counter/dist/hs-counter.min.js"></script>
        <script src="./assets/vendor/appear/dist/appear.min.js"></script>
        <script src="./assets/vendor/imask/dist/imask.min.js"></script>
        <script src="./assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
        <script src="./assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="./assets/vendor/datatables.net.extensions/select/select.min.js"></script>
        <script src="./assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="./assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="./assets/vendor/jszip/dist/jszip.min.js"></script>
        <script src="./assets/vendor/pdfmake/build/pdfmake.min.js"></script>
        <script src="./assets/vendor/pdfmake/build/vfs_fonts.js"></script>
        <script src="./assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="./assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="./assets/vendor/datatables.net-buttons/js/buttons.colVis.min.js"></script>

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