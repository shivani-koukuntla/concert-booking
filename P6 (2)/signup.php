<?php
session_start();
include("connection.php");
include("functions.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
$name=$_POST['name'];
$email=$_POST['email'];
$user_name=$_POST['user_name'];
$password=$_POST['password'];
if(!empty($name) && !empty($email) && !empty($user_name) && !empty($password) && !is_numeric($user_name))
{
$user_id=random_num(20);
$query="insert into users (user_id,name,email,user_name,password) values ('$user_id','$name','$email','$user_name','$password')";
mysqli_query($con,$query);
header("Location: login.php");
die;
}
else
{
echo "please enter valid info";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="mystylelogin.css">
<title> Signup </title>
</head>
<body>     
<div id="box">
<br><br>
<h2>Create Account</h2>
<br>
<form method="post">
Name:<input type="text" name="name" id="text"> 
<br>
Email:<input type="email" name="email" id="text"> 
<br>
User name:<input type="text" name="user_name" id="text"> 
<br>
Password:<input type="password" name="password" id="text">
<br>
<input type="submit" value="signup" id="button"> 
<br>
Already a user? <a href="login.php">Click here</a>
</form>
</div>    
</body>
      

</html> 