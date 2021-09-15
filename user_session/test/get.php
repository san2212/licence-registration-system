<?php
session_start();
$id=addslashes($_REQUEST['id']);
mysql_connect('localhost','root') or die ('could not connect');
mysql_select_db('test') or die('could not connect');
$id=addslashes($_REQUEST['id']);
$image=mysql_query("SELECT * FROM quiz WHERE id=$id");
$image =mysql_fetch_assoc($image);
{
$image=$image['img'];
}
header("content-type :image/jpeg");

echo $image;


?>