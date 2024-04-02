<?php
$ac = 4;
include './validation.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Add Business City | Shopeemart - Admin </title>

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
        <style>
            body{
                text-transform: capitalize;
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
                                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">City</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                                </ol>
                            </nav>

                            <h1 class="page-header-title">City</h1>
                        </div>                        
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Page Header -->

                <div class="row justify-content-lg-center card p-3">
                    <div class="col-lg-12">
                        <?php
                        if (isset($_REQUEST['id'])) {
                            $cu_ci_si = $conn->link->query("SELECT * FROM tb_buisness_cities where bc_id=" . $_REQUEST['id']);
                            $cu_si = $cu_ci_si->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <input required type="hidden" class="form-control" id="bc_id" name="bc_id"  value="<?= isset($_REQUEST['id']) ? $cu_si['bc_id'] : "" ?>">
                        <div class="row mt-3"> 
                            <div class="col-sm-6">                                
                                <div class="col-sm-12">
                                    <label for="bc_name" class="form-label">City</label>
                                    <input required type="text" class="form-control" id="bc_name" name="bc_name"  value="<?= isset($_REQUEST['id']) ? $cu_si['bc_name'] : "" ?>">
                                </div> 
                                <br/>
                                <button onclick="addNewCity()" type="button" id="<?= isset($_REQUEST['id']) ? 'update' : "save" ?>_cities" name="<?= isset($_REQUEST['id']) ? 'update' : "save" ?>_cities" value="<?= isset($_REQUEST['id']) ? 'update' : "save" ?>_cities" class="btn btn-primary"><?= isset($_REQUEST['id']) ? 'Update' : "Save" ?></button>
                            </div>
                            <div class="col-sm-6">
                                <div style="height: 400px;overflow-y: auto;">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>                                    
                                                <th>Sr.No.</th>
                                                <th>City</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cityTable">
                                            <?php
                                            $cu = $conn->link->query("SELECT * FROM tb_buisness_cities");
                                            $cu_rec = $cu->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($cu_rec as $i => $cr) {
                                                ?>
                                                <tr>
                                                    <td><?= $i + 1 ?></td>
                                                    <td><?= $cr['bc_name'] ?></td>
                                                    <td>                                            
                                                        <a href="./city.php?id=<?= $cr['bc_id'] ?>&action=edit"><i class="bi bi-pencil-square"></i></a>
                                                        <a href="./city.php?id=<?= $cr['bc_id'] ?>&action=delete"><i class="bi bi-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                            
                        </div>                       
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
                                            $city += `<option value='${e.bc_id}'>${e.bc_name}</option>`;
                                            $cityTable += `<tr>
                                                    <td>${i + 1}</td>
                                                    <td>${e.bc_name}</td>
                                                    <td>                                            
                                                        <a href="./city.php?id=${e.bc_id}&action=edit"><i class="bi bi-pencil-square"></i></a>
                                                        <a href="./custom/rest/request.php?id=${e.bc_id}&action=delete_city"><i class="bi bi-trash"></i></a>
                                                    </td>
                                                </tr>`;
                                        });
                                        $("#cityTable").html($cityTable);
                                    }
                                    function addNewCity() {
//                                        alert();
                                        if ($("#bc_name").val() == "") {
                                            alert("Please enter city name");
                                            return;
                                        }
                                        var $retCom = $.ajax({
                                            url: './custom/rest/request.php',
                                            type: 'POST',
                                            data: {add_city: 'true', bc_name: $("#bc_name").val(), bc_id: $("#bc_id").val()},
                                            async: false
                                        }).responseText;
                                        $obj = JSON.parse($retCom);
                                        if (!$obj.status) {
                                            alert($obj.msg);
                                            return;
                                        } else {
                                            alert($obj.msg);
                                        }
                                        fetchCity();
                                        $("#ca_name").val("");
//                                        $("#addCategoryModal").modal("hide");
                                    }


                                    $(document).ready(function () {
                                        fetchCity();


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