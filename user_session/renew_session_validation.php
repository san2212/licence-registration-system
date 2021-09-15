<?php
session_start();
include "session_header.php";

	mysql_connect('localhost','root') or die('could not connect');
	mysql_select_db('form') or die('could not connect');
  	$username = $_SESSION['username'];
	
$msg = array();
			
$query= mysql_query("SELECT * FROM form_renew where fn = '$username'");
$row = mysql_fetch_array($query);
if($username == $row['fn'])
{
	if($row['verify_r'] == 0)
	{	
 	$msg['msg1'] = "<p id='notify_layout'>• Your renew form has been successfully filled. Please wait until authority verifies your details</p><br>";
	}
	if($row['verify_r'] == 1)
	{	
 	$msg['msg1'] = "<p id='notify_layout'>• Your renewation form has been successfully verified</p><br>";
	}
}
else
{
header ('location: renew_form.php'); 
}
?>

<html>
<head>
<title>
</title>
<link rel="stylesheet" type="text/css" href="renew_session_validation.css">
</head>
<body>

<div id="optlayout">
<div id="table">
<?php if(isset($msg['msg1'])) echo $msg['msg1'];?> 
</div>
</div>
</body>
</html>
