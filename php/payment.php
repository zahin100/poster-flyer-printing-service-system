<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>
  <body class= "bg-image">
    <div class="container">
      <div class="py-5 text-center">
        <img class="mb-4-block mx-auto" src="https://img.freepik.com/premium-vector/printing-company-logo-design-with-printer-graphics-colorful-chart-lines-illustration_227744-655.jpg" alt="Printing Expert" width="120" height="120">
        <h4>Checkout Page</h4>
        <p class="lead fs-6"> Please fill the information regarding the shipment</p>
      </div>

      <?php
       include ('database.php');
       session_start();

       $firstname = "";
       $lastname = "";
       $email = "";
       $phoneNumber="";
       $address = "";
       
    

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
         
         ?>

      
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation was-validated" novalidate action="insertData.php" method="POST" >
          <div class="row g-3">
             <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
                  <input type="text" class="form-control" name="firstname" placeholder="John" required>
               <div class="invalid-feedback">
                 Valid first name is required.
              </div>
            </div>

           <div class="col-sm-6">
             <label for="lastName" class="form-label">Last name</label>
             <input type="text" class="form-control" name="lastname" placeholder="Smith" required>
             <div class="invalid-feedback">
               Valid last name is required.
             </div>
           </div>

           <div class="col-sm-6">
             <label for="phoneNumber" class="form-label">Phone Number</label>
             <div class="input-group has-validation">
               <input type="tel" class="form-control" name="phoneNumber" placeholder="123456789" required>
             <div class="invalid-feedback">
                 The phone number is required.
               </div>
             </div>
           </div>

           <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" name="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
           </div>

           <div class="col-12">
              <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                   Please enter your shipping address.
                </div>
           </div>

           <div class="mb-3">
               <label for="formFile" class="form-label">Acc number: 1929238384755(Maybank) <br> <br> Please upload the receipt</label>
               <input class="form-control" type="file" name="file" id="formFile" required>
            </div>

           <div class="col-sm-6">
              <button class="btn btn-primary" type="submit" name="submitform">Click here to submit the file and the shipping form</button><br><br>
              
            </div>

            <input class="btn btn-secondary" style="width:100px; height:37px" type="reset" value="Reset">
           </div>
           </form>
         </div>
        </div>

         <hr class="my-4">

      </div>
    </div>

    
    
   
    

</body>

</html>
