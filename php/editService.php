<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Service</title>
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
  <?php 
  $serviceId = $_GET['serviceId'];
  $servicePrice = $_GET['servicePrice'];

  $query = "SELECT serviceName FROM service WHERE id='$serviceId'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $serviceName = $row['serviceName'];


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

        <div class="details" id="service">
          <div class="recentOrders">
            <div class="cardHeader">
              <h2>Service ID: <?php echo $serviceId ?></h2>
            </div>
           <div class="containerEditService">
           <?php $employee = $_SESSION['employee'];?>
            <form action="editService2.php?serviceId=<?php echo $serviceId?>&employeeId=<?php echo $employee->getId();?>" method="POST" onsubmit="return confirm('Are you sure to update the service details?')">
            <div><label id="labelName">Name </label><input type="text" value='<?php echo $serviceName?>' name="newServiceName" id="textName"><div><br>
           <div><label id="labelPrice">Price </label><input type="text" value='<?php echo $servicePrice?>' name="newServicePrice" id="textPrice"><div><br>
            <button class="updateButtonEditService" type="submit" id="btnViewOrderDetails" inline="TRUE">Update</button>
            <form class="cancelButtonEditService" action="service.php" method="POST"><button type="button" id="editServiceBtnCancel" inline="TRUE"><a href="service.php" id="anchorLinkCancel">Cancel</a></button></form>
        </form>
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