<?php
require 'db.php';
session_start();

$uid = $_SESSION['uid'];
//$pcname = $mysqli->escape_string($_POST['modname']);
$pcid = $mysqli->escape_string($_POST['pcid']);
$aname = $mysqli->escape_string($_POST['aname']);
$apath = $mysqli->escape_string($_POST['apath']);
$aparam = $mysqli->escape_string($_POST['aparam']);

//echo $pcid.','.$aname.','.$apath.','.$aparam;

/*
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM mincapps WHERE pcaid='$pcid' AND dpin='$dpin'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'Device already registered on pin number '.$dpin.' on module '.$mapid.' !';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...
*/


    $sql = "INSERT INTO mincapps (pcaid, aname, apath, aparam, astatus) " 
            . "VALUES ('$pcid','$aname','$apath','$aparam','close')";

    if ( $mysqli->query($sql) ){

        $_SESSION['acktitle'] = 'Application Registered !';
        $_SESSION['ackmsg'] = '<p><span class="line">Application Name: <b class="golden">'.$aname.'</b></span> <span class="line">on Computer Name: <b class="golden">'.$pcid.'</b></span><br/>has been registered successfully.<br/><a href="register_app.php"><u>Register Another</u></a> or Goto <a href="profile.php"><u>Profile</u></a>.</p>';
        header("location: ack.php");
    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

?>