<?php
require 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Consumer Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<?php
if(isset($_POST['login']))
{
    $user_name=$_POST['username'];
    $user_pass=$_POST['pass'];

    $check_user="SELECT * FROM customers WHERE cusUserName='$user_name'AND cPass='$user_pass'";

    $run=$conn->query($check_user);

    if(mysqli_num_rows($run))
    {
      while($row = mysqli_fetch_array($run)){


        $_SESSION["id"]=$row["customerID"];
        $_SESSION['username']=$user_name;
        echo "<script>window.open('buyproduct.php','_self')</script>";
      }
    }
    else
    {
      echo "<script>alert('username or password is incorrect!')</script>";
    }
}
session_write_close();
?>
<body>
  <h1>Consumer Login</h1>

  <form action="consumerLogin.php" method="post">
    <div class="username">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username">
    </div>
    <div class="password">
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass">
    </div>
    <button>Sign Up</button>
    <button type="submit" name="login">Login</button>
    <br>
    <button><a href="index.php">Go Back</a></button>
  </form>
</body>

</html>
