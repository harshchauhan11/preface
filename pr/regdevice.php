<?php
require 'db.php';
session_start();
//require_once 'passwordLib.php';
// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$uid = $_SESSION['uid'];
$mname = $mysqli->escape_string($_POST['modname']);
$mapid = $mysqli->escape_string($_POST['mapid']);
$dname = $mysqli->escape_string($_POST['dname']);
$dpin = $mysqli->escape_string($_POST['dpinh']);
$dtype = $mysqli->escape_string($_POST['dtype']);
//$password = $mysqli->escape_string(generateHash($_POST['password']));
$dstatus = $mysqli->escape_string($_POST['dstatus']);
  
//echo $mapid.','.$dname.','.$dpin.','.$dtype.','.$dstatus;

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM mindevices WHERE mapdid='$mapid' AND dpin='$dpin'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'Device already registered on pin number '.$dpin.' on module '.$mapid.' !';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO mindevices (mapdid, dname, dtype, dpin, dstatus) " 
            . "VALUES ('$mapid','$dname','$dtype','$dpin','$dstatus')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['acktitle'] = 'Device Registered !';
        $_SESSION['ackmsg'] = '<p><span class="line">Device Name: <b class="golden">'.$dname.'</b></span> <span class="line">on Module Name: <b class="golden">'.$mname.'</b></span><br/>has been registered successfully.<br/><a href="register_device.php"><u>Register Another</u></a> or Goto <a href="profile.php"><u>Profile</u></a>.</p>';
        //$_SESSION['ackmsg'] = 'Device Name: <b>'.$dname.'</b> on Module Name: <b>'.$mname.'</b><br/>has been registered successfully. <a href="register_device.php">Register another</a>';
        header("location: ack.php");
        /*
        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
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


        header("location: profile.php"); 
        */
    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }
}
?>