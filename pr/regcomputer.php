<?php
require 'db.php';
session_start();

if(!isset($_POST['register'])) exit();

$vars = array('pcidh', 'pcname','pcosh', 'pcarchh');
$verified = TRUE;
foreach($vars as $v) {
   if(!isset($_POST[$v]) || empty($_POST[$v])) {
      $verified = FALSE;
   }
}
if(!$verified) {
  //error here...
  //exit();
    $_SESSION['message'] = 'Something went wrong ! Please try again later.';
    header("location: error.php");
} else {
    
    // Escape all $_POST variables to protect against SQL injections
    $uid = $_SESSION['uid'];
    $pcid = $mysqli->escape_string($_POST['pcidh']);
    $pcname = $mysqli->escape_string($_POST['pcname']);
    $pcos = $mysqli->escape_string($_POST['pcosh']);
    $pcarch = $mysqli->escape_string($_POST['pcarchh']);

    // Check if user with that email already exists
    $result = $mysqli->query("SELECT * FROM mincomputers WHERE pcid='$pcid' OR pcname='$pcname'") or die($mysqli->error());

    // We know user email exists if the rows returned are more than 0
    if ( $result->num_rows > 0 ) {

        $_SESSION['message'] = 'Computer with the same ID/Name already exists!';
        header("location: error.php");

    }
    else {

        $sql = "INSERT INTO mincomputers (minucid, pcid, pcname, pcos, pcarch) " 
                . "VALUES ('$uid','$pcid','$pcname','$pcos','$pcarch')";

        if ( $mysqli->query($sql) ){
            $_SESSION['acktitle'] = 'Computer Registered !';
            $_SESSION['ackmsg'] = '<span class="line">Computer Name: <b class="golden">'.$pcname.'</b></span> <span class="line">with ID: <b class="golden">'.$pcid.'</b></span><br/><span class="line">has been registered successfully.</span><br/><span class="line"><a href="register_computer.php"><u>Register Another</u></a> or <a href="register_apps.php"><u>Add Applications</u></a> </span><span class="line">or Goto <a href="profile.php"><u>Profile</u></a>.</p>';
            header("location: ack.php");
        }

        else {
            $_SESSION['message'] = 'Registration failed!';
            header("location: error.php");
        }
    }
}
?>