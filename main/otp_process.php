<?php 
session_start();
$db= mysqli_connect("localhost", "root", "","signup") or die(mysql_error());
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$string = $_SESSION['otp'];

$otp = mysql_real_escape_string($_POST["otp"]);
if($otp==$string)
	{
	$passwordmd5 = md5($password);
	$sql = "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$passwordmd5') ";
	mysqli_query($db,$sql);
	header ('location: signup.php?success=1');
  }
  else
  {
	header ('location: signup.php');
  }
?>