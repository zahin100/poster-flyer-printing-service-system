<?php

  // connect to the server and select the database
  $conn = mysqli_connect('localhost', 'root', '', 'printing_shop');

  //if failed to connect with the database
  if (!$conn) {
      echo "Database Connection failed!" .mysqli_error();
  }
  else{
    $sql = "SELECT * FROM order_service";
    $result = mysqli_query($conn, $sql);
    $chart_data = "";
    while($row = mysqli_fetch_array($result)){
        $productName[] = $row['service_Id'];
        $sales[] = $row['totalPrice'];

    }
  }
  //another one method
  //if(mysqli_connect_errno()){
    //  echo "Connection Failed! ". mysqli_connect_errno();
  //}

?>