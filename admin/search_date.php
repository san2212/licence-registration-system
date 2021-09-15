<?php
 include "header.php";
 ?>
<!DOCTYPE html>
<html>
<title>Exam Slot Database</title>
<link rel="stylesheet" type="text/css" href="db_display.css">
<body>
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
<form action="search_date.php" method="post">
<input type="text" name="search" placeholder="Select Date" id="datepicker" readonly>
<input type="submit" value="Go" id="go">
</form>

<?php
  mysql_connect('localhost','root') or die('could not connect');
  mysql_select_db('form') or die('could not connect');
?>

<?php
  if(isset($_POST['search']))
  {
	$searchq=$_POST['search'];
	//$searchq=preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/', '$3-$1-$2',$searchq);
    $query=mysql_query("SELECT * FROM form WHERE date LIKE '%$searchq%'") or die("could not search");
	$count =mysql_num_rows($query);
  }
?>

<form name="form2" action="db_display.php" method="post">
<input type="submit" name="submit1" value="Delete" id="delete" align="right">
<p style="text-align:center; font-family: 'cambria'">DISPLAYING DATABASE FOR DATE - <b><?php echo $searchq ?></b></p>
<?php
$link= mysql_connect('localhost','root') or die('could not connect');
mysql_select_db('form') or die('could not connect');
$res=mysql_query("SELECT * FROM form WHERE date LIKE '%$searchq%'") or die("could not search");
echo '<table id="db_table">
      <tr id="db_tr"><th></th><th>UID Adhar</th><th>Name</th><th>Age</th><th>Gender</th><th>Mobile No.</th><th>Address Details</th><th>Status</th></tr>';
			
while($row=mysql_fetch_array($res))
{
$id=$row['id'];
		   $adhaar = $row['adhaar'];
	       $fn = $row['fn'];
		   $mn = $row['mn'];
		   $ln = $row['ln'];
		   $age = $row['age'];
		   $gender = $row['gender'];
		   $phone = $row['phone'];
		   $plot = $row['plot'];
		   $street = $row['street'];
		   $vtc = $row['vtc'];
		   $state = $row['state'];
		   $verify = $row['verify'];
		   
		   echo "<tr id='db_tr'><td id='db_td'>";
		   ?>
		   <input type="checkbox" name="checkbox[]" class="other" value="<?php echo $row["id"]; ?>" />
		   <?php 
		   $id=$row['id'];
		   echo "</td><td id='db_td'>";
		   echo $row["adhaar"]; echo "</td>" ;
		   echo "<td id='db_td'>"; 
		   echo "<a href='print_form.php?id=$id'>" . $row['fn'] .' '. $row["mn"].' '. $row["ln"]."</a>";
           echo "</td><td id='db_td'>";  
		   echo $row["age"]; 
		   echo "</td><td id='db_td'>"; 
		   echo $row["gender"]; 
		   echo "</td><td id='db_td'>";
		   echo $row["phone"];
		   echo "</td><td id='db_td'>";
		   echo "Plot No- ".$row["plot"];
		   echo ", ".$row["street"];
		   echo ", ".$row["vtc"];
		   echo ", ".$row["state"];
		   echo "</td><td id='db_td'>";
			if($verify == 0)
			{	
			echo '<p style="color:red;">NOT VERIFIED</p>';
			}
			else if($verify == 1)
			{
			echo '<p style="color:green;">VERIFIED</p>';
			}	
			else if($verify == 2)
			{
			echo '<p style="color:blue;">SUBMITTED</p>';
			}	
			else if($verify == 3)
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
if(isset($_POST["delete"]))
{
	echo"You Pressed";
	$box=$_POST['checkbox'];
	while (list ($key,$val) = @each ($box)) 
	{
	   mysql_query("delete  from form where id=$val"); 
	   header ('location: db_display.php');
}
}
?>
