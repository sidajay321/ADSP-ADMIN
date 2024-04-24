<?php
$ac = 9;
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
        <title>User Business Details</title>

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
                            <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="true">Business Details</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <?php
//                        print_r($_SESSION);
                        if (isset($_REQUEST['id'])) {
                            $cu = $conn->link->query("SELECT * FROM `tb_user_business` where ub_id=" . $conn->encrypt_decrypt($_REQUEST['id'], 'decrypt'));
                            $cu_rec = $cu->fetch(PDO::FETCH_ASSOC);
                        }
//                        print_r($cu_rec);
                        ?>
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">                            
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h1 class="page-header-title">Business Details</h1>
                                    <?php
                                    if (isset($_REQUEST['id'])) {
                                        ?>
                                        <!--<a href="./user-business-details.php" class="btn btn-primary btn-sm">Add new Business</a>-->
                                        <?php
                                    }
                                    ?>
                                </div>                              
                                <br/>
                                <form method="post" action="./custom/rest/request.php" enctype="multipart/form-data">                                        
                                    <input type="hidden" readonly class="form-control" id="ub_id" name="ub_id" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_id'] : "" ?>">
                                    <div class="row"> 
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-12 mt-2">
                                                    <label for="ub_website_url" class="form-label">Business Website URL</label>
                                                    <input readonly type="text" class="form-control" id="ub_website_url" name="ub_website_url" value="http://user.bizzata.in/<?= isset($_REQUEST['id']) ? $cu_rec['ub_id'] : "" ?>">                                            
                                                </div> 
                                                <div class="col-sm-12 mt-2">
                                                    <label for="ub_business_name" class="form-label">Business Name</label>
                                                    <input type="text" class="form-control" id="ub_business_name" name="ub_business_name" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_business_name'] : "" ?>">                                            
                                                </div> 
                                            </div>
                                        </div>
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
                                    </div>
                                    <div class="row mt-3"> 
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-12 mt-2">
                                                    <label for="ub_description" class="form-label">Business Description</label>
                                                    <textarea rows="5" type="text" class="form-control" id="ub_description" name="ub_description"><?= isset($_REQUEST['id']) ? $cu_rec['ub_description'] : "" ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-12 mt-2">
                                                            <label for="ub_first_name" class="form-label">First Name</label>
                                                            <input required type="text" class="form-control" id="ub_first_name" name="ub_first_name" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_first_name'] : "" ?>">                                            
                                                        </div> 
                                                        <div class="col-sm-12 mt-2">
                                                            <label for="ub_last_name" class="form-label">Last Name</label>
                                                            <input type="text" class="form-control" id="ub_last_name" name="ub_last_name" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_last_name'] : "" ?>">                                            
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-12 mt-2">
                                                            <label for="ub_whatsapp_number" class="form-label">Business Whatsapp Number</label>
                                                            <input type="number" class="form-control" id="ub_whatsapp_number" name="ub_whatsapp_number" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_whatsapp_number'] : "" ?>">                                            
                                                        </div> 
                                                        <div class="col-sm-12 mt-2">
                                                            <label for="ub_alternate_number" class="form-label">Alternate Number</label>
                                                            <input type="number" class="form-control" id="ub_alternate_number" name="ub_alternate_number" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_alternate_number'] : "" ?>">                                            
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">     
                                        <div class="col-sm-4 mt-2">
                                            <label for="ub_email" class="form-label">Business E-Mail</label>
                                            <input required type="email" class="form-control" id="ub_email" name="ub_email" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_email'] : "" ?>">                                            
                                        </div> 
                                        <?php if (!isset($_REQUEST['id'])) { ?>
                                            <div class="col-sm-4 mt-2">
                                                <label for="ub_password" class="form-label">Password</label>
                                                <input required type="password" class="form-control" id="ub_password" name="ub_password" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_password'] : "" ?>">                                            
                                            </div>
                                        <?php } ?>
                                        <div class="col-sm-4 mt-2">
                                            <label for="ub_address" class="form-label">Business Address</label>
                                            <input required type="text" required class="form-control" id="ub_address" name="ub_address" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_address'] : "" ?>">
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label for="ub_zipcode" class="form-label">Zip Code</label>
                                            <input type="numer" required class="form-control" id="ub_zipcode" name="ub_zipcode" value="<?= isset($_REQUEST['id']) ? $cu_rec['ub_zipcode'] : "" ?>">
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
                                    <div class="d-flex justify-content-end gap-3">                               

                                        <button type="submit" class="btn btn-primary btn-sm" name="user_business_<?= isset($_REQUEST['id']) ? "update" : "save" ?>" id="user_business_<?= isset($_REQUEST['id']) ? "update" : "save" ?>" value="user_business_<?= isset($_REQUEST['id']) ? "update" : "save" ?>"><?= isset($_REQUEST['id']) ? "Update" : "Save" ?></button>
                                        <button type="reset" class="btn btn-primary btn-sm"  name="user_business_reset" id="user_business_reset" value="user_business_reset">Reset</button>
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
            var map;
            var mapMarker;
            var urlInput;

            function loadGoogleMap() {
                var mapContainer = document.getElementById("map-container");
                urlInput = document.getElementById("ub_google_map_url");

                // Clear the previous map if exists
                mapContainer.innerHTML = "";

                // Create map element
                map = new google.maps.Map(mapContainer, {
                    center: {lat: 20.5937, lng: 78.9629},
                    zoom: 5
                });

                // Ensure google.maps.places is properly loaded
                if (google.maps.places) {
                    // Create a search box and link it to the UI element
                    var searchInput = document.getElementById('searchInput');
                    var searchBox = new google.maps.places.SearchBox(searchInput);
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(searchInput);

                    // Bias the SearchBox results towards current map's viewport
                    map.addListener('bounds_changed', function () {
                        searchBox.setBounds(map.getBounds());
                    });

                    // Listen for the event fired when the user selects a prediction and retrieve
                    // more details for that place
                    searchBox.addListener('places_changed', function () {
                        var places = searchBox.getPlaces();

                        if (places.length === 0) {
                            return;
                        }

                        // Clear out the old markers
                        if (mapMarker) {
                            mapMarker.setMap(null);
                        }

                        // For each place, get the icon, name and location
                        var bounds = new google.maps.LatLngBounds();
                        places.forEach(function (place) {
                            if (!place.geometry) {
                                console.log("Returned place contains no geometry");
                                return;
                            }
                            // Create a marker for each place
                            mapMarker = new google.maps.Marker({
                                map: map,
                                title: place.name,
                                position: place.geometry.location
                            });

                            if (place.geometry.viewport) {
                                // Only geocodes have viewport
                                bounds.union(place.geometry.viewport);
                            } else {
                                bounds.extend(place.geometry.location);
                            }
                        });
                        map.fitBounds(bounds);
                    });

                    // Add click event listener to the map
                    google.maps.event.addListener(map, 'click', function (event) {
                        placeMarker(event.latLng);
                    });
                } else {
                    console.error('Google Places API not properly loaded.');
                }
            }

            function placeMarker(location) {
                // Clear previous marker
                if (mapMarker) {
                    mapMarker.setMap(null);
                }
                // Place new marker
                mapMarker = new google.maps.Marker({
                    position: location,
                    map: map
                });

                // Populate input field with coordinates
                urlInput.value = location.lat() + "," + location.lng();

                // Close the modal
                var modal = document.getElementById('mapModal');
                var bootstrapModal = new bootstrap.Modal(modal); // Correct initialization
                bootstrapModal.hide();
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ2QsY7RNZCrBsBkhyrgdHxmvBP9yLHN4&libraries=places&callback=initMap" async defer></script>


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