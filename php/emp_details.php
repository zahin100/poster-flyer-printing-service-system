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
  $firstName = $employee->getFirstName();
  $lastName = $employee->getLastName();
  $name = $firstName . " " . $lastName;
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
              <h2>Employee Info</h2>
            </div>
            <table class="specificOrderDetails">

        <thead>
            <tr>
                <th>Employee ID:</th>
                <td><?php echo $employee->getId();?></td>
            </tr>
            <tr>
                <th>Name:</th>
                <td><?php echo $name;?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $employee->getEmail();?></td>
            </tr>
            <tr>
                <th>Phone Number:</th>
                <td><?php echo $employee->getPhoneNumber();?></td>
            </tr>
            <tr>
                <th>Role:</th>
                <td><?php echo $employee->getRole();?></td>
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