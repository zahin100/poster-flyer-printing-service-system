<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orders</title>
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
    $searchQuery = $_POST['q'];
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
        <div class="cardBox">
          <div class="card">
            <div>
              <?php
              $query = "SELECT COUNT(id) AS TotalOrders FROM orders"; 
              $result = mysqli_query($conn, $query);
              $TotalOrders = 0;

              if(mysqli_num_rows($result) == 1){
                while($row = mysqli_fetch_assoc($result)) {
                  $TotalOrders = $row["TotalOrders"];
                }
            } else {
              $TotalOrders = 0;
            }
              ?>
              <div class="numbers"><?php echo $TotalOrders; ?></div>
              <div class="cardName">Total Orders</div>
            </div>
            <div class="iconBox">
              <i class="fa-solid fa-cart-shopping"></i>
            </div>
          </div>
          <div class="card">
            <div>
            <?php
              $query = "SELECT COUNT(id) AS orderPending FROM orders WHERE status = 'Pending' "; 
              $result = mysqli_query($conn, $query);
              $orderPending = 0;

              if(mysqli_num_rows($result) == 1){
                while($row = mysqli_fetch_assoc($result)) {
                  $orderPending = $row["orderPending"];
                }
            } else {
              $orderPending = 0;
            }
              ?>
              <div class="numbers"><?php echo $orderPending ?></div>
              <div class="cardName">Order Pending</div>
            </div>
            <div class="iconBox">
              <i class="fa-solid fa-circle-exclamation"></i>
            </div>
          </div>
          <div class="card">
            <div>
            <?php
              $query = "SELECT COUNT(id) AS orderCompleted FROM orders WHERE status = 'Completed' "; 
              $result = mysqli_query($conn, $query);
              $orderCompleted = 0;

              if(mysqli_num_rows($result) == 1){
                while($row = mysqli_fetch_assoc($result)) {
                  $orderCompleted = $row["orderCompleted"];
                }
            } else {
              $orderCompleted = 0;
            }
              ?>
              <div class="numbers"><?php echo $orderCompleted ?></div>
              <div class="cardName">Order Completed</div>
            </div>
            <div class="iconBox">
              <i class="fa-solid fa-circle-check"></i>
            </div>
          </div>
          <div class="card">
            <div>
            <?php
              $query = "SELECT COUNT(id) AS orderCancelled FROM orders WHERE status = 'Cancelled' "; 
              $result = mysqli_query($conn, $query);
              $orderCancelled = 0;

              if(mysqli_num_rows($result) == 1){
                while($row = mysqli_fetch_assoc($result)) {
                  $orderCancelled = $row["orderCancelled"];
                }
            } else {
              $orderCancelled = 0;
            }
              ?>
              <div class="numbers"><?php echo $orderCancelled ?></div>
              <div class="cardName">Order Cancelled</div>
            </div>
            <div class="iconBox">
              <i class="fa-solid fa-circle-xmark"></i>
            </div>
          </div>
        </div>

        <div class="details">
          <div class="recentOrders">
            <div class="cardHeader">
              <h2>Recent Orders</h2>
              <?php //<a href="" class="btn">View All</a> ?>
            </div>
            <table>
              <thead>
                <tr>
                  <td>ORDER ID</td>
                  <td>DATE</td>
                  <td>CUSTOMER ID</td>
                  <td>EMPLOYEE ASSIGNED</td>
                  <td>STATUS</td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
              <?php 
              $query = "SELECT orders.id, DATE_FORMAT(orders.date, '%d-%m-%Y %H:%i:%s') AS date, orders.customerId, orders.employeeId, orders.status, CONCAT(employee.firstName, ' ', employee.lastName) AS name FROM orders INNER JOIN employee ON orders.employeeId=employee.id WHERE orders.id='$searchQuery' OR DATE_FORMAT(orders.date, '%d-%m-%Y %H:%i:%s') LIKE '%$searchQuery%' OR orders.customerId='$searchQuery' OR orders.status='$searchQuery' OR employee.firstName LIKE '$searchQuery%' OR employee.lastName LIKE '$searchQuery%' ORDER BY id DESC;"; 
              $result = mysqli_query($conn, $query);

              if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['customerId'];?></td>
                <td><?php echo $row['name']; ?></td>
                <td><span class="status <?php echo $row['status'];?>"><?php echo $row['status'];?></span></td>
                <td><form action="orderDetails.php?orderId=<?php echo $row['id'];?>&date=<?php echo $row['date'];?>&customerId=<?php echo $row['customerId'];?>&employeeAssigned=<?php echo $row['name'];?>&status=<?php echo $row['status'];?>&employeeId=<?php echo $row['employeeId'];?>" method="POST"><button type="submit" id="btnViewOrderDetails">View Order Details</button></form></td>
              </tr>
              <?php
                }}

                else{
                    echo "<script>
                        window.location.href='orders.php';
                        alert('NO DATA FOUND.');
                        </script>";
                }
            ?>
              </tbody>
            </table>
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
