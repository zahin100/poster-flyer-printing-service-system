<?php
    session_start();
    include 'database.php';
    $quantity = $_POST['quantity'];
    $sizes = $_POST['sizes'];
    $types = $_POST['types'];
    $total = $_POST['total'];
    $design = $_POST['design_file'];

    
    /*
    $file = $_FILES['design file'];

    $fileName = $_FILES['design file']['name'];
    $fileTmpName = $_FILES['design file']['tmp_name'];
    $fileSize = $_FILES['design file']['size'];
    $fileError = $_FILES['design file']['error'];
    $fileType = $_FILES['design file']['type']; 

    $fileExt = explode('.'.$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('pdf');

    if(in_array($fileActualExt,$allowed)){
        if($fileError===0){
            if($fileSize<20000000){
                   $fileNameNew = uniqid('',true).".".$fileActualExt;
                   $fileDestination = "uploads/".$fileNameNew;
                   move_uploaded_file($fileTmpName,$fileDestination);
                   header("Location:order.php?ordersuccess");
            }//less than 20 MBs
            else{
                echo "File too big";
            }
        }else{
            echo "Error when uploading file";
        }

    }else{
        echo "Invalid file type";
    }
    */

    //Get the date and declare the starting status
    $username = $_SESSION['username'];
    $Date = date("Y-m-d H:i:s");
    $Status="Pending";
    
    //Get the type of service
    $resultType = mysqli_query($conn,"SELECT id
    FROM service 
    WHERE serviceName = '$types'");
    $ServiceId=mysqli_fetch_row($resultType);
    
    //Get the employee id
    $resultEmploId = mysqli_query($conn,"SELECT employeeid
    FROM orders
    GROUP BY employeeId
    ORDER BY COUNT(*) ASC
    LIMIT 1;");
    $rowsEmployeeId = mysqli_fetch_row($resultEmploId);
    
    //Get the customer id based on username
    $resultCustId = mysqli_query($conn,"SELECT id
    FROM customer 
    WHERE username = '$username'");
    $rowCustomerId=mysqli_fetch_row($resultCustId);
    
    //Get the latest order id
    $resultOrderId = mysqli_query($conn, "SELECT id 
    FROM orders 
    WHERE id = (SELECT MAX(id) FROM orders)");
    $orderId = mysqli_fetch_row($resultOrderId);

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    

    //INSERT NEW ORDER 
    $statement2 = $conn->prepare("INSERT into orders(date,status,customerId,employeeId) 
    VALUES (?,?,?,?)");
    $statement2->bind_param("ssss",$Date,$Status,$rowCustomerId[0],$rowsEmployeeId[0]);
    $statement2->execute();
    $statement2->close();

    //Get the latest order id after insertion
    $resultOrderId = mysqli_query($conn, "SELECT id 
    FROM orders 
    WHERE id = (SELECT MAX(id) FROM orders)");
    $orderId_latest = mysqli_fetch_row($resultOrderId);

    
    //INSERT NEW ORDER_SERVICE
    $statement = $conn->prepare("INSERT INTO order_service (quantity, totalPrice, size, imageFile, ordersId, serviceId) 
    VALUES (?,?,?,?,?,?)");
    $statement->bind_param("ssssss",$quantity,$total,$sizes,$design,$orderId_latest[0],$ServiceId[0]);
    $statement->execute();
    $statement->close();

    if($statement && $statement2){
        echo "Success!";
        header('Location:selectButton.php'); 
        
    }
   
    
    
?>