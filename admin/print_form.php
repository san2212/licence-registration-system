<?php
 include "header.php";
 session_start();
 ?>
 <?php 
  mysql_connect('localhost','root') or die('could not connect');
  mysql_select_db('form') or die('could not connect');
  
	   ?>
	   <?php
        $id=addslashes($_REQUEST['id']);
		$query= mysql_query("SELECT * FROM form where id=$id ");
        
		
      while($row=mysql_fetch_array($query))
		{
		$id=$row["id"]; 
		$ltype=$row["ltype"];
		$vca=$row["vc"];
		$adhaar=$row["adhaar"]; 
		$state=$row["state"]; 
        $fname=$row["fn"];
		$mname=$row["mn"];
		$lname =$row["ln"]; 
        $gen= $row["gender"]; 
	    $phone= $row["phone"]; 
        $mobile=$row["mobile"]; 
		$dob= $row["dob"]; 
        $age= $row["age"]; 
	    $place=$row["place"]; 
		$citiz= $row["citizenship"]; 
        $blood=$row["blood"]; 
		$email=$row["email"]; 
		$edu= $row["education"]; 
        $idi=$row["identification"]; 
        $plot=$row["plot"];
		$house=$row["house"];
	    $street=$row["street"];
		$vtc=$row["vtc"];
		$taluka=$row["taluka"]; 
		$pin=$row["pincode"];
		$image=$row["image"];
		$verify=$row["verify"];
		}
		
		if(isset($_POST['verify']))
		{
			mysql_query("UPDATE form SET `verify`= 1 WHERE id=$id");
			header ('location: db_display.php');
		}
		if(isset($_POST['discard']))
		{
			$_SESSION['username'] = $fname;
			mysql_query("DELETE FROM form WHERE id=$id");
			header ('location: delete_msg.php');
		}
		?>
	 
<!DOCTYPE html>
<html>
<head><title>Users list</title></head>
<link rel="stylesheet" type="text/css" href="print_form.css">
<body>


<div id="left_nav">
<ul>
<h4>View</h4>
	<li><button id="btn_03" onclick="window.location.href='print_form.php?id=<?php echo $id?>'">Form</button></li>
	<li><button id="btn_03" onclick="window.location.href='print_form_doc.php?id=<?php echo $id?>'">Documents</button></li>
</ul>
<ul>
<h4>User Verification</h4>
<form method="post" action="" enctype="multipart/form-data">
<?php 
if($verify == 1)
{
?>
<tr><td colspan="3"><p style='color:green'><b>✓ Verified</b></p></td></tr>
<?php
}
else if($verify == 0)
{
?>
<tr><td colspan="3"><button name="verify" class="button" onclick="return confirm('Are you sure to VERIFY user?')";>✓ VERIFY</button><br><br>
Invalid details? <button name="discard" class="button2" onclick="return confirm('Are you sure to DISCARD user?')";>Discard User</button>
</td></tr>
<?php
}
else if($verify == 2)
{
?>
<tr><td colspan="3"><p style='color:blue'><b>SUBMITTED</b></p></td></tr>
<?php
}
else if($verify == 3)
{
?>
<tr><td colspan="3"><p style='color:black'><b>PAID</b></p></td></tr>
<?php
}
?>
</form>
</ul>

</div>

<form method="post" action="" enctype="multipart/form-data">
<div id="form_layout">
<table>
<tr>
<td colspan="3">  
<?php echo "<p /><img src=get.php?id=$id width=150 height=180 align='right'>";?>
</td>
<tr/>

<tr>
<td><u>Licence Type</u></td>  	
<td colspan="2">Class of Vehicle</td>  	
<tr/>

<tr>
<td><input type ="text" value="<?php echo $ltype?>" readonly></td>	
<td colspan="2"><input type ="text" value="<?php echo $vca?>" readonly></td>
<td>

<tr>
<td colspan="2">Adhaar Card No.</td>  	
<td>State</td>
<tr/>

<tr>
<td colspan="2"><input type ="number" value="<?php echo $adhaar?>" readonly></td>	
<td>		
<input type="text" value="<?php echo $state?>" readonly>
</td>
</tr>

<tr>
<td>Name</td>
</tr>

<tr>
<td><input type ="text" value="<?php echo $fname?>" readonly></td>
<td><input type ="text" value="<?php echo $mname?>" readonly></td>
<td><input type ="text" value="<?php echo $lname?>" readonly></td>
</tr>

<tr>
<td>Gender</td>
<td>DOB</td>
<td>Age</td>
</tr>

<tr>
<td><input type="text" value="<?php echo $gen?>" readonly></td>
<td><input type="text" value="<?php echo $dob?>" readonly></td>
<td><input type ="number" value="<?php echo $age?>" style="width:80px" readonly></td>
</tr>

<tr>
<td>Contact</td>
</tr>

<tr>
<td><input type ="number" value="<?php echo $mobile?>" readonly></td>
<td><input type ="number" value="<?php echo $phone?>" readonly></td>
</tr>

<tr>
<td>Place Of Birth</td>
<td>Citizenship By</td>
<td>Blood Group</td>
</tr>

<tr>
<td><input type ="text" value="<?php echo $place?>" readonly></td>

<td><input type ="text" value="<?php echo $citiz?>" readonly></td></td>

<td><input type ="text" value="<?php echo $blood?>" readonly></td></td>
</tr>

<tr>
<td>Email</td>
<td>Education Qualification</td>
<td>Identification Marks</td>
</tr>

<tr>
<td><input type ="email" value="<?php echo $email?>" readonly></td>
<td>
<input type ="text" value="<?php echo $edu?>" readonly></td>
<td><input type ="text" value="<?php echo $idi?>" readonly></td>
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
</table>
</form>
</div>
</body>
</html>
