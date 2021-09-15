<?php
session_start();
$username = $_SESSION['username'];
mysql_connect('localhost','root') or die ('could not connect');
mysql_select_db('form') or die('could not connect');
//$id=addslashes($_REQUEST['id']);
$image=mysql_query("SELECT * FROM form WHERE fn = '$username'");
$image =mysql_fetch_assoc($image);
{
$image=$image['image'];
}
header("content-type :image/jpeg");

echo $image;
//echo "<img src=$image></a>";

?>