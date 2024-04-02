<?php
$ac = 3;
include './validation.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Add Business | Shopeemart - Admin </title>

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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
        <style>
            body{
                text-transform: capitalize;
            }
            .select2-container--default .select2-selection--multiple
            {
                display: block;
                width: 100%;
                padding: 0.6125rem 0rem;
                font-size: .875rem;
                font-weight: 400;
                line-height: 1.5;
                color: #1e2022;
                background-color: #eee;
                background-clip: padding-box;
                border: 0.0625rem solid rgba(231,234,243,.7);
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: 0.3125rem;
                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
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
                                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                                </ol>
                            </nav>

                            <h1 class="page-header-title">Business</h1>
                        </div>
                        <!-- End Col -->

                        <!--                        <div class="col-sm-auto">
                                                    <a class="btn btn-primary" onclick="$('#addCityModal').modal('show');">
                                                        <i class="bi-person-plus-fill me-1"></i> Add City
                                                    </a>
                                                    <a class="btn btn-primary" onclick="$('#addCategoryModal').modal('show');">
                                                        <i class="bi-person-plus-fill me-1"></i> Add Category
                                                    </a>
                                                </div>-->
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Page Header -->

                <div class="row justify-content-lg-center card p-3">
                    <div class="col-lg-12">
                        <form method="post" action="./custom/rest/request.php">     
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $cu_ci_si = $conn->link->query("SELECT * FROM tb_business_details where bd_id=" . $_REQUEST['id']);
                                $cu_si = $cu_ci_si->fetch(PDO::FETCH_ASSOC);                                
                                $cu_ci = $conn->link->query("SELECT * FROM tb_buisness_category where bca_bd_id=" . $cu_si['bd_id']);
                                $cu_ci_rec = $cu_ci->fetchAll(PDO::FETCH_ASSOC);
                                $bcArr = [];
                                foreach ($cu_ci_rec as $ci) {
                                    array_push($bcArr, $ci['bca_bc_id']);
                                }
                            }
                            ?>
                            <input type="hidden" readonly class="form-control" id="bd_id" name="bd_id" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_id'] : "" ?>">
                            <div class="row">     
                                <div class="col-sm-4">
                                    <label for="bd_url" class="form-label">Business URL</label>
                                    <input type="text" readonly class="form-control" id="bd_url" name="bd_url" aria-describedby="buisnessurl" value="https://hailey.com/">
                                    <div id="buisnessurl" class="form-text">Your Business URL.</div>
                                </div> 
                                <div class="col-sm-4">
                                    <label for="bd_business_name" class="form-label">Business Name</label>
                                    <input type="text" required class="form-control" id="bd_business_name" name="bd_business_name" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                </div>
                                <div class="col-sm-4">
                                    <label for="bd_city" class="form-label">City</label>
                                    <select id="bd_city" required name="bd_city" class="form-select" autocomplete="off">
                                        <option value="">Select City</option>
                                    </select>
                                </div> 

                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <label for="bd_category" class="form-label">Category</label>
                                    <select id="bd_category" name="bd_category" class="form-select" autocomplete="off"  onchange="fetchSubCategory($(this).val())">
                                        <option value="">Select Category</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="bd_sub_category" class="form-label">Multiple Category</label><br/>
                                    <select class="js-example-basic-multiple form-select" id="bd_sub_category" name="bd_sub_category[]" multiple="multiple">

                                    </select>
                                </div>            
                                <div class="col-sm-4">
                                    <label for="bd_meta_title" class="form-label">Meta Title</label>
                                    <input type="text" required class="form-control" id="bd_meta_title" name="bd_meta_title" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_meta_title'] : "" ?>">
                                </div>                                  
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <label for="bd_meta_keywords" class="form-label">Meta Keywords</label>
                                    <input type="text" required class="form-control" id="bd_meta_keywords" name="bd_meta_keywords" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_meta_keywords'] : "" ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="bd_meta_description" class="form-label">Meta Description</label>
                                    <textarea type="text" required class="form-control" id="bd_meta_description" name="bd_meta_description" ><?= isset($_REQUEST['id']) ? $cu_si['bd_meta_description'] : "" ?></textarea>
                                </div>

                            </div>
                            <div class="d-flex justify-content-end gap-3">                                
                                <button id="<?= isset($_REQUEST['id']) ? "update_business" : "save_buisness" ?>" name="<?= isset($_REQUEST['id']) ? "update_business" : "save_buisness" ?>" value="<?= isset($_REQUEST['id']) ? "update_business" : "save_buisness" ?>" type="submit" class="btn btn-primary"><?= isset($_REQUEST['id']) ? "Update" : "Save" ?></button>
                            </div>
                        </form>                        
                    </div>
                </div>
                <!-- End Row -->
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

        <script src="./assets/vendor/hs-file-attach/dist/hs-file-attach.min.js"></script>
        <script src="./assets/vendor/hs-step-form/dist/hs-step-form.min.js"></script>
        <script src="./assets/vendor/hs-add-field/dist/hs-add-field.min.js"></script>
        <script src="./assets/vendor/imask/dist/imask.min.js"></script>
        <script src="./assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- JS Front -->
        <script src="./assets/js/theme.min.js"></script>
        <script src="./assets/js/hs.theme-appearance-charts.js"></script>
        <!-- JS Plugins Init. -->
        <script src="./assets/js/initialization.js"></script>
        <!-- Style Switcher JS -->
        <script src="./assets/js/styleswitcher.js"></script>
        <!-- End Style Switcher JS -->
        <script>
                                        var bcArr = [];
