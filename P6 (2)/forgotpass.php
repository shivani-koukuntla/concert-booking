<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>FORGOT PASSWORD</title>
<link rel="stylesheet" href="mystyle.css">
</head>
<body>
<br><br>
<?php include_once('conn.php');
if(isset($_POST['submit']))
{
$user_name=$_POST['username'];
$pass=$_POST['pass'];
$query=mysqli_query($con,"SELECT user_name from users where user_name='$user_name' ");
$num=mysqli_fetch_array($query);
if($num>0)
{
$coon=mysqli_query($con,"UPDATE users set password='$pass' where user_name='$user_name' ");
$_SESSION['msg1']="password changed successfully";
echo ' <script type="text/javascript">alert("Password Changed");</script>';
}
else
{$_SESSION['msg2']="password cant be changed";}
}
?>
<?php echo $_SESSION['msg1']=""; ?>
<?php echo $_SESSION['msg1']; ?>

<form name="forgetpwd" action="" method="post" onsubmit="return valid();">
Username:<input type="text" name="username" id="username"><br>
Reset Password:<input type="password" name="pass" id="pass"><br>
<input type="submit" name="submit" value="Change Password"><br>
<a href="logout.php">LOGOUT</a>
</form>

</body>
</html>
