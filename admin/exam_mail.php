<?php 
mysql_connect("localhost","root");
mysql_select_db("form");
$d=strtotime("tomorrow");
$first=date("d/m/Y", $d);
$r=mysql_query("SELECT * FROM form WHERE date='$first'");
require 'PHPMailer/PHPMailerAutoload.php';

while($row=mysql_fetch_array($r))
{
	$email=$row['email'];
	$name=$row['fn'];
	$date1=$row['date'];
	email1($email,$name,$date1);
}

function email1($email,$name,$date1)
{

$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'elrs.studproj@gmail.com';                 // SMTP username
$mail->Password = 'zxcv!@#$';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('elrs.studproj@gmail.com');
$mail->addAddress($email, '');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Online Exam';
$mail->Body    = '<h3>Hello, '. $name .'<br>Your exam for Licence Registration will conducted tomorrow <h2>('.$date1.')</h2>• Exams will conduct at the specified address on the Hall Ticket<br>• Hall ticket is mandatory';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent due to technical errors';
} else {
   header('location: control.php?success=1');
}
}

?>