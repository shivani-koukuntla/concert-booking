<?php
session_start();
include("connection.php");
include("functions.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
$user_name=$_POST['user_name'];
$password=$_POST['password'];
if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
{
$query="select * from users where user_name='$user_name' limit 1";
$result=mysqli_query($con,$query);
if($result)
{
if($result && mysqli_num_rows($result)>0)
{
$user_data=mysqli_fetch_assoc($result);
if($user_data['password']===$password)
{
$_SESSION['user_id']=$user_data['user_id'];
header("Location: index.php");
die;
}
}
}
echo "wrong username or password";
}
else
{
echo "wrong username or password";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="mystylelogin.css">
<title> login </title>
</head>
<body>     
<div id="box">
<br><br>
<h2> Login</h2>
<br>
<form method="post">
User name:<input type="text" name="user_name" id="text"> 
<br>
Password:<input type="password" name="password" id="text">
<br>
<input type="submit" value="login" id="button"> 
<br>
<a href="signup.php">Create account</a><br>
<a href="forgotpass.php">FORGOT PASSWORD?</a><br>
Admin?<a href="adminlogin.php">Click here</a>
</form>
</div>    
</body>
      

</html> 