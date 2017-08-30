<?php
require 'connect.php';
session_start();


  $customerID123  = $_SESSION["id"];

  $sql_select = "SELECT c.customerID, c.customerName, c.address, c.city, c.state, c.zipCode, max(o.orderID)FROM customers c, orders o WHERE c.customerID = '$customerID123'";

  $results1 = $conn->query($sql_select);

  if(mysqli_num_rows($results1)>0)
  {
   while($row1 = mysqli_fetch_array($results1))
   {

		echo "<h2 style='margin-top: 2cm;'>Hello, ".$row1['customerName'];"</h2>";
		echo "<h2> Your order   #" .$row1['max(o.orderID)']. "   will delievered to the following address:</h2>";
		echo $row1['address'];
		echo "<br>";
		echo $row1['city'];
		echo " , " ;
		echo $row1['state'];
		echo "<br>";
		echo $row1['zipCode'];

   }
 }



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
	<button class="logout" type="button"><a href="logout.php">Log Out</a></button>

</body>
</html>
