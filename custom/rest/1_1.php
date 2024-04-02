<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function




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
    $mail->CharSet="UTF-8";
    $mail->Host = 'smtp.hostinger.in';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'apr@wishadish.esy.es';                 // SMTP username
    $mail->Password = 'Test981@';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('apr@wishadish.esy.es', 'APR Consultancy');
    $mail->Priority = 1;
    // MS Outlook custom header
    // May set to "Urgent" or "Highest" rather than "High"
    $mail->AddCustomHeader("X-MSMail-Priority: High");
    // Not sure if Priority will also set the Importance header:
    $mail->AddCustomHeader("Importance: High");
        
        
        
function mail_function($email,$subject,$body,$altbody)
{
    
    
        
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
        $mail->Body    = $body;
        $mail->AltBody = $altbody;
    
        $mail->send();
        return 1;
       
}
 require "mail_content.php";
 $body = mail_content("Amrit Anand","Motor Insurance", "ANC12334567", "8075326695");
 $subject = "APR CONSULTANCY";
 $email = "siddharthaajay321@gmail.com";
 mail_function($email,$subject,$body,"alt");


?>

