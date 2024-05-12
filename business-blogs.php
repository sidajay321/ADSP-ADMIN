<?php
if (!isset($_REQUEST['id'])) {
    header('location:./business-profile.php');
}
$ac = 20;
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
        <title>Business Blogs</title>

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
                            <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="true">View Business Blogs</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="scurity-tab" data-bs-toggle="tab" data-bs-target="#scurity" type="button" role="tab" aria-controls="scurity" aria-selected="false">Add Business Blogs</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">                            
                            <div class="col-lg-12">
                                <br/><h1 class="page-header-title">Business Blogs</h1><br/>
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>                                    
                                            <th>Sr.No.</th>
                                            <th>Blog Image</th>
                                            <th>Blogs Title</th>
                                            <th>Blogs Description</th>                                         
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="catTable">
                                        <?php
                                        if (isset($_REQUEST['id'])) {
                                            $cur = $conn->link->query("SELECT * FROM `tb_user_business` where ub_id=" . $conn->encrypt_decrypt($_REQUEST['id'], 'decrypt'));
                                            $cu_re = $cur->fetch(PDO::FETCH_ASSOC);
                                        }
                                        $cu = $conn->link->query("SELECT * FROM `tb_business_blog` where bb_ub_id=" . $cu_re['ub_id']);
                                        $cu_rec = $cu->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($cu_rec as $i => $cr) {
                                            ?>
                                            <tr>
                                                <td><?= $i + 1 ?></td>
                                                <td><img height="50" class="rounded-circle" src="./assets/uploads/<?= $cr['bb_blog_image'] ?>" alt="Image Description"></td>
                                                <td><?= $cr['bb_blog_title'] ?></td>
                                                <td><?= $cr['bb_blog_description'] ?></td>                                                
                                                <td>                                            
                                                    <a href="#?id=<?= $cr['bb_id'] ?>&action=edit"><i class="bi bi-pencil-square"></i></a>
                                                    <a href="#?id=<?= $cr['bb_id'] ?>&action=delete_buisness_details"><i class="bi bi-eye-fill"></i></a>
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
                                <br/><h1 class="page-header-title">Business Blogs</h1><br/>
                                <form method="post" action="./custom/rest/request.php" enctype="multipart/form-data">                                        
                                    <input type="hidden" readonly class="form-control" id="ub_id" name="ub_id" value="<?= isset($_REQUEST['id']) ? $cu_re['ub_id'] : "" ?>">
                                    <div class="row">     
                                        <div class="col-sm-6 mt-2">
                                            <label for="bb_blog_title" class="form-label">Blog Title</label>
                                            <input type="text" class="form-control" id="bb_blog_title" name="bb_blog_title"> <br/>                                           
                                            <img src="./assets/img/placehoder1.jpg" id="upload-image-preview" class="w-50"><br/>
                                            <input type="file" id="fileInput" name="fileInput" style="display: none;" onchange="previewImage(event)"><br/>
                                            <button type="button" class="btn btn-primary btn-xs" onclick="document.getElementById('fileInput').click();">Upload Blogs photo</button>
                                            <button type="button" class="btn btn-danger btn-xs" onclick="resetFileInput()">Reset</button>                                            
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <label for="bb_blog_description" class="form-label">Blog Description</label>
                                            <textarea rows="5" type="text" class="form-control" id="bb_blog_description" name="bb_blog_description"></textarea>                                            

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end gap-3">                                
                                        <button type="submit" class="btn btn-primary btn-sm" name="business_blogs_save" id="business_blogs_save" value="business_blogs_save">Save Changes</button>
                                        <button type="reset" class="btn btn-primary btn-sm"  name="business_blogs_reset" id="business_blogs_reset" value="business_blogs_reset">Reset</button>
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
                                                    document.getElementById('upload-image-preview').src = './assets/img/placehoder1.jpg';
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