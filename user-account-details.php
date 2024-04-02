<?php
$ac = 6;
include './validation.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Add User Account</title>

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
                            <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="true">Account</button>
                        </li>
                        <?php if (isset($_REQUEST['id'])) { ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="scurity-tab" data-bs-toggle="tab" data-bs-target="#scurity" type="button" role="tab" aria-controls="scurity" aria-selected="false">Security</button>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">                            
                            <div class="col-lg-12">
                                <br/><h1 class="page-header-title">Account Details</h1><br/>
                                <form method="post" action="./custom/rest/request.php" enctype="multipart/form-data">                                        
                                    <input type="hidden" readonly class="form-control" id="bd_id" name="bd_id" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_id'] : "" ?>">
                                    <div class="row">    
                                        <div class="col-sm-2 text-center">
                                            <img src="./assets/img/user.png" id="upload-image-preview" class="w-50">
                                        </div>
                                        <div class="col-sm-4 text-center">
                                            <input type="file" id="us_profile_photo" name="us_profile_photo" style="display: none;" onchange="previewImage(event)">
                                            <button type="button" class="btn btn-primary btn-xs" onclick="document.getElementById('us_profile_photo').click();">Upload new photo</button>
                                            <button type="button" class="btn btn-danger btn-xs" onclick="resetFileInput()">Reset</button>
                                        </div>
                                    </div>
                                    <div class="row">     
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_first_name" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="us_first_name" name="us_first_name">                                            
                                        </div> 
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_last_name" class="form-label">Last Name</label>
                                            <input type="text" required class="form-control" id="us_last_name" name="us_last_name" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_email" class="form-label">E-Mail</label>
                                            <input type="email" required class="form-control" id="us_email" name="us_email" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_password" class="form-label">Password</label>
                                            <input type="password" required class="form-control" id="us_password" name="us_password" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_organisation" class="form-label">Organization</label>
                                            <input type="text" required class="form-control" id="us_organisation" name="us_organisation" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_phone_number" class="form-label">Phone Number</label>
                                            <input type="number" required class="form-control" id="us_phone_number" name="us_phone_number" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_address" class="form-label">Address</label>
                                            <input type="text" required class="form-control" id="us_address" name="us_address" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_state" class="form-label">State</label>
                                            <input type="text" required class="form-control" id="us_state" name="us_state" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_zipcode" class="form-label">ZIP Code</label>
                                            <input type="number" required class="form-control" id="us_zipcode" name="us_zipcode" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_country" class="form-label">Country</label>
                                            <input type="text" required class="form-control" id="us_country" name="us_country" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_language" class="form-label">Language</label>
                                            <input type="text" required class="form-control" id="us_language" name="us_language" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_timezone" class="form-label">Timezone</label>
                                            <input type="text" required class="form-control" id="us_timezone" name="us_timezone" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label for="us_currency" class="form-label">Currency</label>
                                            <input type="text" required class="form-control" id="us_currency" name="us_currency" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                    </div><br/>
                                    <div class="d-flex justify-content-end gap-3">                                
                                        <button type="submit" class="btn btn-primary btn-sm" name="user_save" id="user_save" value="user_save">Save Changes</button>
                                        <button type="reset" class="btn btn-primary btn-sm"  name="user_reset" id="user_reset" value="user_reset">Reset</button>
                                    </div>
                                </form>                        
                            </div>
                        </div>
                        <div class="tab-pane fade" id="scurity" role="tabpanel" aria-labelledby="scurity-tab">
                            <div class="col-lg-12">
                                <br/><h1 class="page-header-title">Security</h1><br/>
                                <form method="post" action="./custom/rest/request.php" enctype="multipart/form-data">                                        
                                    <input type="hidden" readonly class="form-control" id="bd_id" name="bd_id" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_id'] : "" ?>">                                    
                                    <div class="row"> 
                                        <?php
                                        if (isset($_REQUEST['id'])) {
                                            ?>
                                            <div class="col-sm-6 mt-2">
                                                <label for="us_current_password" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" id="us_current_password" name="us_current_password">                                            
                                            </div>
                                            <?php
                                        }
                                        ?>                                        
                                        <div class="col-sm-6 mt-2">
                                            <label for="us_password" class="form-label">New Password</label>
                                            <input type="password" required class="form-control" id="us_password" name="us_password" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <label for="us_confirm_password" class="form-label">Confirm Password</label>
                                            <input type="password" required class="form-control" id="us_confirm_password" name="us_confirm_password" value="<?= isset($_REQUEST['id']) ? $cu_si['bd_business_name'] : "" ?>">
                                            <div id="passwordText" class="form-text"></div>
                                        </div>
                                    </div><br/>
                                    <div class="d-flex justify-content-end gap-3">                                
                                        <button type="submit" class="btn btn-primary btn-sm" name="user_password_save" id="user_password_save" value="user_password_save">Save Changes</button>
                                        <button type="reset" class="btn btn-primary btn-sm"  name="user_password_reset" id="user_password_reset" value="user_password_reset">Reset</button>
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
                                                    document.getElementById('us_profile_photo').value = '';
                                                    document.getElementById('upload-image-preview').src = './assets/img/user.png';
                                                }

                                                $(document).ready(function () {
                                                    $('#us_confirm_password').on('change', function () {
                                                        var password = $('#us_password').val();
                                                        var confirmPassword = $('#us_confirm_password').val();
                                                        var passwordText = $('#passwordText');
                                                        if (password !== confirmPassword) {
                                                            passwordText.html("Passwords do not match!");
                                                            $('#us_confirm_password').val("");
                                                            $('#us_password').val("");
                                                            $('#us_password').focus();
                                                        } else {
                                                            passwordText.html("");
                                                        }
                                                    });

                                                    $('#us_password, #us_confirm_password').on('input', function () {
                                                        var password = $('#us_password').val();
                                                        var confirmPassword = $('#us_confirm_password').val();
                                                        var passwordText = $('#passwordText');

                                                        if (password !== confirmPassword) {
                                                            passwordText.html("Passwords do not match!");
                                                        } else {
                                                            passwordText.html("");
                                                        }
                                                        if (!password.trim() && !confirmPassword.trim()) {
                                                            passwordText.html("");
                                                        }
                                                    });
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