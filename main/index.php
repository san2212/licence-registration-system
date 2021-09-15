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
  
    $result=mysql_query("select * from users where username='$username' and password='$password'")
     or die("Failed to query database".mysql_error());
   
   $row=mysql_fetch_array($result);

   if($row['username']==$username && $row['password']==$password)
   {
		//echo "Succesfully Logged in ".$row['username'];
		include "loginerr.php";
		if(count($errors) == 0)
		{
		$_SESSION['username']=$username;
		$url = "http://localhost/modules/user_session/user_account.php";
		echo '<script>window.location = "'.$url.'";</script>';
		}
   }  
    else
	{
	  $errors['loginerr'] = "
<form method='post' action=''>
<input type='text' id='inputerr' name='username' placeholder='username'>
<input type='password' id='inputerr' name='password' placeholder='password'><br>
<button id='login_btn' name='login'>Login</button><br>
<p id='err_txt'>invalid entry<br> <a href='pwd_reset.php'>Forgot Password?</a></p>
</form>"; 
	}
}

if ( isset($_GET['pass_email']) && $_GET['pass_email'] == 1 )
{	
	$msg = array();
    $msg['msg1'] = "<b>*You have been successfully registered</b><br>";
}
?>


<html>
<head>
<title>
</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="index.css">

<div id="content">
<div id="corner">

<h1 id="header">RTO Licence Services</h1>


<a href="signup.php" id="head_nav">Sign up</a>
<a href="#" id="head_nav">About us</a>


</div>
<div id="front">
<p style="text-align: center; font-family: 'Trebuchet MS'; font-size:18px; color:#606060;">Driving Licence</p>
<img src="tray1.png" align="center" width="150" height="150" style="margin-left:25%;">
</div>
<div id="front" onclick="window.location='https://en.wikipedia.org/wiki/Road_signs_in_India';">
<p style="text-align: center; font-family: 'Trebuchet MS'; font-size:18px; color:#606060;">Road Signs</p>
<img src="tray2.png" align="center" width="150" height="150" style="margin-left:25%;">
</div>
<div id="front" onclick="window.location='fees.php';">
<p style="text-align: center; font-family: 'Trebuchet MS'; font-size:18px; color:#606060;">Fees</p>
<img src="tray3.png" align="center" width="150" height="150" style="margin-left:25%;">
</div>
<div id="col0">
<h3 id="col0_login">User Login</h3>
<?php if(isset($errors['loginerr'])) echo $errors['loginerr'];
else
{
?>
<form method="post" action="">
<input type="text" id="input" name="username" placeholder="username">
<input type="password" id="input" name="password" placeholder="password"><br>
<button id="login_btn" name="login">Login</button><br><br>
<p id='err_txt'><a href='pwd_reset.php'>Forgot Password?</a></p>
</form>
<?php 
}
?>
</div>
<div id="col1">
<h1 id="col1_h">We Provide service, we provide satisfaction</h1>
<h3 id="col1_sub">RTO Services encapsulates many provident benefits. Helps public to keep their work flow fast and secure</h3>
<h1 id="col1_h">Explore us</h1>
<button id="hs"><b>Help & Support</b></button>

</div>
<div id="col2">
<table>
<tr>
<td>
<p id="footer_h">Customer Care</p>
<p id="footer"><u>Address</u> <br><br>Sr No.140, Apt. Pranjal Maitri,<br>Nr. Gurudwara,<br>Akurdi, Pune - 411 044</p>
</td>
</tr>
</table>
<p><img src="social.png" width="100" height="60" id="socialimg"></p>
</div><br>
<a href="http://localhost/modules/admin/login.php" id="foot_nav">+Admin Login</a>
</body>
</html>