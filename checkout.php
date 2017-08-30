<?php
require 'connect.php';
session_start();
#$custID = $_SESSION["id"];
$custID = $_SESSION["id"];
$date = $_SESSION["time"];
$totalPurch = $_SESSION["total"];

$insert_order="INSERT INTO orders (customerID, orderDate, totalPrice) VALUES ('$custID','$date','$totalPurch')";

if($conn->query($insert_order) == TRUE)
{
    echo "<script>alert('Your order has been purchased!')</script>";
    #echo"<script>window.open('buyproduct.php','_self')</script>";
}else {
  echo "error: " .$insert_order . "<br>" .$conn->error;
}
/*
echo $values["item_id"];
echo "<br>";
echo $custID;
echo "<br>";
echo $totalPurch;
echo "<br>";
echo $date;

}*/

header("Location: orders.php");
?>
