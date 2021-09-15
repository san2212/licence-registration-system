<html>
<head>
<title>
OTP Verification
</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="otp.css">
<div id="bg">

<?php 
session_start();
 $length = 6;
 $chars = '1234567890';
	
	
    $chars_length = (strlen($chars) - 1);
    $string = $chars{rand(0, $chars_length)};
    for ($i = 1; $i < $length; $i = strlen($string))
    {
        $r = $chars{rand(0, $chars_length)};
        if ($r != $string{$i - 1}) $string .=  $r;
    }
	$_SESSION['otp']=$string;
	
	include "otp_mailer.php";
?>

<script>
function countDown(secs,elem) {
	var element = document.getElementById(elem);
	element.innerHTML = "<p id='title'>Enter Your OTP within "+secs+" seconds</p>";
	if(secs < 1) {
		clearTimeout(timer);
		location.href = "signup.php";
	}
	secs--;
	var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);
}

</script>
<div id="status"></div>
<script>countDown(180,"status");</script>
<img src="wait.gif" width="150" height="150" id="wait"><br>
<form method="post" action ="otp_process.php">
<input type="text" name="otp" placeholder="x x x x x x"><br>
<input type="submit" value="Verify" class="button button">
</div>
</form>
</body>
</html>
