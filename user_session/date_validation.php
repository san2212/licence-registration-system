<?php
session_start();
$username = $_SESSION['username'];

mysql_connect('localhost','root') or die('could not connect');
mysql_select_db('form') or die('could not connect');
  
mysql_query("UPDATE form SET `verify`= 2 WHERE fn = '$username'");

header ('location: user_notification.php');
?>	