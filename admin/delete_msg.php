<?php
session_start();
$username = $_SESSION['username'];
mysql_connect('localhost','root') or die('could not connect');
mysql_select_db('signup') or die('could not connect');

$query= mysql_query("UPDATE users SET `temp`='1' WHERE username ='$username'");
header('location: db_display.php');
?>