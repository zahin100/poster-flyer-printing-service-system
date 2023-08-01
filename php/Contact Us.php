<?php
session_start();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact us</title>
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
<nav class="navbar navbar-light navbar-expand-md py-3 rounded-bottom">
        <div class="container"><i class="fa-regular fa-map" style="width:1rem; height:1rem; margin-right:10px;"></i><a class="navbar-brand d-flex align-items-center" href="customer-home.php"><span><b>Printing</b><b> Expert</b></span></a><button data-bs-toggle="collapse" data-bs-target="#navcol-1" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="About Us.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link active" href="Contact us.php">Contact Us<img style="max-width:25px; max-height:20px; margin-bottom:5px;"src="assets/img/icon-contact.png"></a></li></a></li>
                    <li class="nav-item"><a class="btn btn-primary" role="button" href="../html/workshop2_homepage.html">Staff Login</a></li>
                    <?php if(isset($_SESSION['username'])):?>
                    <li class="nav-item"><a class="nav-link" href="order.php">Order Now</a></li>
                    <li  class="nav-item nav-link active" style="margin-left:400px"  >Welcome, <?php echo $_SESSION["username"] ?> </li>
                    <?php echo '</ul><a class="btn btn-primary" role="button" href="logout.php" id="logoutButton">Log Out</a>'?>
                    <?php else: echo '</ul><a class="btn btn-primary" role="button" href="login.php" id="myButton">Login</a>'?>
                <?php endif ?>
            </div>
        </div>
    </nav>
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative rounded " style = "background-color:rgba(255,255,255,0.4); padding-bottom:20px; box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;" data-aos="flip-left" data-aos-delay="500" data-aos-duration="1000">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Contact us</h2>
                    <p class="w-lg-50">Contact us through email or phone, or drop by the <strong>Printing Expert HQ!</strong> </p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="d-flex flex-column justify-content-center align-items-start h-100">
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h6 class="mb-0">Phone</h6>
                                <p class="mb-0">+60 12-659 4932</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-envelope">
                                    <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h6 class="mb-0">Email</h6>
                                <p class="mb-0">printingexpertcom@gmail.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pin">
                                    <path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354zm1.58 1.408-.002-.001.002.001zm-.002-.001.002.001A.5.5 0 0 1 6 2v5a.5.5 0 0 1-.276.447h-.002l-.012.007-.054.03a4.922 4.922 0 0 0-.827.58c-.318.278-.585.596-.725.936h7.792c-.14-.34-.407-.658-.725-.936a4.915 4.915 0 0 0-.881-.61l-.012-.006h-.002A.5.5 0 0 1 10 7V2a.5.5 0 0 1 .295-.458 1.775 1.775 0 0 0 .351-.271c.08-.08.155-.17.214-.271H5.14c.06.1.133.191.214.271a1.78 1.78 0 0 0 .37.282z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h6 class="mb-0">Location</h6>
                                <p class="mb-0"><a href='https://goo.gl/maps/RT6aPXwmij3UPjYeA'>Printing Expert HQ</a><br><br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 col-xl-4">
                <iframe style="border: 1px solid black"src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d3986.5708491519817!2d102.31703911366476!3d2.311868808376041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m5!1s0x31d1e46c6eaa869b%3A0xb8935957e3536888!2sUniversiti%20Teknikal%20Malaysia%20Melaka%2C%20Jalan%20Hang%20Tuah%20Jaya%2C%20Durian%20Tunggal%2C%20Malacca!3m2!1d2.3137898!2d102.3211166!4m3!3m2!1d2.313892!2d102.31833499999999!5e0!3m2!1sen!2smy!4v1672324944551!5m2!1sen!2smy" 
                    width="400" 
                    height="350" 
                    style="border:0;"
                    allowfullscreen="yes"
                     loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script> AOS.init();</script>
</body>

</html>