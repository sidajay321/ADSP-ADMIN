<?php
if (!isset($_REQUEST['id'])) {
    header('location:./business-profile.php');
}
$ac = 13;
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
        <title>Business Appointments</title>

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
                            <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="true">Business Appointments</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">                            
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $cur = $conn->link->query("SELECT * FROM `tb_user_business` where ub_id=" . $conn->encrypt_decrypt($_REQUEST['id'], 'decrypt'));
                                $cu_re = $cur->fetch(PDO::FETCH_ASSOC);
                            }
                            ?>
                            <div class="col-lg-12">
                                <br/><h1 class="page-header-title">My Business Appointments</h1><br/>
                                <form method="post" action="./custom/rest/request.php">                                        
                                    <input type="hidden" readonly class="form-control" id="ub_id" name="ub_id" value="<?= isset($_REQUEST['id']) ? $cu_re['ub_id'] : "" ?>">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="scheduleTable" class="table">
                                                <tr>
                                                    <td><label class="form-label"> <input value="a" name="ub_monday_time_active" type="checkbox" class="form-check-input"/> Monday</label></td>
                                                    <td>
                                                        <select id="ub_monday_start_time" name="ub_monday_start_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center">to</td>
                                                    <td>
                                                        <select id="ub_monday_end_time" name="ub_monday_end_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label class="form-label"> <input value="a" name="ub_tuesday_time_active" type="checkbox" class="form-check-input"/> Tuesday</label></td>
                                                    <td>
                                                        <select id="ub_tuesday_start_time" name="ub_tuesday_start_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center">to</td>
                                                    <td>
                                                        <select id="ub_tuesday_end_time" name="ub_tuesday_end_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label class="form-label"> <input value="a" name="ub_wednesday_time_active" type="checkbox" class="form-check-input"/> Wednesday</label></td>
                                                    <td>
                                                        <select id="ub_wednesday_start_time" name="ub_wednesday_start_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center">to</td>
                                                    <td>
                                                        <select id="ub_wednesday_end_time" name="ub_wednesday_end_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label class="form-label"> <input value="a" name="ub_thursday_time_active" type="checkbox" class="form-check-input"/> Thursday</label></td>
                                                    <td>
                                                        <select id="ub_thursday_start_time" name="ub_thursday_start_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center">to</td>
                                                    <td>
                                                        <select id="ub_thursday_end_time" name="ub_thursday_end_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label class="form-label"> <input value="a" name="ub_friday_time_active" type="checkbox" class="form-check-input"/> Friday</label></td>
                                                    <td>
                                                        <select id="ub_friday_start_time" name="ub_friday_start_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center">to</td>
                                                    <td>
                                                        <select id="ub_friday_end_time" name="ub_friday_end_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label class="form-label"> <input value="a" name="ub_saturday_time_active" type="checkbox" class="form-check-input"/> Saturday</label></td>
                                                    <td>
                                                        <select id="ub_saturday_start_time" name="ub_saturday_start_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center">to</td>
                                                    <td>
                                                        <select id="ub_saturday_end_time" name="ub_saturday_end_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label class="form-label"> <input value="a" name="ub_sunday_time_active" type="checkbox" class="form-check-input"/> Sunday</label></td>
                                                    <td>
                                                        <select id="ub_sunday_start_time" name="ub_sunday_start_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center">to</td>
                                                    <td>
                                                        <select id="ub_sunday_end_time" name="ub_sunday_end_time" class="form-select" autocomplete="off">
                                                            <option value="">12:00AM</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div><br/>
                                    <div class="d-flex justify-content-end gap-3">                                
                                        <button type="submit" class="btn btn-primary btn-sm" name="user_appointments_save" id="user_appointments_save" value="user_appointments_save">Save Changes</button>
                                        <button type="reset" class="btn btn-primary btn-sm"  name="user_appointments_reset" id="user_appointments_reset" value="user_appointments_reset">Reset</button>
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
            const timeOptions = [
                "01:00AM", "02:00AM", "03:00AM", "04:00AM", "05:00AM", "06:00AM", "07:00AM", "08:00AM", "09:00AM", "10:00AM",
                "11:00AM", "12:00PM", "01:00PM", "02:00PM", "03:00PM", "04:00PM", "05:00PM", "06:00PM", "07:00PM", "08:00PM",
                "09:00PM", "10:00PM", "11:00PM"
            ];

            const selectElements = document.querySelectorAll('#scheduleTable select');
            selectElements.forEach(select => {
                timeOptions.forEach(time => {
                    const option = document.createElement('option');
                    option.value = time;
                    option.textContent = time;
                    select.appendChild(option);
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