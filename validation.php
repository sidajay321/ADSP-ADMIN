<?php

ob_start();
session_start();
if (!isset($_SESSION['tl_userid']))
    header('location:user-authentication.php');
include './custom/connection/dbconnect.php';
$conn = new Connection();
?>