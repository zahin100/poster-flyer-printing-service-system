<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <script src="https://kit.fontawesome.com/1b607b98d1.js" crossorigin="anonymous"></script>
  </head>
  <body class= "bg-image">
  
    <div class="container">
      <div class="py-5 text-center">
      <i class="fa-regular fa-map"></i>
        <h1>Checkout Page</h1>
        <p class="lead fs-6"> Please fill the information regarding the shipment</p>
      </div>

      <?php
       include ('database.php');
       session_start();

       $username = $_SESSION['username'];
    

       $query = "SELECT * FROM order_service WHERE id = (SELECT MAX(id) FROM order_service) LIMIT 1";
       $result = mysqli_query($conn, $query);

       if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $serviceId = $row['serviceId'];
            $size = $row['size'];
            $quantity = $row['quantity'];
            $totalPrice = $row['totalPrice'];
        }

       $query = "SELECT serviceName FROM service WHERE id = '$serviceId'";
       $result = mysqli_query($conn, $query);
       $row = mysqli_fetch_assoc($result);
       $serviceName = $row['serviceName'];

       


      ?>

      <div class="row g-5">
        <div class="col-md-7 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-primary">Your cart</span>
            </h4>
            <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Service</h6>
                </div>
                <span class="text-muted"><?php echo $serviceName ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Size</h6>
                </div>
                <span class="text-muted"><?php echo $size ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Quantity</h6>
                </div>
                <span class="text-muted"><?php echo $quantity ?> pcs</span>
              </li>
              <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                  <h6 class="my-0">Total Price</h6>
                </div>
                <span class="text-success">RM <?php echo $totalPrice ?></span>
              </li>
           </ul>
         </div>
        
         <?php
         
         }
         
         
         $query = "SELECT * FROM customer WHERE username = '$username'";
         $result = mysqli_query($conn, $query);
         
         if (mysqli_num_rows($result) > 0) {

         while ($row = mysqli_fetch_assoc($result)){
            $firstname= $row['firstname']; 
            $lastname =$row['lastname'] ;
            $phoneNumber = $row['phoneNumber'];
            $address = $row['address'];
            $user = $row['username'];
            
         }



          ?>
      
      <div class="col-md-7 col-lg-8">
        
          <div class="">
              <ul class="list-group">
                <li class="list-group-item active" aria-current="true">Your information</li>
                <li class="list-group-item">
                  <div>
                    <h6 class="my-0">Username</h6>
                  </div>
                  <span class="text-muted"><?php echo $user ?></span>
                </li>
                <li class="list-group-item">
                  <div>
                    <h6 class="my-0">Full Name</h6>
                  </div>
                  <span class="text-muted"><?php echo "$firstname $lastname" ?></span>
                </li>
                <li class="list-group-item">
                  <div>
                    <h6 class="my-0">Phone Number</h6>
                  </div>
                  <span class="text-muted"><?php echo $phoneNumber ?></span>
                </li>
                <li class="list-group-item">
                  <div>
                    <h6 class="my-0">Address</h6>
                  </div>
                  <span class="text-muted"><?php echo $address ?></span>
                </li>
              </ul>
          </div>
        </div>
        <?php
         }
        

        ?>
      </div>
      <br>
      <br>
      
      
      <form action="insertFile.php" class="needs-validation was-validated" novalidate method="POST" >
         <div class="mb-3">
               <label for="formFile" class="form-label">Acc number: 1929238384755(Maybank) <br> <br> Please upload the receipt</label>
               <input class="form-control" type="file" name="file" id="formFile" required accept="application/pdf" >
            </div>
         <div class="col-sm-6">
              <button class="btn btn-primary" type="submit" name="submitFile">Click here to submit the file</button><br><br>
            </div>
         </form>
    </div>
  </body>
</html>