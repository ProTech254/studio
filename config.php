<?php
  $hostname = "localhost";
  $username = "root";
  $password = "E40782174o";
  $dbname = "cdf";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
