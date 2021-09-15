<?php
session_start();

if(isset($_POST["login"])){
	
  $username=$_POST['username'];
  $password=md5($_POST['password']);
  
  $username=stripcslashes($username);
  $password=stripcslashes($password);
  $username=mysql_real_escape_string($username);
  $password=mysql_real_escape_string($password);
   
  mysql_connect("localhost","root","");
  mysql_select_db("signup");
  
    $result=mysql_query("select * from admin where username='$username' and password='$password'")
     or die("Failed to query database".mysql_error());
   
   $row=mysql_fetch_array($result);

   if($row['username']==$username && $row['password']==$password)
   {
		//echo "Succesfully Logged in ".$row['username'];
		include "loginerr.php";
		if(count($errors) == 0)
		{
		$_SESSION['username']=$username;
		$url = "db_display.php";
		echo '<script>window.location = "'.$url.'";</script>';
		}
   }  
    else
	{
	  $errors['loginerr'] = "<label id='err'>Username or Password is incorrect</label>"; 
	}
}

if ( isset($_GET['pass_email']) && $_GET['pass_email'] == 1 )
{	
	$msg = array();
    $msg['msg1'] = "<b>*You have been successfully registered</b><br>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>
</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="login.css">

<div id="nav">
	<button id="nav_btn1"  onclick="window.location.href='http://localhost/modules/main/index.php'">🏠 HOME</button>
	<button id="nav_btn1" onclick="window.location.href='#'">Help & Support</button>
</div>

<form method="post" action="">
<p> 
<?php if(isset($msg['msg1'])) echo $msg['msg1'];?>
ADMIN LOGIN<br>
<?php if(!isset($msg['msg1']))
{
	echo "*Enter Username & Password";
}
?>
<input type="text" id="username" name="username" class="textInput" placeholder="username"><br>
<input type="password" id="password" name="password" class="textInput" placeholder="password"><br>
<?php if(isset($errors['error'])) echo $errors['error'];?>
<?php if(isset($errors['loginerr'])) echo $errors['loginerr'];?>
<button class="button" style="vertical-align:middle" name="login"><span>LOGIN</span></button><br>
</p>
</form>
</body>
</html>

