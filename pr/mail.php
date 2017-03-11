<?php
$to = 'harsh.h.chauhan@gmail.com';
$hash = 'asdnasm739anasdj2280a90a';
$subject = 'Minnie - Account Verification';
$message = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://'.$_SERVER['SERVER_NAME'].'/pr/verify.php?email='.$to.'&hash='.$hash;  

$type = 'html'; // or HTML
$charset = 'utf-8';

$mail     = 'no-reply@'.str_replace('www.', '', $_SERVER['SERVER_NAME']);
$uniqid   = md5(uniqid(time()));
$headers  = 'From: '.$mail."\n";
$headers .= 'Reply-to: '.$mail."\n";
$headers .= 'Return-Path: '.$mail."\n";
$headers .= 'Message-ID: <'.$uniqid.'@'.$_SERVER['SERVER_NAME'].">\n";
$headers .= 'MIME-Version: 1.0'."\n";
$headers .= 'Date: '.gmdate('D, d M Y H:i:s', time())."\n";
$headers .= 'X-Priority: 3'."\n";
$headers .= 'X-MSMail-Priority: Normal'."\n";
$headers .= 'Content-Type: multipart/mixed;boundary="----------'.$uniqid.'"'."\n\n";
$headers .= '------------'.$uniqid."\n";
$headers .= 'Content-type: text/'.$type.';charset='.$charset.''."\n";
$headers .= 'Content-transfer-encoding: 7bit';

mail($to, $subject, $message, $headers);

/*
        $headers =  'MIME-Version: 1.0' . "\r\n"; 
        $headers .= 'From: Your name <info@address.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
        
        $to      = $email;
        $subject = 'Minnie - Account Verification';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body, $headers );
*/
?>