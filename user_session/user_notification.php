<?php
session_start();
include "session_header.php";
$username = $_SESSION['username'];
mysql_connect('localhost','root') or die('could not connect');
mysql_select_db('form') or die('could not connect');

$query=mysql_query("SELECT * FROM form WHERE fn = '$username'");
while($row=mysql_fetch_array($query))
{
	$verify = $row['verify'];
}
	
?>
<html>
<head>
<title>
</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="user_notification.css">
<div id="optlayout">
<div id="table">
<h1 id="form_head">Notifications</h1>
<div id="notify">
<?php 
if(!isset($verify))
{
?>
<div class="alert3">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
<?php
echo "Hello, $username <br>• You've been successfully registered to our website. For more help visit : <a href='#' id='notify_link'> Help and Support Center</a>";
?>
</div>
<?php
}
else
{
if($verify == 0)
{
?>
<div class="alert">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
<?php
echo "• Your form for Licence Registration has been successfully filled.";	
?>
</div>

<div class="alert2">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
<?php
echo " Hello, $username <br>• You've been successfully registered to our website. For more help visit : <a href='#' id='notify_link'> Help and Support Center</a>";
?>
</div>


<?php
}
else if ($verify == 1)
{	
echo "<div id='image'><img src='form_testdate.png' width='950px' height='600px'>";
include "date_select.php";
}
else if($verify == 2)
{
?>
<div class="alert">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
<?php
echo "• Your date for exam has been successfully updated. Hall ticket will be issued ASAP";	
?>
</div>
<div class="alert2">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
<?php
echo " Hello, $username <br>• You've been successfully registered to our website. For more help visit : <a href='#' id='notify_link'> Help and Support Center</a>";
?>
</div>
<?php
}
else if($verify == 3)
{
?>
<div class="alert">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
<?php
echo "Your Payment transaction was successfully undertaken. Click <a href='#' id='notify_link'>here</a> to  print receipt";	
?>
</div>
<div class="alert2">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
<?php
echo " Hello, $username <br>• You've been successfully registered to our website. For more help visit : <a href='#' id='notify_link'> Help and Support Center</a>";
?>
</div>


<?php
}	
}
?>
</div>
</div>
</div>
</body>
</html>