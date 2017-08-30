<?php
require 'connect.php';
session_start();

$select_type = "SELECT * FROM `products`";

$result1=$conn->query($select_type);

$options1 = "";

while($row2 = mysqli_fetch_array($result1))
{
    $options1 = $options1."<option>$row2[3]</option>";
}

if(isset($_POST['submitType']))
{
  $get_type=$_POST['types'];

  $select_product="SELECT * FROM products WHERE type = '$get_type'";

  $result2=$conn->query($select_product);

  $options2 = "";

  while($row3 = mysqli_fetch_array($result2))
  {
      $options2 = $options2."<option>$row3[1]</option>";
  }
}
	if(isset($_POST['submitInventory']))
	{

		$inventory = $_POST['inventory'];
		$productName = $_POST['products'];

		$update_table = "UPDATE products SET inventory = inventory + '$inventory' WHERE productName = '$productName'";

	    if ($conn->query($update_table) == TRUE) {
			echo "insert success!";
		}else {
			echo "error: " .$update_table . "<br>" .$conn->error;
		}
	}
		if(isset($_POST['deleteInventory']))
	{

		$inventory = $_POST['inventory'];
		$productName = $_POST['products'];

		$update_table = "DELETE FROM products WHERE productName = '$productName'";
		
	    if ($conn->query($update_table) == TRUE) {
			#echo "insert success!";
		}else {
			echo "error: " .$update_table . "<br>" .$conn->error;
		}
	}

if(isset($_POST['submitProduct']))
{
	$type = $_POST['types'];
    $productName = $_POST['pName'];
    $retailPrice = $_POST['retailPrice'];
    $inventory = $_POST['inventory'];



    $insert_user = "INSERT INTO products (productName, retailPrice, type, inventory) VALUES('$productName','$retailPrice', '$type', '$inventory')";

    if ($conn->query($insert_user) == TRUE) {
      echo "insert success!";
    }else {
      echo "error: " .$insert_user . "<br>" .$conn->error;
    }
}



  $sql_select ="SELECT * FROM products";
  $results = $conn->query($sql_select);
  echo "<h3>PRODUCT LIST</h3>";
  echo "<table style='margin-right:auto; margin-left:auto;'><tr><th>ProductID</th><th>productName</th><th>retailPrice</th><th>type</th><th>inventory</th></tr>";
  if($results ->num_rows > 0){
    while($row = $results->fetch_assoc()){
      echo "<tr><td>".$row['productID']."</td><td>".$row['productName']."</td><td>".$row['retailPrice']."</td><td>".$row['type']."</td><td>".$row['inventory']."</td></tr>";

    }
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
  <h1>Admin : Enter Product Name / Quantity</h1>
  <fieldset>
    <form action="adminProducts.php" method="post">
	  <h1>Products</h1>
    <form action="adminProducts.php" method="post">
      <label for="types">Category</label>
      <select id="types" name="types">
        <option selected>Choose Type</option>
        <?php echo $options1;?>
      </select>
      <input type="submit" name="submitType" value="Submit">
    </form>
      <br>
      <form action="adminProducts.php" method="post">
      <label for="product">Product</label>
      <select name="products" id="products">
        <option selected>Choose Name</option>
        <?php echo $options2;?>
      </select>
	  <br>
	  <button name="deleteInventory" type="submit" value="Submit">Delete Inventory</button>
      <br>
      </label>Inventory:</label><input type="text" name="inventory">
      <br>
      <input type="submit" name="submitInventory" value="Submit">
    </form>
      <br>
	  <h3>Use the following if the product has not yet been listed.</h3>
	  <form action="adminProducts.php" method="post">
	  <label for="types">Category</label>
		<select value="types" name="types">
        <option selected>Chose Type</option>
        <?php echo $options1;?>
      </select>
		<br>Product Name: <input type="text" name="pName"><br>
		Retail Price: <input type="text" name="retailPrice"><br>
	 </label>Inventory:</label><input type="text" name="inventory">
      <br>
      <input type="submit" name="submitProduct" value="Submit">

    </form>
  </fieldset>
</div>
  <button type="button" name="stats"><a href="Statistics.php">Statistics</a></button>
	<button class="logout" type="button" onclick="alert('Your are now logged out.')"><a href="logout.php">Log Out</a></button>

</body>
</html>
