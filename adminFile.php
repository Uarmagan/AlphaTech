<?php
require 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>admin Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<?php
if(isset($_POST['login']))
{
    $user_name=$_POST['uname'];
    $user_pass=$_POST['psw'];

    $check_user="SELECT * FROM admin WHERE AdminID='$user_name'AND AdminPass='$user_pass'";

    $run=$conn->query($check_user);

    if(mysqli_num_rows($run))
    {
		echo "<script>window.open('adminProducts.php','_self')</script>";
        $_SESSION['username']=$user_name;

    }
    else
    {
      echo "<script>alert('username or password is incorrect!')</script>";
    }
}
?>

<body>
  <h1>Admin Login</h1>

  <form action="adminFile.php" method="post">
    <div class="username">
      <label><b>Admin ID</b></label>
      <input type="text" placeholder="Enter Admin ID" name="uname">
    </div>
    <div class="password">
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw">
    </div>
    <button><a href="index.php">Go Back</a></button>
    <button type="submit"  name="login">Login</button>
  </form>
</body>

</html>