<?php
if (isset($_REQUEST['id'])) {
    echo "var bd_city=" . $cu_si['bd_city'] . ";";
    echo "var bd_category=" . $cu_si['bd_category'] . ";";
    echo "bcArr=" . json_encode($bcArr) . ";";
}
?>
                                        if (typeof bd_category === 'number') {
                                            fetchSubCategory(bd_category);
                                        }
                                        function fetchCity() {
                                            var $retCom = $.ajax({
                                                url: './custom/rest/request.php',
                                                type: 'POST',
                                                data: {fetch_city: 'true'},
                                                async: false
                                            }).responseText;
                                            $obj = JSON.parse($retCom);
                                            $city = "";
                                            $cityTable = "";
                                            $obj.forEach(function (e, i) {
                                                if (bd_city)
                                                    $city += `<option ${bd_city == e.bc_id ? "selected" : ""} value='${e.bc_id}'>${e.bc_name}</option>`;
                                                else
                                                    $city += `<option value='${e.bc_id}'>${e.bc_name}</option>`;
                                                $cityTable += `<tr>
                                                    <td>${i + 1}</td>
                                                    <td>${e.bc_name}</td>
                                                    <td>                                            
                                                        <i class="bi bi-pencil-square"></i>
                                                        <i class="bi bi-trash"></i>
                                                    </td>
                                                </tr>`;
                                            });
                                            $("#cityTable").html($cityTable);
                                            $("#bd_city").html("<option value=''>Select City</option>" + $city);
                                        }

                                        function fetchCategory() {
                                            var $retCom = $.ajax({
                                                url: './custom/rest/request.php',
                                                type: 'POST',
                                                data: {fetch_category: 'true'},
                                                async: false
                                            }).responseText;
                                            $obj = JSON.parse($retCom);
                                            $cat = "";
                                            $catTable = "";
                                            $obj.forEach(function (e, i) {
                                                if (bd_category)
                                                    $cat += `<option ${bd_category == e.ca_id ? "selected" : ""} value='${e.ca_id}'>${e.ca_name}</option>`;
                                                else
                                                    $cat += `<option value='${e.ca_id}'>${e.ca_name}</option>`;
                                                $catTable += `<tr>
                                                    <td>${i + 1}</td>
                                                    <td>${e.ca_name}</td>
                                                    <td>                                            
                                                        <i class="bi bi-pencil-square"></i>
                                                        <i class="bi bi-trash"></i>
                                                    </td>
                                                </tr>`;
                                            });
                                            $("#bd_category").html("<option value=''>Select Category</option>" + $cat);
                                            $("#catTable").html($catTable);
                                        }

                                        function fetchSubCategory(bd_category) {
                                            console.log(bcArr, "sub category");
                                            var $retCom = $.ajax({
                                                url: './custom/rest/request.php',
                                                type: 'POST',
                                                data: {fetch_sub_category: 'true', bd_category: bd_category},
                                                async: false
                                            }).responseText;
                                            $obj = JSON.parse($retCom);
                                            $subcat = "";
                                            $obj.forEach(function (e) {
                                                var selected = bcArr.includes(e.ca_id) ? 'selected' : '';
                                                $subcat += `<option  ${selected} value='${e.ca_id}'>${e.ca_name}</option>`;
                                            });
                                            $("#bd_sub_category").html("<option value=''>Select Sub Category</option>" + $subcat);
                                        }
                                        $(document).ready(function () {
                                            $('.js-example-basic-multiple').select2();
                                            fetchCategory();
                                            fetchCity();
                                            var $retState = $.ajax({
                                                url: './custom/rest/request.php',
                                                type: 'POST',
                                                data: {fetch_state: 'true'},
                                                async: false
                                            }).responseText;

                                            $obj = JSON.parse($retState);
                                            $state = "";

                                            $obj.forEach(function (e) {
                                                $state += `<option value='${e.id}'>${e.name}</option>`;
                                            });
                                            $("#bd_state").html("<option value=''>Select State</option>" + $state);

                                        });

        </script>
        <script>
<?php
if (isset($_SESSION['msg'])) {
    ?>
                alert("<?= $_SESSION['msg'] ?>");
    <?php
}
unset($_SESSION['msg']);
?>
        </script>
    </body>
</html>