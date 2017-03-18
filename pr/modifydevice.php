<?php
require 'db.php';
session_start();
$mapid = $_POST['pmapid'];
$dpin = $_POST['pdpin'];
$newdname = $_POST['new'];

$result = $mysqli->query("UPDATE mindevices SET dname='$newdname' WHERE mapdid='$mapid' AND dpin='$dpin'");

//echo $mysqli->affected_rows;
if ($mysqli->affected_rows != 0) {
    echo 1;
} else {
    echo 0;
}

?>

