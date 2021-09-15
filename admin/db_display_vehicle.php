<?php
session_start();
include "header.php";
?>
<!DOCTYPE HTML">
<html>
<head>
<title>Delete</title>
</head>
<link rel="stylesheet" type="text/css" href="db_display_vehicle.css">
<body>

<div id="left_nav">
<button id="btn_02" onclick="window.location.href='db_display.php'">Licence Form Details</button><br>
</div>

<div id="left_nav2">
<button id="btn_02" onclick="window.location.href='db_display_vehicle.php'">Vehicle Form Details</button><br>
</div>

<div id="left_nav3">
<button id="btn_02" onclick="window.location.href='slot_display.php'">Exam Slot Database</button><br>
</div>

<div id="layout">
<form name="form1" action="search_vehicle.php" method="post">
<input type="text" name="search" placeholder="Search.." id="search">
<input type="submit" value="Go" id="go">
Filter Search:
<select onChange="window.location.href=this.value">
<option>--filter--</option>
<option value="db_display_vehicle0.php">Not Verified</option>
<option value="db_display_vehicle1.php">Verified</option>
<option value="db_display_vehicle.php">All</option>
</select>
</form>
<form name="form1" action="" method="post">
<input type="submit" name="submit1" value="Delete" id="delete" align="right">
<?php
$link= mysql_connect('localhost','root') or die('could not connect');
mysql_select_db('form') or die('could not connect');
$res=mysql_query("select * from form_vehicle");
echo '<table id="db_table">
      <tr><th></th><th>UID Adhar</th><th>Name</th><th>Gender</th><th>Mobile No.</th><th>State</th><th>RTO Number</th><th>Status</th></tr>';
			
while($row=mysql_fetch_array($res))
{
		   $id=$row['id'];
		   $adhaar = $row['adhaar'];
	       $fn = $row['fn'];
		   $mn = $row['mn'];
		   $ln = $row['ln'];
		   $gender = $row['gender'];
		   $mobile = $row['mobile'];
		   $state = $row['state'];
		   $rto_number = $row['rto_number'];
		   $verify_v = $row['verify_v'];
			
		   echo "<tr id='dbtable_tr'><td id='dbtable_td'>";
		   ?>
		   <input type="checkbox" name="checkbox[]" class="other" value="<?php echo $row["id"]; ?>" />
		   <?php 
		   $id=$row['id'];
		   echo "</td><td id='dbtable_td'>";
		   echo $row["adhaar"]; echo "</td>" ;
		   echo "<td id='dbtable_td'>"; 
		   echo "<a href='print_form_vehicle.php?id=$id'>".$row['fn'] .' '. $row["mn"].' '. $row["ln"]."</a>";
		   echo "</td><td id='dbtable_td'>"; 
		   echo $row["gender"]; 
		   echo "</td><td id='dbtable_td'>";
		   echo $row["mobile"];
		   echo "</td><td id='dbtable_td'>";
		   echo $row["state"]; 
		   echo "</td><td id='dbtable_td'>";
		   echo $row["rto_number"];
		   echo "</td><td id='dbtable_td'>";
		   if($verify_v == 0)
			{	
			echo '<p style="color:red;">NOT VERIFIED</p>';
			}
			else if($verify_v == 1)
			{
			echo '<p style="color:green;">VERIFIED</p>';
			}	
		   echo "</td></tr>";	
		   }
		   echo '</table>';
	   ?>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST["submit1"]))
{
	$box=$_POST['checkbox'];
	while (list ($key,$val) = @each ($box)) 
	{
	   mysql_query("delete from form_vehicle where id=$val"); 
	}
	?>
	<script type="text/javascript">
	window.location.href=window.location.href;
	</script>
	<?php
}
?>




