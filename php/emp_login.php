<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
    include 'dbconnection.php';
    include 'Employee.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM employee WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){

        session_start();
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $email = $row['email'];
        $phoneNumber = $row['phoneNumber'];
        $username = $row['username'];
        $password = $row['password'];
        $role = $row['role'];
        $adminId = $row['adminId'];

        $employee = new Employee($id,$firstName,$lastName,$email,$phoneNumber,$username,$password,$role,$adminId);
        $_SESSION['employee'] = $employee;

        header('Location: ../php/orders.php');
        

    } else{
        echo "<script>
        window.location.href='../html/emp_login_page.html';
        alert('INCORRECT USERNAME OR PASSWORD!');
        </script>";
    }


    $conn->close();
    ?>
</body>
</html>