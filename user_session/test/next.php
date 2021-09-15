<?php
session_start();
if(isset($_POST['next']))
{
	$j=$_SESSION["j"];
		$j=$j+1;
		if($j>=20)
		{
			$j=20;
		}
		
$_SESSION["j"] =$j;
header("location:quiz1.php");

}?>