<?php 
session_start(); 
include "dbconn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
	$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
    if ($row['username'] === $username && $row['password'] === $password) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
		$_SESSION['message'] = "Login Successfully";
        header("Location: dashboard.php");
		exit();
	}
	else{
		// page location
		$_SESSION['message'] = "Error! Something Went Wrong";
		header("Location: admin_login.php");
		exit(0);
	}
		
}else{

	header("Location: admin_login.php");
	exit();
}
?>