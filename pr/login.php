<?php
ob_start();
require_once 'passwordLib.php';
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM minusers WHERE minuemail='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['minupwd']) ) {
        
        $_SESSION['uid'] = $user['minuid'];
        $_SESSION['email'] = $user['minuemail'];
        $_SESSION['first_name'] = $user['minufname'];
        $_SESSION['last_name'] = $user['minulname'];
        $_SESSION['active'] = $user['minuactive'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

