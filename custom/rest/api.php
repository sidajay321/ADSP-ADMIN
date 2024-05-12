<?php

// Enable CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

date_default_timezone_set("Asia/Kolkata");
$date = date('Y-m-d H:i:s');
include('../connection/dbconnect.php');
$conn = new Connection();

// Function to check token validity
function checkToken($conn, $token) {
    $stmt = $conn->link->prepare("SELECT to_token FROM token WHERE to_token = ?");
    $stmt->execute([$token]);
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($rec !== false); // If token exists, return true
}

// Your API functions...
// Example API endpoint
if (isset($_REQUEST['getCategoryData'])) {
    if (!isset($_REQUEST['ca_id'])) {
        echo '{"status": false, "msg": "Category ID not provided"}';
        exit;
    }

    try {
        $ca_id = $_REQUEST['ca_id'];
        $stmt = $conn->link->query("SELECT * FROM tb_category WHERE ca_id = $ca_id");
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rec != null) {
            echo '{"status": true, "data":' . json_encode($rec) . '}';
        } else {
            echo '{"status": false, "msg": "Category not found"}';
        }
    } catch (Exception $ex) {
        echo '{"status": false, "msg":"' . $ex->getMessage() . '"}';
    }
} elseif (isset($_REQUEST['getCategoryCityData'])) {
    if (!isset($_REQUEST['bd_category']) && !isset($_REQUEST['bd_city'])) {
        echo '{"status": false, "msg": "Correct ID not provided"}';
        exit;
    }

    try {
        $bd_category = $_REQUEST['bd_category'];
        $bd_city = $_REQUEST['bd_city'];
        $stmt = $conn->link->query("SELECT * FROM tb_business_details WHERE bd_category = $bd_category AND bd_city=$bd_city");
        $rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($rec != null) {
            echo '{"status": true, "data":' . json_encode($rec) . '}';
        } else {
            echo '{"status": false, "msg": "Category not found"}';
        }
    } catch (Exception $ex) {
        echo '{"status": false, "msg":"' . $ex->getMessage() . '"}';
    }
} elseif (isset($_REQUEST['getBusinessData'])) {
    if (!isset($_REQUEST['businessId'])) {
        echo '{"status": false, "msg": "Correct ID not provided"}';
        exit;
    }

    try {
        $businessId = $_REQUEST['businessId'];
        $stmt = $conn->link->query("SELECT * FROM tb_business_details bd JOIN tb_buisness_cities bi ON bd.bd_city=bi.bc_id JOIN tb_category ca ON bd.bd_category=ca.ca_id WHERE bd.bd_business_id='$businessId'");
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        $st = $conn->link->query("SELECT * FROM `tb_buisness_category` bc JOIN tb_category ca ON bc.bca_bc_id=ca.ca_id WHERE bc.bca_bd_id='{$rec['bd_id']}'");
        $re = $st->fetchAll(PDO::FETCH_ASSOC);
        if ($rec != null) {
            echo '{"status": true, "data":' . json_encode($rec) . ',"catData":' . json_encode($re) . '}';
        } else {
            echo '{"status": false, "msg": "Category not found"}';
        }
    } catch (Exception $ex) {
        echo '{"status": false, "msg":"' . $ex->getMessage() . '"}';
    }
} elseif (isset($_REQUEST['getUserBusinessData'])) {
    if (!isset($_REQUEST['businessId'])) {
        echo '{"status": false, "msg": "Correct ID not provided"}';
        exit;
    }
    try {
        $bId = $_REQUEST['businessId'];
        $stm = $conn->link->query("SELECT * FROM tb_business_details tb JOIN tb_buisness_cities tbc ON tb.bd_city=tbc.bc_id JOIN tb_category tca ON tb.bd_category=tca.ca_id where tb.bd_business_id='$bId'");
        $re = $stm->fetch(PDO::FETCH_ASSOC);
        $businessId = $re ? $re['bd_id'] : "";
        $stmt = $conn->link->query("SELECT * FROM `tb_user_business` where ub_us_id='$businessId'");
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt1 = $conn->link->query("SELECT * FROM `tb_business_blog` where bb_ub_id='$businessId'");
        $rec1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $stmt2 = $conn->link->query("SELECT * FROM `tb_business_certicate` where bce_ub_id='$businessId'");
        $rec2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $stmt3 = $conn->link->query("SELECT * FROM `tb_business_enquiry` where be_ub_id='$businessId'");
        $rec3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        $stmt4 = $conn->link->query("SELECT * FROM `tb_business_feedback` where bf_ub_id='$businessId'");
        $rec4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
        $stmt5 = $conn->link->query("SELECT * FROM `tb_business_gallery` where bg_ub_id='$businessId'");
        $rec5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
        $stmt6 = $conn->link->query("SELECT * FROM `tb_business_offers` where bo_ub_id='$businessId'");
        $rec6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);
        $stmt7 = $conn->link->query("SELECT * FROM `tb_business_payment` where bpa_ub_id='$businessId'");
        $rec7 = $stmt7->fetchAll(PDO::FETCH_ASSOC);
        $stmt8 = $conn->link->query("SELECT * FROM `tb_business_product` where bp_ub_id='$businessId'");
        $rec8 = $stmt8->fetchAll(PDO::FETCH_ASSOC);
        $stmt9 = $conn->link->query("SELECT * FROM `tb_business_services` where bs_ub_id='$businessId'");
        $rec9 = $stmt9->fetchAll(PDO::FETCH_ASSOC);
        $stmt10 = $conn->link->query("SELECT * FROM `tb_business_hours` where bh_ub_id='$businessId'");
        $rec10 = $stmt10->fetchAll(PDO::FETCH_ASSOC);

        if ($rec != null) {
//            echo '{"status": true, "data":' . json_encode($rec) . ',"catData":' . json_encode($re) . '}';
            echo '{"status":true,"userData":' . json_encode($re) . ',"businessData":' . json_encode($rec) . ',"businessBlog":' . json_encode($rec1) . ',"businessCerticate":' . json_encode($rec2) . ',"businessEnquiry":' . json_encode($rec3) . ',"businessFeedback":' . json_encode($rec4) . ',"businessGallery":' . json_encode($rec5) . ',"businessOffers":' . json_encode($rec6) . ',"businessPayment":' . json_encode($rec7) . ',"businessProduct":' . json_encode($rec8) . ',"businessServices":' . json_encode($rec9) . ',"businessHours":' . json_encode($rec10) . '}';
        } else {
            echo '{"status": false, "msg": "Data not found"}';
        }
    } catch (Exception $ex) {
        echo '{"status": false, "msg":"' . $ex->getMessage() . '"}';
    }
}
?>
