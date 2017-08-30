<?php
require 'connect.php';
session_start();

 if(isset($_POST["add_to_cart"]))
 {
      if(isset($_SESSION["shopping_cart"]))
      {
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
           if(!in_array($_GET["id"], $item_array_id))
           {
             $count = count($_SESSION["shopping_cart"]);
             $item_array = array(
                  'item_id'               =>     $_GET["id"],
                  'item_name'             =>     $_POST["hidden_name"],
                  'item_price'            =>     $_POST["hidden_price"],
                  'item_quantity'         =>     $_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
           }
           else
           {
                echo '<script>alert("Item Already Added")</script>';
                echo '<script>window.location="buyproduct.php"</script>';
           }
      }
      else
      {
          $item_array = array(
             'item_id'               =>     $_GET["id"],
             'item_name'             =>     $_POST["hidden_name"],
             'item_price'            =>     $_POST["hidden_price"],
             'item_quantity'         =>     $_POST["quantity"]
           );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
 }
 if(isset($_GET["action"]))
 {
      if($_GET["action"] == "delete")
      {
           foreach($_SESSION["shopping_cart"] as $keys => $values)
           {
                if($values["item_id"] == $_GET["id"])
                {
                     unset($_SESSION["shopping_cart"][$keys]);
                     echo '<script>alert("Item Removed")</script>';
                     echo '<script>window.location="buyproduct.php"</script>';
                }
           }
      }
 }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Product Page</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>

  <div  style="width:700px; margin-left: auto; margin-right:auto;">
                <h1 align="center">List of Products</h3><br />
                <?php
                $query = "SELECT * FROM products ORDER BY productID ASC";
				        $result = $conn->query($query);
                if(mysqli_num_rows($result) > 0)
                {
                     while($row = mysqli_fetch_array($result))
                     {
                       echo '<form method="post" action="buyproduct.php?action=add&id='.$row["productID"];
                       echo '  <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">';
                       echo '<h4>Product Name: '.$row["productName"].'</h4>';
                       echo '<h4> Category:'.$row["type"].'</h4>';
                       echo '<h4> Price: $'.$row["retailPrice"].'</h4>';
                       echo '<input type="text" name="quantity" class="form-control" value="1" />';
                       echo '<input type="hidden" name="hidden_name" value="'.$row["productName"].' " />';
                       echo '<input type="hidden" name="type" value="'.$row["type"].' " />';
                       echo '<input type="hidden" name="hidden_price" value="'.$row["retailPrice"].' " />';
                       echo '<input type="submit" name="add_to_cart" style="margin-top:5px;" value="Add to Cart" />';
                       echo '<hr>';
                       echo '</form>';
                       echo '</div>';
                     }
                }
                ?>

                <br/>
                <h3>Order Details</h3>
                     <table>
                          <tr>
                               <th width="40%">Item Name</th>
                               <th width="10%">Quantity</th>
                               <th width="20%">Price</th>
                               <th width="15%">Total</th>
                               <th width="5%">Action</th>
                          </tr>
                          <?php
                          if(!empty($_SESSION["shopping_cart"]))
                          {
                               $total = 0;
                               foreach($_SESSION["shopping_cart"] as $keys => $values)
                               {
                          ?>
                          <tr>
                               <td><?php echo $values["item_name"]; ?></td>
                               <td><?php echo $values["item_quantity"]; ?></td>
                               <td>$ <?php echo $values["item_price"]; ?></td>
                               <td>$ <?php echo number_format((float) $values["item_quantity"] * (float) $values["item_price"], 2); ?></td>
                               <td><a href="buyProduct.php?action=delete&id=<?php echo $values["item_id"]; ?>" style="color:red;">Remove</a></td>
                          </tr>
                          <?php
                                    $total = intval($total + ((float)$values["item_quantity"] * (float)$values["item_price"]));
                               }
                          ?>
                          <tr>
                               <td colspan="3" align="right">Total</td>
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>
                               <td></td>
                          </tr>
                          <?php
                          }
                          ?>
                     </table>
           <br>
     <button type="button" name="buy" id="buy"><a href="checkout.php">BUY NOW</a></button>
  <button class="logout" type="button" name="logout"><a href="logout.php">Log Out</a></button>
</body>
<?php
if (!empty($_SESSION["shopping_cart"])) {
    $custID = $_SESSION["id"];
    $_SESSION["total"] = number_format($total, 2);
    date_default_timezone_set('America/Chicago');
    $_SESSION['time'] = date('Y-m-d');
    
  }

/*
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
?>
</html>
