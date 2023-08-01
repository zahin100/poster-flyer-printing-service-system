<?php
session_start();
include 'database.php';

$sql = "SELECT price FROM service WHERE serviceName='Poster Printing'";
$result = mysqli_query($conn,$sql);
$rowPricePoster=mysqli_fetch_row($result);
$poster = $rowPricePoster[0];

$sql2 = "SELECT price FROM service WHERE serviceName='Flyer Printing'";
$result2 = mysqli_query($conn,$sql2);
$rowPriceFlyer=mysqli_fetch_row($result2);
$flyer = $rowPriceFlyer[0];

$resultOrderId = mysqli_query($conn, "SELECT id 
FROM orders 
WHERE id = (SELECT MAX(id) FROM orders)");
$orderId = mysqli_fetch_row($resultOrderId);

$username = $_SESSION['username'];
$rowUsername = mysqli_query($conn,"SELECT id
FROM customer 
WHERE username = '$username'");
$rowCustomerId=mysqli_fetch_row($rowUsername);

$OrderService = mysqli_query($conn,
"SELECT `quantity`, `size`,`totalPrice` 
FROM order_service
WHERE ordersId = '$orderId[0]'");

$Orders = mysqli_query($conn,"SELECT 'date','status' 
FROM orders
WHERE customerId = '$rowCustomerId[0]'");
$rowOrders=mysqli_fetch_row($Orders);
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                    <li class="nav-item"><a class="nav-link" href="Contact us.php">Contact Us<img style="max-width:25px; max-height:20px; margin-bottom:5px;"src="assets/img/icon-contact.png"></a></li></a></li>
                    <?php if(isset($_SESSION['username'])):?>
                    <li class="nav-item"><a class="nav-link active" href="order.php">Order Now</a></li>
                    <li  class="nav-item nav-link active" style="margin-left:30vw">Welcome, <?php echo $_SESSION["username"] ?> </li>
                    <?php echo '</ul><a  class="btn btn-primary" role="button" href="logout.php" id="logoutButton">Log Out</a>'?>
                    <?php else: echo '</ul><a class="btn btn-primary" role="button" href="login.php" id="myButton">Login</a>'?>
                <?php endif ?>
            </div>
        </div>
    </nav>
    <div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Check out our offers!</h2>
            </div>
        </div>
        <div data-aos="flip-left" data-aos-delay="250" data-aos-duration="1000" class="row gy-4 gy-xl-0 row-cols-1 row-cols-md-2 row-cols-xl-3 d-xl-flex align-items-xl-center gutter-y" >
            <div class="col" >
                <div class="card"style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <div class="card-body text-center p-4">
                        
                        <h4 class="display-4 fw-bold card-title">1-50<br> Pieces</h4>
                    </div>
                    <div class="card-footer p-4">
                        <div>
                            <ul class="list-unstyled">
                                <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon-primary-light bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-check-lg">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"></path>
                                        </svg></span><span>Up to 5% saved</span></li>
                                <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon-primary-light bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-check-lg">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"></path>
                                        </svg></span><span>Free shipment</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-primary border-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <div class="card-body text-center p-4 "><span class="badge rounded-pill bg-primary position-absolute top-0 start-50 translate-middle text-uppercase">Most Popular</span>
                        <h4 class="display-4 fw-bold card-title">100+ Pieces</h4>
                    </div>
                    <div class="card-footer p-4">
                        <div>
                            <ul class="list-unstyled">
                            <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon-primary-light bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-check-lg">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"></path>
                                        </svg></span><span>Up to 15% saved</span></li>
                                <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon-primary-light bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-check-lg">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"></path>
                                        </svg></span><span>Free shipment</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <div class="card-body text-center p-4">
                        
                        <h4 class="display-4 fw-bold card-title">50-100 Pieces</h4>
                    </div>
                    <div class="card-footer p-4">
                        <div>
                            <ul class="list-unstyled">
                            <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon-primary-light bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-check-lg">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"></path>
                                        </svg></span><span>Up to 10% saved</span></li>
                                <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon-primary-light bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-check-lg">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"></path>
                                        </svg></span><span>Free shipment</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xl-6 text-center mx-auto order-options mb-3 rounded" data-aos="fade-up" data-aos-delay="250" data-aos-duration="1000">
        <h2>Your pending orders</h2>
        
        <?php if(isset($_SESSION['one-day'])):?>
            <p class="lead"><b>Sorry but that order has exceeded the cancellation period(1 day)</b></p>  
        <?php else: ?>
        <?php endif ?>
        <?php unset ($_SESSION['one-day']);?>

        
        <br>
            <div style="max-width:20vw; margin-left:34vw">
                <!-- search form -->
                <div class="input-group">
                <input style="margin-left:3vw" type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter Order ID">
                </div>             
            </div>
            <br>
            <div class="scrollable" style="height:40vh;overflow:scroll;">
            <table class="table table-hover" id="myTable">
                <thead style="position:sticky;top:0">
                    <tr class="bg-dark text-white"> 
                        <th>Order ID </th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Want to cancel your order?</th>
                    </tr>
                </thead>

                
                    <?php 
                            
                        $sqlorder ="SELECT orders.status,order_service.quantity, order_service.totalPrice, order_service.size, orders.date, orders.id
                        FROM order_service
                        INNER JOIN orders ON orders.id = order_service.ordersId
                        WHERE orders.customerId = $rowCustomerId[0] AND orders.status = 'Pending'
                        ORDER BY orders.id DESC";  

                        $resultJOIN = mysqli_query($conn,$sqlorder);
                        

                        if(mysqli_num_rows($resultJOIN)>0){
                            
                        while($row1 = mysqli_fetch_assoc($resultJOIN))
                        {
                     ?>     
                        <tr>
                        <td> <?php echo $row1['id'];  ?> </td>
                        <td> <?php echo $row1['quantity']; ?> </td>
                        <td> <?php echo $row1['size']; ?></td>
                        <td> RM <?php echo $row1['totalPrice']; ?></td>
                        <td> <?php echo $row1['status']; ?></td>
                        <td>
                            <button onclick="showPrompt(<?php echo $row1['id']?>)" class='btn btn-danger btn-sm' >Cancel</button>
                        </td>
                        </tr>
                        
                        <script type="text/javascript">
                        function showPrompt(orderid) {
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Confirm'
                                }).then((result) => {
                                if (result.isConfirmed) {          
                                    window.location.assign('cancel.php?id='+orderid);
                                }
                                })
                        }
                        </script>
                    <?php
                            
                        }
                    }
                    else{
                        echo"<p>You currently have no recent orders</p>";
                    }
                    
                    ?>
            </table>
            </div>
        </div>
    </div>
    
    <div class="poppup" id="poppup-1">
        <div class="overlay">
            <div class="content rounded">
                <div class="close-btn" onclick="togglePoppup()">&times;</div>
                <h1>Order</h1>
                <form method="post" action="order-action.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <input placeholder="Enter the quantity here" id="quantity" name="quantity" class="form-control mb-3" type="text" style=" float:left; margin:auto">      
                </div>
                <div class="mb-3">
                <div id="poster-size" class="mb-3">
                    <p style="float:left;" >Choose your size:</p>
                    <select id="type" name="types" style="width:280px; float:right; margin:auto;" class="mb-3" >
                        <option value="Flyer Printing">Flyer Printing</option>
                        <option value="Poster Printing">Poster Printing</option>
                    </select>
                </div>
                <div id="poster-size" class="mb-3">
                    <p style="float:left;" >Choose your size:</p>
                    <select id="size" name="sizes" style="width:280px; float:right; margin:auto;" class="mb-3" >
                        <option class="mb-3"value="8.5 x 11 inches">8.5 x 11 inches</option>
                        <option value="12 x 18 inches">12 x 18 inches</option>
                        <option value="18 x 24 inches">18 x 24 inches</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button onclick="checkPrice()" class="btn btn-primary d-block w-100" type="button">Check Price</button>
                </div>
                    <input name="total" type="text" id="total" required readonly class="form-control shadow-none" placeholder="Total price(in RM)" >
                </div>
                <div class="mb-3">
                    <p style="float:left;" class="mb-3">Upload your design:</p>
                    <input class="form-control mb-3" name="design_file" style="float:right; max-width:250px; margin-left:3px" type="file" accept="application/pdf" required  >
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-block w-100" type="submit">Proceed</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary" onclick="togglePoppup()" style="box-shadow: rgba(100, 100, 111, 0.5) 0px 7px 29px 0px;">
        Proceed
        </button>
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
     
     <script>
       function myFunction(){
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }
        }
        }

        
        function togglePoppup(){
            document.getElementById("poppup-1").classList.toggle("active");
        }
        
        function checkPrice(){
            var select = document.getElementById('size').value;
            var selectType = document.getElementById('type').value;
            var quantity = parseInt(document.getElementById("quantity").value);
            var priceFlyer = <?=$flyer?>;
            var pricePoster = <?=$poster?>;
            

            if(!quantity && !quantity.value)
            {
                document.getElementById("total").value = "Please enter the quantity! ";
            }
            
            if(selectType == "Poster Printing")
            {
                if(quantity>=1 && quantity<=50){
                    let discount = 0.05;
                        if(select=="8.5 x 11 inches"){
                            var total = 1*quantity*pricePoster;
                            var last_total =total -(discount * total);
                            var x = last_total.toFixed(2);
                            document.getElementById("total").value = x;
                    }
                        else if(select=="12 x 18 inches"){
                            var total = 1.5*quantity*pricePoster;
                            var last_total =total -(discount * total);
                            var x = last_total.toFixed(2);
                            document.getElementById("total").value =  x;
                    }
                
                        else if(select=="18 x 24 inches"){
                            var total = 2*quantity*pricePoster;
                            var last_total =total -(discount * total);
                            var x = last_total.toFixed(2);
                            document.getElementById("total").value = x;
                    }
                    
                }

                if(quantity>=51 && quantity<=100){     
                    let discount = 0.1;
                    if(select=="8.5 x 11 inches"){
                        var total = 1*quantity*pricePoster;
                        var last_total =total -(discount * total);
                        var x = last_total.toFixed(2);
                        document.getElementById("total").value =  x;
                    }
                    else if(select=="12 x 18 inches"){
                        var total = 1.5*quantity*pricePoster;
                        var last_total =total -(discount * total);
                        var x = last_total.toFixed(2);
                        document.getElementById("total").value =  x;
                    }
                    else if(select=="18 x 24 inches"){
                        var total = 2*quantity*pricePoster;
                        var last_total =total -(discount * total);
                        var x = last_total.toFixed(2);
                        document.getElementById("total").value =  x;
                    }
                }

                if(quantity>=101){
                    let discount = 0.15;
                    if(select=="8.5 x 11 inches"){
                        var total = 1*quantity*pricePoster;
                        var last_total =total -(discount * total);
                        var x = last_total.toFixed(2);
                        document.getElementById("total").value =x;
                    }
                    else if(select=="12 x 18 inches"){
                        var total = 1.5*quantity*pricePoster;
                        var last_total =total -(discount * total);
                        var x = last_total.toFixed(2);
                        document.getElementById("total").value =  x;
                    }
                    else if(select=="18 x 24 inches"){
                        var total = 2*quantity*pricePoster;
                        var last_total =total -(discount * total);
                        var x = last_total.toFixed(2);
                        document.getElementById("total").value = x;
                    }
                }
            }
            
            else if(selectType == "Flyer Printing"){
                if(quantity>=1 && quantity<=50){
                    let discount=0.05;
                        if(select=="8.5 x 11 inches"){
                            var total = 1*quantity*priceFlyer;
                            var last_total =total -(discount * total);
                            var x = last_total.toFixed(2);
                            document.getElementById("total").value = x;
                    }
                        else if(select=="12 x 18 inches"){
                            var total = 1.5*quantity*priceFlyer;
                            var last_total =total -(discount * total);
                            var x = last_total.toFixed(2);
                            document.getElementById("total").value =  x;
                    }
                
                        else if(select=="18 x 24 inches"){
                            var total = 2*quantity*priceFlyer;
                            var last_total =total -(discount * total);
                            var x = last_total.toFixed(2);
                            document.getElementById("total").value =  x;
                    }
                    
                }

                else if(quantity>=51 && quantity<=100){   
                    let discount = 0.1;  
                    if(select=="8.5 x 11 inches"){
                        var total = 1*quantity*priceFlyer;
                        var last_total =total -(discount * total);
                        var x = last_total.toFixed(2);
                        document.getElementById("total").value =  x;
                    }
                    else if(select=="12 x 18 inches"){
                        var total = 1.5*quantity*priceFlyer;
                        var last_total =total -(discount * total);
                        var x = last_total.toFixed(2);
                        document.getElementById("total").value = x;
                    }
                    else if(select=="18 x 24 inches"){
                        var total = 2*quantity*priceFlyer;
                        var last_total =total -(discount * total);
                        var x = last_total.toFixed(2);
                        document.getElementById("total").value =  x;
                    }
                }

                else if(quantity>=101){
                    let discount = 0.15;
                    if(select=="8.5 x 11 inches"){
                        var total = 1*quantity*priceFlyer;
                        var last_total =total -(discount * total);
                        var x = last_total.toFixed(2);
                        document.getElementById("total").value =  x;
                    }
                    else if(select=="12 x 18 inches"){
                        var total = 1.5*quantity*priceFlyer;
                        var last_total =total -(discount * total);
                        var x = last_total.toFixed(2);
                        document.getElementById("total").value =  x;
                    }
                    else if(select=="18 x 24 inches"){
                        var total = 2*quantity*priceFlyer;
                        var last_total =total -(discount * total); 
                        var x = last_total.toFixed(2);
                        document.getElementById("total").value =  x;
                    }
                }
            }
            
        }
        
        btn.addEventListener('click',checkPrice);
    
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script> AOS.init();</script>
</body>

</html>