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
                        <form method="post" action="./custom/rest/request.php" enctype="multipart/form-data">                                        
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $cu_ci_si = $conn->link->query("SELECT * FROM tb_business_details where bd_id=" . $_REQUEST['id']);
                                $cu_si = $cu_ci_si->fetch(PDO::FETCH_ASSOC);
                                $cu = $conn->link->query("SELECT * FROM `tb_user_business` where ub_id=" . $cu_si['bd_id']);
                                $cu_rec = $cu->fetch(PDO::FETCH_ASSOC);
                                $cu_ci = $conn->link->query("SELECT * FROM tb_buisness_category where bca_bd_id=" . $cu_si['bd_id']);
                                $cu_ci_rec = $cu_ci->fetchAll(PDO::FETCH_ASSOC);
                                $bcArr = [];
                                foreach ($cu_ci_rec as $ci) {
                                    array_push($bcArr, $ci['bca_bc_id']);
                                }
                            }
                            ?>
                            <input type="hidden" readonly class="form-control" id="bd_id" name="bd_id" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_id'] : "" ?>">
                            <input type="hidden" readonly class="form-control" id="ub_id" name="ub_id" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_id'] : "" ?>">
                            <div class="row"> 
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6 text-center">
                                            <h6>My Business Logo</h6>
                                            <img src="<?= isset($_REQUEST['id']) ? "./assets/uploads/" . $cu_rec['ub_logo'] : "./assets/img/logo-placeholder-image.png" ?>" id="business-upload-preview" style="width:100px;height: 100px;border-radius: 50%;">
                                            <br/>
                                            <input type="file" id="businessLogo" name="ub_logo" accept="image/jpeg, image/png" style="display: none;" onchange="previewImage(event, 'business-upload-preview')">
                                            <button type="button" class="btn btn-primary btn-xs" onclick="document.getElementById('businessLogo').click();">Add</button>
                                            <button type="button" class="btn btn-danger btn-xs" onclick="resetFileInput('business-upload-preview')">Remove</button>
                                        </div>
                                        <div class="col-sm-6 text-center">
                                            <h6>My Business Cover Image</h6>
                                            <img src="<?= isset($_REQUEST['id']) ? "./assets/uploads/" . $cu_rec['ub_cover_image'] : "./assets/img/placehoder2.jpg" ?>" id="business-cover-preview"  style="width:200px;height: 100px;">
                                            <br/>
                                            <input type="file" id="businessCoverImage" accept="image/jpeg, image/png" name="ub_cover_image" style="display: none;" onchange="previewImage(event, 'business-cover-preview')">
                                            <button type="button" class="btn btn-primary btn-xs" onclick="document.getElementById('businessCoverImage').click();">Add</button>
                                            <button type="button" class="btn btn-danger btn-xs" onclick="resetFileInput('business-cover-preview')">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div><br/>
                            <div class="row">     
                                <div class="col-sm-4">
                                    <label for="bd_url" class="form-label">Business URL</label>
                                    <input type="text" readonly class="form-control" id="bd_url" name="bd_url" aria-describedby="buisnessurl"  value="<?= isset($_REQUEST['id']) ? $cu_si['bd_url'] : "https://bizzata.in/business" ?>">
                                    <div id="buisnessurl" class="form-text">Your Business URL.</div>
                                </div> 
                                <div class="col-sm-4">
                                    <label for="bd_business_name" class="form-label">Business Name</label>
                                    <input type="text" onchange="checkValueInTable('tb_business_details', 'bd_business_id', this, true);" onInput="updateBusinessURL(this.value)" required class="form-control" id="bd_business_name" name="bd_business_name" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
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
                                <div class="col-sm-4">
                                    <label for="ub_whatsapp_number" class="form-label">Business Whatsapp Number</label>
                                    <input type="number" onkeypress="return isNumberKeyByGAP(event, this, 10);" onchange="checkValueInTable('tb_user_business', 'ub_whatsapp_number', this);" class="form-control" id="ub_whatsapp_number" name="ub_whatsapp_number" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_whatsapp_number'] : "" ?>">                                            
                                </div> 
                                <div class="col-sm-4">
                                    <label for="ub_alternate_number" class="form-label">Alternate Number</label>
                                    <input type="number" onkeypress="return isNumberKeyByGAP(event, this, 10);" class="form-control" id="ub_alternate_number" onchange="checkValueInTable('tb_user_business', 'ub_alternate_number', this);" name="ub_alternate_number" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_alternate_number'] : "" ?>">                                            
                                </div>
                                <div class="col-sm-6">
                                    <label for="bd_meta_description" class="form-label">Meta Description</label>
                                    <textarea rows="5" type="text" required class="form-control" id="bd_meta_description" name="bd_meta_description" ><?= isset($_REQUEST['id']) ? $cu_si['bd_meta_description'] : "" ?></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label for="ub_description" class="form-label">Business Description</label>
                                    <textarea rows="5" type="text" class="form-control" id="ub_description" name="ub_description"><?= isset($_REQUEST['id']) ? $cu_rec['ub_description'] : "" ?></textarea>
                                </div>
                            </div>
                            <div class="row">     
                                <div class="col-sm-4 mt-2">
                                    <label for="ub_email" class="form-label">Business E-Mail or Username</label>
                                    <input required type="email" class="form-control" id="ub_email" name="ub_email" onchange="checkValueInTable('tb_user_business', 'ub_email', this);" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_email'] : "" ?>">                                            
                                </div> 
                                <div class="col-sm-4 mt-2">
                                    <label for="ub_password" class="form-label">Password</label>
                                    <input required type="password" class="form-control" id="ub_password" name="ub_password" value="<?= isset($_REQUEST['id']) ? $conn->encrypt_decrypt($cu_rec['ub_password'], 'decrypt') : "" ?>">                                            
                                </div>
                                <div class="col-sm-4 mt-2">
                                    <label for="ub_address" class="form-label">Business Address</label>
                                    <input required type="text" required class="form-control" id="ub_address" name="ub_address" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_address'] : "" ?>">
                                </div>
                                <div class="col-sm-4 mt-2">
                                    <label for="ub_zipcode" class="form-label">Zip Code</label>
                                    <input type="numer" onkeypress="return isNumberKeyByGAP(event, this, 6);" required class="form-control" id="ub_zipcode" name="ub_zipcode" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_zipcode'] : "" ?>">
                                </div>
                                <div class="col-sm-4 mt-2">
                                    <label for="ub_alternate_email" class="form-label">Alternate Business Email</label>
                                    <input type="email" required class="form-control" id="ub_alternate_email" name="ub_alternate_email" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_alternate_email'] : "" ?>">
                                </div>
                                <div class="col-sm-4 mt-2">
                                    <label for="ub_state" class="form-label">State</label>
                                    <input type="text" required class="form-control" id="ub_state" name="ub_state" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_state'] : "" ?>">
                                </div>
                                <div class="col-sm-4 mt-2">
                                    <label for="ub_language" class="form-label">Default Language</label>
                                    <input type="text" required class="form-control" id="ub_language" name="ub_language" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_language'] : "" ?>">
                                </div>
                                <div class="col-sm-4 mt-2">
                                    <label for="ub_google_map_url" class="form-label">Google Map URL</label>
                                    <input type="text" required class="form-control" id="ub_google_map_url" name="ub_google_map_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_google_map_url'] : "" ?>">
                                    <!--                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mapModal" onclick="loadGoogleMap()">
                                                                                    Open Map
                                                                                </button>
                                                                                <button type="button" class="btn btn-danger btn-xs" onclick="removeGoogleMap()">Remove</button>-->
                                </div>
                                <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mapModalLabel">Google Map</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" id="searchInput" class="form-control mt-3" placeholder="Search for location">
                                                <div id="map-container" style="height: 400px;"></div>                                                        
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-2">
                                    <label for="ub_district" class="form-label">District</label>
                                    <input type="text" required class="form-control" id="ub_district" name="ub_district" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_district'] : "" ?>">
                                </div>
                                <div class="col-sm-4 mt-2">
                                    <label for="ub_business_segment" class="form-label">Business Segment</label>
                                    <input type="text" required class="form-control" id="ub_business_segment" name="ub_business_segment" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_business_segment'] : "" ?>">
                                </div>
                            </div><br/>
                            <!--                            <div class="d-flex justify-content-end gap-3">                               
                                                            <button type="submit" class="btn btn-primary btn-sm" name="user_business_<?= isset($_REQUEST['id']) ? "update" : "save" ?>" id="user_business_<?= isset($_REQUEST['id']) ? "update" : "save" ?>" value="user_business_<?= isset($_REQUEST['id']) ? "update" : "save" ?>"><?= isset($_REQUEST['id']) ? "Update" : "Save" ?></button>
                                                            <button type="reset" class="btn btn-primary btn-sm"  name="user_business_reset" id="user_business_reset" value="user_business_reset">Reset</button>
                                                        </div>-->

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
        <script src="custom/js/GAPjs.js" type="text/javascript"></script>
        <script>
                                        function previewImage(event, id) {
                                            const file = event.target.files[0];
                                            const reader = new FileReader();
                                            reader.onload = function (event) {
                                                const imgElement = document.getElementById(id);
                                                imgElement.src = event.target.result;
                                            }

                                            reader.readAsDataURL(file);
                                        }

                                        function resetFileInput(id) {
                                            document.getElementById(id).value = '';
                                            document.getElementById(id).src = './assets/img/user.png';
                                        }
        </script>
        <script>
            function updateBusinessURL(name) {
                const urlInput = document.getElementById('bd_url');
                const baseUrl = 'https://bizzata.in/business/';
                urlInput.value = baseUrl + name.trim().replace(/\s+/g, '');
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