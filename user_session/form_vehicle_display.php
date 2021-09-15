 <?php
  session_start();
  $username = $_SESSION['username'];
  mysql_connect('localhost','root') or die('could not connect');
  mysql_select_db('form') or die('could not connect');
  
	   ?>
	   <?php
		$query= mysql_query("SELECT * FROM form_vehicle where fn = '$username'");
        
	  
      while($row=mysql_fetch_array($query))
		{
		$adhaar=$row["adhaar"]; 
        $fname=$row["fn"];
		$mname=$row["mn"];
		$lname =$row["ln"]; 
        $gen= $row["gender"]; 
        $mobile=$row["mobile"]; 
        $age= $row["age"]; 
		$email=$row["email"]; 
		$state=$row["state"]; 
		$rto_number=$row["rto_number"];   
		$vehicle_type=$row["vehicle_type"];
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
</head>
<body id="body">
<link rel="stylesheet" type="text/css" href="form_vehicle.css">
<div id="optlayout">
<h1 id="form_licence">Vehicle Registration Form</h1>
<div id="table">
<form method="post" action="">
<table>

<tr>
<td colspan="2">Adhaar Card No.</td>  	
</tr>

<tr>
<td colspan="2"><input type ="number" value="<?php echo $adhaar?>" readonly></td>	
</tr>


<tr>
<td colspan="3"><u>Personal Information</u></td>
</tr>

<tr>
<td colspan="3">Name</td>
</tr>

<tr>
<td><input type ="text" value="<?php echo $fname?>" readonly></td>
<td><input type ="text" value="<?php echo $mname?>" readonly></td>
<td><input type ="text" value="<?php echo $lname?>" readonly></td>
</tr>

<tr>
<td>Gender</td>
<td>Age</td>
</tr>

<tr>
<td><input type ="text" value="<?php echo $gen?>" readonly></td>
<td><input type ="number" value="<?php echo $age?>" readonly></td>
</tr>

<tr>
<td>Contact</td>
<td>Email</td>
</tr>

<tr>
<td><input type ="number" value="<?php echo $mobile?>" readonly></td>
<td colspan="2"><input type ="email" value="<?php echo $email?>" readonly></td>
</tr>

<tr>
<td>
Vehicle Type
</td>
</tr>

<tr>
<td colspan="2"><input type ="text" value="<?php echo $vehicle_type?>" readonly></td>
</tr>

<tr>
<td>State</td>
<td>RTO Number</td>
</tr>


<tr>
<td>
<input type="text" value="<?php echo $state?>" readonly></td>
<td><input type ="text" style="width:80px" value="<?php echo $rto_number?>" readonly></td>
</td>

</form> 
</div>
</div>
</body>
</html>