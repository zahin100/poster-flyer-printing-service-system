<?php
include 'dbconnection.php';
include 'Employee.php';
session_start();

 $serviceId = $_GET['serviceId'];
 $employeeId = $_GET['employeeId'];
 $query = "SELECT * FROM service WHERE id='$serviceId'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$newServiceName = $row['serviceName'];
$newServicePrice = $row['price'];

if(isset($_POST['newServiceName']) == TRUE){
    $newServiceName = $_POST['newServiceName'];
}

if(isset($_POST['newServicePrice']) == TRUE){
    $newServicePrice = $_POST['newServicePrice'];
}

$query = "UPDATE service SET serviceName='$newServiceName', price='$newServicePrice', employeeId='$employeeId' WHERE id='$serviceId'";
$result = mysqli_query($conn, $query);

if($result){
    echo "<script>
         window.location.href='service.php';
         alert('THE SERVICE DETAILS HAS BEEN SUCCESSFULLY UPDATED!');
         </script>";
} else{
    die(mysqli_error($conn));
}

?>