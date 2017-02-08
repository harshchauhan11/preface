<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$comments = $_POST['comments'];

mysql_connect("localhost","adminHuTkSSb","GMgvKYB5qknf");
mysql_select_db("preface");

$query=mysql_query("INSERT INTO contact_us(name,email,phone,comments) values('".$name."','".$email."','".$phone."','".$comments."') ");
if($query){
	echo "Gotcha You ! We'll contact you shortly.";

	$subject = "Inquiry From " . $name . " !";
	$message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html;charset=utf-8'/><meta name='viewport' content='width=device-width'/><style type='text/css'>@font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans'),local('OpenSans'),url(http://themes.googleusercontent.com/static/fonts/opensans/v8/cJZKeOuBrn4kERxqtaUH3T8E0i7KZn-EPnyo3HZu7kw.woff) format('woff')}@font-face{font-family:'Open Sans';font-style:normal;font-weight:700;src:local('Open Sans Bold'),local('OpenSans-Bold'),url(http://themes.googleusercontent.com/static/fonts/opensans/v8/k3k702ZOKiLJc3WVjuplzHhCUOGz7vYGh680lGh-uXM.woff) format('woff')}</style></head><body style='width:100% !important;min-width: 100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;margin:0;padding:0;font-family:Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;'><table style='height: 100%;width: 100%;' cellspacing=0 cellpadding=0 border=0><tr><td align='center' valign='top' style='text-align:center'><center style='width: 100%;min-width: 580px;'><table style='width: 580px;margin: 0 auto;text-align: inherit;' cellspacing=0 border=0 cellpadding=0><tr><td style='background: #E8E8E8;height: 30px;'></td></tr><tr><td style='height: 100px;vertical-align:middle;border-bottom: 0px solid #001b2a;border-top: 0px solid #001b2a;'><h4 style='text-align:center;font-size: 40px;font-weight: normal;padding:0;margin: 0;line-height: 1.3'><span style='color:#4f88a6;font-size:75%;'>Inquiry from </span>" . $name . "</h4></td></tr><tr><td style='background: #e8e8e8;height: auto;padding-left: 40px;padding-right: 40px;padding-top: 20px'><p style='text-align:left;color:#333 !important;padding-left:30px;padding-right:30px'>" . nl2br($comments) . "<br><br><b>Contact</b>:<br>" . $phone . "<br>" . $email . "</p><br><br></td></tr></table></body></html>";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: Harsh Chauhan<harsh@preface.in>" . "\r\n";

	$result = mail("harsh.h.chauhan@gmail.com", $subject, $message, $headers);
//	if ($result == true)
//		echo "Gotcha You ! We'll contact you shortly.";
//	else
//		echo "Please try again !";
}
else{
	echo "Please try again !";
}

?>