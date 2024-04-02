<?php
$ac = 5;
include './validation.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Add Business Category | Shopeemart - Admin </title>

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
                                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Business Category</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                                </ol>
                            </nav>

                            <h1 class="page-header-title">Business Category</h1>
                        </div>

                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Page Header -->
                <?php
                if (isset($_REQUEST['id'])) {
                    $cu_ci_si = $conn->link->query("SELECT * FROM tb_category where ca_id=" . $_REQUEST['id']);
                    $cu_si = $cu_ci_si->fetch(PDO::FETCH_ASSOC);
                }
                ?>
                <div class="row justify-content-lg-center card p-3">
                    <form action="./custom/rest/request.php" method="post">
                        <input type="hidden" class="form-control" id="ca_id" name="ca_id" value="<?= isset($_REQUEST['id']) ? $cu_si['ca_id'] : "" ?>">
                        <div class="col-lg-12">
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <label for="bd_url" class="form-label">Business URL</label>
                                    <input value="https://hailey.com/" readonly type="text" class="form-control" id="ca_bd_url" name="ca_bd_url" >
                                </div> 
                                <div class="col-sm-12">
                                    <div class="row mt-3">                                
                                        <div class="col-sm-4">
                                            <label for="ca_name" class="form-label">Category</label>
                                            <input required type="text" class="form-control" id="ca_name" name="ca_name" value="<?= isset($_REQUEST['id']) ? $cu_si['ca_name'] : "" ?>">
                                        </div>                                
                                        <div class="col-sm-4">
                                            <label for="ca_meta_title" class="form-label">Meta Title</label>
                                            <input type="text" required class="form-control" id="ca_meta_title" name="ca_meta_title" value="<?= isset($_REQUEST['id']) ? $cu_si['ca_meta_title'] : "" ?>">
                                        </div> 
                                        <div class="col-sm-4">
                                            <label for="ca_meta_keywords" class="form-label">Meta Keywords</label>
                                            <input type="text" required class="form-control" id="ca_meta_keywords" name="ca_meta_keywords" value="<?= isset($_REQUEST['id']) ? $cu_si['ca_meta_keywords'] : "" ?>">
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <label for="ca_meta_description" class="form-label">Meta Description</label>
                                            <textarea type="text" required class="form-control" id="ca_meta_description" name="ca_meta_description" ><?= isset($_REQUEST['id']) ? $cu_si['ca_meta_description'] : "" ?></textarea>
                                        </div>
                                    </div>
                                    <br/>
                                    <button type="submit" id="<?= isset($_REQUEST['id']) ? "update_category" : "add_category" ?>" name="<?= isset($_REQUEST['id']) ? "update_category" : "add_category" ?>" value="<?= isset($_REQUEST['id']) ? "update_category" : "add_category" ?>" class="btn btn-primary"><?= isset($_REQUEST['id']) ? "Update" : "Save" ?></button>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <div style="height: 400px;overflow-y: auto;">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>                                    
                                                    <th>Sr.No.</th>
                                                    <th>Category</th>
                                                    <th>Meta Title</th>
                                                    <th>Meta Keyword</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="catTable">
                                                <?php
                                                $cu_ci = $conn->link->query("SELECT * FROM tb_category");
                                                $cu_rec_ci = $cu_ci->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($cu_rec_ci as $i => $cr) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $i + 1 ?></td>
                                                        <td><?= $cr['ca_name'] ?></td>
                                                        <td><?= $cr['ca_meta_title'] ?></td>
                                                        <td><?= $cr['ca_meta_keywords'] ?></td>
                                                        <td>                                            
                                                            <a href="./category.php?d=<?= $cr['ca_id'] ?>"><i class="bi bi-pencil-square"></i></a>
                                                            <i class="bi bi-trash"></i>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>                            
                            </div>                       
                        </div>
                    </form>
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
                    $cat += `<option value='${e.ca_id}'>${e.ca_name}</option>`;
                    $catTable += `<tr>
                                                    <td>${i + 1}</td>
                                                    <td>${e.ca_name}</td>
                                                    <td>${e.ca_meta_title}</td>
                                                    <td>${e.ca_meta_keywords}</td>
                                                    <td>                                            
                                                        <a href="./category.php?id=${e.ca_id}&action=edit"><i class="bi bi-pencil-square"></i></a>
                                                        <a href="./custom/rest/request.php?id=${e.ca_id}&action=delete_category"><i class="bi bi-trash"></i></a>
                                                    </td>
                                                </tr>`;
                });
                $("#catTable").html($catTable);
            }
            function addNewCategory() {
                if ($("#ca_name").val() == "") {
                    alert("Please enter category name");
                    return;
                }
                var $retCom = $.ajax({
                    url: './custom/rest/request.php',
                    type: 'POST',
                    data: {add_category: 'true', ca_name: $("#ca_name").val(), ca_meta_title: $("#ca_meta_title").val(), ca_meta_keywords: $("#ca_meta_keywords").val(), ca_meta_description: $("#ca_meta_description").val(), bd_url: $("#bd_url").val()},
                    async: false
                }).responseText;
                $obj = JSON.parse($retCom);
                if (!$obj.status) {
                    alert($obj.msg);
                    return;
                } else {
                    alert($obj.msg);
                }
                fetchCategory();
                $("#ca_name").val("");
                $("#ca_meta_title").val("");
                $("#ca_meta_keywords").val("");
                $("#ca_meta_description").val("");
            }

            $(document).ready(function () {
                fetchCategory();
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