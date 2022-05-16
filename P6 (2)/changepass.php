<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>CHANGE PASSWORD</title>
<link rel="stylesheet" href="mystyle.css">
</head>
<body>
<?php include_once('conn.php');
if(isset($_POST['submit']))
{
$email=$_POST['useremail'];
$opass=$_POST['opass'];
$npass=$_POST['npass'];
$cpass=$_POST['cpass'];
$query=mysqli_query($con,"SELECT email,password from users where email='$email' AND password='$opass' ");
$num=mysqli_fetch_array($query);
if($num>0)
{
$coon=mysqli_query($con,"UPDATE users set password='$npass' where email='$email' ");
$_SESSION['msg1']="password changed successfully";
}
else
{$_SESSION['msg2']="password doesnot match";}
}
?>
<?php echo $_SESSION['msg1']=""; ?>
<?php echo $_SESSION['msg1']; ?>
<br><br><br>
<form name="changepwd" action="" method="post" onsubmit="return valid();">
Email Id:<input type="email" name="useremail" id="useremail"><br>
Current Password:<input type="password" name="opass" id="opass"><br>
New Password:<input type="password" name="npass" id="npass"><br>
Confirm Password:<input type="password" name="cpass" id="cpass"><br>
<input type="submit" name="submit" value="changepass">
</form>
<a href="logout.php">LOGOUT</a>

</body>
</html>
