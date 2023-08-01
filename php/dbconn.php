<?php

  // connect to the server and select the database
  $conn = mysqli_connect('localhost', 'root', '', 'printing_shop');

  //if failed to connect with the database
  if (!$conn) {
    echo "Database Connection failed!" .mysqli_error();
  }

  //another one method
  //if(mysqli_connect_errno()){
    //  echo "Connection Failed! ". mysqli_connect_errno();
  //}

?>