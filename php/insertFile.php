<?php
include 'database.php';
session_start();
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['submitFile'])){
    $username = $_SESSION['username'];

    $query = "SELECT id FROM orders WHERE id = (SELECT MAX(id) FROM orders)";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $orderId = $row['id'];

    $file = $_POST['file'];

   $query1 = "Update order_service SET paymentFile = '$file' WHERE ordersid = '$orderId'";
   $result1 = mysqli_query($conn, $query1);

   if($result1){
      
        $query = "SELECT * FROM customer WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $customerFName = $row['firstname'];
        $customerLName = $row['lastname'];
        $customerEmail = $row['email'];
        $customerUsername = $row['username'];
        


        $query = "SELECT * FROM order_service WHERE id = (SELECT MAX(id) FROM order_service) LIMIT 1";
        $result = mysqli_query($conn, $query);
 
        if (mysqli_num_rows($result) > 0) {
 
         while ($row = mysqli_fetch_assoc($result)) {
             $orderService = $row['id'];
             $serviceId = $row['serviceId'];
             $size = $row['size'];
             $quantity = $row['quantity'];
             $totalPrice = $row['totalPrice'];
         }
 
        $query = "SELECT serviceName FROM service WHERE id = '$serviceId'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $serviceName = $row['serviceName'];
 

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";
        $mail->Username = "bitu3923bits@gmail.com";
        $mail->Password = "kzdjraqeuusrqxrd";
        $mail->Subject = "Order Received!";
        $mail->setFrom("bitu3923bits@gmail.com");
        $mail->Body = " \nDear Customer,
                        \n\nYour order has been received.
                        \nOrder Id: $orderService
                        \nService Name: $serviceName
                        \nSize: $size
                        \nQuantity: $quantity
                        \nTotal Price: $totalPrice
                        \n\n\nThank You,
                        \nPrinting Expert";

        $mail->addAddress($customerEmail);

            if ( $mail->send() ) {
                echo "Email Sent..!";
            }else{
                echo "Message could not be sent. Mailer Error: ";
            }

        $mail->smtpClose();

        header('Location:successPayment.php');
    
    }
}
}


?>