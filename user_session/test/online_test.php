<?php 
session_start();
$_SESSION['no']=array();
$array = range(1, 20);
srand ((double)microtime()*1000000);
for($x = 1; $x<=20; $x++)
{ 
     $i = rand(1, count($array))-1;
     $no[$x] = $array[$i];
     array_splice($array, $i, 1);
	 $_SESSION['no'][$x]=$no[$x];
}
$_SESSION["count"] = 0;
$_SESSION["j"] = 1;

date_default_timezone_set('Asia/Calcutta');

$d= date("F d, Y H:i:s", strtotime('+20 minutes'));
$_SESSION['dat']=$d;
?>
<html>
<head>
<title>Online Test</title>
</head>
<link rel="stylesheet" type="text/css" href="online_test.css">
<body>
<div id="layout">
<div id="header">
<p id="title">Online Test Instructions</p>
<p id="subtitle">Demo Preliminary Mock Test</p>
</div>
<p id="content"><u>Instructions</u></p>
<hr>
<p id="content">• All the questions are mandatory to attempt</p>
<p id="content">• Each question with four relative options would be provided out of which any one will be the correct answer</p>
<p id="content">• Each question carries 1(one) mark, image based questions will also be provided</p>
<p id="content">• User is expected to press END EXAMINATION after comletion of examination</p>
<p id="content">• EXAMINATION would be automatically terminated after 20 MINUITES of time interval</p>
<hr>
<p id="subtitle2">Duration : 20 MINUITES | MARKS : 20</p>
<p id="subtitle2u">Press the button below to begin EXAMINATION</p>
<form action="quiz1.php" method="post">
<button id="start" name="start"><b>START EXAMINATION</b></button>
</form>
</div>
</body>
</html>