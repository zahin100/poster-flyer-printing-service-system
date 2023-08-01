<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-With-Button-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>


<body>
    <form>
        <input  type="submit" class="btn btn-primary rounded-left" value="Back" onclick="history.back()" style="margin-top:10px; margin-left:10px" >
    </form>
    <section class="position-relative py-4 py-xl-5">
    
        <div class="container" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000" >
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto" >
                    <h2>Log in</h2>
                    <p class="w-lg-50">Log in to access more features</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center" >
                <div class="col-md-6 col-xl-4 offset-md-0 border rounded" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;" id="column1">
                    <div id="logininfo" >
                        <h2>Log In</h2>
                        <p id="logininfo_extended">Login to access more features in our website! Do not worry as your login information will be kept safe. <a href="register.php"> Don't have an account?</a></p>
                    </div>
                </div>
                <div class="col"  >
                    <div class="card mb-5" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
                        <div class="card-body d-flex flex-column align-items-center" >
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg class="bi bi-person" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
        </svg></div>
                            <form class="text-center" method="post" action="login-action.php">
                                <div class="mb-3">
                                    <input class="form-control form-control form-control form-control form-control form-control" type="text" name="Username" placeholder="Username" re>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control form-control form-control form-control form-control form-control" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100" type="submit">Login</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><script src="assets/bootstrap/js/bootstrap.min.js"></script><script src="assets/js/basic.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>


</html>