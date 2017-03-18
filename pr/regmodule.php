<?php
require 'db.php';
session_start();
//require_once 'passwordLib.php';
// Set session variables to be used on profile.php page
//$_SESSION['email'] = $_POST['email'];
//$_SESSION['first_name'] = $_POST['firstname'];
//$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$uid = $_SESSION['uid'];
$mapid = $mysqli->escape_string($_POST['mapid']);
$mname = $mysqli->escape_string($_POST['mname']);
$mposition = $mysqli->escape_string($_POST['mposition']);
$mpins = $mysqli->escape_string($_POST['mpins']);
//$password = $mysqli->escape_string(generateHash($_POST['password']));
$mnear = $mysqli->escape_string($_POST['mnear']);
  
//echo $mapid.','.$mname.','.$mposition.','.$mpins.','.$mnear;

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM minmodules WHERE mapid='$mapid' OR mname='$mname'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'Module with the same ID/Name already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO minmodules (minumid, mapid, mname, mposition, mpins, mnear) " 
            . "VALUES ('$uid','$mapid','$mname','$mposition','$mpins', '$mnear')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        //echo 'Module ID: <b>'.$mapid.'</b> Registered Successfully !';
        $_SESSION['acktitle'] = 'Module Registered !';
        $_SESSION['ackmsg'] = '<span class="line">Module Name: <b class="golden">'.$mname.'</b></span> <span class="line">with ID: <b class="golden">'.$mapid.'</b></span><br/><span class="line">has been registered successfully.</span><br/><span class="line"><a href="register_module.php"><u>Register Another</u></a> or <a href="register_device.php"><u>Add Devices</u></a> </span><span class="line">or Goto <a href="profile.php"><u>Profile</u></a>.</p>';
        //$_SESSION['ackmsg'] = 'Module Name: <b>'.$mname.'</b> with ID: <b>'.$mapid.'</b><br/>has been registered successfully. <a href="register_device.php">Register Another</a>';
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