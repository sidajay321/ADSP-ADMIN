<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Login::Shopeemart</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="./favicon.ico">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

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

    <body>

        <script src="./assets/js/hs.theme-appearance.js"></script>

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main" class="main">
            <div class="position-fixed top-0 end-0 start-0 bg-img-start" style="height: 32rem; background-image: url(./assets/svg/components/card-6.svg);">
                <!-- Shape -->
                <div class="shape shape-bottom zi-1">
                    <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
                    <polygon fill="#fff" points="0,273 1921,273 1921,0 " />
                    </svg>
                </div>
                <!-- End Shape -->
            </div>

            <!-- Content -->
            <div class="container py-5 py-sm-7">               

                <div class="mx-auto" style="max-width: 30rem;">
                    <!-- Card -->
                    <div class="card card-lg mb-5">
                        <div class="card-body">
                            <!-- Form -->
                            <form method="post"  action="./custom/rest/request.php">
                                <div class="text-center">
                                    <div class="mb-5">
                                        <h2 style="color:#696CFF;">Shopeemart</h2><br/>
                                        <h3>Sign In</h3>
                                        <!--                                        <p>Don't have an account yet? <a class="link" href="./authentication-signup-basic.html">Sign up here</a></p>-->
                                    </div>                                 

                                    <!--                                    <span class="divider-center text-muted mb-4">OR</span>-->
                                </div>

                                <!-- Form -->
                                <div class="mb-4">
                                    <label class="form-label" for="bd_type">User Type</label>
                                    <select id="bd_type" required name="bd_type" class="form-select" autocomplete="off">
                                        <option value="">Select User Type</option>
                                        <option value="admin">Admin</option>
                                        <!--<option value="user">User</option>-->
                                        <option value="business">User</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="username">Your username</label>
                                    <input type="text" class="form-control form-control-lg" id="username" name="username" tabindex="1" placeholder="email@address.com" aria-label="email@address.com" required>
                                    <span class="invalid-feedback">Please enter a valid email address.</span>
                                </div>


                                <!-- End Form -->

                                <!-- Form -->
                                <div class="mb-4">
                                    <label class="form-label w-100" for="password" tabindex="0">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <span>Password</span>
                                            <a class="form-label-link mb-0" href="./authentication-reset-password-basic.html">Forgot Password?</a>
                                        </span>
                                    </label>

                                    <div class="input-group input-group-merge" data-hs-validation-validate-class>
                                        <input type="password" class="js-toggle-password form-control form-control-lg" id="password" name="password" placeholder="8+ characters required" aria-label="8+ characters required" required minlength="8" data-hs-toggle-password-options='{
                                               "target": "#changePassTarget",
                                               "defaultClass": "bi-eye-slash",
                                               "showClass": "bi-eye",
                                               "classChangeTarget": "#changePassIcon"
                                               }'>
                                        <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                                            <i id="changePassIcon" class="bi-eye"></i>
                                        </a>
                                    </div>

                                    <span class="invalid-feedback">Please enter a valid password.</span>
                                </div>
                                <!-- End Form -->

                                <!-- Form Check -->
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="termsCheckbox">
                                    <label class="form-check-label" for="termsCheckbox">
                                        Remember me
                                    </label>
                                </div>
                                <!-- End Form Check -->

                                <div class="d-grid">
                                    <button type="submit" name="login_request" id="login_request" value="login_request" class="btn btn-primary btn-lg">Sign in</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
            <!-- End Content -->
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- JS Global Compulsory  -->
        <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="./assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js"></script>

        <!-- JS Front -->
        <script src="./assets/js/theme.min.js"></script>
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