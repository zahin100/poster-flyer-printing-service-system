<?php
include 'database.php';
session_start();
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$email = $_SESSION['email'];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = "587";
$mail->Username = "printingexpert58@gmail.com";
$mail->Password = "hsuxbpwlwuveukrh";
$mail->Subject = "Registration Succesful";
$mail->setFrom("printingexpert58@gmail.com");
$mail->Body = "\nDear Customer,\n\nYour registration is succesfull \n\n\nThank You, for signing in\nPrinting Expert";

$mail->addAddress($email);

    if ( $mail->send() ) {
        echo "Email Sent..!";
    }else{
        echo "Message could not be sent. Mailer Error: ";
    }

$mail->smtpClose();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Success</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/index.css">
    
</head>

<body>
    <div class="container border rounded">
        <h2 class="fw-semibold text-start"><span style="font-weight: normal !important;">Registration Succesful!&nbsp;</span></h2>
        <p id="loggin_link" style="font-size: 22px;"><a href='login.php'>Click here to login</a></p>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>