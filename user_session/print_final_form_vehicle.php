<?php 
session_start();
$username = $_SESSION['username'];
  mysql_connect('localhost','root') or die('could not connect');
  mysql_select_db('form') or die('could not connect');
?>

	   <?php
		$query= mysql_query("SELECT * FROM form_vehicle where fn = '$username' ");
        
		
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
<html>
<head>
</head>
<style>
#form_layout
{
	height:1000px;
	padding:60px;
}
#identity
{
	width:100%;
}
#main:nth-child(even) {background-color: #ECECEC}
#main:nth-child(odd) {background-color: #DADADA}
a:link:after, a:visited:after {
    content: "";
}
</style>
<body>
<div id="form_layout">
<h5 id="title" align="center"><u>FORM OF APPLICATION FOR VEHICLE REGISTRATION</u></h5>
To,<br>
THE LICENSING AUTORITY,<br>
___________________________<br><br>

<table>
<tr>
<td colspan="2">
I apply for vehicle registration of the following description :-<br><br>
<?php echo $vehicle_type ?>
</td>
<td></td>
</table><br><hr>
<h5 id="title" align="center">Particulars to be furnished by the applicant</h5>

<table id="identity">

<tr id="main">
<td>Full name</td>
<td>&nbsp<?php echo $fname;?>&nbsp<?php echo $mname;?>&nbsp<?php echo $lname ?></td>
</tr>

<tr id="main">
<td>Email Id</td>
<td>&nbsp<?php echo $email;?></td>
</tr>

<tr id="main">
<td>Gender</td>
<td>&nbsp<?php echo $gen;?></td>
</tr>

<tr id="main">
<td>Mobile</td>
<td>&nbsp<?php echo $mobile ?></td>
</tr>

</table>
<br><br><br><br>
I have requested for RTO Number <h3><?php echo $rto_number?>, <?php echo $state?></h3><br><br>
I am exempted to pay for vehicle registration considering the law<br>
I have paid the fee of Rs.___________<br><br><br><br><br><br><br>

<p align="right"><?php echo $fname;?>&nbsp<?php echo $lname ?><br><i>Signature or Thumb Impression of Applicant</i></p>
</div>
</body>
</html>