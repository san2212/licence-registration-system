<?php
session_start();
include "header.php";
?>
<!DOCTYPE HTML">
<html>
<head>
<title>Renew Database Display</title>
</head>
<link rel="stylesheet" type="text/css" href="db_display.css">
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
<form action="search.php" method="post">
<input type="text" name="search" placeholder="Search.." id="search">
<input type="submit" value="Go" id="go">
</form>
<form name="form1" action="" method="post">
<input type="submit" name="submit1" value="Delete" id="delete" align="right">
<?php
$link= mysql_connect('localhost','root') or die('could not connect');
mysql_select_db('form') or die('could not connect');
$res=mysql_query("select * from form_renew");
echo '<table id="db_table">
      <tr id="db_tr"><th></th><th>Licence No</th><th>Name</th><th>Authority</th><th>Issue Dt.</th><th>Expiry Dt.</th><th>Status</th></tr>';
			
while($row=mysql_fetch_array($res))
{
$id=$row['id'];
		   $lic_no = $row['lic_no'];
	       $fn = $row['fn'];
		   $mn = $row['mn'];
		   $ln = $row['ln'];
		   $authority = $row['authority'];
		   $issue_dt = $row['issue_dt'];
		   $expiry_dt = $row['expiry_dt'];
		   $verify_r = $row['verify_r'];
		   
		   echo "<tr id='db_tr'><td id='db_td'>";
		   ?>
		   <input type="checkbox" name="checkbox[]" class="other" value="<?php echo $row["id"]; ?>" />
		   <?php 
		   $id=$row['id'];
		   echo "</td><td id='db_td'>";
		   echo $row["lic_no"]; echo "</td>" ;
		   echo "<td id='db_td'>"; 
		   echo "<a href='print_form_renew.php?id=$id'>" . $row['fn'] .' '. $row["mn"].' '. $row["ln"]."</a>";
           echo "</td><td id='db_td'>";  
		   echo $row["authority"]; 
		   echo "</td><td id='db_td'>"; 
		   echo $row["issue_dt"]; 
		   echo "</td><td id='db_td'>";
		   echo $row["expiry_dt"];
		   echo "</td><td id='db_td'>";
			if($verify_r == 0)
			{	
			echo '<p style="color:red;">NOT VERIFIED</p>';
			}
			else if($verify_r == 1)
			{
			echo '<p style="color:green;">VERIFIED</p>';
			}	
			else if($verify_r == 2)
			{
			echo '<p style="color:blue;">SUBMITTED</p>';
			}	
			else if($verify_r == 3)
			{
			echo '<p style="color:black;">PAID</p>';
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
	   mysql_query("delete from form where id=$val"); 
	}
	?>
	<script type="text/javascript">
	window.location.href=window.location.href;
	</script>
	<?php
}
?>




