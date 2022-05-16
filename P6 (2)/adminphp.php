<?php
if (($_POST["uname"]!="admin") || ($_POST["pword"]!="adminpassword")){
print "Invalid Credentials";
}
else{
header("location: admin.php");
}
?>