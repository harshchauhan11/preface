<?php
require_once('mail/class.phpmailer.php');

$mail             = new PHPMailer(); // defaults to using php "mail()"

$body             = file_get_contents('contents.html');
$body             = eregi_replace("[\]",'',$body);

$mail->AddReplyTo("info@prefacepro.com","Admin");

$mail->SetFrom('info@prefacepro.com', 'Admin');

$mail->AddReplyTo("info@prefacepro.com","Admin");

$address = "harsh.h.chauhan@gmail.com";
$mail->AddAddress($address, "Harsh Chauhan");

$mail->Subject    = "PHPMailer Test Subject via mail(), basic";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$mail->AddAttachment("img/mysql.png");      // attachment
$mail->AddAttachment("img/session.png"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
?>