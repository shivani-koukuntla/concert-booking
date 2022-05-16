<?php
session_start();
include("connection.php");
include("functions.php");
$user_data=check_login($con);
?>
<!DOCTYPE html>
<html>
<head> 
<title> Concert Ticket </title>
<link rel="stylesheet" href="mystyle.css">

<script>alert("Logged in successfully");
function country()
   {
      
      var a =document.getElementById('input').value;
      if(a=="Hyderabad")
      {
          var array=["March 20, 2021:The Rajiv Gandhi International Cricket Stadium","March 21, 2021:The Rajiv Gandhi International Cricket Stadium"];
      }
      else if(a=="Mumbai")
      {
          var array=["March 24, 2021:Wankhede Stadium","March 25, 2021:Wankhede Stadium"];
      }
      else if(a=="Oakland")
      {
          var array=["March 31, 2021:Oracle Arena"];
      }
      else if(a=="Chicago")
      {
          var array=["April 2, 2021:United Center","April 3, 2021:United Center","April 5, 2021:Soldier Field","April 6, 2021:Soldier Field"];
      }
      else if(a=="Los Angeles")
      {
          var array=["April 9, 2021:Staples Center","April 11, 2021:Staples Center","April 12, 2021:Staples Center"];
      }
      else if(a=="Fortworth")
      {
          var array=["April 15, 2021:Fort Worth Convention Center","April 16, 2021:Fort Worth Convention Center"];
      }
      else if(a=="Paris")
      {
          var array=["April 22, 2021:AccorHotels Arena","April 23, 2021:AccorHotels Arena"];
      }
      else if(a=="Berlin")
      {
          var array=["April 25, 2021:Mercedes-Benz Arena","April 26, 2021:Mercedes-Benz Arena"];
      }
      else if(a=="Tokyo")
      {
          var array=["May 2, 2021:Tokyo Dome","May 3, 2021:Tokyo Dome"];
      }
      else if(a=="Osaka")
      {
          var array=["May 7, 2021:Kyocera Dome Osaka","May 9, 2021:Kyocera Dome Osaka","May 10, 2021:Kyocera Dome Osaka"];
      }
      else if(a=="Fukuoka")
      {
          var array=["May 12, 2021:Fukuoka Yafuoku! Dome","May 13, 2021:Fukuoka Yafuoku! Dome"];
      }
      else if(a=="Seoul")
      {
        var array =["May 17,2021:Seoul Olympic Stadium","May 18,2021:Seoul Olympic Stadium","May 20,2021:Seoul Olympic Stadium"];
      }
      var string=" ";
      for(i=0;i<array.length;i++)
      {
           if(i==0)
           string = string +"<input type='radio' name ='foo' checked>"+array[i]+"</input>"+"<br>";
           else  string = string +"<input type='radio' name ='foo' >"+array[i]+"</input>"+"<br>";
      }
            
      document.getElementById('output').innerHTML=string;
   }
</script>
<script>
function totalcost()
{
var x;
var numofticket=document.getElementById("numoftic").value;
switch(numofticket) 
{
  case "1 ticket":
    x = 1;
    break;
  case "2 tickets":
    x = 2;
    break;
  case "3 tickets":
    x = 3;
    break;
  case "4 tickets":
    x = 4;
    break;
}
var y;
var tickettype=document.getElementById("tictype").value;
switch(tickettype) 
{
  case "Gold Soundcheck Package:$545 per person":
    y = 545;
    ticty="Gold Soundcheck Package";
    break;
  case "Silver Soundcheck Package:$495 per person":
    y = 495;
   ticty="Silver Soundcheck Package";
    break;
  case "Floor Seats:$295 per person":
    y = 295;
ticty="Floor Seats";
    break;
  case "Front Row Seats:$195 per person":
    y = 195;
ticty="Front Row Seats";
    break;
  case "General Admission(VIP):$145 per person":
    y = 145;
   ticty="General Admission(VIP)";
    break;
  case "General Admission:$65 per person":
    y = 65;
ticty="General Admission";
    break; 
}
var z=0;
var merchandise=document.getElementById("merch");

if (merchandise.checked==true)
{
z=75 ;};
var totcost=(x*y)+z;
document.getElementById("v").innerHTML = "Totalcost: $"+totcost;
if (z==0)
{var queryString = "?<b>ORDER SUMMARY</b>"+"&Number of tickets: " +x+ "&Ticket Type: " + ticty+ "&Merchandise: Not Purchased "+ "&Total Cost: $" + totcost};
if (z==75)
{var queryString ="?<b>ORDER SUMMARY</b>"+ "&Number of tickets: " +x+ "&Ticket Type: " + ticty+ "&Merchandise: Purchased " + "&Total Cost: $" + totcost};

window.location.href = "payment.html" + queryString;
}

</script>
</head>

   <body>
HELLO, <?php echo $user_data['user_name']; ?>
      <TD><a href="changepass.php" style="float:right;">Changepassword</a></TD>
      <br>
     
      <h2 style="color:powderblue;">  <abbr>MAP OF THE SOUL 7 WORLD TOUR</abbr>.</h2>
      <select id ="input" onchange="country()" style="width:230px;height:28px;">
 
      <optgroup label="United states">
      <option>Oakland</option>
     <option>Chicago</option>
     <option>Los Angeles</option>
     <option>Fortworth</option>
      <optgroup label="South Korea">
      <option>Seoul</option>
      </optgroup>
      
     </optgroup>
     <optgroup label="India">
      <option>Hyderabad</option>
      <option>Mumbai</option>
      </optgroup>
      <optgroup label="France">
      <option>Paris</option>
      </optgroup>
      <optgroup label="Germany">
      <option>Berlin</option>
      </optgroup>
      <optgroup label="Japan">
      <option>Tokyo</option>
      <option>Osaka</option>
      <option>Fukuoka</option>
      </optgroup>
      </select>
   
      <div id ="output">
<input type="radio" checked>March 31, 2021:Oracle Arena</input>
      </div>

      <p  id="warning"></p>
      
      
Choose Ticket Type:<select style="width:300px"  id="tictype" >
     <option>Gold Soundcheck Package:$545 per person</option>
      <option>Silver Soundcheck Package:$495 per person</option>
      <option>Floor Seats:$295 per person</option>
      <option>Front Row Seats:$195 per person</option>
      <option>General Admission(VIP):$145 per person</option>
      <option>General Admission:$65 per person</option>
      </select>
<br>

Number Of Tickets: <select  id="numoftic" > 
     <option>1 ticket</option>
      <option>2 tickets</option>
      <option>3 tickets</option>
      <option>4 tickets</option>
      </select>
<br>
  <input type="checkbox" id="merch" name="merch" value="merch" >
  <label for="merch"> Add Merchandise</label><br>

<input type="submit"  value="Proceed To Payment"  onclick="totalcost()">
<p  id="v"></p>

    

    
    </body>
      
</html>