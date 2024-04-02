<?php

ob_start();
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
$date = date('Y-m-d H:i:s');
include('../connection/dbconnect.php');

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



$conn = new Connection();
$allowedExts = array("pdf", "PDF", "jpg", "JPG", "jpeg", "JPEG", "png", "PNG");
if (isset($_REQUEST['save_buisness'])) {
    try {
        extract($_POST);
        print_r($bd_sub_category);
        $bd_id = generateID("tb_business_details", "bd_id", $conn);
        $fieldsNames = "`bd_user_id`,`bd_url`,`bd_city`,`bd_category`,`bd_meta_title`,`bd_meta_keywords`,`bd_meta_description`,`bd_added_date`";
        $fieldValue = "'{$_SESSION['tl_userid']}','$bd_url','$bd_city','$bd_category','$bd_meta_title','$bd_meta_keywords','$bd_meta_description','$date'";
        if ($conn->insertDataInTable("tb_business_details", $fieldsNames, $fieldValue)) {
            $xmlFilePath = '../../xml/sitemap.xml';

            if (file_exists($xmlFilePath)) {
                $handle = fopen($xmlFilePath, 'a');
            } else {
                $handle = fopen($xmlFilePath, 'w');
                fwrite($handle, '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL);
                fwrite($handle, '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL);
            }
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