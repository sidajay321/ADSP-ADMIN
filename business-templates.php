<?php
$ac = 7;
include './validation.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Business Template</title>

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
        <link rel="preload" href="./assets/css/hover.css" data-hs-appearance="dark" as="style">
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
        <style>
            .select-btn.selected {
                border: 3px solid royalblue;
                padding: 2px;
                border-radius: 10px;
            }
        </style>
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
                            <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="true">Business Template</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">                            
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $cur = $conn->link->query("SELECT * FROM `tb_user_business` where ub_id=" . $conn->encrypt_decrypt($_REQUEST['id'], 'decrypt'));
                                $cu_re = $cur->fetch(PDO::FETCH_ASSOC);
//                                print_r($cu_re);
                            }
                            ?>
                            <div class="col-lg-12">
                                <br/><h1 class="page-header-title">Business Template</h1><br/>
                                <form method="post" action="./custom/rest/request.php">                                        
                                    <input type="hidden" readonly class="form-control" id="ub_id" name="ub_id" value="<?= isset($_REQUEST['id']) ? $cu_re['ub_id'] : "" ?>">
                                    <input type="hidden" name="ub_template_id" id="ub_template_id" value="<?= isset($_REQUEST['id']) ? $cu_re['ub_template_id'] : "" ?>">
                                    <div class="row">    
                                        <div class="col-sm-4 mt-5 text-center">
                                            <div class="select-btn <?= isset($_REQUEST['id']) ? $cu_re['ub_template_id'] == 1 ? ' selected' : "" : "" ?>" type="button" value="1" onclick="toggleSelection(this)">
                                                <img style="border-radius:10px" src="./assets/img/tem7.png" class="w-100 hvr-grow">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end gap-3 mt-5">                                
                                        <button type="submit" class="btn btn-primary btn-sm" name="user_template_save" id="user_template_save" value="user_template_save">Save Changes</button>
                                        <button type="reset" class="btn btn-primary btn-sm"  name="user_reset" id="user_reset" value="user_reset">Reset</button>
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

                                                function toggleSelection(button) {
                                                    // Deselect all buttons
                                                    var buttons = document.querySelectorAll('.select-btn');
                                                    buttons.forEach(function (btn) {
                                                        btn.classList.remove('selected');
                                                        btn.style.border = ''; // Reset border to default
                                                    });

                                                    // Select the clicked button
                                                    button.classList.add('selected');
                                                    button.style.border = '3px solid royalblue';
                                                    document.getElementById('ub_template_id').value = button.getAttribute('value');
                                                    console.log('Button clicked');
                                                }
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