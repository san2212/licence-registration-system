 <?php
  mysql_connect('localhost','root') or die('could not connect');
  mysql_select_db('form') or die('could not connect');
  
	   ?>
	   <?php
		 $id=addslashes($_REQUEST['id']);
		$query= mysql_query("SELECT * FROM form_renew where id=$id ");
	  
      while($row=mysql_fetch_array($query))
		{
		$lic_no=$row["lic_no"]; 
        $fname=$row["fn"];
		$mname=$row["mn"];
		$lname =$row["ln"]; 
        $gen= $row["gender"]; 
        $mobile=$row["mobile"]; 
		$email=$row["email"];
		$issue_dt= $row["issue_dt"]; 
		$expiry_dt= $row["expiry_dt"]; 		
		$authority=$row["authority"]; 
		$plot=$row["plot"];
		$house=$row["house"];
	    $street=$row["street"];
		$vtc=$row["vtc"];
		$taluka=$row["taluka"]; 
		$pin=$row["pincode"];
		$image=$row["image"];
		$verify_r=$row["verify_r"];   		
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
if($verify_r == 1)
{
?>
<tr><td colspan="3"><p style='color:green'><b>✓ Verified</b></p></td></tr>
<?php
}
else if($verify_r == 0)
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
<td colspan="1">Licence Number.</td>  
<td colspan="2">Email</td>	
</tr>

<tr>
<td colspan="1"><input type ="number" value="<?php echo $lic_no?>" readonly></td>	
<td colspan="2"><input type ="email" value="<?php echo $email?>" readonly></td>
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
<td>Contact</td>
<td>Gender</td>
</tr>

<tr>
<td><input type ="number" value="<?php echo $mobile?>" readonly></td>
<td><input type ="text" value="<?php echo $gen?>" readonly></td>
</tr>


<tr>
<td>
Authority
</td>
</tr>

<tr>
<td colspan="2"><input type ="text" value="<?php echo $authority?>" readonly></td>
</tr>

<tr><td colspan="3"><u>Address Details</u></td></tr>

<tr>
<td colspan="3">
<textarea rows="4" cols="80" style="font-family: 'calibri light';" id="textarea" readonly>
<?php echo $plot?> - <?php echo $house?>, 
<?php echo $street?>, <?php echo $taluka?>,
<?php echo $vtc?> - <?php echo $pin?>
</textarea>
</td>
</tr>
</td>
</form> 
</div>
</div>
</body>
</html>