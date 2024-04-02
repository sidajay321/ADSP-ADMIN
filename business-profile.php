<?php
$ac = 8;
include './validation.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Business Profile</title>

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
                /*text-transform: capitalize;*/
            }
            .business-links{
                text-align: justify;
                line-height: 1.7;
            }
            .business-links a{
                text-decoration: none;
                border: 1px solid royalblue;
                border-radius: 5px;
                padding: 2px;
                color:#fff;
                background-color: royalblue;
                transition: background-color 0.3s, color 0.3s;
            }
            .business-links a:hover{
                color:royalblue;
                background-color: #fff;
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
                            <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="true">Business Profile</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">                            
                            <div class="col-lg-12">
                                <br/><h1 class="page-header-title">Business Profile</h1><br/>
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>                                    
                                            <th>Sr.No.</th>
                                            <th>Business Name</th>
                                            <th>Business URL</th>                                         
                                            <th>Business Status</th>
                                            <th>Business Date</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="catTable">                                        
                                        <?php
                                        $cu = $conn->link->query("SELECT * FROM `tb_user_business`");
                                        $cu_rec = $cu->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($cu_rec as $i => $cr) {
                                            ?>
                                            <tr>
                                                <td><?= $i + 1 ?></td>
                                                <td><?= $cr['ub_business_name'] ?></td>
                                                <td><?= $cr['ub_website_url'] ?></td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input disabled class="form-check-input" <?= $cr['ub_active'] == 'a' ? 'checked' : "" ?> type="checkbox" id="flexSwitchCheckDefault">                                                    
                                                    </div>
                                                </td>                                                
                                                <td><?= $cr['ub_added_on'] ?></td>
                                                <td class="business-links">
    <!--                                                    <a href="./user-business-details.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Details</a>
                                                        <a href="./social-media.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Social Media</a>
                                                        <a href="./business-product.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Product</a>
                                                        <a href="./business-hours.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Hours</a>
                                                        <a href="./business-appointments.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Appointments</a>
                                                        <a href="./business-gallery.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Gallery</a>
                                                        <a href="./business-services.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Services</a>
                                                        <a href="./business-offers.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Offers</a>
                                                        <a href="./business-certificate.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Certificate</a>
                                                        <a href="./business-payment-method.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Payment Method</a>
                                                        <a href="./business-seo.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business SEO</a>
                                                        <a href="./business-blogs.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Blogs</a>
                                                        <a href="./business-privacy-policy.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Privacy Policy</a>
                                                        <a href="./business-terms-condition.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Terms And Condition</a>
                                                        <a href="./business-feedback.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Feedback</a>
                                                        <a href="./business-enquiry.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Enquiry</a>-->
    <!--                                                    <a href="./business-appointments-details.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>">Business Appointments Details</a>-->
    <!--                                                    <a href="#?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>"><i class="bi bi-eye-fill"></i></a>-->
                                                    <a href="./user-business-details.php?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>"><i class="bi bi-pencil-square"></i></a>
                                                    <a href="#?id=<?= $conn->encrypt_decrypt($cr['ub_id'], 'encrypt'); ?>"><i class="bi bi-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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