<?php

// database connection
session_start();
include('dbconn.php');

?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login || Admin</title>
        
        <?php include('header.php'); ?>

    </head>
  
    <body>
        <p class="text-center p-2 mb-2 bg-light text-dark">Printing Expert | Admin</p>
            <form action="login_conn.php" method="POST">
            <section class="vh-100" style="background-color: #508bfc;">
                <div class="container py-4 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card shadow-2-strong" style="border-radius: 2rem;">
                                <div class="card-body p-5">
                                    <!-- connection to message.php-->
                                    <?php include('message.php'); ?>
                                    
                                    <h3 class="text-center mb-4">Log In</h3>

                                    <!-- if error occur -->
                                    <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error'];} ?></p>
                                
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="username">Username:</label>
                                        <input type="text" id="username" class="form-control" name="username" 
                                        placeholder="Abc123" required/>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Password:</label>
                                        <input type="password" id="password" class="form-control" name="password" 
                                        maxlength= "12" required />
                                    </div>

                                    <!-- 2 column grid layout for inline styling 
                                    <div class="row mb-4">
                                        <div class="col">
                                        <a href="resetPass.php">Forgot password?</a>
                                        </div>
                                    </div>
                                    -->

                                    <!-- Submit button -->
                                    <a class="btn btn-primary btn-block mb-4" href="../html/workshop2_homepage.html" role="button">Back</a>
                                    <button type="submit" name="loginBtn"class="btn btn-primary btn-block mb-4">
                                        Log In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <?php include('footer.php'); ?>

                
            </section>
        </form>

        <?php include('script.php'); ?>

    </body>

</html>