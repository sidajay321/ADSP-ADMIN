<?php
require "1.php";
require "mail_content.php";
$body = mail_content("Amrit Anand","Motor Insurance", "ANC12334567", "8075326695");
$subject = "APR CONSULTANCY";
$email = "981amritanand@gmail.com";
mail_function($email,$subject,$body,"alt");


?>

