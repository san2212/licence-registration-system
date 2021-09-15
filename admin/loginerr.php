<?php
$errors = array();

if(empty($_POST['username']) && empty($_POST['email']))
{
	$errors['error'] = "<label id='err'>All fields are empty</label>"; 
}
?>