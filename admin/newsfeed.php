<?php
session_start();
include "header.php";
?>
<!DOCTYPE Feeds>
<html>
<head>
</head>
<style>
input[type=button], input[type=submit], input[type=reset]
{
	 background-color: #85929E; 
	 border: none; 
	 color: white; 
	 padding: 6px 32px; 
	 text-decoration: none; 
	 cursor: pointer;
	 margin-left: 1034px;
}
input[type="text"], input[type="password"], input[type="number"], input[type="email"]
{
	width: 100%; 
	padding: 6px 20px; 
	margin: 8px 0; 
	box-sizing: border-box;
}
p
{
	background-color : #85929E;
	font-family: "calibri";
	color : white;
	text-align: left;
}
body
{
	background-color : #EBEBEB;
}
</style>
<body>
<p><b>Newsfeed Update Center</b><br>
update your feeds to display</p>
<form name="form1" action="" method="post">
<input type="text" name="feed_msg" placeholder="Update Newsfeeds"></br>
<input type="submit" name="update" value="Update" class="button button">
</form> 
</body>
</html>
<?php

$db = mysqli_connect("localhost","root","","newsfeed") or die(mysql_error());

if(isset($_POST["update"]))
{
	if(empty($_POST["update"]))
	{
		echo "No valid information entered";
	}
	else
	{
		$feed_msg = mysql_real_escape_string($_POST["feed_msg"]);
		$sql = "INSERT INTO feed(feed_msg) VALUES ('$feed_msg')";
		mysqli_query($db,$sql);
	}
}
?>