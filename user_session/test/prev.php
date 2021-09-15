<?php
session_start();
if(isset($_POST['prev']))
{
	$j=$_SESSION["j"];
	$j=$j-1;
	if($j<=0)
	{
		$j=1;
	}
$_SESSION["j"] =$j;
}
header("location:quiz1.php");

?>