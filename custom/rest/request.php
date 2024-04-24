<?php

ob_start();
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
$date = date('Y-m-d H:i:s');
include('../connection/dbconnect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';
//Load Composer's autoloader
//require 'vendor/autoload.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
//Server settings
$mail->SMTPDebug = 1;                                 // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->CharSet = "UTF-8";
$mail->Host = 'smtp.hostinger.in';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'apr@wishadish.esy.es';                 // SMTP username
$mail->Password = 'Test981@';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
//Recipients
$mail->setFrom('apr@wishadish.esy.es', 'Dhyan Foundation');
$mail->Priority = 1;
// MS Outlook custom header
// May set to "Urgent" or "Highest" rather than "High"
$mail->AddCustomHeader("X-MSMail-Priority: High");
// Not sure if Priority will also set the Importance header:
$mail->AddCustomHeader("Importance: High");

function mail_function($email, $subject, $body, $altbody) {



    global $mail;

    $mail->addAddress($email);     // Add a recipient
    //$mail->addAddress('receipient mail');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('mails@prepca.com');
    // $mail->addBCC('eleggantlt@gmail.com');
    //Attachments
    // $mail->addAttachment('/var/www/html/mail/data/What press is saying.pdf');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = $altbody;

    $mail->send();
    return 1;
}

$conn = new Connection();
$allowedExts = array("pdf", "PDF", "jpg", "JPG", "jpeg", "JPEG", "png", "PNG");
$sitemapPath = '../../xml/sitemap.xml';
$sitemap = null;

//Load Composer's autoloader
//require 'vendor/autoload.php';




$allowedExts = array("pdf", "PDF", "jpg", "JPG", "jpeg", "JPEG", "png", "PNG");
$folder = '../../assets/uploads/';

function uploadFile($fileName, $folder, $newfilename) {
    $image = $_FILES[$fileName]["name"];
    $file_tmp = $_FILES[$fileName]["tmp_name"];
    $size = $_FILES[$fileName]['size'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    if (in_array($ext, $GLOBALS['allowedExts'])) {
        $uploadFile = $newfilename . '.' . $ext;
        move_uploaded_file($_FILES[$fileName]["tmp_name"], $folder . $uploadFile);
        return $uploadFile;
    } else {
        return "error";
    }
}

function generateID($tableName, $field, $conn) {
    $img = $conn->link->query("SELECT max($field) FROM $tableName");
    //$img = $conn->link->query("SELECT max(vr_id) FROM volunteer_registration");
    $rec = $img->fetch(PDO::FETCH_ASSOC);
    $id = $rec['max(' . $field . ')'] + 1;
    return $id;
}

function checkToken($conn, $token) {
    $img = $conn->link->query("SELECT to_token FROM token where to_token like'$token'");
    $rec = $img->fetch(PDO::FETCH_ASSOC);
    if ($rec == NULL) {
        return true;
    } else {
        return true;
    }
}

function getCityName($conn, $cityId) {
    $img = $conn->link->query("SELECT bc_name FROM tb_buisness_cities where bc_id=" . $cityId);
    $rec = $img->fetch(PDO::FETCH_ASSOC);
    return $rec['bc_name'];
}

function getCategoryName($conn, $catId) {
    $img = $conn->link->query("SELECT ca_name FROM tb_category where ca_id=" . $catId);
    $rec = $img->fetch(PDO::FETCH_ASSOC);
    return $rec['ca_name'];
}

if (isset($_REQUEST['login_request'])) {
    if ((isset($_REQUEST['username'])) && (filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING)))
        $ui = $_REQUEST['username'];
    if ((isset($_REQUEST['password'])) && (filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING))) {
        $pw = $_REQUEST['password'];
        $pass = hash("sha512", $pw);
    }
    if ($_REQUEST['bd_type'] == 'admin')
        $stmt = $conn->link->prepare("SELECT * FROM tb_user_login where ul_username=:ui and ul_password=:pw");
    else if ($_REQUEST['bd_type'] == 'business') {
        $stmt = $conn->link->prepare("SELECT * FROM tb_user_business where ub_email=:ui and ub_password=:pw");
    } else {
        $stmt = $conn->link->prepare("SELECT * FROM tb_user where us_email=:ui and us_password=:pw");
    }
    $stmt->bindValue(':ui', $ui);
    $stmt->bindValue(':pw', $pass);
    $stmt->execute();
    $re_th = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($re_th);
    if ($re_th == NULL) {
        $_SESSION['msg'] = "Invalid User Id OR/AND Password!";
        header("location:../../user-authentication.php");
    } else {
        if ($_REQUEST['bd_type'] == 'admin') {
            if ($ui == $re_th['ul_username'] && $pass == $re_th['ul_password']) {
                $_SESSION['tl_userid'] = $re_th['ul_id'];
                $_SESSION['type'] = $re_th['type'];
                $_SESSION['tl_username'] = $re_th['ul_username'];
                $_SESSION['tl_name'] = $re_th['ul_firstname'] . " " . $re_th['ul_surname'];
                $_SESSION['tl_status'] = $re_th['ul_status'];
                header("location:../../index.php");
            } else {
                $_SESSION['msg'] = "Invalid Id OR/AND Password!";
                header("location:../../user-authentication.php");
            }
        } else if ($_REQUEST['bd_type'] == 'business') {
            if ($ui == $re_th['ub_email'] && $pass == $re_th['ub_password']) {
                $_SESSION['tl_userid'] = $re_th['ub_id'];
                $_SESSION['type'] = 'business';
                $_SESSION['tl_username'] = $re_th['ub_first_name'];
                $_SESSION['tl_name'] = $re_th['ub_first_name'] . " " . $re_th['ub_last_name'];
                $_SESSION['tl_status'] = $re_th['ub_active'];
                $_SESSION['us_profile_photo'] = $re_th['ub_logo'];
                header("location:../../user-dashboard.php?id=" . $conn->encrypt_decrypt($re_th['ub_id'], 'encrypt'));
            } else {
                $_SESSION['msg'] = "Invalid Id OR/AND Password!";
                header("location:../../user-authentication.php");
            }
        } else {
            if ($ui == $re_th['us_email'] && $pass == $re_th['us_password']) {
                //                print_r($_SESSION);
                $_SESSION['tl_userid'] = $re_th['us_id'];
                $_SESSION['type'] = $re_th['type'];
                $_SESSION['tl_username'] = $re_th['us_email'];
                $_SESSION['tl_name'] = $re_th['us_first_name'] . " " . $re_th['us_last_name'];
                $_SESSION['tl_status'] = $re_th['us_active'];
                $_SESSION['us_profile_photo'] = $re_th['us_profile_photo'];
                header("location:../../user-dashboard.php");
            } else {
                $_SESSION['msg'] = "Invalid Id OR/AND Password!";
                header("location:../../user-authentication.php");
            }
        }
    }
} else if (isset($_REQUEST['fetch_state'])) {
    $qry = $conn->link->prepare("SELECT * FROM tb_states");
    $qry->execute();
    $arr = $qry->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($arr);
} else if (isset($_REQUEST['fetch_city'])) {
    $qry = $conn->link->prepare("SELECT * FROM tb_buisness_cities");
    $qry->execute();
    $arr = $qry->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($arr);
} else if (isset($_REQUEST['fetch_category'])) {
    $qry = $conn->link->prepare("SELECT * FROM tb_category");
    $qry->execute();
    $arr = $qry->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($arr);
} else if (isset($_REQUEST['fetch_sub_category'])) {
    $qry = $conn->link->prepare("SELECT * FROM tb_category WHERE ca_id <> ?");
    $qry->execute([$_REQUEST['bd_category']]);
    $arr = $qry->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($arr);
} else if (isset($_REQUEST['add_city'])) {
    try {
        if ($conn->isRecordExsistInTable("tb_buisness_cities", "WHERE bc_name='{$_REQUEST['bc_name']}'")) {
            echo '{"status":false,"msg":"Reocrd with this city already present !"}';
            return;
        }
        if (isset($_REQUEST['bc_id'])) {
            $setValue = "`bc_name` = '{$_REQUEST['bc_name']}'";
            $condition = "WHERE `tb_buisness_cities`.`bc_id` = {$_REQUEST['bc_id']}";
            if ($conn->updateDataInTable("tb_buisness_cities", $setValue, $condition)) {
                echo '{"status":true,"msg":"Data Updated"}';
            } else {
                echo '{"status":false,"msg":"Problem in Data Saved"}';
            }
        } else {
            $fieldsNames = "`bc_name`";
            $fieldValue = "'{$_REQUEST['bc_name']}'";
            if ($conn->insertDataInTable("tb_buisness_cities", $fieldsNames, $fieldValue)) {
                echo '{"status":true,"msg":"Data Saved"}';
            } else {
                echo '{"status":false,"msg":"Problem in Data Saved"}';
            }
        }
    } catch (Exception $ex) {
        echo '{"status":false,"msg":"Problem in Data Saved"}';
    }
} else if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete_city') {
    print_r($_REQUEST);
    try {
        $conn->link->query("DELETE FROM tb_buisness_cities WHERE bc_id = {$_REQUEST['id']}");
        $_SESSION['msg'] = "Data Delete !";
        header("location:../../city.php");
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in Data Delete";
        header("location:../../city.php");
    }
} else if (isset($_REQUEST['add_category'])) {
    print_r($_REQUEST);
    try {
        if ($conn->isRecordExsistInTable("tb_category", "WHERE ca_name='{$_REQUEST['ca_name']}'")) {
            //            echo '{"status":false,"msg":"Reocrd with this city already present !"}';
            $_SESSION['msg'] = "Reocrd with this category already present !";
            header("location:../../category.php");
            return;
        }
        $ca_id = generateID("tb_category", "ca_id", $conn);
        $fieldsNames = "`ca_id`,`ca_bd_url`,`ca_name`,`ca_meta_title`,`ca_meta_keywords`,`ca_meta_description`";
        $fieldValue = "'$ca_id','{$_REQUEST['ca_bd_url']}','{$_REQUEST['ca_name']}','{$_REQUEST['ca_meta_title']}','{$_REQUEST['ca_meta_keywords']}','{$_REQUEST['ca_meta_description']}'";
        if ($conn->insertDataInTable("tb_category", $fieldsNames, $fieldValue)) {
            if (!file_exists($sitemapPath)) {
                $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
            } else {
                $sitemap = simplexml_load_file($sitemapPath);
            }

            $url = $sitemap->addChild('url');
            $url->addChild('loc', $_REQUEST['ca_bd_url'] . urlencode($_REQUEST['ca_name']) . '/key-' . $ca_id . '-CAT');
            $url->addChild('lastmod', date('c'));
            $url->addChild('priority', '0.8');
            $sitemap->asXML($sitemapPath);
            //            echo '{"status":true,"msg":"Data Saved"}';
            $_SESSION['msg'] = "Data Saved";
            header("location:../../category.php");
        } else {
            //            echo '{"status":false,"msg":"Problem in Data Saved"}';
            $_SESSION['msg'] = "Problem in Data Saved";
            header("location:../../category.php");
        }
    } catch (Exception $ex) {
        //        echo '{"status":false,"msg":"Problem in Data Saved"}';
        $_SESSION['msg'] = "Problem in Data Saved";
        header("location:../../category.php");
    }
} else if (isset($_REQUEST['update_category'])) {
    extract($_POST);
    try {
        $img = $conn->link->query("SELECT * from tb_category where ca_id=$ca_id");
        $rec = $img->fetch(PDO::FETCH_ASSOC);
        if ($rec['ca_name'] != $_REQUEST['ca_name']) {
            if ($conn->isRecordExsistInTable("tb_category", "WHERE ca_name='{$_REQUEST['ca_name']}'")) {
                $_SESSION['msg'] = "Reocrd with this category already present !";
                header("location:../../category.php");
                return;
            }
        }
        $setValue = "`ca_name` = '$ca_name', `ca_meta_title` = '$ca_meta_title', `ca_meta_keywords` = '$ca_meta_keywords', `ca_meta_description` = '$ca_meta_description'";
        $condition = "WHERE `tb_category`.`ca_id` = $ca_id";
        $oldUrl = $rec['ca_bd_url'] . urlencode($rec['ca_name']) . '/key-' . $rec['ca_id'] . '-CAT';
        if ($conn->updateDataInTable("tb_category", $setValue, $condition)) {
            if (!file_exists($sitemapPath)) {
                $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
            } else {
                $sitemap = simplexml_load_file($sitemapPath);
            }
            foreach ($sitemap->url as $url) {
                if ((string) $url->loc == $oldUrl) {
                    $url->loc = $_REQUEST['ca_bd_url'] . urlencode($_REQUEST['ca_name']) . '/key-' . $ca_id . '-CAT';
                    $url->lastmod = date('c');
                    break;
                }
            }
            $sitemap->asXML($sitemapPath);
            $_SESSION['msg'] = "Data update !";
            header("location:../../category.php");
        } else {
            $_SESSION['msg'] = "Error in updating data !";
            header("location:../../category.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in Data Update";
        header("location:../../category.php");
    }
} else if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete_category') {

    try {
        $ca_id = $_REQUEST['id'];
        $img = $conn->link->query("SELECT * FROM tb_category WHERE ca_id = $ca_id");
        $rec = $img->fetch(PDO::FETCH_ASSOC);
        $oldUrl = $rec['ca_bd_url'] . urlencode($rec['ca_name']) . '/key-' . $rec['ca_id'] . '-CAT';

        if (!file_exists($sitemapPath)) {
            $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
        } else {
            $sitemap = simplexml_load_file($sitemapPath);
        }
        $sitemap->registerXPathNamespace('ns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $nodes = $sitemap->xpath("//ns:url[ns:loc='$oldUrl']");
        foreach ($nodes as $node) {
            $dom = dom_import_simplexml($node);
            $dom->parentNode->removeChild($dom);
        }
        $result = $sitemap->asXML($sitemapPath);
        if ($result)
            $del = $conn->link->query("DELETE FROM tb_category WHERE ca_id = $ca_id");
        $_SESSION['msg'] = "Data Delete !";
        header("location:../../category.php");
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in Data Delete";
        header("location:../../category.php");
    }
} else if (isset($_REQUEST['save_sub_category'])) {
    try {
        if ($conn->isRecordExsistInTable("tb_sub_category", "WHERE sc_name='{$_REQUEST['ca_name']}'")) {
            $_SESSION['msg'] = "Reocrd with this category already present !";
            header("location:../../add-buisness.php");
            return;
        }
        $fieldsNames = "`sc_ca_id`,`sc_name`,`sc_added_date`";
        $fieldValue = "'{$_REQUEST['sc_ca_id']}','{$_REQUEST['sc_name']}','$date'";
        if ($conn->insertDataInTable("tb_sub_category", $fieldsNames, $fieldValue)) {
            $_SESSION['msg'] = "Category Saved";
            header("location:../../add-buisness.php");
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../add-buisness.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../add-buisness.php");
    }
} else if (isset($_REQUEST['save_buisness'])) {
    try {
        extract($_POST);

        $bd_id = generateID("tb_business_details", "bd_id", $conn);
        $businessID = "BI{$bd_id}BN{$bd_city}{$bd_category}";
        $fieldsNames = "`bd_user_id`,`bd_business_name`,`bd_business_id`,`bd_url`,`bd_city`,`bd_category`,`bd_meta_title`,`bd_meta_keywords`,`bd_meta_description`,`bd_added_date`";
        $fieldValue = "'{$_SESSION['tl_userid']}','$bd_business_name','$businessID','$bd_url','$bd_city','$bd_category','$bd_meta_title','$bd_meta_keywords','$bd_meta_description','$date'";
        if ($conn->insertDataInTable("tb_business_details", $fieldsNames, $fieldValue)) {

            if (!file_exists($sitemapPath)) {
                $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
            } else {
                $sitemap = simplexml_load_file($sitemapPath);
            }

            $url = $sitemap->addChild('url');
            $url->addChild('loc', $bd_url . $bd_business_name . '/key-' . $businessID);
            $url->addChild('lastmod', date('c'));
            $url->addChild('priority', '0.8');

            $url = $sitemap->addChild('url');
            $url->addChild('loc', $bd_url . urlencode(getCityName($conn, $bd_city)) . '/' . urlencode(getCategoryName($conn, $bd_category)) . "-in-" . urlencode(getCityName($conn, $bd_city)) . '/key-' . $bd_id . '_' . $bd_category . '_' . $bd_city . '-CAT');
            $url->addChild('lastmod', date('c'));
            $url->addChild('priority', '0.8');
            if (is_array($bd_sub_category) && count($bd_sub_category) > 0) {
                foreach ($bd_sub_category as $i => $cr) {
                    $bca_id = generateID("tb_buisness_category", "bca_id", $conn);
                    $fieldsNamesSub = "`bca_bd_id`,`bca_bc_id`";
                    $fieldValueSub = "'$bd_id','{$cr}'";
                    $conn->insertDataInTable("tb_buisness_category", $fieldsNamesSub, $fieldValueSub);
                    $url = $sitemap->addChild('url');
                    $url->addChild('loc', $bd_url . urlencode(getCityName($conn, $bd_city)) . '/' . urlencode(getCategoryName($conn, $cr)) . "-in-" . urlencode(getCityName($conn, $bd_city)) . '/key-' . $bca_id . '_' . $cr . '_' . $bd_city . '-CAT');
                    $url->addChild('lastmod', date('c'));
                    $url->addChild('priority', '0.8');
                }
            }
            $sitemap->asXML($sitemapPath);
            $_SESSION['msg'] = "Buisness Data Saved";
            header("location:../../add-buisness.php");
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../add-buisness.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../add-buisness.php");
    }
} else if (isset($_REQUEST['update_business'])) {
    try {
        extract($_POST);
        if ($conn->isRecordExsistInTable("tb_category", "WHERE bd_business_name='{$_REQUEST['bd_business_name']}'")) {
            $_SESSION['msg'] = "Reocrd with this name already present !";
            header("location:../../add-buisness.php");
            return;
        }
        $setValue = "`bd_business_name` = '$bd_business_name', `bd_url` = '$bd_url', `bd_city` = '$bd_city', `bd_category` = '$bd_category', `bd_meta_title` = '$bd_meta_title', `bd_meta_keywords` = '$bd_meta_keywords', `bd_meta_description` = '$bd_meta_description'";
        $condition = "WHERE `tb_business_details`.`bd_id` = $bd_id";
        //fetch old url
        $cu_ci_si = $conn->link->query("SELECT * FROM tb_business_details where bd_id=" . $bd_id);
        $cu_si = $cu_ci_si->fetch(PDO::FETCH_ASSOC);
        $oldMainUrl = $cu_si['bd_url'] . urlencode(getCityName($conn, $cu_si['bd_city'])) . '/' . urlencode(getCategoryName($conn, $cu_si['bd_category'])) . "-in-" . urlencode(getCityName($conn, $cu_si['bd_city'])) . '/key-' . $cu_si['bd_id'] . '_' . $cu_si['bd_category'] . '_' . $cu_si['bd_city'] . '-CAT';
        echo $oldMainUrl;
        if ($conn->updateDataInTable("tb_business_details", $setValue, $condition)) {
            if (!file_exists($sitemapPath)) {
                $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
            } else {
                $sitemap = simplexml_load_file($sitemapPath);
            }
            foreach ($sitemap->url as $url) {
                if ((string) $url->loc == $oldMainUrl) {
                    $url->loc = $bd_url . urlencode(getCityName($conn, $bd_city)) . '/' . urlencode(getCategoryName($conn, $bd_category)) . "-in-" . urlencode(getCityName($conn, $bd_city)) . '/key-' . $bd_id . '_' . $bd_category . '_' . $bd_city . '-CAT';
                    $url->lastmod = date('c');
                    break;
                }
            }
            $sitemap->asXML($sitemapPath);

            $cu_c = $conn->link->query("SELECT * FROM tb_buisness_category where bca_bd_id=" . $cu_si['bd_id']);
            $cu_ci_rec = $cu_c->fetchAll(PDO::FETCH_ASSOC);
            $oldUrl = [];
            foreach ($cu_ci_rec as $cr) {
                array_push($oldUrl, $cu_si['bd_url'] . urlencode(getCityName($conn, $cu_si['bd_city'])) . '/' . urlencode(getCategoryName($conn, $cr['bca_bc_id'])) . "-in-" . urlencode(getCityName($conn, $cu_si['bd_city'])) . '/key-' . $cr['bca_id'] . '_' . $cr['bca_bc_id'] . '_' . $cu_si['bd_city'] . '-CAT');
            }
            $nodesToRemove = [];

            foreach ($oldUrl as $old) {
                $sitemap->registerXPathNamespace('ns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
                $nodes = $sitemap->xpath("//ns:url[ns:loc='$old']");
                foreach ($nodes as $node) {
                    $nodesToRemove[] = $node;
                }
            }
            foreach ($nodesToRemove as $node) {
                $dom = dom_import_simplexml($node);
                $dom->parentNode->removeChild($dom);
            }
            $sitemap->asXML($sitemapPath);
            //print_r($oldUrl);
            //delete and update new business category
            $conn->link->query("DELETE FROM tb_buisness_category WHERE bca_bd_id = $bd_id");
            foreach ($bd_sub_category as $i => $cr) {
                $bca_id = generateID("tb_buisness_category", "bca_id", $conn);
                $fieldsNamesSub = "`bca_bd_id`,`bca_bc_id`";
                $fieldValueSub = "'$bd_id','{$cr}'";
                $conn->insertDataInTable("tb_buisness_category", $fieldsNamesSub, $fieldValueSub);
                $url = $sitemap->addChild('url');
                $url->addChild('loc', $bd_url . urlencode(getCityName($conn, $bd_city)) . '/' . urlencode(getCategoryName($conn, $cr)) . "-in-" . urlencode(getCityName($conn, $bd_city)) . '/key-' . $bca_id . '_' . $cr . '_' . $bd_city . '-CAT');
                $url->addChild('lastmod', date('c'));
                $url->addChild('priority', '0.8');
            }
            $sitemap->asXML($sitemapPath);
            $_SESSION['msg'] = "Buisness Data update";
            header("location:../../add-buisness.php");
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../add-buisness.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../add-buisness.php");
    }
} else if (isset($_REQUEST['fetch_category_data'])) {
    $ca_id = $_REQUEST['ca_id'];
    $img = $conn->link->query("SELECT * from tb_category where ca_id=$ca_id");
    $rec = $img->fetch(PDO::FETCH_ASSOC);
} else if (isset($_REQUEST['getCategoryData'])) {
    try {
        $img = $conn->link->query("SELECT * from tb_category where ca_id={$_REQUEST['ca_id']}");
        $rec = $img->fetch(PDO::FETCH_ASSOC);
        if ($rec != null)
            echo '{"status": true,"data":' . json_encode($rec) . '}';
        else
            echo '{"status": false}';
    } catch (Exception $ex) {
        echo '{status:"false", "msg":"' . $ex->getMessage() . '"}';
    }
} else if (isset($_REQUEST['user_save'])) {
    //    print_r($_REQUEST);
    //    print_r($_FILES);
    try {
        $us_id = generateID("tb_user", "us_id", $conn);
        extract($_POST);
        $us_password = hash("sha512", $us_password);
        if ($_FILES["us_profile_photo"]["name"])
            $us_profile_photo_result = uploadFile("us_profile_photo", "../../assets/uploads/", 'us_profile' . $us_id);
        $ub_password = hash("sha512", $ub_password);
        $fieldsNames = "`us_id`,`us_profile_photo`, `us_first_name`, `us_last_name`, `us_email`,`ub_password`, `us_organisation`, `us_phone_number`, `us_address`, `us_state`, `us_zipcode`, `us_country`, `us_language`, `us_timezone`, `us_currency`,`us_password`, `us_active`, `us_added_date`";
        $fieldValue = "'$us_id', '$us_profile_photo_result', '$us_first_name', '$us_last_name', '$us_email','$ub_password', '$us_organisation', '$us_phone_number', '$us_address', '$us_state', '$us_zipcode', '$us_country', '$us_language', '$us_timezone', '$us_currency','$us_password', 'a', '$date'";
        if ($conn->insertDataInTable("tb_user", $fieldsNames, $fieldValue)) {
            $_SESSION['msg'] = "User Data Saved";
            header("location:../../user-account-details.php");
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../user-account-details.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../user-account-details.php");
    }
} else if (isset($_REQUEST['user_business_save'])) {
    try {
        extract($_POST);
        $ub_id = generateID("tb_user_business", "ub_id", $conn);
        $ub_password = hash("sha512", $ub_password);
        if ($_FILES["ub_logo"]["name"])
            $ub_logo_result = uploadFile("ub_logo", "../../assets/uploads/", 'ub_logo' . $ub_id);
        if ($_FILES["ub_cover_image"]["name"])
            $ub_cover_result = uploadFile("ub_cover_image", "../../assets/uploads/", 'ub_cover_image' . $ub_id);
        $fieldsNames = "`ub_id`, `ub_us_id`, `ub_website_url`, `ub_business_name`, `ub_logo`, `ub_cover_image`, `ub_description`, `ub_first_name`, `ub_last_name`, `ub_whatsapp_number`, `ub_alternate_number`, `ub_email`,`ub_password`, `ub_address`, `ub_zipcode`, `ub_alternate_email`, `ub_state`, `ub_language`, `ub_google_map_url`, `ub_district`, `ub_business_segment`, `ub_active`, `ub_added_on`";
        $fieldValue = "'$ub_id', '{$_SESSION['tl_userid']}', '$ub_website_url', '$ub_business_name', '$ub_logo_result', '$ub_cover_result', '$ub_description', '$ub_first_name', '$ub_last_name', '$ub_whatsapp_number','$ub_alternate_number', '$ub_email','$ub_password', '$ub_address', '$ub_zipcode','$ub_alternate_email','$ub_state','$ub_language','$ub_google_map_url','$ub_district','$ub_business_segment', 'a', '$date'";
//        echo "<br/><br/>" . $fieldValue . "<br/><br/>";
        if ($conn->insertDataInTable("tb_user_business", $fieldsNames, $fieldValue)) {
            $_SESSION['msg'] = "User Business Data Saved";
            header("location:../../user-business-details.php");
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../user-business-details.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../user-business-details.php");
    }
} else if (isset($_REQUEST['user_business_update'])) {
    try {
        extract($_POST);
        if ($_FILES["ub_logo"]["name"])
            $ub_logo_result = uploadFile("ub_logo", "../../assets/uploads/", 'ub_logo' . $_REQUEST['ub_id']);
        if ($_FILES["ub_cover_image"]["name"])
            $ub_cover_result = uploadFile("ub_cover_image", "../../assets/uploads/", 'ub_cover_image' . $_REQUEST['ub_id']);
        $setValue = "`ub_website_url`='$ub_website_url', `ub_business_name`='$ub_business_name', `ub_logo`='$ub_logo_result', `ub_cover_image`='$ub_cover_result', `ub_description`='$ub_description', `ub_first_name`='$ub_first_name', `ub_last_name`='$ub_last_name', `ub_whatsapp_number`='$ub_whatsapp_number', `ub_alternate_number`='$ub_alternate_number', `ub_email`='$ub_email', `ub_address`='$ub_address', `ub_zipcode`='$ub_zipcode', `ub_alternate_email`='$ub_alternate_email', `ub_state`='$ub_state', `ub_language`='$ub_language', `ub_google_map_url`='$ub_google_map_url', `ub_district`='$ub_district', `ub_business_segment`='$ub_business_segment', `ub_added_on`='$date'";
        $condition = "WHERE `tb_user_business`.`ub_id` = " . $_REQUEST['ub_id'];

        if ($conn->updateDataInTable("tb_user_business", $setValue, $condition)) {
            $_SESSION['msg'] = "Business Data Update";
            header("location:../../social-media.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../user-business-details.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../user-business-details.php");
    }
} else if (isset($_REQUEST['user_social_save'])) {
    try {

        extract($_POST);
        $setValue = "`ub_website_url` = '$ub_website_url', `ub_flipkart_url` = '$ub_flipkart_url', `ub_facebook_url` = '$ub_facebook_url', `ub_amazon_url` = '$ub_amazon_url',`ub_instagram_url`='$ub_instagram_url',`ub_ebay_url`='$ub_ebay_url',`ub_whatsapp_url`='$ub_whatsapp_url',`ub_india_mart_url`='$ub_india_mart_url',`ub_youtube_url`='$ub_youtube_url',`ub_big_basket_url`='$ub_big_basket_url',`ub_x_url`='$ub_x_url',`ub_zomato_url`='$ub_zomato_url',`ub_linkedin_url`='$ub_linkedin_url',`ub_swiggy_url`='$ub_swiggy_url'";
        $condition = "WHERE `tb_user_business`.`ub_id` = " . $_REQUEST['ub_id'];
        if ($conn->updateDataInTable("tb_user_business", $setValue, $condition)) {
            $_SESSION['msg'] = "Social Media Data Saved";
            header("location:../../business-product.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../social-media.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../social-media.php");
    }
} else if (isset($_REQUEST['business_product_save'])) {
    try {
        $bp_id = generateID("tb_business_product", "bp_id", $conn);
        extract($_POST);
        if ($_FILES["fileInput"]["name"])
            $bp_image = uploadFile("fileInput", "../../assets/uploads/", 'business_product' . $bp_id);
        $fieldsNames = "`bp_id`, `bp_ub_id`, `bp_image`,`bp_name`, `bp_description`, `bp_price`, `bp_added_on`";
        $fieldValue = "'$bp_id', '{$_REQUEST['ub_id']}','$bp_image', '$bp_name', '$bp_description', '$bp_price', '$date'";
        if ($conn->insertDataInTable("tb_business_product", $fieldsNames, $fieldValue)) {
            $_SESSION['msg'] = "Business Product Data Saved";
            header("location:../../business-hours.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../business-product.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-product.php");
    }
} else if (isset($_REQUEST['user_hour_save'])) {
    try {
        //        print_r($_REQUEST);
        extract($_POST);
        $daysOfWeek = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");
        foreach ($daysOfWeek as $day) {
            if (isset($_POST["ub_{$day}_time_active"]) && $_POST["ub_{$day}_time_active"] == "a") {
                $scheduleData[] = array(
                    'day' => $day,
                    'start_time' => $_POST["ub_{$day}_start_time"],
                    'end_time' => $_POST["ub_{$day}_end_time"],
                    'active' => $_POST["ub_{$day}_time_active"] == "a"
                );
            }
        }
        //        print_r($scheduleData);
        if (!empty($scheduleData)) {
            try {
                foreach ($scheduleData as $data) {
                    $bh_id = generateID("tb_business_hours", "bh_id", $conn);
                    $fieldsNames = "`bh_id`, `bh_ub_id`, `bh_day`, `bh_active`, `bh_start_time`, `bh_end_time`,`bh_added_on`";
                    $fieldValue = "'$bh_id', '{$_REQUEST['ub_id']}', '{$data['day']}', '{$data['active']}', '{$data['start_time']}','{$data['end_time']}', '$date'";
                    $conn->insertDataInTable("tb_business_hours", $fieldsNames, $fieldValue);
                }
                $_SESSION['msg'] = "Schedule data saved successfully.";
                header("location:../../business-appointments.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
            } catch (Exception $e) {
                $_SESSION['msg'] = $e->getMessage();
                header("location:../../business-hours.php");
            }
        } else {
            $_SESSION['msg'] = "No schedule data to save.";
            header("location:../../business-hours.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-hours.php");
    }
} else if (isset($_REQUEST['user_appointments_save'])) {
    try {
        //        print_r($_REQUEST);
        extract($_POST);
        $daysOfWeek = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");
        foreach ($daysOfWeek as $day) {
            if (isset($_POST["ub_{$day}_time_active"]) && $_POST["ub_{$day}_time_active"] == "a") {
                $scheduleData[] = array(
                    'day' => $day,
                    'start_time' => $_POST["ub_{$day}_start_time"],
                    'end_time' => $_POST["ub_{$day}_end_time"],
                    'active' => $_POST["ub_{$day}_time_active"] == "a"
                );
            }
        }
        //        print_r($scheduleData);
        if (!empty($scheduleData)) {
            try {
                foreach ($scheduleData as $data) {
                    $ba_id = generateID("tb_business_appointments", "ba_id", $conn);
                    $fieldsNames = "`ba_id`, `ba_ub_id`, `ba_day`, `ba_active`, `ba_start_time`, `ba_end_time`,`ba_added_on`";
                    $fieldValue = "'$ba_id', '{$_REQUEST['ub_id']}', '{$data['day']}', '{$data['active']}', '{$data['start_time']}','{$data['end_time']}', '$date'";
                    $conn->insertDataInTable("tb_business_appointments", $fieldsNames, $fieldValue);
                }
                $_SESSION['msg'] = "Appointments data saved successfully.";
                header("location:../../business-gallery.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
            } catch (Exception $e) {
                $_SESSION['msg'] = $e->getMessage();
                header("location:../../business-appointments.php");
            }
        } else {
            $_SESSION['msg'] = "No schedule data to save.";
            header("location:../../business-appointments.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-appointments.php");
    }
} else if (isset($_REQUEST['user_gallery_save'])) {
    try {
        $bg_id = generateID("tb_business_gallery", "bg_id", $conn);
        extract($_POST);
        if ($_FILES["fileInput"]["name"])
            $bg_image = uploadFile("fileInput", "../../assets/uploads/", 'business_gallery' . $bg_id);
        $fieldsNames = "`bg_id`, `bg_ub_id`,`bg_image`, `bg_product_type`, `bg_product_url`, `bg_added_on`";
        $fieldValue = "'$bg_id', '{$_REQUEST['ub_id']}','$bg_image', '$bg_product_type', '$bg_product_url', '$date'";
        if ($conn->insertDataInTable("tb_business_gallery", $fieldsNames, $fieldValue)) {
            $_SESSION['msg'] = "Business Gallery Data Saved";
            header("location:../../business-services.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../business-gallery.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-gallery.php");
    }
} else if (isset($_REQUEST['user_offers_save'])) {
    try {
        $bo_id = generateID("tb_business_offers", "bo_id", $conn);
        extract($_POST);
        $fieldsNames = "`bo_id`, `bo_ub_id`, `bo_offers`, `bo_added_on`";
        $fieldValue = "'$bo_id', '{$_REQUEST['ub_id']}', '$bo_offers', '$date'";
        if ($conn->insertDataInTable("tb_business_offers", $fieldsNames, $fieldValue)) {
            $_SESSION['msg'] = "Business Offers Data Saved";
            header("location:../../business-certificate.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../business-offers.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-offers.php");
    }
} else if (isset($_REQUEST['user_service_save'])) {
    try {
        $bs_id = generateID("tb_business_services", "bs_id", $conn);
        extract($_POST);
        if ($_FILES["fileInput"]["name"])
            $bs_image = uploadFile("fileInput", "../../assets/uploads/", 'business_service' . $bs_id);
        $fieldsNames = "`bs_id`, `bs_ub_id`, `bs_service_name`,`bs_image`, `bs_service_description`, `bs_added_on`";
        $fieldValue = "'$bs_id', '{$_REQUEST['ub_id']}', '$bs_service_name','$bs_image', '$bs_service_description', '$date'";
        if ($conn->insertDataInTable("tb_business_services", $fieldsNames, $fieldValue)) {
            $_SESSION['msg'] = "Business Service Data Saved";
            header("location:../../business-offers.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../business-services.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-services.php");
    }
} else if (isset($_REQUEST['business_certificatesave'])) {
    try {
        $bce_id = generateID("tb_business_certicate", "bce_id", $conn);
        extract($_POST);
        if ($_FILES["fileInput"]["name"])
            $bce_image = uploadFile("fileInput", "../../assets/uploads/", 'business_certificate' . $bce_id);
        $setValue = "`ub_pan_number` = '$ub_pan_number', `ub_gst_number` = '$ub_gst_number'";
        $condition = "WHERE `tb_user_business`.`ub_id` = " . $_REQUEST['ub_id'];
        $conn->updateDataInTable("tb_user_business", $setValue, $condition);
        $fieldsNames = "`bce_id`, `bce_ub_id`, `bce_name`, `bce_image`, `bce_added_on`";
        $fieldValue = "'$bce_id', '{$_REQUEST['ub_id']}', '$bce_name', '$bce_image', '$date'";
        if ($conn->insertDataInTable("tb_business_certicate", $fieldsNames, $fieldValue)) {
            $_SESSION['msg'] = "Business Certificate Data Saved";
            header("location:../../business-payment-method.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../business-certificate.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-certificate.php");
    }
} else if (isset($_REQUEST['business_payment_save'])) {
    try {
        $bpa_id = generateID("tb_business_payment", "bpa_id", $conn);
        extract($_POST);
        if ($_FILES["fileInput"]["name"])
            $bpa_method_image = uploadFile("fileInput", "../../assets/uploads/", 'business_payment_' . $bpa_id);
        $fieldsNames = "`bpa_id`, `bpa_ub_id`, `bpa_method_name`, `bpa_method_image`, `bpa_added_on`";
        $fieldValue = "'$bpa_id', '{$_REQUEST['ub_id']}', '$bpa_method_name', '$bpa_method_image', '$date'";
        if ($conn->insertDataInTable("tb_business_payment", $fieldsNames, $fieldValue)) {
            $_SESSION['msg'] = "Business Payment Data Saved";
            header("location:../../business-seo.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../business-payment-method.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-payment-method.php");
    }
} else if (isset($_REQUEST['business_seo_save'])) {
    try {
        extract($_POST);
        $setValue = "`ub_website_title` = '$ub_website_title', `ub_home_title` = '$ub_home_title', `ub_meta_keyword` = '$ub_meta_keyword', `ub_meta_description` = '$ub_meta_description', `ub_google_analytics` = '$ub_google_analytics'";
        $condition = "WHERE `tb_user_business`.`ub_id` = " . $_REQUEST['ub_id'];

        if ($conn->updateDataInTable("tb_user_business", $setValue, $condition)) {
            $_SESSION['msg'] = "Business SEO Data Saved";
            header("location:../../business-blogs.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../business-seo.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-seo.php");
    }
} else if (isset($_REQUEST['business_blogs_save'])) {
    try {
        $bb_id = generateID("tb_business_blog", "bb_id", $conn);
        extract($_POST);
        if ($_FILES["fileInput"]["name"])
            $bb_blog_image = uploadFile("fileInput", "../../assets/uploads/", 'business_blog_' . $bb_id);
        $fieldsNames = "`bb_id`, `bb_ub_id`, `bb_blog_title`, `bb_blog_description`,`bb_blog_image`, `bb_added_on`";
        $fieldValue = "'$bb_id', '{$_REQUEST['ub_id']}', '$bb_blog_title', '$bb_blog_description','$bb_blog_image', '$date'";
        if ($conn->insertDataInTable("tb_business_blog", $fieldsNames, $fieldValue)) {
            $_SESSION['msg'] = "Business Blog Data Saved";
            header("location:../../business-privacy-policy.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../business-blogs.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-blogs.php");
    }
} else if (isset($_REQUEST['business_privacy_save'])) {
    try {
        extract($_POST);
        $setValue = "`ub_privacy_policy` = '" . htmlspecialchars($description) . "'";
        $condition = "WHERE `tb_user_business`.`ub_id` = " . $_REQUEST['ub_id'];

        if ($conn->updateDataInTable("tb_user_business", $setValue, $condition)) {
            $_SESSION['msg'] = "Business Data Saved";
            header("location:../../business-terms-condition.php?id=" . $conn->encrypt_decrypt($_REQUEST['ub_id'], 'encrypt'));
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../business-privacy-policy.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-privacy-policy.php");
    }
} else if (isset($_REQUEST['business_terms_save'])) {
    try {
        extract($_POST);
        $setValue = "`ub_terms_condition` = '" . htmlspecialchars($description) . "'";
        $condition = "WHERE `tb_user_business`.`ub_id` = " . $_REQUEST['ub_id'];

        if ($conn->updateDataInTable("tb_user_business", $setValue, $condition)) {
            $_SESSION['msg'] = "Business Data Saved";
            header("location:../../business-terms-condition.php");
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../business-terms-condition.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-terms-condition.php");
    }
} else if (isset($_REQUEST['user_template_save'])) {
    try {
        print_r($_POST);
        extract($_POST);
        $setValue = "`ub_template_id` = '$ub_template_id'";
        $condition = "WHERE `tb_user_business`.`ub_id` = " . $_REQUEST['ub_id'];

        if ($conn->updateDataInTable("tb_user_business", $setValue, $condition)) {
            $_SESSION['msg'] = "Business Template Saved";
            header("location:../../business-templates.php");
        } else {
            $_SESSION['msg'] = "Problem in saving data!";
            header("location:../../business-templates.php");
        }
    } catch (Exception $ex) {
        $_SESSION['msg'] = "Problem in saving data!";
        header("location:../../business-templates.php");
    }
}
