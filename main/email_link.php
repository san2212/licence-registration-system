<?php
session_start();

$username=addslashes($_REQUEST['username']);
$email=addslashes($_REQUEST['email']);
$password=addslashes($_REQUEST['password']);

$db= mysqli_connect("localhost", "root", "","signup") or die(mysql_error());
$passwordmd5 = md5($password);
$sql = "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$passwordmd5')";
mysqli_query($db,$sql);	
header ('location: http://localhost/modules/main/login.php?pass_email=1');
?>
