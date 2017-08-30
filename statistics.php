<?php
require 'connect.php';
session_start();



	$sql_select ="SELECT c.customerID, c.customerName, SUM(o.totalPrice) FROM customers c, orders o WHERE c.customerID = o.customerID GROUP BY o.customerID";

  $results = $conn->query($sql_select);

  echo "<h3>Statistics</h3>";
  echo "<table style='margin-right:auto; margin-left:auto; border-color: black;border-collapse: collapse;border-style: solid; border-left:solid; '><tr><th style='border-bottom:solid;'>Customer ID</th><th style='border-left:solid; border-bottom:solid; padding: 10px;'>Customer Name</th><th style='border-left:solid; border-bottom:solid; padding: 10px;'>Total Amount Spent</th></tr>";
  if($results ->num_rows > 0){
    while($row = $results->fetch_assoc()){
      echo "<tr><td style='border-bottom:solid;'>".$row['customerID']."</td><td style='border-left:solid;border-bottom:solid; padding: 10px;'>".$row['customerName']."</td><td style='border-left:solid; border-bottom:solid; padding: 10px;'>".$row['SUM(o.totalPrice)']."</td></tr>";

    }
  }
  echo "</table>";


  $sql_select1 ="SELECT COUNT(customerID) FROM customers";
  $results1 = $conn->query($sql_select1);


  while($row1 = mysqli_fetch_array($results1))
  {
	echo "<h3>Customer in Total</h3>";
	echo "<table style='margin-right:auto; border-color: black;margin-left:auto; padding: 20px;border-style: solid;'><tr><td>".$row1[0];"</tr></td>";
  }
    echo "</table>";


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Product Page</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>



	<br><br>
	<button class="logout" type="button" onclick="alert('Your are now logged out.')"><a href="logout.php">Log Out</a></button>

</body>
</html>
