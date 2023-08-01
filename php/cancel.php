<?php
session_start();
$username = $_SESSION['username'];    
include 'database.php';
$status = 'Cancelled';
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


    $dateCurrent = new Datetime(date("Y-m-d"));
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        

        $sqlCheckDate = "SELECT date FROM orders WHERE orders.id='$id'";
        $resultDate = mysqli_query($conn,$sqlCheckDate);
        $rowDate = mysqli_fetch_row($resultDate);

        $string_dateOrdered = $rowDate[0];
        $timestamp_from_table = strtotime($string_dateOrdered);
        $current_date = time();
        
        $difference = $current_date-$timestamp_from_table;
        if($difference>86400){
            $_SESSION['one-day']="Sorry but the order time has exceeded 1 day";
            header("Location:order.php");
        }
        else{
            $sqlCancel = "UPDATE orders SET status = '$status' WHERE id='$id'";

            $resultCancel = mysqli_query($conn,$sqlCancel);
            if($resultCancel){
                echo "Order cancellation is succesful!";
                $check_email = mysqli_query($conn,"SELECT email FROM customer WHERE username='$username'");
                while ($row = $check_email->fetch_assoc()) {
                    $email = $row['email'];
                }

                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "tls";
                $mail->Port = "587";
                $mail->Username = "bitu3923bits@gmail.com";
                $mail->Password = "kzdjraqeuusrqxrd";
                $mail->Subject = "Order Cancellation";
                $mail->setFrom("printingexpert58@gmail.com");
                $mail->Body = "\nDear Customer,\n\nYour order cancellation is succesful \n\n\nThank You, for your patience\nPrinting Expert";
                $mail->addAddress($email);
                $mail->smtpClose();

                if ( $mail->send() ) {
                    echo "Email Sent..!";
                }else{
                    echo "Message could not be sent. Mailer Error: ";
                }

                $mail->smtpClose();
                header("Location:order.php");
            }else{
                echo "Cancellation isn't succesful!";
                
            }
        }
    }



?>