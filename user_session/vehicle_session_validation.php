<?php
session_start();
include "session_header.php";

	mysql_connect('localhost','root') or die('could not connect');
	mysql_select_db('form') or die('could not connect');
  	$username = $_SESSION['username'];
	
$msg = array();
			
$query= mysql_query("SELECT * FROM form_vehicle where fn = '$username'");

$row = mysql_fetch_array($query);
if($username == $row['fn'])
{
	if($row['verify_v'] == 0)
	{	
	$msg['msg1'] = "<p id='notify_layout'>• Your form has been successfully filled. Click <a href='form_vehicle_display.php' id='notify_link'>here</a> to view form<br>• It will be soon verified by the authority</p>";
	}
	else if($row['verify_v'] == 1)
	{	
 	$msg['msg2'] = "<p id='notify_layout'>• Your Vehicle Registration form has been successfully verified</p><br>";
	$msg['msg3'] = "<p id='notify_layout'>• To submit your documents at RTO Office, follow steps below :<br> 1) Print hard-copy of your form <a href='print_final_form_vehicle.php' onclick='w = window.open(this.href);w.print();return false; id='notify_link''>here</a> and<br>2) Submit it to your nearest RTO Center</p>";
	}
}
else
{
header ('location: form_vehicle.php'); 
}
?>

<html>
<head>
<title>
</title>
<style>
#form_head
{
	color: white;
	text-align:left;
}
p
{
	margin:0px;
	padding:0px;
	color : white;
	font-family: "calibri";
}
#optlayout
{
	padding-left:120px;
	padding-right:120px;
	padding-top:30px;
	background-color: #4285f4;
	height: 300px;
}
#table
{	
	padding: 30px;
	margin: 0px;
	background-color: white;
	box-shadow: 0px 0px 5px #888888;
	height: 400px;
}
body
{
	font-family: "corbel";
	background-color: #eeeeee;
}
#notify_layout  
{
	margin-top: 0px;
	box-shadow: inset 0px 0px 5px #888888;
	padding: 10px;
	color: #6D6D6D;
}
#notify_link
{
	text-decoration:none;
}
#notify_link:hover
{
	text-decoration: underline;
}
</style>
</head>
<body>
<div id="optlayout">
<div id="table">
<?php if(isset($msg['msg1'])) echo $msg['msg1'];?>
<?php if(isset($msg['msg2'])) echo $msg['msg2'];?>
<?php if(isset($msg['msg3'])) echo $msg['msg3'];?>
</div>
</div>
</body>
</html>
