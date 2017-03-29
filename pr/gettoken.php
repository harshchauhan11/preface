<?php
require 'db.php';
require_once 'passwordLib.php';
//session_start();
$uid = $mysqli->escape_string($_GET['uid']);
$pwd = $_GET['pwd'];

//$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM minusers WHERE minuemail='$uid'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    //$_SESSION['message'] = "User with that email doesn't exist!";
    echo(json_encode(array('outcome' => false, 'message' => 'User with that email doesn\'t exist!')));
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($pwd, $user['minupwd']) ) {
        
        //$_SESSION['uid'] = $user['minuid'];
        $uuid = $user['minuid'];
        echo(json_encode(array('outcome' => true, 'message' => 'Success', 'token' => $uuid)));
    }
    else {
        //$_SESSION['message'] = "You have entered wrong password, try again!";
        echo(json_encode(array('outcome' => false, 'message' => 'You have entered wrong password, try again!')));
    }
}


/*
$result_modules = $mysqli->query("SELECT minuid FROM minusers WHERE id='$mid'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result_modules->num_rows > 0 ) {
    while($row_modules = $result_modules->fetch_assoc()) {
        $mpins = $row_modules["mpins"];
    }
    //echo $mpins;
    for($i=1;$i<=$mpins;$i=$i+1) {
        //echo $i;
        $result_devices = $mysqli->query("SELECT dpin FROM mindevices WHERE mapdid='$mid' AND dpin=$i") or die($mysqli->error());
        if ( $result_devices->num_rows > 0 ) {
            //echo "Pin No. ".$i." is not free !<br/>";
        } else {
            //echo "Pin No. ".$i." is free !<br/>";
            $freepin = $i;
            break;
        }
    }
    echo $freepin;
}
*/
?>