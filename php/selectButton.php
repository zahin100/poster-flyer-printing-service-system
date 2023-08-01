<?php 
session_start();
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Order Now</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Pricing-Centered-badges.css">
    <link rel="stylesheet" href="assets/css/Pricing-Centered-icons.css">
    <link rel="stylesheet" href="assets/css/Navbar-With-Button-icons.css">
    <link rel="stylesheet" href="assets/css/order.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script
      src="https://kit.fontawesome.com/1b607b98d1.js"
      crossorigin="anonymous"
    ></script>
</head>

<body>
<nav class="navbar navbar-light navbar-expand-md py-3 rounded-bottom">
        <div class="container"><i class="fa-regular fa-map" style="width:1rem; height:1rem; margin-right:10px;"></i><a class="navbar-brand d-flex align-items-center" href="index.php"><span><b>Printing</b><b> Expert</b></span></a><button data-bs-toggle="collapse" data-bs-target="#navcol-1" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="About Us.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="Contact us.php">Contact Us</a></li>
                    <?php if(isset($_SESSION['username'])):?>
                    <li class="nav-item"><a class="nav-link active" href="order.php">Order Now</a></li>
                    <li  class="nav-item nav-link active" style="margin-left:400px"  >Welcome, <?php echo $_SESSION["username"] ?> </li>
                    <?php echo '</ul><a class="btn btn-primary" role="button" href="logout.php" id="logoutButton">Log Out</a>'?>
                    <?php else: echo '</ul><a class="btn btn-primary" role="button" href="login.php" id="myButton">Login</a>'?>
                <?php endif ?>
            </div>
        </div>
    </nav>
                    
    <div class="container1">
        <div class="vertical-center1">
        <p style="font-size: 40px; font-family: Arial, Helvetica, sans-serif;">Please choose either you want delivery or self pickup: <br><br></p>
                <button style="background-image: url('https://cdn-icons-png.flaticon.com/512/2039/2039054.png'); font-size: 100px; font-family: Arial, Helvetica, sans-serif;" onclick="window.location='paymentDelivery.php'" type="button1" class="btn btn-success">Delivery</button>
                <button style="background-image: url('https://cdn-icons-png.flaticon.com/512/609/609361.png'); font-size: 100px; font-family: Arial, Helvetica, sans-serif;" onclick="window.location='paymentPickup.php'" type="button2" class="btn btn-danger">Self Pickup</button>
        </div>
    </div>

    <style>
        .container1 {
        height: 500px;
        position: relative;
        }

        .vertical-center1 {
        margin: auto;
        display: block;
        position: absolute;
        top: 70%;
        left: 20%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        }

        button{
            height: 500px;
            width: 500px;
            
        }
    </style>

</body>
</html>