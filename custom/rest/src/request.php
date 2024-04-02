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

function generateCategoryXML($category, $url, $city, $metaTitle, $metaKeywords, $metaDescription) {
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    $xml .= '<url>';
    $xml .= '<loc>' . $url . '/' . $category . '</loc>';
    $xml .= '<changefreq>weekly</changefreq>';
    $xml .= '<priority>0.8</priority>';
    $xml .= '<meta-title>' . $metaTitle . '</meta-title>';
    $xml .= '<meta-keywords>' . $metaKeywords . '</meta-keywords>';
    $xml .= '<meta-description>' . $metaDescription . '</meta-description>';
    $xml .= '</url>';

    $xml .= '<url>';
    $xml .= '<loc>' . $url . '/' . $city . '/' . $category . '/' . $city . '</loc>';
    $xml .= '<changefreq>weekly</changefreq>';
    $xml .= '<priority>0.8</priority>';
    $xml .= '<meta-title>' . $metaTitle . '</meta-title>';
    $xml .= '<meta-keywords>' . $metaKeywords . '</meta-keywords>';
    $xml .= '<meta-description>' . $metaDescription . '</meta-description>';
    $xml .= '</url>';

    $xml .= '</urlset>';

    return $xml;
}

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

//Load Composer's autoloader
//require 'vendor/autoload.php';




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
    $stmt = $conn->link->prepare("SELECT * FROM tb_user_login where ul_username=:ui and ul_password=:pw");
    $stmt->bindValue(':ui', $ui);
    $stmt->bindValue(':pw', $pass);
    $stmt->execute();
    $re_th = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($re_th == NULL) {
        $_SESSION['msg'] = "Invalid Id OR/AND Password!";
        header("location:../../user-authentication.php");
    } else {
        if ($ui == $re_th['ul_username'] && $pass == $re_th['ul_password']) {
            $_SESSION['tl_userid'] = $re_th['ul_id'];
            $_SESSION['tl_username'] = $re_th['ul_username'];
            $_SESSION['tl_name'] = $re_th['ul_firstname'] . " " . $re_th['ul_surname'];
            $_SESSION['tl_status'] = $re_th['ul_status'];
            header("location:../../index.php");
        } else {
            $_SESSION['msg'] = "Invalid Id OR/AND Password!";
            header("location:../../user-authentication.php");
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
        $fieldsNames = "`bc_name`";
        $fieldValue = "'{$_REQUEST['bc_name']}'";
        if ($conn->insertDataInTable("tb_buisness_cities", $fieldsNames, $fieldValue)) {
            echo '{"status":true,"msg":"Data Saved"}';
        } else {
            echo '{"status":false,"msg":"Problem in Data Saved"}';
        }
    } catch (Exception $ex) {
        echo '{"status":false,"msg":"Problem in Data Saved"}';
    }
} else if (isset($_REQUEST['add_category'])) {
    try {
        if ($conn->isRecordExsistInTable("tb_category", "WHERE ca_name='{$_REQUEST['ca_name']}'")) {
            echo '{"status":false,"msg":"Reocrd with this city already present !"}';
            return;
        }
        $ca_id = generateID("tb_category", "ca_id", $conn);
        $fieldsNames = "`ca_id`,`ca_name`";
        $fieldValue = "'$ca_id','{$_REQUEST['ca_name']}'";
        if ($conn->insertDataInTable("tb_category", $fieldsNames, $fieldValue)) {
            echo '{"status":true,"msg":"Data Saved"}';
        } else {
            echo '{"status":false,"msg":"Problem in Data Saved"}';
        }
    } catch (Exception $ex) {
        echo '{"status":false,"msg":"Problem in Data Saved"}';
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
        print_r($bd_sub_category);
        $bd_id = generateID("tb_business_details", "bd_id", $conn);
        $fieldsNames = "`bd_user_id`,`bd_url`,`bd_city`,`bd_category`,`bd_meta_title`,`bd_meta_keywords`,`bd_meta_description`,`bd_added_date`";
        $fieldValue = "'{$_SESSION['tl_userid']}','$bd_url','$bd_city','$bd_category','$bd_meta_title','$bd_meta_keywords','$bd_meta_description','$date'";
        if ($conn->insertDataInTable("tb_business_details", $fieldsNames, $fieldValue)) {
            $xmlFilePath = '../../xml/sitemap.xml';
            $handle = fopen($xmlFilePath, 'a');
            foreach ($bd_sub_category as $i => $cr) {
                $fieldsNamesSub = "`bca_bd_id`,`bca_bc_id`";
                $fieldValueSub = "'$bd_id','{$cr}'";
                $conn->insertDataInTable("tb_buisness_category", $fieldsNamesSub, $fieldValueSub);
                $xml = generateCategoryXML(getCategoryName($conn, $bd_category), $bd_url, getCityName($conn, $bd_city), $bd_meta_keywords, $bd_meta_description);
                fwrite($handle, $xml);
            }
            fclose($handle);
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
}
