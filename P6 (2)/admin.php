
<!DOCTYPE html>
<html>
<head>
<style>
table,th,tr,td{
border:1px  Solid Blue;
}
</style>

 <link rel="stylesheet" href="mystylelogin.css">
</head>
<body>
<br><br>
<table align="center" boarder="1px" style="width:900px; line-height:40px;">
<tr>
<th colspan="4">User Info</th>
</tr>
<t>
<th>Name</th>
<th>Email Id</th>
<th>Username</th>
<th>Date</th>
</t>
<?php
$conn=mysqli_connect("localhost","root","","login_sample_db");
if($conn->connect_error)
{
die("connection failed;". $conn-> connect_error);
}
$sql="SELECT name,email,user_name,date from users";
$result=$conn->query($sql);
if($result->num_rows>0)
{
while($row=$result->fetch_assoc())
{
echo "<tr><td>". $row["name"] ."</td><td>". $row["email"] . "</td><td>". $row["user_name"] . "</td><td>". $row["date"] . "</td></tr>";
}
echo "</table>";
}
else
{
echo "no user found";
}
$conn-> close();
?>
</table>
</body>
</html>