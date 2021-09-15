<?php
session_start();
$count=$_SESSION['count'];
$j=$_SESSION["j"];
if(isset($_POST["save"]))
{
	$ans= $_SESSION["ans"] ; 
$quiz=$_POST['quiz'];
if($ans==$quiz)
{
	 $count++;
	
}
$_SESSION['count']=$count;
if($quiz!=NULL)
{
$j=$j+1;
		if($j>=20)
		{
			$j=20;
		}
		
$_SESSION["j"] =$j;
}
header("location:quiz1.php");
}


?>


