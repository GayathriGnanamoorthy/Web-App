<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "chat";
  //$port = "3308";


  $conn = mysqli_connect($hostname, $username, $password, $dbname);//port removed
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
  
?>
