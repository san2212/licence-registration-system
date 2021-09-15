 <?php
  mysql_connect('localhost','root') or die('could not connect');
  mysql_select_db('form') or die('could not connect');
  
	   ?>
	   <?php
		 $id=addslashes($_REQUEST['id']);
		$query= mysql_query("SELECT * FROM form_vehicle where id=$id ");
	  
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
		$verify_v=$row["verify_v"];   		
		}
		
		if(isset($_POST['verify_v']))
		{
			mysql_query("UPDATE form_vehicle SET `verify_v`= 1 WHERE id=$id");
			header ('location: db_display_vehicle.php');
		}
		?>
<?php
 include "header.php";
?>

<!DOCTYPE html>
<html>
<head><title></title></head>
<link rel="stylesheet" type="text/css" href="print_form_vehicle.css">
<body>



<div id="left_nav">
<ul>
<h4>View</h4>
	<li><button id="btn_03">Form</button></li>
</ul>

<ul>
<h4>User Verification</h4>
<form method="post" action="" enctype="multipart/form-data">

<?php 
if($verify_v == 1)
{
?>
<tr><td colspan="3"><p style='color:green'><b>✓ Verified</b></p></td></tr>
<?php
}
else if($verify_v == 0)
{
?>
<tr><td colspan="3"><button name="verify_v" class="button" onclick="return confirm('Are you sure to VERIFY user?')">✓ VERIFY</button></td></tr>
<?php
}
?>
</form>
</div>

<form method="post" action="" enctype="multipart/form-data">
<div id="form_layout">
<table>

<tr>
<td colspan="3">Adhaar Card No.</td>  	
</tr>

<tr>
<td colspan="2"><input type ="number" value="<?php echo $adhaar?>" readonly></td>	
<td></td>
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