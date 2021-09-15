 <?php
  session_start();
  $username = $_SESSION['username'];
  mysql_connect('localhost','root') or die('could not connect');
  mysql_select_db('form') or die('could not connect');
  
  if(isset($_POST['edit']))
{
	header ('location: form_licence_display_edit.php');
}
?>
	   <?php
		$query= mysql_query("SELECT * FROM form where fn = '$username'");
        while($row=mysql_fetch_array($query))
		{
		$ltype=$row['ltype'];
		$id=$row["id"]; 
		$adhaar=$row["adhaar"]; 
		$state=$row["state"]; 
        $fn=$row["fn"];
		$mn=$row["mn"];
		$ln =$row["ln"]; 
        $gen= $row["gender"]; 
	    $phone= $row["phone"]; 
        $mobile=$row["mobile"]; 
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
		$vca=$row["vc"];
		}
		?>
<?php
if(isset($_POST['save']))
{
	$ltype = $_POST['ltype'];
	$mn = $_POST['mn'];
	$ln = $_POST['ln'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$phone = $_POST['phone'];
	$mobile = $_POST['mobile'];
	$place = $_POST['place'];
	$citizenship = $_POST['citizenship'];
	$blood = $_POST['blood'];
	$education = $_POST['education'];
	$identification = $_POST['identification'];
	$plot = $_POST['plot'];
	$house = $_POST['house'];
	$street = $_POST['street'];
	$vca = $_POST["vca"];	
	$update = "UPDATE form SET `ltype`='$ltype',`mn`='$mn',`ln`='$ln',`gender`='$gender',`age`='$age',`phone`='$phone',`mobile`='$mobile',
	`place`='$place',`citizenship`='$citizenship',`blood`='$blood',`education`='$education',`identification`='identification',
	`plot`='$plot',`house`='$house',`street`='$street',`vc`='$vca'
	WHERE `fn` = '$username'";
	mysql_query($update) or die ("Error msg". mysql_error());
	header ("location: form_licence_display.php");
}
?>	 
<?php
include "session_header.php";
?>	
<!DOCTYPE html>
<html>
<head>
<title>
</title>
</head>
<body id="body">
<link rel="stylesheet" type="text/css" href="form_display_edit.css">
<div id="optlayout">
<h1 id="form_licence">RTO Licence Registration</h1>
<div id="table">
<form method="post" action="form_licence_display_edit.php">

<table>
<tr>
<td colspan="2"><p>
Note:<br><br>
• Marked fields are restricted to edit<br>
• After editing form, save changes below<br>
</p></td>
<td>  
<img src='get.php' width=150 height=150 align="right" id="imagePreview">
</td>
<tr/>

<tr>
<td colspan="2"><u>Licence Type</u></td>  	
<tr/>

<tr>
<td><input type="radio" name="ltype" value="Learning Licence">Learning Licence</td>
<td colspan="2"><input type="radio" name="ltype" value="Driving Licence">Driving Licence</td>
</tr>

<tr>
<td colspan="2">Adhaar Card No.</td>  	
<td>State</td>
<tr/>

<tr>
<td colspan="2"><input type ="number" value="<?php echo $adhaar?>" style="border: 1px solid red; box-shadow: none;" readonly></td>	
<td>		
<input type="text" value="<?php echo $state?>" style="border: 1px solid red; box-shadow: none;" readonly>
</td>
</tr>

<tr>
<td>Name</td>
</tr>

<tr>
<td><input type ="text" value="<?php echo $fn?>" style="border: 1px solid red; box-shadow: none;" readonly></td>
<td><input type ="text" name="mn" value="<?php echo $mn?>"></td>
<td><input type ="text" name="ln" value="<?php echo $ln?>"></td>
</tr>

<tr>
<td>Gender</td>
<td>Age</td>
</tr>

<tr>
<td><input type="radio" name="gender" value="Male">Male &nbsp&nbsp
<input type="radio" name="gender" value="Female">Female</td>
<td><input type ="number"  name="age" style="width:80px" value="<?php echo $age?>"></td>
</tr>

<tr>
<td>Contact</td>
</tr>

<tr>
<td><input type ="number" name="phone" value="<?php echo $phone?>"></td>
<td><input type ="number" name="mobile" value="<?php echo $mobile?>"></td>
</tr>

<tr>
<td>Place Of Birth</td>
<td>Citizenship By</td>
<td>Blood Group</td>
</tr>

<tr>
<td><input type ="text" name="place" value="<?php echo $place?>"></td>

<td><select name="citizenship">
<option value="<?php echo $citiz?>" selected><?php echo $citiz?></option>
<option value = "Birth">Birth</option>
<option value = "Registration">Registration</option>
</select></td>

<td><select name="blood">
<option value="<?php echo $blood?>" selected><?php echo $blood?></option>
<option value = "o+">O+</option>
<option value = "o-">O-</option>
<option value = "a+">A+</option>
<option value = "a-">A-</option>
<option value = "b+">B+</option>
<option value = "b-">B-</option>
<option value = "ab+">AB+</option>
<option value = "ab-">AB-</option>
</select></td>
</tr>

<tr>
<td>Email</td>
<td>Education Qualification</td>
<td>Identification Marks</td>
</tr>

<tr>
<td><input type ="email" value="<?php echo $email?>" style="border: 1px solid red; box-shadow: none;" readonly></td>
<td>
<select name="education">
<option value="<?php echo $edu?>" selected><?php echo $edu?></option>
<option value = "SSC" selected>SSC</option>
<option value = "HSC">HSC</option>
</select></td>
<td><input type ="text" name="identification" value="<?php echo $idi?>"></td>
</tr>

<tr><td colspan="3"><u>Address Details</u></td></tr>

<tr><td colspan="3"><input type="number" name="plot" class="textInput" placeholder="Plot No." value="<?php echo $plot?>"></td></tr>
<tr><td colspan="3"><input type="text" name="house" class="textInput" placeholder="House Name" value="<?php echo $house?>"></td></tr>
<tr><td colspan="3"><input type="text" name="street" class="textInput" placeholder="Street" value="<?php echo $street?>"></td></tr><br>
<tr><td colspan="3"><input type="text" name="vtc" class="textInput" placeholder="Village/Town/City" value="<?php echo $vtc?>" 
style="border: 1px solid red; box-shadow: none;" readonly></td></tr>
<tr><td colspan="3"><input type="text" name="taluka" class="textInput" placeholder="Taluka" value="<?php echo $taluka?>" 
style="border: 1px solid red; box-shadow: none;" readonly></td></tr>
<tr><td colspan="3"><input type="number" name="pincode" class="textInput" placeholder="Pincode" value="<?php echo $pin?>" 
style="border: 1px solid red; box-shadow: none;" readonly></td></tr>

<tr><td colspan="2">
<u>Class of Vehicles</u>
</td></tr>

<tr id="radio"><td>
<input type="radio" name="vca" value="MOTOR CYCLE LESS THAN 50CC(MC50CC)"> MOTOR CYCLE LESS THAN 50CC(MC50CC)
</td><td>
<input type="radio" name="vca" value="MOTOR CYCLE WITHOUT GEAR(NON TRANSPORT)(MCWOG)"> MOTOR CYCLE WITHOUT GEAR(NON TRANSPORT)(MCWOG)
</td></tr>
<tr><td>
<input type="radio" name="vca" value="MOTOR CYCLE WITH GEAR (NON TRANSPORT)(MCWG)"> MOTOR CYCLE WITH GEAR (NON TRANSPORT)(MCWG)
</td><td>
<input type="radio" name="vca" value="LMV-NT-CAR(LMV)"> LMV-NT-CAR(LMV)
</td></tr>
<tr><td>
<input type="radio" name="vca" value="LMV -3 WHEELER NT(3W-NT)"> LMV -3 WHEELER NT(3W-NT)
</td><td>
<input type="radio" name="vca" value="LMV-TRACTOR-NT(TRCTOR)"> LMV-TRACTOR-NT(TRCTOR)
</td></tr>
<tr><td>
<input type="radio" name="vca" value="INVALID CARRIAGE VEHICLE(INVCRG)"> INVALID CARRIAGE VEHICLE(INVCRG)
</td><td>
<input type="radio" name="vca" value="ROAD ROLLER(RDRLR)"> ROAD ROLLER(RDRLR)
</td></tr>
<tr><td colspan="2">
<input type="radio" name="vca" value="OTHERS - CONSTRUCTION EQUIPMENTS(CNEQP)"> OTHERS - CONSTRUCTION EQUIPMENTS(CNEQP)
</td></tr>

<tr>
<td colspan="3"><button name="save" class="button btn">Save Changes</button></td></tr>

</table>
</form>
</div>
</div>
</body>
</html>