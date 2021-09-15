<?php
session_start();
$id=addslashes($_REQUEST['id']);
mysql_connect('localhost','root') or die ('could not connect');
mysql_select_db('form') or die('could not connect');
$id=addslashes($_REQUEST['id']);
$image=mysql_query("SELECT * FROM form WHERE id=$id");
$image =mysql_fetch_assoc($image);
{
$doc1=$image['doc1'];
}
header("content-type :image/jpeg");

echo $doc1;
?>