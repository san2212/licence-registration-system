<?php
$errors = array();

if(empty($_POST['ltype']) && empty($_POST['adhaar']) && empty($_POST['fn']) && empty($_POST['ln'])
	&& empty($_POST['gender']) && empty($_POST['dob']) && empty($_POST['mobile']) && empty($_POST['place'])
	&& empty($_POST['email']) && empty($_POST['vtc']) && empty($_POST['taluka']) && empty($_POST['pincode']))
	{
		$errors['all_empty'] = "<label id='err'>*All fields are empty</label>"; 
	}
 else
 {
if(empty($_POST['ltype']))
{
	$errors['ltype_empty'] = "<label id='err'>&nbsp&nbsp*required<br></label>"; 
}
if(empty($_POST['adhaar']))
{
	$errors['adhaar_empty'] = "<label id='err'>&nbsp&nbsp*required<br></label>"; 
}
else if(strlen($_POST['adhaar']) < 12)
{
	$errors['adhaar_len'] = "<label id='err'>&nbsp&nbsp*Invalid Length</label>"; 
}
else if(strlen($_POST['adhaar']) > 12)
{
	$errors['adhaar_len'] = "<label id='err'>&nbsp&nbsp*Length exceeds 12-digits<br></label>"; 
}
if(empty($_POST['fn']))
{
   $errors['fn_empty'] = "<label id='err'>&nbsp&nbsp*firstname required<br></label>"; 
}
if(empty($_POST['ln']))
{
   $errors['ln_empty'] = "<label id='err'>&nbsp&nbsp*lastname required<br></label>"; 
}
if(empty($_POST['gender']))
{
	   $errors['gen_empty'] = "<label id='err'>&nbsp&nbsp*required<br></label>"; 
}
if(empty($_POST['dob']))
{
	   $errors['dob_empty'] = "<label id='err'>&nbsp&nbsp*required<br></label>"; 
}
if(empty($_POST['mobile']))
{
		$errors['mobile_empty'] = "<label id='err'>&nbsp&nbsp*required<br></label>"; 
}
else if(strlen($_POST['phone']) != 10)
{
	$errors['phone_len'] = "<label id='err'>&nbsp&nbsp*Invalid phone no<br></label>"; 
}
else if(strlen($_POST['mobile']) != 10)
{
	$errors['mobile_len'] = "<label id='err'>&nbsp&nbsp*Invalid mobile no<br></label>"; 
}
if(empty($_POST['place']))
{
		$errors['place_empty'] = "<label id='err'>&nbsp&nbsp*required<br></label>"; 
}
if(empty($_POST['email']))
{
		$errors['email_empty'] = "<label id='err'>&nbsp&nbsp*required<br></label>"; 
}
if(empty($_POST['vtc']))
{
		$errors['vtc_empty'] = "<label id='err'>&nbsp&nbsp*required<br></label>"; 
}
if(empty($_POST['taluka']))
{
		$errors['taluka_empty'] = "<label id='err'>&nbsp&nbsp*required<br></label>"; 
}
if(empty($_POST['pincode']))
{
		$errors['pincode_empty'] = "<label id='err'>&nbsp&nbsp*required<br></label>"; 
}
else if(strlen($_POST['pincode']) != 6)
{
		$errors['pincode_len'] = "<label id='err'>&nbsp&nbsp*Invalid length<br></label>"; 
}
 }
?>