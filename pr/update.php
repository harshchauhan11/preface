<?php
require 'db.php';
session_start();
$mapid = $_GET['pmapid'];
$dname = $_GET['pdname'];
$dpin = $_GET['pdpin'];
$dstatus = $_GET['pdstatus'];

$result = $mysqli->query("UPDATE mindevices SET dstatus='$dstatus' WHERE mapdid='$mapid' AND dpin='$dpin'");

//echo $mysqli->affected_rows;
if ($mysqli->affected_rows != 0) {
    echo 1;
} else {
    echo 0;
}

?>

