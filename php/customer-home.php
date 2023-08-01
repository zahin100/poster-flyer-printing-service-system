<!DOCTYPE html>
<html lang="en">

<?php
  include "database.php";
  session_start();
?>

<html>
<head>
    <title>Print Expert</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Hero-Carousel-images.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/Navbar-With-Button-icons.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script
      src="https://kit.fontawesome.com/1b607b98d1.js"
      crossorigin="anonymous"
    ></script>
</head>

<body>

    <nav class="navbar navbar-light navbar-expand-md py-3" >
        <div class="container"><i class="fa-regular fa-map" style="width:1rem; height:1rem; margin-right:10px;"></i><a class="navbar-brand d-flex align-items-center" href="customer-home.php"><span><b>Printing</b><b> Expert</b></span></a><button data-bs-toggle="collapse" data-bs-target="#navcol-1" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="About Us.php" >About Us</a> </li>
                    
                    <li class="nav-item"><a class="nav-link" href="Contact us.php">Contact Us<img style="max-width:25px; max-height:20px; margin-bottom:5px;"src="assets/img/icon-contact.png"></a></li>
                    
                    <li class="nav-item"><a class="btn btn-primary" role="button" href="../html/workshop2_homepage.html">Staff Login</a></li>

                    <?php if(isset($_SESSION['username'])):?>
                    <li class="nav-item"><a class="nav-link" href="order.php">Order Now</a></li>
                    <li  class="nav-item nav-link active" style="margin-left:400px"  >Welcome, <?php echo $_SESSION["username"] ?> </li>
                    <?php echo '</ul><a class="btn btn-primary" role="button" href="logout.php" id="logoutButton">Log Out</a>'?>
                    <?php else: echo '</ul><a class="btn btn-primary" role="button" href="login.php" id="myButton">Customer Login</a>'?>
                <?php endif ?>
            </div>
        </div>
    </nav>
    <div class="carousel slide" data-bs-ride="carousel" id="carousel-1" style="height: 600px;" data-aos="fade-up" data-aos-delay="250" data-aos-duration="1000">
        <div class="carousel-inner h-100">
            <div    class="carousel-item active h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/paper factory.jpg" alt="Slide Image" style="z-index: -1;">
                <div class="container d-flex flex-column justify-content-center h-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 offset-md-2">
                            <div class="text" style="max-width: 350px">
                                <h1 class="text-uppercase fw-bold">Get to know<br>the company</h1>
                                <p class="my-3">Unsure whether to trust the company or not? Head over to the page to know us a bit bettter! </p><a class="btn btn-primary btn-lg me-2" role="button" href="About Us.php">Head to page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/about us.jpg" alt="Slide Image" style="z-index: -1;" />
                <div class="container d-flex flex-column justify-content-center h-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 offset-md-2">
                            <div class="text" style="max-width: 350px;">
                                <h1 class="text-uppercase fw-bold">Any more <br>questions? </h1>
                                <p class="my-3">Head over to our contact page for any inquiries!</p><a class="btn btn-primary btn-lg me-2" role="button" href="Contact Us.php">Head to page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(isset($_SESSION['username'])):?>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/order.jpg" alt="Slide Image" style="z-index: -1;">
                <div class="container d-flex flex-column justify-content-center h-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 offset-md-2">
                            <div class="text" style="max-width: 350px;">
                                <h1 class="text-uppercase fw-bold">Great Choice!<br></h1>
                                <p class="my-3">Let's go to the order page to settle your order!</p><a class="btn btn-primary btn-lg me-2" role="button" href="order.php">Head to page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
        <ol class="carousel-indicators">
            <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
            <?php if(isset($_SESSION['username'])):?>
            <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
            <?php endif ?>
        </ol>
</div>
<footer class="text-center bg-dark">
    <div class="container text-white py-4 py-lg-5">
        <ul class="list-inline">
            <li class="list-inline-item list-inline-item me-4"><a class="link-light" href="#">Web design</a></li>
            <li class="list-inline-item list-inline-item me-4"><a class="link-light" href="#">Development</a></li>
            <li class="list-inline-item list-inline-item"><a class="link-light" href="#">Hosting</a></li>
        </ul>
        <ul class="list-inline">
            <li class="list-inline-item list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" class="bi bi-facebook text-light"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path></svg></li>
            <li class="list-inline-item list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" class="bi bi-twitter text-light"><path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path></svg></li>
            <li class="list-inline-item list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" class="bi bi-instagram text-light"><path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path></svg></li>
        </ul>
        <p class="text-muted mb-0">Copyright © 2022 Brand</p>
    </div>
</footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <style>
        .text{
            max-width: 500px;
            max-height:1250px; 
            padding-bottom:10px;
            background-color: rgb(255, 255, 255,0.6);
            border-radius: 10%;
            text-align: center;
        }
    </style>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script> AOS.init();</script>
</body>


</html>