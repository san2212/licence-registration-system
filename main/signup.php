<?php

session_start();
$db = mysqli_connect("localhost", "root", "","signup") or die(mysql_error());

if(isset($_POST["register"]))
{
	$username = mysqli_real_escape_string($_POST["username"]);
	$email = mysqli_real_escape_string($_POST["email"]);
	$password = mysqli_real_escape_string($_POST["password"]);
	$password2 = mysqli_real_escape_string($_POST["password2"]);
	
	include "signuperr.php";

if(count($errors) == 0)
{
		$_SESSION['username']=$username;
		$_SESSION['email']=$email;
		$_SESSION['password']=$password;
		header ('location: otp.php');
}
}
?>
<!DOCTYPE html>
<html style="overflow: hidden">
<head>
<title>
eLRS
</title>
<meta charset="UTF-8">
</head>
<body>

<form method="post" action ="">
<link rel="stylesheet" type="text/css" href="signup.css">
<p>
USER SIGN-UP

<input type="text" name="username" class="textInput" placeholder="username" 
value='<?php if(isset($errors['emailErr'])) echo $username;
if(isset($errors['passempty'])) echo $username;
if(isset($errors['passempty2'])) echo $username?>'>

<?php if(isset($errors['usernameErr'])) echo $errors['usernameErr'];?>
<?php if(isset($errors['usernameErr1'])) echo $errors['usernameErr1'];?>
<?php if(isset($errors['usernameErr2'])) echo $errors['usernameErr2'];?>
<br>

<input type="email" name="email" class="textInput" placeholder="email"
value='<?php if(isset($errors['usernameErr'])) echo $email;
if(isset($errors['passempty'])) echo $email;
if(isset($errors['passempty2'])) echo $email?>'>

<?php if(isset($errors['emailErr'])) echo $errors['emailErr'];?>
<?php if(isset($errors['emailErr1'])) echo $errors['emailErr1'];?>
<br>

<input type="password" name="password" class="textInput" placeholder="password"
value='<?php if(isset($errors['usernameErr'])) echo $password;
if(isset($errors['emailErr'])) echo $password;
if(isset($errors['passempty2'])) echo $password?>'>

<?php if(isset($errors['passempty'])) echo $errors['passempty'];?>
<br>

<input type="password" name="password2" class="textInput" placeholder="confirm password"
value='<?php if(isset($errors['usernameErr'])) echo $password2;
if(isset($errors['emailErr'])) echo $password2;
if(isset($errors['passempty'])) echo $password2?>'>

<?php if(isset($errors['passempty2'])) echo $errors['passempty2'];?>
<?php if(isset($errors['passwordErr'])) echo $errors['passwordErr'];?>
<?php if(isset($errors['passwordErr1'])) echo $errors['passwordErr1'];?>
<?php if(isset($errors['error'])) echo $errors['error'];?>
<br>

<input type="submit" class="button button" name="register" value="Register" placeholder="email"><br><br>
Already have an account? <a href="index.php"> Login here</a>
</p>
</form>
</body>
</html>