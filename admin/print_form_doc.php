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
		$doc=$row["doc"];
		$doc1=$row["doc1"];
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
<div id="img_disp">
<?php echo "<p /><img src=get1.php?id=$id width=450 height=300  id='passport'>";
echo "<p /><img src=get2.php?id=$id width=450 height=300  id='passport'>";?>
</div>
</div>
</table>
</form>
</div>
</body>
</html>
