<?php

include ('database.php');
session_start();

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $file = $_POST['file'];

    if (empty($firstname) && empty($lastname) && empty($email)&& empty($phoneNumber) && empty($address) && isset($file)) {
      
        $query = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $orderId = $row['id'];

        $query = "Update order_service SET paymentFile = '$file' WHERE ordersId = '$orderId'";
        $result = mysqli_query($conn, $query);
    
        $query = "SELECT * FROM customer WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $customerFirstName = $row['firstname'];
        $customerLastName = $row['lastname'];
        $customerPhone = $row['phoneNumber'];
        $customerAddress = $row['address'];
        $customerEmail = $row['email'];
    
        $query = "SELECT * FROM order_service WHERE id = (SELECT MAX(id) FROM order_service) LIMIT 1";
        $result = mysqli_query($conn, $query);
    
        if (mysqli_num_rows($result) > 0) {
    
         while ($row = mysqli_fetch_assoc($result)) {
             $orderServiceId = $row['id'];
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
        $mail->Body = "\nDear Customer,
                       \n\nYour order has been received.
                       \nOrder Id: $orderServiceId
                       \nService Name: $serviceName
                       \nSize: $size
                       \nQuantity: $quantity
                       \nTotal Price:RM $totalPrice
                       \n\n New Shipments details: 
                       \nFull name: $customerFirstName $customerLastName
                       \nPhone Number: $customerPhone
                       \nAddress: $customerAddress 
                       \nEmail Address: $customerEmail
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


    } else if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phoneNumber']) && isset($_POST['address']) && isset($_POST['submitform'])){
    
    
        $query = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $orderId = $row['id'];
    
        $query = "Insert into shipment (firstName,lastName,email,phoneNumber,address,orderId)
        values ('$firstname','$lastname','$email','$phoneNumber','$address','$orderId')";
        $result = mysqli_query($conn, $query);
    
        
            $query = "Update order_service SET paymentFile = '$file' WHERE ordersId = '$orderId'";
            $result = mysqli_query($conn, $query);
        
            $query = "SELECT * FROM shipment WHERE id = (SELECT MAX(id) FROM shipment)";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $shipmentFirstName = $row['firstName'];
            $shipmentLastName = $row['lastName'];
            $shipmentPhone = $row['phoneNumber'];
            $shipmentAddress = $row['address'];
            $shipmentEmail = $row['email'];
        
            $query = "SELECT * FROM order_service WHERE id = (SELECT MAX(id) FROM order_service) LIMIT 1";
            $result = mysqli_query($conn, $query);
        
            if (mysqli_num_rows($result) > 0) {
        
             while ($row = mysqli_fetch_assoc($result)) {
                 $orderServiceId = $row['id'];
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
            $mail->Body = "\nDear Customer,
                           \n\nYour order has been received.
                           \nOrder Id: $orderServiceId
                           \nService Name: $serviceName
                           \nSize: $size
                           \nQuantity: $quantity
                           \nTotal Price:RM $totalPrice
                           \n\n New Shipments details: 
                           \nFull name: $shipmentFirstName $shipmentLastName
                           \nPhone Number: $shipmentPhone
                           \nAddress: $shipmentAddress 
                           \nEmail Address: $shipmentEmail
                           \n\n\nThank You,
                           \nPrinting Expert";
        
            $mail->addAddress($shipmentEmail);
            
                if ( $mail->send() ) {
                    echo "Email Sent..!";
                }else{
                    echo "Message could not be sent. Mailer Error: ";
                }
            
            $mail->smtpClose();
           
            header('Location:successPayment.php');
           }
        }else {
            $_SESSION['status'] = "Error! Please check all the field!";
            header('Location:paymentDelivery.php');
    }
  }


?>
