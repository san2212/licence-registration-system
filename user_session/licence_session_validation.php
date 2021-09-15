<?php
session_start();
include "session_header.php";

	mysql_connect('localhost','root') or die('could not connect');
	mysql_select_db('form') or die('could not connect');
  	$username = $_SESSION['username'];
	
$msg = array();
			
$query= mysql_query("SELECT * FROM form where fn = '$username'");
$row = mysql_fetch_array($query);
if($username == $row['fn'])
{
	if($row['verify'] == 0)
	{	
 	$msg['msg1'] = "<b>Your form has been successfully filled</b><br>";
	$msg['img1'] = "<div id='image'><img src='form_submit.png' width='950px' height='600px'>";
	}
else if ($row['verify'] == 1)
	{
	$msg['msg3'] = "<b>Your form has been successfully verified</b><br>";
	$msg['img2'] = "<div id='image'><img src='form_verified.png' width='950px' height='600px'>";
	$msg['msg4'] = "<p id='above'><a href='user_notification.php' id='link'>Select Date >></a></p></div>";
	}
else if ($row['verify'] == 2)
	{
	$msg['msg5'] = "<p id='notify_layout'>• Your date for exam has been successfully updated (HALL TICKET WILL BE ISSUED ASAP)</p>";
	$msg['msg6'] = "<form action='index_pay.php'><p id='notify_layout2'>Choose your payment option below:<br>• You can pay the registration charge of amount <b>₹ 30/-</b> by online payments via. paytm<br>• If not possible you can pay it on exam date, Choose your choice below..<br><br><button name='btn1' id='pay_btn'>₹ Pay Now</button> <button name='btn2' id='pay_btn1'>₹ Pay during exams</button></p></form>";
	//$msg['msg6'] = "<p id='notify_layout'>• To submit your documents at RTO Office, follow steps below :<br> 1) Print hard-copy of your form <a href='print_final_form.php' onclick='w = window.open(this.href);w.print();return false;'>here</a><br>2) Attachments are mandatory - UID Adhaar Card & Address Proof<br>3) Submit it to your nearest RTO Center</p>";
	}
else if ($row['verify'] == 3)
	{
	$msg['msg6'] = "
	<label id='suceed'>Your <b>payment</b> transaction has been successfully done<br>Get your payment receipt <a href='#'>here</a></label><img src ='tick.gif' width='325' height='250' id='suceed_img'>
	<p id='notify_layout'>• To submit your documents at RTO Office, follow steps below :<br> 1) Print hard-copy of your form <a href='print_final_form.php' onclick='w = window.open(this.href);w.print();return false;'>here</a><br>2) Attachments are mandatory - UID Adhaar Card & Address Proof<br>3) Submit it to your nearest RTO Center</p>";
	}
}
else
{
header ('location: form_licence.php'); 
}
?>

<html>
<head>
<title>
</title>
<link rel="stylesheet" type="text/css" href="licence_session_validation.css">
</head>
<body>

<div id="optlayout">
<p><?php if(isset($msg['msg1'])) echo $msg['msg1'];?> 
<?php if(isset($msg['msg3'])) echo $msg['msg3'];?>
</p>
<div id="table">
<?php if(isset($msg['msg5'])) echo $msg['msg5'];?>
<?php if(isset($msg['msg6'])) echo $msg['msg6'];?>
<?php if(isset($msg['img1'])) echo $msg['img1'];?>
<?php if(isset($msg['msg2'])) echo $msg['msg2'];?>
<?php if(isset($msg['img2'])) echo $msg['img2'];?>
<?php if(isset($msg['msg4'])) echo $msg['msg4'];?>
</div>
</div>

</body>
</html>
