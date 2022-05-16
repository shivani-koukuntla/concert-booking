<?php
$hostname="localhost";
$user="root";
$pass="";
$db="login_sample_db";
$con=mysqli_connect($hostname,$user,$pass,$db) or die(mysqli_error());
if(!$con)
{echo "couldnot connect";}

?>