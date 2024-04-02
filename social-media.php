<?php
if (!isset($_REQUEST['id'])) {
    header('location:./business-profile.php');
}
$ac = 10;
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
        <title>Business Social Media Details</title>

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
            .bi-files{
                cursor: pointer;
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
                            <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="true">Social Media</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">                            
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $cu = $conn->link->query("SELECT * FROM `tb_user_business` where ub_id=" . $conn->encrypt_decrypt($_REQUEST['id'], 'decrypt'));
                                $cu_rec = $cu->fetch(PDO::FETCH_ASSOC);
                            }
//                        print_r($cu_rec);
                            ?>
                            <div class="col-lg-12">
                                <br/><h1 class="page-header-title">Social Media</h1><br/>
                                <form method="post" action="./custom/rest/request.php">                                        
                                    <input type="hidden" readonly class="form-control" id="ub_id" name="ub_id" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_id'] : "" ?>">
                                    <table class="w-100">
                                        <tr>  
                                            <td>
                                                <label for="ub_website_url" class="form-label ms-3 mt-2">Website URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_website_url" name="ub_website_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_website_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <label for="ub_flipkart_url" class="form-label ms-5 mt-2">Flipkart URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_flipkart_url" name="ub_flipkart_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_flipkart_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>  
                                            <td>
                                                <label for="ub_facebook_url" class="form-label ms-3 mt-2">Facebook URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_facebook_url" name="ub_facebook_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_facebook_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <label for="ub_amazon_url" class="form-label ms-5 mt-2">Amazon URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_amazon_url" name="ub_amazon_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_amazon_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>  
                                            <td>
                                                <label for="ub_instagram_url" class="form-label ms-3 mt-2">Instagram URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_instagram_url" name="ub_instagram_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_instagram_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <label for="ub_ebay_url" class="form-label ms-5 mt-2">Ebay URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_ebay_url" name="ub_ebay_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_ebay_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>  
                                            <td>
                                                <label for="ub_whatsapp_url" class="form-label ms-3 mt-2">Whatsapp URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_whatsapp_url" name="ub_whatsapp_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_whatsapp_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <label for="ub_india_mart_url" class="form-label ms-5 mt-2">India Mart URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_india_mart_url" name="ub_india_mart_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_india_mart_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>  
                                            <td>
                                                <label for="ub_youtube_url" class="form-label ms-3 mt-2">Youtube URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_youtube_url" name="ub_youtube_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_youtube_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <label for="ub_big_basket_url" class="form-label ms-5 mt-2">Big Basket URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_big_basket_url" name="ub_big_basket_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_big_basket_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>  
                                            <td>
                                                <label for="ub_x_url" class="form-label ms-3 mt-2">X URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_x_url" name="ub_x_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_x_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <label for="ub_zomato_url" class="form-label ms-5 mt-2">Zomato URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_zomato_url" name="ub_zomato_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_zomato_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>  
                                            <td>
                                                <label for="ub_linkedin_url" class="form-label ms-3 mt-2">Linked In URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_linkedin_url" name="ub_linkedin_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_linkedin_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <label for="ub_swiggy_url" class="form-label ms-5 mt-2">Swiggy URL</label>                                            
                                            </td>
                                            <td>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col">
                                                        <input type="text" required class="form-control" id="ub_swiggy_url" name="ub_swiggy_url" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_swiggy_url'] : "" ?>">
                                                    </div>
                                                    <div class="col-auto ps-0 pe-2">
                                                        <i class="bi-files"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table><br/>
                                    <div class="d-flex justify-content-end gap-3">                                
                                        <button type="submit" class="btn btn-primary btn-sm" name="user_social_save" id="user_social_save" value="user_social_save">Save Changes</button>
                                        <button type="reset" class="btn btn-primary btn-sm"  name="user_social_reset" id="user_social_reset" value="user_social_reset">Reset</button>
                                        <a href="business-product.php?id=<?= $_REQUEST['id'] ?>" class="btn btn-primary btn-sm">Next</a>
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
            $(document).ready(function () {
                $('.bi-files').click(function () {
                    // Find the input field associated with the clicked copy icon
                    var inputField = $(this).closest('.row').find('.form-control');

                    // Get the value of the input field
                    var inputValue = inputField.val();

                    // Create a temporary input element, copy the value, and remove it
                    var tempInput = $('<input>');
                    $('body').append(tempInput);
                    tempInput.val(inputValue).select();
                    document.execCommand('copy');
                    tempInput.remove();

                    // Optionally, provide feedback to the user
                    alert('Text copied to clipboard: ' + inputValue);
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