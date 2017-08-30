<?php
  $servername = "localhost"; //127.0.0.1
  $username = "root";
  $password = "";
  $dbname = "alphatech";

  $conn=mysqli_connect($servername,$username,$password,$dbname);


  if (!$conn) {
    die("connection failed: ". $conn->connection_error);
  }
 ?>
