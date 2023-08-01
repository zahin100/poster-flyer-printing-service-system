<?php
    include "database.php";
    session_start();
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phoneNumber'];
    
    $hashed_pass = password_hash($password,PASSWORD_DEFAULT);

    
    $check_username = mysqli_query($conn,"SELECT username FROM customer WHERE username='$username'");
    if(mysqli_num_rows($check_username)>0){
        echo"username already exists";
    }

    else{
        $statement = $conn->prepare("insert into customer(firstname,lastname,address,email,phoneNumber,username,password) values(?,?,?,?,?,?,?)");
        $statement->bind_param("sssssss",$firstname,$lastname,$address,$email,$phonenumber,$username,$hashed_pass);
        $statement->execute();
        $statement->close();
        $_SESSION['email']=$email;
        header("Location: registration-succesful.php");
        exit();
    }
?>

    
    


