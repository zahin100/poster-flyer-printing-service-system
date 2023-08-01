<?php

    // database connection
    session_start();
    include('dbconn.php');
    
    if(isset($_POST['editAdmin_btn']))
    {
        // to get values from form in editEmp.php file
        $admin_id = $_POST['id'];
        $admin_fname = $_POST['firstName'];
        $admin_lname = $_POST['lastName'];
        $admin_email = $_POST['email'];
        $admin_phoneNum = $_POST['phoneNumber'];
        $admin_username = $_POST['username'];
        $admin_password = $_POST['password'];

        $query = "UPDATE admin SET firstname='$admin_fname', lastname='$admin_lname', 
        email='$admin_email', phoneNumber='$admin_phoneNum', username='$admin_username', 
        password='$admin_password'";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['message'] = "Data has been updated successfully";
            header("Location: AdminProfile.php");
            exit(0);
        }
        else{
            // page location
            $_SESSION['message'] = "Error! Something Went Wrong";
            header("Location: editAdmin.php");
            exit(0);
        }
    }
    else{
       
        header("Location: AdminProfile.php");
        exit(0);
    }

?>