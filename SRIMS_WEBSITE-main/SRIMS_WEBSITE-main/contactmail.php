<?php

require 'php/PHPMailer.php';
require 'php/Exception.php';
require 'php/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



$name = $_POST['name'];

$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];
$location = $_POST['location'];

$mail = new PHPMailer(true);

// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "smtp.gmail.com";    // SMTP server example
$mail->SMTPDebug  = SMTP::DEBUG_SERVER;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
$mail->Username   = "campusive@gmail.com";            // SMTP account username example
$mail->Password   = "ejsqjdvqaytygflr";            // SMTP account password example

$mail->setFrom('support@sysbean.com', 'Website Auto-Enquiry');
$mail->addAddress('sayanti@sysbean.com', 'SShri Ramkrishna Institute Of Medical Sciences & Sanaka Hospitals');
// $mail->addAddress('eurokidshowrah90@gmail.com' , 'Swings & Slides Daycare Service & Hobby Classes');
$mail->addReplyTo($email, $phone);

// Content
$mail->isHTML(true);                       // Set email format to HTML
$mail->Subject = 'Enquiry from Website: '.$email;
$mail->Body    = 'Shri Ramkrishna Institute Of Medical Sciences & Sanaka Hospitals, <br /> We have received a enquiry from your website. 
<br />Below are the information the perform has shared.
<br />
name: <b>'.$name.'</b><br/>

phone: <b>'.$phone.'</b><br/>
email:<b>'.$email.'</b><br/>
message:<b>'.$message.'</b> 
location:<b>'.$location.'</b> 
';


if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Email Sent';
    header('Location: ./contact.html?msg=success', TRUE, 302); exit;
}


?>
