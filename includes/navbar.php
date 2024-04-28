<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <!-- Logo -->

            <a class="navbar-brand" href="./index.php" aria-label="Front">
                <h3 style="color:#696CFF;">Shopeemart</h3>
<!--                <img class="navbar-brand-logo" src="./assets/img/logo.png" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo" src="./assets/img/logo.png" alt="Logo" data-hs-theme-appearance="dark">
                <img class="navbar-brand-logo-mini" src="./assets/img/logo.png" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini" src="./assets/img/logo.png" alt="Logo" data-hs-theme-appearance="dark">-->
            </a>

            <!-- End Logo -->

            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>

            <!-- End Navbar Vertical Toggle -->

            <!-- Content -->
            <div class="navbar-vertical-content">
                <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                    <!-- Collapse -->
                    <div class="nav-item">
                        <a class="nav-link <?= $ac == 1 ? "active" : "" ?>" href="<?= $_SESSION['type'] == 'admin' ? './index.php' : './user-dashboard.php' ?>">
                            <i class="bi-house-door nav-icon"></i>
                            <span class="nav-link-title">Dashboards</span>
                        </a>
                        <?php if ($_SESSION['type'] == 'user') { ?>
            <!--                            <a class="nav-link  <?= $ac == 6 ? "active" : "" ?>" href="./user-account-details.php">
                        <i class="bi-people nav-icon"></i>
                        <span class="nav-link-title">Account Setting</span>
                    </a>-->
                        <?php } ?>
                    </div>
                    <!-- End Collapse -->

                    <span class="dropdown-header mt-4">Business Overview</span>
                    <small class="bi-three-dots nav-subtitle-replacer"></small>

                    <!-- Collapse -->
                    <div class="navbar-nav nav-compact">

                    </div>
                    <?php if ($_SESSION['type'] == 'admin') { ?>
                        <div id="navbarVerticalMenuPagesMenu">                        
                            <div class="nav-item">
                                <a class="nav-link dropdown-toggle  <?= $ac == 2 || $ac == 3 ? "active" : "" ?>" href="#buisness" role="button" data-bs-toggle="collapse" data-bs-target="#buisness" aria-expanded="false" aria-controls="buisness">
                                    <i class="bi-people nav-icon"></i>
                                    <span class="nav-link-title">Business</span>
                                </a>

                                <div id="buisness" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                    <a class="nav-link <?= $ac == 2 ? "active" : "" ?>" href="./buisness.php">Overview</a>
                                    <a class="nav-link <?= $ac == 3 ? "active" : "" ?>" href="./add-buisness.php">Business</a>                                
                                </div>
                            </div>                         
                        </div>
                        <!-- End Collapse -->
                        <div class="nav-item">
                            <a class="nav-link <?= $ac == 4 ? "active" : "" ?>" href="./city.php" data-placement="left">
                                <i class="bi-receipt nav-icon"></i>
                                <span class="nav-link-title">City</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link <?= $ac == 5 ? "active" : "" ?>" href="./category.php" data-placement="left">
                                <i class="bi-receipt nav-icon"></i>
                                <span class="nav-link-title">Category</span>
                            </a>
                        </div>
                        <!--                        <div class="nav-item">
                                                        <a class="nav-link <?= $ac == 9 ? "active" : "" ?>" href="./user-business-details.php" data-placement="left">
                                                            <i class="bi-receipt nav-icon"></i>
                                                            <span class="nav-link-title">Business Details</span>
                                                        </a>                            
                                                    </div>-->
                    <?php } ?>
                    <?php if ($_SESSION['type'] == 'user') { ?>
                        <!--                        <div class="nav-item">
                                                        <a class="nav-link dropdown-toggle <?= $ac == 7 || $ac == 8 || $ac == 9 || $ac == 10 || $ac == 11 || $ac == 12 || $ac == 13 || $ac == 14 || $ac == 15 || $ac == 16 || $ac == 17 || $ac == 18 || $ac == 19 || $ac == 20 || $ac == 21 || $ac == 22 || $ac == 23 ? "active" : "" ?>" href="#navbarVerticalMenuPagesUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                                                            <i class="bi-people nav-icon"></i>
                                                            <span class="nav-link-title">My Business</span>
                                                        </a>
                                                        <div id="navbarVerticalMenuPagesUsersMenu" class="nav-collapse <?= $ac == 7 || $ac == 8 || $ac == 9 || $ac == 10 || $ac == 11 || $ac == 12 || $ac == 13 || $ac == 14 || $ac == 15 || $ac == 16 || $ac == 17 || $ac == 18 || $ac == 19 || $ac == 20 || $ac == 21 || $ac == 22 || $ac == 23 ? "" : "collapse" ?> " data-bs-parent="#navbarVerticalMenuPagesMenu">                                                                
                            
                                                        </div>
                                                    </div>-->
                    <?php } ?>
                    <?php if ($_SESSION['type'] == 'business') { ?>
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle <?= $ac == 7 || $ac == 8 || $ac == 9 || $ac == 10 || $ac == 11 || $ac == 12 || $ac == 13 || $ac == 14 || $ac == 15 || $ac == 16 || $ac == 17 || $ac == 18 || $ac == 19 || $ac == 20 || $ac == 21 || $ac == 22 || $ac == 23 ? "active" : "" ?>" href="#navbarVerticalMenuPagesUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                                <i class="bi-people nav-icon"></i>
                                <span class="nav-link-title">My Business</span>
                            </a>
                            <div id="navbarVerticalMenuPagesUsersMenu" class="nav-collapse <?= $ac == 7 || $ac == 8 || $ac == 9 || $ac == 10 || $ac == 11 || $ac == 12 || $ac == 13 || $ac == 14 || $ac == 15 || $ac == 16 || $ac == 17 || $ac == 18 || $ac == 19 || $ac == 20 || $ac == 21 || $ac == 22 || $ac == 23 ? "" : "collapse" ?> " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link <?= $ac == 7 ? "active" : "" ?>" href="./business-templates.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Templates</a>                                
                                <!--<a class="nav-link <?= $ac == 8 ? "active" : "" ?>" href="./business-profile.php">My Profile</a>-->                                    
                                <a class="nav-link <?= $ac == 9 ? "active" : "" ?>" href="./user-business-details.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Business Details</a>
                                <a class="nav-link <?= $ac == 10 ? "active" : "" ?>" href="./social-media.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Social Media</a>                                
                                <a class="nav-link <?= $ac == 11 ? "active" : "" ?>" href="./business-product.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Products</a>
                                <a class="nav-link <?= $ac == 12 ? "active" : "" ?>" href="./business-hours.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Business Hours</a>
                                <a class="nav-link <?= $ac == 13 ? "active" : "" ?>" href="./business-appointments.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Appointments</a>
                                <a class="nav-link <?= $ac == 14 ? "active" : "" ?>" href="./business-gallery.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Gallery</a>
                                <a class="nav-link <?= $ac == 15 ? "active" : "" ?>" href="./business-services.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Services</a>
                                <a class="nav-link <?= $ac == 16 ? "active" : "" ?>" href="./business-offers.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Offers</a>
                                <a class="nav-link <?= $ac == 17 ? "active" : "" ?> " href="./business-certificate.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Certificate</a>
                                <a class="nav-link <?= $ac == 18 ? "active" : "" ?> " href="./business-payment-method.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Payments QR</a>
                                <a class="nav-link <?= $ac == 19 ? "active" : "" ?> " href="./business-seo.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">SEO</a>
                                <a class="nav-link <?= $ac == 20 ? "active" : "" ?> " href="./business-blogs.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Blogs</a>
                                <a class="nav-link <?= $ac == 21 ? "active" : "" ?> " href="./business-privacy-policy.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Privacy Policy</a>
                                <a class="nav-link <?= $ac == 22 ? "active" : "" ?> " href="./business-terms-condition.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Terms & Conditions</a>
                                <a class="nav-link <?= $ac == 23 ? "active" : "" ?> " href="./business-feedback.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>">Feedback</a>
                            </div>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link <?= $ac == 24 ? "active" : "" ?>" href="./business-enquiry.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>" data-placement="left">
                                <i class="bi-receipt nav-icon"></i>
                                <span class="nav-link-title">Enquiry</span>
                            </a>
                        </div> 
                        <div class="nav-item">
                            <a class="nav-link <?= $ac == 25 ? "active" : "" ?>" href="./business-appointments-details.php<?= isset($_SESSION['ub_id']) ? "?id=" . $_SESSION['ub_id'] : "" ?>" data-placement="left">
                                <i class="bi-receipt nav-icon"></i>
                                <span class="nav-link-title">Appointments</span>
                            </a>
                        </div> 
                    <?php } ?>
                    <span class="dropdown-header mt-4">Others Setting</span>
                    <small class="bi-three-dots nav-subtitle-replacer"></small>

                    <!--                    <div class="nav-item">
                                            <a class="nav-link " href="#" data-placement="left">
                                                <i class="bi-kanban nav-icon"></i>
                                                <span class="nav-link-title">Enquiry</span>
                                            </a>
                                        </div>
                    
                                        <div class="nav-item">
                                            <a class="nav-link " href="#" data-placement="left">
                                                <i class="bi-calendar-week nav-icon"></i>
                                                <span class="nav-link-title">Appointments</span>
                                            </a>
                                        </div>-->

                    <div class="nav-item">
                        <a class="nav-link " href="./logout.php" data-placement="left">
                            <i class="bi-receipt nav-icon"></i>
                            <span class="nav-link-title">Logout</span>
                        </a>
                    </div>               


                </div>

            </div>
            <!-- End Content -->

            <!-- Footer -->
            <div class="navbar-vertical-footer">
                <ul class="navbar-vertical-footer-list">
                    <li class="navbar-vertical-footer-list-item">
                        <!-- Style Switcher -->
                        <div class="dropdown dropup">
                            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>

                            </button>

                            <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                                <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                                    <i class="bi-moon-stars me-2"></i>
                                    <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                                </a>
                                <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                                    <i class="bi-brightness-high me-2"></i>
                                    <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
                                </a>
                                <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                                    <i class="bi-moon me-2"></i>
                                    <span class="text-truncate" title="Dark">Dark</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Style Switcher -->
                    </li>
                </ul>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</aside>