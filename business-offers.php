<?php
if (!isset($_REQUEST['id'])) {
    header('location:./business-profile.php');
}
$ac = 16;
include './validation.php';
if (isset($_REQUEST['id']))
    $_SESSION['ub_id'] = $_REQUEST['id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Business Offers</title>

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
                <div class="row justify-content-lg-center card p-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="true">View Business Offers</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="scurity-tab" data-bs-toggle="tab" data-bs-target="#scurity" type="button" role="tab" aria-controls="scurity" aria-selected="false">Add Business Offers</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">                            
                            <div class="col-lg-12">
                                <br/><h1 class="page-header-title">Business Offers</h1><br/>
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>                                    
                                            <th>Sr.No.</th>
                                            <th>Business Icon</th>
                                            <th>Offers Name</th>                                         
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="catTable">
                                        <?php
                                        if (isset($_REQUEST['id'])) {
                                            $cur = $conn->link->query("SELECT * FROM `tb_user_business` where ub_id=" . $conn->encrypt_decrypt($_REQUEST['id'], 'decrypt'));
                                            $cu_re = $cur->fetch(PDO::FETCH_ASSOC);
                                        }

                                        $cu = $conn->link->query("SELECT * FROM `tb_business_offers` where bo_ub_id=" . $cu_re['ub_id']);
                                        $cu_rec = $cu->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($cu_rec as $i => $cr) {
                                            ?>
                                            <tr>
                                                <td><?= $i + 1 ?></td>
                                                <td><img height="50" class="rounded-circle" src="./assets/uploads/<?= $_SESSION['us_profile_photo'] ?>" alt="Image Description"></td>
                                                <td><?= $cr['bo_offers'] ?></td>                                                                                                
                                                <td>                                            
                                                    <a href="#?id=<?= $cr['bo_id'] ?>&action=edit"><i class="bi bi-pencil-square"></i></a>
                                                    <a href="#?id=<?= $cr['bo_id'] ?>&action=delete_buisness_details"><i class="bi bi-eye-fill"></i></a>
                                                    <i class="bi bi-trash"></i>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="scurity" role="tabpanel" aria-labelledby="scurity-tab">
                            <div class="col-lg-12">
                                <br/><h1 class="page-header-title">Business Offers</h1><br/>
                                <form method="post" action="./custom/rest/request.php">                                        
                                    <input type="hidden" readonly class="form-control" id="ub_id" name="ub_id" value="<?= isset($_REQUEST['id']) ? $cu_re['ub_id'] : "" ?>">
                                    <div class="row">     
                                        <div class="col-sm-6 mt-2">
                                            <label for="bo_offers" class="form-label">Offers Name</label>
                                            <input type="text" class="form-control" id="bo_offers" name="bo_offers">                                            
                                        </div>
                                    </div><br/>
                                    <div class="d-flex justify-content-end gap-3">                                
                                        <button type="submit" class="btn btn-primary btn-sm" name="user_offers_save" id="user_offers_save" value="user_offers_save">Save Changes</button>
                                        <button type="reset" class="btn btn-primary btn-sm"  name="user_offers_reset" id="user_offers_reset" value="user_offers_reset">Reset</button>
                                    </div>
                                </form>                                              
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
            function previewImage(event) {
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function (event) {
                    const imgElement = document.getElementById('upload-image-preview');
                    imgElement.src = event.target.result;
                }

                reader.readAsDataURL(file);
            }

            function resetFileInput() {
                document.getElementById('fileInput').value = '';
                document.getElementById('upload-image-preview').src = './assets/img/user.png';
            }

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