<?php
if(isset($_POST['submit']))
{
	$email = $_POST['email'];
}
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'elrs.studproj@gmail.com';                 // SMTP username
$mail->Password = 'zxcv!@#$';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('elrs.studproj@gmail.com');
$mail->addAddress($email, $email);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Password Reset';
$mail->Body    = '<h3>Your email address is '.$email.',<br><br>
<a href="http://localhost/modules/main/reset.php?temp='.$email.'">
Click here to reset your account password</a><br>
<br>*Do not share this link with anyone';

if(!$mail->send()) {
    echo 'Due to technical reason mail could not be sent, pl. retry';
} else {
   header("location: pwd_reset.php?success=1");
}