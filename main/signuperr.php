<?php
mysql_connect('localhost','root') or die('could not connect');
mysql_select_db('signup') or die('could not connect');
$errors = array();

$query= mysql_query("SELECT username FROM users");
while($row=mysql_fetch_array($query))
  {
	
if(empty($_POST['username']) && empty($_POST['email']) && empty($_POST['password']) &&  empty($_POST['password2']))
{
	$errors['error'] = "<label id='err'>All fields are empty</label>"; 

}
else
{
if(empty($_POST['username']))
{
	$errors['usernameErr'] = "<label id='err'>Your username cannot be empty</label>"; 
}
else if(strlen($_POST['username']) < 2)
{
	$errors['usernameErr1'] = "<label id='err'>Your username must be atleast 2 Characters</label>"; 
}
 else if($row['username'] == $username)
	  {
		  $errors['usernameErr2'] = "<label id='err'>Username Exist</label>"; 
	  }
else if(empty($_POST['email']))
{
	$errors['emailErr'] = "<label id='err'>Your email cannot be empty</label>"; 
}

else if(strlen($_POST['email']) < 2)
{
	$errors['emailErr1'] = "<label id='err'>Your email must be atleast 2 Characters</label>"; 
}
else if(empty($_POST['password'])) 
{
	$errors['passempty'] = "<label id='err'>Password field is empty</label>";
}
else if(empty($_POST['password2'])) 
{
	$errors['passempty2'] = "<label id='err'>Password field is empty</label>";
}
else if(($_POST['password']) !== ($_POST['password2']))
{
	$errors['passwordErr'] = "<label id='err'>Your password don't match</label>"; 
}

else if(strlen($_POST['password']) && strlen($_POST['password2']) < 7)
{
	$errors['passwordErr1'] = "<label id='err'>Your password must be atleast 8 Characters</label>"; 
}
}
}
?>