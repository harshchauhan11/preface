<?php
require 'db.php';
session_start();
$mapid = $_POST['pmapid'];
$newmname = $_POST['new'];

$result = $mysqli->query("UPDATE minmodules SET mname='$newmname' WHERE mapid='$mapid'");

//echo $mysqli->affected_rows;
if ($mysqli->affected_rows != 0) {
    echo 1;
} else {
    echo 0;
}

?>

