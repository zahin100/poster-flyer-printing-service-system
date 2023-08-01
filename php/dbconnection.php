<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "printing_shop";

$conn = mysqli_connect($serverName, $username, $password, $dbName) or trigger_error("Unable to connect to the database");
