<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Details</title>
    <script
      src="https://kit.fontawesome.com/1b607b98d1.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" type="text/css" href="../css/emp_dashboard.css" />
  </head>
  <body>
  <?php include 'dbconnection.php'; 
  include 'Employee.php';
  session_start();
  $employee = $_SESSION['employee'];
  
  $tdOrderId = $_GET['orderId'];
  $tdDate = $_GET['date'];
  $tdCustomerId = $_GET['customerId'];
  $tdEmployeeId = $_GET['employeeId'];
  $tdEmployeeAssigned = $_GET['employeeAssigned'];
  $tdStatus = $_GET['status'];
  
  ?>
  <?php             
  $orderId = $_GET['orderId'];
  ?>
    <div class="container">
      <div class="navigation">
        <ul>
          <li>
            <a href="">
              <span class="icon"><i class="fa-regular fa-map"></i></span>
              <span class="title"><h2>Printing Expert</h2></span>
            </a>
          </li>
          <li>
            <a href="orders.php">
              <span class="icon"
                ><i class="fa-solid fa-cart-shopping"></i
              ></span>
              <span class="title">Orders</span>
            </a>
          </li>
          <li>
            <a href="service.php">
              <span class="icon"
                ><i class="fa-sharp fa-solid fa-print"></i
              ></span>
              <span class="title">Service</span>
            </a>
          </li>
          <li>
            <a href="emp_logout.php">
              <span class="icon"
                ><i class="fa-solid fa-right-from-bracket"></i
              ></span>
              <span class="title">Sign Out</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="main">
        <div class="topbar">
          <div class="toggle" onclick="toggleMenu();"></div>
          <div class="search">
          <form action="searchOrder.php" id="searchForm" method="POST"> 
              <input type="search" id="query" name="q" placeholder="Search order">
              <button id="searchBtn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              </form>
          </div>
          <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-circle-user fa-1x" id="userIcon"></i></button>
            <div id="myDropdown" class="dropdown-content">
              <a href="emp_details.php">View Employee Info</a>
              <a href="emp_logout.php">Sign Out</a>
            </div>
          </div>
        </div>

        <div class="details">
          <div class="recentOrders">
            <div class="cardHeader">
              <h2>Order Details</h2>
            </div>
            <table class="specificOrderDetails">

            <?php 
              $query = "SELECT order_service.quantity, order_service.totalPrice, order_service.size, order_service.paymentFile, order_service.imageFile, service.serviceName FROM order_service INNER JOIN service ON order_service.serviceId=service.id WHERE ordersId='$tdOrderId'"; 
              $result = mysqli_query($conn, $query);

              $tdServiceName = '';
              $tdQuantity = '';
              $tdTotalPrice = '';
              $tdPaymentFile = '';
              $tdImageFile = '';
              $tdSize = '';

              while($row = mysqli_fetch_assoc($result)) {

                $tdServiceName = $row['serviceName'];
                $tdQuantity = $row['quantity'];
                $tdTotalPrice = $row['totalPrice'];
                $tdPaymentFile = $row['paymentFile'];
                $tdImageFile = $row['imageFile'];
                $tdSize = $row['size'];

                }
            ?>
        <thead>
            <tr>
                <th>Order ID:</th>
                <td><?php echo $tdOrderId;?></td>
            </tr>
            <tr>
                <th>Date:</th>
                <td><?php echo $tdDate;?></td>
            </tr>
            <tr>
                <th>Customer ID:</th>
                <td><?php echo $tdCustomerId;?></td>
            </tr>
            <tr>
                <th>Employee Assigned:</th>
                <td><?php echo $tdEmployeeAssigned;?></td>
            </tr>
            <tr>
                <th>Service:</th>
                <td><?php echo $tdServiceName;?></td>
            </tr>
            <tr>
                <th>Size:</th>
                <td><?php echo $tdSize;?></td>
            </tr>
            <tr>
                <th>Quantity:</th>
                <td><?php echo $tdQuantity;?></td>
            </tr>
            <tr>
                <th>Total Price (RM):</th>
                <td><?php echo $tdTotalPrice;?></td>
            </tr>
            <tr>
                <th>Payment File:</th>
                <td>
                <button id="btnDownloadPaymentFile"><a title="Download PDF" download="paymentOrderId<?php echo $tdOrderId ?>.PDF" href="data:application/pdf;base64,<?php echo base64_encode($tdPaymentFile);?>" id="linkDownloadPaymentFile">Download Payment File</a></button>
                </td>
            </tr>
            <tr>
                <th>Design Image File:</th>
                <td><button id="btnDownloadImageFile"><a title="Download PDF" download="designImageOrderId<?php echo $tdOrderId ?>.PDF" href="data:application/pdf;base64,<?php echo base64_encode($tdImageFile);?>" id="linkDownloadImageFile">Download Design Image File</a></button></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td class="status <?php echo $tdStatus;?>" id="tdStatus">
                <div>
                    <form action="" method="POST" onsubmit="return confirm('Are you sure to update the order status?')">
                      <select name="updateOrderStatus" <?php if(strcasecmp($tdStatus,"Cancelled")==0 || strcasecmp($tdStatus,"Completed")==0){echo 'disabled=disabled';} if($employee->getId() != $tdEmployeeId){echo 'disabled=disabled';}?> id="selectOrderStatus">
                        <option value="<?php echo $tdStatus;?>"><?php echo $tdStatus;?></option>
                        <option value="<?php if(strcasecmp($tdStatus,"Pending")==0){$orderStatusOption='Completed';echo $orderStatusOption;} else if(strcasecmp($tdStatus,"Completed")==0){$orderStatusOption='Pending';echo $orderStatusOption;} else{$orderStatusOption='Pending';echo $orderStatusOption;}?>"><?php echo $orderStatusOption;?></option>
                        <option value="<?php if(strcasecmp($tdStatus,"Pending")==0){$orderStatusOption='Cancelled';echo $orderStatusOption;} else if(strcasecmp($tdStatus,"Completed")==0){$orderStatusOption='Cancelled';echo $orderStatusOption;} else{$orderStatusOption='Completed';echo $orderStatusOption;}?>"><?php echo $orderStatusOption;?></option>
                      </select>
                    <br><br><button type="submit" id="btnUpdateOrderStatus" inline="TRUE" <?php if(strcasecmp($tdStatus,"Cancelled")==0 || strcasecmp($tdStatus,"Completed")==0){echo 'disabled=disabled';} if($employee->getId() != $tdEmployeeId){echo 'disabled=disabled';}?> >Update Order Status</button>
                    </form>
                </div>
                </td>
            </tr>
        </thead>
        
            </table>
            <br>
            <div><button class="orderDetailsBackButton" type="button" id="editServiceBtnCancel" inline="TRUE"><a href="orders.php" id="anchorLinkCancel">Back</a></button></div>
          </div>
        </div>
           
          </div>
        </div>
      </div>
    </div>
    <script>
      function toggleMenu() {
        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");
        toggle.classList.toggle("active");
        navigation.classList.toggle("active");
        main.classList.toggle("active");
      }

      /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
    </script>
  </body>
</html>

<?php

if(isset($_POST['updateOrderStatus'])){
$updateOrderStatus = $_POST['updateOrderStatus'];
$query = "UPDATE orders SET status='$updateOrderStatus' WHERE id='$tdOrderId'";
$result = mysqli_query($conn, $query);

if(strcasecmp($updateOrderStatus,"Completed")==0){
  $query = "SELECT firstname, email FROM customer WHERE id='$tdCustomerId'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $customerName = $row['firstname'];
  $customerEmail = $row['email'];
  $employeeEmail = $employee->getEmail();
  
  // the message
  $message = "Hi $customerName, Your order for order id $tdOrderId has been completed and has been shipped out. Kindly wait for the courier to deliver your items. \n\nThank you for using our service.\n\nBest regards, \n$tdEmployeeAssigned,\nEmployee of Printing Expert";
  $headers = "From: $employeeEmail";
  $to_email = $customerEmail;
  $subject = "Your order has been completed";
  
  mail($customerEmail,$subject,$message,$headers);
  }

  echo "<script>
  window.location.href='orders.php';
  alert('THE ORDER STATUS HAS BEEN SUCCESSFULLY UPDATED!');
  </script>";
}
?>

