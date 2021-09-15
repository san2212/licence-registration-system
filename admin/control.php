<?php
session_start();
include "header.php";
$d=strtotime("tomorrow");
$first=date("d/m/Y", $d);
?>
<!DOCTYPE HTML">
<html>
<head>
<title>Delete</title>
</head>
<link rel="stylesheet" type="text/css" href="control.css">
<body>
<div id="layout">
<div class="alert3">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
<?php if(!isset($_GET['success']))
{
?>
Console for sending notifying email to users having exams tomorrow. Click <a href="exam_mail.php" target="_blank" id="email">here</a> to send.
<?php
}
else if($_GET['success'] == 1)
{
?>
Successfully sent mail to users for tomorrow's slot - <b><?php echo $first;?></b>
<?php
}
?>
</div>
</div>
</body>
</html>