<!DOCTYPE html>
<html lang="en">

<?php include 'database.php' ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register now</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/index.css"> 
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <form>
        <input type="button" class="btn btn-primary rounded-left" value="Back" onclick="history.back()" style="margin-top:10px; margin-left:10px">
    </form>
    <div class="border rounded container mb-3" style="box-shadow: rgba(100, 100, 111, 0.5) 0px 7px 29px 0px;" data-aos="fade-up" data-aos-delay="250" data-aos-duration="1000" >
        <h2 class="fw-normal text-center" >Register Now!</h2>
        
        <hr>
        <form action="register-action.php" method="post" >
            <div class="first-name mb-3">
                <h3 class="text-start">First Name</h3>
                <input class="border rounded-pill form-control-lg d-md-flex d-lg-flex d-xl-flex justify-content-md-start justify-content-lg-start justify-content-xl-start" type="text" id="input" placeholder="Your first name" name="firstName" required>
            </div>
            <div>
                <h3 class="text-start">Last Name</h3>
                <input class="mb-3 border rounded-pill form-control-lg d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-md-start justify-content-lg-start justify-content-xl-start justify-content-xxl-start" type="text" id="input" placeholder="Your last name" name="lastName" required>
            </div>
            <div>
                <h3 style="float:left" class="text-start">Email</h3><img style="float:right; max-width:35px; margin-right:88%" src="assets/img/emailIcon.png">
                <input class="mb-3 border rounded-pill form-control-lg d-md-flex d-lg-flex justify-content-md-start justify-content-lg-start" type="email" id="input" placeholder="example:john@gmail.com" name="email" required>
            </div>
            <div>
                <h3 style="float:left" class="text-start">Phone Number</h3>
                <input class="mb-3 border rounded-pill form-control-lg d-md-flex d-lg-flex justify-content-md-start justify-content-lg-start" type="tel" id="input" placeholder="Example:1112525483" pattern="[0-9]{10}" name="phoneNumber" required>
            </div>
            <div>
                <h3 style="float:left" class="text-start">Address</h3>
                <input class="mb-3 border rounded-pill form-control-lg d-md-flex d-lg-flex justify-content-md-start justify-content-lg-start" type="text" id="input" placeholder="Enter your delivery address here" name="address" required>
            </div>
            
            <div>
                <h3 class="text-start">Username</h3>
                <input class="mb-3 border rounded-pill form-control-lg d-md-flex d-lg-flex justify-content-md-start justify-content-lg-start" type="text" id="input" placeholder="Create your username" name="username" required>
            </div>
            <div class="mb-3">
                <h3 class="text-start">Password</h3>
                <input class="mb-3 border rounded-pill form-control-lg d-md-flex d-lg-flex justify-content-md-start justify-content-lg-start" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" id="input" placeholder="Example:1@UtEm123" name="password" required>
            </div>
            <hr>
            <div class="register-btn">
                <input class="mb-3 fs-5 border rounded btn btn-primary d-block w-100 mb-3" id="button" type="submit" value="Register Now">
            </div>
        </form>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>