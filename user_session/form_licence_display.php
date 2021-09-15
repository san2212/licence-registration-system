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
		$id=$row["id"]; 
		$ltype=$row["ltype"]; 
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
include "session_header.php";
?>		
<!DOCTYPE html>
<html>
<head>
<title>
</title>
</head>
<body id="body">
<link rel="stylesheet" type="text/css" href="form_display.css">
<div id="optlayout">
<h1 id="form_licence">RTO Licence Registration</h1>
<div id="table">
<form method="post" action="form_licence_display.php" enctype="multipart/form-data">

<table>
<tr><td colspan="3"><button name="edit" class="button btn">Edit form</button></tr>

<tr>
<td colspan="2">
Hello, <?php echo $fn?><br><br>
• Form can be edited until it is verified by office authority<br>
• Once the form is verified you will be asked for online exam dates
</td>
<td colspan="3">  
<img src='get.php' width=150 height=150 align="right" id="imagePreview">
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
<td><input type ="text" value="<?php echo $fn?>" readonly></td>
<td><input type ="text" value="<?php echo $mn?>" readonly></td>
<td><input type ="text" value="<?php echo $ln?>" readonly></td>
</tr>

<tr>
<td>Gender</td>
<td>Age</td>
</tr>

<tr>
<td><input type="text" value="<?php echo $gen?>" readonly>
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

</div>
</body>
</html>
