<?php
if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
     echo "
	 <div id='bg2'>
	 <p id='title'><br><br><br><br>Email has been successfully sent to your email address</p>
	 <p id='subtitle'>Visit the <i>link</i> in your email and reset your password</p><br>
	 <p id='title'>Go back to <a href='index.php'>Home page</a></p>
	 <p id='subtitle'>or visit <a href='https://www.gmail.com'>www.gmail.com</a>
	 </div>
	 ";	 
}
?>
<html>
<head>
<title>
</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="pwd_reset.css">
<?php if(!isset($_GET['success']))
{
?>
<div id="bg">
<form method="post" action="reset_mailer.php">
<p id='title'>Enter your email to reset your password</p>
<img src="pwd_reset.gif" width="300" height="250" id="gif">
<input type="email" name="email" placeholder="example@mail.com"><br>
<button name="submit" class="button button">Send</button><br><br>
</form>
<?php
}
?>
</div>
</body>
</html>