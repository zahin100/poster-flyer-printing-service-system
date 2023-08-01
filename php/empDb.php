<?php

    // database connection
    session_start();
    include('dbconn.php');
    
    if(isset($_POST['addEmp_btn'])){
        // to get values from form in addEmp.php file
        $employee_id = $_POST['id'];
        $employee_fname = $_POST['firstName'];
        $employee_lname = $_POST['lastName'];
        $employee_email = $_POST['email'];
        $employee_phoneNum = $_POST['phoneNumber'];
        $employee_username = $_POST['username'];
        $employee_password = $_POST['password'];
        $role = $_POST['role'];
        $admin_id = $_POST['adminId'] = '1';

        //check EMPLOYEE ID
        $checkemployee_id = "SELECT id FROM employee WHERE id='$employee_id'";
        $checkemployee_id_run = mysqli_query($conn, $checkemployee_id);
        
        if(mysqli_num_rows($checkemployee_id_run) > 0)
        {
            $_SESSION['message'] = "Employee ID Already Exists!";
            header("Location: addEmp.php");
            exit(0);
        }
        else 
        {
            // insert the data into database
            $employee_query = "INSERT INTO employee (firstName, lastName, email,
            phoneNumber, username, password, role, adminId) 
            VALUES ('$employee_fname', '$employee_lname', 
            '$employee_email', '$employee_phoneNum', '$employee_username', '$employee_password', 
            ' $role', '$admin_id')";
            $employee_query_run = mysqli_query($conn, $employee_query);

            if($employee_query_run)
            {
                // page location
                header("Location: viewEmp.php");
                exit(0);
            }
            else{
                // page location
                $_SESSION['message'] = "Error! Something Went Wrong";
                header("Location: addEmp.php");
                exit(0);
            }
            
        }
    }

    else if(isset($_POST['editEmp_btn']))
    {
        // to get values from form in editEmp.php file
        $employee_id = $_POST['id'];
        $employee_fname = $_POST['firstName'];
        $employee_lname = $_POST['lastName'];
        $employee_email = $_POST['email'];
        $employee_phoneNum = $_POST['phoneNumber'];
        $employee_username = $_POST['username'];
        $employee_password = $_POST['password'];
        $role = $_POST['role'];

        $query = "UPDATE employee SET firstname='$employee_fname', lastname='$employee_lname', 
        email='$employee_email', phoneNumber='$employee_phoneNum', username='$employee_username', 
        password='$employee_password', role='$role'
        WHERE id='$employee_id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['message'] = "Data has been updated successfully";
            header("Location: viewEmp.php");
            exit(0);
        }
        else{
            // page location
            $_SESSION['message'] = "Error! Something Went Wrong";
            header("Location: editEmp.php");
            exit(0);
        }
    }

    else if(isset($_POST['delEmp_btn']))
    {
        $employee_id = $_POST['delEmp_btn'];
        $query = "DELETE FROM employee WHERE id='$employee_id' ;";

        
        $query_run = mysqli_query($conn, $query);

        if($query_run){

        // page location
        $_SESSION['message'] = "Data has been deleted Successfully";
        header("Location: viewEmp.php");
        exit(0);
        }
        else{
            // page location
            $_SESSION['message'] = "Error! Something Went Wrong";
            header("Location: viewEmp.php");
            exit(0);
        }
        
    }
    else{
       
        header("Location: viewEmp.php");
        exit(0);
    }

?>