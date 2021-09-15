<?php
$email = $_GET['temp'];

mysql_connect("localhost","root","");
mysql_select_db("signup");

if(isset($_POST["reset"]))
{
  $password = md5(mysql_real_escape_string($_POST["pwd"]));
  $password_r = md5(mysql_real_escape_string($_POST["pwd_r"]));

	if(empty($_POST['pwd']) && empty($_POST['pwd_r']))
	{
		echo "<p style='text-align:center; color: red;'>fields are empty</p>";
	}
	else
	{
	if($password == $password_r)
	{		
    $result=mysql_query("UPDATE users SET `password`='$password' WHERE email='$email'")
    or die("Failed to query database".mysql_error());
	
	header ('location: index.php');
  }
  else
  {
	  echo "<div id='bg'>
<form method='post' action=''>
<p id='title'>Enter your new password below</p>
<p style='color:red; text-align:center;'>Password don't match</p><br>
<input type='password' name='pwd' placeholder='Enter Password'><br>
<input type='password' name='pwd_r' placeholder='Re-enter Password'><br>
<button name='reset' class='button button'>Reset</button>
</div>";
  }
}
}
?>

<html>
<link rel="stylesheet" type="text/css" href="reset.css">
<?php if(!isset($_POST['reset']))
{
?>
<div id="bg">
<form method="post" action="">
<p id='title'>Enter your new password below</p><br>
<input type="password" name="pwd" placeholder="Enter Password"><br>
<input type="password" name="pwd_r" placeholder="Re-enter Password"><br>
<button name="reset" class="button button">Reset</button>
</div>
<?php
}
?>
</form>
</html>
