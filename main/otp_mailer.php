<?php
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$string = $_SESSION['otp'];

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
$mail->addAddress($email, $username);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'OTP Verification';
$mail->Body    = '<h3>Hello '.$username.',</h3><br>Your OTP for registration is <br><h1>'. $string.'</h1><br>
<a href="http://localhost/modules/main/email_link.php?username='.$username.'& email='.$email.'& password='.$password.'">
Click here to verify your account</a><br>
<br>*Do not share this OTP with anyone';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo "<p id='title1'>Message has been sent to ".$email."</p>";
}