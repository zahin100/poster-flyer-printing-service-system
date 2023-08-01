<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Service</title>
    <script
      src="https://kit.fontawesome.com/1b607b98d1.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" type="text/css" href="../css/emp_dashboard.css" />
  </head>
  <body>
  <?php include 'dbconnection.php'; 
  include 'Employee.php';
  session_start();?>
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

        <div class="details" id="service">
          <div class="recentOrders">
            <div class="cardHeader">
              <h2>Services</h2>
            </div>
            <table id="serviceTable">
              <thead >
                <tr>
                  <td>SERVICE ID</td>
                  <td>NAME</td>
                  <td>PRICE (RM)</td>
                  <td>LAST MODIFIED BY</td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
                <?php
              $query = "SELECT service.id, service.serviceName, service.price, CONCAT(employee.firstName, ' ', employee.lastName) AS name FROM service INNER JOIN employee ON service.employeeId=employee.id;"; 
              $result = mysqli_query($conn, $query);
              $employee = $_SESSION['employee'];

              while($row = mysqli_fetch_assoc($result)) {
                $serviceId = $row['id'];
                $serviceName = $row['serviceName'];
                $servicePrice = $row['price'];
              ?>
              <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['serviceName'];?></td>
                <td><?php echo $row['price'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><form action="editService.php?serviceId=<?php echo $serviceId;?>&servicePrice=<?php echo $servicePrice;?>" method="POST"><button type="submit" id="btnEditService" <?php if(strcasecmp($employee->getRole(),"Junior Employee")==0){echo 'disabled=disabled';}?>>Edit</button></form></td> 
              </tr>
              <?php
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
