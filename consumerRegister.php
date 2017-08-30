<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Registration page Page</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1>Sign Up Page</h1>
  <fieldset>
    <form action="consumerRegister.php" method="post">
      <label>Username</label>
      <input type="text" placeholder="Enter Username" name="username" >
      <br>
      <label>Password</label>
      <input type="password" placeholder="Enter Password" name="pass">
      <br>
      <input type="text" name="fullName" placeholder="Full Name">
      <br>
      <input type="text" name="address" placeholder="Address">
      <input type="text" name="city" placeholder="City">
      <input type="text" name="state" placeholder="State">
      <input type="text" name="zipcode" placeholder="zipcode">
      <br>
      <input type="text" name="credit" placeholder="Credit Card Number">
      <br>
      <button type="button"><a href="consumerLogIn.php">Go Back</a></button>
      <button type="submit" name="register">Submit</button>
    </form>
  </fieldset>
</body>
</html>

<?php

if(isset($_POST['register']))
{
    $user_name=$_POST['username'];
    $user_pass=$_POST['pass'];
    $full_name=$_POST['fullName'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zipcode'];
    $credit=$_POST['credit'];


    if($user_name=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please enter the name')</script>";
exit();//this use if first is not work then other will not show
    }

    if($user_pass=='')
    {
        echo"<script>alert('Please enter the password')</script>";
exit();
    }

    if($full_name=='')
    {
        echo"<script>alert('Please enter your Full Name')</script>";
    exit();
    }
  //here query check weather if user already registered so can't register again.
    $check_name_query="select * from customers WHERE cusUserName='$user_name'";

    $run_query=$conn->query($check_name_query);


    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('user $user_name is already exist in our database, Please try another one!')</script>";
exit();
    }

//insert the user into the database.
    $insert_user="INSERT INTO customers (customerName, cusUserName, cpass, address, city, state, zipcode, creditcard) VALUES ('$full_name','$user_name','$user_pass','$address','$city', '$state', '$zipcode','$credit')";

    if($conn->query($insert_user) == TRUE)
    {
        echo"<script>window.open('buyproduct.php','_self')</script>";
    }else {
      echo "error: " .$insert_user . "<br>" .$conn->error;
    }
}

?>
