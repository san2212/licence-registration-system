<?php
session_start();
$username = $_SESSION['username'];
?>
<?php

$db = mysqli_connect("localhost","root","","form") or die(mysql_error());

if(isset($_POST["submit"])){

	$adhaar = mysql_real_escape_string($_POST["adhaar"]);
	$fn = mysql_real_escape_string($_POST["fn"]);
	$mn = mysql_real_escape_string($_POST["mn"]);
	$ln = mysql_real_escape_string($_POST["ln"]);
	$gender = mysql_real_escape_string($_POST["gender"]);
	$phone = mysql_real_escape_string($_POST["phone"]);
	$mobile = mysql_real_escape_string($_POST["mobile"]);
	$age = mysql_real_escape_string($_POST["age"]);
	$email = mysql_real_escape_string($_POST["email"]);
	$state = mysql_real_escape_string($_POST["state"]);
	$rto_number = mysql_real_escape_string($_POST["rto_number"]);
	$vehicle_type = mysql_real_escape_string($_POST["vehicle_type"]);
		$sql = "INSERT INTO form_vehicle(adhaar, fn,mn,ln,gender,phone,mobile,age,email,state,rto_number,vehicle_type) VALUES 
		('$adhaar','$fn','$mn','$ln', '$gender','$phone','$mobile','$age','$email','$state','$rto_number','$vehicle_type')";
		
		while($row=mysql_fetch_array($sql))
		{
			$id=$row["id"]; 
		}
		if($fn !== $username)
			{
				?>
				<script>
				alert("Name is Invalid");
				</script>
			<?php
			}
			else
			{
		mysqli_query($db,$sql);
		$url = "vehicle_session_validation.php?";
		echo '<script>window.location = "'.$url.'";</script>';
}
}
?>
<?php
include "session_header.php";
?>	
<!DOCTYPE html>
<html>
<head>
<title>
Vehicle Registration Form
</title>
<meta charset = "utf-8">
      <title>jQuery UI Datepicker functionality</title>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
  } );
  </script>
</head>
<body id="body">
<link rel="stylesheet" type="text/css" href="form_vehicle.css">
<div id="optlayout">
<h1 id="form_licence">Vehicle Registration Form</h1>
<div id="table">
<form method="post" action="">

<table>
<tr>
<td colspan="3"><p>
• Fill all necessary fields in below section<br>
• After filling the form submit it below<br>
• Age shoud be above 16 or 18 years old to be eligible
</p></td>
</tr>

<tr>
<td colspan="3">Adhaar Card No.</td>  	
</tr>

<tr>
<td colspan="3"><input type ="number" name="adhaar" class="textInput" placeholder="Enter your 12-digit UID number"></td>	
<td></td>
</tr>


<tr>
<td colspan="3"><u>Personal Information</u></td>
</tr>

<tr>
<td colspan="3">Name</td>
</tr>

<tr>
<td><input type ="text" name="fn" class="textInput" placeholder="First"></td>
<td><input type ="text" name="mn" class="textInput" placeholder="Middle"></td>
<td><input type ="text" name="ln" class="textInput" placeholder="Last"></td>
</tr>

<tr>
<td colspan="2">Gender</td>
<td>Age</td>
</tr>

<tr>
<td colspan="2"><input type="radio" name="gender" value="male">Male &nbsp&nbsp
<input type="radio" name="gender" value="female">Female
<td><input type ="number" name="age" class="textInput" style="width:80px" placeholder="18+"></td>
</tr>

<tr>
<td>Contact</td>
<td>Email</td>
</tr>

<tr>
<td><input type ="number" name="mobile" class="textInput" placeholder="mobile"></td>
<td colspan="2"><input type ="email" name="email" class="textInput" placeholder="example@mail.com"></td>
</tr>

<tr>
<td>Vehicle Type</td>
</tr>

<tr><td colspan="2">
<input type="radio" name="vehicle_type" value="MOTOR CYCLE LESS THAN 50CC(MC50CC)"> MOTOR CYCLE LESS THAN 50CC(MC50CC)
</td><td>
<input type="radio" name="vehicle_type" value="MOTOR CYCLE WITHOUT GEAR(NON TRANSPORT)(MCWOG)"> MOTOR CYCLE WITHOUT GEAR(NON TRANSPORT)(MCWOG)
</td></tr>
<tr><td colspan="2">
<input type="radio" name="vehicle_type" value="MOTOR CYCLE WITH GEAR (NON TRANSPORT)(MCWG)"> MOTOR CYCLE WITH GEAR (NON TRANSPORT)(MCWG)
</td><td>
<input type="radio" name="vehicle_type" value="LMV-NT-CAR(LMV)"> LMV-NT-CAR(LMV)
</td></tr>
<tr><td colspan="2">
<input type="radio" name="vehicle_type" value="LMV -3 WHEELER NT(3W-NT)"> LMV -3 WHEELER NT(3W-NT)
</td><td>
<input type="radio" name="vehicle_type" value="LMV-TRACTOR-NT(TRCTOR)"> LMV-TRACTOR-NT(TRCTOR)
</td></tr>
<tr><td colspan="2">
<input type="radio" name="vehicle_type" value="INVALID CARRIAGE VEHICLE(INVCRG)"> INVALID CARRIAGE VEHICLE(INVCRG)
</td><td>
<input type="radio" name="vehicle_type" value="ROAD ROLLER(RDRLR)"> ROAD ROLLER(RDRLR)
</td></tr>
<tr><td colspan="2">
<input type="radio" name="vehicle_type" value="OTHERS - CONSTRUCTION EQUIPMENTS(CNEQP)"> OTHERS - CONSTRUCTION EQUIPMENTS(CNEQP)
</td></tr>

<tr>
<td colspan="3"><br>*Enter the number to check availability</td>
</tr>

<tr>
<td colspan="2">State</td>
<td>RTO Number</td>
</tr>

<tr>
<td colspan="2">
<select name="state" style="height:50px; width:85px;">
<option value = "Maharashtra" selected>MH</option>
<option value = "Gujrat">GJ</option>
<option value = "Madhya Pradesh">MP</option>
</select></td>
<td><input type ="text" name="rto_number" class="textInput" style="height:50px; width:80px" placeholder="XXXX"></td>
</td>

<tr><td colspan="3"><p align="right"><button type ="submit" name="submit" class="button btn">SUBMIT</button></p></td></tr>

</form> 
</div>
</body>
</html>