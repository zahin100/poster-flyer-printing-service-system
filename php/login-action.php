<?php   
    include 'database.php';
    session_start();

    $username = $_POST['Username'];
    $raw_password = $_POST['password'];
    
    
    $username=stripcslashes($username);
    //$password = stripcslashes($password);
    $username=mysqli_real_escape_string($conn,$username);
    //$password=mysqli_real_escape_string($conn,$password);
    
    $query = "SELECT password FROM customer WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $hashed_pass = $row['password'];

    
    if(password_verify($raw_password,$hashed_pass)==false){
        echo "INCORRECT USERNAME OR PASSWORD!";
    }
    else{
        $statement = "select * from customer where username = '$username'";
        $result =mysqli_query($conn,$statement);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count=mysqli_num_rows($result);
        if($count==1){
            echo"<h1>Login succesful</h1>";
            header("Location: login-succesful.php");
            $_SESSION['username'] = $username; 
            $_SESSION['password'] = $password;
            
        }else{
            echo '<script>',
            'alert("Login Unsuccesful")',
            '</script>';
            header("Location:login.php");
        }
    }
?>

